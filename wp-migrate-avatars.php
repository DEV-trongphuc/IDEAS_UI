<?php
// Bootstrap WordPress
require_once __DIR__ . '/wp-load.php';

if (!is_admin() && php_sapi_name() !== 'cli') {
    // Prevent unauthorized web access, allow CLI or admins
    if (!current_user_can('manage_options')) {
        wp_die('Unauthorized access.');
    }
}

global $wpdb;

$users_to_migrate = array(
    'duongtnt@ideas.edu.vn' => 'https://open.domation.net/sale_data/uploads/avatars/avatar_6a1e83d9b4447.jpg',
    'ngantk@ideas.edu.vn' => 'https://open.domation.net/sale_data/uploads/avatars/avatar_6a1e83deeebac.jpg'
);

echo "--- User Avatar Database Migration ---\n";

foreach ($users_to_migrate as $email => $avatar_url) {
    $user = get_user_by('email', $email);
    if (!$user) {
        echo "Error: User with email '{$email}' not found.\n";
        continue;
    }
    
    $user_id = $user->ID;
    echo "Found user ID {$user_id} for '{$email}'.\n";
    
    // We update multiple common meta keys used by different WordPress avatar plugins:
    
    // 1. wp_user_avatar (used by WP User Avatar / ProfilePress)
    update_user_meta($user_id, 'wp_user_avatar', $avatar_url);
    
    // 2. simple_local_avatar (used by Simple Local Avatars)
    // It stores an array containing the URL and full image size
    $sla_data = array(
        'full' => $avatar_url,
        'media_id' => 0
    );
    update_user_meta($user_id, 'simple_local_avatar', $sla_data);
    
    // 3. basic_user_avatar (used by Basic User Avatars)
    update_user_meta($user_id, 'basic_user_avatar', array('full' => $avatar_url));
    
    // 4. Custom custom_avatar field
    update_user_meta($user_id, 'custom_avatar', $avatar_url);
    
    echo "Successfully updated avatar database metadata for user '{$user->user_login}'!\n";
}

echo "Migration finished.\n";
