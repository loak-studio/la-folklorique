@php
$picked = 'bg-primary-500 border-primary-500';
$notPicked = 'text-gray-400 border-gray-400';
@endphp
<div>
    <div class="flex flex-col justify-center gap-16 text-white lg:flex-row">
        <button
            class="flex items-center gap-4 p-5 border-4 rounded-md @if ($shippingPlace == 'home') {{ $picked }} @else {{ $notPicked }} @endif "
            wire:click.prevent="setShippingPlace('home')">
            <x-l-icon name="home" />
            Livraison à domicile
        </button>
        <button
            class="flex items-center gap-4 p-5  border-4 @if ($shippingPlace == 'brewery') {{ $picked }} @else {{ $notPicked }} @endif  rounded-md"
            wire:click.prevent="setShippingPlace('brewery')">

            <x-l-icon name="beer" /> Retrait à la brasserie
        </button>
    </div>
    @if ($shippingPlace == 'brewery')
        <p class="text-white">
            La brasserie se trouve au : <br />
            Rue Albert 1er, 42<br />
            7134 Leval-Trahergnies
        </p>
    @endif
    <input type="hidden" name="shipping_place" value="{{ $shippingPlace }}">
</div>
