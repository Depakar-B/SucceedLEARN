<?php
/**
 * Newsletter List Page Template (AMP)
 *
 * @package ElearnPOSH\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

remove_all_actions( 'the_content' );
remove_all_actions( 'amp_post_template_content' );
remove_all_actions( 'ampforwp_content' );
remove_all_actions( 'amp_post_template_data' );
remove_all_actions( 'amp_post_template_above_content' );
remove_all_actions( 'amp_post_template_below_content' );

global $wp_query;
status_header( 200 );
if ( isset( $wp_query ) ) {
	$wp_query->is_404      = false;
	$wp_query->is_search   = false;
	$wp_query->is_archive  = false;
	$wp_query->found_posts = 1;
	$wp_query->post_count  = 0;
}

global $redux_builder_amp;

// Read filters once.
$paged          = isset( $_GET['paged'] ) ? max( 1, absint( $_GET['paged'] ) ) : 1;
$selected_year  = isset( $_GET['nyear'] ) ? absint( $_GET['nyear'] ) : ( isset( $_GET['year'] ) ? absint( $_GET['year'] ) : 0 );
$search_term    = isset( $_GET['nq'] ) ? sanitize_text_field( wp_unslash( $_GET['nq'] ) ) : '';
$page_permalink = get_permalink();
$hero_title     = __( 'eLearnPOSH Newsletter', 'elearnposh-amp' );
$hero_subtitle  = __( 'Insights, updates, and case-led learning on workplace POSH compliance and culture.', 'elearnposh-amp' );
$hero_desc      = __( 'Browse past editions covering POSH compliance updates, case studies, IC training tips, and workplace culture insights. Filter by year or search by topic to find guidance for your HR and compliance teams.', 'elearnposh-amp' );
$nl_hero_form = '';
if ( shortcode_exists( 'newsletter_subscription_footer' ) ) {
	$nl_hero_form = do_shortcode( '[newsletter_subscription_footer amp="true"]' );
	if ( function_exists( 'elearnposh_amp_sanitize_amp_form_markup' ) ) {
		$nl_hero_form = elearnposh_amp_sanitize_amp_form_markup( $nl_hero_form );
	}
}
$contact_url = function_exists( 'elearnposh_amp_url' ) ? elearnposh_amp_url( '/contact-us/' ) : home_url( '/contact-us/' );
?>
<!doctype html>
<html amp lang="<?php echo esc_attr( get_bloginfo( 'language' ) ); ?>">
<head>
	<?php
	status_header( 200 );
	if ( isset( $wp_query ) ) {
		$wp_query->is_404    = false;
		$wp_query->is_search = false;
	}
	?>
	<meta charset="utf-8">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="dns-prefetch" href="https://cdn.ampproject.org">

	<?php do_action( 'amp_post_template_head', $this ); ?>

	<style amp-custom>
		body{font-family:'Inter','Nunito Sans',Arial,sans-serif;margin:0;padding:0;padding-top:100px !important;background:#f5f6fa;color:#0f172a}
		a{text-decoration:none;color:inherit}
		@media (max-width:640px){body{padding-top:90px !important}}
		<?php elearnposh_amp_output_page_styles( 'newsletter', array( 'breadcrumbs' ), array( 'page-hero-subtitle', 'newsletter-list-page' ) ); ?>
	</style>

	<?php elearnposh_amp_output_current_page_schema_json_ld(); ?>

	<?php elearnposh_amp_output_components( 'newsletter' ); ?>
</head>
<body>

<?php include ELEARNPOSH_AMP_TEMPLATES_DIR . 'components/menu.php'; ?>

<div class="amp-content-wrapper">
<?php include ELEARNPOSH_AMP_TEMPLATES_DIR . 'components/user-notification.php'; ?>

	<section class="nl-hero" aria-labelledby="nl-hero-title">
		<div class="nl-hero__inner">
			<?php elearnposh_amp_render_breadcrumbs(); ?>
			<div class="nl-hero-row">
				<div class="nl-hero-copy">
					<h1 id="nl-hero-title"><?php echo esc_html( $hero_title ); ?></h1>
					<h2 class="ep-page-hero__subtitle nl-hero-subtitle"><?php echo esc_html( $hero_subtitle ); ?></h2>
					<p class="nl-hero-desc"><?php echo esc_html( $hero_desc ); ?></p>
					<div class="nl-hero-actions">
						<a class="nl-hero-cta" href="<?php echo esc_url( $contact_url ); ?>" target="_top">
							<?php esc_html_e( 'Contact Us', 'elearnposh-amp' ); ?>
						</a>
					</div>
				</div>
				<?php if ( '' !== $nl_hero_form ) : ?>
					<div class="nl-hero-form" id="newsletter-subscription-form">
						<?php echo $nl_hero_form; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</section>

<div class="nl-page">

	<div class="nl-toolbar">
		<form method="get" action="<?php echo esc_url( $page_permalink ); ?>" target="_top" class="nl-form">
			<div class="nl-row nl-row--filter">
				<select class="nl-select" name="nyear" aria-label="<?php esc_attr_e( 'Filter by year', 'elearnposh-amp' ); ?>">
					<option value=""><?php esc_html_e( 'All Years', 'elearnposh-amp' ); ?></option>
					<?php
					global $wpdb;
					$years = $wpdb->get_col(
						"SELECT DISTINCT YEAR(p.post_date) AS y
						 FROM $wpdb->posts p
						 INNER JOIN $wpdb->term_relationships tr ON p.ID = tr.object_id
						 INNER JOIN $wpdb->term_taxonomy tt ON tr.term_taxonomy_id = tt.term_taxonomy_id
						 INNER JOIN $wpdb->terms t ON tt.term_id = t.term_id
						 WHERE p.post_status = 'publish'
						   AND p.post_type = 'post'
						   AND tt.taxonomy = 'category'
						   AND t.slug = 'newsletter'
						 ORDER BY y DESC"
					);

					if ( empty( $years ) ) {
						$years = $wpdb->get_col( "SELECT DISTINCT YEAR(post_date) FROM $wpdb->posts WHERE post_status = 'publish' AND post_type = 'post' ORDER BY post_date DESC" );
					}

					foreach ( $years as $year ) {
						$selected = ( absint( $selected_year ) === absint( $year ) ) ? 'selected' : '';
						echo '<option value="' . esc_attr( $year ) . '" ' . esc_attr( $selected ) . '>' . esc_html( $year ) . '</option>';
					}
					?>
				</select>
			</div>

			<div class="nl-row nl-row--actions">
				<button type="submit" class="nl-btn" name="action" value="filter">
					<?php esc_html_e( 'Apply Filters', 'elearnposh-amp' ); ?>
				</button>

				<?php if ( $search_term || $selected_year ) : ?>
					<a class="nl-btn nl-btn-clear" href="<?php echo esc_url( $page_permalink ); ?>" target="_top">
						<?php esc_html_e( 'Clear', 'elearnposh-amp' ); ?>
					</a>
				<?php endif; ?>
			</div>

			<div class="nl-row nl-row--search">
				<input
					class="nl-input"
					type="search"
					name="nq"
					placeholder="<?php esc_attr_e( 'Search newsletters by title or topic...', 'elearnposh-amp' ); ?>"
					value="<?php echo esc_attr( $search_term ); ?>"
					aria-label="<?php esc_attr_e( 'Search newsletters', 'elearnposh-amp' ); ?>"
				/>
			</div>

			<div class="nl-row nl-row--searchbtn">
				<button type="submit" class="nl-btn" name="action" value="search">
					<?php esc_html_e( 'Search', 'elearnposh-amp' ); ?>
				</button>
			</div>
		</form>

		<?php if ( $search_term || $selected_year ) : ?>
			<div class="nl-active-filters">
				<?php if ( $search_term ) : ?>
					<span class="nl-chip">
						<?php
						/* translators: %s: Search term */
						printf( esc_html__( 'Search: %s', 'elearnposh-amp' ), esc_html( $search_term ) );
						?>
					</span>
				<?php endif; ?>
				<?php if ( $selected_year ) : ?>
					<span class="nl-chip">
						<?php
						/* translators: %s: Year */
						printf( esc_html__( 'Year: %s', 'elearnposh-amp' ), esc_html( $selected_year ) );
						?>
					</span>
				<?php endif; ?>
			</div>
		<?php endif; ?>
	</div>

	<?php
	$args = array(
		'post_type'      => 'post',
		'posts_per_page' => 12,
		'paged'          => $paged,
		'post_status'    => 'publish',
		'category_name'  => 'newsletter',
		'no_found_rows'  => false,
	);

	if ( $search_term ) {
		$args['s'] = $search_term;
	}

	if ( $selected_year ) {
		$args['date_query'] = array(
			array( 'year' => $selected_year ),
		);
	}

	$query = new WP_Query( $args );

	if ( $query->have_posts() ) : ?>
		<div class="nl-grid">
			<?php while ( $query->have_posts() ) : $query->the_post(); ?>
				<article class="nl-card">
					<div class="nl-thumb">
						<?php if ( has_post_thumbnail() ) : ?>
							<a href="<?php the_permalink(); ?>" target="_top">
								<amp-img
									src="<?php echo esc_url( elearnposh_amp_get_post_thumbnail_url( get_the_ID(), 'medium_large' ) ); ?>"
									width="600"
									height="400"
									layout="responsive"
									alt="<?php the_title_attribute(); ?>">
								</amp-img>
							</a>
						<?php else : ?>
							<div class="nl-thumb-fallback">
								<?php esc_html_e( 'Newsletter', 'elearnposh-amp' ); ?>
							</div>
						<?php endif; ?>
					</div>

					<div class="nl-meta">
						<span><?php echo esc_html( get_the_date() ); ?></span>
					</div>

					<h3 class="nl-title">
						<a href="<?php the_permalink(); ?>" target="_top"><?php the_title(); ?></a>
					</h3>

					<p class="nl-desc">
						<?php echo esc_html( wp_trim_words( get_the_excerpt(), 22 ) ); ?>
					</p>

					<?php
					$read_time = function_exists( 'get_field' ) ? get_field( 'read_time' ) : false;
					if ( ! $read_time ) {
						$words     = str_word_count( wp_strip_all_tags( get_post_field( 'post_content', get_the_ID() ) ) );
						$read_time = max( 1, ceil( $words / 200 ) );
					}
					?>
				<div class="nl-card-footer">
					<span class="nl-readtime">
						<?php
						/* translators: %s: Read time in minutes */
						printf( esc_html__( '%s min read', 'elearnposh-amp' ), esc_html( $read_time ) );
						?>
					</span>
					<a class="nl-readmore" href="<?php the_permalink(); ?>" target="_top">
						<?php esc_html_e( 'Read More', 'elearnposh-amp' ); ?>
					</a>
				</div>
				</article>
			<?php endwhile; ?>
		</div>

		<?php if ( $query->max_num_pages > 1 ) : ?>
			<nav class="nl-pagination" aria-label="<?php esc_attr_e( 'Newsletter pagination', 'elearnposh-amp' ); ?>">
				<?php
				$pagination_args = array(
					'total'     => $query->max_num_pages,
					'current'   => $paged,
					'prev_text' => __( '&larr; Prev', 'elearnposh-amp' ),
					'next_text' => __( 'Next &rarr;', 'elearnposh-amp' ),
					'format'    => '?paged=%#%',
					'add_args'  => array(),
					'mid_size'  => 1,
					'end_size'  => 1,
					'type'      => 'plain',
				);

				if ( $selected_year ) {
					$pagination_args['add_args']['nyear'] = $selected_year;
				}
				if ( $search_term ) {
					$pagination_args['add_args']['nq'] = rawurlencode( $search_term );
				}

				echo wp_kses_post( paginate_links( $pagination_args ) );
				?>
			</nav>
		<?php endif; ?>
	<?php else : ?>
		<div class="nl-empty">
			<h3><?php esc_html_e( 'No newsletters found', 'elearnposh-amp' ); ?></h3>
			<p><?php esc_html_e( 'Try a different search term or year filter.', 'elearnposh-amp' ); ?></p>
			<a class="nl-btn" href="<?php echo esc_url( $page_permalink ); ?>" target="_top">
				<?php esc_html_e( 'Reset filters', 'elearnposh-amp' ); ?>
			</a>
		</div>
	<?php endif; wp_reset_postdata(); ?>

</div>
</div><!-- .amp-content-wrapper -->

<?php include ELEARNPOSH_AMP_TEMPLATES_DIR . 'components/footer.php'; ?>
<?php do_action( 'amp_post_template_footer' ); ?>

</body>
</html>
