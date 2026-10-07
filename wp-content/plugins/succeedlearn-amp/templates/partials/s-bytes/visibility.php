<?php
/**
 * S-Bytes AMP — Track Microlearning Participation and Completion.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$visibility_image = succeedlearn_amp_get_sbytes_visibility_image();
?>
<section id="visibility-into-learning" class="sl-sbytes-visibility" aria-labelledby="sl-sbytes-visibility-title">
	<div class="sl-wrap">
		<div class="sl-sbytes-visibility__layout">
			<div class="sl-sbytes-visibility__media">
				<div class="sl-sbytes-visibility__image">
					<amp-img
						src="<?php echo esc_url( $visibility_image ); ?>"
						width="960"
						height="720"
						layout="responsive"
						alt="<?php esc_attr_e( 'Visibility into continuous learning with S-Bytes', 'succeedlearn-amp' ); ?>"
					></amp-img>
				</div>
			</div>
			<div class="sl-sbytes-visibility__content">
				<span class="sl-home-sub-heading"><?php esc_html_e( 'Measurable Awareness', 'succeedlearn-amp' ); ?></span>
				<h2 id="sl-sbytes-visibility-title" class="sl-h2">
					<?php esc_html_e( 'Track Microlearning Participation', 'succeedlearn-amp' ); ?>
					<span><?php esc_html_e( 'and Completion', 'succeedlearn-amp' ); ?></span>
				</h2>
				<div class="sl-sbytes-visibility__body">
					<p><?php esc_html_e( 'Continuous awareness should remain measurable even when individual learning interventions are short. S-Bytes enables organisations to monitor employee participation and completion, helping administrators understand whether assigned microlearning is reaching and engaging the workforce.', 'succeedlearn-amp' ); ?></p>
					<p><?php esc_html_e( "Depending on programme configuration, administrators can use participation data to monitor engagement with ongoing awareness initiatives and identify where additional communication or reinforcement may be required. For organisations using the wider SucceedLEARN Security Behaviour & Culture Suite, S-Bytes activity can contribute to a broader view of security awareness engagement through S-Metrics. This allows microlearning to become a measurable component of the organisation's overall security behaviour strategy rather than a standalone communication activity.", 'succeedlearn-amp' ); ?></p>
				</div>
			</div>
		</div>
	</div>
</section>
