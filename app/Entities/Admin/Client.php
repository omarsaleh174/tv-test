<?php

namespace App\Entities\Admin;

use Laravel\Sanctum\HasApiTokens;
use Spatie\Activitylog\LogOptions;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Client  extends Authenticatable implements Transformable   {   //, MustVerifyEmail

    use TransformableTrait;    use HasApiTokens;    use HasFactory, Notifiable;  // use SoftDeletes;
    
       use LogsActivity;
    
            protected static $logAttributes = ['company_name','name','phone','phone_2','email','password','whatsapp','subscription_id','start_subscription','end_subscription','active','photo','type','device_token','token','country_id','city_id','gender','email_verified_at'];
            protected static $logName = 'clients';
    
        public function getActivitylogOptions(): LogOptions
        {
            return LogOptions::defaults()->logOnly(['company_name','name','phone','phone_2','email','password','whatsapp','subscription_id','start_subscription','end_subscription','active','photo','type','device_token','token','country_id','city_id','gender','email_verified_at'])->useLogName(static::$logName);
        }
    protected $fillable = ['company_name','name','phone','phone_2','email','password','whatsapp','subscription_id','start_subscription','end_subscription','active','photo','type','device_token','token','country_id','city_id','gender','email_verified_at'];
    protected $data =   [ 'password' ];

    public function getPhotoAttribute($photo) {
        return $photo!=null? asset('images/clients/'.$photo) : null;
    }
    public function getMyGenderAttribute($data) {//my_gender
        return $this->gender==1?trans('cruds.male'):trans('cruds.female');
    }

    public function setPasswordAttribute($password) {
        $this->attributes['password'] = Hash::make($password);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_client');
    }
    public function subscription()
    {
        return $this->belongsTo(Subscription::class);
    }

    public function subscriptions()
    {
        return $this->belongsToMany(Subscription::class, 'client_subscription');
    }
    
    public function scopeActiveSubscription($query)
    {
        return $query->whereHas('subscription')->where('active',1)->where('end_subscription', '>=', now());   
    }
    public function consultations()
    {
        return $this->hasMany(Consultation::class);
    }

    public function tenders()
    {
        return $this->hasMany(Tender::class);
    }

}
