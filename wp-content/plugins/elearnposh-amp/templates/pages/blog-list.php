<?php
/**
 * Blog List Page Template with Search and Filter
 *
 * @package ElearnPOSH\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Prevent default content outputs
remove_all_actions( 'the_content' );
remove_all_actions( 'amp_post_template_content' );
remove_all_actions( 'ampforwp_content' );

global $redux_builder_amp, $wp_query;

// CRITICAL: Prevent 404 status - must be done early
status_header( 200 );
if ( isset( $wp_query ) ) {
	$wp_query->is_404 = false;
	$wp_query->is_search = false;
	$wp_query->is_archive = false;
	$wp_query->is_home = false;
	$wp_query->found_posts = 1; // Fake found posts to prevent 404
	$wp_query->post_count = 0; // But no actual posts
}

// Get filter parameters from URL
$sort_option = isset( $_GET['sort'] ) ? sanitize_text_field( $_GET['sort'] ) : 'new';
$selected_cat = isset( $_GET['cat'] ) ? absint( $_GET['cat'] ) : 0;
$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;

// Exclude newsletter category
$newsletter_cat = get_category_by_slug( 'newsletter' );
$newsletter_id = $newsletter_cat ? $newsletter_cat->term_id : 0;

$hero_title    = get_the_title() ? get_the_title() : __( 'eLearnPOSH Blog', 'elearnposh-amp' );
$hero_subtitle = __( 'Expert insights on POSH compliance, workplace culture, and building safer organizations.', 'elearnposh-amp' );
$hero_desc     = __( 'Browse articles covering POSH compliance updates, Internal Committee training, HR best practices, and workplace culture. Filter by topic or search to find guidance for your teams.', 'elearnposh-amp' );
$contact_url   = function_exists( 'elearnposh_amp_url' ) ? elearnposh_amp_url( '/contact-us/' ) : home_url( '/contact-us/' );
?>
<!doctype html>
<html amp lang="<?php echo esc_attr( get_bloginfo( 'language' ) ); ?>">
<head>
	<?php
	// CRITICAL: Final check to prevent 404 - must be in head
	status_header( 200 );
	global $wp_query;
	if ( isset( $wp_query ) ) {
		$wp_query->is_404 = false;
		$wp_query->is_search = false;
	}
	?>
	<meta charset="utf-8">
	<title><?php wp_title( '|', true, 'right' ); ?></title>	
	<?php do_action( 'amp_post_template_head', $this ); ?>
	
	<style amp-custom>
		body {
			font-family: 'Nunito Sans', Arial, sans-serif;
			margin: 0;
			padding: 0;
			padding-top: 100px !important;
			background: #f5f6fa;
			color: #333;
		}
		
		a {
			text-decoration: none;
			color: inherit;
		}
		
		.blog-container {
			max-width: 1140px;
			margin: 0 auto;
			padding: 16px 20px 28px;
		}

		/* Archive hero — matches desktop blog list / newsletter pattern */
		.ep-blog-list-hero {
			background:
				radial-gradient(900px 460px at 0% 0%, rgba(47, 144, 239, 0.14), transparent 70%),
				radial-gradient(900px 460px at 100% 0%, rgba(10, 154, 116, 0.1), transparent 72%),
				#fff;
			border-bottom: 1px solid #d9e6f6;
			padding: 20px 16px 26px;
			margin: 0 0 4px;
			box-sizing: border-box;
		}

		.ep-blog-list-hero__inner {
			max-width: 1140px;
			margin: 0 auto;
		}

		.ep-blog-list-hero .ep-breadcrumbs {
			margin: 0 0 14px;
			padding: 0 0 12px;
			border-bottom: 1px solid #d9e6f6;
			font-size: 0.8125rem;
			line-height: 1.5;
			word-break: break-word;
		}

		.ep-blog-list-hero__copy {
			max-width: 40rem;
		}

		.ep-blog-list-hero h1 {
			margin: 0 0 10px;
			font-size: clamp(1.5rem, 1.1rem + 1.3vw, 2.1rem);
			font-weight: 800;
			color: #0d2238;
			line-height: 1.2;
			letter-spacing: -0.01em;
		}

		.ep-blog-list-hero__subtitle {
			margin: 0 0 12px;
			font-size: clamp(1.1rem, 0.95rem + 0.6vw, 1.45rem);
			line-height: 1.35;
			font-weight: 700;
			color: #0f766e;
		}

		.ep-blog-list-hero__desc {
			margin: 0;
			color: #54708d;
			font-size: 15px;
			line-height: 1.7;
		}

		.ep-blog-list-hero__actions {
			display: flex;
			flex-wrap: wrap;
			gap: 12px;
			margin-top: 18px;
		}

		.ep-blog-list-hero__cta {
			display: inline-flex;
			align-items: center;
			justify-content: center;
			min-height: 44px;
			padding: 10px 22px;
			border-radius: 8px;
			background: #0f766e;
			color: #fff;
			font-size: 15px;
			font-weight: 700;
		}

		.ep-blog-list-hero__cta:hover,
		.ep-blog-list-hero__cta:focus {
			background: #0d655e;
			color: #fff;
		}
		
		/* Top Filters Row */
		.blog-top-filters {
			display: flex;
			flex-wrap: wrap;
			gap: 16px;
			align-items: center;
			margin-top: 18px;
			margin-bottom: 28px;
			position: relative;
		}
		
		.sort-group {
			display: flex;
			align-items: center;
			gap: 10px;
			margin-bottom: 20px;
			position: relative;
			z-index: 100; /* High z-index to ensure dropdown appears above other content */
		}
		
		.sort-label {
			font-size: 14px;
			font-weight: 600;
			color: #0f2a47;
			white-space: nowrap;
		}
		
		.sort-select {
			padding: 10px 35px 10px 12px;
			border: 1px solid #ddd;
			border-radius: 6px;
			font-size: 14px;
			background: #fff;
			color: #0f2a47;
			cursor: pointer;
			min-width: 180px;
			appearance: none;
			-webkit-appearance: none;
			-moz-appearance: none;
			background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%23333' d='M6 9L1 4h10z'/%3E%3C/svg%3E");
			background-repeat: no-repeat;
			background-position: right 12px center;
			background-size: 12px;
			position: relative;
			z-index: 101; /* Higher z-index for dropdown */
		}
		
		.sort-select:focus {
			outline: none;
			border-color: #1472ba;
		}
		
		/* Ensure category menu doesn't overlap with dropdown */
		.category-menu {
			position: relative;
			z-index: 1;
		}
		
		.filter-form {
			display: contents;
		}
		
		.submit-btn {
			padding: 10px 20px;
			background: #1472ba;
			color: #fff;
			border: none;
			border-radius: 6px;
			font-size: 14px;
			font-weight: 600;
			cursor: pointer;
			white-space: nowrap;
		}
		
		.submit-btn:hover {
			background: #0f5a94;
		}
		
		/* Category Menu Row */
		.category-menu {
			display: flex;
			flex-wrap: wrap;
			overflow-x: auto;
			gap: 10px;
			margin-top: 20px;
			margin-bottom: 30px;
			padding-bottom: 15px;
			border-bottom: 1px solid #e8e8e8;
		}
		
		.category-menu a {
			flex: 0 0 auto;
			padding: 10px 18px;
			border: 1px solid #ddd;
			background: #fff;
			color: #0f2a47;
			font-weight: 500;
			border-radius: 6px;
			white-space: nowrap;
			font-size: 14px;
			transition: none;
			box-sizing: border-box;
		}
		
		.category-menu a:hover {
			background: #fff;
			border: 1px solid #ddd;
			color: #0f2a47;
		}
		
		.category-menu a.active {
			background: #1472ba;
			color: #fff;
			border: 1px solid #1472ba;
			font-weight: 600;
		}
		
		.category-menu a.active:hover {
			background: #1472ba;
			color: #fff;
			border: 1px solid #1472ba;
		}
		
		.blog-grid {
			display: grid;
			grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
			gap: 24px;
		}
		
		@media (max-width: 768px) {
			.blog-grid {
				grid-template-columns: repeat(2, 1fr);
				gap: 16px;
			}
		}
		
		@media (max-width: 480px) {
			.blog-grid {
				grid-template-columns: 1fr;
			}
		}
		
		.blog-item {
			background: #fff;
			border-radius: 12px;
			overflow: hidden;
			box-shadow: 0 4px 10px rgba(0,0,0,0.06);
			display: flex;
			flex-direction: column;
			height: 100%;
		}
		
		.blog-item amp-img {
			width: 100%;
			height: 230px;
			object-fit: cover;
			object-position: top center;
			background: #f8f8f8;
		}
		
		.blog-content {
			padding: 16px;
			display: flex;
			flex-direction: column;
			flex: 1;
		}
		
		.blog-title {
			font-size: 20px;
			font-weight: 700;
			margin: 0 0 12px 0;
			line-height: 1.3;
			color: #0f2a47;
			min-height: 50px;
			max-height: 50px;
			overflow: hidden;
		}
		
		.blog-title a {
			color: inherit;
		}
		
		.blog-meta {
			font-size: 13px;
			color: #777;
			margin: 0 0 12px 0;
			min-height: 20px;
		}
		
		.blog-desc {
			font-size: 14px;
			color: #77899c;
			margin: 0 0 12px 0;
			line-height: 1.5;
			min-height: 60px;
			max-height: 60px;
			overflow: hidden;
		}
		
		.blog-read-time {
			font-size: 13px;
			color: #fff;
			background: #1472ba;
			padding: 5px 12px;
			border-radius: 6px;
			font-weight: 700;
			display: inline-flex;
			align-items: center;
			width: fit-content;
			margin: 0;
			flex-shrink: 0;
		}

		.blog-card-footer {
			display: flex;
			align-items: center;
			justify-content: space-between;
			gap: 12px;
			margin-top: auto;
		}
		
		.read-more {
			margin: 0;
			font-size: 14px;
			font-weight: 600;
			color: #1472ba;
			display: inline-block;
			white-space: nowrap;
			margin-left: auto;
		}
		
		.pagination {
			text-align: center;
			margin-top: 40px;
		}
		
		.pagination a,
		.pagination span {
			margin: 0 5px;
			padding: 8px 14px;
			border-radius: 6px;
			border: 1px solid #ddd;
			color: #1472ba;
			font-weight: 500;
			font-size: 14px;
			display: inline-block;
		}
		
		.pagination .current {
			background: #1472ba;
			color: #fff;
			border-color: #1472ba;
			font-weight: 700;
		}
		
		.no-results {
			text-align: center;
			padding: 40px 20px;
			color: #777;
			font-size: 16px;
		}
		
		.category-menu::-webkit-scrollbar {
			height: 6px;
		}
		
		.category-menu::-webkit-scrollbar-thumb {
			background: #ccc;
			border-radius: 3px;
		}

		<?php 
		// Output optimized menu and footer CSS
		if ( class_exists( '\ElearnPOSH\AMP\Performance_Optimizer' ) ) {
			$optimizer = \ElearnPOSH\AMP\Performance_Optimizer::get_instance();
			echo $optimizer->get_optimized_css( 'blog', array( 'menu', 'footer', 'breadcrumbs' ) );
		}
		?>
	</style>
	
	<?php elearnposh_amp_output_current_page_schema_json_ld(); ?>

	<?php elearnposh_amp_output_components( 'blog' ); ?>
