<?php

namespace App\Http\Livewire\Video;

use App\Models\Video;
use Livewire\Component;

class Show extends Component {
    /** @var Video */
    public Video $video;

    protected $listeners = ['videoUpdated' => 'render'];

    public function render() {
        return view('livewire.video.show');
    }
}
