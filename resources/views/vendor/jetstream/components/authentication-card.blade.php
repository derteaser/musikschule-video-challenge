<div class="min-h-screen flex items-center bg-gray-200">
    <div class="flex flex-1 max-w-sm mx-auto bg-white rounded-lg shadow-lg overflow-hidden lg:max-w-4xl">
        <div class="hidden lg:block lg:w-1/2 bg-cover" style="background-image:url('https://images.unsplash.com/photo-1431069931897-aa1c99a2d2fc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=333&q=80')"></div>

        <div class="w-full py-8 px-6 md:px-8 lg:w-1/2">
            <div class="mb-4">{{ $logo }}</div>
            {{ $slot }}
        </div>
    </div>
</div>
