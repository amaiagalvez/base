<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>

<body class="antialiased">

    <section class="h-screen flex items-center justify-center my-auto text-gray-600 body-font">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-wrap -m-4">

                @foreach ($notes as $note)
                    <x-card class="" :tags="$note->tags">
                        <x-slot name="title">
                            <h2 class="text-xl">{{ $note->name }}</h2>
                        </x-slot>
                        {{ $note->notes }}
                    </x-card>
                @endforeach

                <x-card class="lg:ml-2">
                    <x-slot name="title">
                        <h2 class="text-xl">Title 2 </h2>
                    </x-slot>
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Error, non. Architecto
                    consequatur impedit provident <strong>doloremque</strong> perferendis! Minima
                    nam
                    doloremque ad optio,
                    vel delectus, aliquam dolorum natus tempore magnam omnis numquam?
                </x-card>
            </div>
        </div>
    </section>

    @stack('modals')

    @livewireScripts
</body>

</html>
