<?php
/**
 * Failure to Prevent Fraud — Hero.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Approved course / campaign image URL (approx. 4:5). Empty shows the placeholder.
$hero_image = '';
?>

<section id="top" class="ftpf-section ftpf-section--white ftpf-hero" aria-labelledby="ftpf-hero-title">
	<div class="ftpf-container ftpf-hero__grid">

		<div class="ftpf-hero__copy">
			<span class="sl-home-sub-heading"><?php esc_html_e( 'Financial Crime Prevention eLearning', 'akaza-adventure' ); ?></span>

			<h1 id="ftpf-hero-title">
				<?php esc_html_e( 'Failure to Prevent', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'Fraud Training', 'akaza-adventure' ); ?></span>
			</h1>

			<p class="ftpf-hero__lead">
				<?php esc_html_e( 'Help employees understand fraud risk, recognise warning signs and know when something needs to be questioned or escalated.', 'akaza-adventure' ); ?>
			</p>

			<p class="ftpf-hero__description">
				<?php esc_html_e( 'A practical eLearning course connecting the UK Failure to Prevent Fraud offence with the decisions employees make around information, reporting, investor communications and business processes.', 'akaza-adventure' ); ?>
			</p>

			<div class="ftpf-btn-row">
				<a class="ftpf-btn ftpf-btn--solid" href="#request-demo"><?php esc_html_e( 'Request a Demo', 'akaza-adventure' ); ?></a>
				<a class="ftpf-btn ftpf-btn--outline" href="#why-it-matters"><?php esc_html_e( 'Why This Training Matters', 'akaza-adventure' ); ?></a>
			</div>
		</div>

		<div class="ftpf-hero__media">
			<?php if ( $hero_image ) : ?>
				<img
					class="ftpf-hero__image"
					src="<?php echo esc_url( $hero_image ); ?>"
					alt="<?php esc_attr_e( 'Failure to Prevent Fraud course preview', 'akaza-adventure' ); ?>"
					loading="eager"
				>
			<?php else : ?>
				<div
					class="ftpf-hero__placeholder"
					role="img"
					aria-label="<?php esc_attr_e( 'Placeholder for approved Failure to Prevent Fraud course image', 'akaza-adventure' ); ?>"
				>
					<span class="ftpf-hero__placeholder-icon" aria-hidden="true">
						<svg viewBox="0 0 64 64">
							<rect x="7" y="10" width="50" height="41" rx="5"></rect>
							<circle cx="43" cy="22" r="4"></circle>
							<path d="M14 43 24 31 33 38 41 29 50 43"></path>
						</svg>
					</span>
					<strong><?php esc_html_e( 'Approved course / campaign image', 'akaza-adventure' ); ?></strong>
					<p><?php esc_html_e( 'Replace this space with the final Failure to Prevent Fraud visual.', 'akaza-adventure' ); ?></p>
				</div>
			<?php endif; ?>
		</div>

	</div>
</section>
