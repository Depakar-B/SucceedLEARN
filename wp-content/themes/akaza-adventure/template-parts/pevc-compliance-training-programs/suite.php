<?php
/**
 * PE/VC Homepage — Compliance Suite course grid.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$page_url = static function ( $slug ) {
	return function_exists( 'akaza_page_url' ) ? akaza_page_url( $slug ) : home_url( '/' . trim( $slug, '/' ) . '/' );
};

$courses = array(
	array(
		'num'   => '01',
		'title' => __( 'Security Awareness Training', 'akaza-adventure' ),
		'text'  => __( 'Practical awareness of information-security risks and safer employee behaviours.', 'akaza-adventure' ),
		'href'  => $page_url( 'security-awareness-and-phishing' ),
	),
	array(
		'num'   => '02',
		'title' => __( 'Phishing Simulation', 'akaza-adventure' ),
		'text'  => __( 'Reinforce phishing awareness through realistic simulation exercises.', 'akaza-adventure' ),
		'href'  => $page_url( 's-phish' ),
	),
	array(
		'num'   => '03',
		'title' => __( 'Data Privacy', 'akaza-adventure' ),
		'text'  => __( 'Strengthen responsible handling of personal information and privacy awareness.', 'akaza-adventure' ),
		'href'  => $page_url( 'gdpr-employee-awareness-training' ),
	),
	array(
		'num'   => '04',
		'title' => __( 'Preventing Sexual Harassment', 'akaza-adventure' ),
		'text'  => __( 'Build awareness of workplace conduct and appropriate employee responsibilities.', 'akaza-adventure' ),
		'href'  => $page_url( 'uk-sexual-harassment-prevention-training' ),
	),
	array(
		'num'   => '05',
		'title' => __( 'AML Training', 'akaza-adventure' ),
		'text'  => __( 'KYC, CDD, EDD, MLRO, CFT, CPF and financial-crime awareness.', 'akaza-adventure' ),
		'href'  => $page_url( 'aml-pe-vc' ),
	),
	array(
		'num'   => '06',
		'title' => __( 'Preventing Facilitation of Tax Evasion', 'akaza-adventure' ),
		'text'  => __( 'Build awareness of facilitation risk and unlawful tax-related activity.', 'akaza-adventure' ),
		'href'  => $page_url( 'tax-evasion-facilitation' ),
	),
	array(
		'num'   => '07',
		'title' => __( 'Anti-Bribery and Anti-Corruption', 'akaza-adventure' ),
		'text'  => __( 'Recognise bribery, corruption and inappropriate incentives in business relationships.', 'akaza-adventure' ),
		'href'  => $page_url( 'anti-bribery-anti-corruption' ),
	),
	array(
		'num'   => '08',
		'title' => __( 'Gifts and Entertainment', 'akaza-adventure' ),
		'text'  => __( 'Understand compliance considerations involving gifts, hospitality and entertainment.', 'akaza-adventure' ),
		'href'  => $page_url( 'gifts-and-entertainment' ),
	),
	array(
		'num'   => '09',
		'title' => __( 'Whistleblowing', 'akaza-adventure' ),
		'text'  => __( 'Build awareness of speaking up and appropriate reporting channels.', 'akaza-adventure' ),
		'href'  => $page_url( 'whistleblowing-pe-vc' ),
	),
	array(
		'num'   => '10',
		'title' => __( 'Political Donations', 'akaza-adventure' ),
		'text'  => __( 'Awareness of political donations within organisational governance and compliance.', 'akaza-adventure' ),
		'href'  => $page_url( 'political-donations-pe-vc' ),
	),
	array(
		'num'   => '11',
		'title' => __( 'SMCR Training – Employees', 'akaza-adventure' ),
		'text'  => __( 'Employee-focused awareness of SMCR and regulated-firm conduct responsibilities.', 'akaza-adventure' ),
		'href'  => $page_url( 'smcr-pe-vc' ),
	),
	array(
		'num'   => '12',
		'title' => __( 'SMCR Training – Senior Managers', 'akaza-adventure' ),
		'text'  => __( 'Senior-manager awareness of SMCR, accountability and regulatory responsibilities.', 'akaza-adventure' ),
		'href'  => $page_url( 'smcr-pe-vc' ),
	),
);

$fcp_course = array(
	'num'   => '13',
	'title' => __( 'Financial Crime Prevention Training', 'akaza-adventure' ),
	'text'  => __(
		'Extend employee awareness across financial-crime risks, including AML, CFT and KYC, Anti-Bribery and Anti-Corruption, Preventing Facilitation of Tax Evasion, sanctions, Insider Trading and Market Abuse, and Failure to Prevent Fraud.',
		'akaza-adventure'
	),
	'href'  => $page_url( 'financial-crime-prevention-suite' ),
);
?>
<section
	id="courses"
	class="sl-pevc-suite"
	aria-labelledby="sl-pevc-suite-title"
>
	<div class="container">

		<div class="sl-pevc-suite__intro">
			<div>
				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'The PE/VC Compliance Suite', 'akaza-adventure' ); ?>
				</span>

				<h2 id="sl-pevc-suite-title">
					<?php esc_html_e( 'Essential learning.', 'akaza-adventure' ); ?>
					<span><?php esc_html_e( 'Real-world relevance.', 'akaza-adventure' ); ?></span>
				</h2>

				<p class="sl-pevc-suite__lead">
					<?php
					esc_html_e(
						'A connected compliance learning suite covering regulatory, financial-crime, information-security and workplace risks across PE and VC firms.',
						'akaza-adventure'
					);
					?>
				</p>
			</div>

			<aside class="sl-pevc-suite__offer">
				<span class="sl-pevc-suite__offer-label">
					<?php esc_html_e( 'Complete PE/VC Suite', 'akaza-adventure' ); ?>
				</span>

				<div class="sl-pevc-suite__offer-price">
					<?php esc_html_e( '$2 per user / month', 'akaza-adventure' ); ?>
					<span><?php esc_html_e( 'Billed annually at $24 per user', 'akaza-adventure' ); ?></span>
				</div>

				<a class="sl-content-btn sl-content-btn-primary" href="#contact">
					<?php esc_html_e( 'Request a Demo', 'akaza-adventure' ); ?>
				</a>
			</aside>
		</div>

		<div class="sl-pevc-suite__grid">
			<?php foreach ( $courses as $course ) : ?>
				<article class="sl-pevc-suite__card">
					<span class="sl-pevc-suite__number" aria-hidden="true">
						<?php echo esc_html( $course['num'] ); ?>
					</span>
					<h3><?php echo esc_html( $course['title'] ); ?></h3>
					<p><?php echo esc_html( $course['text'] ); ?></p>
					<a class="sl-pevc-suite__explore" href="<?php echo esc_url( $course['href'] ); ?>">
						<?php esc_html_e( 'Explore More', 'akaza-adventure' ); ?>
					</a>
				</article>
			<?php endforeach; ?>

			<article class="sl-pevc-suite__card sl-pevc-suite__card--fcp">
				<span class="sl-pevc-suite__number" aria-hidden="true">
					<?php echo esc_html( $fcp_course['num'] ); ?>
				</span>
				<div>
					<h3><?php echo esc_html( $fcp_course['title'] ); ?></h3>
					<p><?php echo esc_html( $fcp_course['text'] ); ?></p>
				</div>
				<a class="sl-pevc-suite__explore" href="<?php echo esc_url( $fcp_course['href'] ); ?>">
					<?php esc_html_e( 'Explore More', 'akaza-adventure' ); ?>
				</a>
			</article>
		</div>

	</div>
</section>
