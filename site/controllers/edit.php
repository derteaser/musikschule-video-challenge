<?php

use Kirby\Cms\App;

return function (App $kirby) {
    if ($kirby->request()->is('POST') && get('id') && get('title') && get('text')) {
        $page = $kirby->page('watch/' . get('id'));

        $page->update([
           'title' => get('title'),
            'text' => get('text')
        ]);
    }
};