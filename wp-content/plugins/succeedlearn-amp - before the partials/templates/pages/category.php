<?php
/**
 * SucceedLEARN AMP Category archive.
 *
 * Mirrors the theme category.php layout: category hero, search/sort,
 * posts in this category only (no topic pills).
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$amp_ctx = ( isset( $this ) && is_object( $this ) ) ? $this : null;

$term = get_queried_object();
if ( ! ( $term instanceof WP_Term ) ) {
	$cat_slug = get_query_var( 'category_name' );
	if ( $cat_slug ) {
		$maybe = get_category_by_slug( $cat_slug );
		if ( $maybe && ! is_wp_error( $maybe ) ) {
			$term = $maybe;
		}
	}
}

if ( $term instanceof WP_Term && function_exists( 'akaza_is_newsletter_term' ) && akaza_is_newsletter_term( $term ) ) {
	$newsletter_url = function_exists( 'akaza_newsletter_listing_url' )
		? akaza_newsletter_listing_url()
		: home_url( '/newsletter/' );
	if ( class_exists( '\\SucceedLEARN\\AMP\\Plugin' ) ) {
		$plugin = \SucceedLEARN\AMP\Plugin::get_instance();
		if ( $plugin && method_exists( $plugin, 'get_config' ) ) {
			$config = $plugin->get_config();
			if ( $config && method_exists( $config, 'get_newsletter_url' ) ) {
				$newsletter_url = $config->get_newsletter_url();
			}
		}
	}
	$newsletter_url = function_exists( 'succeedlearn_amp_url' )
		? succeedlearn_amp_url( $newsletter_url )
		: $newsletter_url;
	wp_safe_redirect( $newsletter_url, 301 );
	exit;
}

if ( ! ( $term instanceof WP_Term ) ) {
	wp_safe_redirect( home_url( '/blog/' ), 302 );
	exit;
}

$canonical = get_category_link( $term );
$blog_url  = home_url( '/blog/' );
if ( class_exists( '\\SucceedLEARN\\AMP\\Plugin' ) ) {
	$plugin = \SucceedLEARN\AMP\Plugin::get_instance();
	if ( $plugin && method_exists( $plugin, 'get_config' ) ) {
		$config = $plugin->get_config();
		if ( $config && method_exists( $config, 'get_blog_url' ) ) {
			$blog_url = $config->get_blog_url();
		}
	}
}

$blog_amp_url = function_exists( 'succeedlearn_amp_url' )
	? succeedlearn_amp_url( $blog_url )
	: $blog_url;
$contact_url  = function_exists( 'succeedlearn_amp_url' )
	? succeedlearn_amp_url( home_url( '/contact-us/' ) )
	: home_url( '/contact-us/' );
$home_url     = function_exists( 'succeedlearn_amp_url' )
	? succeedlearn_amp_url( home_url( '/' ) )
	: home_url( '/' );

$title       = $term->name;
$subtitle    = function_exists( 'akaza_get_category_subtitle' ) ? akaza_get_category_subtitle( $term->term_id ) : '';
$description = term_description( $term->term_id, 'category' );
$lead_text   = $description ? wp_strip_all_tags( $description ) : '';

$meta_desc = $lead_text ? $lead_text : ( $subtitle ? $subtitle : sprintf(
	/* translators: %s: category name */
	__( 'Articles in %s from SucceedLEARN.', 'succeedlearn-amp' ),
	$title
) );
$meta_desc = wp_trim_words( $meta_desc, 40, '…' );

$query_args = array(
	'post_type'           => 'post',
	'post_status'         => 'publish',
	'posts_per_page'      => 60,
	'ignore_sticky_posts' => true,
	'no_found_rows'       => true,
	'orderby'             => 'date',
	'order'               => 'DESC',
	'cat'                 => (int) $term->term_id,
);

$query_posts = get_posts( $query_args );

