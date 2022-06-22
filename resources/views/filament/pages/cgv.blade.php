<x-filament::page>
    <form action="" wire:submit.prevent="submit">
        {{ $this->form }}
        <x-filament-support::button class="mt-6" type="submit">
            Modifier
        </x-filament-support::button>
    </form>
</x-filament::page>
