<div class=" h-screen bg-gray-100">
    <x-jet-authentication-card-logo />

    <div class="flex flex-col sm:justify-center items-center pt-2 sm:pt-0 bg-gray-100">
        <div
            class="my-5 w-full sm:max-w-md px-6 py-3 bg-white shadow-xl overflow-hidden sm:rounded-lg">
            {{ $slot }}
        </div>
    </div>

    <div class="sticky top-[90vh] bottom-0">
        <a href="{{ route('base::home') }}">
            <img src="{{ asset('storage/images/marguerite.jpg') }}" alt="Amaia"
                class="w-20 h-auto mr-2
                rounded-full float-right">
        </a>
    </div>

</div>
