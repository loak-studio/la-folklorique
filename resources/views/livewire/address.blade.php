<div class="p-5 lg:col-span-6 bg-zinc-800">
    <livewire:payment.shipping-place />
    <h2 class="my-5 text-3xl font-semibold text-white">Adresse de facturation
    </h2>
    <div action="" class="grid gap-5 lg:grid-cols-2">
        <div class="flex flex-col gap-5">
            <x-input label="Nom" name="billing_addresse[last_name]" />
            <x-input label="Prénom" name="billing_addresse[first_name]" />
            <x-input label="Rue" name="billing_addresse[street]" />
            <div class="grid grid-cols-2 gap-5">
                <x-input label="Numéro" name="billing_addresse[number]" />
                <x-input label="Boite" name="billing_addresse[box]" />
            </div>

            <x-input label="Localité" name="billing_addresse[city]" />

        </div>
        <div class="flex flex-col gap-5">
            <x-input label="Adresse email" name="billing_addresse[email]" />
            <x-input label="Numéro de GSM" name="billing_addresse[phone]" />
            <x-input label="Code postal" name="billing_addresse[zip]" />
            <x-input label="Pays" name="billing_addresse[country]" />
        </div>
        @if ($shippingPlace != 'brewery')
            <div class="lg:col-span-2">
                <input class="accent-primary-500" wire:model="showBillingForm" type="checkbox"
                    name="billing_differentAddress" id="differentAddress">
                <label class="ml-5 text-white" for="differentAddress">
                    Adresse de facturation différente de l'adresse de livraison
                </label>
            </div>
        @endif
    </div>
    @if ($showBillingForm && $shippingPlace != 'brewery')
        <h2 class="my-5 text-3xl font-semibold text-white">Adresse de livraison
        </h2>
        <div action="" class="grid gap-5 lg:grid-cols-2">
            <div class="flex flex-col gap-5">
                <x-input label="Nom" name="shipping_addresse[last_name]" />
                <x-input label="Rue" name="shipping_addresse[street]" />
                <x-input label="Code postal" name="shipping_addresse[zip]" />
                <x-input label="Pays" name="shipping_addresse[country]" />
            </div>
            <div class="flex flex-col gap-5">
                <x-input label="Prénom" name="shipping_addresse[first_name]" />
                <div class="grid grid-cols-2 gap-5">
                    <x-input label="Numéro" name="shipping_addresse[number]" />
                    <x-input label="Boite" name="shipping_addresse[box]" />
                </div>
                <x-input label="Localité" name="shipping_addresse[city]" />
            </div>
        </div>
    @endif

    <h2 class="my-5 text-3xl font-semibold text-white">Informations complémentaires</h2>
    <label for="notes" class="block mb-4 text-gray-400">Notes de commande (facultatif)</label>
    <textarea class="w-full text-white border-gray-600 rounded-md bg-zinc-700" name="notes" id="notes" rows="4"></textarea>
</div>
