@php
$specifications = [
    [
        'key' => 'Catégorie',
        'value' => 'Pale ale ambrée',
    ],
    [
        'key' => 'Type',
        'value' => 'Fruitée (nonsucrée)',
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
<div class="relative flex items-center w-full max-w-5xl mx-auto mb-24 text-white lg:mt-48 h-96">
    <img class="absolute bottom-0 hidden w-full max-w-3xl rounded-md lg:flex" src="assets/caracteristiques.webp"
        alt="">
    <img class="absolute bottom-0 z-10 hidden w-full max-w-md -mb-16 right-80 lg:flex" src="assets/bouteille.webp"
        alt="">
    <img class="absolute bottom-0 right-0 hidden w-full max-w-md -mr-24 lg:flex" src="assets/confetti.svg" alt="">
    <div
        class="relative w-full h-full max-w-sm px-5 py-8 mx-5 rounded-md md:max-w-3xl lg:max-w-lg px-auto lg:px-0 md:mx-auto lg:mx-0 lg:absolute lg:bottom-0 lg:right-0 md:pl-24 lg:pr-8 lg:pl-20 bg-zinc-700 max-h-96 mb-11">
        <h2 class="w-full pb-5 text-4xl font-semibold border-b-2 border-green-700 max-w-fit">
            Caractéristiques
        </h2>
        <p class="py-5 text-lg font-semibold">
            33cl - 6,5% ALC/VOL
        </p>
        <ul>
            @foreach ($specifications as $specification)
                <li class="grid grid-cols-2 font-medium">
                    <span>{{ $specification['key'] }}</span>
                    <span>{{ $specification['value'] }}</span>
                </li>
            @endforeach

        </ul>
        <img class="absolute bottom-0 z-10 flex w-full md:max-w-md max-w-xs -mb-64 ml-14 md:-mb-32 md:ml-80 lg:hidden md:rotate-[15deg] rotate-[25deg]"
            src="assets/bouteille.webp" alt="">
        <img class="absolute bottom-0 w-full max-w-md -mb-32 -ml-6 md:ml-64 -z-10 lg:hidden" src="assets/confetti.svg"
            alt="">
    </div>
</div>
