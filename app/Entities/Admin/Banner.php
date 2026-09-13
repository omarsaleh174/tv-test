<?php

namespace App\Entities\Admin;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Banner extends Model implements Transformable
{
    use TransformableTrait;
    protected $fillable = [
        'title', 'photo', 'link', 'active'
    ];
    protected $appends=['photo'];
    public function getPhotoAttribute($photo)
    {
        return $photo != null ? asset('images/banners/' . $photo) : null;
    }
  
}
