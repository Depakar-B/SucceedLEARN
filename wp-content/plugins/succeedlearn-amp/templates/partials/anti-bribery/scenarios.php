<?php
/**
 * Anti-Bribery AMP: Scenario-based learning.
 *
 * Expected vars: $images, $scenario_features, $scenarios
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section id="experience" class="sl-section sl-section--alt sl-aml-pe-vc-scenarios" aria-labelledby="sl-anti-bribery-scenarios-title">
	<div class="sl-wrap">
		<div class="sl-aml-intro">
			<span class="sl-eyebrow sl-home-sub-heading">
				<?php esc_html_e( 'Scenario-Based Learning', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-anti-bribery-scenarios-title" class="sl-h2">
				<?php
				echo wp_kses(
					__( 'How does scenario-based ABAC <span>eLearning work?</span>', 'succeedlearn-amp' ),
					array( 'span' => array() )
				);
				?>
			</h2>

			<p>
				<?php esc_html_e( 'Learners follow Janet through immigration, a vendor meeting, a contract discussion and customs. At each point, they choose how to respond to a payment or benefit and receive immediate feedback.', 'succeedlearn-amp' ); ?>
			</p>
		</div>

		<ul class="sl-list sl-aml-list" role="list">
			<?php foreach ( $scenario_features as $feature ) : ?>
				<li class="sl-list-item">
					<span class="sl-aml-check" aria-hidden="true">✓</span>
					<span class="sl-list-item__text"><?php echo esc_html( $feature ); ?></span>
				</li>
			<?php endforeach; ?>
		</ul>

		<div class="sl-aml-concept-stack sl-aml-after sl-abac-scenario-grid">
			<?php foreach ( $scenarios as $scenario ) : ?>
				<article class="sl-aml-concept">
					<?php
					$image_key = isset( $scenario['image'] ) ? (string) $scenario['image'] : '';
					$image_url = ( '' !== $image_key && ! empty( $images[ $image_key ] ) ) ? $images[ $image_key ] : '';
					?>
					<?php if ( $image_url ) : ?>
						<div class="sl-aml-media">
							<div class="sl-aml-image">
								<amp-img
									src="<?php echo esc_url( $image_url ); ?>"
									width="1200"
									height="800"
									layout="responsive"
									alt="<?php echo esc_attr( $scenario['alt'] ); ?>"
								></amp-img>
							</div>
						</div>
					<?php endif; ?>
					<span class="sl-aml-concept__code"><?php echo esc_html( $scenario['num'] ); ?></span>
					<h3 class="sl-panel-title"><?php echo esc_html( $scenario['title'] ); ?></h3>
					<p><?php echo esc_html( $scenario['text'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
