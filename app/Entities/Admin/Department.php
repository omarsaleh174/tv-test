<?php

namespace App\Entities\Admin;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;


class Department extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [ 'title_en', 'title_ar','active','photo'];
    public function getTitleAttribute(){
      return app()->getLocale()=="en"?$this->title_en:$this->title_ar;
    }

    public function getPhotoAttribute($photo)
    {
        return $photo != null ? asset('images/departments/' . $photo) : null;
    }
  
   
    public function consultants()
    {
        return $this->hasMany(Consultant::class);
    }
}
