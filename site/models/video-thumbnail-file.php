<?php

use Kirby\Cms\File;
use Kirby\Image\Dimensions;
use Kirby\Image\Image;
use Kirby\Toolkit\F;
use Kirby\Toolkit\Mime;

class VideoThumbnailFile extends File {

    /** @var string */
    private $thumbnailUrl;

    /** @var int */
    private $width;

    /** @var int */
    private $height;

    public function __construct(array $props) {
        $this->thumbnailUrl = $props['url'] ?? null;
        $this->width = $props['width'] ?? 0;
        $this->height = $props['height'] ?? 0;

        return parent::__construct([
            'filename' => basename($props['url']) ?? '',
            'url' => $props['url'] ?? '',
            'template' => 'video-thumbnail',
            'parent' => $props['parent'],
        ]);
    }

    public function thumb($options = null): File {
        return $this;
    }

    public function url(): string {
        return $this->thumbnailUrl;
    }

    public function type(): ?string {
        return 'image';
    }

    public function extension(): string {
        return 'jpg';
    }

    protected function panelImageSource(string $query = null) {
        return $this;
    }

    public function exists(): bool {
        return true;
    }

    public function delete(): bool {
        return true;
    }

    public function asset(): Image {
        return new class($this->root(), $this->thumbnailUrl, $this->width, $this->height) extends Image {

            public function __construct(string $root, string $url, int $width, int $height) {
                $this->dimensions = new Dimensions($width, $height);
                parent::__construct($root, $url);
            }

            public function isWritable(): bool {
                return false;
            }

            public function exists(): bool {
                return true;
            }

            public function type() {
                return 'image';
            }

            public function extension(): string {
                return 'jpg';
            }

            public function mime() {
                return Mime::type($this->root, $this->extension());
            }

        };
    }
}