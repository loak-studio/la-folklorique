<x-main-layout title="Paiement">
    <x-checkout.steps.display current="1" total="4" />
    <form method="POST" action="{{ route('checkout-address') }}"
        class="grid w-full max-w-5xl gap-5 p-5 mx-auto mb-24 lg:grid-cols-10 bg-zinc-900">
        @csrf
        <livewire:address />
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
                            Code promo ({{ $cart->coupon->code }})
                        </span>
                        <span>
                            {{ $cart->coupon->effect() }}
                        </span>
                    </div>
                @endif
                <div class="flex justify-between border-t-2 border-green-700 pt-7">
                    <p class="text-lg">
                        Total <span class="text-sm text-gray-400 ">(TVA incluse)</span> {{ $cart->getTotal() }}€
                    </p>
                </div>
                @if ($cart->getTotal() > 12)
                    <x-button>paiement etc</x-button>
                @else
                    <p>Le minimum d’achat est de 12€ afin de pouvoir passer commande</p>
                @endif
                <livewire:cart.coupon />
            </div>
        </div>
    </form>
</x-main-layout>
