<?php
/**
 * Generative AI AMP — Support your AI policy with practical awareness.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( empty( $gai_questions ) || ! is_array( $gai_questions ) ) {
	$gai_questions = succeedlearn_amp_get_gai_policy_questions();
}
?>
<section
	class="sl-gai-policy"
	id="support-your-ai-policy"
	aria-labelledby="sl-gai-policy-title"
>
	<div class="sl-wrap">
		<div class="sl-gai-policy__content">
			<h2 id="sl-gai-policy-title" class="sl-h2">
				<?php esc_html_e( 'Support your AI policy', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'with practical awareness', 'succeedlearn-amp' ); ?></span>
			</h2>

			<div class="sl-gai-policy__copy">
				<p>
					<?php esc_html_e( 'A written policy can set boundaries, but employees also need to recognise when those boundaries apply. Training helps turn organisational expectations into questions people can use in the moment:', 'succeedlearn-amp' ); ?>
				</p>

				<ul class="sl-gai-policy__questions">
					<?php foreach ( $gai_questions as $gai_question ) : ?>
						<li class="sl-gai-policy__question">
							<strong><?php echo esc_html( $gai_question ); ?></strong>
						</li>
					<?php endforeach; ?>
				</ul>

				<p>
					<?php esc_html_e( 'SucceedLEARN can help organisations connect the course with their internal approach to responsible generative AI use. Any customisation, delivery format, assessment or completion requirement should be confirmed for the selected implementation.', 'succeedlearn-amp' ); ?>
				</p>
			</div>

			<div class="sl-hero-actions sl-gai-policy__actions">
				<button
					type="button"
					class="sl-hero-btn sl-hero-btn-primary"
					data-cta="policy-demo"
					<?php echo succeedlearn_amp_scroll_tap_attr( 'contact' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
				>
					<?php esc_html_e( 'Request a Demo', 'succeedlearn-amp' ); ?>
					<span aria-hidden="true">→</span>
				</button>
			</div>
		</div>
	</div>
</section>
