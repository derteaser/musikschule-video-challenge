<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus tabindex="1" />
            </div>

            <div class="mt-4">
                <div class="flex justify-between">
                    <x-jet-label for="password" value="{{ __('Password') }}" />
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                </div>
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" tabindex="2" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" tabindex="3" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-center mt-8">
                <x-jet-button tabindex="4">
                    {{ __('Login') }}
                </x-jet-button>
                <a href="{{ route('register') }}" class="ml-4 text-xs text-gray-500 uppercase hover:underline">{{ __('Register') }}</a>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
