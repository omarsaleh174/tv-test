<?php
namespace App\Entities\Admin;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
class Product extends Model implements Transformable{
    use TransformableTrait;
    use SoftDeletes;
    protected $fillable = ['title_en','rate','title_ar','photo','minimum_order','order','price','real_price','code','amount','description_en','description_ar',
    'country_id','category_id','sub_category_id','unit_id','brand_id','type_id','manufacture_id','is_packaging','active'

];


    // public function orders()
    // {
    //     return $this->hasMany(ProductOrder::class);
    // }
    // public function reviews()
    // {
    //     return $this->hasMany(ReviewProduct::class);
    // }

    public function getPhotoAttribute($photo){
        return asset('images/products/'.$photo)??'';
    }

    public function getNameAttribute($name){
        return app()->getLocale()=="en"?$this->title_en:$this->title_ar;
    }

    public function country(){

        return $this->belongsTo(Country::class,'country_id');
    }
    // public function brand(){

    //     return $this->belongsTo(Brand::class,'brand_id');
    // }
    // public function type(){

    //     return $this->belongsTo(Type::class,'type_id');
    // }
    // public function manufacture(){

    //     return $this->belongsTo(Manufacture::class,'manufacture_id');
    // }

    // public function category(){

    //     return $this->belongsTo(Category::class,'category_id');
    // }


    // public function category() { 
    //     return $this->subCategory ? $this->subCategory->category : null;
    //  }
    
    //  public function subCategory(){

    //     return $this->belongsTo(SubCategory::class,'sub_category_id');
    // }

    // public function unit(){

    //     return $this->belongsTo(Unit::class,'unit_id');
    // }

    public function getQuery()
    {
        return Product::query();
    }



    public static function getLowStockProducts()
    {
        $low = getSettingValue("minimum_amount");
        return self::where('amount', '<=', $low)->get();
    }

    public static function getLowStockProductsCount()
    {
        $low = getSettingValue("minimum_amount");
        return self::where('amount', '<=', $low)->count();
    }


}
