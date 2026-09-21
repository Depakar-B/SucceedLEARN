<!doctype html>

<head>
  <meta charset="utf-8">
  <title>Blogs | SucceedLEARN</title>
  <link rel="canonical" href="self.html">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">

  <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">

  <!-- AMP Scripts -->
  <script async src="https://cdn.ampproject.org/v0.js"></script>
  <script async custom-element="amp-sidebar" src="https://cdn.ampproject.org/v0/amp-sidebar-0.1.js"></script>

  <?php do_action('amp_post_template_head', $this); ?>
  <style amp-custom>
    <?php
    include('style.php');
    ?>
  </style>

  <!-- ✅ Schema Markup -->
  <script type="application/ld+json">
    {
      "@context": "http://schema.org",
      "@type": "Website",
      "name": "SucceedLEARN",
      "url": "https://succeedlearn.com",
      "potentialAction": {
        "@type": "SearchAction",
        "target": "https://succeedlearn.com/?s={search_term_string}",
        "query-input": "required name=search_term_string"
      }
    }
  </script>
  
</head>
<body>

<!-- ✅ AMP Sidebar/Menu -->
<?php include(plugin_dir_path(__FILE__) . 'menu.php'); ?>



  <!-- ✅ Footer -->
  <?php include(plugin_dir_path(__FILE__) . 'footer.php'); ?>

</body>

</html>