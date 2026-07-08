<?php
header('Content-Type: text/plain; charset=utf-8');

echo "=== Local Server File Scan ===\n";
$home = '/home/vhvxoigh';
if (is_dir($home)) {
    $dirs = scandir($home);
    echo "Directories in $home:\n";
    foreach ($dirs as $d) {
        if ($d !== '.' && $d !== '..') {
            echo " - $d\n";
        }
    }
} else {
    die("Home dir not found.\n");
}

// Check potential paths for workshop site
$potential_paths = [
    '/home/vhvxoigh/workshop.chiefaiofficer.vn/wp-content/uploads/2025/10',
    '/home/vhvxoigh/public_html/workshop/wp-content/uploads/2025/10',
    '/home/vhvxoigh/chiefaiofficer.vn/wp-content/uploads/2025/10'
];

$found_src = null;
foreach ($potential_paths as $p) {
    if (is_dir($p)) {
        echo "\nFound source uploads folder at: $p\n";
        $found_src = $p;
        $files = scandir($p);
        foreach ($files as $f) {
            if ($f !== '.' && $f !== '..') {
                echo "   - $f (" . filesize("$p/$f") . " bytes)\n";
            }
        }
    }
}

if ($found_src) {
    $dest = '/home/vhvxoigh/ideas.edu.vn/wp-content/uploads/2025/10';
    if (!is_dir($dest)) {
        mkdir($dest, 0755, true);
    }
    
    $images_to_copy = [
        "DUAL-DEGREE-1.webp",
        "DUAL-DEGREE-2.webp",
        "DUAL-DEGREE-3.webp",
        "DUAL-DEGREE4.webp",
        "DUAL-DEGREE.webp",
        "Erasmus_Logo.svg.webp",
        "Estiam-DBA-2.webp"
    ];
    
    echo "\nCopying files...\n";
    foreach ($images_to_copy as $img) {
        $src_file = "$found_src/$img";
        $dest_file = "$dest/$img";
        if (file_exists($src_file)) {
            if (copy($src_file, $dest_file)) {
                echo " - Copied $img successfully (Size: " . filesize($dest_file) . " bytes)\n";
            } else {
                echo " - Failed to copy $img\n";
            }
        } else {
            // Check lowercase
            $src_file_lc = "$found_src/" . strtolower($img);
            if (file_exists($src_file_lc)) {
                if (copy($src_file_lc, $dest_file)) {
                    echo " - Copied $img (from lowercase source) successfully (Size: " . filesize($dest_file) . " bytes)\n";
                } else {
                    echo " - Failed to copy $img from lowercase\n";
                }
            } else {
                echo " - Source file $img does not exist.\n";
            }
        }
    }
} else {
    echo "\nCould not find any source uploads folder.\n";
}




