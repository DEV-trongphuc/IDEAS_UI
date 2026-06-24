<?php
header('Content-Type: text/plain; charset=utf-8');

$config_path = '/home/vhvxoigh/public_html/wp-config.php';
if (!file_exists($config_path)) {
    die("wp-config.php not found at $config_path");
}

$config_content = file_get_contents($config_path);

// Parse DB credentials using regex
preg_match("/define\(\s*['\"]DB_NAME['\"]\s*,\s*['\"](.*?)['\"]\s*\)/", $config_content, $db_name_matches);
preg_match("/define\(\s*['\"]DB_USER['\"]\s*,\s*['\"](.*?)['\"]\s*\)/", $config_content, $db_user_matches);
preg_match("/define\(\s*['\"]DB_PASSWORD['\"]\s*,\s*['\"](.*?)['\"]\s*\)/", $config_content, $db_password_matches);
preg_match("/define\(\s*['\"]DB_HOST['\"]\s*,\s*['\"](.*?)['\"]\s*\)/", $config_content, $db_host_matches);
preg_match("/\\\$table_prefix\s*=\s*['\"](.*?)['\"]/", $config_content, $prefix_matches);

$db_name = $db_name_matches[1] ?? '';
$db_user = $db_user_matches[1] ?? '';
$db_password = $db_password_matches[1] ?? '';
$db_host = $db_host_matches[1] ?? 'localhost';
$table_prefix = $prefix_matches[1] ?? 'wp_';

try {
    $pdo = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8mb4", $db_user, $db_password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
    
    echo "=== Database-wide Search for '<Vlabel>' ===\n";
    
    // Get all tables
    $tables_stmt = $pdo->query("SHOW TABLES");
    $tables = $tables_stmt->fetchAll(PDO::FETCH_COLUMN);
    
    $total_found = 0;
    foreach ($tables as $table) {
        // Skip tables that are huge/log tables if any, but since it's a standard WP site it's fine
        if (strpos($table, 'actionscheduler') !== false) {
            continue;
        }
        
        $cols_stmt = $pdo->query("DESCRIBE `$table`");
        $cols = $cols_stmt->fetchAll(PDO::FETCH_COLUMN);
        
        $conditions = [];
        foreach ($cols as $col) {
            $conditions[] = "`$col` LIKE '%<Vlabel>%'";
        }
        
        if (!empty($conditions)) {
            $query = "SELECT * FROM `$table` WHERE " . implode(" OR ", $conditions);
            try {
                $search_stmt = $pdo->query($query);
                $rows = $search_stmt->fetchAll();
                if (!empty($rows)) {
                    echo "Table: $table (" . count($rows) . " rows match)\n";
                    print_r($rows);
                    echo "\n";
                    $total_found += count($rows);
                }
            } catch (Exception $ex) {
                // Ignore query errors for binary/incompatible column searches
            }
        }
    }
    
    if ($total_found === 0) {
        echo "No matches found in the entire database.\n";
    }
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
