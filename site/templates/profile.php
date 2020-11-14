<?php
/** @var App $kirby */
/** @var Page $page */

use Kirby\Cms\App;
use Kirby\Cms\Page;

?>
<?php if (!$kirby->user()) go('/login') ?>
<?php snippet('header') ?>
<?php snippet('nav-bar') ?>
<div class="max-w-4xl p-6 my-12 mx-auto bg-white rounded-md shadow-md">
  <h2 class="text-lg text-gray-700 font-semibold capitalize"><?= $page->title() ?></h2>

  <form>
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-4">
      <div>
        <label class="text-gray-700" for="username">Name</label>
        <input id="username" type="text" class="w-full mt-2 px-4 py-2 block rounded bg-white text-gray-800 border border-gray-300 focus:border-blue-500 focus:outline-none focus:shadow-outline" value="<?= $kirby->user()->name() ?>">
      </div>

      <div>
        <label class="text-gray-700" for="emailAddress">E-Mail Adresse</label>
        <input id="emailAddress" type="email" class="w-full mt-2 px-4 py-2 block rounded bg-white text-gray-800 border border-gray-300 focus:border-blue-500 focus:outline-none focus:shadow-outline" value="<?= $kirby->user()->email() ?>">
      </div>

      <div>
        <label class="text-gray-700" for="password">Passwort</label>
        <input id="password" type="password" class="w-full mt-2 px-4 py-2 block rounded bg-white text-gray-800 border border-gray-300 focus:border-blue-500 focus:outline-none focus:shadow-outline">
      </div>

      <div>
        <label class="text-gray-700" for="passwordConfirmation">Passwort best&auml;tigen</label>
        <input id="passwordConfirmation" type="password" class="w-full mt-2 px-4 py-2 block rounded bg-white text-gray-800 border border-gray-300 focus:border-blue-500 focus:outline-none focus:shadow-outline">
      </div>
    </div>

    <div class="flex justify-end mt-4">
      <button class="px-4 py-2 bg-gray-800 text-gray-200 rounded hover:bg-gray-700 focus:outline-none focus:bg-gray-700">Speichern</button>
    </div>
  </form>
</div>
<?php snippet('footer') ?>