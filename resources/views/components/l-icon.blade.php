@props([
    'color' => '#ffffff',
    'name' => '',
    'size' => 20,
])

<svg {{ $attributes->merge() }} xmlns="http://www.w3.org/2000/svg" width="{{ $size }}"
    height="{{ $size }}" viewBox="0 0 24 24" stroke-width="1.5" stroke="{{ $color }}" fill="none"
    stroke-linecap="round" stroke-linejoin="round">
    @switch($name)
        @case('phone')
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2" />
        @break

        @case('glass')
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <line x1="8" y1="21" x2="16" y2="21" />
            <line x1="12" y1="15" x2="12" y2="21" />
            <path d="M17 3l1 7c0 3.012 -2.686 5 -6 5s-6 -1.988 -6 -5l1 -7h10z" />
        @break

        @case('card')
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <rect x="3" y="5" width="18" height="14" rx="3" />
            <line x1="3" y1="10" x2="21" y2="10" />
            <line x1="7" y1="15" x2="7.01" y2="15" />
            <line x1="11" y1="15" x2="13" y2="15" />
        @break

        @case('instagram')
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <rect x="4" y="4" width="16" height="16" rx="4" />
            <circle cx="12" cy="12" r="3" />
            <line x1="16.5" y1="7.5" x2="16.5" y2="7.501" />
        @break

        @case('facebook')
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3" />
        @break

        @case('linkedin')
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <rect x="4" y="4" width="16" height="16" rx="2" />
            <line x1="8" y1="11" x2="8" y2="16" />
            <line x1="8" y1="8" x2="8" y2="8.01" />
            <line x1="12" y1="16" x2="12" y2="11" />
            <path d="M16 16v-3a2 2 0 0 0 -4 0" />
        @break

        @case('untappd')
            <path
                d="M11.3334 12.5388L7.45016 17.9633C7.24994 18.2427 6.91469 18.387 6.57944 18.3451C6.19298 18.2986 5.66217 18.1542 5.11739 17.7584C4.56795 17.3627 4.2653 16.9064 4.09302 16.5571C3.94402 16.2498 3.97661 15.8866 4.17218 15.6073L8.05546 10.1828C8.24171 9.92668 8.48384 9.7125 8.76321 9.5635L9.52683 9.15841C9.68048 9.07925 9.81552 8.9675 9.93192 8.84178C10.3044 8.42272 11.2962 7.3192 13.0656 5.53587L13.0982 5.39618C13.1075 5.36359 13.1307 5.33565 13.1633 5.33099L13.2611 5.30771C13.303 5.2984 13.331 5.2565 13.3263 5.21459L13.317 5.09353C13.3123 5.04231 13.3496 5.0004 13.4008 5.0004C13.5172 4.99575 13.7454 5.033 14.0666 5.26115C14.3879 5.49396 14.495 5.69884 14.5276 5.81059C14.5416 5.85715 14.5136 5.90837 14.4624 5.92233L14.346 5.95027C14.3041 5.95958 14.2762 6.00149 14.2762 6.0434L14.2855 6.14583C14.2901 6.17843 14.2715 6.21102 14.2436 6.22965L14.1179 6.30414C13.0004 8.54844 12.274 9.84753 11.9946 10.3364C11.9062 10.4854 11.8503 10.6531 11.8223 10.8253L11.6873 11.6821C11.6408 11.9801 11.5197 12.2781 11.3334 12.5388ZM19.8264 15.6026L15.9431 10.1781C15.7569 9.92203 15.5147 9.70784 15.2354 9.55884L14.4717 9.15375C14.3181 9.0746 14.1831 8.96285 14.0666 8.83713C13.9735 8.73469 13.8431 8.58569 13.6755 8.39944C13.6476 8.37151 13.601 8.37616 13.5824 8.41341C12.9957 9.54487 12.5953 10.248 12.4183 10.5646C12.3625 10.667 12.3206 10.7741 12.3019 10.8859C12.2647 11.128 12.2647 11.3794 12.3019 11.6215L12.3066 11.6635C12.3578 11.9754 12.4789 12.2734 12.6651 12.5342L16.5484 17.9587C16.744 18.2334 17.0746 18.3824 17.4098 18.3405C17.7963 18.2939 18.3317 18.1496 18.8812 17.7538C19.4306 17.358 19.7333 16.9017 19.9055 16.5525C20.0545 16.2452 20.0266 15.882 19.8264 15.6026ZM9.53614 5.91302L9.65255 5.94096C9.69445 5.95027 9.72239 5.99218 9.72239 6.03408L9.71308 6.13652C9.70842 6.16911 9.72705 6.20171 9.75498 6.22033L9.8807 6.29483C10.0856 6.70924 10.2811 7.09105 10.4581 7.44026C10.4767 7.47286 10.5186 7.48217 10.5465 7.45423C10.8399 7.14226 11.1891 6.76977 11.6035 6.34139C11.6361 6.30414 11.6408 6.24827 11.6035 6.21568C11.394 6.00149 11.1751 5.77799 10.933 5.53587L10.9004 5.39618C10.8958 5.36359 10.8678 5.34031 10.8352 5.33099L10.7374 5.30771C10.6955 5.2984 10.6676 5.2565 10.6723 5.21459L10.6816 5.09353C10.6862 5.04231 10.649 5.0004 10.5978 5.0004C10.4814 4.99575 10.2532 5.02834 9.92726 5.26115C9.60599 5.49396 9.49889 5.69884 9.4663 5.81059C9.45699 5.85249 9.48958 5.90371 9.53614 5.91302Z"
                fill="white" />
        @break

        @case('shield')
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M9 12l2 2l4 -4" />
            <path d="M12 3a12 12 0 0 0 8.5 3a12 12 0 0 1 -8.5 15a12 12 0 0 1 -8.5 -15a12 12 0 0 0 8.5 -3" />
        @break

        @case('check')
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M5 12l5 5l10 -10" />
        @break

        @case('beer')
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path
                d="M9 20h6v-4.111a8 8 0 0 1 .845 -3.578l.31 -.622a8 8 0 0 0 .845 -3.578v-4.111h-10v4.111a8 8 0 0 0 .845 3.578l.31 .622a8 8 0 0 1 .845 3.578v4.111z" />
            <path d="M7 8h10" />
        @break

        @case('home')
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <polyline points="5 12 3 12 12 3 21 12 19 12" />
            <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
            <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
        @break

        @case('edit')
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M9 7h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" />
            <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" />
            <line x1="16" y1="5" x2="19" y2="8" />
        @break

        @case('truck')
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <circle cx="7" cy="17" r="2" />
            <circle cx="17" cy="17" r="2" />
            <path d="M5 17h-2v-4m-1 -8h11v12m-4 0h6m4 0h2v-6h-8m0 -5h5l3 5" />
            <line x1="3" y1="9" x2="7" y2="9" />
        @break

        @case('receipt')
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M5 21v-16a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v16l-3 -2l-2 2l-2 -2l-2 2l-2 -2l-3 2m4 -14h6m-6 4h6m-2 4h2" />
        @break

        @default
            <p>No icon</p>
    @endswitch
</svg>
