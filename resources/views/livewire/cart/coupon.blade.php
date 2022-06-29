<div>
    @if ($displayInput)
        <div class="grid grid-cols-2">
            @if ($coupon)
                <x-input disabled="" wire:model="code" class="text-gray-500" label="Code promo" name="coupon" />

                <div class="flex items-end justify-center">
                    <button wire:click.prevent="deleteCoupon"
                        class="pb-2 text-sm text-primary-500 hover:underline">Supprimer</button>
                </div>
            @else
                <x-input wire:model="code" label="Code promo" name="coupon" />

                <div class="flex items-end justify-center">
                    <button wire:click.prevent="applyCoupon"
                        class="pb-2 text-sm text-primary-500 hover:underline">Appliquer</button>
                </div>
            @endif
        </div>
    @else
        <button wire:click.prevent="toggleDisplayInput" class="text-sm text-primary-500 hover:underline">
            Appliquer un code promo
        </button>
    @endif
</div>
