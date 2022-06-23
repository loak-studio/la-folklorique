<?php

namespace App\Http\Livewire\Cart;

use App\Models\Coupon as ModelsCoupon;
use Livewire\Component;

class Coupon extends Component
{
    public $displayInput = false;
    public $code;
    public $coupon;

    public function deleteCoupon()
    {
        session()->forget('coupon_code');
        $this->coupon = null;
        $this->code = null;
        $this->displayInput = false;
        $this->emit('updateCoupon');
    }

    public function applyCoupon()
    {
        $this->coupon = ModelsCoupon::where('code', $this->code)->first();
        if ($this->coupon) {
            $this->resetErrorBag('coupon');
            session()->put('coupon_code', $this->coupon->code);
            $this->emit('updateCoupon');
        } else {
            $this->addError('coupon', 'Ce code est invalide');
        }
    }

    public function toggleDisplayInput()
    {
        $this->displayInput = !$this->displayInput;
    }

    public function render()
    {
        if (session('coupon_code')) {
            $this->coupon = ModelsCoupon::where('code', session('coupon_code'))->first();
            $this->code = $this->coupon->code;
            $this->displayInput = true;
        }
        return view('livewire.cart.coupon');
    }
}
