<?php
/**
 * Financial Crime Prevention — eLearning compliance course suite.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$courses = array(
	array(
		'title' => __( 'Anti-Money Laundering (AML)', 'akaza-adventure' ),
		'text'  => __( 'Build awareness of money laundering risks, suspicious activity, customer due diligence, warning signs and appropriate escalation.', 'akaza-adventure' ),
		'link'  => '#',
	),
	array(
		'title' => __( 'Anti-Bribery and Anti-Corruption (ABAC)', 'akaza-adventure' ),
		'text'  => __( 'Help employees recognise bribery and corruption risks involving gifts, hospitality, conflicts, third parties and improper influence.', 'akaza-adventure' ),
		'link'  => '#',
	),
	array(
		'title' => __( 'Preventing Facilitation of Tax Evasion', 'akaza-adventure' ),
		'text'  => __( 'Help employees recognise tax-evasion facilitation risks, suspicious conduct and situations requiring appropriate prevention or escalation.', 'akaza-adventure' ),
		'link'  => '#',
	),
	array(
		'title' => __( 'Insider Trading', 'akaza-adventure' ),
		'text'  => __( 'Build awareness around inside information, confidential information, improper disclosure and responsible handling of market-sensitive data.', 'akaza-adventure' ),
		'link'  => '#',
	),
	array(
		'title' => __( 'Trade Compliance and Sanctions', 'akaza-adventure' ),
		'text'  => __( 'Help employees understand sanctions, restricted parties, high-risk jurisdictions, export controls and cross-border transaction risks.', 'akaza-adventure' ),
		'link'  => '#',
	),
	array(
		'title' => __( 'Failure to Prevent Fraud', 'akaza-adventure' ),
		'text'  => __( 'Develop awareness of fraud risks, associated-person risk, warning signs, preventive actions and reporting responsibilities.', 'akaza-adventure' ),
		'link'  => '#',
	),
	array(
		'title' => __( 'Modern Slavery Awareness', 'akaza-adventure' ),
		'text'  => __( 'Build employee awareness of modern slavery risks and potential concerns within business activities and supply-chain relationships.', 'akaza-adventure' ),
		'link'  => '#',
	),
	array(
		'title' => __( 'Responsible Use of AI', 'akaza-adventure' ),
		'text'  => __( 'Help employees understand responsible workplace use of AI and the importance of applying organisational controls when using AI tools.', 'akaza-adventure' ),
		'link'  => '#',
	),
);
?>
<section id="suite" class="sl-fcp-section sl-fcp-suite" aria-labelledby="sl-fcp-suite-title">
	<div class="container">

		<div class="sl-fcp-suite__header">
			<div class="sl-fcp-suite__copy">
				<p class="sl-fcp-eyebrow">
					<?php esc_html_e( 'Financial Crime Prevention Suite', 'akaza-adventure' ); ?>
				</p>

				<h2 id="sl-fcp-suite-title">
					<?php esc_html_e( 'Explore Our eLearning Compliance Courses', 'akaza-adventure' ); ?>
				</h2>

				<p class="sl-fcp-lead">
					<?php esc_html_e( 'Build employee awareness across financial crime, ethical conduct and emerging compliance risks with practical, role-relevant eLearning.', 'akaza-adventure' ); ?>
				</p>
			</div>

			<div class="sl-fcp-suite__price">
				<a href="#contact" class="sl-fcp-cta sl-fcp-cta--solid" data-cta="fcp-suite-price">
					<?php esc_html_e( 'Grab the whole suite for $1.5 per user per month', 'akaza-adventure' ); ?>
				</a>
			</div>
		</div>

		<div class="sl-fcp-suite__grid">
			<?php foreach ( $courses as $index => $course ) : ?>
				<article class="sl-fcp-suite__card">
					<span class="sl-fcp-suite__number"><?php echo esc_html( sprintf( '%02d', $index + 1 ) ); ?></span>

					<h3><?php echo esc_html( $course['title'] ); ?></h3>

					<p><?php echo esc_html( $course['text'] ); ?></p>

					<a href="<?php echo esc_url( $course['link'] ); ?>" class="sl-fcp-suite__link">
						<?php esc_html_e( 'Explore More', 'akaza-adventure' ); ?>
						<span aria-hidden="true">→</span>
					</a>
				</article>
			<?php endforeach; ?>
		</div>

	</div>
</section>
