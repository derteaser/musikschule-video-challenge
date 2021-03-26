<?php

namespace App\Http\Livewire\Video;

use App\Models\Video;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component {
    public Collection $videos;

    public function mount() {
        $this->videos = Video::all()->sortByDesc('created_at');

        if (!Auth::user()->can('hide video')) {
            $this->videos = $this->videos->where('isHidden', false);
        }
    }

    public function render() {
        return view('livewire.video.index');
    }
}
