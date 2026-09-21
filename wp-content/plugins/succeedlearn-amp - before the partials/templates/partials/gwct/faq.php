<?php
/**
 * GWCT AMP — FAQ section.
 *
 * Expected vars: $faq_items
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section class="sl-section sl-section--alt">
	<div class="sl-wrap">
		<p class="sl-eyebrow"><?php esc_html_e( 'FAQ', 'succeedlearn-amp' ); ?></p>
		<h2 class="sl-h2"><?php esc_html_e( 'The questions buyers actually ask', 'succeedlearn-amp' ); ?></h2>
		<p class="sl-lead"><?php esc_html_e( 'Clear answers for HR, L&D, and compliance teams evaluating workplace training programmes — from customisation and global deployment to tracking, assessments, and getting started.', 'succeedlearn-amp' ); ?></p>
		<div class="sl-gwct-faq">
			<amp-accordion animate>
				<?php foreach ( $faq_items as $item ) : ?>
					<section>
						<h3><?php echo esc_html( $item['question'] ); ?></h3>
						<div><p><?php echo esc_html( $item['answer'] ); ?></p></div>
					</section>
				<?php endforeach; ?>
			</amp-accordion>
		</div>
	</div>
</section>
