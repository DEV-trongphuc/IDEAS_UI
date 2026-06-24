<?php
header('Content-Type: text/plain; charset=utf-8');

define('WP_USE_THEMES', false);
$wp_load_path = '/home/vhvxoigh/public_html/wp-load.php';

if (!file_exists($wp_load_path)) {
    die("wp-load.php not found");
}

require_once $wp_load_path;

echo "=== wp_footer Hooks ===\n";
global $wp_filter;
if (isset($wp_filter['wp_footer'])) {
    foreach ($wp_filter['wp_footer']->callbacks as $priority => $callbacks) {
        echo "Priority: $priority\n";
        foreach ($callbacks as $idx => $cb) {
            echo "  Callback: ";
            $function = $cb['function'];
            if (is_string($function)) {
                echo "$function\n";
            } elseif (is_array($function)) {
                if (is_object($function[0])) {
                    echo get_class($function[0]) . "->" . $function[1] . "\n";
                } else {
                    echo $function[0] . "::" . $function[1] . "\n";
                }
            } else {
                echo "[Closure/Object]\n";
            }
        }
    }
} else {
    echo "No wp_footer hooks found.\n";
}

echo "\n=== login_footer Hooks ===\n";
if (isset($wp_filter['login_footer'])) {
    foreach ($wp_filter['login_footer']->callbacks as $priority => $callbacks) {
        echo "Priority: $priority\n";
        foreach ($callbacks as $idx => $cb) {
            echo "  Callback: ";
            $function = $cb['function'];
            if (is_string($function)) {
                echo "$function\n";
            } elseif (is_array($function)) {
                if (is_object($function[0])) {
                    echo get_class($function[0]) . "->" . $function[1] . "\n";
                } else {
                    echo $function[0] . "::" . $function[1] . "\n";
                }
            } else {
                echo "[Closure/Object]\n";
            }
        }
    }
} else {
    echo "No login_footer hooks found.\n";
}
