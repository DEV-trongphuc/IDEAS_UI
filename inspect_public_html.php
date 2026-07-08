<?php
header('Content-Type: text/plain; charset=utf-8');

echo "=== Staging Uploads Recursive Search ===\n";

$dir = '/home/vhvxoigh/workshop.chiefaiofficer.vn/wp-content/uploads';
if (is_dir($dir)) {
    $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir));
    $count = 0;
    foreach ($files as $file) {
        if ($file->isFile()) {
            $name = $file->getFilename();
            if (stripos($name, 'degree') !== false || stripos($name, 'erasmus') !== false) {
                $count++;
                echo " - " . str_replace('/home/vhvxoigh/workshop.chiefaiofficer.vn/', '', $file->getPathname()) . " (" . $file->getSize() . " bytes)\n";
            }
        }
    }
    echo "Total files found: $count\n";
} else {
    echo "Staging uploads directory not found.\n";
}
