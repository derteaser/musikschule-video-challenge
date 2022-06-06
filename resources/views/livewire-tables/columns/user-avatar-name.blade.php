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
