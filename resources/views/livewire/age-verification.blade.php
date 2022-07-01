<section
    class="fixed z-50 top-0 items-center justify-center w-screen h-screen bg-black bg-opacity-80 {{ $isOk ? 'hidden' : 'flex' }}">
    <div class="p-4 space-y-10 text-white rounded-md lg:p-12 bg-zinc-700">
        <h1 class="text-3xl font-semibold text-center">La Folklorique</h1>
        <p>
            Avez-vous l'âge légal de consommer de l'alcool <br>
            Une bière brassée avec savoir se déguste avec sagesse.
        </p>
        <div>
            <button wire:click="setOk(true)" class="px-5 py-2 transition rounded-md hover:bg-primary-600 bg-primary-500">
                Oui, j'ai l'âge légal
            </button>
            <button wire:click="setOk(false)" class="mt-4 hover:underline lg:px-5 lg:py-2 lg:mt-0">
                Non, je n'ai pas l'âge légal
            </button>
        </div>
        @if ($isOk === false)
            <span class="block p-1 mt-4 text-center text-white bg-red-600 rounded-md">
                Vous devez avoir l'âge requis pour accéder à ce site.
            </span>
        @endif
    </div>
</section>
