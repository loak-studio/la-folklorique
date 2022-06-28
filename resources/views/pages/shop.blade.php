<x-main-layout title="Boutique" :breadcrumb="[['name' => 'Boutique', 'route' => 'shop']]">
    <x-product.container>
        @foreach ($products as $product)
            <x-product.card :product="$product" />
        @endforeach
    </x-product.container>

    <img class="absolute right-0 hidden -mt-32 -z-10 md:block " src="/assets/confetti.svg" alt="">
</x-main-layout>
