<?php
/**
 * Homepage — Testimonials section.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$quotes = akaza_get_client_testimonials();
?>
<section class="sl-dpdpa-testimonials sl-home-testimonials" aria-labelledby="home-testimonials-heading">
	<div class="container">

		<div class="sl-home-section-heading">
			<span class="sl-home-sub-heading">What clients say</span>
			<h2 id="home-testimonials-heading">
				<?php
				echo wp_kses(
					__( 'From teams who <span>rolled it out</span>', 'akaza-adventure' ),
					array( 'span' => array() )
				);
				?>
			</h2>
			<p class="sl-dpdpa-testimonials__intro">
				Organisations use SucceedLEARN to roll out compliance training that people complete — and remember.
			</p>
		</div>

		<div class="sl-dpdpa-testimonials__grid">
			<?php foreach ( $quotes as $item ) : ?>
				<figure class="sl-dpdpa-testimonials__card">
					<blockquote>
						<p>&ldquo;<?php echo esc_html( $item['quote'] ); ?>&rdquo;</p>
					</blockquote>
					<?php if ( ! empty( $item['note'] ) ) : ?>
						<div class="sl-dpdpa-testimonials__note">
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
