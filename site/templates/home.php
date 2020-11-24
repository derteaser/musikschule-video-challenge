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
  <script src="https://widget.cloudinary.com/v2.0/global/all.js" type="text/javascript"></script>
  <script type="text/javascript">
    function upload() {
      return {
        uploadWidget: null,
        init: function() {
          this.uploadWidget = cloudinary.createUploadWidget({
            cloudName: 'musikschule-rkn-video-contest',
            multiple: false,
            sources: ['local', 'camera', 'dropbox'],
            uploadPreset: 'video-contest',
          }, (error, result) => {
            if (result.event === "success") {
              const publicId = result.info.public_id;
              const originalFilename = result.info.original_filename;
              window.location.href = '/add/?cloudinary_public_id=' + publicId + '&original_filename=' + encodeURI(originalFilename);
            }
            console.log(error, result)
          })
        }
      }
    }
  </script>
  <section class="lg:py-12 lg:flex lg:justify-center" x-data="upload()" x-init="init()">
    <div class="bg-white lg:mx-8 lg:flex lg:max-w-5xl lg:shadow-lg lg:rounded-lg">
      <div class="lg:w-1/2">
        <div class="h-64 bg-cover lg:rounded-lg lg:h-full" style="background-image:url('https://images.unsplash.com/photo-1497493292307-31c376b6e479?ixlib=rb-1.2.1&auto=format&fit=crop&w=1351&q=80')"></div>
      </div>

      <div class="py-12 px-6 max-w-xl lg:max-w-5xl lg:w-1/2">
        <h2 class="text-2xl text-gray-800 font-bold md:text-3xl">Build Your New <span class="text-yellow-600">Idea</span></h2>
        <p class="mt-4 text-gray-600">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quidem modi reprehenderit vitae exercitationem aliquid dolores ullam temporibus enim expedita aperiam mollitia iure consectetur dicta tenetur, porro consequuntur saepe accusantium consequatur.</p>

        <div class="mt-8">
          <button @click="uploadWidget.open()" x-bind:disabled="!uploadWidget" class="bg-gray-900 text-gray-100 px-5 py-3 font-semibold rounded hover:bg-gray-800">Jetzt loslegen</button>
        </div>
      </div>
    </div>
  </section>
<?php snippet('footer') ?>