<?php
/**
 * Defensive Driving AMP — Audience section.
 *
 * Expected vars: $audience_points, $hero_img
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section class="sl-section">
	<div class="sl-wrap sl-dd-split sl-dd-split--reverse">
		<div class="sl-dd-split__content">
			<div class="sl-dd-section-head">
				<span class="sl-dd-section-head__eyebrow"><?php esc_html_e( 'Who should take this course?', 'succeedlearn-amp' ); ?></span>
				<h2>
					<?php esc_html_e( 'Built for everyone who', 'succeedlearn-amp' ); ?>
					<span><?php esc_html_e( 'drives for work', 'succeedlearn-amp' ); ?></span>
				</h2>
				<p><?php esc_html_e( 'Use it for onboarding, annual safety awareness, targeted refreshers or as part of a wider fleet risk programme.', 'succeedlearn-amp' ); ?></p>
			</div>
			<p class="sl-dd-audience-badge">
				<strong><?php esc_html_e( '1 course', 'succeedlearn-amp' ); ?></strong>
				<?php esc_html_e( 'for company, fleet, rental and grey-fleet drivers', 'succeedlearn-amp' ); ?>
			</p>
			<ul class="sl-dd-points">
				<?php foreach ( $audience_points as $point ) : ?>
					<li><?php echo esc_html( $point ); ?></li>
				<?php endforeach; ?>
			</ul>
		</div>
		<div class="sl-dd-split__media">
			<amp-img
				src="<?php echo esc_url( $hero_img ); ?>"
				width="1200"
				height="900"
				layout="responsive"
				alt="<?php esc_attr_e( 'Defensive driving course audience', 'succeedlearn-amp' ); ?>"
			></amp-img>
		</div>
	</div>
</section>
