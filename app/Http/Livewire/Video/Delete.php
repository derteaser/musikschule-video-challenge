<?php

namespace App\Http\Livewire\Video;

use App\Actions\Video\DeleteVideo;
use App\Models\Video;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;
use Livewire\Component;

class Delete extends Component {

    /** @var Video $video */
    public $video;

    /**
     * Indicates if video deletion is being confirmed.
     *
     * @var bool
     */
    public $confirmingVideoDeletion = false;

    /**
     * Confirm that the user would like to delete the video.
     *
     * @return void
     */
    public function confirmVideoDeletion()
    {
        $this->resetErrorBag();

        $this->dispatchBrowserEvent('confirming-delete-video');

        $this->confirmingVideoDeletion = true;
    }

    /**
     * Delete the video.
     *
     * @param DeleteVideo $deleter
     * @return void
     * @throws Exception
     */
    public function deleteVideo(DeleteVideo $deleter)
    {
        $this->resetErrorBag();

        $deleter->delete($this->video);

        redirect('/dashboard/my-video');
    }

    /**
     * Render the component.
     *
     * @return Application|Factory|\Illuminate\Contracts\View\View|View
     */
    public function render() {
        return view('livewire.video.delete');
    }
}
