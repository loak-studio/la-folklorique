<section class="w-full max-w-5xl mx-auto mt-24 mb-24">
    <h3 class="px-4 text-3xl text-white mb-7 lg:px-0">Autres produits</h3>
    <div class="flex gap-10 px-4 overflow-x-scroll md:overflow-x-auto md:grid md:grid-cols-4 lg:px-0">
        @foreach ($products as $product)
            <x-product.card :product="$product" />
        @endforeach
    </div>
</section>
