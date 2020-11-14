<?php

use Kirby\Cms\App;
use Kirby\Cms\Pages;
use Kirby\Cms\Site;

return function(App $kirby, Site $site) {
    if (!$kirby->user()) {
        return new Pages();
    }
    return $site->children()->listed()->filter(function($child) use ($kirby) {
        $permissions = $child->viewPermissions()->split();
        return count($permissions) === 0 || in_array($kirby->user()->role(), $permissions);
    });
};