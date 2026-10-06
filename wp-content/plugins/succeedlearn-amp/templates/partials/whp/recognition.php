<?php
/**
 * WHP AMP: Help employees recognise the moments that matter.
 *
 * Expected vars: $images
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$recognition_steps = array(
	__( 'Recognise', 'succeedlearn-amp' ),
	__( 'Understand', 'succeedlearn-amp' ),
	__( 'Respond', 'succeedlearn-amp' ),
	__( 'Prevent', 'succeedlearn-amp' ),
);
?>
<section id="recognise-the-moments" class="sl-section sl-whp-recognition" aria-labelledby="sl-whp-recognition-title">
	<div class="sl-wrap">
		<div class="sl-whp-intro">
			<span class="sl-eyebrow sl-home-sub-heading">
				<?php esc_html_e( 'RECOGNISE THE MOMENTS THAT MATTER', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-whp-recognition-title" class="sl-h2">
				<?php
				echo wp_kses(
					__( 'Help employees <span>recognise</span> the moments that matter', 'succeedlearn-amp' ),
					array( 'span' => array() )
				);
				?>
			</h2>
		</div>

		<div class="sl-whp-media">
			<div class="sl-whp-image">
				<amp-img
					src="<?php echo esc_url( $images['recognition'] ); ?>"
					width="1672"
					height="941"
					layout="responsive"
					alt="<?php esc_attr_e( 'Employees learning to recognise and respond to workplace harassment', 'succeedlearn-amp' ); ?>"
				></amp-img>
			</div>
		</div>

		<div class="sl-whp-copy">
			<p class="sl-whp-lead"><?php esc_html_e( 'Harassment may appear through inappropriate comments, messages, unwanted attention, misuse of authority or conduct in virtual and work-related settings.', 'succeedlearn-amp' ); ?></p>
			<p><?php esc_html_e( 'Through practical scenarios, learners explore different forms of harassment, intent and impact, consent, bystander intervention, reporting and appropriate workplace responses.', 'succeedlearn-amp' ); ?></p>
		</div>

		<ol class="sl-whp-path" role="list" aria-label="<?php esc_attr_e( 'Learning approach', 'succeedlearn-amp' ); ?>">
			<?php foreach ( $recognition_steps as $index => $step ) : ?>
				<li class="sl-whp-path__step">
					<span class="sl-whp-number" aria-hidden="true"><?php echo esc_html( sprintf( '%02d', $index + 1 ) ); ?></span>
					<span class="sl-whp-path__label"><?php echo esc_html( $step ); ?></span>
				</li>
			<?php endforeach; ?>
		</ol>
	</div>
</section>
