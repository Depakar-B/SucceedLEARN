<?php
/**
 * Defensive Driving AMP — Global localisation section.
 *
 * Expected vars: $regions
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section class="sl-section sl-section--alt">
	<div class="sl-wrap">
		<div class="sl-dd-section-head">
			<span class="sl-dd-section-head__eyebrow"><?php esc_html_e( 'Global road-safety alignment', 'succeedlearn-amp' ); ?></span>
			<h2>
				<?php esc_html_e( 'One core course.', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'Localised where it matters.', 'succeedlearn-amp' ); ?></span>
			</h2>
			<p><?php esc_html_e( 'Local law, company policy and regulated-driver requirements can be added for each workforce.', 'succeedlearn-amp' ); ?></p>
		</div>
		<div class="sl-dd-regions">
			<?php foreach ( $regions as $region ) : ?>
				<article class="sl-dd-region">
					<span class="sl-dd-region__code"><?php echo esc_html( $region['code'] ); ?></span>
					<h3><?php echo esc_html( $region['title'] ); ?></h3>
					<p><?php echo esc_html( $region['text'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
		<div class="sl-dd-callout">
			<h3><?php esc_html_e( 'A clear compliance position', 'succeedlearn-amp' ); ?></h3>
			<p><?php esc_html_e( 'Defensive driving training is not universally mandated by that specific name. Employers in many jurisdictions must nevertheless assess and control work-related driving risks and provide appropriate information, instruction or training.', 'succeedlearn-amp' ); ?></p>
		</div>
		<p class="sl-dd-note"><?php esc_html_e( 'This course complements-but does not replace-valid licensing, Driver CPC, CDL, vocational, practical or vehicle-specific training where required.', 'succeedlearn-amp' ); ?></p>
	</div>
</section>
