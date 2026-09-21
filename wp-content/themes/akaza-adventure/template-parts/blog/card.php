<?php
/**
 * Blog archive card.
 *
 * @package Akaza_Adventure
 *
 * @var array $post Blog card data from akaza_format_blog_card().
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$post = isset( $args['post'] ) ? $args['post'] : null;

if ( empty( $post ) || ! is_array( $post ) ) {
	return;
}

$title_lower       = strtolower( $post['title'] );
$category_slugs    = ! empty( $post['category_slugs'] ) ? implode( ' ', $post['category_slugs'] ) : '';
$primary_category  = ! empty( $post['primary_category'] ) ? $post['primary_category'] : null;
$hide_category     = ! empty( $args['hide_category'] );
$show_year         = ! empty( $args['show_year'] );
$year              = ! empty( $post['year'] ) ? (string) $post['year'] : '';
$category_names    = array();
if ( ! empty( $post['categories'] ) && is_array( $post['categories'] ) ) {
	foreach ( $post['categories'] as $cat_item ) {
		if ( ! empty( $cat_item['slug'] ) && isset( $cat_item['name'] ) ) {
			$category_names[ $cat_item['slug'] ] = $cat_item['name'];
		}
	}
}
$category_names_json = wp_json_encode( $category_names );
?>
<article class="slf-blog-card"
	data-post-title="<?php echo esc_attr( $title_lower ); ?>"
	data-sort-title="<?php echo esc_attr( $title_lower ); ?>"
	data-sort-date="<?php echo esc_attr( (string) $post['sort_date'] ); ?>"
	data-categories="<?php echo esc_attr( $category_slugs ); ?>"
	data-category-names="<?php echo esc_attr( $category_names_json ? $category_names_json : '{}' ); ?>"
	data-primary-category="<?php echo esc_attr( $primary_category ? $primary_category['name'] : '' ); ?>"
	data-year="<?php echo esc_attr( $year ); ?>">
	<a class="slf-blog-card__thumb" href="<?php echo esc_url( $post['url'] ); ?>" tabindex="-1" aria-hidden="true">
		<?php if ( ! empty( $post['thumbnail'] ) ) : ?>
			<img src="<?php echo esc_url( $post['thumbnail'] ); ?>"
				alt=""
				width="640"
				height="400"
				loading="lazy"
				decoding="async">
		<?php else : ?>
			<span class="slf-blog-card__thumb-placeholder" aria-hidden="true"></span>
		<?php endif; ?>
	</a>
	<div class="slf-blog-card__body">
		<?php if ( $show_year && $year ) : ?>
			<span class="slf-blog-card__category"><?php echo esc_html( $year ); ?></span>
		<?php elseif ( $primary_category && ! $hide_category ) : ?>
			<span class="slf-blog-card__category"><?php echo esc_html( $primary_category['name'] ); ?></span>
		<?php endif; ?>
		<h3 class="slf-blog-card__title">
			<a href="<?php echo esc_url( $post['url'] ); ?>"><?php echo esc_html( $post['title'] ); ?></a>
		</h3>
		<div class="slf-blog-card__meta">
			<?php if ( ! empty( $post['date'] ) ) : ?>
				<time datetime="<?php echo esc_attr( $post['date_iso'] ); ?>"><?php echo esc_html( $post['date'] ); ?></time>
			<?php endif; ?>
			<?php if ( ! empty( $post['read_time'] ) ) : ?>
				<span class="slf-blog-card__read-time"><?php echo esc_html( $post['read_time'] ); ?></span>
			<?php endif; ?>
		</div>
		<?php if ( ! empty( $post['excerpt'] ) ) : ?>
			<p class="slf-blog-card__excerpt"><?php echo esc_html( $post['excerpt'] ); ?></p>
		<?php endif; ?>
		<a class="slf-blog-card__link" href="<?php echo esc_url( $post['url'] ); ?>">
			<?php esc_html_e( 'Read More', 'akaza-adventure' ); ?>
			<span aria-hidden="true">→</span>
		</a>
	</div>
</article>