</head>
<body>

<?php include ELEARNPOSH_AMP_TEMPLATES_DIR . 'components/menu.php'; ?>

<div class="amp-content-wrapper">
<section class="ep-blog-list-hero" aria-labelledby="blog-hero-title">
	<div class="ep-blog-list-hero__inner">
		<?php elearnposh_amp_render_breadcrumbs(); ?>
		<div class="ep-blog-list-hero__copy">
			<h1 id="blog-hero-title"><?php echo esc_html( $hero_title ); ?></h1>
			<h2 class="ep-page-hero__subtitle ep-blog-list-hero__subtitle"><?php echo esc_html( $hero_subtitle ); ?></h2>
			<p class="ep-blog-list-hero__desc"><?php echo esc_html( $hero_desc ); ?></p>
			<div class="ep-blog-list-hero__actions">
				<a class="ep-blog-list-hero__cta" href="<?php echo esc_url( $contact_url ); ?>" target="_top">
					<?php esc_html_e( 'Contact Us', 'elearnposh-amp' ); ?>
				</a>
			</div>
		</div>
	</div>
</section>

<div class="blog-container">
	<!-- Top Row: Sort -->
	<form method="get" action="<?php echo esc_url( get_permalink() ); ?>" class="filter-form blog-top-filters" target="_top">
		<div class="sort-group">
			<span class="sort-label">Sort</span>
			<select name="sort" class="sort-select">
				<option value="new" <?php selected( $sort_option, 'new' ); ?>>New to Old</option>
				<option value="old" <?php selected( $sort_option, 'old' ); ?>>Old to New</option>
				<option value="az" <?php selected( $sort_option, 'az' ); ?>>Title A → Z</option>
				<option value="za" <?php selected( $sort_option, 'za' ); ?>>Title Z → A</option>
			</select>
		</div>
		
		<button type="submit" class="submit-btn">Apply</button>
		
		<?php if ( $selected_cat ) : ?>
			<input type="hidden" name="cat" value="<?php echo esc_attr( $selected_cat ); ?>" />
		<?php endif; ?>
	</form>

	<!-- Category Menu Row -->
	<div class="category-menu">
		<?php
		$current_url = remove_query_arg( array( 'paged', 'cat' ) );
		$all_posts_url = add_query_arg( array( 'sort' => $sort_option ), $current_url );
		$all_active = ( ! $selected_cat ) ? 'active' : '';
		?>
		<a href="<?php echo esc_url( $all_posts_url ); ?>" class="<?php echo esc_attr( $all_active ); ?>">All Posts</a>
		
		<?php
		$categories = get_categories( array(
			'hide_empty' => true,
		) );
		
		foreach ( $categories as $cat ) {
			// Exclude newsletter category
			if ( $cat->term_id == $newsletter_id ) {
				continue;
			}
			
			$cat_url = add_query_arg( array( 
				'cat' => $cat->term_id,
				'sort' => $sort_option
			), $current_url );
			
			$active = ( $selected_cat == $cat->term_id ) ? 'active' : '';
			echo '<a href="' . esc_url( $cat_url ) . '" class="' . esc_attr( $active ) . '">' . esc_html( $cat->name ) . '</a>';
		}
		?>
	</div>

	<!-- Blog Grid -->
	<div class="blog-grid">
		<?php
		// Build query args
		$args = array(
			'post_type'      => 'post',
			'posts_per_page' => 12,
			'paged'          => $paged,
			'post_status'    => 'publish',
			'no_found_rows'  => false, // We need found_rows for pagination
		);
		
		// Exclude newsletter category
		if ( $newsletter_id ) {
			$args['category__not_in'] = array( $newsletter_id );
		}
		
		// Add category filter
		if ( $selected_cat ) {
			$args['cat'] = $selected_cat;
		}
		
		// Add sorting
		$orderby = 'date';
		$order   = 'DESC';
		
		if ( $sort_option === 'old' ) {
			$orderby = 'date';
			$order   = 'ASC';
		} elseif ( $sort_option === 'az' ) {
			$orderby = 'title';
			$order   = 'ASC';
		} elseif ( $sort_option === 'za' ) {
			$orderby = 'title';
			$order   = 'DESC';
		}
		
		$args['orderby'] = $orderby;
		$args['order']   = $order;
		
		// Prevent 404 on empty results
		$query = new WP_Query( $args );
		
		// Ensure query doesn't trigger 404
		$query->is_404 = false;
		$query->is_search = false;
		
		// CRITICAL: Update global query to prevent 404 - must be done after query
		if ( isset( $wp_query ) ) {
			$wp_query->is_404 = false;
			$wp_query->is_search = false;
			$wp_query->is_archive = false;
			// Set found_posts to prevent 404 even if no results
			if ( $query->found_posts == 0 ) {
				$wp_query->found_posts = 1;
			} else {
				$wp_query->found_posts = $query->found_posts;
			}
		}
		
		// Force HTTP 200 status
		status_header( 200 );
		
		if ( $query->have_posts() ) :
			while ( $query->have_posts() ) : 
				$query->the_post();
				$words = str_word_count( strip_tags( get_post_field( 'post_content', get_the_ID() ) ) );
				$read_time = max( 1, ceil( $words / 200 ) );
				?>
				<div class="blog-item">
					<?php if ( has_post_thumbnail() ) : ?>
						<a href="<?php the_permalink(); ?>">
							<amp-img 
								src="<?php echo esc_url( get_the_post_thumbnail_url( get_the_ID(), 'medium_large' ) ); ?>" 
								width="600" 
								height="400" 
								layout="responsive" 
								alt="<?php the_title_attribute(); ?>">
							</amp-img>
						</a>
					<?php else : ?>
						<div style="width: 100%; height: 230px; background: #f8f8f8; display: flex; align-items: center; justify-content: center; color: #999; font-size: 12px;">
							<?php esc_html_e( 'No Image', 'elearnposh-amp' ); ?>
						</div>
					<?php endif; ?>
					
					<div class="blog-content">
						<h3 class="blog-title">
							<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						</h3>
						
						<div class="blog-meta">
							<?php echo esc_html( get_the_date() ); ?>
						</div>
						
						<div class="blog-desc">
							<?php echo esc_html( wp_trim_words( get_the_excerpt(), 22 ) ); ?>
						</div>
						
						<div class="blog-card-footer">
							<div class="blog-read-time">
								<?php
								/* translators: %s: Reading time in minutes */
								echo esc_html( sprintf( __( '%s min read', 'elearnposh-amp' ), $read_time ) );
								?>
							</div>

							<a class="read-more" href="<?php the_permalink(); ?>">
								<?php esc_html_e( 'Read More →', 'elearnposh-amp' ); ?>
							</a>
						</div>
					</div>
				</div>
				<?php
			endwhile;
			wp_reset_postdata();
		else :
			?>
			<div class="no-results">
				<p><?php esc_html_e( 'No blog posts found.', 'elearnposh-amp' ); ?></p>
			</div>
			<?php
		endif;
		?>
	</div>

	<!-- Pagination -->
	<?php if ( $query->max_num_pages > 1 ) : ?>
		<div class="pagination">
			<?php
			$pagination_args = array(
				'total'     => $query->max_num_pages,
				'current'  => $paged,
				'prev_text' => __( 'Prev', 'elearnposh-amp' ),
				'next_text' => __( 'Next', 'elearnposh-amp' ),
				'format'    => '?paged=%#%',
			);
			
			// Add filter parameters to pagination links
			$pagination_args['add_args'] = array();
			if ( $sort_option && $sort_option !== 'new' ) {
				$pagination_args['add_args']['sort'] = $sort_option;
			}
			if ( $selected_cat ) {
				$pagination_args['add_args']['cat'] = $selected_cat;
			}
			
			echo wp_kses_post( paginate_links( $pagination_args ) );
			?>
		</div>
	<?php endif; ?>
</div>
</div><!-- .amp-content-wrapper -->

<?php include ELEARNPOSH_AMP_TEMPLATES_DIR . 'components/footer.php'; ?>
<?php do_action( 'amp_post_template_footer' ); ?>

</body>
</html>
