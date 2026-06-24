<?php
header('Content-Type: text/plain; charset=utf-8');

$paths = [
    '/home/vhvxoigh/public_html/khoa-hoc-online',
    '/home/vhvxoigh/public_html/wp-content/themes',
];

foreach ($paths as $path) {
    echo "=== INSPECTING: $path ===\n";
    if (file_exists($path)) {
        if (is_dir($path)) {
            $files = scandir($path);
            foreach ($files as $file) {
                if ($file === '.' || $file === '..') continue;
                $full = $path . '/' . $file;
                echo "  " . (is_dir($full) ? "[DIR] " : "[FILE] ") . $file . " (" . (is_dir($full) ? "" : filesize($full) . " bytes") . ")\n";
            }
        } else {
            echo "  Is a file: " . filesize($path) . " bytes\n";
        }
    } else {
        echo "  Not found.\n";
    }
    echo "\n";
}

// Also check the database prefix or config of chiefaiofficer.vn
$wp_config_pub = '/home/vhvxoigh/public_html/wp-config.php';
if (file_exists($wp_config_pub)) {
    echo "=== PUBLIC_HTML wp-config.php ===\n";
    $conf = file_get_contents($wp_config_pub);
    // Print DB settings and table prefix without password if possible, or just extract DB_NAME and prefix
    if (preg_match('/define\(\s*\'DB_NAME\'\s*,\s*\'([^\']+)\'\s*\)/', $conf, $m1)) {
        echo "  DB_NAME: " . $m1[1] . "\n";
    }
    if (preg_match('/\$table_prefix\s*=\s*\'([^\']+)\'/', $conf, $m2)) {
        echo "  table_prefix: " . $m2[1] . "\n";
    }
} else {
    echo "=== PUBLIC_HTML wp-config.php not found ===\n";
}
