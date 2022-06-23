<div class="grid w-full max-w-5xl gap-5 p-5 mx-auto mb-24 lg:grid-cols-10 bg-zinc-900">
    <ul class="p-5 text-white lg:col-span-6 bg-zinc-800">
        @if ($cart->items->count() == 0)
            <p class="text-center">Votre panier est vide</p>
        @endif
        @foreach ($cart->items as $cart_item)
            <li class="flex gap-9">
                <figure class=" aspect-[3/4] w-36">
                    <img src="/{{ $cart_item->product->pictures[0] }}" alt="">
                </figure>
                <div>
                    <h2>{{ $cart_item->product->name }}</h2>
                    <span>Prix unitaire: {{ $cart_item->product->price }}</span>
                    <div class="flex">
                        <livewire:input-number wire:key="{{ $loop->index }}" :quantity="$cart_item->quantity" :cartItem="$cart_item->id" />
                        <span>
                            {{ $cart_item->quantity * $cart_item->product->price }}€
                        </span>
                    </div>
                    <button wire:click="deleteItem({{ $cart_item->id }})">
                        Supprimer
                    </button>
                </div>
            </li>
        @endforeach
    </ul>
    <livewire:cart.total type="cart" />
</div>
