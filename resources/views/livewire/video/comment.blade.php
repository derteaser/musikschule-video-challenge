@if (Auth::user()->can('comment video'))
    <x-jet-form-section submit="updateComment">
        <x-slot name="title">
            {{ __('Comment Video') }}
        </x-slot>

        <x-slot name="description">
            {{ __("Create or edit the Jury's comment for this video.") }}
        </x-slot>

        <x-slot name="form">
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="comment" value="{{ __('Comment') }}" />
                <x-wysiwyg id="comment" class="mt-1 block w-full" wire:model.defer="comment" />
                <x-jet-input-error for="comment" class="mt-2" />
            </div>

            <x-slot name="actions">
                <x-jet-action-message class="mr-3 text-green-800" on="commentUpdated">
                    {{ __('Saved.') }}
                </x-jet-action-message>

                <x-jet-button wire:loading.attr="disabled">
                    {{ __('Save') }}
                </x-jet-button>
            </x-slot>
        </x-slot>
    </x-jet-form-section>
@endif
