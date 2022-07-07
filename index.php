<?php

require "vendor/autoload.php";

use App\CustomParser;

//Input (example)
//php index.php https://www.php.net/manual/en/pdo.drivers.php
$link = $argv[1];
$tags_attributes = [
    [
        'tag' => 'a',
        'attribute' => 'href'
    ],
    [
        'tag' => 'img',
        //As I understand, the attribute is 'src' no 'href'
        //'attribute' => 'href'
        'attribute' => 'src'
    ],
    [
        'tag' => 'script',
        'attribute' => 'src'
    ],
    [
        'tag' => 'link',
        'attribute' => 'href'
    ],
];

$cliParser = new CustomParser($tags_attributes, $link);

$cliParser->outputJson();