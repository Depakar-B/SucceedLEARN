<?php
/**
 * ISO 27001:2022 Staff Awareness Training - What Employees Will Learn.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$learn_items = array(
	__( 'Understand the purpose of ISO/IEC 27001:2022 and why information security matters.', 'akaza-adventure' ),
	__( 'Understand the role of an Information Security Management System (ISMS).', 'akaza-adventure' ),
	__( 'Explain the principles of Confidentiality, Integrity and Availability (CIA).', 'akaza-adventure' ),
	__( 'Recognize their individual responsibilities for protecting organizational information.', 'akaza-adventure' ),
	__( 'Understand information security risks and the importance of appropriate controls.', 'akaza-adventure' ),
	__( 'Follow organizational information security policies and procedures.', 'akaza-adventure' ),
	__( 'Recognize common information security threats and unsafe behaviors.', 'akaza-adventure' ),
	__( 'Handle information and organizational assets more securely.', 'akaza-adventure' ),
	__( 'Identify and report information security incidents through appropriate organizational channels.', 'akaza-adventure' ),
	__( 'Understand how their everyday behavior contributes to the effectiveness of the organization\'s ISMS.', 'akaza-adventure' ),
);
?>

<section
	class="sl-iso27-learn"
	id="what-employees-will-learn"
	aria-labelledby="sl-iso27-learn-title"
>
	<div class="container">

		<div class="sl-iso27-learn__intro">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Learning Outcomes', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-iso27-learn-title">
				<?php esc_html_e( 'What will', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'Employees Learn?', 'akaza-adventure' ); ?></span>
			</h2>

			<p>
				<?php esc_html_e( 'By the end of the ISO 27001:2022 Staff Awareness Training, learners should be able to:', 'akaza-adventure' ); ?>
			</p>
		</div>

		<ul class="sl-iso27-learn__list">
			<?php foreach ( $learn_items as $item ) : ?>
				<li><?php echo esc_html( $item ); ?></li>
			<?php endforeach; ?>
		</ul>

	</div>
</section>
