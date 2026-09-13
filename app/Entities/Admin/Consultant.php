<?php

namespace App\Entities\Admin;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;

class Consultant extends Model implements Transformable
{
    use TransformableTrait; use Sluggable;
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => ['title','name']
            ]
        ];
    }
    protected $fillable = ['name', 'title', 'birth_date', 'small_description', 'long_description', 'services', 'skills', 'city_id', 'country_id', 'department_id', 'photo', 'name', 'phone', 'email', 'password', 'whatsapp', 'device_token', 'client_id',
    'is_visible_on_home'];

    
    public function getPhotoAttribute($photo)
    {
        return $photo != null ? asset('images/consultants/' . $photo) : null;
    }
    public function getMyNameAttribute($photo)
    {
        if($this->is_visible_on_home==1)
        return $this->name .' '.' <i class="bi bi-check-circle-fill text-primary ms-2" title="موثق"></i>';
        return $this->name ;
    }
    public function getbirthDateInputAttribute()
    {
        $formattedForInput = Carbon::parse($this->birth_date)->format('Y-m-d');
        return  $formattedForInput;
//            'formatted' => Carbon::parse($this->birth_date)->format('m/d/Y')   
    }

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }
    public function consultations()
    {
        return $this->hasMany(Consultation::class);
    }
    public function city()
    {
        return $this->belongsTo(City::class);
    }
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
    public function country()
    {
        return $this->belongsTo(Country::class);
    }


}
