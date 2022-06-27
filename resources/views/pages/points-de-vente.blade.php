<x-main-layout title="Points de vente" :breadcrumb="[['name' => 'Points de vente', 'route' => 'points-de-vente']]">
    <div class="w-full max-w-6xl px-4 mx-auto mb-4 lg:mb-24 lg:px-0">
        <p class="text-white">
            Commerces locaux, magasins spécialisés en boissons, épiceries fines… <br />
            Dans cette cartographie, vous retrouverez tous nos partenaires. <br />
            Merci pour leur confiance. <br>
        </p>
    </div>
    <div id="map" class="h-[600px] z-0">

    </div>
    <div class="w-full max-w-6xl px-4 mx-auto mb-24 lg:px-0">
        <h2 class="mt-5 mb-5 text-3xl font-semibold text-white">Devenir partenaire</h2>
        <p class="text-white">
            Vous partagez nos valeurs et vous souhaiteriez nous proposer dans votre assortiment de produits ?
        </p>
        <x-button href="{{ route('contact') }}">
            Nous contacter
        </x-button>
    </div>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css"
        integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ=="
        crossorigin="" />
    <ul class="hidden">
        @foreach ($shops as $shop)
            <li data-name="{{ $shop->name }}" data-latitude="{{ $shop->latitude }}"
                data-longitude="{{ $shop->longitude }}" data-street="{{ $shop->street }}"
                data-city="{{ $shop->city }}">

            </li>
        @endforeach
    </ul>
</x-main-layout>
