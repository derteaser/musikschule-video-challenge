@if (Auth::user()->can('hide video'))
    <x-jet-action-section>
        <x-slot name="title">
            {{ __('Hide Video') }}
        </x-slot>

        <x-slot name="description">
            {{ __('Hide the video from everyone or reveal it again.') }}
        </x-slot>

        <x-slot name="content">
            @if ($video->isHidden)
                <x-jet-secondary-button wire:click="revealVideo" wire:loading.attr="disabled">
                    {{ __('Reveal Video') }}
                </x-jet-secondary-button>
            @else
                <x-jet-danger-button wire:click="hideVideo" wire:loading.attr="disabled">
                    {{ __('Hide Video') }}
                </x-jet-danger-button>
            @endif
        </x-slot>
    </x-jet-action-section>
@endif
