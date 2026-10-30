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

    <!-- Event snippet for Lượt đăng ký conversion page -->
    <script>
    function gtag_report_conversion(url) {
      var callback = function () {
        if (typeof(url) != 'undefined') {
          window.location = url;
        }
      };
      if (typeof gtag === 'function') {
        gtag('event', 'conversion', {
            'send_to': 'AW-11205917800/zF6BCIGMya0dEOj4st8p',
            'value': 1.0,
            'currency': 'VND',
            'event_callback': callback
        });
      } else if (typeof window.gtag === 'function') {
        window.gtag('event', 'conversion', {
            'send_to': 'AW-11205917800/zF6BCIGMya0dEOj4st8p',
            'value': 1.0,
            'currency': 'VND',
            'event_callback': callback
        });
      } else {
        callback();
      }
      return false;
    }
    </script>


    <!-- Facebook Pixel Code -->
    <script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window,document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '661260709828887'); 
    fbq('track', 'PageView');
    </script>
    <noscript>
        <img height="1" width="1" style="display:none" 
             src="https://www.facebook.com/tr?id=661260709828887&ev=PageView&noscript=1"/>
    </noscript>
    <!-- End Facebook Pixel Code -->

  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width">
  <!-- Preconnect to external domains for faster resource loading -->
  <link rel="preconnect" href="https://automation.ideas.edu.vn">
  <link rel="dns-prefetch" href="https://automation.ideas.edu.vn">
  <link rel="preconnect" href="https://www.googletagmanager.com">
  <link rel="dns-prefetch" href="https://www.googletagmanager.com">
  <link rel="preconnect" href="https://www.google-analytics.com">
  <link rel="dns-prefetch" href="https://www.google-analytics.com">
  <?php if (!defined('WPSEO_VERSION') && !class_exists('RankMath') && !class_exists('AIOSEO_Base')): ?>
      <title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>
  <?php endif; ?>

  <!-- Load JS sớm nhất -->
  <script src="/wp-content/new_public/LANDINGPAGE_MBA/variable.js?v=1793363004"></script>
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>