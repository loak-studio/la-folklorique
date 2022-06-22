<x-main-layout title="Boutique" :breadcrumb="[['name' => 'Boutique', 'route' => 'shop']]">
    <x-products-container>
        @foreach ($products as $product)
            <x-product-card :product="$product" />
        @endforeach
    </x-products-container>
</x-main-layout>
