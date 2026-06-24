<?php
header('Content-Type: text/plain; charset=utf-8');

$func_path = '/home/vhvxoigh/public_html/wp-content/themes/buddyboss-theme-child/functions.php';
if (file_exists($func_path)) {
    echo "=== buddyboss-theme-child/functions.php ===\n";
    echo file_get_contents($func_path) . "\n";
} else {
    echo "functions.php not found\n";
}
