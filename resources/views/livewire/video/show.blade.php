<div class="container mx-auto bg-white overflow-hidden shadow-lg sm:rounded-lg">
    @livewire('video.player', ['video' => $video])
    <div class="p-6">
        <div>
            <h1 class="block text-gray-800 font-semibold text-2xl mt-2 hover:text-gray-600 hover:underline">{{ $video->name }}</h1>
            <div class="text-gray-600 mt-2">{{ $video->description }}</div>
        </div>

        <div class="mt-4">
            <div class="flex items-center">
                <div class="flex items-center">
                    <img class="h-8 w-8 rounded-full object-cover" src="{{ $video->user()->profile_photo_url }}" alt="{{ $video->user()->name }}" />
                    <span class="mx-2 text-gray-700 font-semibold">{{ $video->user()->name }} ({{ $video->user()->age() }})</span>
                </div>
                <span class="mx-1 text-gray-600 text-xs">{{ $video->created_at->format('d.m.Y') }}</span>
            </div>
        </div>
    </div>
</div>
