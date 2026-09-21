<?php
/**
 * UK Sexual Harassment Prevention Training — Legal Responsibility.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$prevention_points = array(
	__( 'Communicating expected standards of behaviour', 'akaza-adventure' ),
	__( 'Helping workers recognise and report concerns', 'akaza-adventure' ),
	__( 'Reinforcing policies and reporting procedures', 'akaza-adventure' ),
	__( 'Demonstrating an active commitment to prevention', 'akaza-adventure' ),
);
?>

<section
	id="preventive-approach"
	class="sl-uk-sexual-harassment-prevention"
	aria-labelledby="sl-uk-sexual-harassment-prevention-title"
>
	<div class="container">

		<!-- Full-width introduction -->
		<div class="sl-uk-sexual-harassment-prevention__intro">

			<span class="sl-uk-sexual-harassment-prevention__intro-span">
				<?php esc_html_e( 'Prevention is no longer only good practice - it is an active legal responsibility.', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-uk-sexual-harassment-prevention-title">
				<?php esc_html_e( 'Support Your', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'Preventive Approach', 'akaza-adventure' ); ?></span>
			</h2>

			<p>
				<?php esc_html_e( 'Since 26 October 2024, the Worker Protection (Amendment of Equality Act 2010) Act 2023 has required UK employers to take reasonable steps to prevent sexual harassment of their workers, including harassment involving third parties such as customers and clients.', 'akaza-adventure' ); ?>
			</p>

			<p>
				<?php esc_html_e( 'The duty is proactive. Employers are expected to consider workplace risks and introduce appropriate preventive measures rather than waiting for an incident to occur.', 'akaza-adventure' ); ?>
			</p>

			<p>
				<?php esc_html_e( 'From 30 October 2026, this requirement will become stronger: employers will need to demonstrate that they have taken all reasonable steps to prevent sexual harassment.', 'akaza-adventure' ); ?>
			</p>

			<p>
				<?php esc_html_e( 'Failure to meet the duty may lead to enforcement action by the Equality and Human Rights Commission and increased compensation following a successful Employment Tribunal claim.', 'akaza-adventure' ); ?>
			</p>

		</div>

		<!-- Two-column content -->
		<div class="sl-uk-sexual-harassment-prevention__grid">

			<!-- Left: Training support -->
			<div class="sl-uk-sexual-harassment-prevention__content">

				<h3 class="sl-uk-sexual-harassment-prevention__content-title">
					<?php esc_html_e( "Relevant, regularly reviewed training can support an organisation's preventive measures by:", 'akaza-adventure' ); ?>
				</h3>


				<ul class="sl-uk-sexual-harassment-prevention__list">
					<?php foreach ( $prevention_points as $index => $point ) : ?>
						<li class="sl-uk-sexual-harassment-prevention__item">
							<span
								class="sl-uk-sexual-harassment-prevention__number"
								aria-hidden="true"
							>
								<?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?>
							</span>

							<span class="sl-uk-sexual-harassment-prevention__text">
								<?php echo esc_html( $point ); ?>
							</span>
						</li>
					<?php endforeach; ?>
				</ul>

				<p>
					<?php esc_html_e( 'Training should be supported by risk assessment, effective policies, accessible reporting routes and appropriate action when concerns arise.', 'akaza-adventure' ); ?>
				</p>

				<div class="sl-hero-actions">
					<a
						class="sl-hero-btn sl-hero-btn-primary"
						href="#contact"
					>
						<?php esc_html_e( 'Discuss Your Training Requirements', 'akaza-adventure' ); ?>
						<span aria-hidden="true">→</span>
					</a>
				</div>

			</div>

			<!-- Right: Image -->
			<div class="sl-uk-sexual-harassment-prevention__media">
				<div class="sl-uk-sexual-harassment-prevention__image">
					<div
						class="sl-uk-sexual-harassment-prevention__image-placeholder"
						role="img"
						aria-label="<?php esc_attr_e( 'Image Placeholder', 'akaza-adventure' ); ?>"
					>
						<?php esc_html_e( 'Image Placeholder', 'akaza-adventure' ); ?>
					</div>
				</div>
			</div>

		</div>

	</div>
</section>