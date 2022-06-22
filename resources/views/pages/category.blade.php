<x-main-layout :breadcrumb="[
    ['name' => 'Boutique', 'route' => route('boutique')],
    ['name' => $category->name, 'route' => route('produit', $category->slug)],
]" :title="$category->name">
    <x-products-container>
        @foreach ($products as $product)
            <x-product-card :product="$product" />
        @endforeach
    </x-products-container>
</x-main-layout>
