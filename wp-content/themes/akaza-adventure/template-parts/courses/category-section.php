<?php
/**
 * Course archive — one category section with optional bulk block.
 *
 * @package Akaza_Adventure
 *
 * @var array $args {
 *   @type WP_Term $category Category term.
 *   @type array   $courses  Formatted course cards.
 * }
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$category = isset( $args['category'] ) ? $args['category'] : null;
$courses  = isset( $args['courses'] ) ? $args['courses'] : array();

if ( ! $category || empty( $courses ) ) {
	return;
}

$cat_name = isset( $category->name ) ? $category->name : '';
$cat_slug = isset( $category->slug ) ? $category->slug : 'all';
$cat_id   = isset( $category->term_id ) ? (int) $category->term_id : 0;

$section_id = 'slf-category-' . $cat_slug;
$bulk_data  = $cat_id && function_exists( 'akaza_get_category_bulk_data' ) ? akaza_get_category_bulk_data( $cat_id ) : null;
$show_bulk  = $bulk_data && ( $bulk_data['bulk_description'] !== '' || $bulk_data['bulk_cta_url'] !== '' );
?>
<section class="slf-courses-section"
	id="<?php echo esc_attr( $section_id ); ?>"
	data-category-id="<?php echo esc_attr( (string) $cat_id ); ?>"
	data-category-slug="<?php echo esc_attr( $cat_slug ); ?>">
	<header class="slf-courses-section__header">
		<h2 class="slf-courses-section__title"><?php echo esc_html( $cat_name ); ?></h2>
		<span class="slf-courses-section__count">
			<?php
			printf(
				esc_html( _n( '%d course', '%d courses', count( $courses ), 'akaza-adventure' ) ),
				count( $courses )
			);
			?>
		</span>
	</header>

	<?php if ( $show_bulk ) : ?>
		<div class="slf-courses-bulk">
			<div class="slf-courses-bulk__inner">
				<?php
				$bulk_title = ! empty( $bulk_data['section_title'] )
					? $bulk_data['section_title']
					: ( $bulk_data['name'] . ' — ' . __( 'Full category package', 'akaza-adventure' ) );
				$bulk_intro = ! empty( $bulk_data['section_intro'] )
					? $bulk_data['section_intro']
					: __( 'Unlock the entire category in one bulk package for your whole workforce.', 'akaza-adventure' );
				?>
				<h3 class="slf-courses-bulk__title"><?php echo esc_html( $bulk_title ); ?></h3>
				<?php if ( $bulk_data['bulk_description'] !== '' ) : ?>
					<p class="slf-courses-bulk__desc"><?php echo esc_html( $bulk_data['bulk_description'] ); ?></p>
				<?php endif; ?>
				<p class="slf-courses-bulk__intro"><?php echo esc_html( $bulk_intro ); ?></p>
				<?php if ( $bulk_data['bulk_cta_url'] !== '' ) : ?>
					<a class="slf-btn slf-btn--primary" href="<?php echo esc_url( $bulk_data['bulk_cta_url'] ); ?>">
						<?php echo esc_html( $bulk_data['bulk_cta_text'] ); ?>
					</a>
				<?php endif; ?>
			</div>
		</div>
	<?php endif; ?>

	<div class="slf-courses-grid">
		<?php foreach ( $courses as $course ) : ?>
			<?php
			get_template_part(
				'template-parts/courses/card',
				null,
				array( 'course' => $course )
			);
			?>
		<?php endforeach; ?>
	</div>
</section>
