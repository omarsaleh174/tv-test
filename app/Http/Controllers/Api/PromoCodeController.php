<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PromoCode;
use App\Models\PromoCodeUsage;
use App\Entities\Admin\Subscription;

class PromoCodeController extends Controller
{
    public function check(Request $request)
    {
        $request->validate([
            'code'  => 'required|string',
            'order' => 'required|integer|exists:subscriptions,id',
        ]);

        $client = auth()->guard('client')->user();

        if (!$client) {
            return response()->json([
                'success' => false,
                'message' => 'Please login first'
            ], 401);
        }

        $subscription = Subscription::findOrFail($request->order);

        $promo = PromoCode::where(
                'code',
                strtoupper(trim($request->code))
            )
            ->where('is_active', 1)
            ->first();

        // التأكد إن البرومو كود موجود ومفعل
        if (!$promo) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid Promo Code'
            ], 422);
        }

        // التأكد من تاريخ انتهاء البرومو
        if ($promo->expires_at && now()->gt($promo->expires_at)) {
            return response()->json([
                'success' => false,
                'message' => 'Promo Code Expired'
            ], 422);
        }

        $email = strtolower(trim((string) $client->email));

        if ($email === '') {
            return response()->json([
                'success' => false,
                'message' => 'Client email is required'
            ], 422);
        }

        // البرومو يستخدم مرة واحدة فقط لنفس العميل أو نفس الإيميل
        $alreadyUsed = PromoCodeUsage::where('promo_code_id', $promo->id)
            ->where(function ($query) use ($client, $email) {
                $query->where('client_id', $client->id)
                    ->orWhere('email', $email);
            })
            ->exists();

        if ($alreadyUsed) {
            return response()->json([
                'success' => false,
                'message' => 'You have already used this Promo Code'
            ], 422);
        }

        // البرومو متاح بحد أقصى لـ 5 إيميلات مختلفة
        $usageCount = PromoCodeUsage::where('promo_code_id', $promo->id)
            ->count();

        if ($usageCount >= 5) {
            return response()->json([
                'success' => false,
                'message' => 'Promo Code Finished'
            ], 422);
        }

        // السعر الحقيقي من قاعدة البيانات
        $price = (float) $subscription->price;

        // نسبة الخصم
        $discountPercentage = (float) $promo->discount_percentage;

        // قيمة الخصم
        $discount = ($price * $discountPercentage) / 100;

        // السعر بعد الخصم
        $finalPrice = max(0, $price - $discount);

        return response()->json([
            'success' => true,
            'order' => $subscription->id,
            'promo_code' => $promo->code,
            'price_before' => round($price, 2),
            'discount_percentage' => $discountPercentage,
            'discount_amount' => round($discount, 2),
            'price_after' => round($finalPrice, 2)
        ]);
    }
}
