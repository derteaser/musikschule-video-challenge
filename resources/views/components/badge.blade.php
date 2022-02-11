@props([
    'type' => ''
])
@switch($type)
    @case('success')
        @php $classes = 'bg-green-100 text-green-800' @endphp
        @break
    @case('error')
        @php $classes = 'bg-red-100 text-red-800' @endphp
        @break
    @case('info')
        @php $classes = 'bg-indigo-100 text-indigo-800' @endphp
        @break
    @default
        @php $classes = 'bg-gray-200 text-gray-600' @endphp
        @break
@endswitch
<span {{ $attributes->merge(['class' => 'px-2 inline-flex text-xs leading-5 font-semibold rounded-full whitespace-nowrap ' . $classes]) }}>
    {{ $slot }}
</span>
