<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Welcome') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-10 prose prose-lg mx-auto">
                {{ \Illuminate\Mail\Markdown::parse(File::get('../resources/markdown/welcome.md')) }}

                @if (Auth::user()->can('create video') && !Auth::user()->video()->first())
                    <x-jet-button onclick="window.location='{{ route('dashboard-own-video') }}'">Zum Video-Upload</x-jet-button>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
