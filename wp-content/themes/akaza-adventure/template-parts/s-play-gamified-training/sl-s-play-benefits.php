<?php
/**
 * S-Play — Designed Around Active Participation.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$participation_items = array(
	array(
		'title' => __( 'Decision-Based Learning', 'akaza-adventure' ),
		'text'  => __( 'Employees make choices rather than simply being shown the correct answer.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Immediate Feedback', 'akaza-adventure' ),
		'text'  => __( 'Learners can understand whether a decision was appropriate while they are actively engaged with the concept.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Scenario-Based Challenges', 'akaza-adventure' ),
		'text'  => __( 'Security concepts can be placed within situations that require employees to think about how they would respond.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Knowledge Reinforcement', 'akaza-adventure' ),
		'text'  => __( 'Games can revisit cybersecurity concepts employees have encountered through other awareness activities.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Short, Focused Experiences', 'akaza-adventure' ),
		'text'  => __( 'Individual activities provide another way to reinforce awareness without requiring employees to repeatedly complete lengthy courses.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Repeated Engagement', 'akaza-adventure' ),
		'text'  => __( 'Games can be incorporated into ongoing awareness campaigns, creating additional security touchpoints throughout the year.', 'akaza-adventure' ),
	),
);
?>

<section
	class="sl-s-play-benefits"
	aria-labelledby="sl-s-play-benefits-title"
>
	<div class="container">

		<div class="sl-s-play-benefits__intro">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Active Learning', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-s-play-benefits-title">
				<?php esc_html_e( 'Designed Around', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'Active Participation', 'akaza-adventure' ); ?></span>
			</h2>

			<h3 class="sl-s-play-benefits__subtitle">
				<?php esc_html_e( "Employees Don't Just Consume the Learning. They Interact With It.", 'akaza-adventure' ); ?>
			</h3>

			<p>
				<?php
				esc_html_e(
					'S-Play uses different game mechanics to create active learning experiences around cybersecurity.',
					'akaza-adventure'
				);
				?>
			</p>

		</div>

		<div class="sl-s-play-benefits__cards">

			<?php foreach ( $participation_items as $index => $item ) : ?>

				<article class="sl-s-play-benefits__card">
					<span class="sl-s-play-benefits__number" aria-hidden="true">
						<?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?>
					</span>
					<h3 class="sl-panel-title">
						<?php echo esc_html( $item['title'] ); ?>
					</h3>
					<p>
						<?php echo esc_html( $item['text'] ); ?>
					</p>
				</article>

			<?php endforeach; ?>

		</div>

	</div>
</section>
