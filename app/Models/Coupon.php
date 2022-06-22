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
        if ($this->is_in_euros) {
            return '-' . $this->value . ' €';
        } else {
            return '-' . $this->value . ' %';
        }
    }
}
