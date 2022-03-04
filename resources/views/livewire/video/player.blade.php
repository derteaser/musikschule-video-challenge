@php
    /** @var \App\Models\Video $video */
@endphp
<div class="aspect-w-16 aspect-h-9 bg-gray-900">
    <iframe
        src="https://player.cloudinary.com/embed/?cloud_name={{ $video->video()->cloud->cloudName }}&public_id={{ $video->video()->getPublicId() }}&controls=true"
        allow="fullscreen; encrypted-media"
    ></iframe>
</div>
