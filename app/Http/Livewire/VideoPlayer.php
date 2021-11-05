<?php

namespace App\Http\Livewire;

use Livewire\Component;

class VideoPlayer extends Component {

    public ?string $cloudinaryPublicId;

    protected $listeners = ['videoChanged'];

    public function render() {
        return view('livewire.video-player');
    }

    public function videoChanged($cloudinaryPublicId) {
        $this->cloudinaryPublicId = $cloudinaryPublicId;
    }
}
