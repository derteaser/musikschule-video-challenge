<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @isset ($video)
                {{ $video->name ?? __('Videos') }}
            @else
                {{ __('Videos') }}
            @endisset
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session()->has('flash.banner'))
                <x-jet-banner />
            @endif

            @isset ($video)
                @livewire('video.show', ['video' => $video])
                @if (Auth::user()->can('delete video'))
                    <x-jet-section-border />
                    @livewire('video.delete', ['video' => $video])
                @endif
            @else
                @livewire('video.index')
            @endisset
        </div>
    </div>
</x-app-layout>
