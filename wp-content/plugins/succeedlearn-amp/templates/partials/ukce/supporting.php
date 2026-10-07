<?php
/**
 * UK Cyber Essentials AMP — Additional supporting security awareness.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$supporting = succeedlearn_amp_get_ukce_supporting_items();
?>
<section
	class="sl-ukce-supporting"
	id="additional-supporting-security-awareness"
	aria-labelledby="sl-ukce-supporting-title"
>
	<div class="sl-wrap">
		<div class="sl-ukce-supporting__heading">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Optional Module Library', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-ukce-supporting-title" class="sl-h2">
				<?php esc_html_e( 'Additional Supporting', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'Security Awareness', 'succeedlearn-amp' ); ?></span>
			</h2>
		</div>

		<div class="sl-ukce-supporting__grid">
			<?php foreach ( $supporting as $item ) : ?>
				<article class="sl-ukce-supporting__card">
					<h3><?php echo esc_html( $item['title'] ); ?></h3>
					<p><?php echo esc_html( $item['text'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
