<?php
header('Content-Type: text/plain; charset=utf-8');

$dir = '/home/vhvxoigh/workshop.chiefaiofficer.vn/wp-content/uploads';
$results = [];

if (is_dir($dir)) {
    $iterator = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($dir, FilesystemIterator::SKIP_DOTS),
        RecursiveIteratorIterator::SELF_FIRST
    );
    
    foreach ($iterator as $file) {
        if ($file->isFile()) {
            $name = $file->getFilename();
            $ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));
            if ($ext === 'webp' || $ext === 'png' || $ext === 'gif') {
                $size = $file->getSize();
                // Logos are usually small (1KB to 100KB)
                if ($size > 1000 && $size < 120000) {
                    // Check binary
                    $handle = fopen($file->getPathname(), 'r');
                    if ($handle) {
                        $bytes = fread($handle, 15);
                        fclose($handle);
                        if (strpos($bytes, '<!DOCTYPE') === false && strpos($bytes, '<html') === false) {
                            $rel = str_replace('/home/vhvxoigh/workshop.chiefaiofficer.vn/', '', $file->getPathname());
                            $results[] = [
                                'path' => $rel,
                                'size' => $size
                            ];
                        }
                    }
                }
            }
        }
    }
}

$json = json_encode($results);
$b64 = base64_encode($json);
echo chunk_split($b64, 76, "\n");
