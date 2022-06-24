<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function effect()
    {
        if ($this->free_shipping) {
            return 'Livraison offerte';
        }
        return '-' . $this->value  . ' €';
    }
}
