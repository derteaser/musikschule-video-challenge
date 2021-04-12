<?php

namespace App\Http\Livewire\Video;

use App\Models\Video;
use Livewire\Component;

class Player extends Component
{
    /** @var Video */
    public Video $video;

    public function render()
    {
        return view('livewire.video.player');
    }
}
