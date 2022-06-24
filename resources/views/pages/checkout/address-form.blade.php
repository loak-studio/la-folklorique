<x-main-layout title="Paiement">
    <div class="grid w-full max-w-5xl gap-5 p-5 mx-auto mb-24 lg:grid-cols-10 bg-zinc-900">
        <div class="p-5 lg:col-span-6 bg-zinc-800">
            <livewire:address />
        </div>
        <div class="lg:col-span-4">
            <livewire:cart.total buttonLabel="Confirmer" type="payment" />
        </div>
    </div>

</x-main-layout>
