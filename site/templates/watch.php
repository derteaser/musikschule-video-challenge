<?php
/** @var App $kirby */
/** @var Page $page */

use Kirby\Cms\App;
use Kirby\Cms\Page;
use Kirby\Cms\User;

?>
<?php snippet('header') ?>
<?php snippet('nav-bar') ?>

<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6 container my-6 mx-auto">
  <?php /** @var VideoPage $videoPage */ foreach (collection('videos/all') as $videoPage): ?>
    <?php /** @var User $creator */ $creator = $videoPage->creator()->toUser(); ?>
    <div class="bg-white overflow-hidden shadow-md rounded-lg mt-6">
      <a href="<?= $videoPage->url() ?>">
        <img class="w-full h-64 object-cover" src="<?= $videoPage->images()->first()->url() ?>" alt="Video">
        <div class="p-6">
          <h1 class="block text-gray-800 font-semibold text-2xl mt-2 hover:text-gray-600 hover:underline"><?= $videoPage->title() ?></h1>
          <div class="mt-4">
            <div class="flex items-center">
              <div class="flex items-center">
                <?php if ($avatar = $creator->avatar()): ?>
                  <img src="<?= $avatar->url() ?>" class="h-10 object-cover rounded-full" alt="Avatar">
                <?php endif ?>
                <span class="mx-2 text-gray-700 font-semibold"><?= $creator->name() ?></span>
              </div>
              <span class="mx-1 text-gray-600 text-xs"><?= $videoPage->created()->toDate('d.m.Y') ?></span>
            </div>
          </div>
        </div>
      </a>
    </div>
  <?php endforeach ?>
</div>

<?php snippet('footer') ?>