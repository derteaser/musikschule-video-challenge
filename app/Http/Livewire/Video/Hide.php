<?php

namespace App\Http\Livewire\Video;

use App\Actions\Video\DeleteVideo;
use App\Actions\Video\HideVideo;
use App\Models\Video;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;
use Livewire\Component;

class Hide extends Component {

    /** @var Video $video */
    public Video $video;

    /**
     * Hide the video.
     *
     * @param HideVideo $hider
     * @return void
     */
    public function hideVideo(HideVideo $hider)
    {
        $this->resetErrorBag();

        $hider->hide($this->video);
    }

    /**
     * Reveal the video.
     *
     * @param HideVideo $hider
     * @return void
     */
    public function revealVideo(HideVideo $hider)
    {
        $this->resetErrorBag();

        $hider->reveal($this->video);
    }

    /**
     * Render the component.
     *
     * @return Application|Factory|\Illuminate\Contracts\View\View|View
     */
    public function render() {
        return view('livewire.video.hide');
    }
}
