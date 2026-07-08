<?php
header('Content-Type: text/plain; charset=utf-8');

$search_dirs = [
    'ideas.edu.vn' => '/home/vhvxoigh/ideas.edu.vn',
    'public_html' => '/home/vhvxoigh/public_html',
    'workshop.chief' => '/home/vhvxoigh/workshop.chiefaiofficer.vn'
];

$results = [];
$keywords = ['icon1', 'icon2', 'icon3', 'icon4', 'ai.webp', 'data_imgs'];

foreach ($search_dirs as $label => $sdir) {
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
                    
                    if ($matched) {
                        $size = $file->isDir() ? 0 : $file->getSize();
                        $rel_path = str_replace('/home/vhvxoigh/', '', $file->getPathname());
                        $results[] = [
                            'site' => $label,
                            'path' => $rel_path,
                            'size' => $size,
                            'is_dir' => $file->isDir()
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
