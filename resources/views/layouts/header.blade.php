@php

$navLinks = collect([
    collect([
        'label' => 'Accueil',
        'route' => 'home',
    ]),
    collect([
        'label' => 'Points de vente',
        'route' => 'points-de-vente',
    ]),
    collect([
        'label' => 'Boutique',
        'route' => 'boutique',
    ]),
]);

@endphp
<header
    class="sticky bg-dark bg-opacity-85 md:bg-transparent top-0 {{ !empty(Route::current()) && Route::current()->getName() == 'home' ? 'md:absolute' : 'md:static' }} mb-8 lg:mb-0  flex items-center justify-center w-full px-4 py-5 text-white lg:p-11 z-50">
    <button data-mobile-navigation-button
        class="absolute p-4 rounded-md left-4 lg:hidden hover:bg-white hover:bg-opacity-30">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M3 19H21M3 5H21H3ZM3 12H21H3Z" stroke="white" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round" />
        </svg>
        <span class="sr-only">Menu</span>
    </button>
    <div class="relative flex items-center gap-5 lg:absolute lg:left-11 lg:gap-7">
        <x-logo />
        <h1 class="text-2xl font-folklard xl:text-3xl text-primary-500">La Folklorique</h1>
        <a class="before:absolute before:inset-0" href="{{ route('home') }}" title="Retour à l'accueil"></a>
    </div>
    <div data-mobile-navigation
        class="fixed lg:absolute bg-dark lg:bg-transparent bg-opacity-60 flex z-[80] h-screen w-screen top-0  lg:top-auto lg:w-auto lg:h-auto self-center mx-auto transition -translate-x-[2000px] lg:block lg:translate-x-0 justify-self-center">
        <div class="w-full pt-20 pl-10 bg-dark lg:bg-transparent lg:p-0">
            <div class="inline-flex flex-col items-center p-4 lg:hidden">
                <p class="text-3xl font-folklard text-primary-500">La Folklorique</p>
                <x-logo />
            </div>
            <nav>
                <ul class="flex flex-col items-start gap-5 mt-10 text-lg lg:grid lg:grid-cols-3 lg:mt-0 lg:w-auto">
                    @foreach ($navLinks as $link)
                        <li class="{{$loop->first ? 'text-right': ''}}">
                            <a title="{{ $link->get('label') }}"
                                class="p-4 transition rounded-md hover:bg-white hover:bg-opacity-30"
                                href="{{ route($link->get('route')) }}">
                                {{ $link->get('label') }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </nav>

            @php
                $socialLinks = [
                    [
                        'href' => 'https://www.instagram.com/lafolklorique',
                        'icon' => 'instagram',
                    ],
                    [
                        'href' => 'https://www.facebook.com/BelgianDream',
                        'icon' => 'facebook',
                    ],
                    [
                        'href' => 'https://www.linkedin.com/company/la-folklorique/',
                        'icon' => 'linkedin',
                    ],
                    [
                        'href' => 'https://untappd.com/b/brasserie-de-la-couronne-la-folklorique/3880318',
                        'icon' => 'untappd',
                    ],
                ];
            @endphp
            <ul class="flex gap-5 p-4 mt-16 lg:hidden">
                @foreach ($socialLinks as $link)
                    <li class="block">
                        <a title="{{ $link['icon'] }}" target="_blank" href="{{ $link['href'] }}"
                            class="block p-2 transition rounded-md hover:bg-white hover:bg-opacity-30">
                            <x-l-icon size="24" name="{{ $link['icon'] }}" />
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
        <button data-mobile-navigation-close
            class="flex items-center justify-center hover:bg-primary-700 bg-primary-500 shrink-0 lg:hidden w-14 h-14">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M7.75736 16.2426L16.2426 7.75735M7.75736 7.75735L16.2426 16.2426L7.75736 7.75735Z"
                    stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>

            <span class="sr-only">Fermer le menu</span>
        </button>
    </div>
    <div class="absolute right-4 lg:right-11">
        <livewire:header.cart />
    </div>
</header>
