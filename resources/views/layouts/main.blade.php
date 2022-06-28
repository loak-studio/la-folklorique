@props([
    'title' => 'La Folklorique',
    'breadcrumb' => [],
    'hideTitle' => false,
    'enableLivewire' => false,
    'description' => 'La Folklorique est une bière artisanale au parfum d\'orange. Elle a été brassée pour rendre hommage aux carnavals de la région du Centre.',
])

@php
$title = $title != 'La Folklorique' ? $title . ' | La Folklorique' : $title;
@endphp

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        {{ $title }}
    </title>
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}"></script>

    <meta name="description" content="Je suis UX/UI designer free-lance dans la région de Tournai !">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ env('APP_URL') }}">
    <meta property="og:title" content="{{ $title }}">
    <meta property="og:description" content="{{ $description }}">
    <meta property="og:image" content="{{ env('APP_URL') }}share.png">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ env('APP_URL') }}">
    <meta property="twitter:title" content="{{ $title }}">
    <meta property="twitter:description" content="Je suis UX/UI designer free-lance dans la région de Tournai !">
    <meta property="twitter:image" content="{{ env('APP_URL') }}/share.png">

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-185687064-1"></script>
    @livewireStyles
</head>

<body class="font-outfit">
    @if (!empty($banner))
        <x-banner />
    @endif
    @unless(session('is_ok'))
        <livewire:age-verification />
    @endunless
    <div class="relative z-10 flex flex-col h-full min-h-screen overflow-x-hidden bg-dark">
        @include('layouts.header')
        @if (count($breadcrumb) > 0)
            <x-layout.breadcrumb :hideTitle="$hideTitle" :title="$title" :items="$breadcrumb" />
        @endif
        <main class="flex-1">
            {{ $slot }}
        </main>
        @include('layouts.footer')
    </div>
    @livewireScripts
    <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js"
        data-turbolinks-eval="false" data-turbo-eval="false"></script>
    <script>
        document.addEventListener("turbolinks:load", function() {

            window.axeptioSettings = {
                clientId: "62b9c5cb82b57df601b9fe9a",
                cookiesVersion: "la foklorique-fr",
            };

            (function(d, s) {
                var t = d.getElementsByTagName(s)[0],
                    e = d.createElement(s);
                e.async = true;
                e.src = "//static.axept.io/sdk.js";
                t.parentNode.insertBefore(e, t);
            })(document, "script");

            void 0 === window._axcb && (window._axcb = []);
            window._axcb.push(function(axeptio) {
                axeptio.on("cookies:complete", function(choices) {
                    window.dataLayer = window.dataLayer || [];

                    function gtag() {
                        window.dataLayer.push(arguments);
                    }
                    gtag('js', new Date());

                    gtag('config', 'UA-185687064-1');
                })
            })
        })
    </script>
</body>

</html>
