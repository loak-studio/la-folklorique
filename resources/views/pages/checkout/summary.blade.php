<x-main-layout title="Mode de paiement">
    <x-checkout.steps.display current="3" total="4" />
    <form method="POST" action="{{ route('checkout-summary-send') }}"
        class="grid w-full max-w-5xl gap-5 mx-auto mb-24 lg:p-5 lg:grid-cols-10 bg-zinc-900">
        @csrf
        <div class="p-5 lg:col-span-6 bg-zinc-800">
            <h2 class="my-5 text-3xl font-semibold text-white">Récapitulatif</h2>
            <h3 class="my-5 text-2xl font-semibold text-white">
                Commande
            </h3>
            <ul class="">
                @foreach ($cart->items as $cart_item)
                    <li
                        class="flex text-white gap-9 @unless($loop->last) border-b-2 border-gray-500 pb-2 mb-2 @endunless">
                        <figure class=" aspect-[3/4] w-24">
                            <img class="object-cover w-full h-full"
                                src="/storage/{{ $cart_item->product->pictures[0] }}" alt="">
                        </figure>
                        <div>
                            <h2 class="mb-2 text-semibold">{{ $cart_item->product->name }}</h2>
                            <div class="flex flex-col lg:gap-12 lg:flex-row">
                                <span class="mb-2">Quantité: {{ $cart_item->quantity }}</span>
                                <span>
                                    {{ $cart_item->quantity * $cart_item->product->getEuroPrice() }}€
                                </span>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
            <h3 class="flex justify-between my-5 text-2xl font-semibold text-white">
                Paiement <a href="{{ route('checkout-payment-method-form') }}">
                    <x-l-icon name="edit" size="25" />
                </a>
            </h3>
            <div class="flex justify-between pl-4 text-white">
                @switch(session('payment_method'))
                    @case('stripe')
                        <span>Carte de banque</span>
                        <div class="hidden gap-5 lg:flex">
                            <x-payment.mastercard />
                            <x-payment.maestro />
                            <x-payment.visa />
                            <x-payment.bancontact />
                        </div>
                    @break

                    @case('paypal')
                        <span>Paypal</span>
                        <x-payment.paypal class="hidden lg:block" />
                    @break

                    @case('transfer')
                        <span>Virement</span>
                        <x-payment.virement class="hidden lg:block" />
                    @break

                    @case('cash')
                        <span>Paiement à la livraison</span>
                    @break

                    @default
                @endswitch

            </div>
            @if (session('payment_method') == 'transfer')
                <div class="flex gap-3.5 p-4 mt-4 text-white bg-gray-700 rounded-md">
                    <x-l-icon color="white" size="24" class="shrink-0" name="receipt" />
                    <p>
                        Veuillez indiquer votre nom et prénom + n° de commande en communication. Votre commande ne sera
                        pas
                        traitée tant que les fonds ne seront pas perçus.
                    </p>
                </div>
            @endif
            <h3 class="flex justify-between my-5 text-2xl font-semibold text-white">
                Adresse <a href="{{ route('checkout-address') }}">
                    <x-l-icon name="edit" size="25" />
                </a>
            </h3>
            @if (session('shipping_place') == 'home')
                <h4 class="my-5 text-xl font-semibold text-white">
                    Adresse de livraison
                </h4>
                <p class="pl-4 text-white ">
                    <span class="block">
                        {{ session('shipping_address_first_name') }}
                        {{ session('shipping_address_last_name') }}
                    </span>
                    {{ session('shipping_address_number') }}
                    {{ session('shipping_address_street') }},
                    {{ session('shipping_address_zip') }}
                    {{ session('shipping_address_city') }}
                    ({{ session('shipping_address_country') }})
                </p>
            @else
                <p class="pl-4 text-white ">Retrait à la brasserie:
                    Rue Albert 1er, 42 -
                    7134 Leval-Trahergnies
                </p>
            @endif


            <h4 class="my-5 text-xl font-semibold text-white">
                Adresse de facturation
            </h4>
            <ul class="pl-4 text-white ">
                <span class="block">
                    {{ session('billing_address_first_name') }}
                    {{ session('billing_address_last_name') }}
                </span>
                {{ session('billing_address_number') }}
                {{ session('billing_address_street') }},
                {{ session('billing_address_zip') }}
                {{ session('billing_address_city') }}
                ({{ session('billing_address_country') }})

            </ul>
        </div>
        <livewire:cart.total :showShippingCost="true"/>
    </form>
</x-main-layout>
