<?php
/** @var Page $page */
/** @var bool $error */

use Kirby\Cms\Page;

$logo = asset('/assets/musikschule-rkn-tailwind/dist/img/musikschule-rkn-logo.png')->resize(256);
?>
<?php snippet('header') ?>

<?php if ($error): ?>
  <div class="alert"><?= $page->alert()->html() ?></div>
<?php endif ?>
  <div class="min-h-screen flex items-center">
    <div class="flex flex-1 max-w-sm mx-auto bg-white rounded-lg shadow-lg overflow-hidden lg:max-w-4xl">
      <div class="hidden lg:block lg:w-1/2 bg-cover" style="background-image:url('https://images.unsplash.com/photo-1431069931897-aa1c99a2d2fc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=333&q=80')"></div>

      <form method="post" action="<?= $page->url() ?>" class="w-full py-8 px-6 md:px-8 lg:w-1/2">
        <img src="<?= $logo->url() ?>" alt="Musikschule Rhein-Kreis Neuss" width="<?= $logo->width() ?>" height="<?= $logo->height() ?>" class="mx-auto mb-4">
        <p class="text-xl text-gray-600 text-center">Willkommen beim Video Contest!</p>

        <div class="mt-4">
          <label class="block text-gray-600 text-sm font-medium mb-2" for="loginEmailAddress"><?= $page->username()->html() ?></label>
          <input id="loginEmailAddress" class="bg-white text-gray-700 border border-gray-300 rounded py-2 px-4 block w-full focus:border-blue-500 focus:outline-none focus:shadow-outline" type="email" name="email" value="<?= esc(get('email')) ?>" required>
        </div>

        <div class="mt-4">
          <div class="flex justify-between">
            <label class="block text-gray-600 text-sm font-medium mb-2" for="loginPassword"><?= $page->password()->html() ?></label>
            <a href="#" class="text-xs text-gray-500 hover:underline">Forget Password?</a>
          </div>

          <input id="loginPassword" class="bg-white text-gray-700 border border-gray-300 rounded py-2 px-4 block w-full focus:border-blue-500 focus:outline-none focus:shadow-outline" type="password" name="password" value="<?= esc(get('password')) ?>" required>
        </div>

        <div class="mt-8">
          <input type="submit" name="login" class="bg-gray-700 text-white font-bold py-2 px-4 w-full rounded hover:bg-gray-600 focus:outline-none focus:bg-gray-600" value="<?= $page->button()->html() ?>">
        </div>

        <div class="mt-4 flex items-center justify-between">
          <span class="border-b w-1/5 md:w-1/4"></span>

          <a href="#" class="text-xs text-gray-500 uppercase hover:underline">or sign up</a>

          <span class="border-b w-1/5 md:w-1/4"></span>
        </div>
      </form>
    </div>
  </div>

<?php snippet('footer') ?>