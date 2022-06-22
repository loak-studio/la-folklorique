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
<header class="absolute flex items-center justify-center w-full px-4 pt-5 text-white lg:p-11">
    <button class="absolute bg-red-500 left-4 lg:hidden">
        Menu
    </button>
    <div class="relative flex items-center gap-5 lg:absolute lg:left-11 lg:gap-7">
        <x-logo />
        <h1 class="text-2xl font-folklard xl:text-3xl text-primary-500">La Folklorique</h1>
        <a class="before:absolute before:inset-0" href="{{ route('home') }}" title="Retour à l'accueil"></a>
    </div>
    <nav class="self-center hidden mx-auto lg:block justify-self-center ">
        <ul class="flex text-lg gap-14">
            @foreach ($navLinks as $link)
                <li>
                    <a class="p-4 transition rounded-md hover:bg-white hover:bg-opacity-30"
                        href="{{ route($link->get('route')) }}">
                        {{ $link->get('label') }}
                    </a>
                </li>
            @endforeach
        </ul>
    </nav>
    <div class="absolute right-4 lg:right-11">

    </div>
</header>
