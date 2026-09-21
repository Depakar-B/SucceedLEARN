<?php
/**
 * Cybersecurity Awareness Month 2026
 * Testing Doesn't Have to Be
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$infosec_testing_image = 'https://succeedlearn.com/wp-content/uploads/2026/09/One-Click-Can-Be-Expensive.webp';
$infosec_testing_local = WP_CONTENT_DIR . '/uploads/2026/09/One-Click-Can-Be-Expensive.webp';

if ( function_exists( 'akaza_upload_url' ) && file_exists( $infosec_testing_local ) ) {
	$infosec_testing_image = akaza_upload_url( '2026/09/One-Click-Can-Be-Expensive.webp' );
}
?>

<section
	id="testing"
	class="sl-infosec-2026-cyber-testing"
	aria-labelledby="sl-infosec-2026-cyber-testing-title"
>
	<div class="container">

		<div class="sl-infosec-2026-cyber-testing__grid">

			<!-- Content -->
			<div class="sl-infosec-2026-cyber-testing__content">

				<span class="sl-home-sub-heading">
					<?php
					esc_html_e(
						'FROM AWARENESS TO ACTION',
						'akaza-adventure'
					);
					?>
				</span>

				<h2 id="sl-infosec-2026-cyber-testing-title">
					<?php
					echo wp_kses_post(
						__(
							'One Click Can Be <span>Expensive.</span> Testing Doesn’t Have to Be.',
							'akaza-adventure'
						)
					);
					?>
				</h2>

				<p>
					<?php
					esc_html_e(
						'Cybersecurity awareness shouldn’t end when an employee completes a course.',
						'akaza-adventure'
					);
					?>
				</p>

				<p>
					<?php
					esc_html_e(
						'A phishing simulation allows you to see how awareness translates into real-world decisions.',
						'akaza-adventure'
					);
					?>
				</p>

				<ul class="sl-infosec-2026-cyber-testing__questions">

					<li>
						<span class="sl-infosec-2026-cyber-testing__question">
							<?php
							esc_html_e(
								'Will employees recognize the warning signs?',
								'akaza-adventure'
							);
							?>
						</span>
					</li>

					<li>
						<span class="sl-infosec-2026-cyber-testing__question">
							<?php
							esc_html_e(
								'Will they resist the click?',
								'akaza-adventure'
							);
							?>
						</span>
					</li>

					<li>
						<span class="sl-infosec-2026-cyber-testing__question">
							<?php
							esc_html_e(
								'Will they know what to do next?',
								'akaza-adventure'
							);
							?>
						</span>
					</li>

					<li>
						<span class="sl-infosec-2026-cyber-testing__question">
							<?php
							esc_html_e(
								'And most importantly: Where can you help them become stronger?',
								'akaza-adventure'
							);
							?>
						</span>
					</li>

				</ul>

				<p>
					<?php
					esc_html_e(
						'This campaign isn’t about catching employees out or highlighting failure.',
						'akaza-adventure'
					);
					?>
				</p>

				<p class="sl-infosec-2026-cyber-testing__emphasis">
					<?php
					esc_html_e(
						"It's about turning employee behavior into an opportunity to learn.",
						'akaza-adventure'
					);
					?>
				</p>

			</div>

			<!-- Image -->
			<div class="sl-infosec-2026-cyber-testing__visual">

				<div class="sl-infosec-2026-cyber-testing__image">
					<img
						src="<?php echo esc_url( $infosec_testing_image ); ?>"
						alt="<?php esc_attr_e( 'One click can be expensive. Testing does not have to be.', 'akaza-adventure' ); ?>"
						width="600"
						height="600"
						loading="lazy"
						decoding="async"
					/>
				</div>

			</div>

		</div>

	</div>
</section>