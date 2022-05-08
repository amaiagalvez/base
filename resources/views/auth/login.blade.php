<x-guest-layout>
    <x-jet-authentication-card>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Username / Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email"
                    :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password"
                    required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-fuchsia-400 hover:text-fuchsia-600"
                        href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-jet-button class="ml-4 bg-fuchsia-400 hover:bg-fuchsia-600">
                    {{ __('Log in') }}
                </x-jet-button>
            </div>
        </form>

    </x-jet-authentication-card>

    <div class="-mt-20">
        <a href="{{ route('base::packages') }}">
            <img src="{{ asset('storage/images/tissue.jpg') }}" alt="Amaia"
                class="w-20 h-auto mr-2 mb-5
                rounded-full float-left">
        </a>
    </div>

</x-guest-layout>
