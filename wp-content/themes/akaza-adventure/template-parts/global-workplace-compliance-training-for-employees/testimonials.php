<?php
/**
 * Global Workplace Compliance Training for Employees — Testimonials section.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$quotes = akaza_get_client_testimonials();
?>
<section class="sl-global-testimonials-section" aria-labelledby="sl-global-testimonials-heading">
	<div class="container">

		<div class="sl-global-testimonials-heading">
			<span class="sl-home-sub-heading"><?php esc_html_e( 'What clients say', 'akaza-adventure' ); ?></span>
			<h2 id="sl-global-testimonials-heading">
				<?php
				echo wp_kses(
					__( 'From teams who <span>rolled it out</span>', 'akaza-adventure' ),
					array( 'span' => array() )
				);
				?>
			</h2>
			<p class="sl-global-testimonials-intro">
				<?php esc_html_e( 'Organisations use SucceedLEARN to roll out compliance training that people complete, and remember.', 'akaza-adventure' ); ?>
			</p>
		</div>

		<div class="sl-global-testimonials-grid">
			<?php foreach ( $quotes as $item ) : ?>
				<figure class="sl-global-testimonials-card">
					<blockquote>
						<p>&ldquo;<?php echo esc_html( $item['quote'] ); ?>&rdquo;</p>
					</blockquote>
					<?php if ( ! empty( $item['note'] ) ) : ?>
						<div class="sl-global-testimonials-note">
							<?php echo esc_html( $item['note'] ); ?>
						</div>
					<?php endif; ?>
					<figcaption>
						<strong><?php echo esc_html( $item['name'] ); ?></strong>
						<span><?php echo esc_html( $item['role'] ); ?></span>
					</figcaption>
				</figure>
			<?php endforeach; ?>
		</div>

	</div>
</section>
