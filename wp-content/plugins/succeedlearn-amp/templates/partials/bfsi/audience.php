<?php
/**
 * BFSI & PE/VC AMP — Who should take this training?
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$audiences = succeedlearn_amp_get_bfsi_audience_items();
?>
<section class="sl-bfsi-audience" aria-labelledby="sl-bfsi-audience-title">
	<div class="sl-wrap">
		<div class="sl-bfsi-audience__intro">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Target Audience', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-bfsi-audience-title" class="sl-h2">
				<?php esc_html_e( 'Who Should Take', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'This Training?', 'succeedlearn-amp' ); ?></span>
			</h2>

			<p><?php esc_html_e( 'The course is designed for employees whose roles expose them to organisational systems, financial information, sensitive data, external communications or high-value decisions.', 'succeedlearn-amp' ); ?></p>

			<p class="sl-bfsi-audience__lead">
				<?php esc_html_e( 'It is particularly relevant for:', 'succeedlearn-amp' ); ?>
			</p>
		</div>

		<ul class="sl-bfsi-audience__list">
			<?php foreach ( $audiences as $audience ) : ?>
				<li><?php echo esc_html( $audience ); ?></li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>
