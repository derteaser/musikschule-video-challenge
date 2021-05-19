@section('page-title')
    {{ __('Draw Winners') }}
@endsection
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Draw Winners') }}</h2>
    </x-slot>

    @livewire('video.draw')
</x-app-layout>
