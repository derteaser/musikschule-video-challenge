<?php
/** @var string $text */

use Kirby\Toolkit\A;

snippet('alerts/alert', A::merge(['icon' => 'exclamation-circle', 'bgClass' => 'bg-yellow-500'], compact('text')));