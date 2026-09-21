<?php
/**
 * Insider Trading eLearning Purchase CTA.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<section
	class="sl-insider-trading-buy-cta"
	aria-labelledby="sl-insider-trading-buy-cta-title"
>
	<div class="container">
		<div class="sl-insider-trading-buy-cta__content">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Buy Insider Trading eLearning', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-insider-trading-buy-cta-title">
				<?php esc_html_e( 'How Can Your Organisation Buy Insider Trading', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'eLearning?', 'akaza-adventure' ); ?></span>
			</h2>

			<p>
				<?php esc_html_e( 'Choose an existing course covering UK MAR, US SEC or India SEBI Regulation requirements, or speak with SucceedLEARN about a customised training programme.', 'akaza-adventure' ); ?>
			</p>

			<div class="sl-content-actions">
				<a
					class="sl-content-btn sl-content-btn-primary"
					href="#book-demo"
				>
					<?php esc_html_e( 'Request a Demo', 'akaza-adventure' ); ?>
					<span aria-hidden="true">→</span>
				</a>

				<a
					class="sl-content-btn sl-content-btn-secondary"
					href="#book-demo"
				>
					<?php esc_html_e( 'Buy the Course', 'akaza-adventure' ); ?>
					<span aria-hidden="true">→</span>
				</a>
			</div>

		</div>
	</div>
</section>