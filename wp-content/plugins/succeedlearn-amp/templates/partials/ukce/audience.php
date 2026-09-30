<?php
/**
 * UK Cyber Essentials AMP — Who should take the training.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$audience_items = succeedlearn_amp_get_ukce_audience_items();
?>
<section
	class="sl-ukce-audience"
	id="who-should-take-cyber-essentials-training"
	aria-labelledby="sl-ukce-audience-title"
>
	<div class="sl-wrap">
		<div class="sl-ukce-audience__heading">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Who It’s For', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-ukce-audience-title" class="sl-h2">
				<?php esc_html_e( 'Who Should Take Cyber Essentials', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'Security Awareness Training?', 'succeedlearn-amp' ); ?></span>
			</h2>

			<p>
				<?php esc_html_e( 'The training is suitable for employees and other users whose everyday actions interact with organizational technology and security controls.', 'succeedlearn-amp' ); ?>
			</p>
		</div>

		<div class="sl-ukce-audience__grid">
			<?php foreach ( $audience_items as $item ) : ?>
				<article class="sl-ukce-audience__card">
					<h3><?php echo esc_html( $item['title'] ); ?></h3>
					<p><?php echo esc_html( $item['text'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
