<?php
/**
 * Political Donations PE/VC AMP: Why SucceedLEARN.
 *
 * Expected vars: $why_items
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section id="why-succeedlearn" class="sl-section sl-section--alt sl-aml-pe-vc-why" aria-labelledby="sl-political-donations-pe-vc-why-title">
	<div class="sl-wrap">
		<div class="sl-aml-intro">
			<span class="sl-eyebrow sl-home-sub-heading">
				<?php esc_html_e( 'Why SucceedLEARN', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-political-donations-pe-vc-why-title" class="sl-h2">
				<?php
				echo wp_kses(
					__( 'Why Choose Investment Compliance eLearning for <span>Political Activity Risk?</span>', 'succeedlearn-amp' ),
					array( 'span' => array() )
				);
				?>
			</h2>

			<p>
				<?php esc_html_e( 'Specialist compliance training works best when learners can see how the topic applies to their actual working environment.', 'succeedlearn-amp' ); ?>
			</p>
		</div>

		<ul class="sl-aml-feature-list" role="list">
			<?php foreach ( $why_items as $item ) : ?>
				<li class="sl-aml-feature-list__item">
					<span class="sl-aml-number" aria-hidden="true"><?php echo esc_html( $item['num'] ); ?></span>
					<div>
						<strong><?php echo esc_html( $item['title'] ); ?></strong>
						<span><?php echo esc_html( $item['text'] ); ?></span>
					</div>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>
