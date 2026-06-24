<?php
header('Content-Type: text/plain; charset=utf-8');

$homepage_url = 'https://chiefaiofficer.vn/';
echo "=== Triggering Homepage Request ===\n";
$context = stream_context_create([
    'http' => [
        'header' => "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64)\r\n",
        'timeout' => 15
    ]
]);
$html = file_get_contents($homepage_url, false, $context);
if ($html === false) {
    echo "Failed to load homepage.\n";
} else {
    echo "Homepage loaded successfully (" . strlen($html) . " bytes)\n";
}

$log_path = '/home/vhvxoigh/public_html/error_log';
if (file_exists($log_path)) {
    echo "\n=== Last 30 lines of error_log ===\n";
    $lines = file($log_path);
    $last_lines = array_slice($lines, -30);
    echo implode("", $last_lines);
} else {
    echo "error_log not found\n";
}
