@php
    /** @var \App\Models\Video $video */
@endphp
<div class="embed-responsive aspect-ratio-16/9 bg-gray-900">
    <iframe
        src="https://player.cloudinary.com/embed/?cloud_name={{ Str::after(config('cloudinary.cloud_url'),'@') }}&public_id={{ $video->video()->getPublicId() }}&controls=true"
        class="embed-responsive-item"
        allow="fullscreen; encrypted-media"
    ></iframe>
</div>
