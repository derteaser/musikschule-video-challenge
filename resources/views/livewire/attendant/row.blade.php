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
                                      {{ __('Email verified') }}
                                    </span>
        @else
            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                      {{ __('Email not verified') }}
                                    </span>
        @endif
    </td>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
        {{ $user->roles->pluck('name')->implode(', ') }}
    </td>
    <td class="px-6 py-4 whitespace-nowrap text-xs text-gray-500">
        {{ $user->created_at->format('d.m.Y') }}
    </td>
    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
        @if (!$user->hasAnyRole(['Admin', 'Superadmin']))
            <x-jet-dropdown align="right">
                <x-slot name="trigger">
                    <div class="text-right">
                        <x-jet-button wire:loading.attr="disabled">{{ __('Actions') }}</x-jet-button>
                    </div>
                </x-slot>
                <x-slot name="content">
                    @if ($user->hasVerifiedEmail() && $user->getRoleNames()->isEmpty())
                        <x-jet-dropdown-link href="#" wire:click="approveUserAttendance">
                            {{ __('Approve Attendance') }}
                        </x-jet-dropdown-link>
                    @endif
                    @if ($user->hasVerifiedEmail() && $user->getRoleNames()->isEmpty())
                        <x-jet-dropdown-link href="#" wire:click="remindUserOfTerms">
                            {{ __('Remind User of Terms') }}
                        </x-jet-dropdown-link>
                    @endif
                    @if ($user->video)
                            <x-jet-dropdown-link href="{{ route('dashboard-video', ['id' => $user->video->id]) }}">
                                {{ __('Video') }}
                            </x-jet-dropdown-link>
                    @endif
                </x-slot>
            </x-jet-dropdown>
            <x-jet-action-message class="mr-3 text-green-800" on="reminderSent">
                {{ __('Reminder successfully sent.') }}
            </x-jet-action-message>
            <x-jet-action-message class="mr-3 text-green-800" on="attendanceApproved">
                {{ __('Attendance successfully approved.') }}
            </x-jet-action-message>
        @endif
    </td>
</tr>

