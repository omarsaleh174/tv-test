<?php

namespace App\Entities\Admin;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Article extends Model implements Transformable
{
    use TransformableTrait;
    protected $fillable = ['title_en','title_ar' ,'desc_en','desc_ar','sub_desc_en',
    'sub_desc_ar', 'slug_en','slug_ar','photo','type','active','display_order','tags_ar'
    ,'tags_en','consultant_id','classification_id'];

    protected $casts = [
        'date' => 'date',
        'tags_en' => 'array',
        'tags_ar' => 'array',   ];


        // public function sluggable(): array
        // {
        //     return [
        //         'slug_ar' => [
        //             'source' => 'title_ar'
        //         ],
        //         'slug_en' => [
        //             'source' => 'title_en'
        //         ]
        //     ];
        // }
        public function getRouteKeyName()
      {
          return  app()->getLocale()=='en'?'slug_en':'slug_ar';
      }
      
      public function getLocalizedRouteKey($locale)
      {
          return $locale=='en'?$this->slug_en:$this->slug_ar;
      }
      
      
      public function getTagsAttribute()
      {
        return app()->getLocale()=='en'?$this->tags_en:$this->tags_ar;
      }
      public function getTitleAttribute()
      {
        return app()->getLocale()=='en'?$this->title_en:$this->title_ar;
      }
      
      public function getSubAttribute()
      {
        return app()->getLocale()=='en'?$this->sub_desc_en:$this->sub_desc_ar;
      }
      
      public function getSlugAttribute()
      {
        return app()->getLocale()=='en'?$this->slug_en:$this->slug_ar;
      }
      
   

    public function getDescAttribute(){
        return app()->getLocale()=='en'?$this->desc_en:$this->desc_ar;
    }
    public function getSubDescAttribute(){
        return app()->getLocale()=='en'?$this->sub_desc_en:$this->sub_desc_ar;
    }

        
      public function getDateAttribute($date){
        return  date('m/d/Y', strtotime($date));
      }

      
      public function getPhotoAttribute($photo){
        return asset('images/articles/'.$photo)??'';
    }
    
     public function consultant()
    {
        return $this->belongsTo(Consultant::class);
    }
     public function classification()
    {
        return $this->belongsTo(Classification::class);
    }

}
