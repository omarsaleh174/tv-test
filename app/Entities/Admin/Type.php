<?php

namespace App\Entities\Admin;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Type extends Model implements Transformable
{
    use TransformableTrait;
    protected $fillable = [ 'title_en', 'title_ar','active'];
    public function getTitleAttribute(){
      return app()->getLocale()=="en"?$this->title_en:$this->title_ar;
    }
}
