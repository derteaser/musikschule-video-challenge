<div class="mb-8 px-2 md:px-0" x-data="{ open: false }">
    <x-jet-secondary-button type="button" wire:loading.attr="disabled" @click="open = ! open" x-text="open ? '{{ __('Hide Filters') }}' : '{{ __('Show Filters') }}'"></x-jet-secondary-button>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-3 mt-2 origin-top" x-show="open"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="transform opacity-0 scale-y-0"
         x-transition:enter-end="transform opacity-100 scale-y-100"
         x-transition:leave="transition ease-in duration-75"
         x-transition:leave-start="transform opacity-100 scale-y-100"
         x-transition:leave-end="transform opacity-0 scale-y-0">
        <div>
            <x-jet-label for="instrument">{{ __('Musical Instrument') }}</x-jet-label>
            <x-instrument-search-filter id="instrument" class="w-full mt-1" wire:model="musicalInstrumentId"/>
        </div>
        <div>
            <x-jet-label for="age">{{ __('Age') }}</x-jet-label>
            <x-age-search-filter id="age" class="w-full mt-1" wire:model="age"/>
        </div>
        <div>
            <x-jet-label for="searchTerm">{{ __('Search Term') }}</x-jet-label>
            <x-jet-input id="searchTerm" type="text" class="mt-1 block w-full" wire:model="searchTerm"/>
        </div>
    </div>
</div>
