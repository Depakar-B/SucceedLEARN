<?php
/**
 * WHP AMP: Learning designed for different responsibilities.
 *
 * Expected vars: $audiences
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section id="learning-by-responsibility" class="sl-section sl-section--alt sl-whp-learning" aria-labelledby="sl-whp-learning-title">
	<div class="sl-wrap">
		<div class="sl-whp-intro">
			<span class="sl-eyebrow sl-home-sub-heading">
				<?php esc_html_e( 'Role-Relevant Learning', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-whp-learning-title" class="sl-h2">
				<?php esc_html_e( 'Learning designed for different', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'responsibilities', 'succeedlearn-amp' ); ?></span>
			</h2>
		</div>

		<div class="sl-whp-cards sl-whp-cards--grid">
			<?php foreach ( $audiences as $audience ) : ?>
				<article class="sl-whp-card">
					<span class="sl-whp-number" aria-hidden="true"><?php echo esc_html( $audience['number'] ); ?></span>
					<h3 class="sl-panel-title"><?php echo esc_html( $audience['title'] ); ?></h3>
					<p><?php echo esc_html( $audience['text'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>

		<div class="sl-highlight sl-whp-after">
			<p><?php esc_html_e( 'The result is not one generic message for everyone. It is learning matched to what each audience may need to notice, understand and do.', 'succeedlearn-amp' ); ?></p>
		</div>
	</div>
</section>
