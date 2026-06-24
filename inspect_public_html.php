<?php
header('Content-Type: text/plain; charset=utf-8');

define('WP_USE_THEMES', false);
$wp_load_path = '/home/vhvxoigh/public_html/wp-load.php';

if (!file_exists($wp_load_path)) {
    die("wp-load.php not found at $wp_load_path");
}

require_once $wp_load_path;

echo "=== WordPress Environment Loaded ===\n";
echo "Active Theme: " . wp_get_theme()->get('Name') . "\n";
echo "Active Stylesheet: " . wp_get_theme()->get_stylesheet() . "\n";
echo "Active Template: " . wp_get_theme()->get_template() . "\n\n";

echo "=== Active Plugins List ===\n";
$active_plugins = get_option('active_plugins');
print_r($active_plugins);

echo "\n=== Class checks ===\n";
$classes_to_check = [
    'Ultimate_Post_Kit' => 'Ultimate Post Kit',
    'TutorLMS' => 'Tutor LMS',
    'Elementor\Plugin' => 'Elementor',
    'BDThemes_Element_Pack' => 'Element Pack'
];
foreach ($classes_to_check as $class => $name) {
    echo "$name class ($class): " . (class_exists($class) ? 'EXISTS' : 'NOT FOUND') . "\n";
}
