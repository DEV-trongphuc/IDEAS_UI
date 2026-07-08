<?php
header('Content-Type: text/plain; charset=utf-8');

echo "=== FILE LISTING: /home/vhvxoigh/ideas.edu.vn/wp-content/uploads/2025/10/ ===\n";
$dir10 = '/home/vhvxoigh/ideas.edu.vn/wp-content/uploads/2025/10';
if (is_dir($dir10)) {
    $files = scandir($dir10);
    foreach ($files as $f) {
        if ($f !== '.' && $f !== '..') {
            echo " - $f\n";
        }
    }
} else {
    echo "Directory not found.\n";
}

echo "\n=== Load WordPress & Query DB Attachments ===\n";
define('WP_USE_THEMES', false);
$wp_load_path = '/home/vhvxoigh/ideas.edu.vn/wp-load.php';
if (file_exists($wp_load_path)) {
    require_once $wp_load_path;
    echo "WordPress loaded.\n";
} else {
    echo "wp-load.php not found.\n";
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
    // Sort to get latest
    sort($log_files);
    $latest = end($log_files);
    if ($latest) {
        echo "Latest log: $latest\n";
        $log_content = file_get_contents("$log_dir/$latest");
        echo substr($log_content, -2000); // last 2000 chars
    } else {
        echo "No git deploy logs found.\n";
    }
} else {
    echo "cPanel logs dir not found.\n";
}


