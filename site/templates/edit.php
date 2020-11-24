<?php
/** @var Page $page */
/** @var App $kirby */

use Kirby\Cms\App;
use Kirby\Cms\Page;

/** @var string|null $videoId */
$videoId = null;
/** @var VideoPage|null $editVideo */
$editVideo = null;

if (get('id')) {
  $videoId = get('id');
  $editVideo = page('watch/' . $videoId);
}

$user = $kirby->user();
$myVideos = collection('videos/my');
?>

<?php snippet('header') ?>
<?php snippet('nav-bar') ?>

<?php if ($videoId && $editVideo && $myVideos->has($editVideo)): ?>
  <div class="max-w-4xl p-6 my-12 mx-auto bg-white rounded-md shadow-md">
    <h2 class="text-lg text-gray-700 font-semibold capitalize"><?= $page->title() ?></h2>

    <form action="<?= $page->url() ?>?id=<?= $editVideo->slug() ?>" method="post">
      <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-4">
        <div class="row-span-2">
          <?php snippet('video-player', ['videoId' => $editVideo->cloudinary_public_id()->value()]) ?>
        </div>
        <div>
          <label class="text-gray-700" for="title">Titel</label>
          <input id="title" type="text" class="w-full mt-2 px-4 py-2 block rounded bg-white text-gray-800 border border-gray-300 focus:border-blue-500 focus:outline-none focus:shadow-outline" value="<?= $editVideo->title() ?>" required>
        </div>

        <div>
          <label class="text-gray-700" for="text">Beschreibung</label>
          <textarea id="text" type="email" class="w-full mt-2 px-4 py-2 block rounded bg-white text-gray-800 border border-gray-300 focus:border-blue-500 focus:outline-none focus:shadow-outline" rows="10" required><?= trim($editVideo->text()) ?></textarea>
        </div>
      </div>

      <div class="flex justify-end mt-4">
        <button type="submit" class="btn btn-submit">Speichern</button>
      </div>
    </form>
  </div>
<?php else: ?>
  <?php if ($myVideos->isEmpty()): ?>
    <?php snippet('alerts/info', ['text' => 'Leider hast Du noch keine Videos hochgeladen']) ?>
      <div class="h-96 flex flex-col justify-center items-center mx-6 my-12">
        <div class="border border-gray-300 shadow-md rounded-lg p-4 container max-w-screen-lg">
          <div class="flex space-x-4">
            <div class="rounded-full bg-gray-300 h-12 w-12"></div>
            <div class="flex-1 space-y-4 py-1">
              <div class="h-4 bg-gray-300 rounded w-3/4"></div>
              <div class="space-y-2">
                <div class="h-4 bg-gray-300 rounded"></div>
                <div class="h-4 bg-gray-300 rounded w-5/6"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
  <?php else: ?>
    <div class="grid grid-cols-1 gap-6 container mx-auto my-12">
      <?php /** @var VideoPage $videoPage */ foreach ($myVideos as $videoPage): ?>
        <div class="bg-white overflow-hidden shadow-md rounded-lg">
          <a href="<?= $page->url() ?>?id=<?= $videoPage->slug() ?>">
            <div class="flex flex-row items-center">
              <img class="w-64 h-32 object-cover" src="<?= $videoPage->images()->first()->url() ?>" alt="Video">
              <div class="p-6">
                <h1 class="block text-gray-800 font-semibold text-2xl mt-2 hover:text-gray-600 hover:underline"><?= $videoPage->title() ?></h1>
                <div class="mt-4">
                  <div class="flex items-center">
                    <span class="mx-1 text-gray-600 text-xs"><?= $videoPage->created()->toDate('d.m.Y') ?></span>
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div>
      <?php endforeach ?>
    </div>
  <?php endif ?>
<?php endif ?>

<?php snippet('footer') ?>
