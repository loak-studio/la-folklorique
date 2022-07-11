<section class="static flex flex-col w-screen min-h-[900px] h-screen text-white lg:relative lg:flex-row">
    <picture
        class="absolute hidden transition duration-200 origin-center orange top-20 lg:block blur-sm left-72 w-60">
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
        <div class="absolute bottom-[15%] left-20 lg:-left-1/2 w-full">
            <div class="relative flex justify-center w-full">
                <picture
                    class="absolute bottom-16 {{ session('is_ok') ? 'leafOneRight' : '' }}  lg:w-[209px] w-[140px] inline-block -mr-48 origin-bottom-left "
                    data-leafs="1r">
                    <source width="339" height="498" srcset="/assets/leaf_right.webp" type="image/webp">
                    <img width="339" height="498" src="/assets/leaf_right.png" alt="">
                </picture>

                <picture
                    class="absolute bottom-16 {{ session('is_ok') ? 'leafTwoRight' : '' }}  lg:w-[209px] w-[140px] inline-block -mr-48 origin-bottom-left "
                    data-leafs="2r">
                    <source width="339" height="498" srcset="/assets/leaf_right.webp" type="image/webp">
                    <img width="339" height="498" src="/assets/leaf_right.png" alt="">
                </picture>

                <picture
                    class="absolute inline-block  bottom-16  {{ session('is_ok') ? 'leafThreeRight' : '' }} lg:w-[209px] w-[140px] origin-bottom-left inline-block -mr-48 "
                    data-leafs="3r">
                    <source width="339" height="498" srcset="/assets/leaf_right.webp" type="image/webp">
                    <img width="339" height="498" src="/assets/leaf_right.png" alt="">
                </picture>
                <picture
                    class="absolute bottom-16 {{ session('is_ok') ? 'leafOneLeft' : '' }} -ml-48 inline-block lg:w-[209px] w-[140px]  origin-bottom-right "
                    data-leafs="1l">
                    <source width="339" height="498" srcset="/assets/leaf_left.webp" type="image/webp">
                    <img width="339" height="498" src="/assets/leaf_left.png" alt="">
                </picture>
                <picture
                    class="absolute bottom-16 {{ session('is_ok') ? 'leafTwoLeft' : '' }} -ml-48 inline-block lg:w-[209px] w-[140px] origin-bottom-right"
                    data-leafs="2l">
                    <source width="339" height="498" srcset="/assets/leaf_left.webp" type="image/webp">
                    <img width="339" height="498" src="/assets/leaf_left.png" alt="">
                </picture>
                <picture
                    class="absolute bottom-16  {{ session('is_ok') ? 'leafThreeLeft' : '' }} -ml-48 inline-block lg:w-[209px] w-[140px] origin-bottom-right "
                    data-leafs="3l">
                    <source width="339" height="498" srcset="/assets/leaf_left.webp" type="image/webp">
                    <img width="339" height="498" src="/assets/leaf_left.png" alt="">
                </picture>
                <picture class="absolute -mr-52 bottom-0  w-[130px]  lg:w-[200px]  -scale-x-100">
                    <source width="301" height="306" srcset="/assets/orange3.webp" type="image/webp">
                    <img width="301" height="306" src="/assets/orange3.png" alt="">
                </picture>
                <picture class="absolute -ml-52 bottom-10 w-[130px]  lg:w-[200px] 0">
                    <source width="301" height="306" srcset="/assets/orange3.webp" type="image/webp">
                    <img width="301" height="306" src="/assets/orange3.png" alt="">
                </picture>
                <picture class="absolute -ml-52 lg:-ml-64 bottom-0 w-[130px]  lg:w-[230px] ">
                    <source width="205" height="211" srcset="/assets/orange2.webp" type="image/webp">
                    <img width="205" height="211" src="/assets/orange2.png" alt="">
                </picture>
                <picture class="absolute w-32 lg:w-40 -bottom-2">
                    <source width="667" height="1000" srcset="/assets/bouteille.webp" type="image/webp">
                    <img width="667" height="1000" src="/assets/bouteille.png" alt="">
                </picture>
            </div>
        </div>
    </div>
    <img class="absolute hidden origin-center -bottom-20 -left-72 lg:block" src="/assets/confetti.svg"
        alt="">
</section>
