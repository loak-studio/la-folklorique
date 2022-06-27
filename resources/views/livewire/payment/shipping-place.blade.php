@php
$picked = 'bg-primary-500 border-primary-500';
$notPicked = 'text-gray-400 border-gray-400';
@endphp
<div>
    <div class="flex justify-center gap-4 text-white lg:gap-16">
        <button
            class="flex text-sm lg:text-base items-center lg:gap-4 p-5 border-4 rounded-md @if ($shippingPlace == 'home') {{ $picked }} @else {{ $notPicked }} @endif "
            wire:click.prevent="setShippingPlace('home')">
            <x-l-icon class="hidden lg:block" name="home" />
            Livraison à domicile
        </button>
        <button
            class="flex text-sm lg:text-base items-center lg:gap-4 p-5  border-4 @if ($shippingPlace == 'brewery') {{ $picked }} @else {{ $notPicked }} @endif  rounded-md"
            wire:click.prevent="setShippingPlace('brewery')">

            <x-l-icon class="hidden lg:block" name="beer" /> Retrait à la brasserie
        </button>
    </div>
    @if ($shippingPlace == 'brewery')
        <p class="font-normal text-white">
            La brasserie se trouve au :
            <span class="block font-semibold">
                Rue Albert 1er, 42
            </span>
            <span class="block font-semibold">
                7134 Leval-Trahergnies
            </span>
        </p>
    @endif
    <input type="hidden" name="shipping_place" value="{{ $shippingPlace }}">
</div>
