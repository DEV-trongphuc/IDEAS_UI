<?php
$_SERVER["HTTP_HOST"] = isset($_SERVER["HTTP_HOST"]) ? $_SERVER["HTTP_HOST"] : "localhost";
$_SERVER["REQUEST_URI"] = "/";
define("ABSPATH", __DIR__ . "/");
require_once ABSPATH . "wp-load.php";
$slug = "LANDINGPAGE_MBA";
$theme = wp_get_theme($slug);
if ($theme->exists()) {
    switch_theme($slug);
    echo "<p style=\"background:#d4edda;padding:20px;font-family:monospace\"><b>Activated: " . esc_html(get_option("stylesheet")) . "</b><br><a href=\"" . home_url() . "\">Visit site</a><br><br><span style=\"color:red\">DELETE this file!</span></p>";
} else {
    echo "<p style=\"background:#f8d7da;padding:20px;font-family:monospace\">Not found: <code>" . esc_html($slug) . "</code><br>Available: ";
    foreach (wp_get_themes() as $t) echo esc_html($t->get_stylesheet()) . " | ";
    echo "</p>";
}
