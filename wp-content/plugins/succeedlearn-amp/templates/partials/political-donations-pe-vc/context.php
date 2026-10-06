<?php
/**
 * Political Donations PE/VC AMP: Context cards (desktop partial exists; not in page wrapper order).
 *
 * Expected vars: $context_cards
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section id="context" class="sl-section sl-section--alt sl-aml-pe-vc-context" aria-labelledby="sl-political-donations-pe-vc-context-title">
	<div class="sl-wrap">
		<div class="sl-aml-intro">
			<h2 id="sl-political-donations-pe-vc-context-title" class="sl-h2">
				<?php
				echo wp_kses(
					__( 'Relevant Regulatory and Investment <span>Contexts</span>', 'succeedlearn-amp' ),
					array( 'span' => array() )
				);
				?>
			</h2>
		</div>

		<ul class="sl-aml-outcome-list" role="list">
			<?php foreach ( $context_cards as $index => $card ) : ?>
				<li class="sl-aml-outcome-list__item">
					<span class="sl-aml-number" aria-hidden="true"><?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?></span>
					<div>
						<h3 class="sl-panel-title"><?php echo esc_html( $card['title'] ); ?></h3>
						<p><?php echo esc_html( $card['text'] ); ?></p>
					</div>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>
