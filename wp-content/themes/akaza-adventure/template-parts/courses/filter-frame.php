<?php
/**
 * Course archive — reversed-7 sidebar + layout spacer.
 *
 * @package Akaza_Adventure
 *
 * @var array $args {
 *   @type WP_Term[] $categories Category terms.
 * }
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$categories = isset( $args['categories'] ) ? $args['categories'] : array();
?>
<nav id="slf-courses-frame-side" class="slf-courses-frame__side" aria-label="<?php esc_attr_e( 'Course categories', 'akaza-adventure' ); ?>">
	<div class="slf-courses-frame__side-inner">
		<div class="slf-courses-frame__side-head">
			<h2 class="slf-courses-frame__side-title"><?php esc_html_e( 'Categories', 'akaza-adventure' ); ?></h2>
		</div>
		<div class="slf-courses-frame__side-body">
			<ul class="slf-courses-cat-list">
			<?php foreach ( $categories as $category ) : ?>
				<?php if ( (int) $category->count < 1 ) { continue; } ?>
				<li class="slf-courses-cat-item">
					<a href="#slf-category-<?php echo esc_attr( $category->slug ); ?>"
						class="slf-courses-cat-link"
						data-scroll-target="slf-category-<?php echo esc_attr( $category->slug ); ?>"
						data-category="<?php echo esc_attr( (string) $category->term_id ); ?>">
						<span class="slf-courses-cat-label"><?php echo esc_html( $category->name ); ?></span>
						<span class="slf-courses-cat-count"><?php echo (int) $category->count; ?></span>
					</a>
				</li>
			<?php endforeach; ?>
			</ul>
		</div>
	</div>
</nav>
