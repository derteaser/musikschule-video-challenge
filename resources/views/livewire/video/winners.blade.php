<div>
    <x-jet-section-title>
        <x-slot name="title">{{ __('Winners') }}</x-slot>
        <x-slot name="description"></x-slot>
    </x-jet-section-title>
    @if ($videos->isEmpty())
        <div class="bg-red-600 text-white px-4 py-2 rounded-lg">
            {{ __('Sorry, no videos found') }}
        </div>
    @else
        <section class="mt-10 sm:mt-0">
            <div class="mt-2 flex flex-col">
                <div class="-my-2 sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col">
                                        <span class="sr-only">{{ __('Thumbnail') }}</span>
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        {{ __('Video') }}
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        {{ __('Name') }}
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        {{ __('Musical Instrument') }} / {{ __('Teacher') }}
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        {{ __('Created') }}
                                    </th>
                                </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($videos as /* @var App\Models\Video $video */ $video)
                                    <tr>
                                        <td>
                                            <a href="{{ route('dashboard-video', ['id' => $video->id]) }}">
                                                <img src="{{ $video->thumbnail()->toUrl() }}" alt="{{ $video->name }}" class="w-48">
                                            </a>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <a href="{{ route('dashboard-video', ['id' => $video->id]) }}" class="hover:underline">{{ $video->name }}</a>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $video->user()->name }}
                                            </div>
                                            <div class="text-sm text-gray-500">
                                                <a href="mailto:{{ $video->user()->email }}">{{ $video->user()->email }}</a>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">{{ $video->user()->musicalInstrument()->first()->name ?? '' }}</div>
                                            <div class="text-sm text-gray-500">{{ $video->user()->teacher }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-xs text-gray-500">
                                            {{ $video->created_at->format('d.m.Y') }}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
</div>
