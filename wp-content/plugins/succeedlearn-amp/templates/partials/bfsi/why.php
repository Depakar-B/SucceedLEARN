<?php
/**
 * BFSI & PE/VC AMP — Why cybersecurity awareness matters.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$why_image = succeedlearn_amp_get_bfsi_why_image();
?>
<section class="sl-bfsi-why" aria-labelledby="sl-bfsi-why-title">
	<div class="sl-wrap">
		<div class="sl-bfsi-why__grid">
			<div class="sl-bfsi-why__media">
				<div class="sl-bfsi-why__image">
					<amp-img
						src="<?php echo esc_url( $why_image ); ?>"
						width="720"
						height="720"
						layout="responsive"
						alt="<?php esc_attr_e( 'Why cybersecurity awareness matters for BFSI and PE/VC', 'succeedlearn-amp' ); ?>"
					></amp-img>
				</div>
			</div>

			<div class="sl-bfsi-why__content">
				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'Financial Services Risk', 'succeedlearn-amp' ); ?>
				</span>

				<h2 id="sl-bfsi-why-title" class="sl-h2">
					<?php esc_html_e( 'Why Cybersecurity Awareness Matters for', 'succeedlearn-amp' ); ?>
					<span><?php esc_html_e( 'BFSI & PE/VC', 'succeedlearn-amp' ); ?></span>
				</h2>

				<div class="sl-bfsi-why__copy">
					<p><?php esc_html_e( 'Cybercriminals do not always need to defeat sophisticated security technology. Sometimes, they only need an employee to trust the wrong email, approve a fraudulent request, share information with an unverified third party or overlook suspicious activity.', 'succeedlearn-amp' ); ?></p>
					<p><?php esc_html_e( 'For BFSI and PE/VC organizations, the potential impact is particularly significant. Employees may work with financial transactions, customer information, investor data, confidential deal information, portfolio-company data and market-sensitive information.', 'succeedlearn-amp' ); ?></p>
					<p><?php esc_html_e( 'The threat landscape also extends beyond conventional phishing. Employees may encounter voice and video impersonation, deepfakes, compromised insiders, malicious or negligent internal behavior, unsafe third-party data sharing and physical attempts to gain access to information or premises.', 'succeedlearn-amp' ); ?></p>
					<p><?php esc_html_e( 'Cybersecurity awareness training helps employees understand these risks in the context of the work they actually perform.', 'succeedlearn-amp' ); ?></p>
				</div>
			</div>
		</div>
	</div>
</section>
