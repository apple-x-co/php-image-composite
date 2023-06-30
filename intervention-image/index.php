<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Intervention\Image\AbstractFont;
use Intervention\Image\ImageManager;

$manager = new ImageManager(['driver' => 'gd']);

$canvas = $manager->canvas(1200, 630);

$canvas->insert(__DIR__ . '/../assets/bg.jpg', 'top-left');
$canvas->insert(__DIR__ . '/../assets/logo.png', 'top-left');
$canvas->text(
    '1234567890',
    1000,
    40,
    function(AbstractFont $font) {
        $font->file(__DIR__ . '/../assets/m-plus-1-v6-japanese_latin-regular.ttf');
        $font->size(26.67); // 20pt
        $font->color('#90ee90');
//        $font->align('center');
//        $font->valign('top');
//        $font->angle(45);
    },
);
$canvas->text(
    'Kouhei',
    550,
    330,
    function(AbstractFont $font) {
        $font->file(__DIR__ . '/../assets/m-plus-1-v6-japanese_latin-regular.ttf');
        $font->size(40); // 30pt
        $font->color('#000000');
    },
);
$canvas->mask(__DIR__ . '/../assets/mask2.jpg', false);

$canvas->save(__DIR__ . '/./output/composited.png');
