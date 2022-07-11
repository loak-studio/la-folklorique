<x-main-layout title="Mode de paiement">
    <x-checkout.steps.display current="2" total="4" />
    <form method="POST" action="{{ route('checkout-payment-method') }}"
        class="grid w-full max-w-5xl gap-5 mx-auto mb-24 lg:p-5 lg:grid-cols-10 bg-zinc-900">
        @csrf
        <div class="p-5 lg:col-span-6 bg-zinc-800">
            <h1 class="mb-10 text-4xl font-bold text-white mt-marker:12 lg:col-span-10">Moyen de paiement</h1>
            <ul class="space-y-10 text-white lg:col-span-6">
                <li class="flex items-center">
                    <input required @checked(empty(session('payment_method')) || session('payment_method') === 'stripe') value="stripe" type="radio" class="mr-5"
                        name="payment_method" value="creditCard" id="creditCard">
                    <label for="creditCard" class="w-full">Carte de banque</label>
                    <div class="hidden gap-5 lg:flex">
                        <x-payment.mastercard />
                        <x-payment.maestro />
                        <x-payment.visa />
                        <x-payment.bancontact />

                    </div>
                </li>
                <li class="flex items-center">
                    <input @checked(session('payment_method') === 'paypal') value="paypal" type="radio" class="mr-5"
                        name="payment_method" id="paypal">
                    <label for="paypal" class="w-full">
                        Paypal
                    </label>
                    <x-payment.paypal class="hidden lg:block" />
                </li>

                <li class="flex">
                    <input @checked(session('payment_method') === 'transfer') value="transfer" type="radio" class="mr-5"
                        name="payment_method" id="bankTransfer">
                    <label for="bankTransfer" class="w-full">Virement bancaire</label>
                    <x-payment.virement class="hidden lg:block" />
                </li>

                @if (session('shipping_place') == 'home')
                    <li class="flex items-center">
                        <input @checked(session('payment_method') === 'cash') value="cash" type="radio" class="mr-5"
                            name="payment_method" id="afterShipping">
                        <label for="afterShipping" class="flex flex-col">
                            <span>Paiement à la livraison <br><small class="text-sm">Moyen de paiement disponible
                                    lors
                                    de la livraison : Payconiq ou en liquide</small></span>
                        </label>

                    </li>
                @endif
            </ul>
        </div>
       
        <livewire:cart.total buttonLabel="Continuer" :showShippingCost="true"/>
    </form>
</x-main-layout>
