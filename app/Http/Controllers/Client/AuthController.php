<?php

namespace App\Http\Controllers\Client;
use Illuminate\Http\Request;
use App\Entities\Admin\Client;
use App\Entities\Admin\Tender;
use App\Entities\Admin\City;
use App\Entities\Admin\Consultant;
use App\Entities\Admin\Subscription;
use App\Http\Controllers\Controller;
use App\Services\MediaService;
use App\Http\Requests\ClientRequest;
use Illuminate\Support\Facades\Password;
use App\Notifications\CustomPasswordReset;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\URL;

class AuthController extends Controller
{
    public function login()
    {
        return view('client.auth.login');
    }
    public function logout()
    {
        Auth::guard('client')->logout();
        return redirect()->route('welcome');
    }

    public function register()
    {
        return view('client.auth.register');
    }
    public function post_register(ClientRequest $request)
    {
        $client = Client::create($request->only('company_name','name','phone','phone_2','email','password','whatsapp','photo','type','device_token','country_id','city_id','gender'));
        $client->password = $request->password;
            if($request->hasFile('photo')){
                $secvice=new MediaService();
                $client->photo=$secvice->fileUpload('clients',$request->photo);
                $client->save();
        }
        if (!empty($request->category_id) && count($request->category_id) > 0) {
            $client->categories()->attach($request->category_id);
        }
        \Auth::guard('client')->attempt($request->only('email','password'));
        return redirect()->route('welcome');
    }
    public function post_login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        // Attempt to log the client in
        if (\Auth::guard('client')->attempt($credentials)) {
            // Redirect to a Blade view (after successful login)
            return redirect()->route('welcome'); // assuming 'client.dashboard' is a named route
        }

        // If authentication fails, redirect back with an error
        return back()->withErrors(['email' => trans('cruds.invalid_credentials')]);
    }


    public function page()
    {
         $consultants = Consultant::latest()->take(6)->get();
         $tenders = Tender::latest()->take(6)->get();
         $subscriptions = Subscription::where('status',1)->get();
         
        return view('client.page',compact('consultants','tenders','subscriptions'));
    }
    public function about()
    {
        return view('client.about');
    }
    
    public function profile()
    {
        return view('client.profile');
    }
        public function reset_password()
        {
            return view('client.auth.reset');
    }

    public function showResetForm($token,$email)
    {
            $status = Client::where('token',$token)->where('email',$email)->first();

            if (!$status) {
                throw ValidationException::withMessages([
                    'email' => ['This password reset token is invalid.'],
                ]);
            }
            $email = $status->email;
            
            return view('client.auth.passwords_reset', compact('token', 'email'));
    }

    public function get_all_consultants(Request $request)
    {
        $client = Client::findOrFail($request->user_id);
        $data = Consultant::where('city_id',$client->city_id)->where('department_id',$request->department_id)->get();
        return response()->json([
            'data' => $data
        ]);
    }
    public function get_all_cities(Request $request)
    {
        $data = City::whereCountryId($request->country_id)->get();
        return response()->json([
            'data' => $data
        ]);
    }
    
    
    public function send_reset_link(Request $request)
    {
        $request->validate(['email' => 'required|email|exists:clients,email']);
        $client = Client::where('email', $request->email)->first();
        $token = Str::random(60);
        if($client==null)
return back()->with('status', 'هذا الحساب غير مسجل لدينا');

        $client->update(['token' => $token]);
        $resetLink =url('/password-reset//').'/'.$token.'/'.$client->email;
        // $resetLink = route('password.reset.client', ['token' => $token, 'email' => $client->email]);
        Notification::send($client, new CustomPasswordReset($resetLink));
        return back()->with('status', 'تحقق من البريد الوارد الخاص بك! لقد أرسلنا رابط إعادة تعيين كلمة المرور إلى عنوان بريدك الإلكتروني
.');
    }
        public function reset(Request $request)
        {
            // Validate the reset request input
            $this->validate($request, [
                'email' => 'required|email',
                'password' => 'required|string|min:8|confirmed',
                'token' => 'required',
            ]);    
            $resetRecord = \DB::table('clients')
                ->where('email', $request->input('email'))
                ->where('token', $request->input('token'))
                ->first();
            if (!$resetRecord) {
                throw ValidationException::withMessages([
                    'email' => ['This password reset token is invalid or expired.'],
                ]);
            }    
            $client = Client::where('email', $request->input('email'))->first();
            if (!$client) {
                throw ValidationException::withMessages([
                    'email' => ['We could not find a client with that email address.'],
                ]);
            }
            $client->password = $request->password;
            $client->save();
            \DB::table('password_resets')->where('email', $request->input('email'))->delete();    
            Auth::guard('client')->loginUsingId($client->id);    
            return redirect()->route('welcome')->with('status', 'Password reset successfully.');
        }
    
}
