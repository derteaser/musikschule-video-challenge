<a {{ $attributes->merge(['title' => $title, 'class' => 'inline-block rounded-full p-2 hover:bg-gray-200 group']) }}>
    {{ $slot }}
    <span class="sr-only">{{ $title }}</span>
</a>
