<?php

namespace App\Http\Livewire\Video;

use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class Own extends Component
{
    /** @var Collection */
    public $videos;

    public function render()
    {
        return view('livewire.video.own');
    }
}
