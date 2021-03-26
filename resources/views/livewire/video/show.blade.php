<div class="container mx-auto bg-white overflow-hidden shadow-lg sm:rounded-lg">
    @livewire('video.player', ['video' => $video])
    <div class="p-6">
        <div>
            <h1 class="block text-gray-800 font-semibold text-2xl my-2 hover:text-gray-600 hover:underline">{{ $video->name }}</h1>
            <div class="prose my-2">{!! nl2br($video->description) !!}</div>
        </div>

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
    @if (Auth::user()->can('view user data'))
        <div class="grid grid-flow-col auto-cols-auto gap-6 mt-2 p-6 bg-gray-100">
            <div>
                <h4 class="text-xs text-gray-600 uppercase">Instrument</h4>
                {{ Auth::user()->musicalInstrument()->first()->name }}
            </div>
            <div>
                <h4 class="text-xs text-gray-600 uppercase">Alter</h4>
                {{ Auth::user()->age() }}
            </div>
            <div>
                <h4 class="text-xs text-gray-600 uppercase">Wohnort</h4>
                {{ Auth::user()->city }}
            </div>
            <div>
                <h4 class="text-xs text-gray-600 uppercase">Lehrer/in</h4>
                {{ Auth::user()->teacher }}
            </div>
        </div>
    @endif
</div>
