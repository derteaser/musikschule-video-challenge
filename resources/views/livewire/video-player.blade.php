<div wire:keydown.escape="$set('cloudinaryPublicId', null)">
    @isset($cloudinaryPublicId)
        <div class="fixed top-0 left-0 h-full w-screen bg-black bg-opacity-95 z-40">
            <div class="p-6 max-w-screen-xl mx-auto">
                <div class="embed-responsive aspect-ratio-16/9 shadow-lg">
                    <iframe
                        src="https://player.cloudinary.com/embed/?cloud_name={{ Str::after(config('cloudinary.cloud_url'),'@') }}&public_id={{ $cloudinaryPublicId }}&controls=true"
                        class="embed-responsive-item"
                        allow="fullscreen; encrypted-media; autoplay;"
                    ></iframe>
                </div>
            </div>
        </div>
    @endisset
</div>
