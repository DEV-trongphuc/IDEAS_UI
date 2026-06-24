<?php
header('Content-Type: text/plain; charset=utf-8');

$dir = __DIR__;
$files_to_delete = [
    'inspect_public_html.php',
    'clean_public_html.php',
    'inspect_functions.php',
    'inspect_plugins.php',
    'inspect_db.php',
    'recover_site.php',
    'delete_diagnostics.php'
];

echo "=== CLEANING UP DIAGNOSTIC FILES ON SERVER ===\n";
foreach ($files_to_delete as $file) {
    $path = $dir . '/' . $file;
    if (file_exists($path)) {
        if (unlink($path)) {
            echo "Successfully deleted: $file\n";
        } else {
            echo "Failed to delete: $file\n";
        }
    } else {
        echo "File already gone: $file\n";
    }
}
