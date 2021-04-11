<?php

namespace App\Actions\Video;

use App\Models\Video;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class UpdateVideoComment {

    /**
     * @param Video $video
     * @param array $input
     * @throws ValidationException
     */
    public function update(Video $video, array $input) {
        Validator::make($input, [
            'comment' => ['required', 'string', 'max:2000'],
        ])->validateWithBag('updateComment');

        $video->forceFill([
            'comment' => $input['comment'],
        ])->save();
    }
}
