<?php

namespace App\Http\Livewire\Video;

use App\Models\Video;
use Livewire\Component;

class Edit extends Component
{
    /** @var Video */
    public $video;

    public function render()
    {
        return view('livewire.video.edit');
    }
}
