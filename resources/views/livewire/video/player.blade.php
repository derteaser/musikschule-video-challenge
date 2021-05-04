@php
    echo cloudinary()->getVideoTag($video->cloudinary_public_id)->setAttributes(['controls', 'preload'])->fallback('Your browser does not support HTML5 video tags.')->scale(1600, 900);
@endphp
