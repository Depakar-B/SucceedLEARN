<?php
/**
 * Financial Crime Prevention — CPD certification section.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$cpd_logo = function_exists( 'akaza_upload_url' )
	? akaza_upload_url( '2025/09/image.png' )
	: 'https://succeedlearn.com/wp-content/uploads/2025/09/image.png';
?>

<section
	class="sl-fcp-cpd"
	id="cpd-certification"
	aria-labelledby="sl-fcp-cpd-title"
>
	<div class="container">

		<div class="sl-fcp-cpd__box">

			<div class="sl-fcp-cpd__layout">

				<div class="sl-fcp-cpd__badge-wrap">
					<img
						class="sl-fcp-cpd__logo"
						src="<?php echo esc_url( $cpd_logo ); ?>"
						alt="<?php esc_attr_e( 'The CPD Certification Service', 'akaza-adventure' ); ?>"
						width="180"
						height="220"
						loading="lazy"
						decoding="async"
					>
				</div>

				<div class="sl-fcp-cpd__content">

					<div class="sl-fcp-cpd__heading">
						<span class="sl-home-sub-heading">
							<?php esc_html_e( 'Continuing Professional Development', 'akaza-adventure' ); ?>
						</span>

						<h2 id="sl-fcp-cpd-title">
							<?php esc_html_e( 'CPD-Certified Financial Crime Prevention Courses', 'akaza-adventure' ); ?>
						</h2>
					</div>

					<p class="sl-fcp-cpd__lead">
						<?php
						esc_html_e(
							'CPD stands for Continuing Professional Development. It describes structured learning undertaken by professionals to develop and maintain their knowledge and abilities.',
							'akaza-adventure'
						);
						?>
					</p>

					<div class="sl-fcp-cpd__copy">

						<p>
							<?php
							esc_html_e(
								'CPD certification provides independent recognition that a learning activity has been reviewed against established learning standards. It can help organisations demonstrate a structured approach to professional learning and help learners maintain evidence of their development.',
								'akaza-adventure'
							);
							?>
						</p>

						<p>
							<?php
							esc_html_e(
								'SucceedLEARN’s Financial Crime Prevention courses are CPD certified, supporting both compliance awareness and ongoing professional development.',
								'akaza-adventure'
							);
							?>
						</p>

					</div>

					<div class="sl-fcp-cpd__features">

						<div class="sl-fcp-cpd__feature">
							<?php esc_html_e( 'Structured professional learning', 'akaza-adventure' ); ?>
						</div>

						<div class="sl-fcp-cpd__feature">
							<?php esc_html_e( 'Evidence of completed development', 'akaza-adventure' ); ?>
						</div>

						<div class="sl-fcp-cpd__feature">
							<?php esc_html_e( 'Independently reviewed learning activity', 'akaza-adventure' ); ?>
						</div>

					</div>

					<p class="sl-fcp-cpd__link">
						<?php esc_html_e( 'Learn more from', 'akaza-adventure' ); ?>

						<a
							href="https://cpduk.co.uk/"
							class="sl-fcp-cpd__link-anchor"
							target="_blank"
							rel="noopener noreferrer"
						>
							<?php esc_html_e( 'The CPD Certification Service', 'akaza-adventure' ); ?>
						</a>
					</p>

				</div>

			</div>

		</div>

	</div>
</section>
