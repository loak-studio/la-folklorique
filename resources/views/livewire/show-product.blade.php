<div>
    <section class="w-full max-w-5xl mx-auto text-white lg:grid lg:grid-cols-9 lg:gap-24">
        <div class="col-span-5 ">
            <figure class=" aspect-[5/6] sm:w-8/12 mx-auto lg:w-full ">
                <img class="object-cover w-full h-full" src="/storage/{{ $displayedImage }}" alt="">
            </figure>
            <ul class="flex justify-center gap-2 mt-2">
                @foreach ($product->pictures as $picture)
                    <li>
                        <figure wire:click="setDisplayedImage('{{ $picture }}')"
                            class="cursor-pointer aspect-[5/6] w-20 rounded-md overflow-hidden border-transparent border-2 @if ($displayedImage == $picture) border-primary-500 @endif">
                            <img class="object-cover w-full h-full" src="/storage/{{ $picture }}" alt="">
                        </figure>
                    </li>
                @endforeach
            </ul>

        </div>
        <div class="col-span-4 px-4 mt-8 lg:px-0 lg:mt-0">
            <h1 class="text-4xl font-bold ">
                {{ $product->name }}
            </h1>
            <div class="flex items-center gap-2 pt-4 pb-8 border-b-2 border-green-700">
                <span class="text-lg font-semibold">{{ $product->getEuroPrice() }}€</span>
                <span class="text-sm ">TVA incluse</span>
            </div>
            <article class="mt-8">
                {!! Str::of($product->description)->markdown() !!}
            </article>
            <div data-add-to-cart class="flex items-center gap-10 mt-8">
                <livewire:input-number :quantity="$quantity" />
                <div class="-mt-6">
                    <x-button wire:click="addToCart">Ajouter au panier</x-button>
                </div>
            </div>
            <ul>
                <li>
                    <span class="flex items-center gap-2 mt-8">
                        <x-l-icon class="shrink-0" name="shield" />
                        Paiement 100% sécurisé
                    </span>
                </li>
                <li>
                    <span class="flex items-center gap-2 mt-8">
                        <x-l-icon class="shrink-0" name="truck" />
                        Livraison gratuite à partir de 50€
                    </span>
                </li>
                <li>
                    <span class="flex items-center gap-2 mt-8">
                        <x-l-icon class="shrink-0" name="home" />
                        <span>
                            Pas de livraison < 50km de leval-Trahegnies , vous pouvez livrer à la <a
                                class="text-primary-500 hover:underline" href="{{ route('faq') }}" target="_blank">
                                brasserie</a>
                        </span>
                    </span>
                </li>
            </ul>
        </div>
    </section>
    <img class="absolute hidden rotate-90 xl:block -left-52 blur-sm" src="/assets/orange3.webp" alt="">
    <img class="absolute hidden -mt-32 md:block -right-72 " src="/assets/confetti.svg" alt="">
    <x-product.featured :products="$featured_products" />
</div>
