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
  
        
   
    @if (session('shipping_place') == 'home' && $showShippingCost)
        <div class="flex justify-between">
            <span>Frais de livraison</span>
            <span>{{ $cart->getShippingCostText() }}</span>
        </div>
    @else
        <p>Frais de livraison calculés à l'étape suivante</p>
    @endif

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
            {{ $cart->getTotalWithShippingCostInEuros() }}€
        </span>
    </div>

    @if ($lastStep)
    <p>Vos données personnelles seront utilisées pour le traitement de votre commande, vous accompagner
        au cours de votre visite du site web, et pour d’autres raisons décrites dans notre
        <a class="text-primary-500 hover:underline" href="{{ route('politique-de-confidentialite') }}"
            target="_blank">politique de
            confidentialité</a>
        .
    </p>
    <div>
        <input class="text-primary-500" type="checkbox" name="cgv" required id="cgv">
        <span>
            <label for="cgv">
                J’ai lu et j’accepte
            </label>
            <a class="text-primary-500 hover:underline" target="_blank" href="{{ route('cgv') }}">
                les conditions générales
            </a>
        </span>
    </div>
    @endif
    @if ($cart->getTotal() > 1200)
            <x-button wire:click="handleButton">{{ $buttonLabel }}</x-button>
    @else
        <p>Le minimum d’achat est de 12€ afin de pouvoir passer commande</p>
    @endif
    <livewire:cart.coupon />
</div>
