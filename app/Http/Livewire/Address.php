<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Address extends Component
{
    public $shippingPlace = "home";
    public $showBillingForm = false;
    public $billing_address;
    protected $listeners = ['shippingPlaceChanged'];

    public function shippingPlaceChanged($value)
    {
        $this->shippingPlace = $value;
    }

    public function mount()
    {

        $this->showBillingForm = !empty(session('different_address'));
    }

    public function render()
    {
        return view('livewire.address');
    }
}
