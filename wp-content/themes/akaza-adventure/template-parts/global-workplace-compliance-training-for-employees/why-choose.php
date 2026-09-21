<?php
/**
 * Global Workplace Compliance Training for Employees — Why Choose section.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$why_choose_cards = array(
	array(
		'icon'  => 'bi-signpost-split',
		'title' => __( 'Scenario-Based Learning', 'akaza-adventure' ),
		'text'  => __( 'Learners practise making decisions in realistic workplace situations that reflect everyday challenges.', 'akaza-adventure' ),
	),
	array(
		'icon'  => 'bi-globe2',
		'title' => __( 'Globally Relevant Content', 'akaza-adventure' ),
		'text'  => __( 'Learning experiences designed for international workforces across industries and cultures.', 'akaza-adventure' ),
	),
	array(
		'icon'  => 'bi-graph-up-arrow',
		'title' => __( 'Behaviour-Focused Learning', 'akaza-adventure' ),
		'text'  => __( 'Training that encourages lasting behaviour change rather than short-term knowledge retention.', 'akaza-adventure' ),
	),
	array(
		'icon'  => 'bi-play-circle',
		'title' => __( 'Interactive Learning Experience', 'akaza-adventure' ),
		'text'  => __( 'Videos, branching scenarios, reflection activities, and knowledge checks improve engagement and learning outcomes.', 'akaza-adventure' ),
	),
	array(
		'icon'  => 'bi-universal-access',
		'title' => __( 'Accessible Learning Design', 'akaza-adventure' ),
		'text'  => __( 'Built using accessibility and inclusive learning principles to support diverse learners.', 'akaza-adventure' ),
	),
	array(
		'icon'  => 'bi-puzzle',
		'title' => __( 'LMS Compatible', 'akaza-adventure' ),
		'text'  => __( 'Seamlessly integrates with leading Learning Management Systems and enterprise learning platforms.', 'akaza-adventure' ),
	),
);
?>
<section class="sl-global-why-section" aria-labelledby="sl-global-why-heading">

	<div class="container">

		<div class="sl-global-why-heading">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Why SucceedLEARN', 'akaza-adventure' ); ?>
			</span>
			<h2 id="sl-global-why-heading">
				<?php
				echo wp_kses(
					__( 'Why Organizations Choose <span>SucceedLEARN</span>', 'akaza-adventure' ),
					array( 'span' => array() )
				);
				?>
			</h2>
			<p class="sl-global-why-intro">
				<?php esc_html_e( 'Modern organisations need learning experiences that engage employees, support compliance, and create lasting behavioural change.', 'akaza-adventure' ); ?>
			</p>
		</div>

		<div class="sl-global-why-grid">

			<?php foreach ( $why_choose_cards as $card ) : ?>
				<article class="sl-global-why-card">
					<span class="sl-global-why-card__icon" aria-hidden="true">
						<i class="bi <?php echo esc_attr( $card['icon'] ); ?>"></i>
					</span>
					<h3 class="sl-global-why-card__title">
						<?php echo esc_html( $card['title'] ); ?>
					</h3>
					<p class="sl-global-why-card__text">
						<?php echo esc_html( $card['text'] ); ?>
					</p>
				</article>
			<?php endforeach; ?>

		</div>

	</div>

</section>
