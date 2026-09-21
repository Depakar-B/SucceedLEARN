<?php
/**
 * SucceedLEARN AMP single post (blog / newsletter).
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$amp_ctx = ( isset( $this ) && is_object( $this ) ) ? $this : null;

$post_obj = get_queried_object();
if ( $post_obj instanceof WP_Post ) {
	setup_postdata( $post_obj );
} elseif ( have_posts() ) {
	the_post();
	$post_obj = get_post();
}

$post_id = $post_obj instanceof WP_Post ? (int) $post_obj->ID : (int) get_the_ID();
$is_newsletter = function_exists( 'akaza_is_newsletter_post' ) && akaza_is_newsletter_post( $post_id );
$canonical     = get_permalink( $post_id );
$title         = get_the_title( $post_id );
$date          = get_the_date( '', $post_id );
$read_time     = function_exists( 'akaza_blog_read_time' ) ? akaza_blog_read_time( $post_id ) : '';
$thumb         = get_the_post_thumbnail_url( $post_id, 'large' );
$excerpt_meta  = wp_strip_all_tags( get_the_excerpt( $post_id ) );
if ( strlen( $excerpt_meta ) > 160 ) {
	$excerpt_meta = wp_trim_words( $excerpt_meta, 24, '…' );
}

$home_url = function_exists( 'succeedlearn_amp_url' ) ? succeedlearn_amp_url( home_url( '/' ) ) : home_url( '/' );
$blog_url = home_url( '/blog/' );
if ( class_exists( '\\SucceedLEARN\\AMP\\Plugin' ) ) {
	$plugin = \SucceedLEARN\AMP\Plugin::get_instance();
	if ( $plugin && method_exists( $plugin, 'get_config' ) ) {
		$config = $plugin->get_config();
		if ( $config && method_exists( $config, 'get_blog_url' ) ) {
			$blog_url = $config->get_blog_url();
		}
	}
}
$blog_amp = function_exists( 'succeedlearn_amp_url' ) ? succeedlearn_amp_url( $blog_url ) : $blog_url;
$news_url = home_url( '/newsletter/' );
if ( class_exists( '\\SucceedLEARN\\AMP\\Plugin' ) ) {
	$plugin = \SucceedLEARN\AMP\Plugin::get_instance();
	if ( $plugin && method_exists( $plugin, 'get_config' ) ) {
		$config = $plugin->get_config();
		if ( $config && method_exists( $config, 'get_newsletter_url' ) ) {
			$news_url = $config->get_newsletter_url();
		}
	}
}
if ( function_exists( 'akaza_newsletter_listing_url' ) && home_url( '/newsletter/' ) === $news_url ) {
	$news_url = akaza_newsletter_listing_url();
}
$news_amp = function_exists( 'succeedlearn_amp_url' ) ? succeedlearn_amp_url( $news_url ) : $news_url;
$contact  = function_exists( 'succeedlearn_amp_url' ) ? succeedlearn_amp_url( home_url( '/contact-us/' ) ) : home_url( '/contact-us/' );

$terms         = get_the_category( $post_id );
$eyebrow       = '';
$primary_term  = null;
$newsletter_id = function_exists( 'akaza_newsletter_category_id' ) ? akaza_newsletter_category_id() : 0;
if ( $is_newsletter ) {
	$eyebrow = __( 'Newsletter', 'succeedlearn-amp' );
} elseif ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
	foreach ( $terms as $term ) {
		if ( $newsletter_id && (int) $term->term_id === $newsletter_id ) {
			continue;
		}
		$primary_term = $term;
		$eyebrow      = $term->name;
		break;
	}
}

$category_amp = '';
if ( $primary_term instanceof WP_Term ) {
	$category_link = get_category_link( $primary_term );
	$category_amp  = function_exists( 'succeedlearn_amp_url' ) ? succeedlearn_amp_url( $category_link ) : $category_link;
}

$show_toc  = function_exists( 'akaza_post_has_toc' ) && akaza_post_has_toc( $post_id );
$toc_items = $show_toc && function_exists( 'akaza_get_post_toc_items' ) ? akaza_get_post_toc_items( $post_id ) : array();
$related   = function_exists( 'akaza_get_related_posts' ) ? akaza_get_related_posts( $post_id, 4 ) : array();
if ( $show_toc && ! empty( $related ) ) {
	$toc_items[] = array(
		'id'    => 'slf-related-heading',
		'title' => $is_newsletter
			? __( 'More newsletters', 'succeedlearn-amp' )
			: __( 'Related articles', 'succeedlearn-amp' ),
	);
}

$tags    = get_the_tags( $post_id );
$content = apply_filters( 'the_content', get_post_field( 'post_content', $post_id ) );
if ( $show_toc && function_exists( 'akaza_inject_toc_heading_ids_for_post' ) ) {
	$content = akaza_inject_toc_heading_ids_for_post( $content, $post_id );
}
?>
<!doctype html>
<html amp lang="<?php echo esc_attr( get_bloginfo( 'language' ) ); ?>">
<head>
	<meta charset="utf-8" />
	<script async src="https://cdn.ampproject.org/v0.js"></script>
	<link rel="canonical" href="<?php echo esc_url( $canonical ); ?>" />
	<meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1" />
	<meta name="description" content="<?php echo esc_attr( $excerpt_meta ); ?>" />
	<link rel="shortcut icon" href="<?php echo esc_url( function_exists( 'succeedlearn_amp_get_favicon_url' ) ? succeedlearn_amp_get_favicon_url() : home_url( '/favicon.ico' ) ); ?>" />
	<title><?php echo esc_html( $title . ' | SucceedLEARN' ); ?></title>
	<link rel="preconnect" href="https://cdn.ampproject.org" />
	<link rel="dns-prefetch" href="https://cdn.ampproject.org" />
	<style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style>
	<noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>
	<?php
	if ( $amp_ctx ) {
		do_action( 'amp_post_template_head', $amp_ctx );
	}
	?>
	<style amp-custom>
	<?php
	if ( function_exists( 'succeedlearn_amp_output_page_styles' ) ) {
		succeedlearn_amp_output_page_styles( 'single_post', array( 'home-page' ), array( 'blog', 'single-post' ) );
	}
	?>
	</style>
	<?php
	if ( function_exists( 'succeedlearn_amp_output_components' ) ) {
		succeedlearn_amp_output_components( 'single_post', array( 'amp-sidebar', 'amp-accordion' ) );
	}
	?>
</head>
<body class="sl-home sl-post-page<?php echo $is_newsletter ? ' sl-post-page--newsletter' : ''; ?>">
<?php
$menu = SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'components/menu.php';
if ( is_readable( $menu ) ) {
	include $menu;
}
?>

<main id="main-content" class="sl-post">
	<div class="sl-wrap sl-post__wrap">
		<nav class="sl-post__crumbs" aria-label="<?php esc_attr_e( 'Breadcrumb', 'succeedlearn-amp' ); ?>">
			<a href="<?php echo esc_url( $home_url ); ?>"><?php esc_html_e( 'Home', 'succeedlearn-amp' ); ?></a>
			<span aria-hidden="true"> / </span>
			<?php if ( $is_newsletter ) : ?>
				<a href="<?php echo esc_url( $news_amp ); ?>"><?php esc_html_e( 'Newsletter', 'succeedlearn-amp' ); ?></a>
			<?php else : ?>
				<a href="<?php echo esc_url( $blog_amp ); ?>"><?php esc_html_e( 'Blog', 'succeedlearn-amp' ); ?></a>
				<?php if ( $primary_term instanceof WP_Term && $category_amp ) : ?>
					<span aria-hidden="true"> / </span>
					<a href="<?php echo esc_url( $category_amp ); ?>"><?php echo esc_html( $primary_term->name ); ?></a>
				<?php endif; ?>
			<?php endif; ?>
			<span aria-hidden="true"> / </span>
			<span><?php echo esc_html( $title ); ?></span>
		</nav>

		<header class="sl-post__hero">
			<?php if ( $eyebrow ) : ?>
				<p class="sl-post__cat"><?php echo esc_html( $eyebrow ); ?></p>
			<?php endif; ?>
			<h1><?php echo esc_html( $title ); ?></h1>
			<p class="sl-post__meta">
				<time><?php echo esc_html( $date ); ?></time>
				<?php if ( $read_time ) : ?>
					<span><?php echo esc_html( $read_time ); ?></span>
				<?php endif; ?>
			</p>
			<?php if ( $thumb ) : ?>
				<figure class="sl-post__media">
					<amp-img src="<?php echo esc_url( $thumb ); ?>" width="1200" height="675" layout="responsive" alt="<?php echo esc_attr( $title ); ?>"></amp-img>
				</figure>
			<?php endif; ?>
		</header>

		<?php if ( $show_toc && ! empty( $toc_items ) ) : ?>
			<nav class="sl-post__toc" aria-labelledby="sl-post-toc-title">
				<h2 id="sl-post-toc-title" class="sl-post__toc-title"><?php esc_html_e( 'On this page', 'succeedlearn-amp' ); ?></h2>
				<ol class="sl-post__toc-list">
					<?php foreach ( $toc_items as $item ) : ?>
						<li>
							<button
								type="button"
								class="sl-post__toc-link"
								<?php echo succeedlearn_amp_scroll_tap_attr( $item['id'] ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
							><?php echo esc_html( $item['title'] ); ?></button>
						</li>
					<?php endforeach; ?>
				</ol>
			</nav>
		<?php endif; ?>

		<article class="sl-post__body">
			<?php echo $content; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
		</article>

		<?php if ( ! empty( $tags ) && ! is_wp_error( $tags ) ) : ?>
			<ul class="sl-post__tags">
				<?php foreach ( $tags as $tag ) : ?>
					<li><?php echo esc_html( $tag->name ); ?></li>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>

		<?php if ( $is_newsletter ) : ?>
			<section class="sl-blog__cta sl-post__cta">
				<h2><?php esc_html_e( 'Want these updates in your inbox?', 'succeedlearn-amp' ); ?></h2>
				<p><?php esc_html_e( 'Talk to our team to subscribe to the SucceedLEARN newsletter for your organisation.', 'succeedlearn-amp' ); ?></p>
				<a class="sl-btn sl-btn--primary" href="<?php echo esc_url( $contact ); ?>"><?php esc_html_e( 'Subscribe', 'succeedlearn-amp' ); ?></a>
			</section>
		<?php endif; ?>

		<?php if ( ! empty( $related ) ) : ?>
			<section class="sl-post__related" aria-labelledby="slf-related-heading">
				<h2 id="slf-related-heading"><?php echo $is_newsletter ? esc_html__( 'More newsletters', 'succeedlearn-amp' ) : esc_html__( 'Related articles', 'succeedlearn-amp' ); ?></h2>
				<div class="sl-blog__grid sl-post__related-grid">
					<?php foreach ( $related as $card ) : ?>
						<article class="sl-blog-card">
							<a class="sl-blog-card__thumb" href="<?php echo esc_url( function_exists( 'succeedlearn_amp_url' ) ? succeedlearn_amp_url( $card['url'] ) : $card['url'] ); ?>" tabindex="-1" aria-hidden="true">
								<?php if ( ! empty( $card['thumbnail'] ) ) : ?>
									<amp-img src="<?php echo esc_url( $card['thumbnail'] ); ?>" width="640" height="400" layout="responsive" alt=""></amp-img>
								<?php else : ?>
									<span class="sl-blog-card__ph"></span>
								<?php endif; ?>
							</a>
							<div class="sl-blog-card__body">
								<?php if ( ! empty( $card['primary_category']['name'] ) ) : ?>
									<span class="sl-blog-card__cat"><?php echo esc_html( $card['primary_category']['name'] ); ?></span>
								<?php endif; ?>
								<h3 class="sl-blog-card__title">
									<a href="<?php echo esc_url( function_exists( 'succeedlearn_amp_url' ) ? succeedlearn_amp_url( $card['url'] ) : $card['url'] ); ?>"><?php echo esc_html( $card['title'] ); ?></a>
								</h3>
								<?php if ( ! empty( $card['date'] ) ) : ?>
									<p class="sl-blog-card__meta"><?php echo esc_html( $card['date'] ); ?></p>
								<?php endif; ?>
								<a class="sl-blog-card__more" href="<?php echo esc_url( function_exists( 'succeedlearn_amp_url' ) ? succeedlearn_amp_url( $card['url'] ) : $card['url'] ); ?>"><?php esc_html_e( 'Read More', 'succeedlearn-amp' ); ?> →</a>
							</div>
						</article>
					<?php endforeach; ?>
				</div>
			</section>
		<?php endif; ?>
	</div>
</main>

<?php
$footer = SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'components/footer.php';
if ( is_readable( $footer ) ) {
	include $footer;
}
if ( $amp_ctx ) {
	do_action( 'amp_post_template_footer', $amp_ctx );
}
?>
</body>
</html>
