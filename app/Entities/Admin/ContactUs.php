<?php

namespace App\Entities\Admin;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class ContactUs extends Model implements Transformable
{
    use TransformableTrait;
    protected $table ='contactuses';
    protected $fillable = ['name', 'email', 'subject', 'message'];

}
