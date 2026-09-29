<?php
/**
 * S-Sync — Connect SucceedLEARN with the systems you already use.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$system_groups = array(
	array(
		'title'    => __( 'Single Sign-On & Identity Providers', 'akaza-adventure' ),
		'lead'     => __( 'Secure access through your existing identity environment', 'akaza-adventure' ),
		'text'     => __( 'Support secure and streamlined access using established enterprise identity providers and SAML-based authentication.', 'akaza-adventure' ),
		'logos'    => array(
			array(
				'name' => __( 'Microsoft Entra ID', 'akaza-adventure' ),
				'file' => '2025/08/Microsoft_Entra_ID_color_icon.svg-1.png',
			),
			array(
				'name' => __( 'OneLogin', 'akaza-adventure' ),
				'file' => '2025/08/Onelogin_Mark_black_RGB.png-1-1.png',
			),
			array(
				'name' => __( 'Okta', 'akaza-adventure' ),
				'file' => '2025/08/okta-icon-logo-png_seeklogo-483919-1.png',
			),
			array(
				'name' => __( 'JumpCloud', 'akaza-adventure' ),
				'file' => '2025/08/Asset-1@2x-1.png',
			),
			array(
				'name' => __( 'Other SAML 2.0 Identity Providers', 'akaza-adventure' ),
				'file' => '',
			),
		),
	),
	array(
		'title'    => __( 'Workplace Authentication (OAuth)', 'akaza-adventure' ),
		'lead'     => __( 'Connect with familiar workplace accounts', 'akaza-adventure' ),
		'text'     => __( 'Enable users to authenticate through supported workplace ecosystems for a more familiar sign-in experience.', 'akaza-adventure' ),
		'logos'    => array(
			array(
				'name' => __( 'Google', 'akaza-adventure' ),
				'file' => '2025/08/image-4.png',
			),
			array(
				'name' => __( 'Microsoft', 'akaza-adventure' ),
				'file' => '2025/08/Microsoft_Entra_ID_color_icon.svg-1.png',
			),
		),
	),
	array(
		'title'    => __( 'HR & HCM Systems', 'akaza-adventure' ),
		'lead'     => __( 'Keep learner information aligned with your workforce', 'akaza-adventure' ),
		'text'     => __( 'Connect supported HR and HCM platforms to help automate employee onboarding, synchronise workforce information and maintain more accurate learner records.', 'akaza-adventure' ),
		'logos'    => array(
			array(
				'name' => __( 'Keka', 'akaza-adventure' ),
				'file' => '',
			),
			array(
				'name' => __( 'Darwinbox', 'akaza-adventure' ),
				'file' => '',
			),
			array(
				'name' => __( 'Zoho People', 'akaza-adventure' ),
				'file' => '',
			),
			array(
				'name' => __( 'BambooHR', 'akaza-adventure' ),
				'file' => '',
			),
			array(
				'name' => __( 'Workday', 'akaza-adventure' ),
				'file' => '',
			),
		),
	),
	array(
		'title'    => __( 'Automated User Provisioning', 'akaza-adventure' ),
		'lead'     => __( 'Keep user access aligned as your workforce changes', 'akaza-adventure' ),
		'text'     => __( 'Support automated user provisioning and relevant profile updates through SCIM-based identity management.', 'akaza-adventure' ),
		'logos'    => array(
			array(
				'name' => __( 'SCIM', 'akaza-adventure' ),
				'file' => '',
			),
		),
	),
	array(
		'title'    => __( 'Compliance Automation', 'akaza-adventure' ),
		'lead'     => __( 'Connect awareness activity with your compliance ecosystem', 'akaza-adventure' ),
		'text'     => __( 'Integrate SucceedLEARN with Vanta to support synchronisation of relevant security-awareness training and completion information.', 'akaza-adventure' ),
		'logos'    => array(
			array(
				'name' => __( 'Vanta', 'akaza-adventure' ),
				'file' => '',
			),
		),
	),
);
?>

<section
	class="sl-s-sync-systems"
	aria-labelledby="sl-s-sync-systems-title"
>
	<div class="container">

		<div class="sl-s-sync-systems__intro">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Connected Systems', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-s-sync-systems-title">
				<?php esc_html_e( 'Connect SucceedLEARN with the', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'systems you already use', 'akaza-adventure' ); ?></span>
			</h2>

			<p>
				<?php
				esc_html_e(
					'S-Sync supports integrations across identity management, workplace authentication, HR and HCM systems, compliance platforms and other enterprise environments—helping organisations connect security awareness with their existing technology stack.',
					'akaza-adventure'
				);
				?>
			</p>

			<p>
				<?php
				esc_html_e(
					'From Single Sign-On and automated user provisioning to workforce synchronisation and compliance workflows, organisations can select the integrations that fit their existing infrastructure and deployment requirements.',
					'akaza-adventure'
				);
				?>
			</p>

		</div>

		<div class="sl-s-sync-systems__groups">

			<?php foreach ( $system_groups as $group ) : ?>

				<article class="sl-s-sync-systems__card">

					<h3 class="sl-panel-title">
						<?php echo esc_html( $group['title'] ); ?>
					</h3>

					<p class="sl-s-sync-systems__lead">
						<?php echo esc_html( $group['lead'] ); ?>
					</p>

					<p>
						<?php echo esc_html( $group['text'] ); ?>
					</p>

					<div class="sl-s-sync-systems__logos" role="list">

						<?php foreach ( $group['logos'] as $logo ) : ?>

							<div class="sl-s-sync-systems__logo" role="listitem">

								<?php if ( ! empty( $logo['file'] ) && function_exists( 'akaza_upload_url' ) ) : ?>

									<img
										src="<?php echo esc_url( akaza_upload_url( $logo['file'] ) ); ?>"
										alt="<?php echo esc_attr( $logo['name'] ); ?>"
										width="120"
										height="48"
										loading="lazy"
										decoding="async"
									>

								<?php else : ?>

									<span class="sl-s-sync-systems__logo-label">
										<?php echo esc_html( $logo['name'] ); ?>
									</span>

								<?php endif; ?>

							</div>

						<?php endforeach; ?>

					</div>

				</article>

			<?php endforeach; ?>

		</div>

	</div>
</section>
