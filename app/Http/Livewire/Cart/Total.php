<?php

namespace App\Http\Livewire\Cart;

use App\Models\Cart;
use App\Models\Coupon;
use Livewire\Component;

class Total extends Component
{
    public $coupon;
    public $cart;
    public $buttonLabel = "Passer la commande";
    public $type;
    public $acceptCGV = false;
    public $lastStep = false;
    public $showShippingCost = false;

    protected $listeners = ['updateCoupon', 'updatePrice'];

    public function updatePrice()
    {
        $this->cart = Cart::getCart();
    }

    public function setCGV()
    {
        $this->emit('CGVupdate', $this->acceptCGV);
    }

    public function handleButton()
    {
        if ($this->type == 'cart') {
            return redirect()->route('paiement');
        } else {
            $this->emit('nextStep');
        }
    }

    public function updateCoupon()
    {
        $this->coupon = Cart::getCart()->coupon;
    }

    public function mount()
    {
        $this->coupon = Cart::getCart()->coupon;
    }

    public function render()
    {
        $this->cart = Cart::getCart();
        return view('livewire.cart.total');
    }
}
