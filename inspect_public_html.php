<?php
header('Content-Type: text/plain; charset=utf-8');

$search_dirs = [
    'ideas.edu.vn' => '/home/vhvxoigh/ideas.edu.vn/wp-content',
    'chiefaiofficer.vn' => '/home/vhvxoigh/public_html/wp-content',
    'workshop.chief' => '/home/vhvxoigh/workshop.chiefaiofficer.vn/wp-content'
];

$results = [];

foreach ($search_dirs as $label => $sdir) {
    if (is_dir($sdir)) {
        $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($sdir));
        foreach ($iterator as $file) {
            if ($file->isFile()) {
                $name = $file->getFilename();
                $lower_name = strtolower($name);
                
                // Match conditions
                $matched = false;
                if (strpos($lower_name, 'erasmus') !== false) {
                    $matched = true;
                }
                if (strpos($lower_name, 'ukrlp') !== false) {
                    $matched = true;
                }
                if (strpos($lower_name, 'estiam') !== false) {
                    $matched = true;
                }
                if (strpos($lower_name, 'asic') !== false && strpos($lower_name, 'basic') === false) {
                    $matched = true;
                }
                
                if ($matched) {
                    $size = $file->getSize();
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
                        $rel_path = str_replace('/home/vhvxoigh/', '', $file->getPathname());
                        $results[] = [
                            'site' => $label,
                            'path' => $rel_path,
                            'size' => $size
                        ];
                    }
                }
            }
        }
    }
}

$json = json_encode($results);
$b64 = base64_encode($json);
echo chunk_split($b64, 76, "\n");
