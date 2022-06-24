<x-main-layout title="Mode de paiement">
    <x-checkout.steps.display current="2" total="4" />
    <form method="POST" action="{{ route('checkout-address') }}"
        class="grid w-full max-w-5xl gap-5 p-5 mx-auto mb-24 lg:grid-cols-10 bg-zinc-900">
        @csrf
        <div class="p-5 lg:col-span-6 bg-zinc-800">
            <h1 class="mb-10 text-4xl font-bold text-white mt-marker:12 lg:col-span-10">Moyen de paiement</h1>
            <ul class="space-y-10 text-white lg:col-span-6">
                <li class="flex items-center">
                    <input value="creditCard" checked type="radio" class="mr-5" name="paymentMethod" value="creditCard"
                        id="creditCard">
                    <label for="creditCard" class="w-full">Carte de crédit</label>
                    <div class="flex gap-5">
                        <x-payment.mastercard />
                        <x-payment.maestro />
                        <x-payment.visa />
                        <x-payment.bancontact />

                    </div>
                </li>
                <li class="flex items-center">
                    <input value="paypal" type="radio" class="mr-5" name="paymentMethod" value="paypal"
                        id="paypal">
                    <label for="paypal" class="w-full">
                        Paypal
                    </label>
                    <x-payment.paypal />
                </li>

                <li class="flex">
                    <input value="bankTransfer" type="radio" class="mr-5" name="paymentMethod" value="bankTransfer"
                        id="bankTransfer">
                    <label for="bankTransfer" class="w-full">Virement bancaire</label>
                    <x-payment.virement />
                </li>

                @if (session('order_informations')['shipping_place'] == 'home')
                    <li class="flex items-center">
                        <input value="afterShipping" wire:model="paymentMethod" type="radio" class="mr-5"
                            name="paymentMethod" value="afterShipping" id="afterShipping">
                        <label for="afterShipping" class="flex flex-col">
                            <span>Paiement à la livraison <br><small class="text-sm">Moyen de paiement disponible
                                    lors
                                    de la livraison : Payconiq ou en liquide</small></span>
                        </label>

                    </li>
                @endif
            </ul>
        </div>
        <div class="lg:col-span-4">
            <div class="sticky top-0 z-10 p-4 text-white space-y-7">
                <h2 class="text-3xl font-semibold border-b-2 border-gray-700 pb-7">Total</h2>
                <div class="flex justify-between">
                    <span>Sous-total</span>
                    <span> {{ $cart->getProductsSum() }}€</span>
                </div>
                <p>Frais de livraison calculés à l'étape suivante</p>
                @if ($cart->coupon)
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
                </div>
                <x-button>paiement etc</x-button>
                <livewire:cart.coupon />
            </div>
        </div>
    </form>
</x-main-layout>
