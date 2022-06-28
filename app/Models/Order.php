<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function getTotalInEuros()
    {
        return $this->price / 100;
    }

    public function coupon()
    {
        return $this->belongsTo(Coupon::class);
    }
}
