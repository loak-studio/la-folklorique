<x-main-layout :title="$title" :breadcrumb="[['name' => $title]]">

    <div class="w-full max-w-6xl px-4 mx-auto mb-24 lg:px-0">

        <article class="md-parsed">

            @if (!empty($displayDownloadButton) && $displayDownloadButton)
                <a download="" class="flex gap-2 hover:underline text-primary-500"
                    href="/Conditions-generales-de-ventes13.12.2021.pdf">
                    <x-l-icon color="#E85011" name="download" /> Télécharger les CGV
                </a>
            @endif
            {!! Str::of($content)->markdown() !!}
        </article>
    </div>
</x-main-layout>
