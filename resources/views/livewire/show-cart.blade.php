<div class="grid w-full max-w-5xl gap-5 mx-auto mb-24 lg:p-5 lg:grid-cols-10 bg-zinc-900">
    <ul class="p-5 text-white lg:col-span-6 bg-zinc-800">
        @if ($cart->items->count() == 0)
            <p class="text-center">Votre panier est vide</p>
        @endif
        @foreach ($cart->items as $cart_item)
            <li class="flex gap-9 @unless($loop->last) border-b-2 border-gray-500 pb-5 mb-5 @endunless">
                <figure class=" aspect-[3/4] lg:w-36 w-28">
                    <img class="object-cover w-full h-full" src="/storage/{{ $cart_item->product->pictures[0] }}"
                        alt="">
                </figure>
                <div>
                    <h2>{{ $cart_item->product->name }}</h2>
                    <span class="block my-5">Prix unitaire: {{ $cart_item->product->getEuroPrice() }}€</span>
                    <div class="flex gap-12">
                        <livewire:input-number wire:key="{{ $loop->index }}" :quantity="$cart_item->quantity" :cartItem="$cart_item->id" />
                        <span>
                            {{ $cart_item->quantity * $cart_item->product->getEuroPrice() }}€
                        </span>
                    </div>
                    <button class="mt-5 text-gray-500 hover:underline" wire:click="deleteItem({{ $cart_item->id }})">
                        Supprimer
                    </button>
                </div>
            </li>
        @endforeach
    </ul>
    <livewire:cart.total type="cart" />
</div>
