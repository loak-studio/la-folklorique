<div class="grid w-full max-w-5xl gap-5 p-5 mx-auto mb-24 lg:grid-cols-10 bg-zinc-900">
    <div class="p-5 lg:col-span-6 bg-zinc-800">
        @switch($step)
            @case(1)
                <livewire:payment.shipping-place />
                <h2 class="my-5 text-3xl font-semibold text-white">Adresse de facturation
                </h2>
                <form action="" class="grid gap-5 lg:grid-cols-2">
                    <div class="flex flex-col gap-5">
                        <x-input wire:model="billing_address.last_name" label="Nom" name="billing_address.last_name" />


                        <x-input wire:model="billing_address.email" label="Adresse email" name="billing_address.email" />

                        <x-input wire:model="billing_address.street" label="Rue" name="billing_address.street" />
                        <x-input wire:model="billing_address.zip" label="Code postal" name="billing_address.zip" />
                        <x-input wire:model="billing_address.country" label="Pays" name="billing_address.country" />

                    </div>
                    <div class="flex flex-col gap-5">

                        <x-input wire:model="billing_address.first_name" label="Prénom" name="billing_address.first_name" />


                        <x-input wire:model="billing_address.phone" label="Numéro de GSM" name="billing_address.phone" />

                        <div class="grid grid-cols-2 gap-5">
                            <x-input wire:model="billing_address.number" label="Numéro" name="billing_address.number" />
                            <x-input wire:model="billing_address.box" label="Boite" name="billing_address.box" />
                        </div>
                        <x-input wire:model="billing_address.city" label="Localité" name="billing_address.city" />
                    </div>
                    @if ($shippingPlace != 'brewery')
                        <div class="col-span-2">
                            <input class="accent-primary-500" wire:model="differentBillingAddress" type="checkbox"
                                name="billing_differentAddress" id="differentAddress">
                            <label class="ml-5 text-white" for="differentAddress">
                                Adresse de facturation différente de l'adresse de livraison
                            </label>
                        </div>
                    @endif
                </form>
                @if ($differentBillingAddress)
                    <h2 class="my-5 text-3xl font-semibold text-white">Adresse de livraison
                    </h2>
                    <form action="" class="grid gap-5 lg:grid-cols-2">
                        <div class="flex flex-col gap-5">
                            <x-input wire:model="shipping_address.last_name" label="Nom" name="shipping_address.last_name" />
                            <x-input wire:model="shipping_address.street" label="Rue" name="shipping_address.street" />
                            <x-input wire:model="shipping_address.zip" label="Code postal" name="shipping_address.zip" />
                            <x-input wire:model="shipping_address.country" label="Pays" name="shipping_address.country" />
                        </div>
                        <div class="flex flex-col gap-5">
                            <x-input wire:model="shipping_address.first_name" label="Prénom"
                                name="shipping_address.first_name" />
                            <div class="grid grid-cols-2 gap-5">
                                <x-input wire:model="shipping_address.number" label="Numéro" name="shipping_address.number" />
                                <x-input wire:model="shipping_address.box" label="Boite" name="shipping_address.box" />
                            </div>
                            <x-input wire:model="shipping_address.city" label="Localité" name="shipping_address.city" />
                        </div>
                    </form>
                @endif
                <h2 class="my-5 text-3xl font-semibold text-white">Informations complémentaires</h2>
                <label for="notes" class="block mb-4 text-gray-400">Notes de commande (facultatif)</label>
                <textarea wire:model="notes" class="w-full text-white border-gray-600 rounded-md bg-zinc-700" name="notes"
                    id="notes" rows="4"></textarea>
            @break

            @case(2)
                <h1 class="mb-10 text-4xl font-bold mt-marker:12 lg:col-span-10">Moyen de paiement</h1>
                <form action="" class="lg:col-span-6">
                    {{ $paymentMethod }}
                    <ul class="space-y-10 text-white">

                        <li class="flex items-center">
                            <input value="creditCard" wire:model="paymentMethod" type="radio" class="mr-5"
                                name="paymentMethod" value="creditCard" id="creditCard">
                            <label for="creditCard" class="w-full">Carte de banque</label>
                            <ul class="flex gap-5">
                                <li>
                                    <x-payment.mastercard />
                                </li>
                                <li>
                                    <x-payment.maestro />
                                </li>
                                <li>
                                    <x-payment.visa />
                                </li>
                                <li>
                                    <x-payment.bancontact />
                                </li>
                            </ul>
                        </li>

                        <li class="flex items-center">
                            <input value="paypal" wire:model="paymentMethod" type="radio" class="mr-5"
                                name="paymentMethod" value="paypal" id="paypal">
                            <label for="paypal" class="w-full">
                                Paypal
                            </label>
                            <x-payment.paypal />
                        </li>

                        <li class="flex">
                            <input value="bankTransfer" wire:model="paymentMethod" type="radio" class="mr-5"
                                name="paymentMethod" value="bankTransfer" id="bankTransfer">
                            <label for="bankTransfer" class="w-full">Virement bancaire</label>
                            <x-payment.virement />
                        </li>

                        @if ($shippingPlace == 'home')
                            <li class="flex items-center">
                                <input value="afterShipping" wire:model="paymentMethod" type="radio" class="mr-5"
                                    name="paymentMethod" value="afterShipping" id="afterShipping">
                                <label for="afterShipping" class="flex flex-col">
                                    <span>Paiement à la livraison <br><small class="text-sm">Moyen de paiement disponible lors
                                            de la livraison : Payconiq ou en liquide</small></span>
                                </label>

                            </li>
                        @endif
                    </ul>
                </form>
            @break

            @case(3)
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
                    @switch($paymentMethod)
                        @case('creditCard')
                            <span>Carte de banque</span>
                            <ul class="flex gap-5">
                                <li>
                                    <x-payment.mastercard />
                                </li>
                                <li>
                                    <x-payment.maestro />
                                </li>
                                <li>
                                    <x-payment.visa />
                                </li>
                                <li>
                                    <x-payment.bancontact />
                                </li>
                            </ul>
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
                @if ($shippingPlace == 'home')
                    <h4 class="my-5 text-xl font-semibold text-white">
                        Adresse de livraison
                    </h4>
                    <ul class="text-white">
                        <li>
                            {{ $shipping_address['first_name'] }} {{ $shipping_address['last_name'] }}
                        </li>
                        <li>
                            {{ $shipping_address['street'] }} {{ $shipping_address['number'] }}
                            {{ $shipping_address['box'] }}, {{ $shipping_address['zip'] }}
                            {{ $shipping_address['city'] }}
                            ({{ $shipping_address['country'] }})
                        </li>

                    </ul>
                @endif

                <h4 class="my-5 text-xl font-semibold text-white">
                    Adresse de facturation
                </h4>
                <ul class="text-white">
                    <li>
                        {{ $billing_address['first_name'] }} {{ $shipping_address['last_name'] }}
                    </li>
                    <li>
                        {{ $billing_address['street'] }} {{ $billing_address['number'] }}
                        {{ $billing_address['box'] }}, {{ $billing_address['zip'] }} {{ $billing_address['city'] }}
                        ({{ $billing_address['country'] }})
                    </li>
                    <li>
                        {{ $billing_address['phone'] }}
                    </li>
                    <li>
                        {{ $billing_address['email'] }}
                    </li>

                </ul>
            @break

            @default
        @endswitch

    </div>
    <div class="lg:col-span-4">
        <livewire:cart.total buttonLabel="Confirmer" type="payment" />

    </div>
</div>
