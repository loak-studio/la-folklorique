<div class="relative text-white group">
    <div class="w-44 md:w-auto relative overflow-hidden aspect-[3/4]">
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
        @if (!empty($product->old_price))
            <del class="text-sm">{{ $product->old_price }}€</del>
        @endif
        {{ $product->getEuroPrice() }} €
    </span>
    <a class="before:inset-0 before:absolute" href="{{ route('product', $product->slug) }}">
        <span class="sr-only">Voir {{ $product->name }}</span>
    </a>
</div>
