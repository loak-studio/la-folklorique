<x-main-layout title="Boutique" :breadcrumb="[['name' => 'Boutique', 'route' => 'shop']]">
    <x-product.container>
        @foreach ($products as $product)
            <x-product.card :product="$product" />
        @endforeach
    </x-product.container>
</x-main-layout>
