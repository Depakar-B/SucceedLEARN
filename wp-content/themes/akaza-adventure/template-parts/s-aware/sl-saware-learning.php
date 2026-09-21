<?php
/**
 * SucceedLEARN — S-Aware
 *
 * Section: Designed Around How Employees Actually Learn
 * Circular orbit UI matches SAP behaviour cycle.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$learning_cards = array(
	array(
		'number' => '01',
		'title'  => __( 'Scenario-Based Learning', 'akaza-adventure' ),
		'body'   => __(
			'Put security concepts into context through realistic workplace situations that encourage employees to think about how they would respond.',
			'akaza-adventure'
		),
		'angle'  => 0,
	),
	array(
		'number' => '02',
		'title'  => __( 'Interactive Learning Experiences', 'akaza-adventure' ),
		'body'   => __(
			'Move beyond passive content consumption with interactions, knowledge checks and assessments that encourage active participation throughout the learning journey.',
			'akaza-adventure'
		),
		'angle'  => 68,
	),
	array(
		'number' => '03',
		'title'  => __( 'Practical Cybersecurity Knowledge', 'akaza-adventure' ),
		'body'   => __(
			'Translate security concepts and policies into practical actions employees can apply during their everyday work.',
			'akaza-adventure'
		),
		'angle'  => 128,
	),
	array(
		'number' => '04',
		'title'  => __( 'Relevant, Accessible Learning', 'akaza-adventure' ),
		'body'   => __(
			'Deliver security awareness in a format designed for employees across roles, departments and levels of technical expertise.',
			'akaza-adventure'
		),
		'angle'  => 232,
	),
	array(
		'number' => '05',
		'title'  => __( 'Continuous Knowledge Building', 'akaza-adventure' ),
		'body'   => __(
			'Use S-Aware as the foundation of a wider programme in which knowledge can be reinforced throughout the year through additional SBCS interventions.',
			'akaza-adventure'
		),
		'angle'  => 292,
	),
);
?>

<section
	class="sl-saware-learning"
	aria-labelledby="sl-saware-learning-title"
>
	<div class="container">

		<div class="sl-saware-learning__intro">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'How Employees Learn', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-saware-learning-title">
				<?php esc_html_e( 'Designed Around How Employees', 'akaza-adventure' ); ?>
				<span>
					<?php esc_html_e( 'Actually Learn', 'akaza-adventure' ); ?>
				</span>
			</h2>

			<p>
				<?php
				esc_html_e(
					'Effective security awareness goes beyond policy documents, lengthy presentations and information-heavy courses. Employees retain knowledge better when they experience realistic situations, make decisions, receive immediate feedback, and revisit concepts regularly.',
					'akaza-adventure'
				);
				?>
			</p>

			<p>
				<?php
				esc_html_e(
					'S-Aware combines these learning principles to create awareness programmes that are engaging, measurable, and applicable to everyday work.',
					'akaza-adventure'
				);
				?>
			</p>

		</div>

		<div class="sl-saware-learning__cycle">

			<div class="sl-saware-learning__ring" aria-hidden="true"></div>

			<div class="sl-saware-learning__centre">
				<p class="sl-saware-learning__centre-line">
					<?php esc_html_e( 'User', 'akaza-adventure' ); ?>
				</p>
				<p class="sl-saware-learning__centre-line">
					<?php esc_html_e( 'Learning', 'akaza-adventure' ); ?>
				</p>
			</div>

			<?php foreach ( $learning_cards as $card ) : ?>
				<article
					class="sl-saware-learning__card sl-saware-learning__card--<?php echo esc_attr( $card['number'] ); ?>"
					style="--sl-saware-orbit-angle: <?php echo esc_attr( (string) (int) $card['angle'] ); ?>deg;"
				>
					<span class="sl-saware-learning__number" aria-hidden="true">
						<?php echo esc_html( $card['number'] ); ?>
					</span>
					<div class="sl-saware-learning__card-body">
						<h3 class="sl-panel-title">
							<?php echo esc_html( $card['title'] ); ?>
						</h3>
						<p>
							<?php echo esc_html( $card['body'] ); ?>
						</p>
					</div>
				</article>
			<?php endforeach; ?>

		</div>

	</div>
</section>
