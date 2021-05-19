@if (Auth::user()->can('draw winners'))
    <x-jet-form-section submit="startDraw">
        <x-slot name="title">
            {{ __('New Draw') }}
        </x-slot>

        <x-slot name="description">

        </x-slot>

        <x-slot name="form">
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="maxWinners" value="{{ __('Number of winning tickets') }}" />
                <x-jet-input id="maxWinners" type="number" min="1" max="100" wire:model="maxWinners" class="mt-1 block w-full" />
                <x-jet-input-error for="maxWinners" class="mt-2" />
            </div>

            <x-slot name="actions">
                <x-jet-action-message class="mr-3 text-green-800" on="finishedDraw">
                    {{ __('Finished Draw.') }}
                </x-jet-action-message>

                <x-jet-button wire:loading.attr="disabled">
                    {{ __('Start Draw') }}
                </x-jet-button>
            </x-slot>
        </x-slot>
    </x-jet-form-section>
@endif
