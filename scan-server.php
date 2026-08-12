<?php
/**
 * Standalone Security Scanner V4 for IDEAS website
 * Scans ALL file extensions for the signature 'ozL12p'.
 */
header('Content-Type: text/plain; charset=utf-8');

$deploy_path = __DIR__;
echo "Starting comprehensive V4 all-file scan in: $deploy_path\n\n";

$signatures = ['ozL12p', 'wpHealthSampled7'];

function scan_all_files($dir, $signatures) {
    if (!file_exists($dir)) return;
    $iterator = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($dir, RecursiveDirectoryIterator::SKIP_DOTS),
        RecursiveIteratorIterator::SELF_FIRST
    );
    
    foreach ($iterator as $file) {
        if ($file->isFile()) {
            $path = $file->getPathname();
            
            // Skip standard binary uploads to save memory and time
            $ext = strtolower($file->getExtension());
            if (in_array($ext, ['png', 'jpg', 'jpeg', 'gif', 'webp', 'pdf', 'zip', 'tar', 'gz', 'mp4', 'mp3', 'woff', 'woff2', 'ttf', 'eot'])) {
                // If it is an image or binary, but is unusually small or contains text, we can check, 
                // but let's only check if it is under 10KB just in case of disguised scripts.
                if ($file->getSize() > 15000) continue;
            }
            
            $content = @file_get_contents($path);
            if ($content === false) continue;
            
            foreach ($signatures as $sig) {
                if (strpos($content, $sig) !== false) {
                    echo "[FILE MATCH] Found '$sig' in file: $path (Size: " . $file->getSize() . " bytes)\n";
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

echo "=== SCANNING ALL FILE TYPES ===\n";
scan_all_files($deploy_path, $signatures);

// Self destruct
@unlink(__FILE__);
echo "\nScan V4 completed and scan-server.php self-deleted.\n";
