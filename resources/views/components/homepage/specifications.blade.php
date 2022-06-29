@php
$specifications = [
    [
        'key' => 'Catégorie',
        'value' => 'Pale ale ambrée',
    ],
    [
        'key' => 'Type',
        'value' => 'Fruitée (non sucrée)',
    ],
    [
        'key' => 'Arôme',
        'value' => 'Parfum d\'orange',
    ],
    [
        'key' => 'Procédé',
        'value' => 'Artisanal',
    ],
    [
        'key' => 'EBC',
        'value' => '18',
    ],
    [
        'key' => 'IBU',
        'value' => '20',
    ],
];
@endphp

<div data-animation-specification-root
    class="relative flex items-center justify-center w-full max-w-5xl px-5 mx-auto mb-48 text-white opacity-0 lg:mb-32 lg:mt-32 lg:justify-end h-fit">
    <picture class="absolute left-0 hidden max-w-3xl rounded-md lg:flex" data-animation-specification="image">
        <source width="750" height="500" srcset="/assets/caracteristiques.webp" type="image/webp">
        <img width="750" height="500" src="/assets/caracteristiques.png" alt="">
    </picture>
    <img class="absolute w-full max-w-md lg:-right-[10%] -bottom-2/4 lg:-bottom-1/4 -z-10" src="/assets/confetti.svg"
        alt="">
    <div data-animation-specification="text"
        class="relative flex flex-col justify-center w-full h-full px-5 py-8 rounded-md lg:pl-20 md:max-w-lg bg-zinc-700">
        <picture data-animation-specification="bottle"
            class="absolute z-10 w-32 -bottom-64 lg:bottom-auto lg:w-40 right-8 lg:-left-24">
            <source width="667" height="1000" srcset="/assets/bouteille.webp" type="image/webp">
            <img class="rotate-[25deg] lg:rotate-0" width="667" height="1000" src="/assets/bouteille.png"
                alt="">
        </picture>
        <h2 id="scrollArea" class="w-full text-4xl font-semibold hr-green max-w-fit">
            Caractéristiques
        </h2>
        <p class="pb-5 text-lg font-semibold">
            33cl - 6,5% ALC/VOL
        </p>
        <ul class="space-y-2">
            @foreach ($specifications as $specification)
                <li class="grid grid-cols-2">
                    <span>{{ $specification['key'] }}</span>
                    <span>{{ $specification['value'] }}</span>
                </li>
            @endforeach

        </ul>
        <div class="z-20">
            <x-button title="Boutique" href="{{ route('boutique') }}" class="max-w-fit">Découvrir</x-button>
        </div>

    </div>
</div>
