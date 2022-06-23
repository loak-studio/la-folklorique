<x-main-layout :breadcrumb="[['name' => 'Paiement accepté', 'route' => 'paiement-valide']]">
    <section class="w-full max-w-5xl mx-auto mb-24">


        <span class="text-7xl">🎉</span>
        <h1 class="text-4xl font-bold text-white">Merci ! Votre commande a bien été enregistrée ! </h1>
        <span class="block text-white">Vous allez recevoir un email de confirmation</span>
        <x-button href="{{ route('home') }}">
            Retour à la boutique
        </x-button>
    </section>
</x-main-layout>
