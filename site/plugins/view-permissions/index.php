<?php

use Kirby\Cms\App;
use Kirby\Http\Url;

Kirby::plugin('musikschule/view-permissions', [
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
    }
]);