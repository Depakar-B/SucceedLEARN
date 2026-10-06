<?php
/**
 * SMCR PE/VC AMP: PE/VC-Focused Learning.
 *
 * Expected vars: $evc_cards
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section id="pevc-focused-learning" class="sl-section sl-smcr-pe-vc-evc-learning" aria-labelledby="sl-smcr-pe-vc-evc-learning-title">
	<div class="sl-wrap">
		<div class="sl-aml-intro">
			<span class="sl-eyebrow sl-home-sub-heading">
				<?php esc_html_e( 'PE/VC-Focused Learning', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-smcr-pe-vc-evc-learning-title" class="sl-h2">
				<?php
				echo wp_kses(
					__( 'SMCR Compliance Training Designed for UK PE and VC <span>Roles</span>', 'succeedlearn-amp' ),
					array( 'span' => array() )
				);
				?>
			</h2>

			<p>
				<?php esc_html_e( 'Give learners examples that reflect private equity and venture capital work rather than relying solely on generic financial-services scenarios.', 'succeedlearn-amp' ); ?>
			</p>
		</div>

		<div class="sl-aml-cards">
			<?php foreach ( $evc_cards as $card ) : ?>
				<article class="sl-aml-card">
					<span class="sl-aml-number" aria-hidden="true"><?php echo esc_html( $card['num'] ); ?></span>
					<h3 class="sl-panel-title"><?php echo esc_html( $card['title'] ); ?></h3>
					<p><?php echo esc_html( $card['text'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
