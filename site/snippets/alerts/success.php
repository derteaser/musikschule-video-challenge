<?php
/** @var string $text */

use Kirby\Toolkit\A;

snippet('alerts/alert', A::merge(['icon' => 'check-circle', 'bgClass' => 'bg-green-500'], compact('text')));