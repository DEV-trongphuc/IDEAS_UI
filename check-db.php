<?php
/**
 * Standalone Database Security Checker for IDEAS website
 */
header('Content-Type: text/plain; charset=utf-8');

$deploy_path = __DIR__;
echo "Checking database options in: $deploy_path\n\n";

if (file_exists($deploy_path . '/wp-load.php')) {
    define('WP_USE_THEMES', false);
    require_once $deploy_path . '/wp-load.php';
    
    global $wpdb;
    
    // 1. Check if transient exists
    $transient = $wpdb->get_row("SELECT * FROM {$wpdb->options} WHERE option_name = '_transient_sc_payload_t'");
    if ($transient) {
        echo "[FOUND] _transient_sc_payload_t still exists! Value preview: " . substr($transient->option_value, 0, 150) . "\n";
    } else {
        echo "[NOT FOUND] _transient_sc_payload_t does not exist in options.\n";
    }
    
    // 2. Search options table for obfuscated script signatures
    $signatures = ['ozL12p', '_0x47a840be2f7c', 'wpHealthSampled7', 'shb323c450e00e'];
    foreach ($signatures as $sig) {
        $results = $wpdb->get_results(
            $wpdb->prepare(
                "SELECT option_id, option_name, SUBSTRING(option_value, 1, 150) as val FROM {$wpdb->options} WHERE option_value LIKE %s",
                '%' . $wpdb->esc_like($sig) . '%'
            )
        );
        if (!empty($results)) {
            foreach ($results as $row) {
                echo "[DB MATCH] Option '{$row->option_name}' (ID: {$row->option_id}) contains '$sig'. Value preview: {$row->val}...\n";
            }
        } else {
            echo "No matches for '$sig' in options table.\n";
        }
    }
    
} else {
    echo "wp-load.php not found.\n";
}

// Self destruct
@unlink(__FILE__);
echo "\nCheck completed.\n";
