<?php
header('Content-Type: text/plain; charset=utf-8');

$htaccess_path = '/home/vhvxoigh/public_html/.htaccess';
if (file_exists($htaccess_path)) {
    echo "=== PUBLIC_HTML .HTACCESS ===\n";
    echo file_get_contents($htaccess_path) . "\n";
} else {
    echo "public_html/.htaccess not found\n";
}
