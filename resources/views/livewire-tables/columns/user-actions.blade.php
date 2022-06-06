<div class="grid sm:grid-cols-5 gap-1">
    <div>
        @if ($row->hasVerifiedEmail() && $row->getRoleNames()->isEmpty())
            <x-icon-link href="#" wire:click.prevent="approveUserAttendance({{ $row->id }})" :title="__('Approve Attendance')">
                <x-heroicon-o-badge-check class="w-5 h-5" />
            </x-icon-link>
        @endif
    </div>
    <div>
        @if ($row->hasVerifiedEmail() && $row->getRoleNames()->isEmpty())
            <x-icon-link href="#" wire:click.prevent="remindUserOfTerms({{ $row->id }})" :title="__('Remind User of Terms')">
                <x-heroicon-o-speakerphone class="w-5 h-5" />
            </x-icon-link>
        @endif
    </div>
    <div>
        @if ($row->video)
            <x-icon-link href="{{ route('dashboard-video', ['id' => $row->video->id]) }}" :title="__('Show Video')">
                <x-heroicon-o-film class="w-5 h-5" />
            </x-icon-link>
        @endif
    </div>
    <div>
        <x-icon-link href="{{ route('dashboard-user', ['user' => $row]) }}" :title="__('Edit')">
            <x-heroicon-o-pencil class="w-5 h-5" />
        </x-icon-link>
    </div>
    <div>
        @if (!$row->video)
            <x-icon-link href="#" wire:click.prevent="viewDeleteUserModal({{ $row->id }})" wire:loading.attr="disabled" :title="__('Delete')">
                <x-heroicon-o-trash class="w-5 h-5" />
            </x-icon-link>
        @endif
    </div>
</div>