$cards = array();
foreach ( $query_posts as $query_post ) {
	if ( ! $query_post instanceof WP_Post ) {
		continue;
	}

	if ( function_exists( 'akaza_is_newsletter_post' ) && akaza_is_newsletter_post( $query_post->ID ) ) {
		continue;
	}

	$thumb     = get_the_post_thumbnail_url( $query_post->ID, 'medium_large' );
	$terms     = get_the_category( $query_post->ID );
	$primary   = $title;
	$cat_names = array( $term->slug => $term->name );

	if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
		foreach ( $terms as $post_term ) {
			if ( ! $post_term instanceof WP_Term ) {
				continue;
			}
			if ( function_exists( 'akaza_is_newsletter_term' ) && akaza_is_newsletter_term( $post_term ) ) {
				continue;
			}
			if ( in_array( $post_term->slug, array( 'newsletter', 'newsletters' ), true ) ) {
				continue;
			}
			$cat_names[ $post_term->slug ] = $post_term->name;
			if ( (int) $post_term->term_id === (int) $term->term_id ) {
				$primary = $post_term->name;
			}
		}
	}

	$excerpt_src = $query_post->post_excerpt ? $query_post->post_excerpt : $query_post->post_content;
	$permalink   = get_permalink( $query_post );
	$card_title  = get_the_title( $query_post );
	$excerpt     = wp_trim_words( wp_strip_all_tags( (string) $excerpt_src ), 22, '…' );
	$search_hay  = strtolower( wp_strip_all_tags( $card_title . ' ' . $excerpt ) );
	$search_hay  = preg_replace( '/[^a-z0-9\s]+/', ' ', $search_hay );
	$search_hay  = trim( preg_replace( '/\s+/', ' ', (string) $search_hay ) );

	$cards[] = array(
		'id'        => (int) $query_post->ID,
		'title'     => $card_title,
		'excerpt'   => $excerpt,
		'thumbnail' => $thumb ? $thumb : '',
		'url'       => function_exists( 'succeedlearn_amp_url' ) ? succeedlearn_amp_url( $permalink ) : $permalink,
		'date'      => get_the_date( '', $query_post ),
		'ts'        => (int) get_post_timestamp( $query_post ),
		'category'  => $primary,
		'search'    => $search_hay,
	);
}

$by_newest = $cards;
$by_oldest = $cards;
$by_az     = $cards;
$by_za     = $cards;
usort(
	$by_oldest,
	static function ( $a, $b ) {
		return $a['ts'] <=> $b['ts'];
	}
);
usort(
	$by_az,
	static function ( $a, $b ) {
		return strcasecmp( (string) $a['title'], (string) $b['title'] );
	}
);
usort(
	$by_za,
	static function ( $a, $b ) {
		return strcasecmp( (string) $b['title'], (string) $a['title'] );
	}
);

$rank = static function ( $list ) {
	$out = array();
	foreach ( array_values( $list ) as $i => $item ) {
		$out[ $item['id'] ] = $i + 1;
	}
	return $out;
};

$rank_newest = $rank( $by_newest );
$rank_oldest = $rank( $by_oldest );
$rank_az     = $rank( $by_az );
$rank_za     = $rank( $by_za );

foreach ( $cards as &$card ) {
	$id              = $card['id'];
	$card['ord_new'] = isset( $rank_newest[ $id ] ) ? (int) $rank_newest[ $id ] : 99;
	$card['ord_old'] = isset( $rank_oldest[ $id ] ) ? (int) $rank_oldest[ $id ] : 99;
	$card['ord_az']  = isset( $rank_az[ $id ] ) ? (int) $rank_az[ $id ] : 99;
	$card['ord_za']  = isset( $rank_za[ $id ] ) ? (int) $rank_za[ $id ] : 99;
}
unset( $card );

$sort_labels = array(
	'newest' => __( 'New to Old', 'succeedlearn-amp' ),
	'oldest' => __( 'Old to New', 'succeedlearn-amp' ),
	'az'     => __( 'Title A → Z', 'succeedlearn-amp' ),
	'za'     => __( 'Title Z → A', 'succeedlearn-amp' ),
);

$blog_filter_json = wp_json_encode(
	array(
		'cat'    => 'all',
		'sort'   => 'newest',
		'search' => '',
	)
);

