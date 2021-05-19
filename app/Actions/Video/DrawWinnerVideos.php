<?php

namespace App\Actions\Video;

use App\Models\Video;
use Carbon\Carbon;

class DrawWinnerVideos {

    public function draw(int $maxWinners) {
        Video::query()
            ->where('isHidden', '!=', 1)
            ->whereNull('winner')
            ->inRandomOrder()
            ->limit($maxWinners)
            ->update(['winner' => Carbon::now()]);
    }
}
