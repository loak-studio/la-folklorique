<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Cart extends Model
{
    use HasFactory;
    public function items()
    {
        return $this->hasMany(CartItem::class);
    }
    public function getTotal()
    {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item->product->price * $item->quantity;
        }
        return $total;
    }

    public static function boot()
    {
        parent::boot();

        self::saving(function ($model) {
            $model->uuid = Str::uuid();
        });
    }
}
