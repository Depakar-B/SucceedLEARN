<?php
/**
 * Whistleblowing PE/VC AMP: Recognising Misconduct.
 *
 * Expected vars: $misconduct_items
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section id="recognising-misconduct" class="sl-section sl-section--alt sl-aml-pe-vc-misconduct" aria-labelledby="sl-whistleblowing-pe-vc-misconduct-title">
	<div class="sl-wrap">
		<div class="sl-aml-intro">
			<span class="sl-eyebrow sl-home-sub-heading">
				<?php esc_html_e( 'Recognising Misconduct', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-whistleblowing-pe-vc-misconduct-title" class="sl-h2">
				<?php
				echo wp_kses(
					__( 'What Types of Concerns Can Qualify as <span>Whistleblowing?</span>', 'succeedlearn-amp' ),
					array( 'span' => array() )
				);
				?>
			</h2>

			<p>
				<?php esc_html_e( 'The course introduces the types of wrongdoing employees may need to recognise and raise through appropriate channels.', 'succeedlearn-amp' ); ?>
			</p>
		</div>

		<ul class="sl-aml-feature-list" role="list">
			<?php foreach ( $misconduct_items as $item ) : ?>
				<li class="sl-aml-feature-list__item">
					<span class="sl-aml-check" aria-hidden="true">✓</span>
					<div>
						<strong><?php echo esc_html( $item['title'] ); ?></strong>
						<span><?php echo esc_html( $item['text'] ); ?></span>
					</div>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>
