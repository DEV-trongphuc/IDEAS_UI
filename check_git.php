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
    
    echo "=== git diff script.min.js ===\n";
    $output3 = [];
    exec("git -C " . escapeshellarg($repoDir) . " diff HEAD~1 HEAD -- wp-content/themes/LANDINGPAGE_MBA/common-assets/js/script.min.js 2>&1", $output3);
    echo implode("\n", $output3) . "\n\n";
}
