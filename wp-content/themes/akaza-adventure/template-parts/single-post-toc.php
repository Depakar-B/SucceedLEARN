<?php
/**
 * Single post table of contents.
 *
 * @package Akaza_Adventure
 *
 * @var array $args {
 *     @type array  $items    TOC items.
 *     @type string $variant  desktop|mobile.
 * }
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$items   = isset( $args['items'] ) && is_array( $args['items'] ) ? $args['items'] : array();
$variant = isset( $args['variant'] ) ? $args['variant'] : 'desktop';

if ( empty( $items ) ) {
	return;
}

$nav_id    = 'desktop' === $variant ? 'slf-toc-nav' : 'slf-toc-nav-mobile';
$list_id   = 'desktop' === $variant ? 'slf-toc-list' : 'slf-toc-list-mobile';
$is_mobile = 'mobile' === $variant;
?>
<?php if ( $is_mobile ) : ?>
<details class="slf-toc slf-toc--mobile">
	<summary class="slf-toc__summary"><?php esc_html_e( 'On this page', 'akaza-adventure' ); ?></summary>
	<nav class="slf-toc__nav" id="<?php echo esc_attr( $nav_id ); ?>" aria-label="<?php esc_attr_e( 'Table of contents', 'akaza-adventure' ); ?>">
		<ol class="slf-toc__list" id="<?php echo esc_attr( $list_id ); ?>">
			<?php foreach ( $items as $item ) : ?>
				<li>
					<a href="#<?php echo esc_attr( $item['id'] ); ?>"><?php echo esc_html( $item['title'] ); ?></a>
				</li>
			<?php endforeach; ?>
		</ol>
	</nav>
</details>
<?php else : ?>
<aside class="slf-toc slf-toc--desktop" aria-labelledby="slf-toc-heading">
	<h2 id="slf-toc-heading" class="slf-toc__heading"><?php esc_html_e( 'On this page', 'akaza-adventure' ); ?></h2>
	<nav class="slf-toc__nav" id="<?php echo esc_attr( $nav_id ); ?>" aria-label="<?php esc_attr_e( 'Table of contents', 'akaza-adventure' ); ?>">
		<ol class="slf-toc__list" id="<?php echo esc_attr( $list_id ); ?>">
			<?php foreach ( $items as $item ) : ?>
				<li>
					<a href="#<?php echo esc_attr( $item['id'] ); ?>"><?php echo esc_html( $item['title'] ); ?></a>
				</li>
			<?php endforeach; ?>
		</ol>
	</nav>
</aside>
<?php endif; ?>
