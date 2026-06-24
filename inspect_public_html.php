<?php
header('Content-Type: text/plain; charset=utf-8');

$mu_dir = '/home/vhvxoigh/public_html/wp-content/mu-plugins/';
$target_file = $mu_dir . 'trace-shield-box.php';

echo "=== Mu-plugins folder contents ===\n";
if (file_exists($mu_dir)) {
    foreach (scandir($mu_dir) as $item) {
        if ($item !== '.' && $item !== '..') {
            $path = $mu_dir . $item;
            echo "$item (" . (is_dir($path) ? 'DIR' : 'FILE') . ")\n";
        }
    }
} else {
    echo "mu-plugins directory not found\n";
}

if (file_exists($target_file)) {
    echo "\nDeactivating malware mu-plugin: trace-shield-box.php ...\n";
    $disabled_file = $target_file . '.disabled';
    if (rename($target_file, $disabled_file)) {
        echo "Successfully renamed trace-shield-box.php to trace-shield-box.php.disabled!\n";
    } else {
        echo "Failed to rename trace-shield-box.php\n";
    }
} else {
    echo "\ntrace-shield-box.php not found (already deleted/disabled)\n";
}

// Clear WP Rocket Cache again so the homepage reflects the change immediately
$cache_dir = '/home/vhvxoigh/public_html/wp-content/cache/wp-rocket/chiefaiofficer.vn/';
if (file_exists($cache_dir)) {
    echo "\nClearing WP Rocket Cache...\n";
    function delete_directory($dir) {
        if (!file_exists($dir)) return true;
        if (!is_dir($dir)) return unlink($dir);
        foreach (scandir($dir) as $item) {
            if ($item == '.' || $item == '..') continue;
            if (!delete_directory($dir . DIRECTORY_SEPARATOR . $item)) return false;
        }
        return rmdir($dir);
    }
    if (delete_directory($cache_dir)) {
        echo "Successfully cleared chiefaiofficer.vn cache folder!\n";
    } else {
        echo "Failed to clear cache folder.\n";
    }
}
