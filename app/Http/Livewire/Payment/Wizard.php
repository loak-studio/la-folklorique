<?php

namespace App\Http\Livewire\Payment;

use Livewire\Component;
use Illuminate\Validation\Rule;

class Wizard extends Component
{
    public $shippingPlace = 'home';
    public $showBillingAddress = false;
    public $differentBillingAddress = false;
    public $paymentMethod = "creditCard";
    public $notes;
    public $step = 3;
    public $shipping_address = [
        'first_name' => '',
        'last_name' => '',
        'street' => '',
        'city' => '',
        'zip' => '',
        'country' => '',
    ];
    public $billing_address = [
        'first_name' => '',
        'last_name' => '',
        'street' => '',
        'city' => '',
        'zip' => '',
        'country' => '',
        'email' => '',
        'phone' => '',
    ];

    protected function rules()
    {

        $zipcodes = ['7500'];
        //Livraison à la brasserie
        if ($this->shippingPlace == "brewery") {
            return [
                'billing_address.first_name' => 'required',
                'billing_address.last_name' => 'required',
                'billing_address.street' => 'required',
                'billing_address.number' => 'required',
                'billing_address.city' => 'required',
                'billing_address.zip' => 'required|digits:4',
                'billing_address.country' => 'required',
                'billing_address.email' => 'required|email',
                'billing_address.phone' => 'required',
            ];
        }
        if ($this->shippingPlace == "home") {
            //Si l'adresse de livrasion est l'adresse de facturation, copie l'adresse de livraison
            if (!$this->differentBillingAddress) {
                $this->shipping_address = $this->billing_address;
                return [
                    'billing_address.first_name' => 'required',
                    'billing_address.last_name' => 'required',
                    'billing_address.street' => 'required',
                    'billing_address.number' => 'required',
                    'billing_address.city' => 'required',
                    'billing_address.zip' =>
                    [
                        'required', 'digits:4',
                        Rule::in($zipcodes)
                    ],
                    'billing_address.country' => 'required',
                    'billing_address.email' => 'required|email',
                    'billing_address.phone' => 'required',
                    'shipping_address.first_name' => 'required',
                    'shipping_address.last_name' => 'required',
                    'shipping_address.street' => 'required',
                    'shipping_address.number' => 'required',
                    'shipping_address.city' => 'required',
                    'shipping_address.zip' =>
                    [
                        'required', 'digits:4',
                        Rule::in($zipcodes)
                    ],
                    'shipping_address.country' => 'required',
                ];
            } else {
                return [
                    'billing_address.first_name' => 'required',
                    'billing_address.last_name' => 'required',
                    'billing_address.street' => 'required',
                    'billing_address.number' => 'required',
                    'billing_address.city' => 'required',
                    'billing_address.zip' => 'required|digits:4',
                    'billing_address.country' => 'required',
                    'billing_address.email' => 'required|email',
                    'billing_address.phone' => 'required',
                    'shipping_address.first_name' => 'required',
                    'shipping_address.last_name' => 'required',
                    'shipping_address.street' => 'required',
                    'shipping_address.number' => 'required',
                    'shipping_address.city' => 'required',
                    'shipping_address.zip' =>
                    [
                        'required', 'digits:4',
                        Rule::in($zipcodes)
                    ],
                    'shipping_address.country' => 'required',
                ];
            }
        }
    }

    protected $listeners = ['shippingPlaceChanged', 'updateDifferentBillingAddress', 'nextStep'];

    public function shippingPlaceChanged($value)
    {
        $this->shippingPlace = $value;
        $this->emit('updateShippingPlace', $value);
    }

    public function nextStep()
    {
        if ($this->step == 1) {
            $this->validate();
        }
        if ($this->step == 2) {
        }
        if ($this->step == 3) {
        }
        $this->step++;
    }
    public function updateDifferentBillingAddress($value)
    {
        $this->showBillingAddress = $value;
    }

    public function render()
    {
        return view('livewire.payment.wizard')->layout('layouts.main', [
            'title' => 'Paiement de votre commande',
        ]);
    }
}
