<?php
header('Content-Type: text/plain; charset=utf-8');

// List all directories in plugins directory
echo "=== Plugins Directory ===\n";
$plugins_dir = '/home/vhvxoigh/public_html/wp-content/plugins/';
if (is_dir($plugins_dir)) {
    $files = scandir($plugins_dir);
    foreach ($files as $file) {
        if ($file !== '.' && $file !== '..') {
            $path = $plugins_dir . $file;
            if (is_dir($path)) {
                echo "[DIR] $file\n";
            } else {
                echo "[FILE] $file\n";
            }
        }
    }
} else {
    echo "Plugins directory not found\n";
}


// Now trigger a request to the courses page internally to get any PHP errors logged
echo "\n=== Triggering /khoa-hoc-online/ Request ===\n";
$courses_url = 'https://chiefaiofficer.vn/khoa-hoc-online/';
$context = stream_context_create([
    'http' => [
        'header' => "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64)\r\n",
        'timeout' => 15
    ]
]);
$html = @file_get_contents($courses_url, false, $context);
if ($html === false) {
    echo "Request failed or returned an error.\n";
} else {
    echo "Courses page loaded internally: " . strlen($html) . " bytes\n";
}

// Print last 40 lines of error log to capture any errors
$log_path = '/home/vhvxoigh/public_html/error_log';
if (file_exists($log_path)) {
    echo "\n=== Last 40 lines of error_log ===\n";
    $lines = file($log_path);
    $last_lines = array_slice($lines, -40);
    echo implode("", $last_lines);
} else {
    echo "error_log not found\n";
}
