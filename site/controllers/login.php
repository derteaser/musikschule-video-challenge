<?php

use Kirby\Cms\App;

return function (App $kirby) {

    // don't show the login screen to already logged in users
    if ($kirby->user()) {
        go('/');
    }

    $error = false;

    // handle the form submission
    if ($kirby->request()->is('POST') && get('login')) {
        try {
            $kirby->auth()->login(get('email'), get('password'));
            go('/');
        } catch (Exception $e) {
            $error = true;
        }
    }

    return [
        'error' => $error
    ];

};