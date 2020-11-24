<?php
/** @var App $kirby */
/** @var VideoPage $page */

use Kirby\Cms\App;
use Kirby\Cms\User;

/** @var User $creator */
$creator = $page->creator()->toUser();
?>
<?php snippet('header') ?>
<?php snippet('nav-bar') ?>
  <div class="container mx-auto bg-white overflow-hidden shadow-md rounded-lg my-12">
    <?php snippet('video-player', ['videoId' => $page->cloudinary_public_id()->toString()]) ?>
    <div class="p-6">
      <div>
        <h1 class="block text-gray-800 font-semibold text-2xl mt-2 hover:text-gray-600 hover:underline"><?= $page->title() ?></h1>
        <div class="text-gray-600 mt-2"><?= $page->text()->markdown() ?></div>
      </div>

      <div class="mt-4">
        <div class="flex items-center">
          <div class="flex items-center">
            <?php if ($avatar = $creator->avatar()): ?>
              <img src="<?= $avatar->url() ?>" class="h-10 object-cover rounded-full" alt="Avatar">
            <?php endif ?>
            <a href="#" class="mx-2 text-gray-700 font-semibold"><?= $creator->name() ?></a>
          </div>
          <span class="mx-1 text-gray-600 text-xs"><?= $page->created()->toDate('d.m.Y') ?></span>
        </div>
      </div>
    </div>
  </div>
<?php snippet('footer') ?>