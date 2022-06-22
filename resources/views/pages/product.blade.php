<x-main-layout :breadcrumb="[
    ['name' => 'Boutique', 'route' => route('boutique')],
    ['name' => $product->categories[0]->name, 'route' => route('produit', $product->categories[0]->slug)],
    ['name' => $product->name, 'route' => route('produit', $product->slug)],
]" hideTitle="true" :title="$product->name">
    <section class="w-full max-w-5xl mx-auto text-white lg:grid lg:grid-cols-9 lg:gap-24">
        <div class="col-span-5">
            <figure class=" aspect-[5/6] sm:w-8/12 mx-auto lg:w-full ">
                <img data-current-image class="object-cover w-full h-full" src="/{{ $product->pictures[0] }}"
                    alt="">
            </figure>
            <ul class="flex justify-center gap-2 mt-2">
                @foreach ($product->pictures as $picture)
                    <li>
                        <figure
                            class="cursor-pointer aspect-[5/6] w-20 rounded-md overflow-hidden border-transparent border-2">
                            <img data-image class="object-cover w-full h-full" src="/{{ $picture }}" alt="">
                        </figure>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="col-span-4 px-4 lg:px-0">
            <h1 class="text-4xl font-bold ">
                {{ $product->name }}
            </h1>
            <div class="flex items-center gap-2 pt-4 pb-8 border-b-2 border-green-700">
                <span class="text-lg font-semibold">{{ $product->price }}€</span>
                <span class="text-sm ">TVA incluse</span>
            </div>
            <article class="mt-8">
                {!! Str::of($product->description)->markdown() !!}
            </article>
            <livewire:product.add-to-cart :product="$product" />
            <span class="flex items-center gap-2 mt-8">
                <x-l-icon name="shield" />
                Paiement 100% sécurisé
            </span>
        </div>
    </section>
    <x-featured-products :products="$products" />
</x-main-layout>
