<?php

namespace App\Http\Livewire\Video;

use App\Actions\Video\UpdateVideoComment;
use App\Models\Video;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Livewire\Component;

class Comment extends Component {

    public Video $video;

    /**
     * @var string
     */
    public string $comment;

    /**
     * Prepare the component.
     *
     * @return void
     */
    public function mount() {
        $this->comment = $this->video->comment ?? '';
    }

    /**
     * Render the component.
     *
     * @return Application|Factory|\Illuminate\Contracts\View\View|View
     */
    public function render() {
        return view('livewire.video.comment');
    }

    /**
     * @param UpdateVideoComment $updater
     * @throws ValidationException
     */
    public function updateComment(UpdateVideoComment $updater) {
        $this->resetErrorBag();

        $updater->update(
            $this->video,
            ['comment' => $this->comment]
        );

        $this->emit('commentUpdated');
    }
}
