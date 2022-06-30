<x-main-layout :title="$title" :breadcrumb="[['name' => $title]]">

    <div class="w-full max-w-6xl px-4 mx-auto mb-24 lg:px-0">
        <article class="md-parsed">
            {!! Str::of($content)->markdown() !!}
        </article>
    </div>
</x-main-layout>
