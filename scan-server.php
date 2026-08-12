<?php
/**
 * Standalone Security Scanner V3 for IDEAS website
 * Scans all filesystem PHP files for the exact obfuscated script signatures.
 */
header('Content-Type: text/plain; charset=utf-8');

$deploy_path = __DIR__;
echo "Starting comprehensive V3 filesystem scan in: $deploy_path\n\n";

$signatures = ['_0x47a840be2f7c', 'ozL12p', 'wpHealthSampled7'];

// Recursively scan all files in a directory
function scan_recursive($dir, $signatures) {
    if (!file_exists($dir)) return;
    $iterator = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($dir, RecursiveDirectoryIterator::SKIP_DOTS),
        RecursiveIteratorIterator::SELF_FIRST
    );
    
    foreach ($iterator as $file) {
        if ($file->isFile() && strtolower($file->getExtension()) === 'php') {
            $path = $file->getPathname();
            // Skip uploads (already cleaned)
            if (strpos($path, 'wp-content/uploads') !== false) continue;
            
            $content = @file_get_contents($path);
            if ($content === false) continue;
            
            foreach ($signatures as $sig) {
                if (strpos($content, $sig) !== false) {
                    echo "[FILE MATCH] Found '$sig' in file: $path\n";
                    $lines = explode("\n", $content);
                    foreach ($lines as $idx => $line) {
                        if (strpos($line, $sig) !== false) {
                            $snippet = trim($line);
                            if (strlen($snippet) > 150) $snippet = substr($snippet, 0, 150) . "...";
                            echo "  Line " . ($idx + 1) . ": $snippet\n";
                        }
                    }
                }
            }
        }
    }
}

echo "=== SCANNING ALL CORE AND PLUGIN FILES ===\n";
scan_recursive($deploy_path, $signatures);

// Self destruct
@unlink(__FILE__);
echo "\nScan V3 completed and scan-server.php self-deleted.\n";
