@props(['items' => [], 'title' => null, 'hideTitle' => false])

@unless($hideTitle)
    <h1 class="mb-5 text-4xl font-bold text-center text-white mt-7">{{ $title }}</h1>
@endunless
<nav class="hidden w-full max-w-5xl mx-auto mb-12 text-sm md:block">
    <ul class="flex">
        <li class="text-gray-400">
            <a class="hover:underline after:inline-block after:mx-2 after:content-['/'] after:text-gray-400"
                href="{{ route('home') }}">
                Accueil</a>
        </li>
        @foreach ($items as $item)
            @if ($loop->last)
                <li class="text-white">
                    {{ $item['name'] }}
                </li>
            @else
                <li class="text-gray-400">
                    <a class="hover:underline after:inline-block after:mx-2 after:content-['/'] after:text-gray-400"
                        href="{{ $item['route'] }}">
                        {{ $item['name'] }}</a>
                </li>
            @endif
        @endforeach
    </ul>
</nav>
