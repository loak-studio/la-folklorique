<a href="{{ route('panier') }}" class="relative block p-4 rounded-md hover:bg-white hover:bg-opacity-30">
    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" stroke-width="1.5"
        stroke="{{ $color }}" fill="none" stroke-linecap="round" stroke-linejoin="round">
        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
        <circle cx="6" cy="19" r="2" />
        <circle cx="17" cy="19" r="2" />
        <path d="M17 17h-11v-14h-2" />
        <path d="M6 5l14 1l-1 7h-13" />
    </svg>
    <span
        class="absolute top-0 right-0 flex items-center justify-center w-5 h-5 text-sm text-white rounded-full bg-primary-500">
        {{ $quantity }}
    </span>
</a>
