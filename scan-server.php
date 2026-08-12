<?php
/**
 * Standalone Security Scanner for IDEAS website
 * Scans files and database for remaining obfuscated scripts.
 */
header('Content-Type: text/plain; charset=utf-8');

$deploy_path = __DIR__;
echo "Starting comprehensive security scan in: $deploy_path\n\n";

$signatures = ['_0x47a840be2f7c', 'ozL12p', 'wpHealthSampled7', 'site-helper-'];

// 1. Scan files recursively
function scan_files($dir, $signatures) {
    if (!file_exists($dir)) return;
    $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir));
    foreach ($iterator as $file) {
        if ($file->isFile() && in_array(strtolower($file->getExtension()), ['php', 'js', 'html', 'htaccess'])) {
            $content = @file_get_contents($file->getPathname());
            if ($content === false) continue;
            
            foreach ($signatures as $sig) {
                if (strpos($content, $sig) !== false) {
                    echo "[FILE MATCH] Found '$sig' in: " . $file->getPathname() . "\n";
                    // Print lines containing signature
                    $lines = explode("\n", $content);
                    foreach ($lines as $idx => $line) {
                        if (strpos($line, $sig) !== false) {
                            $snippet = trim($line);
                            if (strlen($snippet) > 150) $snippet = substr($snippet, 0, 150) . "...";
                            echo "  Line " . ($idx + 1) . ": $snippet\n";
                        }
                    }
                }
            }
        }
    }
}

echo "=== SCANNING THEME FILES ===\n";
scan_files($deploy_path . '/wp-content/themes/LANDINGPAGE_MBA', $signatures);

echo "\n=== SCANNING ROOT FILES ===\n";
foreach (scandir($deploy_path) as $item) {
    if ($item == '.' || $item == '..') continue;
    $path = $deploy_path . '/' . $item;
    if (is_file($path) && in_array(pathinfo($path, PATHINFO_EXTENSION), ['php', 'js', 'html', 'htaccess'])) {
        $content = @file_get_contents($path);
        if ($content === false) continue;
        foreach ($signatures as $sig) {
            if (strpos($content, $sig) !== false) {
                echo "[FILE MATCH] Found '$sig' in root file: $item\n";
            }
        }
    }
}

// 2. Load WordPress to scan the Database
if (file_exists($deploy_path . '/wp-load.php')) {
    echo "\n=== SCANNING DATABASE ===\n";
    define('WP_USE_THEMES', false);
    require_once $deploy_path . '/wp-load.php';
    
    global $wpdb;
    
    // Search options table
    echo "Scanning wp_options table...\n";
    foreach ($signatures as $sig) {
        $results = $wpdb->get_results(
            $wpdb->prepare(
                "SELECT option_name, SUBSTRING(option_value, 1, 100) as val FROM {$wpdb->options} WHERE option_value LIKE %s",
                '%' . $wpdb->esc_like($sig) . '%'
            )
        );
        if (!empty($results)) {
            foreach ($results as $row) {
                echo "[DB MATCH] Found '$sig' in option '{$row->option_name}' (value preview: {$row->val}...)\n";
            }
        }
    }
    
    // Search posts table
    echo "Scanning wp_posts table...\n";
    foreach ($signatures as $sig) {
        $results = $wpdb->get_results(
            $wpdb->prepare(
                "SELECT ID, post_title, post_type FROM {$wpdb->posts} WHERE post_content LIKE %s OR post_excerpt LIKE %s",
                '%' . $wpdb->esc_like($sig) . '%',
                '%' . $wpdb->esc_like($sig) . '%'
            )
        );
        if (!empty($results)) {
            foreach ($results as $row) {
                echo "[DB MATCH] Found '$sig' in post ID {$row->ID} '{$row->post_title}' (Type: {$row->post_type})\n";
            }
        }
    }
} else {
    echo "\nwp-load.php not found. Cannot scan database.\n";
}

// Self destruct
@unlink(__FILE__);
echo "\nScan completed and scan-server.php self-deleted.\n";
