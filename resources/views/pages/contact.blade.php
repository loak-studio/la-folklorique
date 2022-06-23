<x-main-layout title="Contact" :breadcrumb="[['name' => 'Contact', 'route' => 'contact']]">
    <section class="pt-32 pb-20 "
        style="background: url('/assets/contact.webp'); background-size:cover; background-position:center;">
        <div class="w-full max-w-5xl mx-auto ">
            @if (empty($sent))
                <form method="POST" class="flex flex-col w-full max-w-md gap-4 rounded-md bg-zinc-900 p-7"
                    action="{{ route('send-contact') }}">
                    @csrf
                    <x-input required label="Votre nom" name="name" />
                    <x-input required label="Votre email" name="email" type="email" />
                    <label for="message" class="mb-4 text-gray-400">Votre message</label>
                    <textarea required name="message" id="message" rows="4"
                        class="text-white border-gray-600 rounded-md bg-zinc-700"></textarea>
                    <div class="z-10 self-start">
                        <x-button>Envoyer</x-button>
                    </div>
                </form>
            @else
                <div class="flex flex-col w-full max-w-md rounded-md bg-zinc-900 p-7">
                    <p class="text-white">Votre message a bien été envoyé</p>
                </div>
            @endif
        </div>
    </section>
</x-main-layout>
