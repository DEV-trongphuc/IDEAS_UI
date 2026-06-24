<?php
header('Content-Type: text/plain; charset=utf-8');

$root_dir = '/home/vhvxoigh/public_html/';
$files_to_check = ['wp-login.php', 'index.php', 'wp-config.php', 'xmlrpc.php'];

echo "=== Scanning and Cleaning Root Files ===\n";

foreach ($files_to_check as $file) {
    $path = $root_dir . $file;
    if (file_exists($path)) {
        $content = file_get_contents($path);
        echo "File: $file\n";
        
        // Search for the cookie backdoor
        // Regex to match "while(md5(md5($_COOKIE...))){die();}" or similar
        $pattern = '/while\s*\(\s*md5\s*\(\s*md5\s*\(\s*\$_COOKIE\s*\[\s*["\']yrx["\']\s*\.\s*["\']c_uc["\']\s*\.\s*["\']k["\']\s*\]\s*\)\s*\)\s*!=\s*["\']fe987["\']\s*\.\s*["\']88c6cf["\']\s*\.\s*["\']41["\']\s*\.\s*["\']c9f48e53["\']\s*\.\s*["\']cc932["\']\s*\.\s*["\']45["\']\s*\.\s*["\']c23c["\']\s*\)\s*\{\s*die\s*\(\s*\)\s*;\s*\}/';
        
        // Let's also do a simpler match just in case
        $pattern_simple = '/while\s*\(\s*md5\s*\(\s*md5\s*\(\s*\$_COOKIE.*?yrx.*?c_uc.*?k.*?die.*?\}/i';
        
        if (preg_match($pattern_simple, $content, $matches)) {
            echo "  Found backdoor: " . $matches[0] . "\n";
            $clean_content = preg_replace($pattern_simple, '', $content);
            
            // Backup the file first
            if (copy($path, $path . '.bak_backdoor')) {
                echo "  Created backup: {$file}.bak_backdoor\n";
                if (file_put_contents($path, $clean_content)) {
                    echo "  CLEANED successfully!\n";
                } else {
                    echo "  Error: Failed to write cleaned content.\n";
                }
            } else {
                echo "  Error: Failed to create backup. Clean aborted.\n";
            }
        } else {
            echo "  No cookie backdoor found.\n";
        }
        
        // Let's print the first 3 lines of the file to verify
        $lines = explode("\n", $content);
        echo "  First 3 lines:\n";
        for ($i = 0; $i < min(3, count($lines)); $i++) {
            echo "    " . ($i + 1) . ": " . trim($lines[$i]) . "\n";
        }
        echo "\n";
    } else {
        echo "File $file not found.\n\n";
    }
}
