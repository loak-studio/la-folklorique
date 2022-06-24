<x-main-layout title="Mode de paiement">
    <x-checkout.steps.display current="3" total="4" />
    <form method="POST" action="{{ route('checkout-payment-method') }}"
        class="grid w-full max-w-5xl gap-5 p-5 mx-auto mb-24 lg:grid-cols-10 bg-zinc-900">
        @csrf
        <div class="p-5 lg:col-span-6 bg-zinc-800">
            <h2 class="my-5 text-3xl font-semibold text-white">Récapitulatif</h2>
            <h3 class="my-5 text-2xl font-semibold text-white">
                Commande
            </h3>
            <ul>
                @foreach ($cart->items as $cart_item)
                    <li class="text-white">
                        {{ $cart_item->product->name }} ({{ $cart_item->quantity }}) -
                        {{ $cart_item->quantity * $cart_item->product->price }}
                    </li>
                @endforeach
            </ul>
            <h3 class="flex justify-between my-5 text-2xl font-semibold text-white">
                Paiement <span wire:click="setStep(2)">crayon</span>
            </h3>
            <div class="flex justify-between text-white">
                @switch(session('payment_method'))
                    @case('creditCard')
                        <span>Carte de crédit</span>
                        <div class="flex gap-5">
                            <x-payment.mastercard />
                            <x-payment.maestro />
                            <x-payment.visa />
                            <x-payment.bancontact />
                        </div>
                    @break

                    @case('paypal')
                        <span>Paypal</span>
                        <x-payment.paypal />
                    @break

                    @case('bankTransfer')
                        <span>Virement</span>
                        <x-payment.virement />
                    @break

                    @default
                @endswitch

            </div>
            <h3 class="flex justify-between my-5 text-2xl font-semibold text-white">
                Adresse <span wire:click="setStep(1)">crayon</span>
            </h3>
            @if (session('shipping_place') == 'home')
                <h4 class="my-5 text-xl font-semibold text-white">
                    Adresse de livraison
                </h4>
                <p class="text-white">
                    <span class="block">
                        {{ session('shipping_address_first_name') }}
                        {{ session('shipping_address_last_name') }}
                    </span>
                    {{ session('shipping_address_number') }}
                    {{ session('shipping_address_street') }},
                    {{ session('shipping_address_zip_code') }}
                    {{ session('shipping_address_city') }}
                    ({{ session('shipping_address_country') }})
                </p>
            @endif

            <h4 class="my-5 text-xl font-semibold text-white">
                Adresse de facturation
            </h4>
            <ul class="text-white">
                <span class="block">
                    {{ session('billing_address_first_name') }}
                    {{ session('billing_address_last_name') }}
                </span>
                {{ session('billing_address_number') }}
                {{ session('billing_address_street') }},
                {{ session('billing_address_zip_code') }}
                {{ session('billing_address_city') }}
                ({{ session('billing_address_country') }})

            </ul>
        </div>
        <div class="lg:col-span-4">
            <div class="sticky top-0 z-10 p-4 text-white space-y-7">
                <h2 class="text-3xl font-semibold border-b-2 border-gray-700 pb-7">Total</h2>
                <div class="flex justify-between">
                    <span>Sous-total</span>
                    <span> {{ $cart->getProductsSum() }}€</span>
                </div>
                @if (session('shipping_place') == 'home')
                    <p>Frais de livraison calculés à l'étape suivante</p>
                @endif
                @if ($cart->coupon)
                    <div class="flex justify-between">
                        <span>
                            Code promo ({{ $cart->coupon->code }})
                        </span>
                        <span>
                            {{ $cart->coupon->effect() }}
                        </span>
                    </div>
                @endif
                <div class="flex justify-between border-t-2 border-green-700 pt-7">
                    <p class="text-lg">
                        Total <span class="text-sm text-gray-400 ">(TVA incluse)</span>
                    </p>
                </div>
                <x-button>paiement etc</x-button>
                <livewire:cart.coupon />
            </div>
        </div>
    </form>
</x-main-layout>
