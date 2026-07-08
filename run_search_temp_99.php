<?php
header('Content-Type: text/plain; charset=utf-8');

$search_roots = [
    'ideas.edu.vn' => '/home/vhvxoigh/ideas.edu.vn/wp-content',
    'public_html' => '/home/vhvxoigh/public_html/wp-content',
    'workshop.chief' => '/home/vhvxoigh/workshop.chiefaiofficer.vn/wp-content'
];

$results = [];
$keywords = ['rncp', 'competence', 'competences', 'asic', 'ukrlp', 'degree', 'diploma'];

foreach ($search_roots as $label => $sdir) {
    if (is_dir($sdir)) {
        try {
            $dir_iter = new RecursiveDirectoryIterator($sdir, FilesystemIterator::SKIP_DOTS);
            $iterator = new RecursiveIteratorIterator($dir_iter, RecursiveIteratorIterator::SELF_FIRST);
            
            try {
                $iterator->rewind();
            } catch (Exception $e) {}
            
            while ($iterator->valid()) {
                try {
                    $file = $iterator->current();
                    $name = $file->getFilename();
                    $lower_name = strtolower($name);
                    
                    $matched = false;
                    foreach ($keywords as $kw) {
                        if (strpos($lower_name, $kw) !== false) {
                            $matched = true;
                            break;
                        }
                    }
                    
                    if ($matched && $file->isFile()) {
                        $size = $file->getSize();
                        // Ignore huge files or files in cache
                        if ($size > 1000000 || strpos($file->getPathname(), 'cache') !== false) {
                            $iterator->next();
                            continue;
                        }
                        
                        $rel_path = str_replace('/home/vhvxoigh/', '', $file->getPathname());
                        $results[] = [
                            'site' => $label,
                            'path' => $rel_path,
                            'size' => $size
                        ];
                    }
                } catch (Exception $e) {}
                
                try {
                    $iterator->next();
                } catch (Exception $e) {}
            }
        } catch (Exception $e) {}
    }
}

$json = json_encode($results);
$b64 = base64_encode($json);
echo chunk_split($b64, 76, "\n");
