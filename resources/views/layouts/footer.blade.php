<div class="px-4 py-12 bg-zinc-700 lg:px-0">
    <div class="grid w-full max-w-5xl gap-10 mx-auto text-white lg:gap-0 lg:grid-cols-3">
        <div class="flex flex-col items-start space-y-4">
            <h2 class="flex items-center gap-5 ">
                <x-l-icon size="24" name="phone" /> Aide et contact
            </h2>
            <x-l-link href="{{ route('faq') }}">Notre FAQ</x-l-link>
            <x-l-link href="{{ route('contact') }}">Nous contacter</x-l-link>
            <x-l-link href="tel:0498430566">0498 43 05 66</x-l-link>
        </div>
        <div class="space-y-4 ">
            <h2 class="flex items-center gap-5">
                <x-l-icon size="24" name="glass" />
                La servir parfaitement
            </h2>
            <x-l-link href="{{ route('servir') }}">Voir le tutoriel</x-l-link>
        </div>
        <div>
            <h2 class="flex items-center gap-5">
                <x-l-icon size="24" name="card" />
                Moyens de paiement
            </h2>
            <ul class="flex flex-wrap w-full max-w-xs gap-5 mt-5">
                <li title="Mastercard" class="cursor-help">
                    <x-payment.mastercard />
                </li>
                <li title="Maestro" class="cursor-help">
                    <x-payment.maestro />
                </li>
                <li title="Visa" class="cursor-help">
                    <x-payment.visa />
                </li>
                <li title="Paypal" class="cursor-help">
                    <x-payment.paypal />
                </li>
                <li title="Bancontact" class="cursor-help">
                    <x-payment.bancontact />
                </li>
                <li title="Virement bancaire" class="cursor-help">
                    <x-payment.virement />
                </li>
            </ul>
        </div>
    </div>
</div>
<footer class="px-4 text-white bg-zinc-900 lg:px-0">
    <div class="grid w-full max-w-5xl gap-10 mx-auto my-12 lg:gap-0 lg:grid-cols-3">
        <div>
            <h3 class="text-4xl font-folklard text-primary-500">
                <a href="{{ route('home') }}">
                    La Folklorique
                </a>
            </h3>
            @php
                $socialLinks = [
                    [
                        'href' => 'https://instagram.com',
                        'icon' => 'instagram',
                    ],
                    [
                        'href' => 'https://instagram.com',
                        'icon' => 'facebook',
                    ],
                    [
                        'href' => 'https://instagram.com',
                        'icon' => 'linkedin',
                    ],
                    [
                        'href' => 'https://untapped.com',
                        'icon' => 'untappd',
                    ],
                ];
            @endphp
            <ul class="flex gap-5 mt-5">
                @foreach ($socialLinks as $link)
                    <li class="block">
                        <a href="{{ $link['href'] }}"
                            class="block p-2 transition rounded-md hover:bg-white hover:bg-opacity-30">
                            <x-l-icon size="24" name="{{ $link['icon'] }}" />
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
        <nav>
            @php
                $links = [
                    [
                        'label' => 'Accueil',
                        'route' => 'home',
                    ],
                    [
                        'label' => 'Boutique',
                        'route' => 'boutique',
                    ],
                    [
                        'label' => 'FAQ',
                        'route' => 'faq',
                    ],
                    [
                        'label' => 'Politique de confidentialité',
                        'route' => 'politique-de-confidentialite',
                    ],
                    [
                        'label' => 'Mentions légales',
                        'route' => 'mentions-legales',
                    ],
                    [
                        'label' => 'Conditions générales de vente',
                        'route' => 'cgv',
                    ],
                ];
            @endphp
            <ul class="flex flex-col gap-2">
                @foreach ($links as $link)
                    <li>
                        <a class="hover:underline" href="{{ route($link['route']) }}">{{ $link['label'] }}</a>
                    </li>
                @endforeach
            </ul>
        </nav>
        <address class="not-italic ">
            <ul class="flex flex-col gap-2">
                <li>BE 0751.787.909</li>
                <li>
                    <a target="_blank" class="hover:underline" href="https://goo.gl/maps/mqHh5SQmf7SomwRx6">
                        Rue Albert 1er, 42 <br>
                        7134 Leval-Trahergnies
                    </a>
                </li>
                <li>Horaire de la brasserie : <br>
                    Mercredi et Vendredi de 13 à 17h</li>
            </ul>
        </address>
    </div>
    <div class="flex flex-col items-center justify-center gap-12 mb-12 lg:flex-row">
        <span>&copy; Belgian Dream - {{ date('Y') }}</span>
        <x-layout.badge-loak />
    </div>
</footer>
