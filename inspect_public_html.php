<?php
header('Content-Type: text/plain; charset=utf-8');

$wp_config_pub = '/home/vhvxoigh/public_html/wp-config.php';
if (!file_exists($wp_config_pub)) {
    die("ERROR: public_html/wp-config.php not found.\n");
}

$conf = file_get_contents($wp_config_pub);

$db_name = '';
$db_user = '';
$db_pass = '';
$db_host = 'localhost';
$table_prefix = 'wp_';

if (preg_match('/define\(\s*\'DB_NAME\'\s*,\s*\'([^\']+)\'\s*\)/', $conf, $m)) {
    $db_name = $m[1];
}
if (preg_match('/define\(\s*\'DB_USER\'\s*,\s*\'([^\']+)\'\s*\)/', $conf, $m)) {
    $db_user = $m[1];
}
if (preg_match('/define\(\s*\'DB_PASSWORD\'\s*,\s*\'([^\']+)\'\s*\)/', $conf, $m)) {
    $db_pass = $m[1];
}
if (preg_match('/define\(\s*\'DB_HOST\'\s*,\s*\'([^\']+)\'\s*\)/', $conf, $m)) {
    $db_host = $m[1];
}
if (preg_match('/\$table_prefix\s*=\s*\'([^\']+)\'/', $conf, $m)) {
    $table_prefix = $m[1];
}

try {
    $dsn = "mysql:host=$db_host;dbname=$db_name;charset=utf8";
    $pdo = new PDO($dsn, $db_user, $db_pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
    
    // Check Trang chủ (ID 93) _elementor_data
    $stmt = $pdo->prepare("SELECT meta_value FROM {$table_prefix}postmeta WHERE post_id = 93 AND meta_key = '_elementor_data'");
    $stmt->execute();
    $meta = $stmt->fetch();
    
    if ($meta && !empty($meta['meta_value'])) {
        $json_data = $meta['meta_value'];
        echo "Trang chu Elementor Data contains 'AI News': " . (strpos($json_data, 'AI News') !== false ? 'YES' : 'NO') . "\n";
        echo "Trang chu Elementor Data contains 'MSc AI': " . (strpos($json_data, 'MSc AI') !== false ? 'YES' : 'NO') . "\n";
        echo "Trang chu Elementor Data contains 'Podcast': " . (strpos($json_data, 'Podcast') !== false ? 'YES' : 'NO') . "\n";
        echo "Trang chu Elementor Data contains 'Tin tức mới nhất': " . (strpos($json_data, 'Tin tức mới nhất') !== false ? 'YES' : 'NO') . "\n";
    } else {
        echo "No Elementor data for page 93.\n";
    }
    
    // Query another page: ID 6140 (podcasts)
    $stmt = $pdo->prepare("SELECT meta_value FROM {$table_prefix}postmeta WHERE post_id = 6140 AND meta_key = '_elementor_data'");
    $stmt->execute();
    $meta = $stmt->fetch();
    if ($meta && !empty($meta['meta_value'])) {
        $json_data = $meta['meta_value'];
        echo "Podcasts page Elementor Data contains 'AI News': " . (strpos($json_data, 'AI News') !== false ? 'YES' : 'NO') . "\n";
        echo "Podcasts page Elementor Data contains 'MSc AI': " . (strpos($json_data, 'MSc AI') !== false ? 'YES' : 'NO') . "\n";
        echo "Podcasts page Elementor Data contains 'Podcast': " . (strpos($json_data, 'Podcast') !== false ? 'YES' : 'NO') . "\n";
    }
    
} catch (Exception $e) {
    echo "Database Error: " . $e->getMessage() . "\n";
}
