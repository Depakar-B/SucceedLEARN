<?php
/**
 * GWCT AMP — Trust Centre section.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$trust_url = 'https://trust.succeedtech.com/';

$cert_badges = array(
	array(
		'src' => 'https://succeedlearn.com/wp-content/uploads/2026/03/ISO-27001.webp',
		'alt' => __( 'ISO 27001', 'succeedlearn-amp' ),
	),
	array(
		'src' => 'https://succeedlearn.com/wp-content/uploads/2026/03/GDPR.webp',
		'alt' => __( 'GDPR', 'succeedlearn-amp' ),
	),
	array(
		'src' => 'https://succeedlearn.com/wp-content/uploads/2026/03/Soc-2.webp',
		'alt' => __( 'SOC 2', 'succeedlearn-amp' ),
	),
);
?>
<section class="sl-section sl-section--alt" id="trust-centre">
	<div class="sl-wrap sl-gwct-trust">
		<span class="sl-eyebrow"><?php esc_html_e( 'Security & trust', 'succeedlearn-amp' ); ?></span>
		<h2 class="sl-h2">
			<?php esc_html_e( 'Security you can', 'succeedlearn-amp' ); ?>
			<span><?php esc_html_e( 'verify.', 'succeedlearn-amp' ); ?></span>
		</h2>
		<p class="sl-lead">
			<?php
			esc_html_e(
				'SucceedLEARN is a product of Succeed Technologies, an ISO 27001:2022, GDPR-aligned, and SOC 2 certified organisation trusted to deliver engaging, interactive and secure eLearning at scale.',
				'succeedlearn-amp'
			);
			?>
		</p>
		<ul class="sl-gwct-trust__badges" role="list">
			<?php foreach ( $cert_badges as $badge ) : ?>
				<li>
					<amp-img
						src="<?php echo esc_url( $badge['src'] ); ?>"
						width="96"
						height="96"
						alt="<?php echo esc_attr( $badge['alt'] ); ?>"
						layout="fixed"
					></amp-img>
				</li>
			<?php endforeach; ?>
		</ul>
		<p class="sl-gwct-trust__note">
			<?php
			esc_html_e(
				'Review our security posture, compliance controls and privacy practices in the Succeed Technologies Trust Centre.',
				'succeedlearn-amp'
			);
			?>
		</p>
		<a class="sl-btn sl-btn--primary" href="<?php echo esc_url( $trust_url ); ?>" target="_blank" rel="noopener noreferrer">
			<?php esc_html_e( 'Visit Trust Centre', 'succeedlearn-amp' ); ?>
		</a>
	</div>
</section>
