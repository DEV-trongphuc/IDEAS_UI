<?php
header('Content-Type: text/plain; charset=utf-8');

$error_log_path = '/home/vhvxoigh/public_html/error_log';

if (file_exists($error_log_path)) {
    echo "=== ERROR LOG: $error_log_path ===\n";
    $lines = file($error_log_path);
    $last_lines = array_slice($lines, -50);
    foreach ($last_lines as $line) {
        echo $line;
    }
} else {
    echo "ERROR LOG not found at $error_log_path\n";
}
