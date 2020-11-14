<?php
/** @var App $kirby */
/** @var Page $page */
/** @var Pages $pages */

use Kirby\Cms\App;
use Kirby\Cms\Page;
use Kirby\Cms\Pages;

?>
<?php snippet('header') ?>
<?php snippet('nav-bar') ?>
  <section class="lg:py-12 lg:flex lg:justify-center">
    <div class="bg-white lg:mx-8 lg:flex lg:max-w-5xl lg:shadow-lg lg:rounded-lg">
      <div class="lg:w-1/2">
        <div class="h-64 bg-cover lg:rounded-lg lg:h-full" style="background-image:url('https://images.unsplash.com/photo-1497493292307-31c376b6e479?ixlib=rb-1.2.1&auto=format&fit=crop&w=1351&q=80')"></div>
      </div>

      <div class="py-12 px-6 max-w-xl lg:max-w-5xl lg:w-1/2">
        <h2 class="text-2xl text-gray-800 font-bold md:text-3xl">Build Your New <span class="text-indigo-600">Idea</span></h2>
        <p class="mt-4 text-gray-600">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quidem modi reprehenderit vitae exercitationem aliquid dolores ullam temporibus enim expedita aperiam mollitia iure consectetur dicta tenetur, porro consequuntur saepe accusantium consequatur.</p>

        <div class="mt-8">
          <a href="<?= $pages->get('upload')->url() ?>" class="bg-gray-900 text-gray-100 px-5 py-3 font-semibold rounded hover:bg-gray-800">Jetzt loslegen</a>
        </div>
      </div>
    </div>
  </section>
<?php snippet('footer') ?>