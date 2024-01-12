<?php

use Faker\Factory as Faker;

$faker = Faker::create();



function image(
    ?string $dir = null,
    int $width = 640,
    int $height = 480,
    ?string $category = null,
    bool $fullPath = true,
    bool $randomize = true,
    ?string $word = null,
    bool $gray = false,
    string $format = 'png'

){
  
    $filename = uniqid(md5(random_bytes(16)), true) . '.' . $format;
    $image = $faker->image($dir, $width, $height, $category, $randomize, $fullPath, $word, $gray, $format);
    
    return $fullPath ? $image : $filename;
}

