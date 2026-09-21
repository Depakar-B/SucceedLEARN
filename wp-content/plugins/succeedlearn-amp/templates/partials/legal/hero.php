<?php
/**
 * Legal AMP — Hero header.
 *
 * Expected vars: $legal_eyebrow, $legal_title, $legal_lead
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<header class="sl-legal-amp__hero">
	<p class="sl-legal-amp__eyebrow"><?php echo esc_html( $legal_eyebrow ); ?></p>
	<h1><?php echo esc_html( $legal_title ); ?></h1>
	<p class="sl-legal-amp__lead"><?php echo esc_html( $legal_lead ); ?></p>
</header>
