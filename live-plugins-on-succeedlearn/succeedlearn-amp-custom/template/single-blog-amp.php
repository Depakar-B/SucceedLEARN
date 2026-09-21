<!doctype html>
<html amp>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
<title><?php echo esc_html( get_the_title() ); ?></title>
<link rel="canonical" href="<?php echo esc_url( get_permalink() ); ?>">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">


<?php do_action('amp_post_template_head', $this); ?>

<style amp-custom>
body {
    font-family: 'Open Sans', Arial, sans-serif;
    margin: 0;
    background: #f8f9fa;
    color: #333;
    line-height: 1.6;
}
.container {
    max-width: 800px;
    margin: 60px auto 0px auto;
    padding: 16px;
    background: #fff;
}
h1 {
    font-size: 2em;
    margin-top: 0;
    color: #1472ba;
}
.meta {
    color: #666;
    font-size: 0.9em;
    margin-bottom: 20px;
}
.featured-image {
    margin-bottom: 20px;
    border-radius: 10px;
    overflow: hidden;
}
article p {
    margin-bottom: 16px;
}
article h2 {
    color: #1472ba;
    font-size: 1.5em;
    margin-top: 1.5em;
}
article h3 {
    color: #444;
    font-size: 1.2em;
    margin-top: 1.2em;
}
.tags {
    margin-top: 30px;
    padding-top: 20px;
    border-top: 1px solid #ddd;
}
.tags span {
    display: inline-block;
    background: #e6f2ff;
    color: #333;
    font-size: 0.85em;
    padding: 6px 10px;
    border-radius: 4px;
    margin: 0 5px 5px 0;
}
.nav-links {
    display: flex;
    justify-content: space-between;
    margin-top: 40px;
    padding-top: 20px;
    border-top: 1px solid #ddd;
}
.nav-links a {
    text-decoration: none;
    color: #1472ba;
    font-weight: bold;
}
	
	/************************* Header *************************/
  .site-header {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    height: 60px;
    background-color: #ffffff;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 20px;
    z-index: 1000;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
  }

  .site-header amp-img {
    height: 40px;
  }

  .menu-icon {
    font-size: 30px;
    cursor: pointer;
    color: #333;
  }

  amp-sidebar {
    width: 250px;
    background: #ffffff;
    padding: 20px;
  }

  .sidebar-header {
    display: flex;
    justify-content: flex-end;
    font-size: 28px;
    cursor: pointer;
    margin-bottom: 20px;
  }

  amp-sidebar a {
    display: block;
    padding: 12px 10px;
    text-decoration: none;
    color: #333;
    font-size: 16px;
    border-bottom: 1px solid #eee;
    transition: all 0.3s ease;
  }

  amp-sidebar a.active {
    color: #1472ba;
    font-weight: bold;
  }



  /************************Footer************************/
  .site-footer {
    background-color: #f5f7fa;
    padding: 40px 20px 20px;
    color: #333;
  }

  .footer-section {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px 0;
  }

  .two-column-links {
    display: flex;
    gap: 16px;
    flex-wrap: nowrap;
  }

  .column {
    flex: 1;
    min-width: 200px;
  }

  .footer-subtopic {
    font-size: 1.3em;
    color: #222;
    margin-bottom: 12px;
  }

  .footer-links {
    list-style: none;
    padding: 0;
    margin: 0;
  }
.footer-link {
  text-decoration: none;
  color: inherit;
}

  .footer-links li {
    margin: 6px 0;
  }

  .footer-links a {
    text-decoration: none;
    color: #333;
    transition: color 0.3s ease;
  }

  .footer-links a:hover {
    color: #007bff;
  }

  .contact-info {
    list-style: none;
    padding: 0;
    margin: 0;
    color: #555;
  }

  .contact-info li {
    margin: 8px 0;
  }

  .no-style-link {
    color: inherit;
    text-decoration: none;
    cursor: pointer;
  }

  .social-icons {
    display: flex;
    gap: 14px;
    margin-top: 15px;
    justify-content: flex-start;
    padding: 0px 0px 16px 0px;
  }

.social-icons a {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background-color: #e9ecef;
    padding: 6px;
    box-shadow: 0 2px 4px rgba(0,0,0,.08);
}

  .footer-bottom {
    text-align: center;
    font-size: 0.9em;
    color: #ffffff;
    padding: 10px 0px;
    border-top: 1px solid #ccc;
    margin-top: 20px;
    background-color: #1472ba;
  }

  .footer-bottom p {
    color: #ffffff !important;
    margin: 0;
  }

  @media (max-width: 768px) {
    .two-column-links {
      flex-direction: column;
      gap: 20px;
      overflow-x: unset;
      padding-bottom: 0;
    }

    .column {
      flex: 1 1 100%;
      width: 100%;
      min-width: 0;
    }
  }

</style>

</head>
<body>

<?php include( plugin_dir_path(__FILE__) . 'menu.php' ); ?>

<div class="container">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <article>
        <h1><?php the_title(); ?></h1>
        <div class="meta">
            <?php echo get_the_date(); ?> |
            By <?php the_author(); ?> |
            <?php echo get_the_category_list(', '); ?>
        </div>

        <?php if ( has_post_thumbnail() ) :
            $img = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' ); ?>
            <div class="featured-image">
                <amp-img src="<?php echo esc_url( $img[0] ); ?>"
                         width="<?php echo esc_attr( $img[1] ); ?>"
                         height="<?php echo esc_attr( $img[2] ); ?>"
                         layout="responsive">
                </amp-img>
            </div>
        <?php endif; ?>

        <div class="content">
            <?php the_content(); ?>
        </div>

        <div class="tags">
            <?php
            $post_tags = get_the_tags();
            if ( $post_tags ) {
                foreach( $post_tags as $tag ) {
                    echo '<span>' . esc_html( $tag->name ) . '</span>';
                }
            }
            ?>
        </div>

    </article>
<?php endwhile; endif; ?>
</div>

<?php include( plugin_dir_path(__FILE__) . 'footer.php' ); ?>

</body>
</html>
