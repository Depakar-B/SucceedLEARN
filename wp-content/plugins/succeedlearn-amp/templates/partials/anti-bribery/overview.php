<?php
/**
 * Anti-Bribery AMP: Course overview.
 *
 * Expected vars: $images
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section id="overview" class="sl-section sl-section--alt sl-aml-pe-vc-overview" aria-labelledby="sl-anti-bribery-overview-title">
	<div class="sl-wrap">
		<div class="sl-aml-intro">
			<span class="sl-eyebrow sl-home-sub-heading">
				<?php esc_html_e( 'Course Overview', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-anti-bribery-overview-title" class="sl-h2">
				<?php
				echo wp_kses(
					__( 'What is Anti-Bribery and Anti-Corruption <span>training?</span>', 'succeedlearn-amp' ),
					array( 'span' => array() )
				);
				?>
			</h2>
		</div>

		<div class="sl-aml-media">
			<div class="sl-aml-image sl-aml-image--natural">
				<amp-img
					src="<?php echo esc_url( $images['overview'] ); ?>"
					width="1280"
					height="853"
					layout="responsive"
					alt="<?php esc_attr_e( 'Professionals reviewing an ethical business decision together in a London office', 'succeedlearn-amp' ); ?>"
				></amp-img>
			</div>
			<p class="sl-aml-caption">
				<?php esc_html_e( 'Building confident, consistent decisions around business integrity.', 'succeedlearn-amp' ); ?>
			</p>
		</div>

		<div class="sl-aml-copy">
			<p>
				<strong><?php esc_html_e( 'Anti-Bribery and Anti-Corruption training', 'succeedlearn-amp' ); ?></strong>
				<?php esc_html_e( ' teaches employees how to identify, prevent and report conduct intended to influence a business or official decision improperly.', 'succeedlearn-amp' ); ?>
			</p>
			<p>
				<?php esc_html_e( 'A bribe is not limited to cash exchanged in secret. It can include an extravagant gift, a leisure trip, an unofficial payment, a disguised charitable donation, an excessive commission, a job offered to a decision-maker’s relative or another valuable advantage routed through a third party.', 'succeedlearn-amp' ); ?>
			</p>
			<p>
				<?php esc_html_e( 'The risk often appears during ordinary business activity. An employee may be selecting a supplier, approving hospitality, appointing an agent, travelling through customs or discussing a new contract. The right response depends on the purpose, value, timing and transparency of the benefit, as well as applicable law and the organisation’s policy.', 'succeedlearn-amp' ); ?>
			</p>
			<p>
				<?php esc_html_e( 'SucceedLEARN’s course uses short explanations, practical examples, decision activities and immediate feedback to help employees apply ABAC principles. Learners are encouraged to pause, check, document and report rather than make assumptions in a high-pressure situation.', 'succeedlearn-amp' ); ?>
			</p>
		</div>

		<div class="sl-highlight">
			<p>
				<strong><?php esc_html_e( 'Corporate bribery is not simply a legal issue.', 'succeedlearn-amp' ); ?></strong>
				<?php esc_html_e( ' It undermines fair competition, weakens trust, creates operational disruption and can cause long-term reputational damage.', 'succeedlearn-amp' ); ?>
			</p>
		</div>
	</div>
</section>
