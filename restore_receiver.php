<?php
/**
 * restore_receiver.php
 * Script to safely upload and extract the restored images ZIP on the server.
 * Will be deleted immediately after recovery.
 */

// Simple security check
$secret = 'vhvxoigh_ideas_restore_2026';
if (!isset($_SERVER['HTTP_X_RESTORE_SECRET']) || $_SERVER['HTTP_X_RESTORE_SECRET'] !== $secret) {
    header('HTTP/1.0 403 Forbidden');
    echo json_encode(['success' => false, 'message' => 'Forbidden']);
    exit;
}

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_FILES['zipfile'])) {
        echo json_encode(['success' => false, 'message' => 'Missing zipfile.']);
        exit;
    }
    
    $file = $_FILES['zipfile'];
    if ($file['error'] !== UPLOAD_ERR_OK) {
        echo json_encode(['success' => false, 'message' => 'Upload error code: ' . $file['error']]);
        exit;
    }
    
    $temp_zip = __DIR__ . '/restored_uploads.tmp.zip';
    if (!move_uploaded_file($file['tmp_name'], $temp_zip)) {
        echo json_encode(['success' => false, 'message' => 'Failed to save uploaded ZIP file.']);
        exit;
    }
    
    // Unzip the file
    $zip = new ZipArchive;
    if ($zip->open($temp_zip) === TRUE) {
        // Extract everything directly into the root dir (since the zip contains wp-content/uploads/...)
        $zip->extractTo(__DIR__);
        $zip->close();
        
        // Clean up the temp zip
        @unlink($temp_zip);
        
        echo json_encode([
            'success' => true,
            'message' => 'Upload and extraction completed successfully!'
        ]);
        exit;
    } else {
        @unlink($temp_zip);
        echo json_encode(['success' => false, 'message' => 'Failed to open ZIP archive.']);
        exit;
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Only POST requests allowed.']);
    exit;
}
