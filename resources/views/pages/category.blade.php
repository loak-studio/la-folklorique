<x-main-layout :breadcrumb="[
    ['name' => 'Boutique', 'route' => route('boutique')],
    ['name' => $category->name, 'route' => route('category', $category->slug)],
]" :title="$category->name">
    <x-product.container>
        @foreach ($products as $product)
            <x-product.card :product="$product" />
        @endforeach
    </x-product.container>
</x-main-layout>
