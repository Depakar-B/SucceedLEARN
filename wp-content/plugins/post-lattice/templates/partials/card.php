<?php
/**
 * Grid card.
 *
 * @package Post_Lattice
 *
 * @var array $post_lattice_args {
 *   @type array $card
 *   @type array $config
 * }
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$post_lattice_card   = isset( $post_lattice_args['card'] ) ? $post_lattice_args['card'] : array();
$post_lattice_config = isset( $post_lattice_args['config'] ) ? $post_lattice_args['config'] : array();

if ( empty( $post_lattice_card ) || ! is_array( $post_lattice_card ) ) {
	return;
}

$post_lattice_title_lower      = strtolower( $post_lattice_card['title'] );
$post_lattice_category_slugs   = ! empty( $post_lattice_card['category_slugs'] ) ? implode( ' ', $post_lattice_card['category_slugs'] ) : '';
$post_lattice_tag_slugs        = ! empty( $post_lattice_card['tag_slugs'] ) ? implode( ' ', $post_lattice_card['tag_slugs'] ) : '';
$post_lattice_primary_category = ! empty( $post_lattice_card['primary_category'] ) ? $post_lattice_card['primary_category'] : null;
$post_lattice_year             = ! empty( $post_lattice_card['year'] ) ? (string) $post_lattice_card['year'] : '';
$post_lattice_badge_mode       = isset( $post_lattice_config['card_badge'] ) ? $post_lattice_config['card_badge'] : 'category';
$post_lattice_category_names   = array();

if ( ! empty( $post_lattice_card['categories'] ) && is_array( $post_lattice_card['categories'] ) ) {
	foreach ( $post_lattice_card['categories'] as $post_lattice_cat_item ) {
		if ( ! empty( $post_lattice_cat_item['slug'] ) && isset( $post_lattice_cat_item['name'] ) ) {
			$post_lattice_category_names[ $post_lattice_cat_item['slug'] ] = $post_lattice_cat_item['name'];
		}
	}
}

$post_lattice_category_names_json = wp_json_encode( $post_lattice_category_names );
$post_lattice_badge_text          = '';

if ( 'year' === $post_lattice_badge_mode && $post_lattice_year ) {
	$post_lattice_badge_text = $post_lattice_year;
} elseif ( 'category' === $post_lattice_badge_mode && $post_lattice_primary_category ) {
	$post_lattice_badge_text = $post_lattice_primary_category['name'];
}
?>
<article class="plt-card"
	data-post-title="<?php echo esc_attr( $post_lattice_title_lower ); ?>"
	data-sort-title="<?php echo esc_attr( $post_lattice_title_lower ); ?>"
	data-sort-date="<?php echo esc_attr( (string) $post_lattice_card['sort_date'] ); ?>"
	data-categories="<?php echo esc_attr( $post_lattice_category_slugs ); ?>"
	data-tags="<?php echo esc_attr( $post_lattice_tag_slugs ); ?>"
	data-category-names="<?php echo esc_attr( $post_lattice_category_names_json ? $post_lattice_category_names_json : '{}' ); ?>"
	data-primary-category="<?php echo esc_attr( $post_lattice_primary_category ? $post_lattice_primary_category['name'] : '' ); ?>"
	data-year="<?php echo esc_attr( $post_lattice_year ); ?>">
	<?php if ( ! empty( $post_lattice_config['show_thumbnail'] ) ) : ?>
		<a class="plt-card__thumb" href="<?php echo esc_url( $post_lattice_card['url'] ); ?>" tabindex="-1" aria-hidden="true">
			<?php if ( ! empty( $post_lattice_card['thumbnail'] ) ) : ?>
				<img src="<?php echo esc_url( $post_lattice_card['thumbnail'] ); ?>"
					alt=""
					width="640"
					height="400"
					loading="lazy"
					decoding="async">
			<?php else : ?>
				<span class="plt-card__thumb-placeholder" aria-hidden="true"></span>
			<?php endif; ?>
		</a>
	<?php endif; ?>

	<div class="plt-card__body">
		<?php if ( $post_lattice_badge_text ) : ?>
			<span class="plt-card__badge"><?php echo esc_html( $post_lattice_badge_text ); ?></span>
		<?php endif; ?>

		<h3 class="plt-card__title">
			<a href="<?php echo esc_url( $post_lattice_card['url'] ); ?>"><?php echo esc_html( $post_lattice_card['title'] ); ?></a>
		</h3>

		<?php if ( ! empty( $post_lattice_config['show_date'] ) || ! empty( $post_lattice_config['show_read_time'] ) ) : ?>
			<div class="plt-card__meta">
				<?php if ( ! empty( $post_lattice_config['show_date'] ) && ! empty( $post_lattice_card['date'] ) ) : ?>
					<time datetime="<?php echo esc_attr( $post_lattice_card['date_iso'] ); ?>"><?php echo esc_html( $post_lattice_card['date'] ); ?></time>
				<?php endif; ?>
				<?php if ( ! empty( $post_lattice_config['show_read_time'] ) && ! empty( $post_lattice_card['read_time'] ) ) : ?>
					<span class="plt-card__read-time"><?php echo esc_html( $post_lattice_card['read_time'] ); ?></span>
				<?php endif; ?>
			</div>
		<?php endif; ?>

		<?php if ( ! empty( $post_lattice_config['show_excerpt'] ) && ! empty( $post_lattice_card['excerpt'] ) ) : ?>
			<p class="plt-card__excerpt"><?php echo esc_html( $post_lattice_card['excerpt'] ); ?></p>
		<?php endif; ?>

		<?php if ( ! empty( $post_lattice_config['show_read_more'] ) ) : ?>
			<a class="plt-card__link" href="<?php echo esc_url( $post_lattice_card['url'] ); ?>">
				<?php echo esc_html( $post_lattice_config['read_more_text'] ); ?>
				<span aria-hidden="true">→</span>
			</a>
		<?php endif; ?>
	</div>
</article>
