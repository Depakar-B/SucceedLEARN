<?php
/**
 * Global Workplace Compliance Training — Trust Centre section.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$trust_url = 'https://trust.succeedtech.com/';

$cert_badges = array(
	array(
		'src' => 'https://succeedlearn.com/wp-content/uploads/2026/03/ISO-27001.webp',
		'alt' => __( 'ISO 27001', 'akaza-adventure' ),
	),
	array(
		'src' => 'https://succeedlearn.com/wp-content/uploads/2026/03/GDPR.webp',
		'alt' => __( 'GDPR', 'akaza-adventure' ),
	),
	array(
		'src' => 'https://succeedlearn.com/wp-content/uploads/2026/03/Soc-2.webp',
		'alt' => __( 'SOC 2', 'akaza-adventure' ),
	),
);
?>
<section
	class="sl-global-trust"
	id="trust-centre"
	aria-labelledby="sl-global-trust-title"
>
	<div class="container">

		<div class="sl-global-trust__panel">

			<header class="sl-global-trust__intro">

				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'Security & trust', 'akaza-adventure' ); ?>
				</span>

				<h2 id="sl-global-trust-title">
					<?php esc_html_e( 'Security you can', 'akaza-adventure' ); ?>
					<span><?php esc_html_e( 'verify.', 'akaza-adventure' ); ?></span>
				</h2>

				<p>
					<?php
					esc_html_e(
						'SucceedLEARN is a product of Succeed Technologies, an ISO 27001:2022, GDPR-aligned, and SOC 2 certified organisation trusted to deliver engaging, interactive and secure eLearning at scale.',
						'akaza-adventure'
					);
					?>
				</p>

			</header>

			<ul class="sl-global-trust__badges" role="list" aria-label="<?php esc_attr_e( 'Security certifications', 'akaza-adventure' ); ?>">
				<?php foreach ( $cert_badges as $badge ) : ?>
					<li class="sl-global-trust__badge">
						<img
							src="<?php echo esc_url( $badge['src'] ); ?>"
							alt="<?php echo esc_attr( $badge['alt'] ); ?>"
							width="120"
							height="120"
							loading="lazy"
							decoding="async"
						/>
					</li>
				<?php endforeach; ?>
			</ul>

			<div class="sl-global-trust__footer">

				<p class="sl-global-trust__footer-text">
					<?php
					esc_html_e(
						'Review our security posture, compliance controls and privacy practices in the Succeed Technologies Trust Centre.',
						'akaza-adventure'
					);
					?>
				</p>

				<a
					class="sl-content-btn sl-content-btn-primary"
					href="<?php echo esc_url( $trust_url ); ?>"
					target="_blank"
					rel="noopener noreferrer"
				>
					<?php esc_html_e( 'Visit Trust Centre', 'akaza-adventure' ); ?>
				</a>

			</div>

		</div>

	</div>
</section>
