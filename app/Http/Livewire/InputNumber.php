<?php

namespace App\Http\Livewire;

use Livewire\Component;

class InputNumber extends Component
{
    public $quantity;
    public $cartItem;

    public function increase()
    {
        $this->quantity++;
        $this->emit('quantityChanged', $this->quantity, $this->cartItem);
    }

    public function decrease()
    {
        $this->quantity--;
        $this->emit('quantityChanged', $this->quantity, $this->cartItem);
    }

    public function render()
    {
        return view('livewire.input-number');
    }
}
