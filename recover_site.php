<?php
header('Content-Type: text/plain; charset=utf-8');

$public_path = '/home/vhvxoigh/public_html';
$config_file = $public_path . '/wp-config.php';

if (!file_exists($config_file)) {
    die("Error: wp-config.php not found at $config_file\n");
}

$config_content = file_get_contents($config_file);
preg_match("/define\(\s*'DB_NAME'\s*,\s*'([^']+)'\s*\)/i", $config_content, $db_name);
preg_match("/define\(\s*'DB_USER'\s*,\s*'([^']+)'\s*\)/i", $config_content, $db_user);
preg_match("/define\(\s*'DB_PASSWORD'\s*,\s*'([^']+)'\s*\)/i", $config_content, $db_pass);
preg_match("/define\(\s*'DB_HOST'\s*,\s*'([^']+)'\s*\)/i", $config_content, $db_host);

$table_prefix = 'wp_';
if (preg_match('/\$table_prefix\s*=\s*\'([^\']+)\'/i', $config_content, $prefix_match)) {
    $table_prefix = $prefix_match[1];
}

if (!isset($db_name[1]) || !isset($db_user[1]) || !isset($db_pass[1])) {
    die("Error: Could not parse database credentials from wp-config.php\n");
}

$host = isset($db_host[1]) ? $db_host[1] : 'localhost';
echo "Connecting to database: {$db_name[1]} on $host (Prefix: $table_prefix)...\n";

try {
    $pdo = new PDO("mysql:host=$host;dbname={$db_name[1]};charset=utf8", $db_user[1], $db_pass[1]);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // 1. Get current active plugins
    $stmt = $pdo->prepare("SELECT option_value FROM {$table_prefix}options WHERE option_name = 'active_plugins'");
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
    $active_plugins = [];
    if ($row) {
        $active_plugins = unserialize($row['option_value']);
        if (!is_array($active_plugins)) {
            $active_plugins = [];
        }
    }
    
    echo "Currently active plugins in DB:\n";
    foreach ($active_plugins as $p) {
        echo "  - $p\n";
    }
    
    // 2. Define the plugins we want to make sure are active
    $plugins_to_activate = [
        'elementor/elementor.php',
        'buddyboss-platform/bp-loader.php',
        'buddyboss-platform-pro/buddyboss-platform-pro.php',
        'advanced-custom-fields-pro/acf.php',
        'bdthemes-element-pack/bdthemes-element-pack.php',
        'acf-repeater-flexible-content-collapser/acf-repeater-flexible-content-collapser.php',
    ];
    
    // Check if elementor-pro exists on disk
    if (file_exists($public_path . '/wp-content/plugins/elementor-pro/elementor-pro.php')) {
        $plugins_to_activate[] = 'elementor-pro/elementor-pro.php';
        echo "Detected elementor-pro on disk.\n";
    }
    
    // 3. Merge them into the active plugins list if not already present
    $modified = false;
    foreach ($plugins_to_activate as $p) {
        if (!in_array($p, $active_plugins)) {
            // Verify the file actually exists on disk before activating
            $disk_file = $public_path . '/wp-content/plugins/' . $p;
            if (file_exists($disk_file)) {
                $active_plugins[] = $p;
                echo "Activating: $p\n";
                $modified = true;
            } else {
                echo "Skipped (not found on disk): $p\n";
            }
        }
    }
    
    // 4. Update the DB if changed
    if ($modified) {
        $serialized = serialize($active_plugins);
        $update_stmt = $pdo->prepare("UPDATE {$table_prefix}options SET option_value = ? WHERE option_name = 'active_plugins'");
        if ($update_stmt->execute([$serialized])) {
            echo "\n[SUCCESS] Successfully updated active_plugins in DB!\n";
        } else {
            echo "\n[ERROR] Failed to update DB!\n";
        }
    } else {
        echo "\nNo new plugins needed to be activated.\n";
    }
    
} catch (Exception $e) {
    echo "Database/execution error: " . $e->getMessage() . "\n";
}
