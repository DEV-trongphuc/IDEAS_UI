<?php
header('Content-Type: text/plain; charset=utf-8');

$login_file = '/home/vhvxoigh/public_html/wp-login.php';

if (file_exists($login_file)) {
    echo "=== wp-login.php stats ===\n";
    echo "Size: " . filesize($login_file) . " bytes\n";
    echo "Readable: " . (is_readable($login_file) ? 'YES' : 'NO') . "\n";
    echo "Permissions: " . substr(sprintf('%o', fileperms($login_file)), -4) . "\n";
    
    echo "\n=== First 100 lines of wp-login.php ===\n";
    $lines = file($login_file);
    $first_lines = array_slice($lines, 0, 100);
    echo implode("", $first_lines);
} else {
    echo "wp-login.php not found at $login_file\n";
}
