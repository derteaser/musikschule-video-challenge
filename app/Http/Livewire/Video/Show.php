<?php

namespace App\Http\Livewire\Video;

use App\Models\Video;
use Livewire\Component;

class Show extends Component
{
    /** @var Video */
    public $video;

    public function render()
    {
        return view('livewire.video.show');
    }
}
