<?php

namespace App\Entities\Admin;

use Carbon\Carbon;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Spatie\Activitylog\Traits\LogsActivity;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Tender extends Model implements Transformable
{
    use TransformableTrait;    use Sluggable;


    use LogsActivity;

        protected $fillable = [ 'tender_code', 'title', 'type', 'publication_date', 'closing_date', 'opening_date', 'publisher_name', 'bid_docs_price', 'docs_sale_place', 'docs_sale_phone', 'reference', 'website_link', 'city_id', 'country_id', 'submission_place', 'phone', 'internal_phone'
            ,'client_id','approved_by'
        ];

        protected static $logAttributes = ['tender_code', 'title', 'type', 'publication_date', 'closing_date', 'opening_date', 'publisher_name', 'bid_docs_price', 'docs_sale_place', 'docs_sale_phone', 'reference', 'website_link', 'city_id', 'country_id', 'submission_place', 'phone', 'internal_phone',',client_id','approved_by'];
        protected static $logName = 'tenders';

        public function getActivitylogOptions(): LogOptions
        {
            return LogOptions::defaults()->logOnly(['tender_code', 'title', 'type', 'publication_date', 'closing_date', 'opening_date', 'publisher_name', 'bid_docs_price', 'docs_sale_place', 'docs_sale_phone', 'reference', 'website_link', 'city_id', 'country_id', 'submission_place', 'phone', 'internal_phone',',client_id','approved_by'])->useLogName(static::$logName);
        }

 
    
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    protected $casts =   [ 'closing_date'=>'date','opening_date'=>'date' ];


    public function customDate($date)
    {
        if (!$date) 
            return null; 
        try {
            $formattedDate = Carbon::parse($date)->format('Y-m-d');
            return $formattedDate;
        } catch (\Exception $e) { return null; }
    }

    public function getPhotoAttribute()
    {
        foreach($this->categories as $category)
        {
            if($category->photo)
            return  $category->photo;
        }
        return asset('images/settings/' . getSettingValue('logo'));
    }
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'tender_categories');
    }
    public function city()
    {
        return $this->belongsTo(City::class);
    }
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    public function typeData()
    {
        return $this->belongsTo(Type::class,'type','id');
    }
}
