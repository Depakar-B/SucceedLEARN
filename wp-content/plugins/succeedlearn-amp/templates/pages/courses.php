<?php
/**
 * SucceedLEARN AMP course archive listing.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$amp_ctx = ( isset( $this ) && is_object( $this ) ) ? $this : null;

$canonical = home_url( '/courses/' );
if ( class_exists( '\\SucceedLEARN\\AMP\\Plugin' ) ) {
	$plugin = \SucceedLEARN\AMP\Plugin::get_instance();
	if ( $plugin && method_exists( $plugin, 'get_config' ) ) {
		$config = $plugin->get_config();
		if ( $config && method_exists( $config, 'get_courses_url' ) ) {
			$canonical = $config->get_courses_url();
		}
	}
}

$home_url = function_exists( 'succeedlearn_amp_url' )
	? succeedlearn_amp_url( home_url( '/' ) )
	: home_url( '/' );

$page_title = function_exists( 'learn_press_page_title' ) ? learn_press_page_title( false ) : '';
if ( ! $page_title ) {
	$page_title = __( 'Compliance & Security Courses', 'succeedlearn-amp' );
}

$categories = function_exists( 'akaza_get_course_categories' ) ? akaza_get_course_categories() : array();
if ( ! is_array( $categories ) ) {
	$categories = array();
}

$category_sections = function_exists( 'akaza_get_courses_grouped_by_category' )
	? akaza_get_courses_grouped_by_category( 'newest' )
	: array();
if ( ! is_array( $category_sections ) ) {
	$category_sections = array();
}

$cards = array();
foreach ( $category_sections as $section ) {
	$category = isset( $section['category'] ) ? $section['category'] : null;
	$courses  = isset( $section['courses'] ) ? $section['courses'] : array();
	if ( empty( $courses ) || ! is_array( $courses ) ) {
		continue;
	}

	$cat_slug  = ( $category && isset( $category->slug ) ) ? sanitize_title( (string) $category->slug ) : 'all';
	$cat_name  = ( $category && isset( $category->name ) ) ? (string) $category->name : '';
	$cat_token = '|' . $cat_slug . '|';

	foreach ( $courses as $course ) {
		if ( empty( $course ) || ! is_array( $course ) || empty( $course['id'] ) ) {
			continue;
		}

		$title      = isset( $course['title'] ) ? (string) $course['title'] : '';
		$excerpt    = isset( $course['excerpt'] ) ? (string) $course['excerpt'] : '';
		$permalink  = isset( $course['url'] ) ? (string) $course['url'] : '';
		$search_hay = strtolower( wp_strip_all_tags( $title . ' ' . $excerpt . ' ' . $cat_name ) );
		$search_hay = preg_replace( '/[^a-z0-9\s]+/', ' ', $search_hay );
		$search_hay = trim( preg_replace( '/\s+/', ' ', (string) $search_hay ) );

		$cards[] = array(
			'id'             => (int) $course['id'],
			'title'          => $title,
			'excerpt'        => $excerpt,
			'thumbnail'      => ! empty( $course['thumbnail'] ) ? (string) $course['thumbnail'] : '',
			'url'            => $permalink ? ( function_exists( 'succeedlearn_amp_url' ) ? succeedlearn_amp_url( $permalink ) : $permalink ) : '',
			'ts'             => isset( $course['sort_date'] ) ? (int) $course['sort_date'] : 0,
			'category'       => $cat_name,
			'cat_token'      => $cat_token,
			'duration'       => isset( $course['duration'] ) ? (string) $course['duration'] : '',
			'duration_label' => isset( $course['duration_label'] ) ? (string) $course['duration_label'] : __( 'Total Duration', 'succeedlearn-amp' ),
			'price'          => isset( $course['price'] ) ? (string) $course['price'] : '',
			'button_text'    => isset( $course['button_text'] ) ? (string) $course['button_text'] : __( 'View Course', 'succeedlearn-amp' ),
			'search'         => $search_hay,
		);
	}
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
	'newest' => __( 'Newest First', 'succeedlearn-amp' ),
	'oldest' => __( 'Oldest First', 'succeedlearn-amp' ),
	'az'     => __( 'A to Z', 'succeedlearn-amp' ),
	'za'     => __( 'Z to A', 'succeedlearn-amp' ),
);

$courses_filter_json = wp_json_encode(
	array(
		'sort'   => 'newest',
		'search' => '',
	)
);

$cards_by_id = array();
foreach ( $cards as $card ) {
	$cards_by_id[ $card['id'] ] = $card;
}

$prepared_sections = array();
foreach ( $category_sections as $section ) {
	$category = isset( $section['category'] ) ? $section['category'] : null;
	$courses  = isset( $section['courses'] ) ? $section['courses'] : array();
	if ( empty( $courses ) || ! is_array( $courses ) ) {
		continue;
	}

	$cat_slug = ( $category && isset( $category->slug ) ) ? sanitize_title( (string) $category->slug ) : 'all';
	$cat_id   = ( $category && isset( $category->term_id ) ) ? (int) $category->term_id : 0;
	$cat_name = ( $category && isset( $category->name ) ) ? (string) $category->name : '';

	$section_courses = array();
	foreach ( $courses as $course ) {
		if ( empty( $course['id'] ) || ! isset( $cards_by_id[ (int) $course['id'] ] ) ) {
			continue;
		}
		$section_courses[] = $cards_by_id[ (int) $course['id'] ];
	}

	if ( empty( $section_courses ) ) {
		continue;
	}

	$bulk_data = ( $cat_id && function_exists( 'akaza_get_category_bulk_data' ) ) ? akaza_get_category_bulk_data( $cat_id ) : null;

	$prepared_sections[] = array(
		'category' => $category,
		'slug'     => $cat_slug,
		'name'     => $cat_name,
		'courses'  => $section_courses,
		'bulk'     => $bulk_data,
	);
}

$has_courses = ! empty( $prepared_sections );
?>
<!doctype html>
<html amp lang="<?php echo esc_attr( get_bloginfo( 'language' ) ); ?>">
<head>
	<meta charset="utf-8" />
	<script async src="https://cdn.ampproject.org/v0.js"></script>
	<link rel="canonical" href="<?php echo esc_url( $canonical ); ?>" />
	<meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1" />
	<meta name="description" content="<?php echo esc_attr__( 'Browse compliance and security awareness courses for your workforce. Filter by category, search, and sort to find the right training.', 'succeedlearn-amp' ); ?>" />
	<link rel="shortcut icon" href="<?php echo esc_url( function_exists( 'succeedlearn_amp_get_favicon_url' ) ? succeedlearn_amp_get_favicon_url() : home_url( '/favicon.ico' ) ); ?>" />
	<title><?php echo esc_html( $page_title . ' | SucceedLEARN' ); ?></title>
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
		succeedlearn_amp_output_page_styles( 'courses', array( 'home-page' ), array( 'courses' ) );
	}
	?>
	</style>
	<?php
	if ( function_exists( 'succeedlearn_amp_output_components' ) ) {
		succeedlearn_amp_output_components( 'courses', array( 'amp-sidebar', 'amp-bind' ) );
	}
	?>
</head>
<body class="sl-home sl-courses-page">
<?php
$menu = SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'components/menu.php';
if ( is_readable( $menu ) ) {
	include $menu;
}
?>

<main id="main-content" class="sl-courses slf-courses-archive">
	<h1 class="sl-sr-only"><?php echo esc_html( $page_title ); ?></h1>
	<div class="sl-wrap sl-courses__wrap">
		<nav class="sl-courses__crumbs" aria-label="<?php esc_attr_e( 'Breadcrumb', 'succeedlearn-amp' ); ?>">
			<a href="<?php echo esc_url( $home_url ); ?>"><?php esc_html_e( 'Home', 'succeedlearn-amp' ); ?></a>
			<span aria-hidden="true"> / </span>
			<span><?php esc_html_e( 'Courses', 'succeedlearn-amp' ); ?></span>
		</nav>

		<div class="sl-courses-shell">
			<?php if ( ! empty( $categories ) ) : ?>
				<nav class="sl-courses-cats" aria-label="<?php esc_attr_e( 'Course categories', 'succeedlearn-amp' ); ?>">
					<h2 class="sl-courses-cats__title"><?php esc_html_e( 'Categories', 'succeedlearn-amp' ); ?></h2>
					<ul class="sl-courses-cats__list">
						<?php foreach ( $categories as $term ) : ?>
							<?php
							if ( ! $term instanceof WP_Term || (int) $term->count < 1 ) {
								continue;
							}
							$slug = sanitize_title( $term->slug );
							?>
							<li class="sl-courses-cats__item">
								<a class="sl-courses-cats__link" href="#slf-category-<?php echo esc_attr( $slug ); ?>">
									<span class="sl-courses-cats__label"><?php echo esc_html( $term->name ); ?></span>
									<span class="sl-courses-cats__count"><?php echo (int) $term->count; ?></span>
								</a>
							</li>
						<?php endforeach; ?>
					</ul>
				</nav>
			<?php endif; ?>

			<amp-state id="coursesFilter">
				<script type="application/json"><?php echo $courses_filter_json ? $courses_filter_json : '{"sort":"newest","search":""}'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></script>
			</amp-state>

			<div class="sl-courses__toolbar">
				<div class="sl-courses__search">
					<label class="sl-sr-only" for="sl-courses-search"><?php esc_html_e( 'Search courses', 'succeedlearn-amp' ); ?></label>
					<input
						type="search"
						id="sl-courses-search"
						name="q"
						placeholder="<?php echo esc_attr__( 'Search courses…', 'succeedlearn-amp' ); ?>"
						autocomplete="off"
						on="input-debounced:AMP.setState({coursesFilter:{search:event.value.toLowerCase()}})"
						[value]="coursesFilter.search"
						value=""
					>
				</div>
				<div class="sl-courses__controls">
					<div class="sl-courses__sort">
						<?php foreach ( $sort_labels as $key => $label ) : ?>
							<button
								type="button"
								class="sl-courses__sort-link<?php echo 'newest' === $key ? ' is-active' : ''; ?>"
								[class]="coursesFilter.sort == '<?php echo esc_js( $key ); ?>' ? 'sl-courses__sort-link is-active' : 'sl-courses__sort-link'"
								on="tap:AMP.setState({coursesFilter:{sort:'<?php echo esc_js( $key ); ?>'}})"
							><?php echo esc_html( $label ); ?></button>
						<?php endforeach; ?>
					</div>
					<button
						type="button"
						class="sl-courses__reset"
						on="tap:AMP.setState({coursesFilter:{sort:'newest',search:''}})"
					><?php esc_html_e( 'Reset', 'succeedlearn-amp' ); ?></button>
				</div>
			</div>

			<div class="sl-courses-main">
				<?php if ( ! $has_courses ) : ?>
					<p class="sl-courses__empty"><?php esc_html_e( 'No courses found.', 'succeedlearn-amp' ); ?></p>
				<?php else : ?>
					<?php
					$any_match_parts = array();
					foreach ( $cards as $card ) {
						$hay               = esc_js( isset( $card['search'] ) ? $card['search'] : '' );
						$any_match_parts[] = "(coursesFilter.search.length == 0 || '" . $hay . "'.indexOf(coursesFilter.search) != -1)";
					}
					$any_match = implode( ' || ', $any_match_parts );
					?>
					<?php foreach ( $prepared_sections as $section ) : ?>
						<?php
						$section_slug    = isset( $section['slug'] ) ? $section['slug'] : 'all';
						$section_name    = isset( $section['name'] ) ? $section['name'] : '';
						$section_courses = isset( $section['courses'] ) ? $section['courses'] : array();
						$bulk_data       = isset( $section['bulk'] ) ? $section['bulk'] : null;
						$show_bulk       = $bulk_data && ( ! empty( $bulk_data['bulk_description'] ) || ! empty( $bulk_data['bulk_cta_url'] ) );

						$section_match_parts = array();
						foreach ( $section_courses as $card ) {
							$hay                   = esc_js( isset( $card['search'] ) ? $card['search'] : '' );
							$section_match_parts[] = "(coursesFilter.search.length == 0 || '" . $hay . "'.indexOf(coursesFilter.search) != -1)";
						}
						$section_match = implode( ' || ', $section_match_parts );
						?>
						<section
							class="sl-courses-section"
							id="slf-category-<?php echo esc_attr( $section_slug ); ?>"
							[hidden]="<?php echo esc_attr( '!(' . $section_match . ')' ); ?>"
						>
							<header class="sl-courses-section__header">
								<h2 class="sl-courses-section__title"><?php echo esc_html( $section_name ); ?></h2>
								<span class="sl-courses-section__count">
									<?php
									printf(
										esc_html( _n( '%d course', '%d courses', count( $section_courses ), 'succeedlearn-amp' ) ),
										count( $section_courses )
									);
									?>
								</span>
							</header>

							<?php if ( $show_bulk ) : ?>
								<div class="sl-courses-bulk">
									<div class="sl-courses-bulk__inner">
										<?php
										$bulk_title = ! empty( $bulk_data['section_title'] )
											? $bulk_data['section_title']
											: ( $bulk_data['name'] . ' — ' . __( 'Full category package', 'succeedlearn-amp' ) );
										$bulk_intro = ! empty( $bulk_data['section_intro'] )
											? $bulk_data['section_intro']
											: __( 'Unlock the entire category in one bulk package for your whole workforce.', 'succeedlearn-amp' );
										?>
										<h3 class="sl-courses-bulk__title"><?php echo esc_html( $bulk_title ); ?></h3>
										<?php if ( ! empty( $bulk_data['bulk_description'] ) ) : ?>
											<p class="sl-courses-bulk__desc"><?php echo esc_html( $bulk_data['bulk_description'] ); ?></p>
										<?php endif; ?>
										<p class="sl-courses-bulk__intro"><?php echo esc_html( $bulk_intro ); ?></p>
										<?php if ( ! empty( $bulk_data['bulk_cta_url'] ) ) : ?>
											<a class="sl-btn sl-btn--primary sl-btn--sm" href="<?php echo esc_url( $bulk_data['bulk_cta_url'] ); ?>">
												<?php echo esc_html( ! empty( $bulk_data['bulk_cta_text'] ) ? $bulk_data['bulk_cta_text'] : __( 'Request a Demo', 'succeedlearn-amp' ) ); ?>
											</a>
										<?php endif; ?>
									</div>
								</div>
							<?php endif; ?>

							<div class="sl-courses__grid">
								<?php foreach ( $section_courses as $card ) : ?>
									<?php
									$ord_new = max( 1, min( 80, (int) $card['ord_new'] ) );
									$ord_old = max( 1, min( 80, (int) $card['ord_old'] ) );
									$ord_az  = max( 1, min( 80, (int) $card['ord_az'] ) );
									$ord_za  = max( 1, min( 80, (int) $card['ord_za'] ) );
									$sort_class_bind = "coursesFilter.sort == 'oldest' ? 'sl-courses-card o-" . $ord_old . "' : coursesFilter.sort == 'az' ? 'sl-courses-card o-" . $ord_az . "' : coursesFilter.sort == 'za' ? 'sl-courses-card o-" . $ord_za . "' : 'sl-courses-card o-" . $ord_new . "'";
									?>
									<article
										class="sl-courses-card o-<?php echo (int) $ord_new; ?>"
										[class]="<?php echo esc_attr( $sort_class_bind ); ?>"
										[hidden]="coursesFilter.search.length > 0 && '<?php echo esc_js( isset( $card['search'] ) ? $card['search'] : '' ); ?>'.indexOf(coursesFilter.search) == -1"
									>
										<a class="sl-courses-card__thumb" href="<?php echo esc_url( $card['url'] ); ?>" tabindex="-1" aria-hidden="true">
											<?php if ( ! empty( $card['thumbnail'] ) ) : ?>
												<amp-img
													src="<?php echo esc_url( $card['thumbnail'] ); ?>"
													width="640"
													height="400"
													layout="responsive"
													alt=""
												></amp-img>
											<?php else : ?>
												<span class="sl-courses-card__ph"></span>
											<?php endif; ?>
										</a>
										<div class="sl-courses-card__body">
											<h3 class="sl-courses-card__title">
												<a href="<?php echo esc_url( $card['url'] ); ?>"><?php echo esc_html( $card['title'] ); ?></a>
											</h3>
											<?php if ( ! empty( $card['excerpt'] ) ) : ?>
												<p class="sl-courses-card__excerpt"><?php echo esc_html( $card['excerpt'] ); ?></p>
											<?php endif; ?>
											<div class="sl-courses-card__meta">
												<?php if ( ! empty( $card['duration'] ) ) : ?>
													<span class="sl-courses-card__duration">
														<strong><?php echo esc_html( $card['duration_label'] ); ?>:</strong>
														<?php echo esc_html( $card['duration'] ); ?>
													</span>
												<?php endif; ?>
												<?php if ( ! empty( $card['price'] ) ) : ?>
													<span class="sl-courses-card__price"><?php echo esc_html( $card['price'] ); ?></span>
												<?php endif; ?>
											</div>
											<a class="sl-btn sl-btn--primary sl-btn--sm sl-courses-card__cta" href="<?php echo esc_url( $card['url'] ); ?>"><?php echo esc_html( $card['button_text'] ); ?></a>
										</div>
									</article>
								<?php endforeach; ?>
							</div>
						</section>
					<?php endforeach; ?>

					<p class="sl-courses__empty sl-courses__empty--live" hidden [hidden]="<?php echo esc_attr( $any_match ); ?>">
						<?php esc_html_e( 'No courses match your search.', 'succeedlearn-amp' ); ?>
					</p>
				<?php endif; ?>
			</div>
		</div>
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
