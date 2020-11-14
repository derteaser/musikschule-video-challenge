<?php
/** @var App $kirby */
/** @var Page $page */

use Kirby\Cms\App;
use Kirby\Cms\Page;
?>
<?php snippet('header') ?>
<?php snippet('nav-bar') ?>
<h1><?= $page->title() ?></h1>
<?php snippet('footer') ?>