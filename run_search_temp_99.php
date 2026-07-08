<?php
header('Content-Type: text/plain; charset=utf-8');

$search_roots = [
    'ideas.edu.vn' => '/home/vhvxoigh/ideas.edu.vn',
    'public_html' => '/home/vhvxoigh/public_html',
    'workshop.chief' => '/home/vhvxoigh/workshop.chiefaiofficer.vn',
    'cpanel_home' => '/home/vhvxoigh'
];

$results = [];

foreach ($search_roots as $label => $sdir) {
    if (is_dir($sdir)) {
        try {
            // Only scan shallow directories in cpanel_home to avoid infinite recursion or heavy load,
            // but run a full search in the site dirs.
            $max_depth = ($label === 'cpanel_home') ? 2 : 8;
            
            $dir_iter = new RecursiveDirectoryIterator($sdir, FilesystemIterator::SKIP_DOTS);
            $iterator = new RecursiveIteratorIterator($dir_iter, RecursiveIteratorIterator::SELF_FIRST);
            $iterator->setMaxDepth($max_depth);
            
            try {
                $iterator->rewind();
            } catch (Exception $e) {}
            
            while ($iterator->valid()) {
                try {
                    $file = $iterator->current();
                    $name = $file->getFilename();
                    $lower_name = strtolower($name);
                    
                    if ($lower_name === 'program.js' || $lower_name === 'data_imgs') {
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
