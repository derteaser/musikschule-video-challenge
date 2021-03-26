<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6 container mx-auto">
    @foreach($videos as /* @var App\Models\Video $video */ $video)
    <div class="bg-white overflow-hidden shadow-md sm:rounded-lg relative">
        <a href="{{ route('dashboard-video', ['id' => $video->id]) }}" class="group">
            <img class="w-full h-64 object-cover" src="{{ $video->thumbnail()->toUrl() }}" alt="Video">
            @if ($video->isHidden)
                <div class="absolute m-4 p-2 top-0 right-0 bg-red-600 text-white text-xs uppercase rounded-lg">Verborgen</div>
            @endif
            <div class="p-6">
                <h1 class="block text-gray-800 font-semibold text-2xl mt-2 hover:text-gray-600 group-hover:underline">{{ $video->name }}</h1>
                <div class="mt-4">
                    <div class="flex items-center">
                        <div class="flex items-center">
                            <img class="h-8 w-8 rounded-full object-cover" src="{{ $video->user()->profile_photo_url }}" alt="{{ $video->user()->displayName() }}" />
                            <span class="mx-2 text-gray-700 font-semibold">{{ $video->user()->displayName() }}</span>
                        </div>
                        <span class="mx-1 text-gray-600 text-xs">{{ $video->created_at->format('d.m.Y') }}</span>
                    </div>
                </div>
            </div>
        </a>
    </div>
    @endforeach
</div>