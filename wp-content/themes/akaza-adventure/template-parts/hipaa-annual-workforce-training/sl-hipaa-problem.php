<?php
/**
 * HIPAA Problem Section
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$stakeholder_cards = array(
	array(
		'role'        => __( 'Compliance officer', 'akaza-adventure' ),
		'question'    => __( '“Can I show OCR that every person was trained, and when?”', 'akaza-adventure' ),
		'description' => __( 'Documented workforce training is one of the first things examined when an incident is investigated. You get a dated certificate per learner and an exportable coverage report—not a spreadsheet somebody maintains by hand.', 'akaza-adventure' ),
	),
	array(
		'role'        => __( 'Practice or clinic manager', 'akaza-adventure' ),
		'question'    => __( '“Will my staff actually get through it, or will I be chasing people in March?”', 'akaza-adventure' ),
		'description' => __( 'The course is scenario-led rather than narrated slides, and automated reminders chase incomplete learners for you. Across our compliance courses, completion runs at 95 percent.', 'akaza-adventure' ),
	),
	array(
		'role'        => __( 'Business associate', 'akaza-adventure' ),
		'question'    => __( '“My client’s security review is asking for proof of HIPAA training.”', 'akaza-adventure' ),
		'description' => __( 'The completion record is designed to be attached directly to a BAA response or a client questionnaire. The same evidence is ready when the request arrives, with no scrambling to assemble it.', 'akaza-adventure' ),
	),
);
?>

<section
	class="sl-hipaa-problem"
	aria-labelledby="sl-hipaa-problem-title"
>
	<div class="container">

		<header class="sl-hipaa-problem__intro">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'The problem you are actually solving', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-hipaa-problem-title">
				<?php esc_html_e( 'Most HIPAA violations are not hacks. ', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'They are conversations.', 'akaza-adventure' ); ?></span>
			</h2>

			<p>
				<?php
				esc_html_e(
					'A chart discussed in a corridor where a family member could hear it. A record pulled up out of curiosity because the patient was someone the staff member recognised. A discharge summary faxed to the number on the screen rather than the one on the referral. None of these needs a breach of your network to become a reportable incident, and none of them are prevented by a policy nobody read.',
					'akaza-adventure'
				);
				?>
			</p>

		</header>

		<div class="sl-hipaa-problem__grid">

			<?php foreach ( $stakeholder_cards as $card ) : ?>

				<article class="sl-hipaa-problem__card">

					<div class="sl-hipaa-problem__card-head">

						<span class="sl-hipaa-problem__role">
							<?php echo esc_html( $card['role'] ); ?>
						</span>

						<h3>
							<?php echo esc_html( $card['question'] ); ?>
						</h3>

					</div>

					<p>
						<?php echo esc_html( $card['description'] ); ?>
					</p>

				</article>

			<?php endforeach; ?>

		</div>

	</div>
</section>