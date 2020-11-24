<?php

use Kirby\Cms\App;
use Kirby\Toolkit\Str;

Kirby::plugin('musikschule/add-video', [
    'routes' => function (App $kirby) {
        $user = $kirby->user();
        return [
            [
                'pattern' => 'add',
                'action' => function () use ($user, $kirby) {
                    if ($user) {
                        $kirby->impersonate('kirby');

                        try {
                            $page = $kirby->page('watch');

                            $data = [
                                'title' => get('original_filename'),
                                'cloudinary_public_id' => get('cloudinary_public_id'),
                                'created' => date('Y-m-d H:i'),
                                'creator' => $user->id()
                            ];

                            $video = $page->createChild([
                                'slug'     => md5(Str::slug($data['title'] . microtime())),
                                'template' => 'video',
                                'content'  => $data
                            ]);

                            if ($video) {
                                $video->publish();
                                go('edit?id=' . $video->slug());
                            }

                        } catch (Exception $e) {
                            echo 'Upload fehlgeschlagen: ' . $e->getMessage();
                        }
                    }

                    go('login');
                }
            ]
        ];
    }
]);