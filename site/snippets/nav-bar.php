<?php
/** @var App $kirby */
/** @var Page $page */
/** @var Site $site */

use Kirby\Cms\App;
use Kirby\Cms\Page;
use Kirby\Cms\Site;

$logo = asset('/assets/musikschule-rkn-tailwind/dist/img/musikschule-rkn-logo.png')->resize(256);
?>
<nav class="bg-white shadow" x-data="{ open: false }">
  <div class="container mx-auto px-6 py-3">
    <div class="md:flex md:items-center md:justify-between">
      <div class="flex justify-between items-center">
        <div class="text-xl font-semibold text-gray-700">
          <a href="/" class="text-gray-800 text-xl font-bold hover:text-gray-700 md:text-2xl"><img src="<?= $logo->url() ?>" alt="Musikschule Rhein-Kreis Neuss" width="<?= $logo->width() ?>" height="<?= $logo->height() ?>" class="w-64"></a>
        </div>

        <!-- Mobile menu button -->
        <div class="flex md:hidden">
          <button type="button" @click="open = true" class="text-gray-500 hover:text-gray-600 focus:outline-none focus:text-gray-600" aria-label="toggle menu">
            <span :class="{ 'hidden': open }"><?php snippet('icon', ['name' => 'menu', 'cssClasses' => 'h-6 w-6 fill-current']) ?></span>
            <span :class="{ 'hidden': !open }"><?php snippet('icon', ['name' => 'x', 'cssClasses' => 'h-6 w-6 fill-current']) ?></span>
          </button>
        </div>
      </div>

      <!-- Mobile Menu open: "block", Menu closed: "hidden" -->
      <div class="hidden md:flex md:items-center md:justify-between flex-1" :class="{ 'hidden': !open, 'block': open }" @click.away="open = false">
        <div class="flex flex-col -mx-4 md:flex-row md:items-center md:mx-8">
          <?php /** @var Page $item */ foreach ($kirby->collection('accessible-pages') as $item): ?>
            <a href="<?= $item->url() ?>" class="mx-2 mt-2 md:mt-0 px-2 py-1 text-sm text-gray-700 font-medium rounded-md hover:bg-gray-300<?= $item === $page ? ' bg-gray-200' : '' ?>"><?= $item->title() ?></a>
          <?php endforeach ?>
        </div>

        <div class="flex items-center mt-4 md:mt-0">
          <?php if ($kirby->user()): ?>
            <a href="/logout" class="mx-4 hidden md:block text-gray-600 hover:text-gray-700 focus:text-gray-700" aria-label="logout">
              <?php snippet('icon', ['name' => 'logout', 'cssClasses' => 'h-6 w-6 fill-current']) ?>
            </a>
          <?php endif ?>

          <?php if ($kirby->user()): ?>
            <a href="<?= page('profile')->url() ?>" class="flex items-center focus:outline-none">
              <span class="h-8 w-8 overflow-hidden rounded-full border-2 border-gray-400 flex-shrink-0">
                <?php if ($avatar = $kirby->user()->avatar()): ?>
                  <img src="<?= $avatar->url() ?>" class="h-full w-full object-cover" alt="avatar">
                <?php endif ?>
              </span>
              <span class="mx-2 text-sm text-gray-700 font-medium"><?= $kirby->user()->name() ?? $kirby->user()->email() ?></span>
            </a>
          <?php endif ?>
        </div>
      </div>
    </div>
  </div>
</nav>