<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Coupon;


class Vendor extends Model
{
    use HasFactory;

    public function coupons()
{
    return $this->hasMany(Coupon::class);
}

protected $fillable = [
    'code',
    'description',
    'discount',
    'min_order_amount',
    'max_coupon_amount',
    'percentage',
    'expires_on',
    'times',
    'is_active',
    'creator_id',
    'vendor_id',
];

public function vendor()
{
    return $this->belongsTo(Vendor::class);
}

}
