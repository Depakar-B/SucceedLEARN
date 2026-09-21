<?php
/**
 * Defensive Driving AMP — Highlights section.
 *
 * Expected vars: $highlights
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section class="sl-section sl-section--alt" aria-label="<?php esc_attr_e( 'Course highlights', 'succeedlearn-amp' ); ?>">
	<div class="sl-wrap sl-dd-highlights">
		<?php foreach ( $highlights as $item ) : ?>
			<article class="sl-dd-highlight">
				<span class="sl-dd-highlight__num"><?php echo esc_html( $item['number'] ); ?></span>
				<h3><?php echo esc_html( $item['title'] ); ?></h3>
				<p><?php echo esc_html( $item['text'] ); ?></p>
			</article>
		<?php endforeach; ?>
	</div>
</section>
