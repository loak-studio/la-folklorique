@php
$values = [
    [
        'icon' => 'pin',
        'title' => 'Local',
        'text' => 'La consommation locale et le circuit court sont nos points d\'honneur.',
    ],
    [
        'icon' => 'carnival',
        'title' => 'Carnaval',
        'text' => 'La mise en avant de notre folklore carnavalesque est un point primordial.',
    ],
    [
        'icon' => 'hammer',
        'title' => 'Artisanat',
        'text' => 'L\'utilisation de vraies oranges est essentielle pour obtenir son goût unique.',
    ],
];
@endphp
<div data-appear-values class="flex flex-col items-center w-full max-w-5xl mx-auto mt-24 text-white sm:mt-0">
    <h2 class="w-full pb-5 mb-5 text-4xl font-semibold border-b-2 border-green-700 max-w-fit">Nos valeurs</h2>
    <div class="flex flex-col justify-between w-full px-4 md:my-16 md:flex-row gap-y-5 md:gap-y-0 md:px-0">
        @foreach ($values as $value)
            <div data-appear-values-item
                class="w-full md:max-w-xs p-5 h-fit mx-auto space-y-5 rounded-md bg-stone-700 md:mx-5 {{ $loop->first ? 'md:-mt-12' : '' }} {{ $loop->last ? 'md:mt-12' : '' }}">
                @switch($value['icon'])
                    @case('pin')
                        <x-homepage.icon.pin />
                    @break

                    @case('carnival')
                        <x-homepage.icon.carnival />
                    @break

                    @case('hammer')
                        <x-homepage.icon.hammer />
                    @break
                @endswitch
                <h3 class="text-3xl font-semibold">{{ $value['title'] }}</h3>
                <p>{{ $value['text'] }}</p>
            </div>
        @endforeach

    </div>
    <div class="leaf-group -z-10 absolute -rotate-[75deg] right-32 w-44 blur-sm">
        <picture class="absolute -rotate-12">
            <source width="339" height="498" srcset="/assets/leaf_left.webp" type="image/webp">
            <img width="339" height="498" src="/assets/leaf_left.png" alt="">
        </picture>
        <picture class="absolute origin-bottom rotate-[35deg]">
            <source width="339" height="498" srcset="/assets/leaf_left.webp" type="image/webp">
            <img width="339" height="498" src="/assets/leaf_left.png" alt="">
        </picture>
        <picture class="absolute origin-bottom-right rotate-[70deg]">
            <source width="339" height="498" srcset="/assets/leaf_left.webp" type="image/webp">
            <img width="339" height="498" src="/assets/leaf_left.png" alt="">
        </picture>
    </div>
</div>
