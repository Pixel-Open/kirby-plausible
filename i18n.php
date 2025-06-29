<?php

declare(strict_types=1);

use Kirby\Filesystem\Dir;
use Kirby\Filesystem\F;

$translations = [];
$root = __DIR__ . '/i18n';

if (!is_dir($root)) {
    return [];
}

foreach (Dir::files($root) as $file) {
    if (!str_ends_with($file, '.json')) {
        continue;
    }
    
    $locale = basename($file, '.json');
    $filePath = $root . '/' . $file;
    
    $content = F::read($filePath);
    if ($content === false) {
        continue;
    }
    
    $decoded = json_decode($content, true);
    if (json_last_error() !== JSON_ERROR_NONE || !is_array($decoded)) {
        continue;
    }
    
    $translations[$locale] = $decoded;
}

return $translations;
