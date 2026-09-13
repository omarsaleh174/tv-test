<?php

namespace App\Entities\Admin;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class City.
 *
 * @package namespace App\Entities\Admin;
 */
class City extends Model implements Transformable
{
    use TransformableTrait;

    
    protected $fillable = [ 'title_en', 'title_ar', 'country_id','active' ];
  public function getTitleAttribute($name){
    return app()->getLocale()=="en"?$this->title_en:$this->title_ar;
  }
  public function country()
  {
      return $this->belongsTo(Country::class);
  }
}
