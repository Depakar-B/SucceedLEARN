<?php
/**
 * Shared AMP hero breadcrumbs.
 *
 * Expected vars: $items (from succeedlearn_amp_render_hero_breadcrumbs).
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( empty( $items ) || ! is_array( $items ) || count( $items ) < 2 ) {
	return;
}

$last_index = count( $items ) - 1;
?>
<nav class="slf-breadcrumbs slf-breadcrumbs--inline" aria-label="<?php esc_attr_e( 'Breadcrumb', 'succeedlearn-amp' ); ?>">
	<ol class="slf-breadcrumbs__list">
		<?php foreach ( $items as $index => $item ) : ?>
			<?php
			$is_current = ! empty( $item['current'] );
			$label      = isset( $item['label'] ) ? (string) $item['label'] : '';
			$url        = isset( $item['url'] ) ? (string) $item['url'] : '';
			?>
			<li class="slf-breadcrumbs__item">
				<?php if ( ! $is_current && $url ) : ?>
					<a class="slf-breadcrumbs__link" href="<?php echo esc_url( $url ); ?>"><?php echo esc_html( $label ); ?></a>
				<?php else : ?>
					<span class="slf-breadcrumbs__current" aria-current="page"><?php echo esc_html( $label ); ?></span>
				<?php endif; ?>
				<?php if ( $index < $last_index ) : ?>
					<span class="slf-breadcrumbs__sep" aria-hidden="true">/</span>
				<?php endif; ?>
			</li>
		<?php endforeach; ?>
	</ol>
</nav>
