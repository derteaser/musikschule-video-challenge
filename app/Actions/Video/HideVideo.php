<?php

namespace App\Actions\Video;

use App\Models\Video;

class HideVideo {

    /**
     * @param Video $video
     */
    public function hide(Video $video) {
        $video->forceFill([
            'isHidden' => true
        ])->save();
    }

    /**
     * @param Video $video
     */
    public function reveal(Video $video) {
        $video->forceFill([
            'isHidden' => false
        ])->save();
    }
}
