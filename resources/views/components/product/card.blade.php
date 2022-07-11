<div class="relative text-white group">
    <div class="relative w-full overflow-hidden md:w-auto aspect-square">
        <img src="/assets/confetti-hover.svg"
            class="absolute object-cover w-full h-full transition scale-150 opacity-0 group-hover:rotate-12 group-hover:opacity-100"
            alt="">
        <figure class="w-full h-full">
            <img class="object-cover object-center w-full h-full" src="/storage/{{ $product->pictures[0] }}"
                alt="">
        </figure>
    </div>
    <h2 class="text-lg font-semibold ">{{ $product->name }}</h2>
    <span>
        <span class="font-bold">{{ $product->getEuroPrice() }} €</span>

        @if (!empty($product->old_price))
            <del class="text-sm">{{ $product->getEuroOldPrice() }}€</del>
        @endif
    </span>
    <a class="before:inset-0 before:absolute" href="{{ route('product', $product->slug) }}">
        <span class="sr-only">Voir {{ $product->name }}</span>
    </a>
</div>
