<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Entities\Admin\Client;

class PromoCodeUsage extends Model
{
    use HasFactory;

    protected $fillable = [
        'promo_code_id',
        'client_id',
        'email'
    ];

    public function promoCode()
    {
        return $this->belongsTo(PromoCode::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}