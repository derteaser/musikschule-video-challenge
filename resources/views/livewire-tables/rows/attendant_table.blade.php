@php
/** @var \App\Http\Livewire\AttendantTable $this */
/** @var \App\Models\User $row */
/** @var bool $columnSelect */
@endphp

<x-livewire-tables::table.cell>
    {{ $row->id }}
</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>
    <div class="flex items-center">
        <div class="hidden md:flex flex-shrink-0 h-10 w-10">
            <img class="h-10 w-10 rounded-full" src="{{ $row->profile_photo_url }}" alt="{{ $row->name }}">
        </div>
        <div class="ml-4">
            {{ $row->name }}
            @if ($row->nickname)
                <div class="text-sm text-gray-500">{{ $row->nickname }}</div>
            @endif
        </div>
    </div>
</x-livewire-tables::table.cell>
@if (!$columnSelect || $this->isColumnSelectEnabled('email'))
    <x-livewire-tables::table.cell>
        <p class="text-blue-400 truncate">
            <a href="mailto:{{ $row->email }}" class="hover:underline">{{ $row->email }}</a>
        </p>
    </x-livewire-tables::table.cell>
@endif
@if (!$columnSelect || $this->isColumnSelectEnabled('musicalInstrument.name'))
    <x-livewire-tables::table.cell>
        {{ $row->musicalInstrument->name ?? '-' }}
    </x-livewire-tables::table.cell>
@endif
@if (!$columnSelect || $this->isColumnSelectEnabled('teacher'))
    <x-livewire-tables::table.cell>
        {{ $row->teacher ?? '-' }}
    </x-livewire-tables::table.cell>
@endif
@if (!$columnSelect || $this->isColumnSelectEnabled('city'))
    <x-livewire-tables::table.cell>
        {{ $row->city ?? '-' }}
    </x-livewire-tables::table.cell>
@endif
@if (!$columnSelect || $this->isColumnSelectEnabled('birthday.age'))
    <x-livewire-tables::table.cell>
        {{ $row->birthday->age ?? '-' }}
    </x-livewire-tables::table.cell>
@endif
@if (!$columnSelect || $this->isColumnSelectEnabled('role'))
    <x-livewire-tables::table.cell>
        <p class="whitespace-nowrap text-sm text-gray-500">
            @if ($row->roles->isEmpty())
                {{ __('New Registration') }}
            @else
                @foreach($row->roles->pluck('name') as $role)
                    <x-badge>{{ $role }}</x-badge>
                @endforeach
            @endif
        </p>
    </x-livewire-tables::table.cell>
@endif
<x-livewire-tables::table.cell>
    @if ($row->video)
        <x-badge type="info">{{ __('Video uploaded') }}</x-badge>
    @elseif ($row->hasVerifiedEmail())
        <x-badge type="success">{{ __('Email verified') }}</x-badge>
    @else
        <x-badge type="error">{{ __('Email not verified') }}</x-badge>
    @endif
</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>
    <p class="whitespace-nowrap text-xs text-gray-500">
        {{ $row->created_at->format('d.m.Y') }}
    </p>
</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>
    @if (!$row->hasAnyRole(['Admin', 'Superadmin']))
        <x-jet-dropdown align="right">
            <x-slot name="trigger">
                <div class="text-right">
                    <x-jet-button wire:loading.attr="disabled">{{ __('Actions') }}</x-jet-button>
                </div>
            </x-slot>
            <x-slot name="content">
                @if (!$row->hasVerifiedEmail())
                    <x-jet-dropdown-link href="#" wire:click.prevent="viewDeleteUserModal({{ $row->id }})" wire:loading.attr="disabled">
                        {{ __('Delete') }}
                    </x-jet-dropdown-link>
                @endif
                @if ($row->hasVerifiedEmail() && $row->getRoleNames()->isEmpty())
                    <x-jet-dropdown-link href="#" wire:click.prevent="approveUserAttendance({{ $row->id }})">
                        {{ __('Approve Attendance') }}
                    </x-jet-dropdown-link>
                @endif
                @if ($row->hasVerifiedEmail() && $row->getRoleNames()->isEmpty())
                    <x-jet-dropdown-link href="#" wire:click.prevent="remindUserOfTerms({{ $row->id }})">
                        {{ __('Remind User of Terms') }}
                    </x-jet-dropdown-link>
                @endif
                @if ($row->video)
                    <x-jet-dropdown-link href="{{ route('dashboard-video', ['id' => $row->video->id]) }}">
                        {{ __('Show Video') }}
                    </x-jet-dropdown-link>
                @endif
            </x-slot>
        </x-jet-dropdown>
    @endif
</x-livewire-tables::table.cell>
