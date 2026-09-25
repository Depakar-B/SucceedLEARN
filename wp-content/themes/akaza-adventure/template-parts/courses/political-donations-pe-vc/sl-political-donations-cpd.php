<?php
/**
 * SucceedLEARN
 * Political Donations Training for PE/VC — CPD Certification
 *
 * @package Akaza_Adventure
 */

defined( 'ABSPATH' ) || exit;

$cpd_logo = 'https://succeedlearn.com/wp-content/uploads/2026/09/CPD.webp';
?>

<section
	id="cpd-certification"
	class="sl-political-donations-cpd"
	aria-labelledby="sl-political-donations-cpd-title"
>
	<div class="container">
		<div class="sl-political-donations-cpd__main">

			<div class="sl-political-donations-cpd__mark">
				<img
					class="sl-political-donations-cpd__logo"
					src="<?php echo esc_url( $cpd_logo ); ?>"
					alt="<?php esc_attr_e( 'The CPD Certification Service', 'akaza-adventure' ); ?>"
					width="140"
					height="140"
					loading="lazy"
					decoding="async"
				>
			</div>

			<div class="sl-political-donations-cpd__copy">
				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'Certification', 'akaza-adventure' ); ?>
				</span>

				<h2 id="sl-political-donations-cpd-title">
					<?php
					echo wp_kses(
						__( 'CPD <span>Certification</span>', 'akaza-adventure' ),
						array( 'span' => array() )
					);
					?>
				</h2>

				<p>
					<?php
					esc_html_e(
						'Selected SucceedLEARN courses are CPD certified, helping learners build practical compliance knowledge while supporting continuing professional development.',
						'akaza-adventure'
					);
					?>
				</p>

				<div class="sl-political-donations-cpd__highlights">
					<div class="sl-political-donations-cpd__highlight">
						<strong aria-hidden="true">✓</strong>
						<?php esc_html_e( 'Structured Professional Learning', 'akaza-adventure' ); ?>
					</div>
					<div class="sl-political-donations-cpd__highlight">
						<strong aria-hidden="true">✓</strong>
						<?php esc_html_e( 'Practical Compliance Awareness', 'akaza-adventure' ); ?>
					</div>
					<div class="sl-political-donations-cpd__highlight">
						<strong aria-hidden="true">✓</strong>
						<?php esc_html_e( 'Supports Continuing Development', 'akaza-adventure' ); ?>
					</div>
				</div>

				<p class="sl-political-donations-cpd__disclaimer">
					<?php esc_html_e( '*CPD certification applies to selected courses only.', 'akaza-adventure' ); ?>
				</p>
			</div>

		</div>
	</div>
</section>
