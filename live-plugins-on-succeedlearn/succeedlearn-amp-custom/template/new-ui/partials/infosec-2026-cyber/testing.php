<?php
/**
 * Infosec Cybersecurity Awareness Month 2026 AMP - Testing section.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$testing_questions = succeedlearn_amp_infosec_testing_questions();
?>

<section
	class="sl-section sl-infosec-2026-cyber-testing"
	aria-labelledby="sl-infosec-2026-cyber-testing-title"
>
	<div class="sl-wrap">
		<div class="sl-infosec-2026-cyber-testing__grid">
			<div class="sl-infosec-2026-cyber-testing__content">
				<span class="sl-home-sub-heading">
					<?php
					esc_html_e(
						'FROM AWARENESS TO ACTION',
						'succeedlearn-amp'
					);
					?>
				</span>

				<h2
					id="sl-infosec-2026-cyber-testing-title"
					class="sl-h2"
				>
					<?php
					echo wp_kses_post(
						__(
							'One Click Can Be <span>Expensive.</span> Testing Doesn’t Have to Be.',
							'succeedlearn-amp'
						)
					);
					?>
				</h2>

				<p>
					<?php
					esc_html_e(
						'Cybersecurity awareness shouldn’t end when an employee completes a course.',
						'succeedlearn-amp'
					);
					?>
				</p>

				<p>
					<?php
					esc_html_e(
						'A phishing simulation allows you to see how awareness translates into real-world decisions.',
						'succeedlearn-amp'
					);
					?>
				</p>

				<ul class="sl-list sl-infosec-2026-cyber-testing__questions">
					<?php foreach ( $testing_questions as $question ) : ?>
						<li class="sl-list-item">
							<span
								class="sl-infosec-2026-cyber-testing__question-mark"
								aria-hidden="true"
							></span>

							<span class="sl-list-item__text">
								<?php echo esc_html( $question ); ?>
							</span>
						</li>
					<?php endforeach; ?>
				</ul>

				<p>
					<?php
					esc_html_e(
						'This campaign isn’t about catching employees out or highlighting failure.',
						'succeedlearn-amp'
					);
					?>
				</p>

				<p class="sl-infosec-2026-cyber-testing__emphasis">
					<?php
					esc_html_e(
						"It's about turning employee behavior into an opportunity to learn.",
						'succeedlearn-amp'
					);
					?>
				</p>
			</div>

			<div class="sl-infosec-2026-cyber-testing__visual">
				<div class="sl-infosec-2026-cyber-testing__image">
					<amp-img
						src="<?php echo esc_url( succeedlearn_amp_get_infosec_testing_image() ); ?>"
						width="600"
						height="600"
						layout="responsive"
						alt="<?php esc_attr_e( 'One click can be expensive. Testing does not have to be.', 'succeedlearn-amp' ); ?>"
					></amp-img>
				</div>
			</div>
		</div>
	</div>
</section>