<?php
header('Content-Type: text/plain; charset=utf-8');

$path = '/home/vhvxoigh/public_html';

if (!file_exists($path)) {
    echo "Directory $path does not exist.\n";
    exit;
}

echo "Contents of $path:\n";
$files = scandir($path);
foreach ($files as $file) {
    if ($file === '.' || $file === '..') continue;
    $filePath = $path . '/' . $file;
    $isDir = is_dir($filePath) ? '[DIR]' : '[FILE]';
    $size = is_dir($filePath) ? '' : filesize($filePath) . ' bytes';
    $mtime = date('Y-m-d H:i:s', filemtime($filePath));
    echo "  $isDir $file - $size (Modified: $mtime)\n";
}

$htaccessPath = $path . '/.htaccess';
if (file_exists($htaccessPath)) {
    echo "\n\nContents of .htaccess:\n";
    echo "====================================\n";
    echo file_get_contents($htaccessPath);
    echo "\n====================================\n";
} else {
    echo "\nNo .htaccess found in $path\n";
}

$indexPath = $path . '/index.php';
if (file_exists($indexPath)) {
    echo "\n\nContents of index.php:\n";
    echo "====================================\n";
    echo file_get_contents($indexPath);
    echo "\n====================================\n";
}

$indexHtmlPath = $path . '/index.html';
if (file_exists($indexHtmlPath)) {
    echo "\n\nFirst 500 chars of index.html:\n";
    echo "====================================\n";
    echo substr(file_get_contents($indexHtmlPath), 0, 500) . "...\n";
    echo "\n====================================\n";
}
