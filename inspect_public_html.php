<?php
header('Content-Type: text/plain; charset=utf-8');

$dir = '/home/vhvxoigh/ideas.edu.vn/wp-content/new_public/LANDINGPAGE_MBA/assets';
$results = [];

if (is_dir($dir)) {
    $files = scandir($dir);
    foreach ($files as $f) {
        if ($f !== '.' && $f !== '..') {
            $path = "$dir/$f";
            $results[] = [
                'name' => $f,
                'size' => filesize($path)
            ];
        }
    }
}

$json = json_encode($results);
$b64 = base64_encode($json);
echo chunk_split($b64, 76, "\n");
