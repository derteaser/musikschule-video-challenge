@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.css" integrity="sha512-5m1IeUDKtuFGvfgz32VVD0Jd/ySGX7xdLxhqemTmThxHdgqlgPdupWoSN8ThtUSLpAGBvA8DY2oO7jJCrGdxoA==" crossorigin="anonymous" />
    <style>
        .trix-button--icon-link,
        .trix-button--icon-heading-1,
        .trix-button--icon-quote,
        .trix-button--icon-code,
        .trix-button-group--file-tools {
            display: none !important;
        }
    </style>
@endpush

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.js" integrity="sha512-2RLMQRNr+D47nbLnsbEqtEmgKy67OSCpWJjJM394czt99xj3jJJJBQ43K7lJpfYAYtvekeyzqfZTx2mqoDh7vg==" crossorigin="anonymous"></script>
@endpush

<div id="{{ $attributes->get('id') }}" class="{{ $attributes->get('class') }}" wire:ignore>
        <trix-editor
            class="prose border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md shadow-sm"
            x-data
            x-on:trix-change="$dispatch('input', event.target.value)"
            wire:model.debounce.500ms="{{ $attributes->thatStartWith('wire:model')->first() }}"
            wire:key="trix-{{ $attributes->get('id') }}"
        ></trix-editor>
</div>
