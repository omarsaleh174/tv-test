<?php

namespace App\Entities\Admin;
use Carbon\Carbon;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
class Order extends Model implements Transformable {

    use TransformableTrait;
    use LogsActivity;

    
    /*
        type = 0    =>  The order has been cancelled from client
        type = 1    =>  The order has created
        decrement   =>  check if the product amount decrement from the main product or not it decrement only when the order status out_of_delivery or delivered

    */


        protected $fillable = [ 'id','decrement','client_id','paid_type','is_paid','price','date','seen',
                            'status','delivery_price','address_id','coupon_id','coupon_amount','price_after_offer',
                            'is_returned','points_add','amount_of_points','amount_of_wallet',
                            'donated','photo','wallet_add'];

        protected $casts    = [ 'created_at' => 'datetime' ];
        protected static $logAttributes = ['id', 'decrement', 'client_id', 'paid_type', 'is_paid', 'price', 'date', 'seen', 'status', 'delivery_price', 'address_id', 'coupon_id', 'coupon_amount', 'price_after_offer'];
        protected static $logName = 'orders';
    
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logOnly(['id', 'decrement', 'client_id', 'paid_type', 'is_paid', 'price', 'date', 'seen', 'status', 'delivery_price', 'address_id', 'coupon_id', 'coupon_amount', 'price_after_offer'])->useLogName(static::$logName);
    }

    public function coupon()
    {
        return $this->belongsTo(Coupon::class);
    }
    public function address()
    {
        return $this->belongsTo(Address::class);
    }
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    
    public function products()
    {
        return $this->belongsToMany(Product::class,'product_orders')->withPivot(['price','amount','packaging','id']);
    }

    public function getDateAttribute($date)
    {
        return $this->asDateTime($date)->format('Y-m-d g:i A'); 
    }
    
    public function getCreatedAtAttribute($date)
    {
        return $this->asDateTime($date)->format('Y-m-d H:i'); 
    }

    static $allStatus = [
        0=>'canceled',
        1=>'placed',
        2=>'confirmed',
        3=>'shipped',
        4=>'out_of_delivery',
        5=>'delivered'
    ];
    public $allPaidType = [
        0=>'cash',
        1=>'online'
    ];

    public function getPhotoAttribute($photo) 
    {
        return $photo!=null? asset('images/orders/'.$photo) : null;
    }


    public function getMySeenAttribute($seen){return $seen==1?"Seen":"Not Seen";}
    public function getMyPaidAttribute($seen){return $this->allPaidType[$this->paid_type];}
    public function getMyStatusAttribute(){return   self::$allStatus[$this->status];}


    public function getQuery()
    {
        return Order::query();
    }

    public function canBeCancelled()
    {
        if($this->status>3)
            return false;
        $cancellationPeriodMinutes = getSettingValue('order_cancellation_time');
        $createdAt = Carbon::parse($this->created_at);
        $deadline = $createdAt->addMinutes($cancellationPeriodMinutes);
        return Carbon::now()->lessThanOrEqualTo($deadline);
    }


    // 1. حساب قيمة الخصم الفعلية
    public function getDiscountAmountAttribute()
    {
        if ($this->price_after_offer !== null && (float)$this->price > 0) {
            return max(0, (float)$this->price - (float)$this->price_after_offer);
        }
        return (float) ($this->coupon_amount ?? 0);
    }

    // 2. حساب نسبة الخصم المئوية (%)
    public function getDiscountPercentageAttribute()
    {
        $originalPrice = (float) $this->price;
        $discountAmount = (float) $this->discount_amount;

        if ($originalPrice <= 0 || $discountAmount <= 0) {
            return 0;
        }

        return round(($discountAmount / $originalPrice) * 100, 2);
    }

    // 3. حساب السعر النهائي النهائي (شامل الشحن والخصومات والمحفظة)
    public function getFinalPriceAttribute()
    {
        $basePrice = $this->price_after_offer !== null 
            ? (float) $this->price_after_offer 
            : max(0, (float) $this->price - (float) ($this->coupon_amount ?? 0));

        $delivery = (float) ($this->delivery_price ?? 0);
        $wallet   = (float) ($this->amount_of_wallet ?? 0);

        return max(0, ($basePrice + $delivery) - $wallet);
    }
}
