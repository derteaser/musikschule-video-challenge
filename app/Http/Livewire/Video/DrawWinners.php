<?php

namespace App\Http\Livewire\Video;


use App\Actions\Video\DrawWinnerVideos;
use Livewire\Component;

class DrawWinners extends Component {

    public int $maxWinners = 10;

    public function render() {
        return view('livewire.video.draw-winners');
    }

    public function startDraw(DrawWinnerVideos $drawer) {
        $this->resetErrorBag();

        $drawer->draw($this->maxWinners);
        $this->emit('finishedDraw');
    }
}
