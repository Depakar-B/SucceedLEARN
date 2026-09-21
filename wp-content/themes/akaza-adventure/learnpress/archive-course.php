<?php
/**
 * Course archive — custom catalog (reversed-7 filter frame).
 *
 * @package Akaza_Adventure
 */

defined( 'ABSPATH' ) || exit;

get_header();

$sort               = isset( $_GET['sort'] ) ? sanitize_key( wp_unslash( $_GET['sort'] ) ) : 'newest'; // phpcs:ignore WordPress.Security.NonceVerification.Recommended
$allowed_sort       = array( 'newest', 'oldest', 'a-z', 'z-a' );
$current_sort       = in_array( $sort, $allowed_sort, true ) ? $sort : 'newest';
$categories         = akaza_get_course_categories();
$category_sections  = akaza_get_courses_grouped_by_category( $current_sort );
$has_courses        = ! empty( $category_sections );
$page_title         = function_exists( 'learn_press_page_title' ) ? learn_press_page_title( false ) : '';
if ( ! $page_title ) {
	$page_title = __( 'Compliance & Security Courses', 'akaza-adventure' );
}
?>
<main id="main-content" class="slf-section slf-section--cream slf-courses-archive">
	<h1 class="screen-reader-text"><?php echo esc_html( $page_title ); ?></h1>

	<div class="slf-container slf-courses-archive__container">
		<?php
		if ( function_exists( 'akaza_render_hero_breadcrumbs' ) ) {
			akaza_render_hero_breadcrumbs();
		}
		?>
		<div class="slf-courses-shell">
			<?php
			get_template_part(
				'template-parts/courses/filter-frame',
				null,
				array(
					'categories' => $categories,
				)
			);

			get_template_part(
				'template-parts/courses/filter-top',
				null,
				array(
					'sort' => $current_sort,
				)
			);
			?>

			<div class="slf-courses-main" id="slf-courses-sections">
				<?php if ( $has_courses ) : ?>
					<?php foreach ( $category_sections as $section ) : ?>
						<?php
						get_template_part(
							'template-parts/courses/category-section',
							null,
							array(
								'category' => $section['category'],
								'courses'  => $section['courses'],
							)
						);
						?>
					<?php endforeach; ?>

					<div class="slf-courses-empty slf-courses-empty--search" id="slf-courses-search-empty" hidden>
						<p><?php esc_html_e( 'No courses match your search.', 'akaza-adventure' ); ?></p>
					</div>
				<?php else : ?>
					<div class="slf-courses-empty">
						<p><?php esc_html_e( 'No courses found.', 'akaza-adventure' ); ?></p>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</main>
<?php
get_footer();
