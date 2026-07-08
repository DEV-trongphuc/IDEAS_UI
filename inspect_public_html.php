<?php
header('Content-Type: text/plain; charset=utf-8');

echo "=== Global Search for Accreditation Filenames ===\n";

$search_dirs = [
    '/home/vhvxoigh/ideas.edu.vn/wp-content',
    '/home/vhvxoigh/chiefaiofficer.vn/wp-content',
    '/home/vhvxoigh/public_html/wp-content',
    '/home/vhvxoigh/workshop.chiefaiofficer.vn/wp-content'
];

$keywords = ['qualiopi', 'rncp', 'asic', 'ukrlp', 'erasmus'];
$found_count = 0;

foreach ($search_dirs as $sdir) {
    if (is_dir($sdir)) {
        echo "\nScanning: $sdir...\n";
        $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($sdir));
        foreach ($iterator as $file) {
            if ($file->isFile()) {
                $name = $file->getFilename();
                $lower_name = strtolower($name);
                foreach ($keywords as $kw) {
                    if (strpos($lower_name, $kw) !== false) {
                        $size = $file->getSize();
                        // Verify binary
                        $is_binary = false;
                        if ($size > 1000) {
                            $handle = fopen($file->getPathname(), 'r');
                            if ($handle) {
                                $bytes = fread($handle, 15);
                                fclose($handle);
                                if (strpos($bytes, '<!DOCTYPE') === false && strpos($bytes, '<html') === false) {
                                    $is_binary = true;
                                }
                            }
                        }
                        
                        if ($is_binary) {
                            echo " - " . $file->getPathname() . " ($size bytes)\n";
                            $found_count++;
                            if ($found_count > 40) {
                                echo "Too many results, stopping search.\n";
                                break 3;
                            }
                        }
                    }
                }
            }
        }
    }
}
echo "\nTotal matching binary files found: $found_count\n";
