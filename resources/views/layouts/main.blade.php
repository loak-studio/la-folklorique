@props([
    'title' => 'La Folklorique',
    'breadcrumb' => [],
    'hideTitle' => false,
    'enableLivewire' => false,
])
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        {{ $title != 'La Folklorique' ? $title . ' | La Folklorique' : $title }}
    </title>
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}"></script>
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
