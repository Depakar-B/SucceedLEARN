<?php
/**
 * Legal AMP — Table of contents.
 *
 * Expected vars: $toc_items
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<nav class="sl-legal-amp__toc" aria-labelledby="sl-legal-amp-toc-title">
	<h2 id="sl-legal-amp-toc-title" class="sl-legal-amp__toc-title"><?php esc_html_e( 'On this page', 'succeedlearn-amp' ); ?></h2>
	<ol class="sl-legal-amp__toc-list">
		<?php foreach ( $toc_items as $item ) : ?>
			<li>
				<?php if ( function_exists( 'succeedlearn_amp_scroll_tap_attr' ) ) : ?>
					<button
						type="button"
						class="sl-legal-amp__toc-link"
						<?php echo succeedlearn_amp_scroll_tap_attr( $item['id'] ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					><?php echo esc_html( $item['title'] ); ?></button>
				<?php else : ?>
					<a class="sl-legal-amp__toc-link" href="#<?php echo esc_attr( $item['id'] ); ?>"><?php echo esc_html( $item['title'] ); ?></a>
				<?php endif; ?>
			</li>
		<?php endforeach; ?>
	</ol>
</nav>
