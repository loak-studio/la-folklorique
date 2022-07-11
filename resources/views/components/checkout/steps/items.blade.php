<div
    class="flex items-center @if ($step < $total) after:h-[2px] @if ($current > $step) after:bg-primary-500 @else after:bg-gray-600 @endif lg:after:w-28 after:inline-block @endif">
    <div class="flex flex-col items-center justify-center w-24">
        @switch($current)
            @case($current < $step)
                <span class="w-8 h-8 text-center border-2 border-gray-600 rounded-full ">
                    {{ $step }}
                </span>
            @break

            @case($current == $step)
                <span class="w-8 h-8 text-center border-2 rounded-full border-primary-500 bg-primary-500 ">
                    {{ $step }}
                </span>
            @break

            @case($current > $step)
                <a href="{{empty($route) ? '#' : route($route)}}" class="flex items-center justify-center w-8 h-8 border-2 rounded-full border-primary-500 ">
                    <x-l-icon name="check" />
                </a>
            @break
        @endswitch
        <span class="mt-4 @if ($current >= $step) text-primary-500 @endif">{{ $label }}</span>
    </div>
</div>
