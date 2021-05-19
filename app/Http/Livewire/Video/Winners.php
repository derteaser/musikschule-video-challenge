<?php

namespace App\Http\Livewire\Video;

use App\Models\Video;
use Livewire\Component;

class Winners extends Component {

    protected $listeners = ['finishedReset' => 'render', 'finishedDraw' => 'render'];

    public function render() {
        $winners = Video::whereNotNull('winner');

        return view('livewire.video.winners', ['videos' => $winners->get()]);
    }
}
