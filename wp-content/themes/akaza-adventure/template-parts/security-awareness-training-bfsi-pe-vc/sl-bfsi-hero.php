<?php
/**
 * BFSI & PE/VC — Hero section.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$bfsi_hero_image = 'https://succeedlearn.com/wp-content/uploads/2026/10/BFSIPEVC.webp';
$bfsi_hero_local = WP_CONTENT_DIR . '/uploads/2026/10/BFSIPEVC.webp';

if ( function_exists( 'akaza_upload_url' ) && file_exists( $bfsi_hero_local ) ) {
	$bfsi_hero_image = akaza_upload_url( '2026/10/BFSIPEVC.webp' );
}
?>

<section
	class="sl-bfsi-hero"
	aria-labelledby="sl-bfsi-hero-title"
>
	<div class="container">

		<div class="sl-bfsi-hero__grid">

			<div class="sl-bfsi-hero__content">

				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'Financial Services Security Awareness', 'akaza-adventure' ); ?>
				</span>

				<h1 id="sl-bfsi-hero-title">
					<?php esc_html_e( 'Cybersecurity Awareness Training for', 'akaza-adventure' ); ?>
					<span><?php esc_html_e( 'BFSI & PE/VC', 'akaza-adventure' ); ?></span>
				</h1>

				<h2 class="sl-hero-h2">
					<?php esc_html_e( 'Build Cyber Awareness Around the Risks Financial Services Employees Face Every Day', 'akaza-adventure' ); ?>
				</h2>

				<p>
					<?php
					esc_html_e(
						'Financial services organizations handle highly sensitive customer, financial, investor, employee and transaction data every day. At the same time, employees are increasingly exposed to sophisticated social engineering, impersonation, insider threats, third-party risks and AI-enabled attacks.',
						'akaza-adventure'
					);
					?>
				</p>

				<p>
					<?php
					esc_html_e(
						"SucceedLEARN's Cybersecurity Awareness Training for BFSI & PE/VC is purpose-built for employees across Banking, Financial Services and Insurance (BFSI), Private Equity (PE) and Venture Capital (VC) organizations.",
						'akaza-adventure'
					);
					?>
				</p>

				<p>
					<?php
					esc_html_e(
						'Through practical scenarios and interactive learning, the course helps employees recognize security threats, protect sensitive information, respond appropriately to suspicious activity, and understand their role in reducing human-related cyber risk.',
						'akaza-adventure'
					);
					?>
				</p>

				<div class="sl-hero-actions sl-bfsi-hero__actions">
					<a class="sl-hero-btn sl-hero-btn-primary" href="#contact">
						<?php esc_html_e( 'Request a Demo', 'akaza-adventure' ); ?>
						<span aria-hidden="true">→</span>
					</a>
				</div>

			</div>

			<div class="sl-bfsi-hero__media">
				<div class="sl-bfsi-hero__image">
					<img
						src="<?php echo esc_url( $bfsi_hero_image ); ?>"
						alt="<?php esc_attr_e( 'Cybersecurity Awareness Training for BFSI and PE/VC', 'akaza-adventure' ); ?>"
						width="720"
						height="540"
						loading="eager"
						decoding="async"
					/>
				</div>
			</div>

		</div>

	</div>
</section>
