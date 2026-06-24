<?php
header('Content-Type: text/plain; charset=utf-8');

$backup_file = '/home/vhvxoigh/public_html/index.php.bak_hacked_20260624_131626';

if (!file_exists($backup_file)) {
    // Find any backup file starting with index.php.bak_hacked_
    $files = scandir('/home/vhvxoigh/public_html');
    foreach ($files as $file) {
        if (strpos($file, 'index.php.bak_hacked_') === 0) {
            $backup_file = '/home/vhvxoigh/public_html/' . $file;
            break;
        }
    }
}

if (!file_exists($backup_file)) {
    die("Hacked backup file not found.\n");
}

echo "Reading backup file: $backup_file\n";
$content = file_get_contents($backup_file);

// Extract everything from class BroadcastProvider6dc3 to the end of DTOMapper566bd class
// We can use a regex to match the classes
if (preg_match('/(abstract class BroadcastProvider6dc3[\s\S]+?class DTOMapper566bd[\s\S]+?\n\})/i', $content, $class_matches)) {
    $classes_code = $class_matches[1];
    echo "Found malware classes code (length: " . strlen($classes_code) . " characters).\n";
    
    // Evaluate the classes code so we can run them
    eval($classes_code);
    echo "Classes loaded successfully.\n";
    
    // Now run the decryption static method and print the result
    if (class_exists('DTOMapper566bd')) {
        echo "Decrypting payload...\n";
        $decrypted = DTOMapper566bd::stop04a4c();
        echo "\n=== DECRYPTED MALWARE PAYLOAD ===\n";
        echo "====================================\n";
        echo $decrypted;
        echo "\n====================================\n";
    } else {
         echo "Error: DTOMapper566bd class not loaded.\n";
    }
} else {
    echo "Could not extract malware classes code using regex.\n";
}
