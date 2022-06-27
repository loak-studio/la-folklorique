<div class="sticky top-0 z-10 p-4 text-white lg:col-span-4 space-y-7">
    <h2 class="text-3xl font-semibold border-b-2 border-gray-700 pb-7">Total</h2>
    <div class="flex justify-between">
        <span>
            Sous-total
        </span>
        <span>
            {{ $cart->getProductsSumInEuros() }}€
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
            {{ $cart->getTotalInEuros() }}€
        </span>
    </div>

    @if ($type == 'payment')
        <div>
            <p>Vos données personnelles seront utilisées pour le traitement de votre commande, vous accompagner au cours
                de votre visite du site web, et pour d’autres raisons décrites dans notre politique de confidentialité.
            </p>
            <div class="mt-5">
                <input wire:model="acceptCGV" wire:change="setCGV" type="checkbox" name="cgv" id="cgv">
                <span>
                    <label for="cgv">J’ai lu et j’accepte les </label>
                    <a class="text-primary-500 hover:underline" href="{{ route('cgv') }}">conditions
                        générales</a>
                </span>
            </div>
        </div>
    @endif
    @if ($cart->getProductsSum() > 1200)
        @if ($type == 'cart')
            <x-button wire:click="handleButton">{{ $buttonLabel }}</x-button>
        @endif
        @if ($type == 'payment')
            @if ($acceptCGV)
                <x-button wire:click="handleButton">{{ $buttonLabel }}</x-button>
            @else
                <p>Vous devez accepter nos conditions générales de vente afin de procéder au paiement</p>
            @endif

        @endif
    @else
        <p>Le minimum d’achat est de 12€ afin de pouvoir passer commande</p>
    @endif
    <livewire:cart.coupon />
</div>
