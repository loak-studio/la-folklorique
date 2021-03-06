<?php

namespace App\Http\Livewire\Header;

use App\Models\Cart as ModelsCart;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class Cart extends Component
{
    public $color = "#ffffff";
    public $quantity = 0;

    protected $listeners = ['updateCartDisplayedQuantity'];

    public function updateCartDisplayedQuantity()
    {
        $cart = ModelsCart::where('uuid', session('cart_uuid'))->first();
        $this->quantity = $cart->items->sum('quantity');
    }

    public function mount()
    {
        $cart = ModelsCart::where('uuid', session('cart_uuid'))->first();
        if ($cart) {

            $this->quantity = $cart->items->sum('quantity');
        } else {
            $this->quantity = 0;
        }
    }

    public function render()
    {
        return view('livewire.header.cart');
    }
}
