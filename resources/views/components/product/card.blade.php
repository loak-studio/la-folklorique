<div class="relative text-white">
    <figure class=" h-44 w-36 lg:h-64 lg:w-52">
        <img class="object-cover object-center w-full h-full" src="/storage/{{ $product->pictures[0] }}" alt="">

    </figure>
    <h2 class="text-lg font-semibold ">{{ $product->name }}</h2>
    <span>
        {{ $product->getEuroPrice() }} €
    </span>
    <a class="before:inset-0 before:absolute" href="{{ route('product', $product->slug) }}">
        <span class="sr-only">Voir {{ $product->name }}</span>
    </a>
</div>
