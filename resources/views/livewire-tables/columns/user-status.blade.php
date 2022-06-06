@php
    /** @var \App\Models\User $row */
@endphp
@if ($row->video)
    <x-badge type="info">{{ __('Video uploaded') }}</x-badge>
@elseif ($row->hasVerifiedEmail())
    <x-badge type="success">{{ __('Email verified') }}</x-badge>
@else
    <x-badge type="error">{{ __('Email not verified') }}</x-badge>
@endif
