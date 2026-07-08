<?php
header('Content-Type: text/plain; charset=utf-8');

$log_file = '/home/vhvxoigh/.cpanel/logs/vc_1783500296.9473_git_deploy.log';
if (file_exists($log_file)) {
    $content = file_get_contents($log_file);
    echo chunk_split(base64_encode($content), 76, "\n");
} else {
    // glob in the directory to find the latest log
    $logs = glob('/home/vhvxoigh/.cpanel/logs/vc_*_git_deploy.log');
    if (!empty($logs)) {
        // sort by mtime desc
        usort($logs, function($a, $b) {
            return filemtime($b) - filemtime($a);
        });
        $latest = $logs[0];
        echo "LATEST_LOG: " . basename($latest) . "\n";
        $content = file_get_contents($latest);
        echo chunk_split(base64_encode($content), 76, "\n");
    } else {
        echo "No deploy log found.";
    }
}
