<?php
/**
 * BFSI & PE/VC — Course Outline (retained from the existing course page).
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$modules = array(
	array(
		'title'  => __( 'Social Engineering', 'akaza-adventure' ),
		'topics' => array(
			__( 'Introduction', 'akaza-adventure' ),
			__( 'Your Role', 'akaza-adventure' ),
			__( 'Types of Phishing', 'akaza-adventure' ),
			__( 'Spot Phishing Scams with the SCAR Test', 'akaza-adventure' ),
			__( 'Calls & Video: Verify with CALL-BACK', 'akaza-adventure' ),
		),
	),
	array(
		'title'  => __( 'Insider Threat', 'akaza-adventure' ),
		'topics' => array(
			__( 'What is an Insider Threat?', 'akaza-adventure' ),
			__( 'Examples of Insider Threats', 'akaza-adventure' ),
			__( 'Preventing Insider Threats', 'akaza-adventure' ),
			__( 'What to Do if You Suspect an Insider Threat?', 'akaza-adventure' ),
			__( 'Consequences of Misuse', 'akaza-adventure' ),
		),
	),
	array(
		'title'  => __( 'Physical Threat', 'akaza-adventure' ),
		'topics' => array(
			__( 'Introduction', 'akaza-adventure' ),
			__( 'Case Study', 'akaza-adventure' ),
			__( 'Your Safeguards', 'akaza-adventure' ),
			__( 'Employee Responsibilities', 'akaza-adventure' ),
			__( 'Consequences of Non-Compliance', 'akaza-adventure' ),
		),
	),
	array(
		'title'  => __( 'Data Privacy Training', 'akaza-adventure' ),
		'topics' => array(
			__( 'Foundations & Principles', 'akaza-adventure' ),
			__( 'Handling Personal Data & Classification', 'akaza-adventure' ),
			__( 'Incident Response & Breach Reporting', 'akaza-adventure' ),
			__( 'Third-Party Sharing & Cross-Border Transfers', 'akaza-adventure' ),
			__( 'Privacy Culture & Responsible AI', 'akaza-adventure' ),
		),
	),
	array(
		'title'  => __( 'Third Party Risk', 'akaza-adventure' ),
		'topics' => array(
			__( 'Why Third-Party Risk Matters', 'akaza-adventure' ),
			__( 'How Your Firm Manages Third-Party Risk', 'akaza-adventure' ),
			__( 'Your Role in Managing Third-Party Risk', 'akaza-adventure' ),
			__( 'Best Practices for Third-Party Data Sharing', 'akaza-adventure' ),
			__( 'Consequences of Non-Compliance', 'akaza-adventure' ),
		),
	),
	array(
		'title'  => __( 'AI Based Attacks', 'akaza-adventure' ),
		'topics' => array(
			__( 'Types of AI-based Attacks', 'akaza-adventure' ),
			__( 'Deepfakes & AI-generated Phishing', 'akaza-adventure' ),
			__( 'Disinformation & Market Manipulation', 'akaza-adventure' ),
			__( 'Learner’s Role', 'akaza-adventure' ),
			__( 'What Happens If You Miss Out', 'akaza-adventure' ),
		),
	),
);
?>

<section
	class="sl-bfsi-outline"
	id="course-outline"
	aria-labelledby="sl-bfsi-outline-title"
>
	<div class="container">

		<div class="sl-bfsi-outline__intro">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Curriculum', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-bfsi-outline-title">
				<?php esc_html_e( 'Course', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'Outline', 'akaza-adventure' ); ?></span>
			</h2>
		</div>

		<div class="sl-bfsi-outline__grid">
			<?php foreach ( $modules as $module ) : ?>
				<article class="sl-bfsi-outline__card">
					<h3 class="sl-panel-title">
						<?php echo esc_html( $module['title'] ); ?>
					</h3>
					<ul>
						<?php foreach ( $module['topics'] as $topic ) : ?>
							<li><?php echo esc_html( $topic ); ?></li>
						<?php endforeach; ?>
					</ul>
				</article>
			<?php endforeach; ?>
		</div>

	</div>
</section>
