<?php
/**
 * GWCT AMP — Stats section.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$stats = array(
	array( '1000+', __( 'Organisations Trained', 'succeedlearn-amp' ) ),
	array( '90%+', __( 'Learner Engagement', 'succeedlearn-amp' ) ),
	array( '70%', __( 'Reduction in Phishing Risk', 'succeedlearn-amp' ) ),
	array( '90%', __( 'Compliance Risk Reduced', 'succeedlearn-amp' ) ),
);
?>
<section class="sl-section sl-section--alt">
	<div class="sl-wrap sl-grid-4 sl-stats">
		<?php foreach ( $stats as $stat ) : ?>
			<div class="sl-stat">
				<p class="sl-stat__value"><?php echo esc_html( $stat[0] ); ?></p>
				<p class="sl-stat__label"><?php echo esc_html( $stat[1] ); ?></p>
			</div>
		<?php endforeach; ?>
	</div>
</section>
