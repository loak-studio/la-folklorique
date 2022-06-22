<?php

namespace App\Http\Livewire\Header;

use App\Models\Cart as ModelsCart;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class Cart extends Component
{
    public $color = "#ffffff";
    public $quantity = 0;

    public function mount()
    {
        $cart = ModelsCart::where('uuid', session('cart_uuid'))->first();
        $this->quantity = $cart->items->count();
    }

    public function render()
    {
        return view('livewire.header.cart');
    }
}
