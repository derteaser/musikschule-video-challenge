<tr>
    <td class="px-6 py-4 whitespace-nowrap">
        <div class="flex items-center">
            <div class="flex-shrink-0 h-10 w-10">
                <img class="h-10 w-10 rounded-full" src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}">
            </div>
            <div class="ml-4">
                <div class="text-sm font-medium text-gray-900">
                    @if ($user->nickname)
                        {{ $user->name }} ({{ $user->nickname }})
                    @else
                        {{ $user->name }}
                    @endif
                </div>
                <div class="text-sm text-gray-500">
                    {{ $user->email }}
                </div>
            </div>
        </div>
    </td>
    <td class="px-6 py-4 whitespace-nowrap">
        <div class="text-sm text-gray-900">{{ $user->musicalInstrument()->first()->name ?? '' }}</div>
        <div class="text-sm text-gray-500">{{ $user->teacher }}</div>
    </td>
    <td class="px-6 py-4 whitespace-nowrap">
        @if ($user->hasVerifiedEmail())
            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                      {{ __('E-Mail verified') }}
                                    </span>
        @else
            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                      {{ __('E-Mail not verified') }}
                                    </span>
        @endif
    </td>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
        {{ $user->roles->pluck('name')->implode(', ') }}
    </td>
    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
        <x-jet-dropdown align="right">
            <x-slot name="trigger">
                <div class="text-right">
                    <x-jet-button wire:loading.attr="disabled">{{ __('Actions') }}</x-jet-button>
                </div>
            </x-slot>
            <x-slot name="content">
                @if ($user->hasVerifiedEmail())
                    <x-jet-dropdown-link href="#" wire:click="remindUserOfTerms">
                        {{ __('Remind User of Terms') }}
                    </x-jet-dropdown-link>
                @endif
            </x-slot>
        </x-jet-dropdown>
        @if ($successMessage)
            <div class="bg-green-600 text-white rounded px-2 py-1 text-xs mt-1" wire:loading.class="hidden">
                {{ $successMessage }}
            </div>
        @endif
    </td>
</tr>

