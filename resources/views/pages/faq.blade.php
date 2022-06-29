<x-main-layout title="Questions fréquentes" :breadcrumb="[['name' => 'Questions fréquentes', 'route' => 'faq']]">
    <ul class="w-full max-w-3xl mx-auto mt-12 mb-24 text-white space-y-7">
        @foreach ($questions as $question)
            <li data-question-container class="relative pb-2 border border-gray-600 rounded-md bg-zinc-700">
                <div data-question class="cursor-pointer">
                    <dt class="pt-2 text-lg font-semibold px-7 text-primary-500">
                        {{ $question->question }}
                    </dt>

                    <div data-icon class="absolute flex items-center justify-center w-3 h-3 top-4 right-4">
                        <div class=" w-[2px] rounded-full h-3 absolute bg-white transition-all">

                        </div>
                        <div class="w-3 h-[2px] rounded-full absolute bg-white">

                        </div>
                    </div>
                </div>
                <dd data-answer class="h-full overflow-hidden transition-all px-7"
                    style="max-height: 0px; margin-top:0px">
                    {!! Str::of($question->answer)->markdown() !!}

                </dd>
            </li>
        @endforeach
    </ul>
</x-main-layout>
