<?php

namespace App\Http\Livewire\Video;

use App\Models\Video;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Create extends Component {

    public function createVideo(string $publicId, string $originalFilename) {
        Video::create(['name' => $originalFilename, 'cloudinary_public_id' => $publicId, 'description' => '', 'user_id' => Auth::user()->id]);

        $this->redirect('/dashboard/my-video');
    }

    public function render() {
        return view('livewire.video.create');
    }
}
