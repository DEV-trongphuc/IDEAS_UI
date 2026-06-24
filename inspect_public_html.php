<?php
header('Content-Type: text/plain; charset=utf-8');

$log_path = '/home/vhvxoigh/public_html/error_log';
if (file_exists($log_path)) {
    echo "=== Last 50 lines of error_log ===\n";
    $lines = file($log_path);
    $last_lines = array_slice($lines, -50);
    echo implode("", $last_lines);
} else {
    echo "error_log not found at $log_path\n";
}
