<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Address extends Component
{
    public $shippingPlace = "home";
    public $showBillingForm = false;
    public $billing_address = [];
    protected $listeners = ['shippingPlaceChanged'];

    public function shippingPlaceChanged($value)
    {
        $this->shippingPlace = $value;
    }

    public function mount()
    {

        $this->showBillingForm = !empty(session('different_address'));
        $this->shippingPlace = !empty(session('shipping_place')) ? session('shipping_place') : 'home';
    }

    public function render()
    {
        return view('livewire.address');
    }
}
