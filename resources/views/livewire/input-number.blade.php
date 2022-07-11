<div class="flex">
    <button wire:click="decrease" class="flex items-center justify-center w-8 h-8 bg-gray-700 active:bg-gray-500">
        -
    </button>
    <input wire:model="quantity" class="w-12 h-8 text-center text-white bg-gray-600 border-none" type="text">
    <button wire:click="increase" class="flex items-center justify-center w-8 h-8 bg-gray-700 active:bg-gray-500">
        +
    </button>
</div>
