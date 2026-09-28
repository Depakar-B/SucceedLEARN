<?php
/**
 * BFSI & PE/VC — Why Cybersecurity Awareness Matters.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$bfsi_why_file  = '2026/09/BFSI-PE-VC-Why.webp';
$bfsi_why_local = WP_CONTENT_DIR . '/uploads/' . $bfsi_why_file;
$bfsi_why_image = '';

if ( function_exists( 'akaza_upload_url' ) && file_exists( $bfsi_why_local ) ) {
	$bfsi_why_image = akaza_upload_url( $bfsi_why_file );
} elseif ( file_exists( $bfsi_why_local ) ) {
	$bfsi_why_image = content_url( '/uploads/' . $bfsi_why_file );
}
?>

<section
	class="sl-bfsi-why"
	aria-labelledby="sl-bfsi-why-title"
>
	<div class="container">

		<div class="sl-bfsi-why__grid">

			<div class="sl-bfsi-why__media">
				<?php if ( $bfsi_why_image ) : ?>
					<div class="sl-bfsi-why__image">
						<img
							src="<?php echo esc_url( $bfsi_why_image ); ?>"
							alt="<?php esc_attr_e( 'Why cybersecurity awareness matters for BFSI and PE/VC', 'akaza-adventure' ); ?>"
							width="720"
							height="720"
							loading="lazy"
							decoding="async"
						/>
					</div>
				<?php else : ?>
					<div class="sl-bfsi-why__image sl-bfsi-why__image--placeholder" aria-hidden="true"></div>
				<?php endif; ?>
			</div>

			<div class="sl-bfsi-why__content">

				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'Financial Services Risk', 'akaza-adventure' ); ?>
				</span>

				<h2 id="sl-bfsi-why-title">
					<?php esc_html_e( 'Why Cybersecurity Awareness Matters for', 'akaza-adventure' ); ?>
					<span><?php esc_html_e( 'BFSI & PE/VC', 'akaza-adventure' ); ?></span>
				</h2>

				<div class="sl-bfsi-why__copy">
					<p>
						<?php
						esc_html_e(
							'Cybercriminals do not always need to defeat sophisticated security technology. Sometimes, they only need an employee to trust the wrong email, approve a fraudulent request, share information with an unverified third party or overlook suspicious activity.',
							'akaza-adventure'
						);
						?>
					</p>

					<p>
						<?php
						esc_html_e(
							'For BFSI and PE/VC organizations, the potential impact is particularly significant. Employees may work with financial transactions, customer information, investor data, confidential deal information, portfolio-company data and market-sensitive information.',
							'akaza-adventure'
						);
						?>
					</p>

					<p>
						<?php
						esc_html_e(
							'The threat landscape also extends beyond conventional phishing. Employees may encounter voice and video impersonation, deepfakes, compromised insiders, malicious or negligent internal behavior, unsafe third-party data sharing and physical attempts to gain access to information or premises.',
							'akaza-adventure'
						);
						?>
					</p>

					<p>
						<?php
						esc_html_e(
							'Cybersecurity awareness training helps employees understand these risks in the context of the work they actually perform.',
							'akaza-adventure'
						);
						?>
					</p>
				</div>

			</div>

		</div>

	</div>
</section>
