<div class="flex items-center justify-center w-full my-12 text-white">
    <x-checkout.steps.items route="paiement" label="Adresse" step="1" :current="$current" total="4" />
    <x-checkout.steps.items route="checkout-payment-method-form" label="Paiement" step="2" :current="$current" total="4" />
    <x-checkout.steps.items label="Récapitulatif" step="3" :current="$current" total="4" />
    <x-checkout.steps.items label="Validation" step="4" :current="$current" total="4" />
</div>
