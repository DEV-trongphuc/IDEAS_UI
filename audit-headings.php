<?php
/**
 * H-Tag Heading Fixer Utility for WordPress
 * Audits and fixes Heading Tag hierarchy in post contents.
 * Preserves all attributes, styling, and inner HTML tags.
 */

require_once('wp-load.php');

// Security check: Only allow CLI execution or admin users
$is_cli = (php_sapi_name() === 'cli');
if (!$is_cli && !current_user_can('manage_options')) {
    wp_die('Unauthorized access.');
}

// Determine mode
if ($is_cli) {
    global $argv;
    $dry_run = true;
    if (isset($argv[1]) && $argv[1] === '0') {
        $dry_run = false;
    }
} else {
    $dry_run = isset($_GET['dry_run']) ? $_GET['dry_run'] !== '0' : true;
}

class HeadingFixer {
    private $prev_level = 1; // Assume title is H1
    public $modified = false;
    public $headings = [];

    public function fix($content) {
        $this->prev_level = 1;
        $this->modified = false;
        $this->headings = [];

        // Match h1-h6 tags with UTF-8 support
        $pattern = '/<(h[1-6])(\s[^>]*)?>(.*?)<\/\1>/isu';
        return preg_replace_callback($pattern, [$this, 'callback'], $content);
    }

    private function callback($matches) {
        $full_tag = $matches[0];
        $tag_name = strtolower($matches[1]);
        $attrs = isset($matches[2]) ? $matches[2] : '';
        $inner_html = $matches[3];

        $curr_level = (int)substr($tag_name, 1);
        $text = trim(strip_tags($inner_html));

        // Note: We do NOT remove empty headings to comply with the constraint of zero content modification.
        // Even empty headings might be used for spacing or visual layout.

        $new_level = $curr_level;

        // 1. Demote H1 to H2
        if ($curr_level === 1) {
            $new_level = 2;
        }

        // 2. Prevent skipped levels (e.g. H2 -> H4 becomes H2 -> H3)
        if ($new_level - $this->prev_level > 1) {
            $new_level = $this->prev_level + 1;
        }

        if ($new_level !== $curr_level) {
            $this->modified = true;
            $new_tag = 'h' . $new_level;
            $this->prev_level = $new_level;
            $this->headings[] = "H" . $curr_level . "->H" . $new_level . ": " . esc_html($text);
            return "<{$new_tag}{$attrs}>{$inner_html}</{$new_tag}>";
        }

        $this->prev_level = $curr_level;
        $this->headings[] = "H" . $curr_level . ": " . esc_html($text);
        return $full_tag;
    }
}

// Get posts
$posts = get_posts(array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'numberposts' => -1
));

if ($is_cli) {
    echo "=== H-TAG HEADING FIXER (" . ($dry_run ? "DRY RUN - PREVIEW" : "LIVE RUN - WRITING TO DATABASE") . ") ===\n";
} else {
    echo "<h2>=== H-TAG HEADING FIXER (" . ($dry_run ? "DRY RUN - PREVIEW" : "LIVE RUN - WRITING TO DATABASE") . ") ===</h2>";
    echo "<p>To run in live mode, append <code>?dry_run=0</code> to the URL.</p><hr/>";
}

$fixer = new HeadingFixer();
$total_scanned = 0;
$total_modified = 0;

foreach ($posts as $post) {
    $total_scanned++;
    $content = $post->post_content;
    if (empty($content)) continue;

    $fixed_content = $fixer->fix($content);

    if ($fixer->modified) {
        $total_modified++;
        $title = $post->post_title;
        $url = get_permalink($post->ID);
        
        if ($is_cli) {
            echo "POST: {$title} (ID: {$post->ID})\n";
            echo "  Path: {$url}\n";
            echo "  Changes:\n";
            foreach ($fixer->headings as $change) {
                if (strpos($change, '->') !== false) {
                    echo "    * [MODIFIED] " . html_entity_decode($change, ENT_QUOTES, 'UTF-8') . "\n";
                }
            }
            echo "\n";
        } else {
            echo "<strong>POST:</strong> <a href='{$url}' target='_blank'>{$title}</a> (ID: {$post->ID})<br/>";
            echo "<strong>Changes:</strong><br/>";
            echo "<ul>";
            foreach ($fixer->headings as $change) {
                if (strpos($change, '->') !== false) {
                    echo "<li style='color: #ab0e00;'><strong>[MODIFIED]</strong> {$change}</li>";
                }
            }
            echo "</ul>";
        }

        if (!$dry_run) {
            wp_update_post(array(
                'ID'           => $post->ID,
                'post_content' => $fixed_content
            ));
            if ($is_cli) {
                echo "  -> DATABASE UPDATED!\n\n";
            } else {
                echo "<span style='color: green;'><strong>-> DATABASE UPDATED!</strong></span><br/><br/>";
            }
        }
        if (!$is_cli) {
            echo "<hr/>";
        }
    }
}

if ($is_cli) {
    echo "SUMMARY: Scanned {$total_scanned} posts. Found {$total_modified} posts with heading structure issues.\n";
} else {
    echo "<h3>SUMMARY: Scanned {$total_scanned} posts. Found {$total_modified} posts with heading structure issues.</h3>";
}
