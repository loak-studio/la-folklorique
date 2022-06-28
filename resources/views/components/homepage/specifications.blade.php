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

<div data-appear
    class="relative flex items-center justify-center w-full max-w-5xl px-5 mx-auto mb-48 text-white lg:mb-32 lg:mt-32 lg:justify-end h-fit">
    <img class="absolute left-0 hidden max-w-3xl rounded-md lg:flex" src="assets/caracteristiques.webp" alt="">
    <img class="absolute w-full max-w-md lg:-right-[10%] -bottom-2/4 lg:-bottom-1/4 -z-10" src="/assets/confetti.svg"
        alt="">
    <div
        class="relative flex flex-col justify-center w-full h-full px-5 py-8 rounded-md lg:pl-20 md:max-w-lg bg-zinc-700">
        <img class="-bottom-3/4 lg:-bottom-[45%] absolute z-10 w-full lg:max-w-md max-w-[260px] rotate-[25deg] lg:rotate-0 -right-8 lg:-left-2/4"
            src="assets/bouteille.webp" alt="">
        <h2 id="scrollArea" class="w-full pb-5 text-4xl font-semibold border-b-2 border-green-700 headline max-w-fit">
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
    </div>
</div>
