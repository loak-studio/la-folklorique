<div class="sticky top-0 z-10 col-span-4 p-4 text-white space-y-7">
    <h2 class="text-3xl font-semibold border-b-2 border-gray-700 pb-7">Total</h2>
    <div class="flex justify-between">
        <span>
            Sous-total
        </span>
        <span>
            {{ $cart->getTotal() }}€
        </span>
    </div>
    @unless($shipping_cost)
        <p>Frais de livraison calculés à l'étape suivante</p>
    @endunless
    @if ($coupon)
        <div class="flex justify-between">
            <span>
                Code promo ({{ $coupon->code }})
            </span>
            <span>
                {{ $coupon->effect() }}
            </span>
        </div>
    @endif
    <div class="flex justify-between border-t-2 border-green-700 pt-7">
        <p class="text-lg">
            Total <span class="text-sm text-gray-400 ">(TVA incluse)</span>
        </p>
        <span>
            {{ $cart->getTotal() - ($coupon && !$coupon->free_shipping ? $coupon->value : 0) }}€
        </span>
    </div>
    @if ($cart->getTotal() > 12)
        <x-button wire:click="handleButton">{{ $buttonLabel }}</x-button>
    @else
        <p>Le minimum d’achat est de 12€ afin de pouvoir passer commande</p>
    @endif
    <livewire:cart.coupon />
</div>
