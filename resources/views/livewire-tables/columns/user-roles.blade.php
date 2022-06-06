<p class="whitespace-nowrap text-sm text-gray-500">
    @if ($row->roles->isEmpty())
        {{ __('New Registration') }}
    @else
        @foreach($row->roles->pluck('name') as $role)
            <x-badge>{{ $role }}</x-badge>
        @endforeach
    @endif
</p>
