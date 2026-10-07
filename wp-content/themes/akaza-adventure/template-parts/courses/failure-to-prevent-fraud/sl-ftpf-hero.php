<?php
/**
 * Failure to Prevent Fraud — Hero.
 *
 * Full-bleed background image pattern (matches PE/VC homepage hero).
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$hero_image = 'https://succeedlearn.com/wp-content/uploads/2026/09/Failure-to-prevent-fraud_Hero-section.webp';
?>

<section id="top" class="ftpf-section ftpf-section--white ftpf-hero" aria-labelledby="ftpf-hero-title">
	<img
		class="ftpf-hero__bg-image"
		src="<?php echo esc_url( $hero_image ); ?>"
		alt="<?php esc_attr_e( 'Colleagues reviewing current and expected financial performance', 'akaza-adventure' ); ?>"
		decoding="async"
		fetchpriority="high"
	>

	<div class="ftpf-container">
		<div class="ftpf-hero__content">
			<span class="sl-home-sub-heading"><?php esc_html_e( 'Fraud Prevention Compliance eLearning', 'akaza-adventure' ); ?></span>

			<h1 id="ftpf-hero-title">
				<?php esc_html_e( 'Failure to Prevent', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'Fraud Training', 'akaza-adventure' ); ?></span>
			</h1>

			<div class="ftpf-hero__copy">
				<p class="ftpf-hero__lead">
					<?php esc_html_e( 'Help employees understand fraud risk, recognise warning signs and know when something needs to be questioned or escalated.', 'akaza-adventure' ); ?>
				</p>

				<p>
					<?php esc_html_e( 'A practical eLearning course connecting the UK Failure to Prevent Fraud offence with the decisions employees make around information, reporting, investor communications and business processes.', 'akaza-adventure' ); ?>
				</p>
			</div>

			<div class="ftpf-btn-row sl-hero-actions sl-hero-actions--labelled">
				<div class="sl-hero-cta-item">
					<span class="sl-hero-cta-label"><?php esc_html_e( 'Individual', 'akaza-adventure' ); ?></span>
					<a class="ftpf-btn ftpf-btn--solid" href="#request-demo">
						<?php esc_html_e( 'Buy Now @ $18', 'akaza-adventure' ); ?>
						<span aria-hidden="true">&rarr;</span>
					</a>
				</div>
				<div class="sl-hero-cta-item">
					<span class="sl-hero-cta-label"><?php esc_html_e( 'Organisation', 'akaza-adventure' ); ?></span>
					<a class="ftpf-btn ftpf-btn--outline" href="#organisations"><?php esc_html_e( 'Explore More', 'akaza-adventure' ); ?></a>
				</div>
			</div>
		</div>
	</div>
</section>
