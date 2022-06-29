<x-main-layout title="Evènements" hideTitle="true">
    <section class="w-full max-w-5xl mx-auto text-white">
        <h2 class="mt-16 text-3xl font-semibold text-center">Adrien et Nadio vous souhaitent une bonne discustation !
        </h2>
        <h1 class="mx-auto text-4xl font-bold border-b-2 border-green-700 mb-7 pb-7 mt-7 max-w-fit">Notre bière</h1>
        <div class="grid lg:grid-cols-2">

            <figure class="overflow-hidden rounded-md">
                <picture class="object-cover w-full h-full">
                    <source width="750" height="500" srcset="/assets/ourbeer.webp" type="image/webp">
                    <img width="750" height="500" src="/assets/ourbeer.png" alt="">
                </picture>
            </figure>
            <div class="px-6 py-7">
                <p>
                    La Folklorique est une bière ambrée au parfum d’orange. Le procédé est artisanal et son subtil goût
                    d’orange est obtenu directement par le fruit. Elle a été brassée par deux amis pour rendre hommage
                    aux nombreux carnavals de la région du Centre.
                </p>
                <x-button href="{{ route('home') }}">En savoir plus</x-button>
            </div>

        </div>
    </section>

    <div class="w-full max-w-6xl px-4 py-5 mx-auto mt-16 mb-12 text-white rounded-md lg:px-40 bg-zinc-700">

        <h2
            class="after:content-[''] font-semibold text-3xl after:mt-4 after:mb-8 after:block after:h-[2px] after:w-[200px] after:bg-green-700">
            Votre avis nous intéresse
        </h2>
        <p>
            Laissez nous un avis sur nos réseaux et rejoignez nous pour plus de Folklore.
        </p>
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
        <ul class="flex gap-5 my-5">
            @foreach ($socialLinks as $link)
                <li class="block">
                    <a target="_blank" href="{{ $link['href'] }}"
                        class="block p-2 transition rounded-md hover:bg-white hover:bg-opacity-30">
                        <x-l-icon size="24" name="{{ $link['icon'] }}" />
                    </a>
                </li>
            @endforeach
        </ul>
        <p>Nous n’avons plus qu’à vous souhaiter : “ Santééééé! “</p>
    </div>
</x-main-layout>
