<x-guest-layout>

    <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
        <x-jet-authentication-card-logo />
    </div>

    <div class="relative flex items-top justify-center min-h-screen  sm:items-center py-4 sm:pt-1">
        <div class="fixed top-0 right-0 px-6 py-4 sm:block">

            <div class="">
                @foreach (config('app.available_locales') as $locale_name => $available_locale)
                    @if ($available_locale === \App::getLocale())
                        <span
                            class="mr-2 text-fuchsia-500 font-extrabold underline underline-offset-4">{{ $locale_name }}</span>
                    @else
                        <a class="text-fuchsia-300 mr-2  font-bold"
                            href="/{{ $available_locale }}">
                            <span>{{ $locale_name }} </span>
                        </a>
                    @endif
                @endforeach
            </div>
        </div>

        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

            <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                <div class="grid grid-cols-1 md:grid-cols-2">
                    @foreach ($packs as $pack)
                        @if ($loop->first)
                            <div class="p-6">
                                <div class="flex items-center">
                                    <div class="ml-8 px-4 w-20 md:w-32 h-auto">
                                        <img src="{{ $pack['image'] }}"
                                            alt="{{ $pack['name'] }}"
                                            class="shadow-lg rounded-lg max-w-full h-auto align-middle border-none" />
                                    </div>

                                    <div class="ml-4 text-lg leading-7 font-semibold"><a
                                            href="{{ $pack['link'] }}"
                                            class="text-gray-900 dark:text-white">{{ $pack['name'] }}</a>
                                    </div>
                                </div>

                                <div class="ml-12">
                                    <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                        {{ $pack['description'] }}
                                    </div>
                                </div>
                            </div>
                        @elseif ($loop->index == 1)
                            <div
                                class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l">
                                <div class="flex items-center">

                                    <div class="ml-8 px-4 w-20 md:w-32 h-auto">
                                        <img src="{{ $pack['image'] }}"
                                            alt="{{ $pack['name'] }}"
                                            class="shadow-lg rounded-lg max-w-full h-auto align-middle border-none" />
                                    </div>

                                    <div class="ml-4 text-lg leading-7 font-semibold"><a
                                            href="{{ $pack['link'] }}"
                                            class="text-gray-900 dark:text-white">{{ $pack['name'] }}</a>
                                    </div>
                                </div>

                                <div class="ml-12">
                                    <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                        {{ $pack['description'] }}
                                    </div>
                                </div>
                            </div>
                        @elseif ($loop->index % 2 == 0)
                            <div class="p-6 border-t border-gray-200 dark:border-gray-700">
                                <div class="flex items-center">

                                    <div class="ml-8 px-4 w-20 md:w-32 h-auto">
                                        <img src="{{ $pack['image'] }}"
                                            alt="{{ $pack['name'] }}"
                                            class="shadow-lg rounded-lg max-w-full h-auto align-middle border-none" />
                                    </div>

                                    <div class="ml-4 text-lg leading-7 font-semibold"><a
                                            href="{{ $pack['link'] }}"
                                            class="text-gray-900 dark:text-white">{{ $pack['name'] }}</a>
                                    </div>
                                </div>

                                <div class="ml-12">
                                    <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                        {{ $pack['description'] }}
                                    </div>
                                </div>
                            </div>
                        @else
                            <div
                                class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-l">
                                <div class="flex items-center">

                                    <div class="ml-8 px-4 w-20 md:w-32 h-auto">
                                        <img src="{{ $pack['image'] }}"
                                            alt="{{ $pack['name'] }}"
                                            class="shadow-lg rounded-lg max-w-full h-auto align-middle border-none" />
                                    </div>

                                    <div class="ml-4 text-lg leading-7 font-semibold"><a
                                            href="{{ $pack['link'] }}"
                                            class="text-gray-900 dark:text-white">{{ $pack['name'] }}</a>
                                    </div>
                                </div>

                                <div class="ml-12">
                                    <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                        {{ $pack['description'] }}
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>

            <div class="flex justify-center mt-4 sm:items-center sm:justify-between">
                <div class="text-center text-sm text-gray-500 sm:text-left">
                    <div class="flex items-center">

                        <svg fill="none" stroke="currentColor" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                            class="ml-4 -mt-px w-5 h-5 text-gray-400">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z">
                            </path>
                        </svg>
                        <a href="/" class="ml-1">
                            Amaia Galvez Itarte
                        </a>
                    </div>
                </div>

                <div
                    class="
                            ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
                    Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP
                    v{{ PHP_VERSION }})
                </div>
            </div>
        </div>
    </div>

</x-guest-layout>
