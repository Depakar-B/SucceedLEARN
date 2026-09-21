<?php
/**
 * Cybersecurity Awareness AMP — Journey section.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$stages = array( array( 'Identify', 'Learn how urgency, authority and fear can manipulate decisions.' ), array( 'Resist', 'Pause, verify and follow secure processes before taking action.' ), array( 'Report', 'Use PhishCue to report messages and build vigilance.' ), array( 'Improve', 'Reinforce safer actions through targeted learning and retesting.' ) );
?>
<section class="sl-section sl-csa-journey" aria-labelledby="sl-csa-journey-title"><div class="sl-wrap"><header class="sl-csa-section-heading"><span class="sl-home-sub-heading"><?php esc_html_e( 'The Campaign Journey', 'succeedlearn-amp' ); ?></span><h2 id="sl-csa-journey-title" class="sl-h2"><?php echo wp_kses_post( __( 'A practical <span>four-stage approach</span>', 'succeedlearn-amp' ) ); ?></h2><p class="sl-lead"><?php esc_html_e( 'Move beyond one-off training and build a clear picture of employee readiness.', 'succeedlearn-amp' ); ?></p></header><div class="sl-csa-journey__grid"><?php foreach ( $stages as $index => $stage ) : ?><article class="sl-csa-journey__card"><span aria-hidden="true"><?php echo esc_html( sprintf( '%02d', $index + 1 ) ); ?></span><h3><?php echo esc_html( $stage[0] ); ?></h3><p><?php echo esc_html( $stage[1] ); ?></p></article><?php endforeach; ?></div></div></section>
