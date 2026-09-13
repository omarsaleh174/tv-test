<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Entities\Admin\Tender;
use App\Mail\ConsultationEmail;
use App\Entities\Admin\ContactUs;
use App\Entities\Admin\Consultant;
use App\Entities\Admin\Subscription;
use App\Entities\Admin\Client;
use App\Entities\Admin\Consultation;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use App\Models\PromoCodeUsage;
use App\Models\PromoCode;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Requests\Client\ContactRequest;
use App\Http\Requests\Client\ConsultationRequest;

class ClientController extends Controller
{
    public function request_consultation(ConsultationRequest $request)
    {
        $consultationRequest = Consultation::create(
            $request->all() + [
                'client_id' => auth()->guard('client')->user()->id
            ]
        );

        $consultant = Consultant::find($request->consultant_id);

        Mail::to($consultant->email)
            ->send(new ConsultationEmail($consultationRequest));

        return redirect()->back()
            ->with('message', 'تم إرسال الاستشارة بنجاح.');
    }


    public function add_tender(Request $request)
    {
        return view('client.add_tender');
    }


    public function client_tenders_store(\App\Http\Requests\Client\TenderRequest $request)
    {
        $client = auth()->guard('client')->user();

        // المستخدم لازم يكون مشترك في باقة واشتراكه لسه ساري
        if (
            !$client->subscription_id ||
            !$client->end_subscription ||
            \Carbon\Carbon::parse($client->end_subscription)->lt(now())
        ) {
            return response()->json([
                'success' => false,
                'subscription_required' => true,
                'message' => 'يجب الاشتراك في إحدى الباقات أولاً.'
            ], 403);
        }

        // حفظ المناقصة بنفس الطريقة الأصلية
        $tender = Tender::create($request->all());

        if ($request->category_id) {
            $tender->categories()->attach($request->category_id);
        }

        return response()->json([
            'success' => true,
            'message' => 'تم إرسال المناقصة بنجاح.'
        ]);
    }



    /*
    |--------------------------------------------------------------------------
    | Start Subscription Payment
    |--------------------------------------------------------------------------
    */

