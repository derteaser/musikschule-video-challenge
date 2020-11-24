<?php
/** @var string $text */
/** @var string $icon */
/** @var string $bgClass */
?>
<div class="w-full <?= $bgClass ?> text-white" x-data="{ showAlert: true }" x-show="showAlert"
     x-transition:leave="transition ease-in-out duration-500"
     x-transition:leave-start="transform scale-y-100"
     x-transition:leave-end="transform origin-top scale-y-0">
  <div class="flex justify-between items-center container mx-auto py-4 px-6">
    <div class="flex items-center">
      <?php snippet('icon', ['name' => $icon, 'cssClasses' => 'h-6 w-6 fill-current']) ?>
      <p class="mx-3"><?= $text ?></p>
    </div>

    <button class="rounded-md p-1 hover:bg-opacity-25 hover:bg-gray-600 focus:outline-none" @click="showAlert = false">
      <?php snippet('icon', ['name' => 'x', 'cssClasses' => 'h-5 w-5 fill-current']) ?>
    </button>
  </div>
</div>