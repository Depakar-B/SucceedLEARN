<?php
/**
 * OWASP — Learning experience.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$items = array(
	array(
		'title' => __( 'Real-World Scenarios', 'akaza-adventure' ),
		'text'  => __( 'Situations involving account compromise, unauthorised access, dependency risk, configuration failures and vulnerable workflows.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Simple Analogies', 'akaza-adventure' ),
		'text'  => __( 'Complex security concepts introduced through relatable examples before progressing into technical explanations.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Interactive Knowledge Checks', 'akaza-adventure' ),
		'text'  => __( 'Short checks reinforce concepts throughout the learning journey.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Scenario-Based Assessments', 'akaza-adventure' ),
		'text'  => __( 'Questions test practical understanding instead of relying only on definitions.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Practical Prevention Guidance', 'akaza-adventure' ),
		'text'  => __( 'Each risk category connects the security issue with actions technical teams can take to reduce exposure.', 'akaza-adventure' ),
	),
);
?>

<section class="sl-owasp-experience" aria-labelledby="sl-owasp-experience-title">
	<div class="container">
		<div class="sl-owasp-experience__grid">

			<div class="sl-owasp-experience__heading">
				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'Learning experience', 'akaza-adventure' ); ?>
				</span>
				<h2 id="sl-owasp-experience-title">
					<?php
					echo wp_kses(
						__( 'Practical Learning — <span>Not Just Security Theory</span>', 'akaza-adventure' ),
						array( 'span' => array() )
					);
					?>
				</h2>
				<p class="sl-owasp-experience__lead">
					<?php
					esc_html_e(
						'Application-security training is more effective when learners can connect security concepts to situations they encounter at work.',
						'akaza-adventure'
					);
					?>
				</p>
			</div>

			<div class="sl-owasp-experience__items">
				<?php foreach ( $items as $index => $item ) : ?>
					<div>
						<span><?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?></span>
						<h3 class="sl-panel-title"><?php echo esc_html( $item['title'] ); ?></h3>
						<p><?php echo esc_html( $item['text'] ); ?></p>
					</div>
				<?php endforeach; ?>
			</div>

		</div>
	</div>
</section>