    public function startSubscriptionPayment(Request $request)
    {
        $request->validate([
            'subscription_id' => 'required|integer|exists:subscriptions,id',
            'promo_code' => 'nullable|string|max:255',
        ]);

        $client = auth()->guard('client')->user();
        $subscription = Subscription::findOrFail($request->subscription_id);

        $price = (float) $subscription->price;
        $discountPercentage = 0;
        $discountAmount = 0;
        $finalPrice = $price;
        $promo = null;

        if ($request->filled('promo_code')) {
            $promo = PromoCode::where('code', strtoupper(trim($request->promo_code)))
                ->where('is_active', 1)
                ->first();

            if (!$promo) {
                return back()->withInput()->with('error', 'Invalid Promo Code');
            }

            if ($promo->expires_at && now()->gt($promo->expires_at)) {
                return back()->withInput()->with('error', 'Promo Code Expired');
            }

            if ((int) $promo->used_count >= (int) $promo->max_usage) {
                return back()->withInput()->with('error', 'Promo Code Finished');
            }
            $email = strtolower(trim((string) $client->email));

if ($email === '') {
    return back()->withInput()->with(
        'error',
        'Client email is required'
    );
}

$alreadyUsed = PromoCodeUsage::where('promo_code_id', $promo->id)
    ->where(function ($query) use ($client, $email) {
        $query->where('client_id', $client->id)
            ->orWhere('email', $email);
    })
    ->exists();

if ($alreadyUsed) {
    return back()->withInput()->with(
        'error',
        'You have already used this Promo Code'
    );
}

$usageCount = PromoCodeUsage::where('promo_code_id', $promo->id)->count();

if ($usageCount >= 5) {
    return back()->withInput()->with(
        'error',
        'Promo Code Finished'
    );
}
            $discountPercentage = (float) $promo->discount_percentage;
            $discountAmount = ($price * $discountPercentage) / 100;
            $finalPrice = max(0, $price - $discountAmount);
        }

        /*
        |--------------------------------------------------------------------------
        | Free Checkout (100% Promo / Free Subscription)
        |--------------------------------------------------------------------------
        | Telr does not accept transactions with amount 0.00.
        | If the final price is zero, activate the subscription directly and
        | record the promo usage exactly once without sending anything to Telr.
        */
        if (round($finalPrice, 2) <= 0) {
            $startSubscription = now();
            $durationMonths = max(1, (int) $subscription->duration);

            $client->subscription_id = $subscription->id;
            $client->start_subscription = $startSubscription;
            $client->end_subscription = $startSubscription->copy()->addMonths($durationMonths);
            $client->active = 1;
            $client->save();

            if ($promo) {
                $email = strtolower(trim((string) $client->email));

                $usage = PromoCodeUsage::where('promo_code_id', $promo->id)
                    ->where(function ($query) use ($client, $email) {
                        $query->where('client_id', $client->id)
                            ->orWhere('email', $email);
                    })
                    ->first();

                if (!$usage) {
                    PromoCodeUsage::create([
                        'promo_code_id' => $promo->id,
                        'client_id' => $client->id,
                        'email' => $email,
                    ]);

                    // Keep used_count synchronized with the real usage table.
                    $promo->used_count = PromoCodeUsage::where('promo_code_id', $promo->id)->count();
                    $promo->save();
                }
            }

            // Remove any old Telr session data from a previous payment attempt.
            session()->forget([
                'telr_order_ref',
                'telr_cart_id',
                'telr_amount',
                'telr_currency',
                'telr_subscription_id',
                'telr_promo_id',
                'telr_client_id',
            ]);

            return redirect('/')
                ->with('message', 'تم تفعيل الاشتراك بنجاح. لا توجد دفعة مطلوبة.');
        }

        $cartId = 'TV-' . $client->id . '-' . time() . '-' . Str::upper(Str::random(6));

        $telrPayload = [
            'method' => 'create',
            'store' => (int) config('services.telr.store_id'),
            'authkey' => config('services.telr.auth_key'),
            'framed' => 0,
            'order' => [
                'cartid' => $cartId,
                'test' => (string) config('services.telr.test', 1),
                'amount' => number_format($finalPrice, 2, '.', ''),
                'currency' => config('services.telr.currency', 'SAR'),
                'description' => 'TV Adviser Subscription',
            ],
            'return' => [
                'authorised' => route('client.payment.authorised'),
                'declined' => route('client.payment.declined'),
                'cancelled' => route('client.payment.cancelled'),
            ],
        ];

        try {
            $response = Http::withHeaders([
                    'Accept' => 'application/json'
                ])
                ->withBody(json_encode($telrPayload), 'application/json')
                ->timeout(30)
                ->post('https://secure.telr.com/gateway/order.json');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Cannot connect to Telr: ' . $e->getMessage());
        }

        $data = $response->json();

        if (
            !$response->successful() ||
            isset($data['error']) ||
            empty($data['order']['url']) ||
            empty($data['order']['ref'])
        ) {
            return back()->withInput()->with(
                'error',
                $data['error']['message'] ?? 'Unable to create Telr payment'
            );
        }

        session([
            'telr_order_ref' => $data['order']['ref'],
            'telr_cart_id' => $cartId,
            'telr_amount' => round($finalPrice, 2),
            'telr_currency' => config('services.telr.currency', 'SAR'),
            'telr_subscription_id' => $subscription->id,
            'telr_promo_id' => $promo ? $promo->id : null,
            'telr_client_id' => $client->id,
        ]);

        return redirect()->away($data['order']['url']);
    }


    /*
    |--------------------------------------------------------------------------
    | Payment Authorised
    |--------------------------------------------------------------------------
    */

