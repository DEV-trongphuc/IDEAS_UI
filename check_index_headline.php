<?php
$file = __DIR__ . '/wp-content/new_public/LANDINGPAGE_MBA/index.html';
if (file_exists($file)) {
    $content = file_get_contents($file);
    if (preg_match('/<h1 class="hero-headline"[\s\S]*?<\/h1>/', $content, $matches)) {
        echo htmlspecialchars($matches[0]);
    } else {
        echo "Headline not found";
    }
} else {
    echo "File not found";
}
