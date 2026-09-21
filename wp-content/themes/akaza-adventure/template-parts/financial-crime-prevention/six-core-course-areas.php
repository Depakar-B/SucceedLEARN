<?php
/**
 * Financial Crime Prevention — Six core compliance areas section.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$course_areas = array(
	array(
		'category' => __( 'Financial Crime Prevention', 'akaza-adventure' ),
		'title'    => __( 'AML, CFT and KYC Compliance Training', 'akaza-adventure' ),
		'text'     => __( 'Build awareness of money laundering and terrorist financing risks, suspicious activity, customer due diligence, risk-based controls, escalation and reporting.', 'akaza-adventure' ),
		'detail'   => __( 'Help teams recognise red flags when dealing with customers, transactions and business relationships.', 'akaza-adventure' ),
		'link'     => '#',
	),
	array(
		'category' => __( 'Financial Crime Prevention', 'akaza-adventure' ),
		'title'    => __( 'Anti-Bribery and Anti-Corruption Training', 'akaza-adventure' ),
		'text'     => __( 'Help employees understand bribery, corruption, facilitation payments, gifts, hospitality, conflicts of interest and third-party risk.', 'akaza-adventure' ),
		'detail'   => __( 'Support ethical decision-making and help employees recognise when a situation should be escalated.', 'akaza-adventure' ),
		'link'     => '#',
	),
	array(
		'category' => __( 'Financial Crime Prevention', 'akaza-adventure' ),
		'title'    => __( 'Preventing Facilitation of Tax Evasion Training', 'akaza-adventure' ),
		'text'     => __( 'Help employees recognise tax-evasion facilitation risks, suspicious conduct and exposure involving employees or associated persons.', 'akaza-adventure' ),
		'detail'   => __( 'Build awareness of prevention procedures, responsible conduct and internal reporting routes.', 'akaza-adventure' ),
		'link'     => '#',
	),
	array(
		'category' => __( 'Financial Crime Prevention', 'akaza-adventure' ),
		'title'    => __( 'Insider Trading and Market Abuse Training', 'akaza-adventure' ),
		'text'     => __( 'Explain risks involving inside information, confidential information, personal dealing, improper disclosure and market abuse.', 'akaza-adventure' ),
		'detail'   => __( 'Support responsible handling of sensitive information and compliant trading decisions.', 'akaza-adventure' ),
		'link'     => '#',
	),
	array(
		'category' => __( 'Financial Crime Prevention', 'akaza-adventure' ),
		'title'    => __( 'Trade Compliance and Sanctions Training', 'akaza-adventure' ),
		'text'     => __( 'Build awareness of sanctions, restricted parties, high-risk jurisdictions, export controls and cross-border transaction risks.', 'akaza-adventure' ),
		'detail'   => __( 'Help employees identify concerns before proceeding with a potentially restricted activity.', 'akaza-adventure' ),
		'link'     => '#',
	),
	array(
		'category' => __( 'Financial Crime Prevention', 'akaza-adventure' ),
		'title'    => __( 'Failure to Prevent Fraud Training', 'akaza-adventure' ),
		'text'     => __( 'Build employee awareness of the Failure to Prevent Fraud offencethrough practical, real-world scenarios.', 'akaza-adventure' ),
		'detail'   => __( 'The course covers fraud risks,associated persons, red flags, preventive controls, reporting proceduresand everyday actions that help protect the organisation from fraud.', 'akaza-adventure' ),
		'link'     => '#',
	),
);
?>
<section
	id="six-core-course-areas"
	class="sl-fcp-course-areas"
	aria-labelledby="sl-fcp-course-areas-title"
>
	<div class="container">

		<div class="sl-fcp-course-areas__heading">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Financial Crime Prevention Suite', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-fcp-course-areas-title">
				<?php esc_html_e( 'Six Core Compliance Areas Covered in Financial Crime Prevention Training', 'akaza-adventure' ); ?>
			</h2>

			<p>
				<?php esc_html_e( 'The suite brings together focused eLearning courses that can support different employee roles, business functions, jurisdictions and compliance priorities.', 'akaza-adventure' ); ?>
			</p>
		</div>

		<div class="sl-fcp-course-areas__grid">
			<?php foreach ( $course_areas as $course_area ) : ?>
				<article class="sl-fcp-course-areas__card">
					<div class="sl-fcp-course-areas__card-label">
						<?php echo esc_html( $course_area['category'] ); ?>
					</div>

					<h3><?php echo esc_html( $course_area['title'] ); ?></h3>

					<p><?php echo esc_html( $course_area['text'] ); ?></p>

					<p><?php echo esc_html( $course_area['detail'] ); ?></p>

					<a href="<?php echo esc_url( $course_area['link'] ); ?>" class="sl-fcp-course-areas__link">
						<?php esc_html_e( 'Explore', 'akaza-adventure' ); ?>
						<span aria-hidden="true">→</span>
					</a>
				</article>
			<?php endforeach; ?>
		</div>

	</div>
</section>
