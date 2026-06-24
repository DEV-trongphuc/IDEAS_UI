<?php
header('Content-Type: text/plain; charset=utf-8');

define('WP_USE_THEMES', false);
$wp_load_path = '/home/vhvxoigh/public_html/wp-load.php';

if (!file_exists($wp_load_path)) {
    die("wp-load.php not found");
}

require_once $wp_load_path;

echo "=== Reflection of gej_eaz6koqqfg7x ===\n";
if (function_exists('gej_eaz6koqqfg7x')) {
    try {
        $ref = new ReflectionFunction('gej_eaz6koqqfg7x');
        echo "Function: gej_eaz6koqqfg7x\n";
        echo "File: " . $ref->getFileName() . "\n";
        echo "Line: " . $ref->getStartLine() . "\n";
        
        echo "\n=== Content around the function ===\n";
        $file_lines = file($ref->getFileName());
        $start_line = max(0, $ref->getStartLine() - 10);
        $end_line = min(count($file_lines), $ref->getStartLine() + 30);
        for ($i = $start_line; $i < $end_line; $i++) {
            echo ($i + 1) . ": " . $file_lines[$i];
        }
    } catch (Exception $e) {
        echo "Reflection error: " . $e->getMessage() . "\n";
    }
} else {
    echo "Function gej_eaz6koqqfg7x does not exist in the loaded environment.\n";
}
