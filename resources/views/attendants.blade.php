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

            @livewire('attendant.index', ['title' => __('New Registrations'), 'filterByRole' => \App\Http\Livewire\Attendant\Index::NO_ROLES])
            <x-jet-section-border></x-jet-section-border>
            @livewire('attendant.index', ['title' => __('Students'), 'filterByRole' => 'Student'])
            <x-jet-section-border></x-jet-section-border>
            @livewire('attendant.index', ['title' => __('Jury'), 'filterByRole' => 'Jury'])
            <x-jet-section-border></x-jet-section-border>
            @livewire('attendant.index', ['title' => __('Admins'), 'filterByRole' => 'Admin'])
        </div>
    </div>
</x-app-layout>
