<?php

namespace App\Http\Livewire\Payment;

use Livewire\Component;

class ShippingPlace extends Component
{
    public $shippingPlace = "home";

    public function setShippingPlace($value)
    {
        $this->shippingPlace = $value;
        $this->emit('shippingPlaceChanged', $value);
    }

    public function render()
    {
        return view('livewire.payment.shipping-place');
    }
}
