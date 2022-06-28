<x-filament::page>
    <div class="flex w-full gap-5">
        <div class="flex flex-col gap-y-5">
            <x-filament::card class="py-5 w-fit">
                <h1 class="mb-5 text-3xl font-semibold">Adresse de facturation </h1>
                <ul class="w-fit">
                    <li class="grid grid-cols-2 font-medium">
                        <span>Prénom</span>
                        <span>{{ $record->billing_first_name }}</span>
                    </li>
                    <li class="grid grid-cols-2 font-medium">
                        <span>Nom</span>
                        <span>{{ $record->billing_last_name }}</span>
                    </li>
                    <li class="grid grid-cols-2 font-medium">
                        <span>Numéro de téléphone</span>
                        <a href="tel:+{{ $record->billing_phone }}">{{ $record->billing_phone }}</a>
                    </li>
                    <li class="grid grid-cols-2 font-medium">
                        <span>Adresse email</span>
                        <a href="mailto:{{ $record->billing_email }}">{{ $record->billing_email }}</a>
                    <li class="grid grid-cols-2 font-medium">
                        <span>Adresse</span>
                        <span>{{ $record->billing_number . ' ' . $record->billing_box . ' ' . $record->billing_street . ', ' . $record->billing_zip . ' ' . $record->billing_city . ' ' . $record->billing_country }}</span>
                    </li>
                </ul>
            </x-filament::card>
            @if ($record->shipping === 'collect')
                <x-filament::card class="py-5 w-fit">
                    <h1 class="mb-5 text-3xl font-semibold">Retrait en brasserie</h1>
                    <ul class="w-fit">
                        <li class="grid grid-cols-2 font-medium">
                            <span>Prénom</span>
                            <span>{{ $record->billing_first_name }}</span>
                        </li>
                        <li class="grid grid-cols-2 font-medium">
                            <span>Nom</span>
                            <span>{{ $record->billing_last_name }}</span>
                        </li>
                        <li class="grid grid-cols-2 font-medium">
                            <span>Numéro de téléphone</span>
                            <a href="tel:+{{ $record->billing_phone }}">{{ $record->billing_phone }}</a>
                        </li>
                        <li class="grid grid-cols-2 font-medium">
                            <span>Adresse email</span>
                            <a href="mailto:{{ $record->billing_email }}">{{ $record->billing_email }}</a>
                        <li class="grid grid-cols-2 font-medium">
                            <span>Adresse</span>
                            <span>{{ $record->billing_number . ' ' . $record->billing_box . ' ' . $record->billing_street . ', ' . $record->billing_zip . ' ' . $record->billing_city . ' ' . $record->billing_country }}</span>
                        </li>
                    </ul>
                </x-filament::card>
            @else
                <x-filament::card class="py-5 w-fit">
                    <h1 class="mb-5 text-3xl font-semibold">Adresse de livraison</h1>
                    <ul class="w-fit">
                        <li class="grid grid-cols-2 font-medium">
                            <span>Prénom</span>
                            <span>{{ $record->shipping_first_name }}</span>
                        </li>
                        <li class="grid grid-cols-2 font-medium">
                            <span>Nom</span>
                            <span>{{ $record->shipping_last_name }}</span>
                        </li>
                        <li class="grid grid-cols-2 font-medium">
                            <span>Adresse</span>
                            <span>{{ $record->shipping_number . ' ' . $record->shipping_box . ' ' . $record->shipping_street . ', ' . $record->shipping_zip . ' ' . $record->shipping_city . ' ' . $record->shipping_country }}</span>
                        </li>
                    </ul>
                </x-filament::card>
            @endif
        </div>
        <x-filament::card class="w-full">
            <div class="flex items-center justify-between">
                <h1 class="text-3xl font-semibold">Commande</h1>
                @if ($record->status === 'cancelled')
                    <p class="text-danger-700 h-fit bg-danger-500/10 w-fit rounded-xl min-h-6 px-2 py-0.5">Cette
                        commande a
                        été
                        annulée.</p>
                @elseif ($record->status === 'finished')
                    <p class="text-success-700 h-fit bg-success-500/10 w-fit rounded-xl min-h-6 px-2 py-0.5">Cette
                        commande
                        est
                        terminée.</p>
                @elseif ($record->status === 'pending')
                    <p class="text-gray-700 h-fit bg-gray-500/10 w-fit rounded-xl min-h-6 px-2 py-0.5">Cette commande
                        est en
                        attente.</p>
                @elseif ($record->status === 'processing')
                    <p class="text-warning-700 h-fit bg-warning-500/10 w-fit rounded-xl min-h-6 px-2 py-0.5">Cette
                        commande
                        est en
                        cours.</p>
                @endif
            </div>
            {{-- {{ $record->items }} --}}
            {{-- <p>cout de livraison {{ $record->shipping_cost }}</p>
            <p>moyen de paumebt {{ $record->payment }}</p>
            <p>mode de livraison {{ $record->shipping }}</p>
            <p>status {{ $record->status }}</p>
            <p>est ce que c payé {{ $record->paid }}</p>
            <p>note {{ $record->notes }}</p>
            <p>total {{ $record->price }}</p>
            <p>coupon id {{ $record->coupon_id }}</p> --}}
            {{-- <form wire:submit.prevent="updateStatus">
                <select wire:model="status"
                    class="block text-gray-900 transition duration-75 border-gray-300 rounded-lg shadow-sm w-fit focus:border-primary-600 focus:ring-1 focus:ring-inset focus:ring-primary-600 disabled:opacity-70">
                    <option value="" selected disabled hidden>Choose here</option>
                    <option value="pending">En attente</option>
                    <option value="processing">En cours</option>
                    <option value="finished" selected>Terminée</option>
                    <option value="cancelled">Annulée</option>
                </select>
                <x-filament-support::button class="mt-6" type="submit">
                    Terminer la commande
                </x-filament-support::button>
            </form> --}}
        </x-filament::card>
    </div>
</x-filament::page>
