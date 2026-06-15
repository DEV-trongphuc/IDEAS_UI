<!DOCTYPE html>
<html <?php language_attributes(); ?> <?php blankslate_schema_type(); ?>>
<head>
  <!-- Google Tag Manager / Global Site Tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-QKV7LKNLLH"></script>
  <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', 'G-QKV7LKNLLH');
      gtag('config', 'AW-11205917800');
  </script>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width">
  <!-- Preconnect to external domains for faster resource loading -->
  <link rel="preconnect" href="https://www.googletagmanager.com">
  <link rel="dns-prefetch" href="https://www.googletagmanager.com">
  
  
  <link rel="preconnect" href="https://www.google-analytics.com">
  <link rel="dns-prefetch" href="https://www.google-analytics.com">
  <?php if (!defined('WPSEO_VERSION') && !class_exists('RankMath') && !class_exists('AIOSEO_Base')): ?>
      <title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>
  <?php endif; ?>

  <!-- Load JS sớm nhất -->
  <script src="/wp-content/new_public/LANDINGPAGE_MBA/variable.js?v=1781488556"></script>
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>