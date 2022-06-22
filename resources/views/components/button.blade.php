@props([
    'href' => null,
])

@php
if ($href) {
    $tag = 'a';
} else {
    $tag = 'button';
}
@endphp

<{{ $tag }} @if ($href) href="{{ $href }}" @endif
    {{ $attributes->merge(['class' => 'class="relative leading-[26px] inline-flex mt-6 justify-center px-5 py-2 text-white transition rounded-md mask-button bg-primary-500 hover:bg-primary-700"']) }}>
    {{ $slot }}
    </{{ $tag }}>
