<x-jet-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Profile Information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update your account\'s profile information and email address.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                <!-- Profile Photo File Input -->
                <input type="file" class="hidden"
                            wire:model="photo"
                            x-ref="photo"
                            x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

                <x-jet-label for="photo" value="{{ __('Photo') }}" />

                <!-- Current Profile Photo -->
                <div class="mt-2" x-show="! photoPreview">
                    <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}" class="rounded-full h-20 w-20 object-cover">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoPreview">
                    <span class="block rounded-full w-20 h-20"
                          x-bind:style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

                <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                    {{ __('Select A New Photo') }}
                </x-jet-secondary-button>

                @if ($this->user->profile_photo_path)
                    <x-jet-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                        {{ __('Remove Photo') }}
                    </x-jet-secondary-button>
                @endif

                <x-jet-input-error for="photo" class="mt-2" />
            </div>
        @endif

        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="name" value="{{ __('Name') }}" />
            <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="state.name" autocomplete="name" />
            <x-jet-input-error for="name" class="mt-2" />
        </div>

        <!-- Nickname -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="nickname" value="{{ __('Nickname') }}  ({{ __('optional') }})" />
            <x-jet-input id="nickname" type="text" class="mt-1 block w-full" wire:model.defer="state.nickname" />
            <x-jet-input-error for="nickname" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="email" value="{{ __('Email') }}" />
            <x-jet-input id="email" type="email" class="mt-1 block w-full bg-gray-100 cursor-not-allowed" wire:model.defer="state.email" readonly />
            <x-jet-input-error for="email" class="mt-2" />
        </div>

        <!-- fields only necessary for contestants -->
        @if (Auth::user()->can('create video'))
            <!-- City -->
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="city" value="{{ __('City') }}" />
                <x-jet-input id="city" type="text" class="mt-1 block w-full" wire:model.defer="state.city" />
                <x-jet-input-error for="city" class="mt-2" />
            </div>

            <!-- Birthday -->
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="birthday" value="{{ __('Birthday') }}" />
                <x-jet-input id="birthday" class="block mt-1 w-full" type="date" min="1920-01-01" max="2018-01-01" wire:model.defer="state.birthday" />
                <x-jet-input-error for="birthday" class="mt-2" />
            </div>

            <!-- Instrument -->
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="musical_instrument_id" value="{{ __('Musical Instrument') }}" />
                <x-instrument-select id="musical_instrument_id" class="mt-1 block w-full" wire:model.defer="state.musical_instrument_id" />
                <x-jet-input-error for="musical_instrument_id" class="mt-2" />
            </div>

            <!-- Teacher -->
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="teacher" value="{{ __('Teacher') }}" />
                <x-jet-input id="teacher" type="text" class="mt-1 block w-full" wire:model.defer="state.teacher" />
                <x-jet-input-error for="teacher" class="mt-2" />
            </div>
        @endif
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <x-jet-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
