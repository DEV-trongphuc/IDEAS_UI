<?php
header('Content-Type: text/plain; charset=utf-8');

$logDir = '/home/vhvxoigh/.cpanel/logs/';

if (!is_dir($logDir)) {
    echo "ERROR: Log directory $logDir does not exist or is not readable.";
} else {
    $files = glob($logDir . 'vc_*.log');
    if (empty($files)) {
        echo "No log files found in $logDir";
    } else {
        // Sort files by modification time descending
        usort($files, function($a, $b) {
            return filemtime($b) - filemtime($a);
        });
        
        echo "Found " . count($files) . " log files. Showing latest:\n\n";
        foreach (array_slice($files, 0, 3) as $f) {
            echo "--- LOG FILE: " . basename($f) . " (" . date('Y-m-d H:i:s', filemtime($f)) . ") ---\n";
            echo file_get_contents($f);
            echo "\n\n";
        }
    }
}
