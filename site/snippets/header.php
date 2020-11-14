<?php

use Kirby\Cms\App;
use Kirby\Cms\Page;
use Kirby\Cms\Site;

/** @var Page $page */
/** @var Site $site */
/** @var App $kirby */
?>
  <!DOCTYPE html>
  <html lang="de_DE">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#3b5883">
    <title><?= $site->title() ?> | <?= $page->title() ?></title>
    <link rel="icon" href="<?= url('/favicon.svg') ?>">
    <link rel="mask-icon" href="<?= url('/mask-icon.svg') ?>" color="#3b5883">
    <link rel="apple-touch-icon" href="<?= url('/apple-touch-icon.png') ?>">
    <link rel="manifest" href="<?= url('/manifest.json') ?>">
    <?= css('/assets/musikschule-rkn-tailwind/dist/app.css') ?>
  </head>
<body class="bg-gray-200<?= $kirby->option('debug') ? ' debug-screens' : ''?>">

