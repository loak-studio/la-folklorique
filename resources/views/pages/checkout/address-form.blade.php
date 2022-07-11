<x-main-layout title="Paiement">
    <x-checkout.steps.display current="1" total="4" />
    <form method="POST" action="{{ route('checkout-address') }}"
        class="grid w-full max-w-5xl gap-5 mx-auto mb-24 lg:p-5 lg:grid-cols-10 bg-zinc-900">
        @csrf
        <livewire:address />
        <livewire:cart.total buttonLabel="Choisir le mode de paiement"/>
    </form>
</x-main-layout>
