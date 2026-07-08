<?php
header('Content-Type: text/plain; charset=utf-8');

echo "=== FILE LISTING: /home/vhvxoigh/ideas.edu.vn/wp-content/uploads/2025/10/ ===\n";
$dir10 = '/home/vhvxoigh/ideas.edu.vn/wp-content/uploads/2025/10';
if (is_dir($dir10)) {
    $files = scandir($dir10);
    sort($files);
    foreach ($files as $f) {
        if ($f !== '.' && $f !== '..') {
            $path = "$dir10/$f";
            echo " - $f (" . filesize($path) . " bytes)\n";
        }
    }
} else {
    echo "Directory not found.\n";
}

echo "\n=== Latest cPanel Git Deploy Logs ===\n";
$log_dir = '/home/vhvxoigh/.cpanel/logs';
if (is_dir($log_dir)) {
    $files = scandir($log_dir);
    $log_files = [];
    foreach ($files as $f) {
        if (strpos($f, 'git_deploy.log') !== false) {
            $log_files[] = $f;
        }
    }
    sort($log_files);
    $latest = end($log_files);
    if ($latest) {
        echo "Latest log: $latest\n";
        $log_content = file_get_contents("$log_dir/$latest");
        echo $log_content;
    } else {
        echo "No git deploy logs found.\n";
    }
} else {
    echo "cPanel logs dir not found.\n";
}



