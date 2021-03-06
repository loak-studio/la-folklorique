<?php

namespace App\Http\Livewire\Payment;

use Livewire\Component;

class ShippingPlace extends Component
{
    public $shippingPlace = "home";
    public function setShippingPlace($value)
    {
        $this->shippingPlace = $value;
        session()->put('shipping_place', $value);
        $this->emit('shippingPlaceChanged', $value);
    }

    public function mount()
    {
        if (!empty(session('shipping_place'))) {
            $this->shippingPlace = session('shipping_place');
        }
    }

    public function render()
    {

        return view('livewire.payment.shipping-place');
    }
}
