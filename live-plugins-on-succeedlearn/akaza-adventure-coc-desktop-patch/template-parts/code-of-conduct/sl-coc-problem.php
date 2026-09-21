<?php
/**
 * Code of Conduct — Business Problem section.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$problem_cards = array(
	array(
		'title' => __( 'Policy Without Understanding', 'akaza-adventure' ),
		'text'  => __( 'Employees may acknowledge policies without fully understanding what they mean in everyday situations.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Low Engagement', 'akaza-adventure' ),
		'text'  => __( 'Long, information-heavy compliance courses can encourage employees to complete training rather than genuinely learn from it.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Inconsistent Decisions', 'akaza-adventure' ),
		'text'  => __( 'Without practical examples, employees may interpret the same ethical situation differently.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Delayed Reporting', 'akaza-adventure' ),
		'text'  => __( 'Employees who do not understand reporting procedures may hesitate to raise concerns.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Limited Compliance Visibility', 'akaza-adventure' ),
		'text'  => __( 'Organisations need evidence of training completion, assessment performance and policy acknowledgement to support governance and audit requirements.', 'akaza-adventure' ),
	),
);
?>

<section class="sl-coc-problem" aria-labelledby="sl-coc-problem-title">
	<div class="container">

		<div class="sl-coc-problem__heading">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Business Problem', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-coc-problem-title">
				<?php
				echo wp_kses(
					__( 'What Happens When Employees <span>Don\'t Understand the Code?</span>', 'akaza-adventure' ),
					array( 'span' => array() )
				);
				?>
			</h2>

			<p>
				<?php esc_html_e( 'Organisations may have comprehensive policies and still experience compliance failures.', 'akaza-adventure' ); ?>
			</p>
		</div>

		<div class="sl-coc-problem__grid">
			<?php foreach ( $problem_cards as $index => $card ) : ?>
				<article class="sl-coc-problem__card">
					<span class="sl-coc-problem__number">
						<?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?>
					</span>

					<h3 class="sl-panel-title">
						<?php echo esc_html( $card['title'] ); ?>
					</h3>

					<p>
						<?php echo esc_html( $card['text'] ); ?>
					</p>
				</article>
			<?php endforeach; ?>
		</div>

		<div class="sl-coc-section-close">
			<p class="sl-coc-section-close__text">
				<?php esc_html_e( 'A policy cannot anticipate every situation. Effective training helps employees develop the judgement required to apply organisational values when situations are unclear.', 'akaza-adventure' ); ?>
			</p>

			<div class="sl-coc-section-close__actions">
				<a class="sl-content-btn sl-content-btn-primary" href="#contact" data-cta="coc-problem-demo">
					<?php esc_html_e( 'Explore Code of Conduct Training', 'akaza-adventure' ); ?>
					<span aria-hidden="true">→</span>
				</a>
			</div>
		</div>

	</div>
</section>
