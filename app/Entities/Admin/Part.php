<?php

namespace App\Entities\Admin;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Part extends Model implements Transformable
{
    use TransformableTrait;
    protected $fillable = ['title','key', 'value_en', 'value_ar','type','section'];
     
    public function getValueAttribute(){
        return app()->getLocale()=='en'?$this->value_en:$this->value_ar;
    }
}
