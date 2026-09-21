<?php
/**
 * Security Awareness — How the platform works.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$platform_steps = array(
	array(
		'number' => '01',
		'title'  => 'One Connected Security Awareness Ecosystem',
		'text'   => 'Bring training, microlearning, phishing simulations, gamification, awareness nudges and analytics together instead of managing multiple disconnected awareness initiatives.',
	),
	array(
		'number' => '02',
		'title'  => 'Continuous Rather Than Annual ',
		'text'   => 'Create security touchpoints throughout the year so employees continue learning long after mandatory training has been completed.',
	),
	array(
		'number' => '03',
		'title'  => 'Behaviour-Focused Security Training',
		'text'   => 'Move beyond course completion and focus on helping employees recognise risks and develop stronger day-to-day security habits.',
	),
	array(
		'number' => '04',
		'title'  => 'Practical and Measurable ',
		'text'   => 'Combine learning with simulations and analytics to better understand engagement, identify areas requiring reinforcement and make informed programme decisions.',
	),
	array(
		'number' => '05',
		'title'  => 'Built to Scale ',
		'text'   => 'Create awareness programmes that can support different employee groups, organisational requirements and security priorities as your programme evolves. ',
	),
);
?>

<section
	class="sl-sa-process"
	id="how-the-platform-works"
	aria-labelledby="sl-sa-process-title"
>

	<div class="container">

		<div class="sl-sa-process__layout">

			<div class="sl-sa-process__intro sl-sa-annual-training__heading">

				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'Continuous Security Behaviour Change', 'akaza-adventure' ); ?>
				</span>

				<h2 id="sl-sa-process-title">
					<?php esc_html_e( 'Why SucceedLEARN? ', 'akaza-adventure' ); ?>
					<span><?php esc_html_e( 'Security Awareness Training', 'akaza-adventure' ); ?></span>
				</h2>

				<p>
					<?php
					esc_html_e(
						'Building a security-aware workforce requires more than delivering content. SucceedLEARN brings together multiple security awareness activities so organisations can continuously educate, engage, test, reinforce, and measure employee security behaviour.',
						'akaza-adventure'
					);
					?>
				</p>

			</div>

			<div
				class="sl-sa-process__cards"
				tabindex="0"
				aria-label="<?php esc_attr_e( 'Why SucceedLEARN cards', 'akaza-adventure' ); ?>"
			>
				<div class="sl-sa-process__grid">

					<?php foreach ( $platform_steps as $step ) : ?>

						<article class="sl-sa-annual-training__card">

							<div class="sl-sa-annual-training__title-row">
								<span class="sl-sa-annual-training__number">
									<?php echo esc_html( $step['number'] ); ?>
								</span>
								<h3><?php echo esc_html( $step['title'] ); ?></h3>
							</div>

							<p><?php echo esc_html( $step['text'] ); ?></p>

						</article>

					<?php endforeach; ?>

				</div>
			</div>

		</div>

	</div>

</section>
