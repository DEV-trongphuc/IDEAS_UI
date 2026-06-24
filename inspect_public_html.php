<?php
header('Content-Type: text/plain; charset=utf-8');

function scan_dir_recursive($dir, &$results = array()) {
    $files = scandir($dir);
    foreach ($files as $key => $value) {
        $path = $dir . DIRECTORY_SEPARATOR . $value;
        if (!is_dir($path)) {
            // Check files modified in the last 7 days
            if (filemtime($path) > time() - 7 * 24 * 3600) {
                $results[] = array(
                    'path' => $path,
                    'mtime' => date('Y-m-d H:i:s', filemtime($path)),
                    'size' => filesize($path)
                );
            }
        } else if ($value != "." && $value != "..") {
            // Skip large system or git directories to avoid timeout
            if ($value === '.git' || $value === 'wp-includes' || $value === 'wp-admin' || $value === 'node_modules') {
                continue;
            }
            scan_dir_recursive($path, $results);
        }
    }
    return $results;
}

echo "=== DIAGNOSTICS FOR PUBLIC_HTML ===\n";
$public_index = '/home/vhvxoigh/public_html/index.php';
if (file_exists($public_index)) {
    $content = file_get_contents($public_index);
    if (strpos($content, 'BroadcastProvider') !== false || strpos($content, 'DTOMapper') !== false) {
        echo "[ALERT] /home/vhvxoigh/public_html/index.php is HACKED (contains Japanese SEO spam injector)\n";
    } else {
        echo "[OK] /home/vhvxoigh/public_html/index.php looks clean\n";
    }
} else {
    echo "[WARNING] /home/vhvxoigh/public_html/index.php not found!\n";
}

echo "\n=== DIAGNOSTICS FOR IDEAS.EDU.VN ===\n";
$ideas_index = '/home/vhvxoigh/ideas.edu.vn/index.php';
if (file_exists($ideas_index)) {
    $content = file_get_contents($ideas_index);
    if (strpos($content, 'BroadcastProvider') !== false || strpos($content, 'DTOMapper') !== false) {
        echo "[ALERT] /home/vhvxoigh/ideas.edu.vn/index.php is HACKED!\n";
    } else {
        echo "[OK] /home/vhvxoigh/ideas.edu.vn/index.php looks clean\n";
    }
} else {
    echo "[WARNING] /home/vhvxoigh/ideas.edu.vn/index.php not found!\n";
}

echo "\n=== RECENTLY MODIFIED FILES IN PUBLIC_HTML (LAST 7 DAYS, EXCLUDING ADMIN/INCLUDES/GIT) ===\n";
$recent_public = array();
scan_dir_recursive('/home/vhvxoigh/public_html', $recent_public);
usort($recent_public, function($a, $b) {
    return strcmp($b['mtime'], $a['mtime']);
});
foreach (array_slice($recent_public, 0, 50) as $f) {
    echo "  {$f['mtime']} - {$f['size']} bytes - {$f['path']}\n";
}

echo "\n=== RECENTLY MODIFIED FILES IN IDEAS.EDU.VN (LAST 7 DAYS, EXCLUDING ADMIN/INCLUDES/GIT) ===\n";
$recent_ideas = array();
scan_dir_recursive('/home/vhvxoigh/ideas.edu.vn', $recent_ideas);
usort($recent_ideas, function($a, $b) {
    return strcmp($b['mtime'], $a['mtime']);
});
foreach (array_slice($recent_ideas, 0, 50) as $f) {
    echo "  {$f['mtime']} - {$f['size']} bytes - {$f['path']}\n";
}
