<?php
/**
 * Standalone Security Scanner V2 for IDEAS website
 * Searches the entire filesystem for sc_payload_t or _transient_sc_payload_t.
 */
header('Content-Type: text/plain; charset=utf-8');

$deploy_path = __DIR__;
echo "Starting comprehensive search for loaders in: $deploy_path\n\n";

$signatures = ['sc_payload_t', '_transient_sc_payload_t', 'wpHealthSampled7', 'shb323c450e00e'];

// Recursively scan all files in a directory
function scan_recursive($dir, $signatures) {
    if (!file_exists($dir)) return;
    $iterator = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($dir, RecursiveDirectoryIterator::SKIP_DOTS),
        RecursiveIteratorIterator::SELF_FIRST
    );
    
    foreach ($iterator as $file) {
        if ($file->isFile() && strtolower($file->getExtension()) === 'php') {
            $path = $file->getPathname();
            // Skip uploads to save time (already cleaned)
            if (strpos($path, 'wp-content/uploads') !== false) continue;
            
            $content = @file_get_contents($path);
            if ($content === false) continue;
            
            foreach ($signatures as $sig) {
                if (strpos($content, $sig) !== false) {
                    echo "[MATCH] Found '$sig' in file: $path\n";
                    $lines = explode("\n", $content);
                    foreach ($lines as $idx => $line) {
                        if (strpos($line, $sig) !== false) {
                            echo "  Line " . ($idx + 1) . ": " . trim($line) . "\n";
                        }
                    }
                }
            }
        }
    }
}

echo "=== SCANNING ALL FILESYSTEM (EXCLUDING UPLOADS) ===\n";
scan_recursive($deploy_path, $signatures);

// Load WordPress to delete the database option
if (file_exists($deploy_path . '/wp-load.php')) {
    echo "\n=== CONNECTING TO DATABASE ===\n";
    define('WP_USE_THEMES', false);
    require_once $deploy_path . '/wp-load.php';
    
    global $wpdb;
    
    // Delete the transient option
    echo "Deleting transient options containing sc_payload_t...\n";
    
    $options_to_delete = [
        '_transient_sc_payload_t',
        '_transient_timeout_sc_payload_t',
        '_transient_sc_payload_t_backup',
        'sc_payload_t'
    ];
    
    foreach ($options_to_delete as $opt) {
        $deleted = delete_option($opt);
        if ($deleted) {
            echo "SUCCESS: Deleted option '$opt' from database.\n";
        } else {
            // Try direct SQL in case it's not a standard option format
            $sql_deleted = $wpdb->query($wpdb->prepare("DELETE FROM {$wpdb->options} WHERE option_name = %s", $opt));
            if ($sql_deleted) {
                echo "SUCCESS (SQL): Deleted option '$opt' from database.\n";
            } else {
                echo "No option '$opt' existed or could not be deleted.\n";
            }
        }
    }
    
    // Clear any transients matching wildcard
    $wildcard_deleted = $wpdb->query("DELETE FROM {$wpdb->options} WHERE option_name LIKE '%sc_payload_t%'");
    if ($wildcard_deleted) {
        echo "SUCCESS (SQL): Deleted $wildcard_deleted wildcard option(s) matching '%sc_payload_t%'.\n";
    }
}

// Self destruct
@unlink(__FILE__);
echo "\nScan completed and scan-server.php self-deleted.\n";