$page_title = sprintf(
	/* translators: %s: category name */
	__( '%s | SucceedLEARN Blogs', 'succeedlearn-amp' ),
	$title
);
?>
<!doctype html>
<html amp lang="<?php echo esc_attr( get_bloginfo( 'language' ) ); ?>">
<head>
	<meta charset="utf-8" />
	<script async src="https://cdn.ampproject.org/v0.js"></script>
	<link rel="canonical" href="<?php echo esc_url( $canonical ); ?>" />
	<meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1" />
	<meta name="description" content="<?php echo esc_attr( $meta_desc ); ?>" />
	<link rel="shortcut icon" href="<?php echo esc_url( function_exists( 'succeedlearn_amp_get_favicon_url' ) ? succeedlearn_amp_get_favicon_url() : home_url( '/favicon.ico' ) ); ?>" />
	<title><?php echo esc_html( $page_title ); ?></title>
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
		succeedlearn_amp_output_page_styles( 'category', array( 'home-page' ), array( 'blog' ) );
	}
	?>
	</style>
	<?php
	if ( function_exists( 'succeedlearn_amp_output_components' ) ) {
		succeedlearn_amp_output_components( 'category', array( 'amp-sidebar', 'amp-accordion', 'amp-bind' ) );
	}
	?>
</head>
<body class="sl-home sl-blog-page sl-blog-category-page">
<?php
$menu = SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'components/menu.php';
if ( is_readable( $menu ) ) {
	include $menu;
}
?>

