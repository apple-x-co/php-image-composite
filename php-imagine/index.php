<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Imagine\Gd\Font;
use Imagine\Gd\Imagine;
use Imagine\Image\Box;
use Imagine\Image\ManipulatorInterface;
use Imagine\Image\Palette\RGB;
use Imagine\Image\Point;

$imagine = new Imagine();

$canvas = $imagine->create(new Box(1200, 630));

$bg = $imagine->open(__DIR__ . '/../assets/bg.jpg');
$canvas->paste($bg, new Point(0, 0));

$logo = $imagine->open(__DIR__ . '/../assets/logo.png');
$canvas->paste($logo, new Point(0, 0));

$canvas->draw()->text(
    '1234567890',
    new Font(
        __DIR__ . '/../assets/m-plus-1-v6-japanese_latin-regular.ttf',
        '20',
        (new RGB())->color('90ee90'),
    ),
    new Point(1000, 20),
);

$canvas->draw()->text(
    'Kouhei',
    new Font(
        __DIR__ . '/../assets/m-plus-1-v6-japanese_latin-regular.ttf',
        '30',
        (new RGB())->color('000'),
    ),
    new Point(550, 300),
);

$mask = $imagine->open(__DIR__ . '/../assets/mask.jpg');

$canvas->thumbnail(new Box(1200, 630), ManipulatorInterface::THUMBNAIL_OUTBOUND)
       ->applyMask($mask)
       ->save(__DIR__ . '/./output/composited.png');
