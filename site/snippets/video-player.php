<?php
/** @var Site $site */
/** @var string $videoId */

use Kirby\Cms\Site;
use Kirby\Http\Url;

$playerSrc = Url::toObject('https://player.cloudinary.com/embed/');
$playerSrc->setQuery([
  'cloud_name' => $site->cloudinary_cloud_name()->value(),
  'public_id' => $videoId,
  'controls' => 'true'
]);
?>
<div class="embed-responsive aspect-ratio-16/9 bg-gray-900">
  <iframe
    src="<?= $playerSrc->toString() ?>"
    class="embed-responsive-item"
    allow="fullscreen; encrypted-media"
  ></iframe>
</div>

