<?php

namespace App\Http\Livewire\Video;

use App\Actions\Video\ResetWinnerVideos;
use Livewire\Component;

class ResetWinners extends Component {

    public bool $confirmingReset = false;

    public function render() {
        return view('livewire.video.reset-winners');
    }

    public function confirmReset()
    {
        $this->resetErrorBag();

        $this->dispatchBrowserEvent('confirming-reset');

        $this->confirmingReset = true;
    }

    public function resetWinners(ResetWinnerVideos $resetter) {
        $this->resetErrorBag();

        $resetter->reset();
        $this->emit('finishedReset');
        $this->confirmingReset = false;
    }
}
