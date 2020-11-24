<?php

use Kirby\Cms\App;

return function(App $kirby) {
    if (!$user = $kirby->user()) {
        return null;
    }

    return collection('videos/all')->filter(function (VideoPage $child) use ($user) {
        return $child->creator()->toUser() === $user;
    });
};