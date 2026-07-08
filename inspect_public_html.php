<?php
header('Content-Type: text/plain; charset=utf-8');

echo "=== Silent Local Server Copy ===\n";

$potential_sources = [
    '/home/vhvxoigh/workshop.chiefaiofficer.vn/wp-content/uploads/2025/10',
    '/home/vhvxoigh/chiefaiofficer.vn/wp-content/uploads/2025/10',
    '/home/vhvxoigh/public_html/wp-content/uploads/2025/10',
    '/home/vhvxoigh/public_html/workshop/wp-content/uploads/2025/10',
    '/home/vhvxoigh/ideas/wp-content/uploads/2025/10',
    '/home/vhvxoigh/ideas.edu.vn/wp-content/uploads/2025/10'
];

$images = [
    "DUAL-DEGREE-1.webp",
    "DUAL-DEGREE-2.webp",
    "DUAL-DEGREE-3.webp",
    "DUAL-DEGREE4.webp",
    "DUAL-DEGREE.webp",
    "Erasmus_Logo.svg.webp",
    "Estiam-DBA-2.webp"
];

$dest_dir = '/home/vhvxoigh/ideas.edu.vn/wp-content/uploads/2025/10';
if (!is_dir($dest_dir)) {
    mkdir($dest_dir, 0755, true);
}

// Find a valid source containing DUAL-DEGREE-1.webp
$valid_src = null;
foreach ($potential_sources as $src) {
    if (is_dir($src)) {
        // Check if DUAL-DEGREE-1.webp exists in this directory and is NOT the HTML login page
        // HTML login page starts with '<!DOCTYPE html>'
        $test_file = "$src/DUAL-DEGREE-1.webp";
        if (file_exists($test_file)) {
            $handle = fopen($test_file, 'r');
            if ($handle) {
                $bytes = fread($handle, 15);
                fclose($handle);
                if (strpos($bytes, '<!DOCTYPE') === false) {
                    echo "Found valid source directory: $src\n";
                    $valid_src = $src;
                    break;
                }
            }
        }
    }
}

if ($valid_src) {
    foreach ($images as $img) {
        $src_file = "$valid_src/$img";
        $dest_file = "$dest_dir/$img";
        if (file_exists($src_file)) {
            if (copy($src_file, $dest_file)) {
                echo "Copied $img: SUCCESS (" . filesize($dest_file) . " bytes)\n";
            } else {
                echo "Copied $img: FAILED\n";
            }
        } else {
            // Check lowercase
            $src_file_lc = "$valid_src/" . strtolower($img);
            if (file_exists($src_file_lc)) {
                if (copy($src_file_lc, $dest_file)) {
                    echo "Copied $img (lowercase source): SUCCESS (" . filesize($dest_file) . " bytes)\n";
                } else {
                    echo "Copied $img (lowercase source): FAILED\n";
                }
            } else {
                echo "Source $img not found in $valid_src\n";
            }
        }
    }
} else {
    echo "Could not find any source directory containing the original binary files.\n";
    
    // Let's search recursively in all directories under /home/vhvxoigh/ for any valid DUAL-DEGREE-1.webp
    // (excluding ideas.edu.vn to not match the one we uploaded)
    echo "Searching server for a valid binary DUAL-DEGREE-1.webp...\n";
    $search_dirs = [
        '/home/vhvxoigh/workshop.chiefaiofficer.vn',
        '/home/vhvxoigh/chiefaiofficer.vn',
        '/home/vhvxoigh/public_html',
        '/home/vhvxoigh/ideas'
    ];
    
    $found_path = null;
    foreach ($search_dirs as $sdir) {
        if (is_dir($sdir)) {
            $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($sdir));
            foreach ($iterator as $file) {
                if ($file->isFile() && $file->getFilename() === 'DUAL-DEGREE-1.webp') {
                    $p = $file->getPathname();
                    if (strpos($p, 'ideas.edu.vn') === false) {
                        // Check if it's binary
                        $handle = fopen($p, 'r');
                        if ($handle) {
                            $bytes = fread($handle, 15);
                            fclose($handle);
                            if (strpos($bytes, '<!DOCTYPE') === false) {
                                echo "Found valid file at: $p\n";
                                $found_path = dirname($p);
                                break 2;
                            }
                        }
                    }
                }
            }
        }
    }
    
    if ($found_path) {
        echo "Copying from found path: $found_path\n";
        foreach ($images as $img) {
            $src_file = "$found_path/$img";
            $dest_file = "$dest_dir/$img";
            if (file_exists($src_file)) {
                copy($src_file, $dest_file);
                echo "Copied $img: SUCCESS (" . filesize($dest_file) . " bytes)\n";
            }
        }
    } else {
        echo "No valid binary file found on the server.\n";
    }
}
