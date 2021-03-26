<?php

namespace App\Actions\Video;

use App\Models\Video;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Exception;

class DeleteVideo {
    /**
     * Delete the given video.
     *
     * @param Video $video
     * @return void
     * @throws Exception
     */
    public function delete(Video $video)
    {
        Cloudinary::destroy($video->cloudinary_public_id);
        $video->delete();
    }
}
