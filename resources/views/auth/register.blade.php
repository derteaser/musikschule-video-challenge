<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="nickname" value="{{ __('Nickname') }} (optional)" />
                <x-jet-input id="nickname" class="block mt-1 w-full" type="text" name="nickname" :value="old('nickname')" />
            </div>

            <div class="mt-4">
                <x-jet-label for="city" value="{{ __('City') }}" />
                <x-jet-input id="city" class="block mt-1 w-full" type="text" name="city" :value="old('city')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="birthday" value="{{ __('Birthday') }}" />
                <x-jet-input id="birthday" class="block mt-1 w-full" type="date" min="1920-01-01" max="2018-01-01" name="birthday" :value="old('birthday')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="musical_instrument_id" value="{{ __('Musical Instrument') }}" />
                <x-instrument-select id="musical_instrument_id" class="mt-1 block w-full" name="musical_instrument_id" :value="old('musical_instrument_id')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="teacher" value="{{ __('Teacher') }}" />
                <x-jet-input id="teacher" class="block mt-1 w-full" type="text" name="teacher" :value="old('teacher')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-center mt-8">
                <x-jet-button>
                    {{ __('Register') }}
                </x-jet-button>
                <a href="{{ route('login') }}" class="ml-4 text-xs text-gray-500 uppercase hover:underline">{{ __('Already registered?') }}</a>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
