<?php
header('Content-Type: text/plain; charset=utf-8');

$repoDir = '/home/vhvxoigh/repositories/ideas_wp_ui';

if (!is_dir($repoDir)) {
    echo "ERROR: Repo directory $repoDir does not exist or is not readable.";
} else {
    echo "=== git log ===\n";
    $output = [];
    exec("git -C " . escapeshellarg($repoDir) . " log -n 5 --oneline 2>&1", $output);
    echo implode("\n", $output) . "\n\n";
    
    echo "=== git status ===\n";
    $output2 = [];
    exec("git -C " . escapeshellarg($repoDir) . " status 2>&1", $output2);
    echo implode("\n", $output2) . "\n\n";
    
    echo "=== File sizes and MD5 hashes ===\n";
    $repoFile = $repoDir . '/wp-content/themes/LANDINGPAGE_MBA/common-assets/js/script.min.js';
    $deployFile = '/home/vhvxoigh/ideas.edu.vn/wp-content/themes/LANDINGPAGE_MBA/common-assets/js/script.min.js';
    
    if (file_exists($repoFile)) {
        echo "Repo File size  : " . filesize($repoFile) . " bytes\n";
        echo "Repo File MD5   : " . md5_file($repoFile) . "\n";
    } else {
        echo "Repo File does not exist at $repoFile\n";
    }
    
    if (file_exists($deployFile)) {
        echo "Deploy File size: " . filesize($deployFile) . " bytes\n";
        echo "Deploy File MD5 : " . md5_file($deployFile) . "\n";
    } else {
        echo "Deploy File does not exist at $deployFile\n";
    }
}
