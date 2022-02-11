 <x-jet-dialog-modal wire:model="viewingModal">
    <x-slot name="title">
        {{ __('Delete') }}
    </x-slot>

    <x-slot name="content">
        {{ __('Are you sure you want to delete this user?') }}
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="resetModal" wire:loading.attr="disabled">
            {{ __('Nevermind') }}
        </x-jet-secondary-button>

        <x-jet-danger-button class="ml-2" wire:click="deleteUser({{ $currentModel }})" wire:loading.attr="disabled">
            {{ __('Delete') }}
        </x-jet-danger-button>
    </x-slot>
</x-jet-dialog-modal>
