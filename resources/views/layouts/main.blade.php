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
    <script async src="https://www.googletagmanager.com/gtag/js?id=GA_MEASUREMENT_ID"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            window.dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'GA_MEASUREMENT_ID');
        gtag('consent', 'default', {
            'ad_storage': 'denied',
            'analytics_storage': 'denied'
        });
    </script>
    @livewireStyles
</head>

<body class="relative flex flex-col h-full min-h-screen overflow-x-hidden font-outfit bg-dark">
    @include('layouts.header')
    <x-can-drink />
    @if (count($breadcrumb) > 0)
        <x-breadcrumb :hideTitle="$hideTitle" :title="$title" :items="$breadcrumb" />
    @endif
    <main class="flex-1">
        {{ $slot }}
    </main>
    @include('layouts.footer')
    <x-cookie-banner />
    @livewireScripts

</body>

</html>
