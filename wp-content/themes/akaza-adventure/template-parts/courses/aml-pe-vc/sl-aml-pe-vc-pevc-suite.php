<?php
/**
 * SucceedLEARN
 * AML Training for PE/VC — PE/VC Compliance Suite
 *
 * @package Akaza_Adventure
 */

defined( 'ABSPATH' ) || exit;

$courses = array(
	array(
		'num'    => '01',
		'title'  => __( 'Security Awareness Training', 'akaza-adventure' ),
		'text'   => __( 'Build practical awareness of cyber security, information protection and safer employee behaviours.', 'akaza-adventure' ),
		'href'   => '#contact',
		'active' => false,
	),
	array(
		'num'    => '02',
		'title'  => __( 'Phishing Simulation', 'akaza-adventure' ),
		'text'   => __( 'Reinforce phishing awareness through realistic simulation exercises.', 'akaza-adventure' ),
		'href'   => '#contact',
		'active' => false,
	),
	array(
		'num'    => '03',
		'title'  => __( 'Data Privacy', 'akaza-adventure' ),
		'text'   => __( 'Strengthen responsible handling of personal information and privacy awareness.', 'akaza-adventure' ),
		'href'   => '#contact',
		'active' => false,
	),
	array(
		'num'    => '04',
		'title'  => __( 'Preventing Sexual Harassment', 'akaza-adventure' ),
		'text'   => __( 'Build awareness of workplace conduct and appropriate employee responsibilities.', 'akaza-adventure' ),
		'href'   => '#contact',
		'active' => false,
	),
	array(
		'num'    => '05',
		'title'  => __( 'AML Training', 'akaza-adventure' ),
		'text'   => __( 'KYC, CDD, EDD, MLRO, CFT, CPF and practical financial crime awareness.', 'akaza-adventure' ),
		'href'   => '#overview',
		'active' => true,
	),
	array(
		'num'    => '06',
		'title'  => __( 'Preventing Facilitation of Tax Evasion', 'akaza-adventure' ),
		'text'   => __( 'Build awareness of facilitation risk and unlawful tax-related activity.', 'akaza-adventure' ),
		'href'   => '#contact',
		'active' => false,
	),
	array(
		'num'    => '07',
		'title'  => __( 'Anti-Bribery and Anti-Corruption', 'akaza-adventure' ),
		'text'   => __( 'Recognise bribery, corruption and inappropriate incentives in business relationships.', 'akaza-adventure' ),
		'href'   => '#contact',
		'active' => false,
	),
	array(
		'num'    => '08',
		'title'  => __( 'Gifts and Entertainment', 'akaza-adventure' ),
		'text'   => __( 'Understand compliance considerations involving gifts, hospitality and entertainment.', 'akaza-adventure' ),
		'href'   => '#contact',
		'active' => false,
	),
	array(
		'num'    => '09',
		'title'  => __( 'Whistleblowing', 'akaza-adventure' ),
		'text'   => __( 'Build awareness of speaking up and appropriate reporting channels.', 'akaza-adventure' ),
		'href'   => '#contact',
		'active' => false,
	),
	array(
		'num'    => '10',
		'title'  => __( 'Political Donations', 'akaza-adventure' ),
		'text'   => __( 'Awareness of political donations within organisational governance and compliance.', 'akaza-adventure' ),
		'href'   => '#contact',
		'active' => false,
	),
	array(
		'num'    => '11',
		'title'  => __( 'SMCR Training – Employees', 'akaza-adventure' ),
		'text'   => __( 'Employee-focused awareness of SMCR and regulated-firm conduct responsibilities.', 'akaza-adventure' ),
		'href'   => '#contact',
		'active' => false,
	),
	array(
		'num'    => '12',
		'title'  => __( 'SMCR Training – Senior Managers', 'akaza-adventure' ),
		'text'   => __( 'Senior-manager awareness of SMCR, accountability and regulatory responsibilities.', 'akaza-adventure' ),
		'href'   => '#contact',
		'active' => false,
	),
	array(
		'num'    => '13',
		'title'  => __( 'Includes All Financial Crime Prevention Courses', 'akaza-adventure' ),
		'text'   => __( 'Access the wider Financial Crime Prevention learning range as part of the broader PE/VC compliance proposition.', 'akaza-adventure' ),
		'href'   => '#fcp-suite',
		'active' => false,
	),
);
?>

<section
	id="pevc-suite"
	class="sl-aml-pe-vc-pevc-suite"
	aria-labelledby="sl-aml-pe-vc-pevc-suite-title"
>
	<div class="container">

		<div class="sl-aml-pe-vc-pevc-suite__header">
			<div>
				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'PE/VC Compliance Learning Suite', 'akaza-adventure' ); ?>
				</span>

				<h2 id="sl-aml-pe-vc-pevc-suite-title">
					<?php
					echo wp_kses_post(
						__(
							'AML Is Part of a Comprehensive <span>PE/VC Compliance Suite</span>',
							'akaza-adventure'
						)
					);
					?>
				</h2>

				<p>
					<?php
					esc_html_e(
						'Extend AML awareness into a broader compliance programme covering cyber security, conduct, financial crime and regulated-firm responsibilities.',
						'akaza-adventure'
					);
					?>
				</p>
			</div>

			<a class="sl-content-btn sl-content-btn-primary" href="#contact">
				<?php esc_html_e( 'Avail the Whole Suite at $2/user/month', 'akaza-adventure' ); ?>
			</a>
		</div>

		<div class="sl-aml-pe-vc-pevc-suite__pricing">
			<span class="sl-aml-pe-vc-pevc-suite__note">
				<?php esc_html_e( 'Individual AML course:', 'akaza-adventure' ); ?>
				<strong>$20</strong>
			</span>
			<span class="sl-aml-pe-vc-pevc-suite__note">
				<?php esc_html_e( 'PE/VC Suite:', 'akaza-adventure' ); ?>
				<strong><?php esc_html_e( '$2/user/month for organisations with 10+ users', 'akaza-adventure' ); ?></strong>
			</span>
		</div>

		<div class="sl-aml-pe-vc-pevc-suite__grid">
			<?php foreach ( $courses as $course ) : ?>
				<article
					class="sl-aml-pe-vc-pevc-suite__tile<?php echo $course['active'] ? ' is-active' : ''; ?>"
				>
					<span class="sl-aml-pe-vc-pevc-suite__num" aria-hidden="true">
						<?php echo esc_html( $course['num'] ); ?>
					</span>
					<h3><?php echo esc_html( $course['title'] ); ?></h3>
					<p><?php echo esc_html( $course['text'] ); ?></p>
					<a class="sl-aml-pe-vc-pevc-suite__cta" href="<?php echo esc_url( $course['href'] ); ?>">
						<?php esc_html_e( 'Explore More →', 'akaza-adventure' ); ?>
					</a>
				</article>
			<?php endforeach; ?>
		</div>

	</div>
</section>
