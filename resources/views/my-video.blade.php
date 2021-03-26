<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Mein Video</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session()->has('flash.banner'))
                <x-jet-banner />
            @endif

            @if ($video = Auth::user()->video()->first())
                @livewire('video.edit', ['video' => $video])
            @else
                <div class="h-full flex flex-col items-center justify-center">
                    @livewire('video.create')
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
