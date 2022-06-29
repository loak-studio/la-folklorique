<section class="static flex flex-col w-screen min-h-[900px] h-screen text-white lg:relative lg:flex-row">
    <picture
        class="orange origin-center transition  duration-200 absolute top-20 -rotate-[30deg] hidden lg:block blur-sm left-72 w-60">
        <source width="445" height="296" srcset="/assets/orange1.webp" type="image/webp">
        <img src="/assets/orange1.png" alt="">
    </picture>
    <div class="flex flex-col justify-center w-full h-full lg:w-9/12">
        <div class="p-5 pt-32 mx-auto ">
            <p class="pb-6 text-3xl font-semibold">
                Celui qui vit folklore boit La Folklorique
            </p>
            <h1
                class="w-full pb-5 text-4xl font-semibold border-b-2 border-green-700 max-w-fit font-folklard text-primary-500">
                La Folklorique
            </h1>
            <p class="pt-6 font-medium">
                Découvrez la bière carnavalèsque au doux parfum d’orange
            </p>
            <x-button title="Commander" href="{{ route('boutique') }}" class="max-w-fit">
                Commander
            </x-button>
        </div>
    </div>
    <div class="relative w-full h-full select-none lg:w-3/12 lg:bg-primary-500 -z-50">
        <div class="absolute bottom-[15%] left-20 lg:-left-2/4 w-full">
            <div class="relative flex justify-center w-full">
                <picture
                    class="absolute bottom-0 {{ session('is_ok') ? 'leafOneLeft' : '' }} mb-12 -ml-48 2xl:min-w-[200px] 2xl:max-w-[200px] xl:max-w-[160px] xl:min-w-[160px] lg:min-w-[140px] lg:max-w-[140px] min-w-[152px] max-w-[152px] origin-bottom rotate-[10deg]"
                    data-leafs="1l">
                    <source width="339" height="498" srcset="/assets/leaf_left.webp" type="image/webp">
                    <img width="339" height="498" src="/assets/leaf_left.png" alt="">
                </picture>
                <picture
                    class="absolute bottom-0 {{ session('is_ok') ? 'leafOneRight' : '' }} mb-12 ml-48 2xl:min-w-[200px] 2xl:max-w-[200px] xl:max-w-[160px] xl:min-w-[160px] lg:min-w-[140px] lg:max-w-[140px] min-w-[152px] max-w-[152px] origin-bottom rotate-[-10deg]"
                    data-leafs="1r">
                    <source width="339" height="498" srcset="/assets/leaf_right.webp" type="image/webp">
                    <img width="339" height="498" src="/assets/leaf_right.png" alt="">
                </picture>
                <picture
                    class="absolute bottom-0 {{ session('is_ok') ? 'leafTwoLeft' : '' }} mb-8 -ml-48 2xl:min-w-[200px] 2xl:max-w-[200px] xl:max-w-[160px] xl:min-w-[160px] lg:min-w-[140px] lg:max-w-[140px] min-w-[152px] max-w-[152px] origin-bottom rotate-[-25deg]"
                    data-leafs="2l">
                    <source width="339" height="498" srcset="/assets/leaf_left.webp" type="image/webp">
                    <img width="339" height="498" src="/assets/leaf_left.png" alt="">
                </picture>
                <picture
                    class="absolute bottom-0 {{ session('is_ok') ? 'leafTwoRight' : '' }} mb-8 ml-48 2xl:min-w-[200px] 2xl:max-w-[200px] xl:max-w-[160px] xl:min-w-[160px] lg:min-w-[140px] lg:max-w-[140px] min-w-[152px] max-w-[152px] origin-bottom rotate-[25deg]"
                    data-leafs="2r">
                    <source width="339" height="498" srcset="/assets/leaf_right.webp" type="image/webp">
                    <img width="339" height="498" src="/assets/leaf_right.png" alt="">
                </picture>
                <picture
                    class="absolute -ml-48 mb-4 {{ session('is_ok') ? 'leafThreeLeft' : '' }} bottom-0 2xl:min-w-[200px] 2xl:max-w-[200px] xl:max-w-[160px] xl:min-w-[160px] lg:min-w-[140px] lg:max-w-[140px] min-w-[152px] max-w-[152px] origin-bottom rotate-[-45deg]"
                    data-leafs="3l">
                    <source width="339" height="498" srcset="/assets/leaf_left.webp" type="image/webp">
                    <img width="339" height="498" src="/assets/leaf_left.png" alt="">
                </picture>
                <picture
                    class="absolute ml-48 mb-4 {{ session('is_ok') ? 'leafThreeRight' : '' }} bottom-0 2xl:min-w-[200px] 2xl:max-w-[200px] xl:max-w-[160px] xl:min-w-[160px] lg:min-w-[140px] lg:max-w-[140px] min-w-[152px] max-w-[152px] origin-bottom rotate-[45deg]"
                    data-leafs="3r">
                    <source width="339" height="498" srcset="/assets/leaf_right.webp" type="image/webp">
                    <img width="339" height="498" src="/assets/leaf_right.png" alt="">
                </picture>
                <picture
                    class="absolute -mb-4 bottom-0 flex 2xl:max-w-[230px] 2xl:min-w-[230px] xl:max-w-[210px] xl:min-w-[210px] lg:max-w-[190px] lg:min-w-[190px] max-w-[165px] min-w-[165px] -ml-56">
                    <source width="301" height="306" srcset="/assets/orange3.webp" type="image/webp">
                    <img width="301" height="306" src="/assets/orange3.png" alt="">
                </picture>
                <picture
                    class="absolute -mb-14 bottom-0 -ml-80 flex 2xl:w-[240px]  xl:w-[220px] lg:w-[200px] w-[175px]">
                    <source width="301" height="306" srcset="/assets/orange2.webp" type="image/webp">
                    <img width="301" height="306" src="/assets/orange2.png" alt="">
                </picture>
                <picture
                    class="absolute -mb-12 bottom-0 flex ml-64 2xl:min-w-[230px] 2xl:max-w-[230px] xl:min-w-[210px] xl:max-w-[210px] lg:min-w-[190px] lg:max-w-[190px] min-w-[165px] max-w-[165px] -scale-x-100">
                    <source width="205" height="211" srcset="/assets/orange2.webp" type="image/webp">
                    <img width="205" height="211" src="/assets/orange2.png" alt="">
                </picture>
                <picture class="absolute -mb-16 bottom-0 2xl:w-[450px]  xl:w-[430px] lg:w-[410px]  w-[330px]">
                    <source width="667" height="1000" srcset="/assets/bouteille.webp" type="image/webp">
                    <img width="667" height="1000" src="/assets/bouteille.png" alt="">
                </picture>
            </div>
        </div>
    </div>
    <img class="absolute hidden origin-center -bottom-20 -left-72 lg:block" src="/assets/confetti.svg"
        alt="">
</section>
