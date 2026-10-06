<?php
/**
 * S-Phish AMP: How S-Phish Works.
 *
 * Expected vars: $images, $works_steps
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section id="how-s-phish-works" class="sl-section sl-s-phish-works" aria-labelledby="sl-s-phish-works-title">
	<div class="sl-wrap">
		<span class="sl-eyebrow sl-home-sub-heading">
			<?php esc_html_e( 'How S-Phish Works', 'succeedlearn-amp' ); ?>
		</span>

		<h2 id="sl-s-phish-works-title" class="sl-h2">
			<?php esc_html_e( "How SucceedLEARN's", 'succeedlearn-amp' ); ?>
			<span><?php esc_html_e( 'Phishing Simulation Tool works', 'succeedlearn-amp' ); ?></span>
		</h2>

		<h3 class="sl-panel-title">
			<?php esc_html_e( 'Launch a Phishing Simulation in Five Structured Steps', 'succeedlearn-amp' ); ?>
		</h3>

		<div class="sl-s-phish-intro">
			<p>
				<?php esc_html_e( 'S-Phish provides administrators with a guided campaign creation process that makes simulations configurable while keeping campaign management straightforward.', 'succeedlearn-amp' ); ?>
			</p>
		</div>

		<div class="sl-s-phish-media">
			<div class="sl-s-phish-image sl-s-phish-image--square">
				<amp-img
					src="<?php echo esc_url( $images['works'] ); ?>"
					width="1254"
					height="1254"
					layout="responsive"
					alt="<?php esc_attr_e( 'Create a phishing simulation campaign in five steps', 'succeedlearn-amp' ); ?>"
				></amp-img>
			</div>
		</div>

		<div class="sl-s-phish-cards sl-s-phish-cards--stack">
			<?php foreach ( $works_steps as $step ) : ?>
				<article class="sl-s-phish-card">
					<h3 class="sl-panel-title"><?php echo esc_html( $step['title'] ); ?></h3>
					<?php foreach ( $step['paras'] as $para ) : ?>
						<p><?php echo esc_html( $para ); ?></p>
					<?php endforeach; ?>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