<main id="main-content" class="sl-blog">
	<div class="sl-wrap sl-blog__wrap">
		<nav class="sl-blog__crumbs" aria-label="<?php esc_attr_e( 'Breadcrumb', 'succeedlearn-amp' ); ?>">
			<a href="<?php echo esc_url( $home_url ); ?>"><?php esc_html_e( 'Home', 'succeedlearn-amp' ); ?></a>
			<span aria-hidden="true"> / </span>
			<a href="<?php echo esc_url( $blog_amp_url ); ?>"><?php esc_html_e( 'Blog', 'succeedlearn-amp' ); ?></a>
			<span aria-hidden="true"> / </span>
			<span><?php echo esc_html( $title ); ?></span>
		</nav>

		<header class="sl-blog__hero">
			<h1><?php echo esc_html( $title ); ?></h1>
			<?php if ( $subtitle ) : ?>
				<p class="sl-blog__subtitle"><?php echo esc_html( $subtitle ); ?></p>
			<?php endif; ?>
			<?php if ( $description ) : ?>
				<div class="sl-lead"><?php echo wp_kses_post( $description ); ?></div>
			<?php endif; ?>
			<a class="sl-btn sl-btn--primary" href="<?php echo esc_url( $contact_url ); ?>"><?php esc_html_e( 'Contact Us', 'succeedlearn-amp' ); ?></a>
		</header>

		<amp-state id="blogFilter">
			<script type="application/json"><?php echo $blog_filter_json ? $blog_filter_json : '{"cat":"all","sort":"newest","search":""}'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></script>
		</amp-state>

		<div class="sl-blog__toolbar">
			<div class="sl-blog__search">
				<label class="sl-sr-only" for="sl-blog-search"><?php esc_html_e( 'Search articles', 'succeedlearn-amp' ); ?></label>
				<input
					type="text"
					id="sl-blog-search"
					name="q"
					placeholder="<?php echo esc_attr__( 'Search articles…', 'succeedlearn-amp' ); ?>"
					autocomplete="off"
					on="input-debounced:AMP.setState({blogFilter:{search:event.value.toLowerCase()}})"
					[value]="blogFilter.search"
					value=""
				>
			</div>
			<div class="sl-blog__sort">
				<?php foreach ( $sort_labels as $key => $label ) : ?>
					<button
						type="button"
						class="sl-blog__sort-link<?php echo 'newest' === $key ? ' is-active' : ''; ?>"
						[class]="blogFilter.sort == '<?php echo esc_js( $key ); ?>' ? 'sl-blog__sort-link is-active' : 'sl-blog__sort-link'"
						on="tap:AMP.setState({blogFilter:{sort:'<?php echo esc_js( $key ); ?>'}})"
					><?php echo esc_html( $label ); ?></button>
				<?php endforeach; ?>
				<button
					type="button"
					class="sl-blog__reset"
					on="tap:AMP.setState({blogFilter:{cat:'all',sort:'newest',search:''}})"
				><?php esc_html_e( 'Reset', 'succeedlearn-amp' ); ?></button>
			</div>
		</div>

		<?php if ( empty( $cards ) ) : ?>
			<p class="sl-blog__empty"><?php esc_html_e( 'No articles in this category yet.', 'succeedlearn-amp' ); ?></p>
		<?php else : ?>
			<?php
			$any_match_parts = array();
			foreach ( $cards as $card ) {
				$hay               = esc_js( isset( $card['search'] ) ? $card['search'] : '' );
				$any_match_parts[] = "(blogFilter.search.length == 0 || '" . $hay . "'.indexOf(blogFilter.search) != -1)";
			}
			$any_match = implode( ' || ', $any_match_parts );
			?>
			<div class="sl-blog__results">
			<div class="sl-blog__grid" [hidden]="<?php echo esc_attr( '!(' . $any_match . ')' ); ?>">
				<?php foreach ( $cards as $card ) : ?>
					<?php
					$ord_new         = max( 1, min( 80, (int) $card['ord_new'] ) );
					$ord_old         = max( 1, min( 80, (int) $card['ord_old'] ) );
					$ord_az          = max( 1, min( 80, (int) $card['ord_az'] ) );
					$ord_za          = max( 1, min( 80, (int) $card['ord_za'] ) );
					$sort_class_bind = "blogFilter.sort == 'oldest' ? 'sl-blog-card o-" . $ord_old . "' : blogFilter.sort == 'az' ? 'sl-blog-card o-" . $ord_az . "' : blogFilter.sort == 'za' ? 'sl-blog-card o-" . $ord_za . "' : 'sl-blog-card o-" . $ord_new . "'";
					?>
					<article
						class="sl-blog-card o-<?php echo (int) $ord_new; ?>"
						[class]="<?php echo esc_attr( $sort_class_bind ); ?>"
						[hidden]="blogFilter.search.length > 0 && '<?php echo esc_js( isset( $card['search'] ) ? $card['search'] : '' ); ?>'.indexOf(blogFilter.search) == -1"
					>
						<a class="sl-blog-card__thumb" href="<?php echo esc_url( $card['url'] ); ?>" tabindex="-1" aria-hidden="true">
							<?php if ( ! empty( $card['thumbnail'] ) ) : ?>
								<amp-img
									src="<?php echo esc_url( $card['thumbnail'] ); ?>"
									width="640"
									height="400"
									layout="responsive"
									alt=""
								></amp-img>
							<?php else : ?>
								<span class="sl-blog-card__ph"></span>
							<?php endif; ?>
						</a>
						<div class="sl-blog-card__body">
							<?php if ( ! empty( $card['category'] ) ) : ?>
								<span class="sl-blog-card__cat"><?php echo esc_html( $card['category'] ); ?></span>
							<?php endif; ?>
							<h2 class="sl-blog-card__title">
								<a href="<?php echo esc_url( $card['url'] ); ?>"><?php echo esc_html( $card['title'] ); ?></a>
							</h2>
							<?php if ( ! empty( $card['date'] ) ) : ?>
								<p class="sl-blog-card__meta"><?php echo esc_html( $card['date'] ); ?></p>
							<?php endif; ?>
							<?php if ( ! empty( $card['excerpt'] ) ) : ?>
								<p class="sl-blog-card__excerpt"><?php echo esc_html( $card['excerpt'] ); ?></p>
							<?php endif; ?>
							<a class="sl-blog-card__more" href="<?php echo esc_url( $card['url'] ); ?>"><?php esc_html_e( 'Read More', 'succeedlearn-amp' ); ?> →</a>
						</div>
					</article>
				<?php endforeach; ?>
			</div>
			<p class="sl-blog__empty sl-blog__empty--live" hidden [hidden]="<?php echo esc_attr( $any_match ); ?>">
				<?php esc_html_e( 'No results found for this search.', 'succeedlearn-amp' ); ?>
			</p>
			</div>
		<?php endif; ?>

		<section class="sl-blog__cta">
			<h2><?php esc_html_e( 'Need help building a safer, more compliant workplace?', 'succeedlearn-amp' ); ?></h2>
			<p><?php esc_html_e( 'Talk to our team about training programmes tailored for your organisation.', 'succeedlearn-amp' ); ?></p>
			<a class="sl-btn sl-btn--primary" href="<?php echo esc_url( $contact_url ); ?>"><?php esc_html_e( 'Contact Us', 'succeedlearn-amp' ); ?></a>
		</section>
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
