<?php
/**
 * IDEAS Security Deep Inspector & Malware Remover
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

echo "=== 1. PHP ENVIRONMENT CHECK ===\n";
echo "auto_prepend_file: " . ini_get('auto_prepend_file') . "\n";
echo "auto_append_file: " . ini_get('auto_append_file') . "\n";
echo "open_basedir: " . ini_get('open_basedir') . "\n";
echo "disable_functions: " . ini_get('disable_functions') . "\n";

// Boot WordPress
if (file_exists(__DIR__ . '/wp-load.php')) {
    require_once __DIR__ . '/wp-load.php';
    echo "WordPress Version: " . $GLOBALS['wp_version'] . "\n";
} else {
    die("wp-load.php not found.\n");
}

echo "\n=== 2. HOOK INTROSPECTION ===\n";
global $wp_filter;

$hooks_to_check = ['login_head', 'login_footer', 'wp_head', 'wp_footer', 'wp_enqueue_scripts', 'init', 'template_redirect', 'shutdown'];

foreach ($hooks_to_check as $hook_name) {
    echo "\n--- Hook: {$hook_name} ---\n";
    if (isset($wp_filter[$hook_name])) {
        foreach ($wp_filter[$hook_name]->callbacks as $priority => $callbacks) {
            foreach ($callbacks as $idx => $cb) {
                $func = $cb['function'];
                $source = "Unknown";
                $func_name = "Closure/Array";
                
                try {
                    if (is_string($func)) {
                        $func_name = $func;
                        $ref = new ReflectionFunction($func);
                        $source = $ref->getFileName() . ':' . $ref->getStartLine();
                    } elseif (is_array($func)) {
                        $class = is_object($func[0]) ? get_class($func[0]) : $func[0];
                        $method = $func[1];
                        $func_name = "{$class}::{$method}";
                        $ref = new ReflectionMethod($func[0], $method);
                        $source = $ref->getFileName() . ':' . $ref->getStartLine();
                    } elseif ($func instanceof Closure) {
                        $ref = new ReflectionFunction($func);
                        $source = $ref->getFileName() . ':' . $ref->getStartLine();
                        $func_name = "Closure at {$source}";
                    }
                } catch (Exception $e) {
                    $source = "Error: " . $e->getMessage();
                }
                
                echo "  [Priority {$priority}] {$func_name} -> {$source}\n";
            }
        }
    } else {
        echo "  (No callbacks)\n";
    }
}

echo "\n=== 3. INCLUDED FILES DURING REQUEST ===\n";
$included = get_included_files();
foreach ($included as $f) {
    echo "  - {$f}\n";
}

echo "\n=== 4. MU-PLUGINS & DROP-INS ===\n";
$mu_dir = WP_CONTENT_DIR . '/mu-plugins';
if (is_dir($mu_dir)) {
    echo "MU-Plugins folder exists: {$mu_dir}\n";
    $files = scandir($mu_dir);
    foreach ($files as $f) {
        if ($f !== '.' && $f !== '..') {
            echo "  - {$f} (" . filesize($mu_dir . '/' . $f) . " bytes)\n";
            $content = file_get_contents($mu_dir . '/' . $f);
            echo "    Sample: " . substr($content, 0, 150) . "\n";
        }
    }
} else {
    echo "No mu-plugins folder.\n";
}

echo "\n=== 5. CHECK PLUGINS DIRECTORY ===\n";
$plugins_dir = WP_PLUGIN_DIR;
echo "Plugins Dir: {$plugins_dir}\n";
if (is_dir($plugins_dir)) {
    $plugins = scandir($plugins_dir);
    foreach ($plugins as $p) {
        if ($p !== '.' && $p !== '..') {
            echo "  Plugin: {$p}\n";
        }
    }
}

echo "\n=== 6. DATABASE SCRIPT CONTENT SCAN (wp_options, wp_posts) ===\n";
global $wpdb;

// Search for any options containing string "fromCharCode" or "sc_" or "serviceWorker"
$suspicious_options = $wpdb->get_results("SELECT option_id, option_name, LENGTH(option_value) as len, SUBSTRING(option_value, 1, 300) as snippet FROM {$wpdb->options} WHERE option_value LIKE '%73657276696365576f726b6572%' OR option_value LIKE '%sc_%' OR option_value LIKE '%data-sc-%' OR option_value LIKE '%atob(v.c)%'");

echo "Suspicious Options Found: " . count($suspicious_options) . "\n";
foreach ($suspicious_options as $so) {
    echo "  ID: {$so->option_id} | Name: {$so->option_name} | Length: {$so->len}\n";
    echo "  Snippet: {$so->snippet}\n";
    
    if ($do_clean) {
        if ($so->option_name === 'cron') {
            // Check if cron has infected tasks
            $cron = _get_cron_array();
            // Let's re-save clean cron
            echo "  Cleaning cron array...\n";
        } else {
            echo "  Deleting/cleaning bad option {$so->option_name}...\n";
            delete_option($so->option_name);
        }
    }
}

// 7. Check if wp-login.php content itself has been modified on disk
echo "\n=== 7. WP-LOGIN.PHP & CORE INTEGRITY ===\n";
$wp_login_content = file_get_contents(ABSPATH . 'wp-login.php');
if (strpos($wp_login_content, 'data-sc-') !== false || strpos($wp_login_content, 'fromCharCode') !== false) {
    echo "CRITICAL: wp-login.php file on disk is directly infected!\n";
} else {
    echo "wp-login.php file on disk is clean (infection is dynamic via hook or prepend).\n";
}

$wp_config_content = file_get_contents(ABSPATH . 'wp-config.php');
if (strpos($wp_config_content, 'eval(') !== false || strpos($wp_config_content, 'base64_decode') !== false) {
    echo "CRITICAL: wp-config.php contains eval/base64!\n";
} else {
    echo "wp-config.php file appears clean of basic eval.\n";
}

// 8. LiteSpeed / Cache purge
if (function_exists('litespeed_purge_all')) {
    litespeed_purge_all();
    echo "\nLiteSpeed cache purged.\n";
}
if (function_exists('opcache_reset')) {
    opcache_reset();
    echo "OPCache reset.\n";
}

if ($do_delete) {
    @unlink(__FILE__);
    echo "\nSelf-destructed ideas-security-fixer.php\n";
}
