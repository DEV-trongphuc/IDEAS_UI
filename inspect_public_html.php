<?php
header('Content-Type: text/plain; charset=utf-8');

echo "=== Local Production Uploads Copy ===\n";

$src_dir = '/home/vhvxoigh/ideas.edu.vn/wp-content/uploads/2025/10';
$dest_dir = '/home/vhvxoigh/ideas.edu.vn/wp-content/new_public/LANDINGPAGE_MBA/assets';

if (!is_dir($dest_dir)) {
    mkdir($dest_dir, 0755, true);
}

if (is_dir($src_dir)) {
    $files = scandir($src_dir);
    echo "Files in production uploads/2025/10:\n";
    foreach ($files as $f) {
        if ($f !== '.' && $f !== '..') {
            $src_path = "$src_dir/$f";
            $size = filesize($src_path);
            
            // Check if it's a binary file (not HTML redirect)
            $is_binary = false;
            if ($size > 0) {
                $handle = fopen($src_path, 'r');
                if ($handle) {
                    $bytes = fread($handle, 15);
                    fclose($handle);
                    if (strpos($bytes, '<!DOCTYPE') === false && strpos($bytes, '<html') === false) {
                        $is_binary = true;
                    }
                }
            }
            
            echo " - $f ($size bytes) - Binary: " . ($is_binary ? 'YES' : 'NO') . "\n";
            
            if ($is_binary) {
                $dest_path = "$dest_dir/$f";
                if (copy($src_path, $dest_path)) {
                    echo "   -> Copied to assets successfully!\n";
                } else {
                    echo "   -> Copy FAILED.\n";
                }
            }
        }
    }
} else {
    echo "Production uploads/2025/10 directory not found.\n";
}
