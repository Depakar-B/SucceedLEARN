<?php
/**
 * S-Aware — From Awareness to Behaviour Change
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$behaviour_interventions = array(
	array(
		'name'        => __( 'S-Aware', 'akaza-adventure' ),
		'action'      => __( 'Learn', 'akaza-adventure' ),
		'description' => __( 'Build foundational cybersecurity and privacy knowledge.', 'akaza-adventure' ),
	),
	array(
		'name'        => __( 'S-Bytes', 'akaza-adventure' ),
		'action'      => __( 'Reinforce', 'akaza-adventure' ),
		'description' => __( 'Keep important security concepts fresh through short, continuous microlearning.', 'akaza-adventure' ),
	),
	array(
		'name'        => __( 'S-Phish', 'akaza-adventure' ),
		'action'      => __( 'Test', 'akaza-adventure' ),
		'description' => __( 'Give employees practical experience recognising realistic phishing threats.', 'akaza-adventure' ),
	),
	array(
		'name'        => __( 'S-Play', 'akaza-adventure' ),
		'action'      => __( 'Engage', 'akaza-adventure' ),
		'description' => __( 'Reinforce security concepts through interactive and gamified learning experiences.', 'akaza-adventure' ),
	),
	array(
		'name'        => __( 'S-Signs', 'akaza-adventure' ),
		'action'      => __( 'Remind', 'akaza-adventure' ),
		'description' => __( 'Keep security visible through ongoing visual awareness campaigns and nudges.', 'akaza-adventure' ),
	),
	array(
		'name'        => __( 'S-Metrics', 'akaza-adventure' ),
		'action'      => __( 'Measure', 'akaza-adventure' ),
		'description' => __( 'Bring learning and behavioural data together to understand programme performance.', 'akaza-adventure' ),
	),
	array(
		'name'        => __( 'S-Sync', 'akaza-adventure' ),
		'action'      => __( 'Connect', 'akaza-adventure' ),
		'description' => __( 'Integrate security awareness with your organisation\'s wider learning and technology ecosystem.', 'akaza-adventure' ),
	),
);
?>

<section
	class="sl-saware-behaviour-change"
	aria-labelledby="sl-saware-behaviour-change-title"
>
	<div class="container">

		<div class="sl-saware-behaviour-change__heading">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'From Awareness to Behaviour Change', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-saware-behaviour-change-title">
				<?php esc_html_e( 'S-Aware Is the Beginning,', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'Not the End', 'akaza-adventure' ); ?></span>
			</h2>

		</div>


		<div class="sl-saware-behaviour-change__intro">

			<p>
				<?php esc_html_e( 'Knowledge creates the foundation for secure behaviour. But lasting security habits require employees to continuously learn, practise and reinforce what they know.', 'akaza-adventure' ); ?>
			</p>

			<p>
				<?php esc_html_e( 'S-Aware forms the first layer of the SucceedLEARN Security Behaviour & Culture Suite, connecting foundational awareness with a broader ecosystem of security behaviour interventions.', 'akaza-adventure' ); ?>
			</p>

		</div>


		<div class="sl-saware-behaviour-change__layout">

			<div class="sl-saware-behaviour-change__media">

				<div class="sl-saware-behaviour-change__image">

					<div class="sl-saware-behaviour-change__image-placeholder">
						<span>
							<?php esc_html_e( 'Image Placeholder', 'akaza-adventure' ); ?>
						</span>
					</div>

				</div>

			</div>


			<div class="sl-saware-behaviour-change__journey">

				<div class="sl-saware-behaviour-change__journey-line" aria-hidden="true"></div>

				<?php foreach ( $behaviour_interventions as $index => $intervention ) : ?>

					<div class="sl-saware-behaviour-change__step">

						<div class="sl-saware-behaviour-change__step-marker">
							<?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?>
						</div>

						<div class="sl-saware-behaviour-change__step-content">

							<div class="sl-saware-behaviour-change__step-heading">

								<h3 class="sl-panel-title">
									<?php echo esc_html( $intervention['name'] ); ?>
								</h3>

								<span class="sl-saware-behaviour-change__step-action">
									<?php echo esc_html( $intervention['action'] ); ?>
								</span>

							</div>

							<p>
								<?php echo esc_html( $intervention['description'] ); ?>
							</p>

						</div>

					</div>

				<?php endforeach; ?>

			</div>

		</div>


		<div class="sl-saware-behaviour-change__closing">

			<p>
				<?php esc_html_e( 'Together, these interventions help organisations move from periodic security training towards a continuous programme of learning, reinforcement, practice and measurement.', 'akaza-adventure' ); ?>
			</p>

		</div>

	</div>
</section>