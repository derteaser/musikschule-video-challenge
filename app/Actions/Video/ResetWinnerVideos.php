<?php

namespace App\Actions\Video;

use App\Models\Video;

class ResetWinnerVideos {

    public function reset() {
        Video::query()->whereNotNull('winner')->update(['winner' => null]);
    }
}
