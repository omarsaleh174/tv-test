<?php

namespace App\Entities\Admin;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
 
class Country extends Model implements Transformable
{
    use TransformableTrait; 
    protected $fillable = [ 'title_en', 'title_ar','active' ];

    public function getTitleAttribute(){
      return app()->getLocale()=="en"?$this->title_en:$this->title_ar;
    }
    
    public function cities()
    {
        return $this->hasMany(City::class);
    }
    public function clients()
    {
        return $this->hasMany(Client::class);
    }
    
    public function tenders()
    {
        return $this->hasMany(Tender::class);
    }

}
