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
    
    echo "=== Searching database for '<Vlabel>' ===\n";
    
    // Check if xprofile fields table exists and search it
    $tables_stmt = $pdo->prepare("SHOW TABLES LIKE '%bp_xprofile%'");
    $tables_stmt->execute();
    $xprofile_tables = $tables_stmt->fetchAll(PDO::FETCH_COLUMN);
    
    foreach ($xprofile_tables as $table) {
        echo "Table: $table\n";
        // Get columns
        $cols_stmt = $pdo->prepare("DESCRIBE `$table`");
        $cols_stmt->execute();
        $cols = $cols_stmt->fetchAll(PDO::FETCH_COLUMN);
        
        // Build search query
        $conditions = [];
        foreach ($cols as $col) {
            $conditions[] = "`$col` LIKE '%<Vlabel>%'";
        }
        if (!empty($conditions)) {
            $query = "SELECT * FROM `$table` WHERE " . implode(" OR ", $conditions);
            $search_stmt = $pdo->prepare($query);
            $search_stmt->execute();
            $results = $search_stmt->fetchAll();
            echo "  Found " . count($results) . " matches.\n";
            if (!empty($results)) {
                print_r($results);
            }
        }
    }
    
    // Search wpbk_options table
    echo "\nSearching options table...\n";
    $opt_stmt = $pdo->prepare("SELECT option_name, SUBSTRING(option_value, 1, 300) as snippet FROM {$table_prefix}options WHERE option_value LIKE '%<Vlabel>%'");
    $opt_stmt->execute();
    $opts = $opt_stmt->fetchAll();
    echo "  Found " . count($opts) . " options:\n";
    print_r($opts);
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}

// Search theme files for <Vlabel>
echo "\n=== Searching child theme files ===\n";
$theme_dir = '/home/vhvxoigh/public_html/wp-content/themes/buddyboss-theme-child/';
if (file_exists($theme_dir)) {
    $di = new RecursiveDirectoryIterator($theme_dir);
    $it = new RecursiveIteratorIterator($di);
    foreach ($it as $file) {
        if (pathinfo($file, PATHINFO_EXTENSION) === 'php') {
            $content = file_get_contents($file);
            if (strpos($content, '<Vlabel>') !== false) {
                echo "Found in file: $file\n";
                // Print surrounding lines
                $lines = explode("\n", $content);
                foreach ($lines as $i => $line) {
                    if (strpos($line, '<Vlabel>') !== false) {
                        echo "  Line " . ($i + 1) . ": " . trim($line) . "\n";
                    }
                }
            }
        }
    }
}
