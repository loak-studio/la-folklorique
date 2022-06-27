<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class ShowProduct extends Component
{
    public $product;
    public $featured_products;
    public $quantity = 1;
    public $hasBeenAdded = false;
    public $displayedImage;
    protected $listeners = ['quantityChanged'];


    public function quantityChanged($value)
    {
        $this->quantity = $value;
    }

    public function addToCart()
    {

        $cart = Cart::getCart();
        if ($cart->items->pluck('product_id')->contains($this->product->id)) {
            $cart_item = CartItem::where([
                ['product_id', $this->product->id],
                ['cart_id', $cart->id],
            ])->first();
            $cart_item->quantity += $this->quantity;
            $cart_item->save();
        } else {
            $cart_item = new CartItem();
            $cart_item->cart_id = $cart->id;
            $cart_item->product_id = $this->product->id;
            $cart_item->quantity = $this->quantity;
            $cart_item->save();
        }


        $this->emit('updateCartDisplayedQuantity');
    }

    public function setDisplayedImage($url)
    {
        $this->displayedImage = $url;
    }

    public function mount($slug)
    {
        $this->product = Product::where('slug', $slug)->first();
        if (empty($this->product)) {
            abort(404);
        }
        $this->displayedImage = $this->product->pictures[0];
        $this->featured_products = Product::where('id', '!=', $this->product->id)->limit(4)->inRandomOrder()->get();
    }

    public function render()
    {
        return view('livewire.show-product')->layout('layouts.main', [
            'title' => $this->product->name,
            'hideTitle' => true,
            'breadcrumb' => [
                ['name' => 'Boutique', 'route' => route('boutique')],
                ['name' => $this->product->categories[0]->name, 'route' => route('category', $this->product->categories[0]->slug)],
                ['name' => $this->product->name, 'route' => route('product', $this->product->slug)],
            ]
        ]);
    }
}
