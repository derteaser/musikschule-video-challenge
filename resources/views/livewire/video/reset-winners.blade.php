@if (Auth::user()->can('draw winners'))
    <x-jet-action-section>
        <x-slot name="title">
            {{ __('Reset Winners') }}
        </x-slot>

        <x-slot name="description">
            {{ __('This will permanently reset the list of winners.') }}
        </x-slot>

        <x-slot name="content">
            <x-jet-danger-button wire:click="confirmReset" wire:loading.attr="disabled">
                {{ __('Reset Winners') }}
            </x-jet-danger-button>

            <!-- Delete User Confirmation Modal -->
            <x-jet-dialog-modal wire:model="confirmingReset">
                <x-slot name="title">
                    {{ __('Reset Winners') }}
                </x-slot>

                <x-slot name="content">
                    {{ __('Are you sure you want to reset the list of winners?') }}
                </x-slot>

                <x-slot name="footer">
                    <x-jet-secondary-button wire:click="$toggle('confirmingReset')" wire:loading.attr="disabled">
                        {{ __('Nevermind') }}
                    </x-jet-secondary-button>

                    <x-jet-danger-button class="ml-2" wire:click="resetWinners" wire:loading.attr="disabled">
                        {{ __('Reset Winners') }}
                    </x-jet-danger-button>
                </x-slot>
            </x-jet-dialog-modal>
        </x-slot>
    </x-jet-action-section>
@endif
