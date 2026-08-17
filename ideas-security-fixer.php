<?php
/**
 * IDEAS Ultimate Security Cleaner & Malware Eradication Engine
 * Targets: ClickFix, Fake Cloudflare, datum-patcher-tag.php, sc_payload, rogue mu-plugins & DB options
 */

@ini_set('memory_limit', '512M');
@set_time_limit(300);

$secret_key = 'ideas_clean_2026_sec_fix';
if (!isset($_GET['key']) || $_GET['key'] !== $secret_key) {
    header('HTTP/1.0 403 Forbidden');
    die('403 Forbidden');
}

$do_clean = isset($_GET['clean']) && $_GET['clean'] === '1';
$do_delete = isset($_GET['delete']) && $_GET['delete'] === '1';

header('Content-Type: text/plain; charset=utf-8');

echo "====================================================\n";
echo "🛡️ IDEAS COMPLETE MALWARE ERADICATION PROTOCOL\n";
echo "Mode: " . ($do_clean ? "ACTIVE CLEANING & DELETION" : "DRY-RUN INSPECTION") . "\n";
echo "====================================================\n\n";

// 1. BOOT WORDPRESS
if (file_exists(__DIR__ . '/wp-load.php')) {
    require_once __DIR__ . '/wp-load.php';
    echo "[OK] WordPress Core loaded.\n";
} else {
    die("[FAIL] wp-load.php not found.\n");
}

global $wpdb;

// 2. ERADICATE MU-PLUGINS MALWARE
echo "\n--- STEP 1: CLEANING WP-CONTENT/MU-PLUGINS ---\n";
$mu_dir = WP_CONTENT_DIR . '/mu-plugins';
if (is_dir($mu_dir)) {
    $files = scandir($mu_dir);
    foreach ($files as $f) {
        if ($f !== '.' && $f !== '..') {
            $f_path = $mu_dir . '/' . $f;
            echo "Found file in mu-plugins: {$f} (" . filesize($f_path) . " bytes)\n";
            if ($do_clean) {
                @unlink($f_path);
                echo "  -> [DELETED] {$f_path}\n";
            }
        }
    }
    if ($do_clean) {
        @rmdir($mu_dir);
        echo "[OK] Cleaned and removed mu-plugins directory.\n";
    }
} else {
    echo "[OK] No mu-plugins directory found.\n";
}

// 3. ERADICATE DATABASE MALWARE OPTIONS
echo "\n--- STEP 2: ERADICATING MALWARE DATABASE RECORDS ---\n";
$known_bad_names = [
    'fe510a5dee12',
    'sc_payload_persistent',
    '8f21c2596112',
    '3ab410a3eef7',
    '014af9a433a4',
    'fe327e74df',
    '79a06b5cee7d',
    '_transient_sc_payload_t',
    '_transient_timeout_sc_payload_t',
    'sc_payload_t'
];

foreach ($known_bad_names as $opt_name) {
    $val = get_option($opt_name);
    if ($val !== false) {
        echo "Found known bad option: {$opt_name} (Length: " . strlen(is_string($val) ? $val : serialize($val)) . ")\n";
        if ($do_clean) {
            delete_option($opt_name);
            $wpdb->query($wpdb->prepare("DELETE FROM {$wpdb->options} WHERE option_name = %s", $opt_name));
            echo "  -> [DELETED FROM DB] {$opt_name}\n";
        }
    }
}

// Search and delete any remaining options matching patterns
$bad_query_options = $wpdb->get_results("SELECT option_id, option_name, LENGTH(option_value) as len FROM {$wpdb->options} WHERE option_name LIKE 'sc_%' OR option_name LIKE '%sc_payload%' OR option_value LIKE '%73657276696365576f726b6572%' OR option_value LIKE '%data-sc-%' OR option_value LIKE '%atob(v.c)%'");

foreach ($bad_query_options as $bopt) {
    if (!in_array($bopt->option_name, ['cron', 'rank-math-options-general', 'rank-math-options-titles'])) {
        echo "Found suspicious option by query: ID {$bopt->option_id} - Name: {$bopt->option_name} (Len: {$bopt->len})\n";
        if ($do_clean) {
            delete_option($bopt->option_name);
            $wpdb->query($wpdb->prepare("DELETE FROM {$wpdb->options} WHERE option_id = %d", $bopt->option_id));
            echo "  -> [DELETED FROM DB] {$bopt->option_name}\n";
        }
    }
}

// 4. SCAN WP-CONTENT/UPLOADS & CACHE FOR ROGUE PHP
echo "\n--- STEP 3: SCANNING UPLOADS & CACHE FOR ROGUE SCRIPTS ---\n";
$dirs_to_clean = [
    WP_CONTENT_DIR . '/uploads',
    WP_CONTENT_DIR . '/cache'
];

$deleted_rogue_files = 0;
foreach ($dirs_to_clean as $scan_folder) {
    if (!is_dir($scan_folder)) continue;
    $iterator = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($scan_folder, RecursiveDirectoryIterator::SKIP_DOTS),
        RecursiveIteratorIterator::SELF_FIRST
    );
    foreach ($iterator as $item) {
        if ($item->isFile()) {
            $ext = strtolower(pathinfo($item->getPathname(), PATHINFO_EXTENSION));
            if (in_array($ext, ['php', 'phtml', 'php5', 'php7', 'suspected', 'ico']) && $item->getSize() > 0) {
                // If it's a php file in uploads or cache, it is 100% rogue
                if (in_array($ext, ['php', 'phtml', 'php5', 'php7', 'suspected'])) {
                    echo "Found rogue executable file: " . $item->getPathname() . "\n";
                    if ($do_clean) {
                        @unlink($item->getPathname());
                        echo "  -> [DELETED]\n";
                        $deleted_rogue_files++;
                    }
                }
            }
        }
    }
}
echo "Total rogue files in uploads/cache deleted: {$deleted_rogue_files}\n";

// 5. CACHE PURGE
echo "\n--- STEP 4: PURGING ALL CACHES ---\n";
if ($do_clean) {
    if (function_exists('litespeed_purge_all')) {
        litespeed_purge_all();
        echo "[OK] LiteSpeed cache purged.\n";
    }
    if (function_exists('opcache_reset')) {
        opcache_reset();
        echo "[OK] OPCache reset.\n";
    }
    wp_cache_flush();
    echo "[OK] WordPress Object Cache flushed.\n";
}

// 6. SELF DESTRUCT
if ($do_delete) {
    @unlink(__FILE__);
    echo "\n[OK] Self-destructed ideas-security-fixer.php\n";
}

echo "\n====================================================\n";
echo "PROTOCOL COMPLETED SUCCESSFULLY.\n";
echo "====================================================\n";
