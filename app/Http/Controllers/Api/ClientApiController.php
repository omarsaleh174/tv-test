<?php
namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
use App\Entities\Admin\Order;
use App\Entities\Admin\City;
use App\Entities\Admin\Client;
use App\Services\MediaService;
use App\Http\Traits\GeneralTrait;
use App\Http\Requests\ClientRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ClientApiController extends Controller {
    use GeneralTrait;

    //done
    public function register(ClientRequest $request) { 
        $client = Client::create($request->only('company_name','phone','phone_2','email','whatsapp','device_token','country_id','city_id','gender'));
        $client->password = $request->password;
            if($request->hasFile('photo')){
                $secvice=new MediaService();
                $client->photo=$secvice->fileUpload('clients',$request->photo);
                $client->save();
            }
            $client->token =  $client->createToken('sanctum')->plainTextToken;
            return $this->returnData($client);


    }
   
    public function reset_password(Request $request) {
        $request->validate(['email'=>'required|email|exists:clients,email,deleted_at,NULL']);
        $client = Client::where('email',$request->email)->first();
        // $password=rand(1000, 9999);
        $password=123456;
        $client->password=$password;
        $client->save();
        $data = ['name'=>$client->name,'password'=> $password];
        // \Mail::to($client->email)->send(new \App\Mail\Reset($data));
        return $this->returnSuccessMessage('we send you in your mail a new password');
    }
  
     //done
    public function cities() {
        $locale = app()->getLocale();
        return $this->returnData(City::select('id', "title_$locale as title")->get());
    }
   
    
     //done
    public function login(Request $request)
    {
        if( auth()->guard('client')->attempt($request->only('email', 'password'))){
            $client = \Auth::guard('client')->user();
            if($client->active!=1)
                return $this->returnError(204,'Sorry You Are Suspended :(');
                if($request->device_token)
                {
                    $client->device_token=$request->device_token;
                    $client->save();
                }
                $response =  $client;
            $response['token'] =  $client->createToken('sanctum')->plainTextToken;
            return $this->returnData($response->only('id','name','photo','email','phone','token'));
        }
        return $this->returnNotFound("Email or Password is Incorrect Message");
    }

    public function update(ClientRequest $request)
    {
        Client::where('id',auth()->user()->id)->update($request->only('company_name','phone','phone_2','email','whatsapp','device_token','country_id','city_id','gender'));
        $response = Client::find(auth()->user()->id);
        if($request->password)
             $response->password = $request->password;

             if($request->hasFile('photo')){
                $secvice=new MediaService();
                $response->photo=$secvice->fileUpload('clients',$request->photo);
            }

             $response->save();
        // $response['token'] =  $response->createToken('sanctum')->plainTextToken;
        return $this->returnData($response->only('id','name','email','phone','zipcode','city_id'),trans('response.profile_updated'));


    }

  
    //done
    public function profile() {
        if(auth()->user()->active!=1)
            return $this->returnError(204,'Sorry You Are Suspended :(');
        return $this->returnData( auth()->user()->only('id','name','email','phone','zipcode','city'));
    }
 

    public function delete() {
        Client::find(auth()->user()->id)->delete();
        return $this->returnSuccessMessage('Deleted Successfully');
    }
    
    public function logout() {
        Client::where('id',auth()->user()->id)->update(['device_token'=>null]);
        auth()->user()->tokens()->delete();
        return $this->returnSuccessMessage(' Successfully Logout');
   }
 

}