<x-jet-form-section submit="updateVideoInformation">
    <x-slot name="title">
        {{ __('Edit Video') }}
    </x-slot>

    <x-slot name="description">

    </x-slot>

    <x-slot name="form">
        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="name" value="{{ __('Title') }}" />
            <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="state.name" />
            <x-jet-input-error for="name" class="mt-2" />
        </div>
        <!-- Description -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="description" value="{{ __('Description') }}" />
            <x-wysiwyg id="description" class="mt-1 block w-full" wire:model.defer="state.description" />
            <x-jet-input-error for="description" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3 text-green-800" on="videoUpdated">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <x-jet-button wire:loading.attr="disabled">
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
