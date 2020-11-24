<?php
/** @var string $text */

use Kirby\Toolkit\A;

snippet('alerts/alert', A::merge(['icon' => 'information-circle', 'bgClass' => 'bg-blue-500'], compact('text')));