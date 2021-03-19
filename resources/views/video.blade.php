<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @isset ($video)
                {{ $video->name ?? __('Videos') }}
            @else
                @if (isset($edit) && $edit)
                    {{ __('Meine Videos') }}
                @else
                    {{ __('Videos') }}
                @endif
            @endisset
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session()->has('flash.banner'))
                <x-jet-banner />
            @endif
            @if (isset($edit) && $edit)
                @isset ($video)
                    @livewire('video.edit', ['video' => $video])
                @else
                    @livewire('video.own', ['videos' => $videos])
                @endisset
            @else
                @isset ($video)
                    @livewire('video.show', ['video' => $video])
                @else
                    @livewire('video.index')
                @endisset
            @endif
        </div>
    </div>
</x-app-layout>
