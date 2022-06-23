<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class ShowCart extends Component
{
    public $cart;

    protected $listeners = ['quantityChanged'];

    public function quantityChanged($value, $id)
    {
        $this->cart->items->where('id', $id)->first()->update(['quantity' => $value]);
        $this->emit('updateCartDisplayedQuantity');
        $this->emit('updatePrice');
    }

    public function deleteItem($id)
    {
        $item = CartItem::find($id);
        $item->delete();
        $this->emit('updateCartDisplayedQuantity');
        $this->emit('updatePrice');
    }


    public function render()
    {

        $this->cart = Cart::getCart();
        return view('livewire.show-cart')->layout('layouts.main', [
            'title' => 'Panier',
            'breadcrumb' => [['name' => 'Panier', 'route' => 'panier']]
        ]);
    }
}
