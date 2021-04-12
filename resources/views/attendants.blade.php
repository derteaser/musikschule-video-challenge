@section('page-title')
    {{ __('Attendants') }}
@endsection
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Attendants') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session()->has('flash.banner'))
                <x-jet-banner />
            @endif

            <x-jet-section-title>
                <x-slot name="title">{{ __('New Registrations') }}</x-slot>
                <x-slot name="description"></x-slot>
            </x-jet-section-title>
            @livewire('attendant.index', ['filterByRole' => \App\Http\Livewire\Attendant\Index::NO_ROLES])

            <x-jet-section-border></x-jet-section-border>

            <x-jet-section-title>
                <x-slot name="title">{{ __('Students') }}</x-slot>
                <x-slot name="description"></x-slot>
            </x-jet-section-title>
            @livewire('attendant.index', ['filterByRole' => 'Student'])

            <x-jet-section-border></x-jet-section-border>

            <x-jet-section-title>
                <x-slot name="title">{{ __('Jury') }}</x-slot>
                <x-slot name="description"></x-slot>
            </x-jet-section-title>
            @livewire('attendant.index', ['filterByRole' => 'Jury'])

            <x-jet-section-border></x-jet-section-border>

            <x-jet-section-title>
                <x-slot name="title">{{ __('Admins') }}</x-slot>
                <x-slot name="description"></x-slot>
            </x-jet-section-title>
            @livewire('attendant.index', ['filterByRole' => 'Admin'])
        </div>
    </div>
</x-app-layout>
