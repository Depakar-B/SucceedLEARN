<?php
/**
 * SOC 2 AMP — Who should take the training.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$audience_items = succeedlearn_amp_get_soc2_audience_items();
?>
<section
	class="sl-soc2-audience"
	id="who-should-take-soc2-training"
	aria-labelledby="sl-soc2-audience-title"
>
	<div class="sl-wrap">
		<div class="sl-soc2-audience__heading">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Who It’s For', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-soc2-audience-title" class="sl-h2">
				<?php esc_html_e( 'Who Should Take SOC 2', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'Security Awareness Training?', 'succeedlearn-amp' ); ?></span>
			</h2>

			<p>
				<?php esc_html_e( 'The programme is suitable for employees and other users who interact with organizational systems, information, or services that form part of the organization\'s security environment.', 'succeedlearn-amp' ); ?>
			</p>
		</div>

		<div class="sl-soc2-audience__grid">
			<?php foreach ( $audience_items as $item ) : ?>
				<article class="sl-soc2-audience__card">
					<h3><?php echo esc_html( $item['title'] ); ?></h3>
					<p><?php echo esc_html( $item['text'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
