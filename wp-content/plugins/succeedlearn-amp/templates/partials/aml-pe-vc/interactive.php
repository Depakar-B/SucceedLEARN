<?php
/**
 * AML PE/VC AMP: Interactive Learning.
 *
 * Expected vars: $images, $interactive_cards
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section id="interactive-learning" class="sl-section sl-aml-pe-vc-interactive" aria-labelledby="sl-aml-pe-vc-interactive-title">
	<div class="sl-wrap">
		<div class="sl-aml-intro">
			<span class="sl-eyebrow sl-home-sub-heading">
				<?php esc_html_e( 'Learning Experience', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-aml-pe-vc-interactive-title" class="sl-h2">
				<?php
				echo wp_kses(
					__( 'Scenario-Based AML Training <span>That Builds Practical Judgement</span>', 'succeedlearn-amp' ),
					array( 'span' => array() )
				);
				?>
			</h2>

			<p>
				<?php esc_html_e( 'Interactive activities help learners move from understanding AML concepts to recognising risk and making practical decisions.', 'succeedlearn-amp' ); ?>
			</p>
		</div>

		<div class="sl-aml-cards sl-aml-cards--grid">
			<?php foreach ( $interactive_cards as $card ) : ?>
				<article class="sl-aml-card">
					<h3 class="sl-panel-title"><?php echo esc_html( $card['title'] ); ?></h3>
					<p><?php echo esc_html( $card['text'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>

		<div class="sl-aml-media sl-aml-after">
			<div class="sl-aml-image">
				<amp-img
					src="<?php echo esc_url( $images['interactive'] ); ?>"
					width="1200"
					height="800"
					layout="responsive"
					alt="<?php esc_attr_e( 'Interactive AML Knowledge Check', 'succeedlearn-amp' ); ?>"
				></amp-img>
			</div>
		</div>
	</div>
</section>
