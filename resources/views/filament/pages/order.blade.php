<x-filament::page>
    <div class="flex flex-col w-full gap-5 md:flex-row">
        <x-filament::card class="w-full">
            <div class="flex flex-col items-start justify-between xl:items-center xl:flex-row">
                <h1 class="text-2xl font-semibold">Commande</h1>
                @switch($record->status)
                    @case('cancelled')
                        <p class="text-danger-700 h-fit bg-danger-500/10 w-fit rounded-xl min-h-6 px-2 py-0.5">
                            Cette commande a été annulée.
                        </p>
                    @break

                    @case('finished')
                        <p class="text-success-700 h-fit bg-success-500/10 w-fit rounded-xl min-h-6 px-2 py-0.5">
                            Cette commande est terminée.
                        </p>
                    @break

                    @case('pending')
                        <p class="text-gray-700 h-fit bg-gray-500/10 w-fit rounded-xl min-h-6 px-2 py-0.5">
                            Cette commande est en attente.
                        </p>
                    @break

                    @case('processing')
                        <p class="text-warning-700 h-fit bg-warning-500/10 w-fit rounded-xl min-h-6 px-2 py-0.5">
                            Cette commande est en cours de traitement.
                        </p>
                    @break
                @endswitch
            </div>
            <hr>
            <div class="font-medium">
                <div class="flex flex-col justify-between xl:flex-row gap-y-5 xl:gap-y-0">
                    <ul>
                        @foreach ($record->items as $item)
                            <li class="flex flex-col gap-y-4">
                                <div>
                                    <h3 class="mb-2 text-semibold">{{ $item->product->name }}</h2>
                                        <div class="flex flex-row gap-12">
                                            <span class="mb-2">Quantité : {{ $item->quantity }}</span>
                                            <span>
                                                {{ number_format(($item->price * $item->quantity) / 100, 2, ',', '.') }}€
                                            </span>
                                        </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    <div>
                        <p>
                            Sous-total : {{ $this->getSubtotal() }}€
                        </p>
                        <p>
                            Frais de port : {{ number_format($record->shipping_cost / 100, 2, ',', '.') }}€
                        </p>
                        @if ($record->coupon_id)
                            <p>
                                Code promo ({{ $record->coupon->code }}) :
                                {{ number_format($record->coupon->value / 100, 2, ',', '.') }}€
                            </p>
                        @endif
                        <p>
                            Total (TVA incluse) :
                            {{ number_format($record->price / 100, 2, ',', '.') }}€
                        </p>
                    </div>
                </div>
                <hr class="my-5">
                <h2 class="mb-2 text-lg font-semibold">
                    Paiment
                </h2>
                <div class="flex flex-col gap-y-3">
                    <p>
                        Moyen : {{ $this->getTranslatedPayementMethod($record->payment) }}
                    </p>
                    <p>
                        Statut :
                        @if ($record->paid)
                            <span class="text-success-700 h-fit bg-success-500/10 w-fit rounded-xl min-h-6 px-2 py-0.5">
                                Payée
                            </span>
                        @else
                            <span class="text-danger-700 h-fit bg-danger-500/10 w-fit rounded-xl min-h-6 px-2 py-0.5">
                                Non payée
                            </span>
                        @endif
                    </p>
                    @if (!$record->paid && $record->status !== 'cancelled')
                        <form wire:submit.prevent="updatePaid">
                            <x-filament-support::button type="submit">
                                Passer la commande en payée
                            </x-filament-support::button>
                        </form>
                    @endif
                </div>
                <hr class="my-5">
                <h2 class="mb-2 text-lg font-semibold">
                    Note du client
                </h2>
                <p class="text-gray-600">
                    @if ($record->notes)
                        {{ $record->notes }}
                    @else
                        Le client n'a pas donné d'information complémentaire.
                    @endif
                </p>
            </div>
        </x-filament::card>
        <div class="flex flex-col gap-y-5">
            <x-filament::card class="w-80">
                <h1 class="mb-5 text-2xl font-semibold">Adresse de facturation </h1>
                <hr class="my-5">
                <ul class="flex flex-col w-fit gap-y-1">
                    <li>
                        {{ $record->billing_first_name }} {{ $record->billing_last_name }}
                    </li>
                    <li>
                        <a href="tel:+{{ $record->billing_phone }}">{{ $record->billing_phone }}</a>
                    </li>
                    <li>
                        <a href="mailto:{{ $record->billing_email }}">{{ $record->billing_email }}</a>
                    <li>
                        {{ $record->billing_number . ' ' . $record->billing_box . ' ' . $record->billing_street . ', ' . $record->billing_zip . ' ' . $record->billing_city . ' ' . $record->billing_country }}
                    </li>
                </ul>
            </x-filament::card>
            @if ($record->shipping === 'collect')
                <x-filament::card class="w-80">
                    <h1 class="mb-5 text-2xl font-semibold">Retrait en brasserie</h1>
                    <hr class="my-5">
                    <ul class="flex flex-col w-fit gap-y-1">
                        <li>
                            <span>{{ $record->billing_first_name }} {{ $record->billing_last_name }}</span>
                        </li>
                        <li>
                            <a href="tel:+{{ $record->billing_phone }}">{{ $record->billing_phone }}</a>
                        </li>
                        <li>
                            <a href="mailto:{{ $record->billing_email }}">{{ $record->billing_email }}</a>
                        <li>
                            <span>{{ $record->billing_number . ' ' . $record->billing_box . ' ' . $record->billing_street . ', ' . $record->billing_zip . ' ' . $record->billing_city . ' ' . $record->billing_country }}</span>
                        </li>
                    </ul>
                </x-filament::card>
            @else
                <x-filament::card class="w-80">
                    <h1 class="mb-5 text-2xl font-semibold">Adresse de livraison</h1>
                    <hr class="my-5">
                    <ul class="w-fit">
                        <li>
                            {{ $record->shipping_first_name }} {{ $record->shipping_last_name }}
                        </li>
                        <li>
                            {{ $record->shipping_number . ' ' . $record->shipping_box . ' ' . $record->shipping_street . ', ' . $record->shipping_zip . ' ' . $record->shipping_city . ' ' . $record->shipping_country }}
                        </li>
                    </ul>
                </x-filament::card>
            @endif
        </div>
    </div>
</x-filament::page>
