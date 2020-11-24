<?php
/** @var App $kirby */

use Kirby\Cms\App;
use MusikschuleRkn\UserStuff\Initials;
use MusikschuleRkn\UserStuff\RandomBackgroundColor;

$user = $user ?? $kirby->user();
?>
<span class="h-10 w-10 overflow-hidden rounded-full border-2 border-gray-400 flex-shrink-0">
  <?php if ($avatar = $user->avatar()): ?>
    <img src="<?= $avatar->url() ?>" class="h-full w-full object-cover" alt="avatar">
  <?php else: ?>
    <span class="<?= RandomBackgroundColor::generate($user->id()) ?> text-white text-xl block w-full h-full flex items-center justify-center overflow-hidden"><?= Initials::generate($user->name()) ?></span>
  <?php endif ?>
</span>
