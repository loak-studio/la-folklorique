<div>
    @if ($displayInput)
        <div class="grid grid-cols-2">
            @if ($coupon)
                <x-input disabled="" wire:model="code" class="text-gray-500" label="Code promo" name="coupon" />

                <button wire:click="deleteCoupon" class="text-sm text-primary-500 hover:underline">Supprimer</button>
            @else
                <x-input wire:model="code" label="Code promo" name="coupon" />

                <button wire:click="applyCoupon" class="text-sm text-primary-500 hover:underline">Appliquer</button>
            @endif
        </div>
    @else
        <button wire:click="toggleDisplayInput" class="text-sm text-primary-500 hover:underline">
            Appliquer un code promo
        </button>
    @endif
</div>
