<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use Livewire\Component;

class ShowCart extends Component
{
    public $cart;

    public function mount()
    {
        $this->cart = Cart::where('uuid', session('cart_uuid'))->first();
    }

    public function render()
    {
        return view('livewire.show-cart')->layout('layouts.main', [
            'title' => 'Panier',
            'breadcrumb' => [['name' => 'Panier', 'route' => 'panier']]
        ]);
    }
}
