<?php
/** @var string $text */

use Kirby\Toolkit\A;

snippet('alerts/alert', A::merge(['icon' => 'question-mark-circle', 'bgClass' => 'bg-red-500'], compact('text')));