<?php

namespace App\Actions\Video;

use App\Models\Video;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

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
