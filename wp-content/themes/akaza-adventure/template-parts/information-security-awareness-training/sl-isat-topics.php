<?php
/**
 * Information Security Awareness Training - Topics covered.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$topics = array(
	__( 'Account Security', 'akaza-adventure' ),
	__( 'AI-Based Attack', 'akaza-adventure' ),
	__( 'Data Classification', 'akaza-adventure' ),
	__( 'Malware', 'akaza-adventure' ),
	__( 'Physical Security', 'akaza-adventure' ),
	__( 'Remote Work Security', 'akaza-adventure' ),
	__( 'Social Engineering', 'akaza-adventure' ),
	__( 'Vendor and Third-Party Risk Management', 'akaza-adventure' ),
	__( 'Incident Reporting', 'akaza-adventure' ),
	__( 'Insider Threat', 'akaza-adventure' ),
);
?>

<section
	class="sl-isat-topics"
	id="information-security-topics-covered"
	aria-labelledby="sl-isat-topics-title"
>
	<div class="container">

		<div class="sl-isat-topics__heading">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Course Coverage', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-isat-topics-title">
				<?php esc_html_e( 'Information Security', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'Topics Covered', 'akaza-adventure' ); ?></span>
			</h2>

			<p>
				<?php esc_html_e( 'The course covers essential information security risks and behaviors employees should understand when handling organizational systems, information, and digital tools.', 'akaza-adventure' ); ?>
			</p>
		</div>

		<ul class="sl-isat-topics__list">
			<?php foreach ( $topics as $topic ) : ?>
				<li class="sl-isat-topics__item"><?php echo esc_html( $topic ); ?></li>
			<?php endforeach; ?>
		</ul>

	</div>
</section>
