<div>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-3 max-w-screen-xl mx-auto" id="publicVideos">
        @foreach($videos as $video)
            @php
            /** @var \Cloudinary\Asset\Video $video */
            @endphp
            <div>
                <a href="https://player.cloudinary.com/embed/?cloud_name={{ $video->cloud->cloudName }}&public_id={{ $video->getPublicId() }}&controls=true" class="block relative group">
                    <div class="absolute top-1/2 left-1/2 -ml-8 -mt-8 z-20 bg-gray-50 bg-opacity-50 rounded-full group-hover:bg-opacity-100 group-hover:text-blue-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <img class="w-full h-full object-cover" src="{{ $video->format(\Cloudinary\Transformation\Format::jpg())->resize(new Cloudinary\Transformation\Resize('thumb', 800, 450))->toUrl() }}" alt="Video">
                </a>
            </div>
        @endforeach
    </div>
</div>
