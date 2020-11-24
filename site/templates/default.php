<?php
/** @var App $kirby */
/** @var Page $page */

use Kirby\Cms\App;
use Kirby\Cms\Page;
?>
<?php snippet('header') ?>
<?php snippet('nav-bar') ?>

<div class="container mx-auto bg-white my-1 px-6 py-12 prose max-w-screen-2xl">
  <h1><?= $page->title() ?></h1>
  <?= $page->text()->kt() ?>
</div>
<?php snippet('footer') ?>