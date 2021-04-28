<div>
    <x-video-search-filters />
    @if ($videos->isEmpty())
        <div class="bg-red-600 text-white px-4 py-2 rounded-lg">
            {{ __('Sorry, no videos found') }}
        </div>
    @endif
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6 container mx-auto">
        @foreach($videos as /* @var App\Models\Video $video */ $video)
            <a href="{{ route('dashboard-video', ['id' => $video->id]) }}" class="bg-white overflow-hidden shadow-md sm:rounded-lg group flex flex-col justify-between">
                <div>
                    <figure class="relative">
                        <img class="w-full h-64 object-cover" src="{{ $video->thumbnail()->toUrl() }}" alt="Video">
                        <div class="absolute top-0 right-0 m-4 flex flex-row space-x-2">
                            @if ($video->comment && Auth::user()->can('comment video'))
                                <div class="p-2 bg-gray-600 text-white text-xs uppercase rounded-lg">Kommentiert</div>
                            @endif
                            @if ($video->isHidden)
                                <div class="p-2 bg-red-600 text-white text-xs uppercase rounded-lg">Verborgen</div>
                            @endif
                        </div>
                    </figure>
                    <h1 class="block text-gray-800 font-semibold text-2xl mt-2 hover:text-gray-600 group-hover:underline px-6 pt-6">{{ $video->name }}</h1>
                </div>
                <div class="p-6">
                    <div class="flex items-center">
                        <div class="flex items-center">
                            <img class="h-8 w-8 rounded-full object-cover" src="{{ $video->user()->profile_photo_url }}" alt="{{ $video->user()->displayName() }}" />
                            <span class="mx-2 text-gray-700 font-semibold">{{ $video->user()->displayName() }}</span>
                        </div>
                        <span class="mx-1 text-gray-600 text-xs">{{ $video->created_at->format('d.m.Y') }}</span>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
    <div class="mt-8">{{ $videos->links() }}</div>
</div>
