<?php
/**
 * Inclusive Workplace Training — Make the training recognisably yours.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$customise_items = array(
	__( 'Your organisation’s branding', 'akaza-adventure' ),
	__( 'Equality, discrimination and anti-harassment policies', 'akaza-adventure' ),
	__( 'Codes of conduct', 'akaza-adventure' ),
	__( 'Reporting and escalation routes', 'akaza-adventure' ),
	__( 'HR and employee-support contacts', 'akaza-adventure' ),
	__( 'Leadership messages', 'akaza-adventure' ),
	__( 'Relevant workplace examples', 'akaza-adventure' ),
	__( 'Industry- or role-specific scenarios', 'akaza-adventure' ),
	__( 'Regional terminology', 'akaza-adventure' ),
	__( 'Assessment and completion requirements', 'akaza-adventure' ),
);
?>
<section class="sl-inclusive-customise" id="inclusive-customise" aria-labelledby="sl-inclusive-customise-heading">
	<div class="container-xl">
		<div class="sl-inclusive-customise__inner">

			<h2 id="sl-inclusive-customise-heading">
				<?php esc_html_e( 'Make the training recognisably yours', 'akaza-adventure' ); ?>
			</h2>

			<p>
				<?php esc_html_e( 'Generic training can feel distant from employees’ day-to-day experience. Relevant organisational details help learners understand how the subject connects to their workplace.', 'akaza-adventure' ); ?>
			</p>

			<h3 class="sl-inclusive-customise__list-intro">
				<?php esc_html_e( 'Depending on your requirements, courses may be tailored to include:', 'akaza-adventure' ); ?>
			</h3>

			<ul class="sl-inclusive-customise__list" role="list">
				<?php foreach ( $customise_items as $item ) : ?>
					<li>
						<span class="sl-inclusive-customise__icon" aria-hidden="true">
							<i class="bi bi-check2"></i>
						</span>
						<span><?php echo esc_html( $item ); ?></span>
					</li>
				<?php endforeach; ?>
			</ul>

			<p class="sl-inclusive-customise__closing">
				<?php esc_html_e( 'Speak with SucceedLearn about the customisation available for your chosen module.', 'akaza-adventure' ); ?>
			</p>

			<div class="sl-inclusive-customise__actions">
				<a href="#contact" class="sl-content-btn sl-content-btn-primary">
					<?php esc_html_e( 'Request a Demo', 'akaza-adventure' ); ?>
				</a>
			</div>

		</div>
	</div>
</section>
