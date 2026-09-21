<?php
/**
 * Search results page markup.
 *
 * @package Akaza_Adventure
 *
 * @var array $args {
 *   @type string $query   Search query.
 *   @type array  $results Formatted result rows.
 *   @type int    $total   Found posts count.
 *   @type bool   $trivial Whether query is stopword-only / empty.
 * }
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$query   = isset( $args['query'] ) ? (string) $args['query'] : '';
$results = isset( $args['results'] ) && is_array( $args['results'] ) ? $args['results'] : array();
$total   = isset( $args['total'] ) ? (int) $args['total'] : 0;
$trivial = ! empty( $args['trivial'] );
$has     = ! empty( $results );

$courses_url = function_exists( 'akaza_course_post_type' )
	? get_post_type_archive_link( akaza_course_post_type() )
	: home_url( '/courses/' );
$solutions_url = home_url( '/solutions/' );
$contact_url   = home_url( '/contact-us/' );
?>
<main id="main-content" class="sl-search-page sl-search-results">
	<section class="sl-search-hero" aria-labelledby="sl-search-title">
		<div class="sl-search-hero__container">
			<p class="sl-search-hero__eyebrow"><?php esc_html_e( 'Search', 'akaza-adventure' ); ?></p>
			<h1 id="sl-search-title" class="sl-search-hero__title">
				<?php
				if ( $query ) {
					printf(
						/* translators: %s: search query */
						esc_html__( 'Results for “%s”', 'akaza-adventure' ),
						esc_html( $query )
					);
				} else {
					esc_html_e( 'Search SucceedLEARN', 'akaza-adventure' );
				}
				?>
			</h1>
			<?php if ( ! $trivial && $has ) : ?>
				<p class="sl-search-hero__lead">
					<?php
					printf(
						/* translators: %d: number of results */
						esc_html( _n( '%d result found', '%d results found', $total, 'akaza-adventure' ) ),
						(int) $total
					);
					?>
				</p>
			<?php elseif ( $trivial ) : ?>
				<p class="sl-search-hero__lead">
					<?php esc_html_e( 'Enter a more specific term — for example a course name, solution, or topic.', 'akaza-adventure' ); ?>
				</p>
			<?php else : ?>
				<p class="sl-search-hero__lead">
					<?php esc_html_e( 'We couldn’t find a match. Try another keyword or browse popular areas below.', 'akaza-adventure' ); ?>
				</p>
			<?php endif; ?>

			<form class="sl-search-form" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
				<label class="screen-reader-text" for="sl-search-field"><?php esc_html_e( 'Search SucceedLEARN', 'akaza-adventure' ); ?></label>
				<div class="sl-search-form__field">
					<svg class="sl-search-form__icon" width="18" height="18" viewBox="0 0 24 24" fill="none" aria-hidden="true" focusable="false">
						<circle cx="11" cy="11" r="6.5" stroke="currentColor" stroke-width="1.75"></circle>
						<path d="M16.5 16.5L21 21" stroke="currentColor" stroke-width="1.75" stroke-linecap="round"></path>
					</svg>
					<input
						type="search"
						id="sl-search-field"
						class="sl-search-form__input"
						name="s"
						value="<?php echo esc_attr( $query ); ?>"
						placeholder="<?php esc_attr_e( 'Search courses, solutions, and more…', 'akaza-adventure' ); ?>"
						autocomplete="off"
					>
				</div>
				<button type="submit" class="sl-search-form__submit"><?php esc_html_e( 'Search', 'akaza-adventure' ); ?></button>
			</form>
		</div>
	</section>

	<section class="sl-search-body" aria-label="<?php esc_attr_e( 'Search results', 'akaza-adventure' ); ?>">
		<div class="sl-search-body__container">
			<?php if ( $has ) : ?>
				<ul class="sl-search-list">
					<?php foreach ( $results as $row ) : ?>
						<li class="sl-search-item">
							<a class="sl-search-item__link" href="<?php echo esc_url( $row['url'] ); ?>">
								<span class="sl-search-item__type"><?php echo esc_html( $row['type_label'] ); ?></span>
								<span class="sl-search-item__title"><?php echo esc_html( $row['title'] ); ?></span>
								<?php if ( ! empty( $row['excerpt'] ) ) : ?>
									<span class="sl-search-item__excerpt"><?php echo esc_html( $row['excerpt'] ); ?></span>
								<?php endif; ?>
							</a>
						</li>
					<?php endforeach; ?>
				</ul>

				<?php
				the_posts_pagination(
					array(
						'mid_size'  => 1,
						'prev_text' => __( 'Previous', 'akaza-adventure' ),
						'next_text' => __( 'Next', 'akaza-adventure' ),
						'class'     => 'sl-search-pagination',
					)
				);
				?>
			<?php else : ?>
				<div class="sl-search-empty">
					<p class="sl-search-empty__title"><?php esc_html_e( 'No matching results', 'akaza-adventure' ); ?></p>
					<p class="sl-search-empty__text">
						<?php esc_html_e( 'Try a course title, compliance topic, or product name. Short words like “and” or “the” are ignored.', 'akaza-adventure' ); ?>
					</p>
					<div class="sl-search-empty__links">
						<?php if ( $courses_url ) : ?>
							<a class="slf-btn slf-btn--primary" href="<?php echo esc_url( $courses_url ); ?>"><?php esc_html_e( 'Browse courses', 'akaza-adventure' ); ?></a>
						<?php endif; ?>
						<a class="slf-btn slf-btn--outline" href="<?php echo esc_url( $solutions_url ); ?>"><?php esc_html_e( 'Explore solutions', 'akaza-adventure' ); ?></a>
						<a class="slf-btn slf-btn--ghost" href="<?php echo esc_url( $contact_url ); ?>"><?php esc_html_e( 'Contact us', 'akaza-adventure' ); ?></a>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</section>
</main>
