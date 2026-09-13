<?php

namespace App\Entities\Admin;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Subscription extends Model implements Transformable
{
    use TransformableTrait;
    protected $fillable = ['title', 'description', 'subscription_type', 'type_amount', 'duration', 'status', 'price', 'real_price'];

}
