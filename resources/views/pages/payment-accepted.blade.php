<x-main-layout title="Commande enregistrée">
    <x-checkout.steps.display current="4" total="4" />
    <section class="w-full max-w-2xl px-4 mx-auto mb-24 text-white lg:px-0">
        <span class="block mb-4 text-7xl">🎉</span>
        <h1 class="text-4xl font-bold text-white">Merci ! Votre commande a bien été enregistrée ! </h1>
        @if (!empty($transfer))
            <p class="text-white">
                Il ne vous reste plus qu’à effectuer le paiement. <br />
            <div class="p-3.5 text-white my-2 font-bold rounded-md bg-zinc-700">
                IBAN : BE94 9738 1940 <br />
                Montant : {{ $order->getTotalInEuros() }}€ <br />
                Communication :
                {{ $order->shipping_first_name }}, {{ $order->shipping_last_name }}, {{ $order->id }}
            </div>
            Votre commande ne sera pas traitée tant que les fonds ne seront pas perçus.
            </p>
        @endif
        <span class="block text-white">Vous allez recevoir un email de confirmation</span>
        <x-button href="{{ route('home') }}">
            Retour à la boutique
        </x-button>
    </section>
</x-main-layout>
