<?php
/**
 * S-Play AMP — How S-Play Works.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$steps = function_exists( 'succeedlearn_amp_get_sp_works_steps' )
	? succeedlearn_amp_get_sp_works_steps()
	: array();

$works_image = function_exists( 'succeedlearn_amp_get_sp_works_image' )
	? succeedlearn_amp_get_sp_works_image()
	: 'https://succeedlearn.com/wp-content/uploads/2026/09/S-Play-Launch-in-Four-Steps.webp';
?>
<section class="sl-s-play-works" aria-labelledby="sl-s-play-works-title">
	<div class="sl-wrap">
		<div class="sl-s-play-works__intro">
			<span class="sl-home-sub-heading"><?php esc_html_e( 'How S-Play Works', 'succeedlearn-amp' ); ?></span>
			<h2 id="sl-s-play-works-title" class="sl-h2">
				<?php esc_html_e( 'Launch Gamified Security Awareness', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'in Four Steps', 'succeedlearn-amp' ); ?></span>
			</h2>
			<p><?php esc_html_e( "S-Play makes it straightforward to incorporate cybersecurity games for employees into an organisation's wider security awareness programme.", 'succeedlearn-amp' ); ?></p>
		</div>
		<div class="sl-s-play-works__layout">
			<div class="sl-s-play-works__cards">
				<?php foreach ( $steps as $step ) : ?>
					<article class="sl-s-play-works__card">
						<h3 class="sl-panel-title"><?php echo esc_html( $step['title'] ); ?></h3>
						<p><?php echo esc_html( $step['text'] ); ?></p>
					</article>
				<?php endforeach; ?>
			</div>
			<div class="sl-s-play-works__media">
				<div class="sl-s-play-works__image">
					<amp-img
						src="<?php echo esc_url( $works_image ); ?>"
						width="720"
						height="720"
						layout="responsive"
						alt="<?php esc_attr_e( 'Launch gamified security awareness in four steps', 'succeedlearn-amp' ); ?>"
					></amp-img>
				</div>
			</div>
		</div>
	</div>
</section>
