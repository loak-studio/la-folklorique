<x-main-layout :breadcrumb="[
    ['name' => 'Boutique', 'route' => route('boutique')],
    ['name' => $product->categories[0]->name, 'route' => route('produit', $product->categories[0]->slug)],
    ['name' => $product->name, 'route' => route('produit', $product->slug)],
]" hideTitle="true" :title="$product->name">

</x-main-layout>
