<?php
/**
 * Responsible Use of Generative AI Training - Support your AI policy with practical awareness.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$gai_questions = array(
	__( 'Is this information appropriate to upload?', 'akaza-adventure' ),
	__( 'Does this use require approval?', 'akaza-adventure' ),
	__( 'Has the output been checked?', 'akaza-adventure' ),
	__( 'Are copyright or regulatory considerations relevant?', 'akaza-adventure' ),
);
?>

<section
	class="sl-gai-policy"
	id="support-your-ai-policy"
	aria-labelledby="sl-gai-policy-title"
>
	<div class="container">

		<div class="sl-gai-policy__content">

			<h2 id="sl-gai-policy-title">
				<?php esc_html_e( 'Support your AI policy', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'with practical awareness', 'akaza-adventure' ); ?></span>
			</h2>

			<div class="sl-gai-policy__copy">
				<p>
					<?php esc_html_e( 'A written policy can set boundaries, but employees also need to recognise when those boundaries apply. Training helps turn organisational expectations into questions people can use in the moment:', 'akaza-adventure' ); ?>
				</p>

				<ul class="sl-gai-policy__questions">
					<?php foreach ( $gai_questions as $gai_question ) : ?>
						<li class="sl-gai-policy__question">
							<strong><?php echo esc_html( $gai_question ); ?></strong>
						</li>
					<?php endforeach; ?>
				</ul>

				<p>
					<?php esc_html_e( 'SucceedLEARN can help organisations connect the course with their internal approach to responsible generative AI use. Any customisation, delivery format, assessment or completion requirement should be confirmed for the selected implementation.', 'akaza-adventure' ); ?>
				</p>
			</div>

			<div class="sl-hero-actions sl-gai-policy__actions">
				<a class="sl-hero-btn sl-hero-btn-primary" href="#contact">
					<?php esc_html_e( 'Request a Demo', 'akaza-adventure' ); ?>
					<span aria-hidden="true"></span>
				</a>
			</div>

		</div>

	</div>
</section>
