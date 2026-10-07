<?php
/**
 * S-Bytes AMP — How S-Bytes Works.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$steps       = succeedlearn_amp_get_sbytes_works_steps();
$works_image = succeedlearn_amp_get_sbytes_works_image();
?>
<section id="how-s-bytes-works" class="sl-sbytes-works" aria-labelledby="sl-sbytes-works-title">
	<div class="sl-wrap">
		<div class="sl-sbytes-works__intro">
			<span class="sl-home-sub-heading"><?php esc_html_e( 'How It Works', 'succeedlearn-amp' ); ?></span>
			<h2 id="sl-sbytes-works-title" class="sl-h2">
				<?php esc_html_e( 'How', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'S-Bytes Works', 'succeedlearn-amp' ); ?></span>
			</h2>
			<h3 class="sl-panel-title"><?php esc_html_e( 'Make Continuous Awareness Simple', 'succeedlearn-amp' ); ?></h3>
			<p><?php esc_html_e( 'S-Bytes enables organisations to introduce microlearning into their security awareness programme through a simple cycle of selecting, scheduling and delivering.', 'succeedlearn-amp' ); ?></p>
		</div>
		<div class="sl-sbytes-works__layout">
			<div class="sl-sbytes-works__media">
				<div class="sl-sbytes-works__image">
					<amp-img
						src="<?php echo esc_url( $works_image ); ?>"
						width="960"
						height="720"
						layout="responsive"
						alt="<?php esc_attr_e( 'S-Bytes campaign in four steps', 'succeedlearn-amp' ); ?>"
					></amp-img>
				</div>
			</div>
			<div class="sl-sbytes-works__steps">
				<?php foreach ( $steps as $step ) : ?>
					<article class="sl-sbytes-works__card">
						<h3 class="sl-panel-title"><?php echo esc_html( $step['title'] ); ?></h3>
						<?php foreach ( $step['paragraphs'] as $paragraph ) : ?>
							<p><?php echo esc_html( $paragraph ); ?></p>
						<?php endforeach; ?>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>
