<?php

use Cloudinary\Asset\Video;
use Cloudinary\Cloudinary;
use Cloudinary\Configuration\Configuration;
use Cloudinary\Transformation\Format;
use Cloudinary\Transformation\Resize;
use Kirby\Cms\Field;
use Kirby\Cms\File;
use Kirby\Cms\Files;
use Kirby\Cms\Page;

/**
 * @method Field cloudinary_public_id()
 * @method Field creator()
 * @method Field created()
 * @method Field text()
 */
class VideoPage extends Page {

    /** @var int  */
    const THUMBNAIL_WIDTH = 1600;
    /** @var int  */
    const THUMBNAIL_HEIGHT = 900;

    public function files(): Files {
        $video = $this->cloudinaryVideo();

        $thumbnailUrl = $video->format(Format::jpg())->resize(new Resize('thumb', self::THUMBNAIL_WIDTH, self::THUMBNAIL_HEIGHT))->toUrl();
        $videoThumbnail = new VideoThumbnailFile(['url' => $thumbnailUrl, 'width' => self::THUMBNAIL_WIDTH, 'height' => self::THUMBNAIL_HEIGHT, 'parent' => $this]);

        return new Files([$videoThumbnail], $this);
    }

    public function file(string $filename = null, string $in = 'files'): ?File {
        return $this->files()->first();
    }

    public function delete(bool $force = false): bool {
        // TODO make this stuff work
        $cld = $this->cloudinary();

        if (parent::delete($force)) {
            $cld->uploadApi()->destroy($this->cloudinary_public_id()->toString(), [
                'resource_type' => 'video',
                'invalidate' => true
            ]);

            return true;
        }

        return false;
    }

    /**
     * Returns a Cloudinary API object
     *
     * @return Cloudinary
     */
    private function cloudinary(): Cloudinary {
        $site = $this->site();
        $configuration = Configuration::instance([
            'cloud' => [
                'cloud_name' => $site->cloudinary_cloud_name()->toString(),
                'api_key' => $site->cloudinary_key()->toString(),
                'api_secret' => $site->cloudinary_secret()->toString(),
            ],
            'url' => [
                'secure' => true
            ]
        ]);
        return new Cloudinary($configuration);
    }

    /**
     * Returns the linked video on Cloudinary
     *
     * @return Video
     */
    public function cloudinaryVideo(): Video {
        $cld = $this->cloudinary();
        return $cld->video($this->cloudinary_public_id()->toString());
    }
}