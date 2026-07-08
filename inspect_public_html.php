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
        try {
            $dir_iter = new RecursiveDirectoryIterator($sdir, FilesystemIterator::SKIP_DOTS);
            $iterator = new RecursiveIteratorIterator($dir_iter, RecursiveIteratorIterator::SELF_FIRST);
            
            try {
                $iterator->rewind();
            } catch (Exception $e) {
                // Ignore rewind error
            }
            
            while ($iterator->valid()) {
                try {
                    $file = $iterator->current();
                    if ($file && $file->isFile()) {
                        $name = $file->getFilename();
                        $lower_name = strtolower($name);
                        
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
                } catch (Exception $e) {
                    // Ignore file access error
                }
                
                try {
                    $iterator->next();
                } catch (Exception $e) {
                    // Ignore iterator advance error
                }
            }
        } catch (Exception $e) {
            // Ignore directory iterator error
        }
    }
}

$json = json_encode($results);
$b64 = base64_encode($json);
echo chunk_split($b64, 76, "\n");
