<?php
/**
 * Filter pills — inline flat pills, wraps on overflow.
 *
 * @package Post_Lattice
 *
 * @var array $post_lattice_args {
 *   @type string     $uid
 *   @type array      $config
 *   @type WP_Term[] $terms
 *   @type string[]  $years
 *   @type WP_Term[] $tags
 * }
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$post_lattice_config = isset( $post_lattice_args['config'] ) ? $post_lattice_args['config'] : array();
$post_lattice_terms  = isset( $post_lattice_args['terms'] ) ? $post_lattice_args['terms'] : array();
$post_lattice_years  = isset( $post_lattice_args['years'] ) ? $post_lattice_args['years'] : array();
$post_lattice_tags   = isset( $post_lattice_args['tags'] ) ? $post_lattice_args['tags'] : array();
$post_lattice_groups = isset( $post_lattice_config['enabled_filters'] ) ? array_values( (array) $post_lattice_config['enabled_filters'] ) : array();
?>
<nav class="plt-pills" aria-label="<?php esc_attr_e( 'Filter options', 'post-lattice' ); ?>" data-plt-filters>
	<div class="plt-pills__bar">

		<?php if ( in_array( 'category', $post_lattice_groups, true ) ) : ?>
			<div class="plt-pills__group" data-plt-group="category">
				<button type="button" class="plt-pill is-active" data-plt-category="all">
					<?php echo esc_html( $post_lattice_config['filter_all_text'] ); ?>
				</button>
				<?php foreach ( $post_lattice_terms as $term ) : ?>
					<?php if ( (int) $term->count < 1 ) { continue; } ?>
					<button type="button" class="plt-pill" data-plt-category="<?php echo esc_attr( $term->slug ); ?>">
						<?php echo esc_html( $term->name ); ?>
					</button>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>

		<?php if ( in_array( 'year', $post_lattice_groups, true ) ) : ?>
			<div class="plt-pills__group" data-plt-group="year">
				<button type="button" class="plt-pill is-active" data-plt-year="all">
					<?php echo esc_html( $post_lattice_config['filter_all_years_text'] ); ?>
				</button>
				<?php foreach ( $post_lattice_years as $year ) : ?>
					<button type="button" class="plt-pill" data-plt-year="<?php echo esc_attr( (string) $year ); ?>">
						<?php echo esc_html( (string) $year ); ?>
					</button>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>

		<?php if ( in_array( 'tag', $post_lattice_groups, true ) ) : ?>
			<div class="plt-pills__group" data-plt-group="tag">
				<button type="button" class="plt-pill is-active" data-plt-tag="all">
					<?php esc_html_e( 'All tags', 'post-lattice' ); ?>
				</button>
				<?php foreach ( $post_lattice_tags as $tag ) : ?>
					<button type="button" class="plt-pill" data-plt-tag="<?php echo esc_attr( (string) $tag->slug ); ?>">
						<?php echo esc_html( (string) $tag->name ); ?>
					</button>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>

	</div>
</nav>
