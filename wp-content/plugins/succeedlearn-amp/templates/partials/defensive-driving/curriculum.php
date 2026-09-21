<?php
/**
 * Defensive Driving AMP — Curriculum section.
 *
 * Expected vars: $modules
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section class="sl-section sl-section--alt" id="curriculum">
	<div class="sl-wrap">
		<div class="sl-dd-section-head">
			<span class="sl-dd-section-head__eyebrow"><?php esc_html_e( 'Course Curriculum', 'succeedlearn-amp' ); ?></span>
			<h2>
				<?php esc_html_e( 'Everything employees need', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'for safer journeys', 'succeedlearn-amp' ); ?></span>
			</h2>
			<p><?php esc_html_e( 'A focused 40-minute experience combining practical explanations, animated content, realistic decisions and frequent reinforcement.', 'succeedlearn-amp' ); ?></p>
		</div>
		<div class="sl-dd-modules">
			<?php foreach ( $modules as $index => $module ) : ?>
				<article class="sl-dd-module">
					<span class="sl-dd-module__num"><?php echo esc_html( sprintf( '%02d', $index + 1 ) ); ?></span>
					<div>
						<h3><?php echo esc_html( $module['title'] ); ?></h3>
						<p><?php echo esc_html( $module['desc'] ); ?></p>
					</div>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
