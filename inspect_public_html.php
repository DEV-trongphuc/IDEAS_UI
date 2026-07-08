<?php
header('Content-Type: text/plain; charset=utf-8');

echo "=== Direct DB Query ===\n";
$config_path = '/home/vhvxoigh/ideas.edu.vn/wp-config.php';
if (!file_exists($config_path)) {
    die("wp-config.php not found.\n");
}

$config = file_get_contents($config_path);

// Match DB constants
define('MATCH_REGEX', '/define\(\s*\'([^\']+)\'\s*,\s*\'([^\']+)\'\s*\);/');
preg_match_all(MATCH_REGEX, $config, $matches);
$db_vars = [];
if (!empty($matches[1])) {
    foreach ($matches[1] as $idx => $name) {
        $db_vars[$name] = $matches[2][$idx];
    }
}

$db_host = $db_vars['DB_HOST'] ?? 'localhost';
$db_name = $db_vars['DB_NAME'] ?? '';
$db_user = $db_vars['DB_USER'] ?? '';
$db_pass = $db_vars['DB_PASSWORD'] ?? '';

// Get prefix
preg_match('/\$table_prefix\s*=\s*\'([^\']+)\';/', $config, $prefix_matches);
$prefix = $prefix_matches[1] ?? 'wp_';

try {
    $dsn = "mysql:host=$db_host;dbname=$db_name;charset=utf8mb4";
    $pdo = new PDO($dsn, $db_user, $db_pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
    echo "Connected to DB successfully.\n\n";

    $keywords = ['qualiopi', 'rncp', 'asic', 'ukrlp', 'ukr', 'degree'];
    $results = [];
    foreach ($keywords as $kw) {
        $like = '%' . $kw . '%';
        $stmt = $pdo->prepare("
            SELECT p.ID, p.post_title, p.guid, pm.meta_value as file_path 
            FROM {$prefix}posts p
            LEFT JOIN {$prefix}postmeta pm ON p.ID = pm.post_id AND pm.meta_key = '_wp_attached_file'
            WHERE p.post_type = 'attachment' AND (p.post_title LIKE :kw OR p.guid LIKE :kw OR pm.meta_value LIKE :kw)
        ");
        $stmt->execute(['kw' => $like]);
        $rows = $stmt->fetchAll();
        foreach ($rows as $row) {
            $results[$row['ID']] = $row;
        }
    }

    echo "Total attachments found: " . count($results) . "\n";
    foreach ($results as $id => $row) {
        echo "ID: $id | Title: {$row['post_title']} | Meta: {$row['file_path']} | GUID: {$row['guid']}\n";
    }

} catch (PDOException $e) {
    echo "DB Connection Error: " . $e->getMessage() . "\n";
}

