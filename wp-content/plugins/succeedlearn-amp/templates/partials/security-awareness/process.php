<?php
/**
 * Security Awareness AMP — Why SucceedLEARN / how the platform works.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( empty( $process_items ) || ! is_array( $process_items ) ) {
	$process_items = succeedlearn_amp_get_sa_process_items();
}

if ( empty( $process_items ) || ! is_array( $process_items ) ) {
	return;
}
?>
<section
	class="sl-sa-process"
	id="how-the-platform-works"
	aria-labelledby="sl-sa-process-title"
>
	<div class="sl-wrap">
		<div class="sl-sa-process__layout">
			<div class="sl-sa-process__intro sl-sa-annual-training__heading">
				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'Continuous Security Behaviour Change', 'succeedlearn-amp' ); ?>
				</span>

				<h2 id="sl-sa-process-title">
					<?php esc_html_e( 'Why SucceedLEARN?', 'succeedlearn-amp' ); ?>
					<span><?php esc_html_e( 'Security Awareness Training', 'succeedlearn-amp' ); ?></span>
				</h2>

				<p>
					<?php esc_html_e( 'Building a security-aware workforce requires more than delivering content. SucceedLEARN brings together multiple security awareness activities so organisations can continuously educate, engage, test, reinforce, and measure employee security behaviour.', 'succeedlearn-amp' ); ?>
				</p>
			</div>

			<div
				class="sl-sa-process__cards"
				tabindex="0"
				aria-label="<?php esc_attr_e( 'Why SucceedLEARN cards', 'succeedlearn-amp' ); ?>"
			>
				<div class="sl-sa-process__grid">
					<?php foreach ( $process_items as $item ) : ?>
						<article class="sl-sa-annual-training__card">
							<div class="sl-sa-annual-training__title-row">
								<span class="sl-sa-annual-training__number"><?php echo esc_html( $item['number'] ); ?></span>
								<h3><?php echo esc_html( $item['title'] ); ?></h3>
							</div>
							<p><?php echo esc_html( $item['text'] ); ?></p>
						</article>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</section>
