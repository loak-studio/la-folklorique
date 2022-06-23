<div class="grid w-full max-w-5xl grid-cols-10 mx-auto bg-zinc-900">
    <ul class="col-span-6 text-white">
        {{ dump($cart->items) }}
        @foreach ($cart->items as $card_item)
            <li>
                {{ $cart_item->product->name }}
            </li>
        @endforeach
    </ul>
    <livewire:card.total />
</div>
