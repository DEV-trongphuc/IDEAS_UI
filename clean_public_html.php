<?php
header('Content-Type: text/plain; charset=utf-8');

$public_path = '/home/vhvxoigh/public_html';

echo "=== DIAGNOSING ROBOTS.TXT ===\n";
$robots_file = $public_path . '/robots.txt';
if (file_exists($robots_file)) {
    echo "Content of robots.txt:\n";
    echo "====================================\n";
    echo file_get_contents($robots_file);
    echo "\n====================================\n";
} else {
    echo "robots.txt not found.\n";
}

echo "\n=== FIXING INDEX.PHP IN PUBLIC_HTML ===\n";
$index_file = $public_path . '/index.php';
if (file_exists($index_file)) {
    $content = file_get_contents($index_file);
    if (strpos($content, 'BroadcastProvider') !== false || strpos($content, 'DTOMapper') !== false || strlen($content) > 10000) {
        echo "[ALERT] index.php is HACKED. Proceeding to fix...\n";
        
        // 1. Create a backup of the hacked index.php
        $backup_file = $public_path . '/index.php.bak_hacked_' . date('Ymd_His');
        if (copy($index_file, $backup_file)) {
            echo "  - Backed up hacked index.php to " . basename($backup_file) . "\n";
        } else {
            echo "  - [ERROR] Could not create backup of hacked index.php!\n";
        }
        
        // 2. Write standard WordPress index.php content
        $clean_content = '<?php
/**
 * Front to the WordPress application. This file doesn\'t do anything, but loads
 * wp-blog-header.php which does and tells WordPress to load the theme.
 *
 * @var bool
 */
define( \'WP_USE_THEMES\', true );

/** Loads the WordPress Environment and Template */
require __DIR__ . \'/wp-blog-header.php\';
';
        if (file_put_contents($index_file, $clean_content)) {
            echo "  - [SUCCESS] Replaced hacked index.php with a clean, standard WordPress index.php!\n";
        } else {
            echo "  - [ERROR] Failed to write clean index.php!\n";
        }
    } else {
        echo "[OK] index.php does not seem to contain the Japanese spam hack pattern.\n";
    }
} else {
    echo "[WARNING] index.php not found in public_html!\n";
}
