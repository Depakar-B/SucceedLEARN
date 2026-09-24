<?php
/**
 * PE/VC Homepage — Hero section.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$hero_values = array(
	__( 'Reduce risk', 'akaza-adventure' ),
	__( 'Build trust', 'akaza-adventure' ),
	__( 'Create lasting value', 'akaza-adventure' ),
);
?>
<section class="sl-pevc-hero" aria-labelledby="sl-pevc-hero-title">
	<div class="container">
		<div class="sl-pevc-hero__grid">

			<div class="sl-pevc-hero__copy">
				<span class="sl-pevc-hero__eyebrow">
					<?php esc_html_e( 'Private Equity & Venture Capital', 'akaza-adventure' ); ?>
				</span>

				<h1 id="sl-pevc-hero-title">
					<?php esc_html_e( 'Compliance learning', 'akaza-adventure' ); ?>
					<span><?php esc_html_e( 'for what’s next.', 'akaza-adventure' ); ?></span>
				</h1>

				<p class="sl-pevc-hero__lead">
					<?php
					esc_html_e(
						'Equip your people with the knowledge to recognise risk, understand their responsibilities, meet regulatory expectations and make better-informed decisions.',
						'akaza-adventure'
					);
					?>
				</p>

				<p>
					<?php
					esc_html_e(
						'Practical compliance eLearning designed around the realities of UK Private Equity and Venture Capital firms.',
						'akaza-adventure'
					);
					?>
				</p>

				<div class="sl-pevc-hero__actions sl-training-actions">
					<a class="sl-hero-btn sl-hero-btn-primary" href="#contact">
						<?php esc_html_e( 'Request a Demo', 'akaza-adventure' ); ?>
					</a>
					<a class="sl-hero-btn sl-hero-btn-secondary" href="#courses">
						<?php esc_html_e( 'Explore the PE/VC Suite', 'akaza-adventure' ); ?>
					</a>
				</div>

				<div class="sl-pevc-hero__values">
					<?php foreach ( $hero_values as $value ) : ?>
						<span><?php echo esc_html( $value ); ?></span>
					<?php endforeach; ?>
				</div>
			</div>

			<div
				class="sl-pevc-hero__visual"
				role="img"
				aria-label="<?php esc_attr_e( 'Private Equity and Venture Capital compliance training visual placeholder', 'akaza-adventure' ); ?>"
			>
				<div class="sl-pevc-hero__visual-inner">
					<strong><?php esc_html_e( 'PE/VC homepage video or approved image', 'akaza-adventure' ); ?></strong>
					<p><?php esc_html_e( 'Replace with the approved investment committee visual.', 'akaza-adventure' ); ?></p>
				</div>
			</div>

		</div>
	</div>
</section>
