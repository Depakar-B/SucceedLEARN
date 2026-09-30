<?php
/**
 * Generative AI AMP — Five principles employees should remember.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( empty( $gai_principles ) || ! is_array( $gai_principles ) ) {
	$gai_principles = succeedlearn_amp_get_gai_principles();
}
?>
<section
	class="sl-gai-principles"
	id="five-principles"
	aria-labelledby="sl-gai-principles-title"
>
	<div class="sl-wrap">
		<div class="sl-gai-principles__heading">
			<h2 id="sl-gai-principles-title" class="sl-h2">
				<?php esc_html_e( 'Five principles', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'employees should remember', 'succeedlearn-amp' ); ?></span>
			</h2>
		</div>

		<ol class="sl-gai-principles__list">
			<?php foreach ( $gai_principles as $gai_index => $gai_principle ) : ?>
				<li class="sl-gai-principles__item">
					<span class="sl-gai-principles__number" aria-hidden="true">
						<?php echo esc_html( str_pad( (string) ( $gai_index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?>
					</span>
					<div class="sl-gai-principles__body">
						<h3 class="sl-panel-title"><?php echo esc_html( $gai_principle['title'] ); ?></h3>
						<p><?php echo esc_html( $gai_principle['text'] ); ?></p>
					</div>
				</li>
			<?php endforeach; ?>
		</ol>
	</div>
</section>
