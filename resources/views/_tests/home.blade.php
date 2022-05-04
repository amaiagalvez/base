<!DOCTYPE html>
<html lang="eu">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tailwind 8</title>

    <link rel="stylesheet" href="{{ mix('base/css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ mix('base/js/app.js') }}" defer></script>

</head>

<body>
    <div class="container">

        @php
            $nav_links = [
                [
                    'name' => __('Home'),
                    'route' => route('base::home'),
                    'active' => request()->routeIs('base::home'),
                ],
                [
                    'name' => __('Test'),
                    'route' => route('base::test'),
                    'active' => request()->routeIs('base::test'),
                ],
                [
                    'name' => __('Theme'),
                    'route' => 'https://womens.kicker.axiomthemes.com',
                    'active' => false,
                    'target' => 'blank',
                ],
            ];
        @endphp

        <nav x-data="{ open: false }" class="">

            <!-- Primary Navigation Menu -->
            <div class="max-w-7xl mx-auto mt-5 px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <!-- Logo -->
                        <div class="shrink-0 flex items-center">
                            <a href="{{ route('base::home') }}">
                                <img src="{{ asset('storage/images/photo_large.jpg') }}"
                                    alt="Amaia" width="50%" height="auto" class="block">

                            </a>
                        </div>

                        <!-- Navigation Links -->
                        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex ">
                            @foreach ($nav_links as $nav_link)
                                <x-jet-nav-link :href="$nav_link['route']" :active="$nav_link['active']"
                                    class="text-fuchsia-400">
                                    {{ $nav_link['name'] }}
                                </x-jet-nav-link>
                            @endforeach
                        </div>
                    </div>

                    <!-- Hamburger -->
                    <div class="-mr-2 flex items-center sm:hidden">
                        <button @click="open = ! open"
                            class="inline-flex items-center justify-center p-2 rounded-md text-fuchsia-400 hover:text-fuchsia-500 hover:bg-fuchsia-100 focus:outline-none focus:bg-fuchsia-100 focus:text-fuchsia-500 transition">
                            <svg class="h-6 w-6" stroke="currentColor" fill="none"
                                viewBox="0 0 24 24">
                                <path :class="{ 'hidden': open, 'inline-flex': !open }"
                                    class="inline-flex" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16" />
                                <path :class="{ 'hidden': !open, 'inline-flex': open }"
                                    class="hidden" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                </div>
            </div>

            <!-- Responsive Navigation Menu -->
            <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">

                <div class="pt-2 pb-3 space-y-1">

                    @foreach ($nav_links as $nav_link)
                        <x-jet-responsive-nav-link :href="$nav_link['route']" :active="$nav_link['active']">
                            {{ $nav_link['name'] }}
                        </x-jet-responsive-nav-link>
                    @endforeach
                </div>
            </div>

        </nav>

        <main class="py-5">

            <div
                class="card-zoom relative flex items-center justify-center m-3 overflow-hidden shadow-xl w-60 h-60 rounded-2xl">

                <div class="card-zoom-image absolute w-full h-full transition-all duration-500 ease-in-out transform bg-center bg-cover hover:scale-150"
                    style="background-image: url({{ asset('storage/images/marguerite.jpg') }})">
                </div>
                <h1
                    class="card-zoom-text absolute text-5xl font-black transition-all duration-500 ease-in-out transform scale-150 text-gray-50 opacity-60 hover:scale-150">
                    CAR</h1>
            </div>


            <section id="">
                <div class="grid grid-cols-1 md:grid-cols-2 overflow-hidden">

                    <div class="z-50 relative h-96 transition-all duration-500 ease-in-out transform bg-center bg-cover hover:scale-105
                     row-span-2 "
                        style="background-image: url({{ asset('storage/images/code.jpg') }})">

                        <div class="flex flex-col justify-center items-center h-96">
                            <p
                                class="text-xs uppercase bg-fuchsia-500 text-white px-4 py-1 rounded-sm
                        hover:bg-white hover:text-fuchsia-500 hover:border-fuchsia-500 hover:border-2">
                                Developer
                            </p>
                            <div class="bg-fuchsia-800/25 mt-2 py-3 w-full">
                                <p class=" font-bold text-2xl text-white/100 text-center">
                                    Software Developer && Project Management</p>
                                <p class="font-bold text-xs text-white text-center">20 years
                                    experience</p>
                            </div>
                        </div>
                    </div>

                    <div class="z-2 relative h-48 transition-all duration-500 ease-in-out transform bg-center bg-cover hover:scale-105"
                        style="background-image: url({{ asset('storage/images/marguerite.jpg') }})">

                        <div class="flex flex-col justify-center items-center h-48">
                            <p
                                class="text-xs uppercase bg-fuchsia-500 text-white px-4 py-1 rounded-sm
                       hover:bg-white hover:text-fuchsia-500 hover:border-fuchsia-500 hover:border-2">
                                Flowers
                            </p>
                            <div class="bg-fuchsia-800/25 mt-2 py-3 w-full">
                                <p class=" font-bold text-xl text-white/100 text-center">
                                    Marguerites && Roses
                                </p>
                                <p class="font-bold text-xs text-white text-center"></p>
                            </div>
                        </div>
                    </div>

                    <div class="z-1 relative h-48 transition-all duration-500 ease-in-out transform bg-center bg-cover hover:scale-105"
                        style="background-image: url({{ asset('storage/images/tissue.jpg') }})">

                        <div class="flex flex-col justify-center items-center h-48">
                            <p
                                class="text-xs uppercase bg-fuchsia-500 text-white px-4 py-1 rounded-sm
                       hover:bg-white hover:text-fuchsia-500 hover:border-fuchsia-500 hover:border-2">
                                Crochet
                            </p>
                            <div class="bg-fuchsia-800/25 mt-2 py-3 w-full">
                                <p class=" font-bold text-xl text-white/100 text-center">
                                    Crochets && Wools
                                </p>
                                <p class="font-bold text-xs text-white text-center"></p>
                            </div>
                        </div>
                    </div>

                </div>

            </section>

            <!-- Back to top button -->
            <button type="button" data-mdb-ripple="true" data-mdb-ripple-color="light"
                class="inline-block p-1 bg-fuchsia-500 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-fuchsia-700 hover:shadow-lg focus:bg-fuchsia-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out hidden bottom-5 right-5 fixed"
                id="btn-back-to-top">
                <svg aria-hidden="true" focusable="false" data-prefix="fas" class="w-3 h-3"
                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                    <path fill="currentColor"
                        d="M34.9 289.5l-22.2-22.2c-9.4-9.4-9.4-24.6 0-33.9L207 39c9.4-9.4 24.6-9.4 33.9 0l194.3 194.3c9.4 9.4 9.4 24.6 0 33.9L413 289.4c-9.5 9.5-25 9.3-34.3-.4L264 168.6V456c0 13.3-10.7 24-24 24h-32c-13.3 0-24-10.7-24-24V168.6L69.2 289.1c-9.3 9.8-24.8 10-34.3.4z">
                    </path>
                </svg>
            </button>
        </main>
    </div>

    <script>
        // Get the button
        let mybutton = document.getElementById('btn-back-to-top');

        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {
            scrollFunction();
        };

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                mybutton.style.display = 'block';
            } else {
                mybutton.style.display = 'none';
            }
        }
        // When the user clicks on the button, scroll to the top of the document
        mybutton.addEventListener('click', backToTop);

        function backToTop() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
    </script>
</body>

</html>
