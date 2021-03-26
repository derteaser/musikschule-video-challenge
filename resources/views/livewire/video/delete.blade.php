@if (Auth::user()->can('delete video'))
    <x-jet-action-section>
        <x-slot name="title">
            {{ __('Delete Video') }}
        </x-slot>

        <x-slot name="description">
            {{ __('This will permanently delete this video. Afterwards the user will be able to upload a new one.') }}
        </x-slot>

        <x-slot name="content">
            <x-jet-danger-button wire:click="confirmVideoDeletion" wire:loading.attr="disabled">
                {{ __('Delete Video') }}
            </x-jet-danger-button>

            <!-- Delete User Confirmation Modal -->
            <x-jet-dialog-modal wire:model="confirmingVideoDeletion">
                <x-slot name="title">
                    {{ __('Delete Video') }}
                </x-slot>

                <x-slot name="content">
                    {{ __('Are you sure you want to delete this video?') }}
                </x-slot>

                <x-slot name="footer">
                    <x-jet-secondary-button wire:click="$toggle('confirmingVideoDeletion')" wire:loading.attr="disabled">
                        {{ __('Nevermind') }}
                    </x-jet-secondary-button>

                    <x-jet-danger-button class="ml-2" wire:click="deleteVideo" wire:loading.attr="disabled">
                        {{ __('Delete Video') }}
                    </x-jet-danger-button>
                </x-slot>
            </x-jet-dialog-modal>
        </x-slot>
    </x-jet-action-section>
@endif
