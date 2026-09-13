<?php

namespace App\Entities\Admin;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
 
class Category extends Model implements Transformable
{
    use TransformableTrait;
    protected $fillable = [  'title_en',  'title_ar' ,'photo'];

  public function getPhotoAttribute($photo)
  {
      return $photo != null ? asset('images/categories/' . $photo) : null;
  }

public function getTitleAttribute(){
  return app()->getLocale()=="en"?$this->title_en:$this->title_ar;
}

public function tenders()
{
    return $this->belongsToMany(Tender::class, 'tender_categories');
}
public function clients()
{
    return $this->belongsToMany(Client::class, 'category_client');
}

}
