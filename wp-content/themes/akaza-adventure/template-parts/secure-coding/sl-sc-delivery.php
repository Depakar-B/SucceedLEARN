<?php
/**
 * Secure Coding — Learning experience & delivery.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$cards = array(
	array(
		'label'    => __( 'Learning format', 'akaza-adventure' ),
		'title'    => __( 'Interactive, self-paced eLearning', 'akaza-adventure' ),
		'featured' => true,
		'items'    => array(
			__( 'Animated and narrated learning content', 'akaza-adventure' ),
			__( 'Short scenario-based exercises', 'akaza-adventure' ),
			__( 'Realistic examples and knowledge checks', 'akaza-adventure' ),
			__( 'Final assessment and certificate generation', 'akaza-adventure' ),
		),
	),
	array(
		'label'    => __( 'SucceedLEARN platform', 'akaza-adventure' ),
		'title'    => __( 'Track learner progress', 'akaza-adventure' ),
		'featured' => false,
		'items'    => array(
			__( 'Responsive access on desktop, tablet and mobile', 'akaza-adventure' ),
			__( 'Learner dashboard and progress tracking', 'akaza-adventure' ),
			__( 'Employee reminders', 'akaza-adventure' ),
			__( 'Organisation-level deployment support', 'akaza-adventure' ),
		),
	),
	array(
		'label'    => __( 'Enterprise deployment', 'akaza-adventure' ),
		'title'    => __( 'Fit the course into your environment', 'akaza-adventure' ),
		'featured' => false,
		'items'    => array(
			__( 'SucceedLEARN-hosted delivery', 'akaza-adventure' ),
			__( 'LMS / enterprise integration options', 'akaza-adventure' ),
			__( 'SCORM availability can be confirmed for your setup', 'akaza-adventure' ),
			__( 'Branding or contextual customisation can be discussed', 'akaza-adventure' ),
		),
	),
);
?>

<section class="sl-sc-delivery" id="delivery" aria-labelledby="sl-sc-delivery-title">
	<div class="container">

		<div class="sl-sc-delivery__heading">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Learning experience & delivery', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-sc-delivery-title">
				<?php esc_html_e( 'Built for individual learning and enterprise rollout', 'akaza-adventure' ); ?>
			</h2>

			<p>
				<?php
				esc_html_e(
					'Use the course as a focused developer-awareness module or as one component of a broader secure-development programme.',
					'akaza-adventure'
				);
				?>
			</p>
		</div>

		<div class="sl-sc-delivery__grid">
			<?php foreach ( $cards as $card ) : ?>
				<article class="sl-sc-delivery__card<?php echo ! empty( $card['featured'] ) ? ' sl-sc-delivery__card--featured' : ''; ?>">
					<div class="sl-sc-delivery__label"><?php echo esc_html( $card['label'] ); ?></div>
					<h3 class="sl-panel-title"><?php echo esc_html( $card['title'] ); ?></h3>
					<ul>
						<?php foreach ( $card['items'] as $item ) : ?>
							<li><?php echo esc_html( $item ); ?></li>
						<?php endforeach; ?>
					</ul>
				</article>
			<?php endforeach; ?>
		</div>

	</div>
</section>
