<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class ShowProduct extends Component
{
    public $product;


    public function mount($slug)
    {
        $this->product = Product::where('slug', $slug)->first();
    }

    public function render()
    {
        return view('livewire.show-product')->layout('layouts.main', [
            'title' => $this->product->name,
            'hideTitle' => true,
            'breadcrumb' => [
                ['name' => 'Boutique', 'route' => route('boutique')],
                ['name' => $this->product->categories[0]->name, 'route' => route('product', $this->product->categories[0]->slug)],
                ['name' => $this->product->name, 'route' => route('product', $this->product->slug)],
            ]
        ]);
    }
}
