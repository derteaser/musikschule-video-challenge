<?php

namespace App\Http\Livewire;

use Cloudinary\Api\Exception\GeneralError;
use Cloudinary\Asset\Video;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Livewire\Component;

class PublicVideos extends Component {

    public ?string $activeCloudinaryPublicId = null;

    /**
     * @throws GeneralError
     */
    public function render() {
        $searchResult = Cloudinary::search()
            ->expression('folder:home/*')
            ->sortBy('public_id')
            ->execute();

        $videos = [];
        foreach ($searchResult['resources'] as $resource) {
            $videos[] = Cloudinary::getVideo($resource['public_id']);
        }
        return view('livewire.public-videos', ['videos' => $videos]);
    }

    public function changeVideo(string $cloudinaryPublicId) {
        $this->activeCloudinaryPublicId = $cloudinaryPublicId;
        $this->emit('videoChanged', $cloudinaryPublicId);
    }
}
