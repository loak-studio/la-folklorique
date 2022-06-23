<?php

namespace App\Http\Livewire\Cart;

use App\Models\Cart;
use App\Models\Coupon;
use Livewire\Component;

class Total extends Component
{
    public $shipping_cost;
    public $coupon;
    public $cart;

    protected $listeners = ['updateCoupon'];

    public function updateCoupon()
    {
        $this->coupon = Coupon::where('code', session('coupon_code'))->first();
    }

    public function mount()
    {
        $this->coupon = Coupon::where('code', session('coupon_code'))->first();
    }

    public function render()
    {
        $this->cart = Cart::getCart();
        return view('livewire.cart.total');
    }
}
