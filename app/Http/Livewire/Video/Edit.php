<?php

namespace App\Http\Livewire\Video;

use App\Actions\Video\UpdateVideo;
use App\Models\Video;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class Edit extends Component {

    public Video $video;

    /**
     * The component's state.
     *
     * @var array
     */
    public array $state = [];

    /**
     * Prepare the component.
     *
     * @return void
     */
    public function mount() {
        $this->state = $this->video->withoutRelations()->toArray();
    }

    public function render() {
        return view('livewire.video.edit');
    }

    /**
     * @param UpdateVideo $updater
     * @throws ValidationException
     */
    public function updateVideoInformation(UpdateVideo $updater) {
        $this->resetErrorBag();

        $updater->update(
            $this->video,
            $this->state
        );

        $this->emit('saved');
    }
}