    public function paymentAuthorised()
    {
        $orderRef = session('telr_order_ref');

        if (!$orderRef) {
            return redirect('/')
                ->with('error', 'Payment session not found.');
        }

        $checkPayload = [
            'method' => 'check',
            'store' => (int) config('services.telr.store_id'),
            'authkey' => config('services.telr.auth_key'),
            'order' => [
                'ref' => $orderRef,
            ],
        ];

        try {
            $response = Http::withHeaders([
                    'Accept' => 'application/json'
                ])
                ->withBody(json_encode($checkPayload), 'application/json')
                ->timeout(30)
                ->post('https://secure.telr.com/gateway/order.json');
        } catch (\Exception $e) {
            return redirect('/')
                ->with('error', 'Unable to verify payment.');
        }

        $data = $response->json();

        $statusCode = (int) data_get(
            $data,
            'order.status.code',
            0
        );

        if ($statusCode !== 3) {
            return redirect('/')
                ->with('error', 'Payment was not completed.');
        }

        $expectedAmount = (float) session('telr_amount');
        $paidAmount = (float) data_get(
            $data,
            'order.amount',
            0
        );

        if (abs($expectedAmount - $paidAmount) > 0.01) {
            return redirect('/')
                ->with('error', 'Payment amount mismatch.');
        }

        $subscriptionId = session('telr_subscription_id');
        $clientId = session('telr_client_id');

        if (!$subscriptionId || !$clientId) {
            return redirect('/')
                ->with('error', 'Subscription payment data not found.');
        }

        $subscription = Subscription::find($subscriptionId);
        $client = Client::find($clientId);

        if (!$subscription || !$client) {
            return redirect('/')
                ->with('error', 'Subscription or client not found.');
        }

        // تفعيل الاشتراك بعد تأكيد الدفع من Telr فقط
        $startSubscription = now();
        $durationMonths = max(1, (int) $subscription->duration);

        $client->subscription_id = $subscription->id;
        $client->start_subscription = $startSubscription;
        $client->end_subscription = $startSubscription->copy()->addMonths($durationMonths);
        $client->active = 1;
        $client->save();

        // زيادة استخدام البرومو كود بعد نجاح الدفع فقط
        // تسجيل استخدام البرومو بعد نجاح الدفع فقط
$promoId = session('telr_promo_id');

if ($promoId) {

    $promo = PromoCode::find($promoId);

    if ($promo) {

        $email = strtolower(trim((string) $client->email));

        $usage = PromoCodeUsage::where('promo_code_id', $promo->id)
            ->where(function ($query) use ($client, $email) {
                $query->where('client_id', $client->id)
                    ->orWhere('email', $email);
            })
            ->first();

        // نسجل الاستخدام مرة واحدة فقط
        if (!$usage) {

            PromoCodeUsage::create([
                'promo_code_id' => $promo->id,
                'client_id' => $client->id,
                'email' => $email,
            ]);

            $promo->increment('used_count');
        }
    }
}

        session()->forget([
            'telr_order_ref',
            'telr_cart_id',
            'telr_amount',
            'telr_currency',
            'telr_subscription_id',
            'telr_promo_id',
            'telr_client_id',
        ]);

        return redirect('/')
            ->with('message', 'تم الدفع وتفعيل الاشتراك بنجاح.');
    }


    /*
    |--------------------------------------------------------------------------
    | Payment Declined
    |--------------------------------------------------------------------------
    */

    public function paymentDeclined()
    {
        return redirect('/')
            ->with(
                'error',
                'Payment declined.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | Payment Cancelled
    |--------------------------------------------------------------------------
    */

    public function paymentCancelled()
    {
        return redirect('/')
            ->with(
                'error',
                'Payment cancelled.'
            );
    }


    public function subscripe($id)
    {
    $subscription = Subscription::findOrFail($id);

    return view('client.subscription_checkout', compact('subscription'));
    }


    public function store_contact(
        ContactRequest $request
    ) {
        ContactUs::create(
            $request->all()
        );

        return response()->json([
            'message' =>
                'تم إرسال طلبك بنجاح.'
        ]);
    }


    public function updateProfile(
        UpdateProfileRequest $request
    ) {
        $client =
            auth()
                ->guard('client')
                ->user();

        $client->update(
            $request->validated()
        );

        $client
            ->categories()
            ->sync(
                $request->category_id
            );

        return back()
            ->with(
                'success',
                trans(
                    'cruds.profile_updated'
                )
            );
    }


    public function updatePassword(
        Request $request
    ) {
        $request->validate([

            'current_password' =>
                'required',

            'new_password' =>
                'required|confirmed|min:8',

        ]);


        $client =
            auth()
                ->guard('client')
                ->user();


        if (
            !Hash::check(
                $request->current_password,
                $client->password
            )
        ) {

            return back()
                ->withErrors([

                    'current_password' =>
                        trans(
                            'cruds.invalid_current_password'
                        )

                ]);
        }


        /*
        | Client Model بيعمل Hash تلقائي
        */

        $client->password =
            $request->new_password;

        $client->save();


        return back()
            ->with(
                'success',
                trans(
                    'cruds.password_updated'
                )
            );
    }
}