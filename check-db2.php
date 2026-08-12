<?php
/**
 * Standalone Database Security Checker V2 for IDEAS website
 */
header('Content-Type: text/plain; charset=utf-8');

$deploy_path = __DIR__;
echo "Checking database options in: $deploy_path\n\n";

if (file_exists($deploy_path . '/wp-load.php')) {
    define('WP_USE_THEMES', false);
    require_once $deploy_path . '/wp-load.php';
    
    global $wpdb;
    
    // 1. Search options table for transient and delete if exists
    $transient = $wpdb->get_row("SELECT * FROM {$wpdb->options} WHERE option_name = '_transient_sc_payload_t'");
    if ($transient) {
        echo "[FOUND] _transient_sc_payload_t exists! Deleting...\n";
        $wpdb->query("DELETE FROM {$wpdb->options} WHERE option_name = '_transient_sc_payload_t'");
        $wpdb->query("DELETE FROM {$wpdb->options} WHERE option_name = '_transient_timeout_sc_payload_t'");
        echo "SUCCESS: Deleted _transient_sc_payload_t and its timeout.\n";
    } else {
        echo "[NOT FOUND] _transient_sc_payload_t does not exist.\n";
    }
    
    // 2. Search options table for any option containing ozL12p
    $results = $wpdb->get_results(
        $wpdb->prepare(
            "SELECT option_name, SUBSTRING(option_value, 1, 150) as val FROM {$wpdb->options} WHERE option_value LIKE %s",
            '%ozL12p%'
        )
    );
    if (!empty($results)) {
        foreach ($results as $row) {
            echo "[DB MATCH] Option '{$row->option_name}' contains 'ozL12p'. Preview: {$row->val}...\n";
            echo "Deleting option '{$row->option_name}'...\n";
            $wpdb->query($wpdb->prepare("DELETE FROM {$wpdb->options} WHERE option_name = %s", $row->option_name));
        }
    } else {
        echo "No matches for 'ozL12p' in options table.\n";
    }
    
} else {
    echo "wp-load.php not found.\n";
}

// Self destruct
@unlink(__FILE__);
echo "\nCheck V2 completed.\n";
