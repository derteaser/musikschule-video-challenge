<?php

namespace App\Actions\Video;

use App\Models\Video;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class UpdateVideo {

    /**
     * @param Video $video
     * @param array $input
     * @throws ValidationException
     */
    public function update(Video $video, array $input) {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:2000'],
        ])->validateWithBag('updateVideoInformation');

        $video->forceFill([
            'name' => $input['name'],
            'description' => $input['description'],
        ])->save();
    }
}
