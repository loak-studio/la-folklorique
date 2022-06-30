<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class Cart extends Model
{
    use HasFactory;
    public function items()
    {
        return $this->hasMany(CartItem::class);
    }
    public function getProductsSum()
    {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item->product->price * $item->quantity;
        }
        return $total;
    }

    public function getProductsSumInEuros()
    {
        return $this->getProductsSum() / 100;
    }

    public function getTotal()
    {
        $total = 0;
        $total += $this->getProductsSum();
        if ($this->coupon) {
            $total -= $this->coupon->value;
        }
        return $total > 0 ? $total : 0;
    }

    public function getTotalWithShippingCost()
    {
        $total = $this->getTotal();
        $total += $this->getShippingCost();
        return $total;
    }

    public function getTotalWithShippingCostInEuros()
    {
        return $this->getTotalWithShippingCost() / 100;
    }

    public function getTotalInEuros()
    {
        return $this->getTotal() / 100;
    }

    public function getShippingCost()
    {
        if (session('shipping_place') == 'home') {
            if ($this->getTotal() >= 5000) {
                return 0;
            }
            if ($this->coupon && $this->coupon->free_shipping) {
                return 0;
            }
            return 500;
        } else {
            return 0;
        }
    }

    public function getShippingCostInEuros()
    {
        return $this->getShippingCost() / 100;
    }

    public function coupon()
    {
        return $this->belongsTo(Coupon::class);
    }

    public static function getCart()
    {
        return Cart::where('uuid', session('cart_uuid'))->first();
    }

    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model->uuid = Str::uuid();
        });
    }
}
