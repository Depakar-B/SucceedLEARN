<?php
/**
 * OWASP — Enterprise delivery.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$items = array(
	array(
		'badge' => 'SL',
		'title' => __( 'SucceedLEARN Platform', 'akaza-adventure' ),
		'text'  => __( 'Assign and manage learner access through the SucceedLEARN learning platform.', 'akaza-adventure' ),
	),
	array(
		'badge' => 'S',
		'title' => __( 'SCORM Delivery', 'akaza-adventure' ),
		'text'  => __( 'Use SCORM-compatible packages for organisations that prefer to deliver the course through their existing compatible LMS.', 'akaza-adventure' ),
	),
	array(
		'badge' => '✓',
		'title' => __( 'Knowledge Checks & Assessments', 'akaza-adventure' ),
		'text'  => __( 'Use structured knowledge checks and assessments to reinforce learning and evaluate understanding.', 'akaza-adventure' ),
	),
	array(
		'badge' => '↺',
		'title' => __( 'Customisation', 'akaza-adventure' ),
		'text'  => __( 'Where applicable, adapt branding or approved organisational learning requirements.', 'akaza-adventure' ),
	),
);
?>

<section class="sl-owasp-delivery" id="delivery" aria-labelledby="sl-owasp-delivery-title">
	<div class="container">
		<div class="sl-owasp-delivery__grid">

			<div class="sl-owasp-delivery__heading">
				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'Enterprise delivery', 'akaza-adventure' ); ?>
				</span>
				<h2 id="sl-owasp-delivery-title">
					<?php
					echo wp_kses(
						__( 'Flexible Delivery for <span>Enterprise Learning</span>', 'akaza-adventure' ),
						array( 'span' => array() )
					);
					?>
				</h2>
				<p>
					<?php esc_html_e( 'Choose a delivery approach that fits your organisation\'s learning environment.', 'akaza-adventure' ); ?>
				</p>
			</div>

			<div class="sl-owasp-delivery__list">
				<?php foreach ( $items as $item ) : ?>
					<article>
						<div class="sl-owasp-delivery__badge" aria-hidden="true">
							<?php echo esc_html( $item['badge'] ); ?>
						</div>
						<div>
							<h3 class="sl-panel-title"><?php echo esc_html( $item['title'] ); ?></h3>
							<p><?php echo esc_html( $item['text'] ); ?></p>
						</div>
					</article>
				<?php endforeach; ?>
			</div>

		</div>
	</div>
</section>
