<?php

use Kirby\Cms\App;

load([
    'musikschulerkn\\userstuff\\initials' => 'lib/Initials.php',
    'musikschulerkn\\userstuff\\randombackgroundcolor' => 'lib/RandomBackgroundColor.php'
], __DIR__);

Kirby::plugin('musikschule-rkn/user-stuff', [
    'routes' => function (App $kirby) {
        $user = $kirby->user();
        return [
            [
                'pattern' => 'logout',
                'action' => function () use ($user) {
                    if ($user) {
                        $user->logout();
                    }

                    go('login');
                }
            ],
            [
                'pattern' => ['/', '(:any)'],
                'action' => function () use ($kirby, $user) {
                    $path = Url::path(Url::current());

                    if (!$user && $path != 'login')
                        go('/login');

                    $page = $path ? page($path) : page();
                    $permissions = $page->viewPermissions()->split();
                    if (count($permissions) > 0 && !in_array($user->role(), $permissions))
                        go('/');

                    $this->next();
                }
            ]
        ];
    },
    'snippets' => [
        'avatar' => __DIR__ . '/snippets/avatar.php'
    ]
]);