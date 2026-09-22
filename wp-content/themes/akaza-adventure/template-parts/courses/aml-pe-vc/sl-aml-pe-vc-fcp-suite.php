<?php
/**
 * SucceedLEARN
 * AML Training for PE/VC — FCP Suite
 *
 * @package Akaza_Adventure
 */

defined( 'ABSPATH' ) || exit;

$courses = array(
	array(
		'num'    => '01',
		'title'  => __( 'AML Training', 'akaza-adventure' ),
		'text'   => __( 'Build awareness of KYC, CDD, EDD, MLRO responsibilities, CFT, CPF and key financial crime risks.', 'akaza-adventure' ),
		'href'   => '#overview',
		'active' => true,
	),
	array(
		'num'    => '02',
		'title'  => __( 'Anti-Bribery and Anti-Corruption (ABAC)', 'akaza-adventure' ),
		'text'   => __( 'Build awareness of bribery, corruption and inappropriate incentives in commercial activity.', 'akaza-adventure' ),
		'href'   => '#contact',
		'active' => false,
	),
	array(
		'num'    => '03',
		'title'  => __( 'Preventing Facilitation of Tax Evasion', 'akaza-adventure' ),
		'text'   => __( 'Recognise risks associated with enabling or facilitating unlawful tax evasion.', 'akaza-adventure' ),
		'href'   => '#contact',
		'active' => false,
	),
	array(
		'num'    => '04',
		'title'  => __( 'Insider Trading', 'akaza-adventure' ),
		'text'   => __( 'Build awareness of confidential information and risks associated with improper trading activity.', 'akaza-adventure' ),
		'href'   => '#contact',
		'active' => false,
	),
	array(
		'num'    => '05',
		'title'  => __( 'Trade Compliance and Sanctions', 'akaza-adventure' ),
		'text'   => __( 'Understand sanctions and trade-related compliance risks affecting transactions and counterparties.', 'akaza-adventure' ),
		'href'   => '#contact',
		'active' => false,
	),
	array(
		'num'    => '06',
		'title'  => __( 'Failure to Prevent Fraud', 'akaza-adventure' ),
		'text'   => __( 'Build awareness of fraud risk, organisational responsibility and preventive controls.', 'akaza-adventure' ),
		'href'   => '#contact',
		'active' => false,
	),
	array(
		'num'    => '07',
		'title'  => __( 'Modern Slavery Awareness', 'akaza-adventure' ),
		'text'   => __( 'Build awareness of modern slavery risks and why responsible business practices, supply-chain awareness and appropriate escalation matter.', 'akaza-adventure' ),
		'href'   => '#contact',
		'active' => false,
	),
);
?>

<section
	id="fcp-suite"
	class="sl-aml-pe-vc-fcp-suite"
	aria-labelledby="sl-aml-pe-vc-fcp-suite-title"
>
	<div class="container">

		<div class="sl-aml-pe-vc-fcp-suite__header">
			<div>
				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'Financial Crime Prevention Learning Suite', 'akaza-adventure' ); ?>
				</span>

				<h2 id="sl-aml-pe-vc-fcp-suite-title">
					<?php
					echo wp_kses_post(
						__(
							'AML Is Part of a Comprehensive <span>Financial Crime Prevention Suite</span>',
							'akaza-adventure'
						)
					);
					?>
				</h2>

				<p>
					<?php
					esc_html_e(
						'Extend AML awareness across a wider financial crime learning programme with complementary compliance courses.',
						'akaza-adventure'
					);
					?>
				</p>
			</div>

			<a class="sl-content-btn sl-content-btn-primary" href="#contact">
				<?php esc_html_e( 'Avail the Whole Suite at $1.5/user/month', 'akaza-adventure' ); ?>
			</a>
		</div>

		<div class="sl-aml-pe-vc-fcp-suite__pricing">
			<span class="sl-aml-pe-vc-fcp-suite__note">
				<?php esc_html_e( 'Individual AML course:', 'akaza-adventure' ); ?>
				<strong>$20</strong>
			</span>
			<span class="sl-aml-pe-vc-fcp-suite__note">
				<?php esc_html_e( 'FCP Suite:', 'akaza-adventure' ); ?>
				<strong><?php esc_html_e( '$1.50/user/month for organisations with 10+ users', 'akaza-adventure' ); ?></strong>
			</span>
			<span class="sl-aml-pe-vc-fcp-suite__note">
				<?php esc_html_e( 'Equivalent to:', 'akaza-adventure' ); ?>
				<strong>$18/user/year</strong>
			</span>
		</div>

		<div class="sl-aml-pe-vc-fcp-suite__grid">
			<?php foreach ( $courses as $course ) : ?>
				<article
					class="sl-aml-pe-vc-fcp-suite__card<?php echo $course['active'] ? ' is-active' : ''; ?>"
				>
					<div class="sl-aml-pe-vc-fcp-suite__chrome">
						<span class="sl-aml-pe-vc-fcp-suite__dash" aria-hidden="true"></span>
						<span class="sl-aml-pe-vc-fcp-suite__num" aria-hidden="true">
							<?php echo esc_html( $course['num'] ); ?>
						</span>
					</div>
					<h3><?php echo esc_html( $course['title'] ); ?></h3>
					<p><?php echo esc_html( $course['text'] ); ?></p>
					<a class="sl-aml-pe-vc-fcp-suite__cta" href="<?php echo esc_url( $course['href'] ); ?>">
						<?php esc_html_e( 'Explore More →', 'akaza-adventure' ); ?>
					</a>
				</article>
			<?php endforeach; ?>
		</div>

	</div>
</section>
