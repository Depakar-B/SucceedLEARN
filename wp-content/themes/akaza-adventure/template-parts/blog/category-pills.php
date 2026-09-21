<?php
/**
 * Blog archive — horizontal category filter pills.
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
<nav class="slf-blog-pills" aria-label="<?php esc_attr_e( 'Filter by topic', 'akaza-adventure' ); ?>">
	<div class="slf-blog-pills__scroll">
		<button type="button" class="slf-blog-pill is-active" data-category="all">
			<?php esc_html_e( 'All Posts', 'akaza-adventure' ); ?>
		</button>
		<?php foreach ( $categories as $category ) : ?>
			<?php if ( (int) $category->count < 1 ) { continue; } ?>
			<button type="button"
				class="slf-blog-pill"
				data-category="<?php echo esc_attr( $category->slug ); ?>">
				<?php echo esc_html( $category->name ); ?>
			</button>
		<?php endforeach; ?>
	</div>
</nav>
