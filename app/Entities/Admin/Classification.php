<?php

namespace App\Entities\Admin;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Classification extends Model implements Transformable
{
    use TransformableTrait;
    use Sluggable;

    protected $fillable = [  'title_en',  'title_ar' ,'photo','active','order','slug_en','slug_ar'];

    public function sluggable(): array
    {
        return [
            'slug_en' => [ 'source' => 'title_en'],
            'slug_ar' => [ 'source' => 'title_ar']
        ];
    }

    public function getTitleAttribute(){
        return app()->getLocale()=="en"?$this->title_en:$this->title_ar;
      }
      
    public function getSlugAttribute(){
        return app()->getLocale()=="en"?$this->slug_en:$this->slug_ar;
      }
      
}
