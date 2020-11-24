<?php


namespace MusikschuleRkn\UserStuff;


class RandomBackgroundColor {

    const TAILWIND_CLASSES = [
        'bg-blue-500',
        'bg-gray-500',
        'bg-green-500',
        'bg-indigo-500',
        'bg-pink-500',
        'bg-purple-500',
        'bg-red-500',
        'bg-yellow-500'
    ];

    public static function generate(string $string): string {
        $key = intval(substr(md5($string), 0, 1), 16) % count(self::TAILWIND_CLASSES);
        return self::TAILWIND_CLASSES[$key];
    }
}