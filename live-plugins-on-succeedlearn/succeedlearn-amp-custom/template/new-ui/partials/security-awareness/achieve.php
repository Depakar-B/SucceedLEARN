<?php
/**
 * Security Awareness AMP — What Can Your Organization Achieve?
 *
 * Reloads items here because sa_partial() includes run in function scope.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( empty( $achieve_items ) || ! is_array( $achieve_items ) ) {
	$achieve_items = succeedlearn_amp_get_sa_achieve_items();
}

if ( empty( $achieve_items ) || ! is_array( $achieve_items ) ) {
	return;
}

$icon_paths = array(
	'shield'    => '<path d="M12 3l7 3v5c0 4.5-2.9 7.8-7 10-4.1-2.2-7-5.5-7-10V6l7-3z" stroke="currentColor" stroke-width="1.7" stroke-linejoin="round"/><path d="M9.5 12.2l1.7 1.7 3.5-3.8" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/>',
	'mail'      => '<rect x="3.5" y="5.5" width="17" height="13" rx="2" stroke="currentColor" stroke-width="1.7"/><path d="M4.5 7.5L12 13l7.5-5.5" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/>',
	'refresh'   => '<path d="M19.5 12a7.5 7.5 0 1 1-2.2-5.3" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/><path d="M19.5 4.5v5h-5" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/>',
	'chart'     => '<path d="M4.5 19.5h15" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/><path d="M7 16.5V11M12 16.5V7.5M17 16.5v-5" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/>',
	'target'    => '<circle cx="12" cy="12" r="7.5" stroke="currentColor" stroke-width="1.7"/><circle cx="12" cy="12" r="3.2" stroke="currentColor" stroke-width="1.7"/><path d="M12 4.5V7M12 17v2.5M4.5 12H7M17 12h2.5" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/>',
	'eye'       => '<path d="M2.8 12s3.2-6 9.2-6 9.2 6 9.2 6-3.2 6-9.2 6-9.2-6-9.2-6z" stroke="currentColor" stroke-width="1.7" stroke-linejoin="round"/><circle cx="12" cy="12" r="2.6" stroke="currentColor" stroke-width="1.7"/>',
	'clipboard' => '<rect x="6.5" y="4.5" width="11" height="15.5" rx="2" stroke="currentColor" stroke-width="1.7"/><path d="M9 4.5h6v2.2H9V4.5z" stroke="currentColor" stroke-width="1.7" stroke-linejoin="round"/><path d="M9.5 11.5h5M9.5 14.5h3.5" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/>',
	'users'     => '<circle cx="9" cy="9" r="2.6" stroke="currentColor" stroke-width="1.7"/><circle cx="16.2" cy="10" r="2.1" stroke="currentColor" stroke-width="1.7"/><path d="M4.5 18.5c.6-2.6 2.6-4 4.5-4s3.9 1.4 4.5 4M14.2 14.8c1.5.2 2.9 1.2 3.5 3.2" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/>',
);
?>
<section
	class="sl-sa-achieve"
	id="what-can-your-organization-achieve"
	aria-labelledby="sl-sa-achieve-title"
>
	<div class="sl-wrap">
		<div class="sl-sa-achieve__intro">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Measurable Security Behaviour Change', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-sa-achieve-title">
				<?php esc_html_e( 'What Can Your Organization', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'Achieve?', 'succeedlearn-amp' ); ?></span>
			</h2>

			<p>
				<?php esc_html_e( 'The objective of security awareness should extend beyond training completion, with an integrated behaviour and culture programme, organisations can work towards:', 'succeedlearn-amp' ); ?>
			</p>
		</div>

		<div class="sl-sa-achieve__grid">
			<?php foreach ( $achieve_items as $item ) : ?>
				<?php
				$icon_key = is_array( $item ) && ! empty( $item['icon'] ) ? $item['icon'] : 'shield';
				$icon_svg = isset( $icon_paths[ $icon_key ] ) ? $icon_paths[ $icon_key ] : $icon_paths['shield'];
				$text     = is_array( $item ) ? $item['text'] : $item;
				?>
				<article class="sl-sa-achieve__card">
					<span class="sl-sa-achieve__icon" aria-hidden="true">
						<svg viewBox="0 0 24 24" fill="none" focusable="false" xmlns="http://www.w3.org/2000/svg">
							<?php
							// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG path markup.
							echo $icon_svg;
							?>
						</svg>
					</span>
					<p class="sl-sa-achieve__text">
						<?php echo esc_html( $text ); ?>
					</p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
