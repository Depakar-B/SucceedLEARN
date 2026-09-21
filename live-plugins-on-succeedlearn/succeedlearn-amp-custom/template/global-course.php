<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

global $post;
?>

<!doctype html>
<html ⚡>
<head>
  <meta charset="utf-8">
  <title><?php echo esc_html( get_the_title( $post ) ); ?> | SucceedLEARN</title>

  <link rel="canonical" href="<?php echo esc_url( get_permalink( $post ) ); ?>">
  <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">

  <!-- AMP Core -->
  <script async src="https://cdn.ampproject.org/v0.js"></script>

  <!-- AMP Components -->
  <script async custom-element="amp-sidebar" src="https://cdn.ampproject.org/v0/amp-sidebar-0.1.js"></script>

  <!-- AMPforWP Head Hooks -->
  <?php do_action( 'amp_post_template_head', $this ); ?>

  <!-- Custom AMP CSS -->
  <style amp-custom>
    <?php include plugin_dir_path(__FILE__) . 'style.php'; ?>
  </style>

  <!-- Schema -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "WebPage",
    "url": "<?php echo esc_url( get_permalink( $post ) ); ?>"
  }
  </script>

</head>

<body>

<!-- ✅ AMP Sidebar / Menu -->
<?php include plugin_dir_path(__FILE__) . 'menu.php'; ?>

<!-- ✅ Page Content -->
<main class="amp-page-wrapper">
	<!-- Banner section -->
 <section class="banner" aria-label="s-phishreport banner">
 </section>
	
  <section class="amp-page-content">
    <div class="container">
      <?php
      setup_postdata( $post );
      the_content();
      wp_reset_postdata();
      ?>
    </div>
  </section>
</main>

<!-- ✅ Footer -->
<?php include plugin_dir_path(__FILE__) . 'footer.php'; ?>

</body>
</html>
