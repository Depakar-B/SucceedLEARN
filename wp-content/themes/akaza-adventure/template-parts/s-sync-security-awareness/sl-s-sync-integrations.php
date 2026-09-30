<?php
/**
 * S-Sync — Enterprise Integrations (consolidated systems + capabilities).
 *
 * Logos prefer theme assets mirrored from the S-Sync LMS dashboard
 * (local/s_sync/pix) where available.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Resolve an S-Sync integration logo URL from theme assets.
 *
 * @param string $file Filename under assets/images/s-sync/.
 * @return string Empty string when missing.
 */
$s_sync_logo_url = static function ( $file ) {
	$file = ltrim( (string) $file, '/' );
	if ( '' === $file ) {
		return '';
	}

	$relative = 's-sync/' . $file;
	$path     = get_template_directory() . '/assets/images/' . $relative;
	if ( ! is_readable( $path ) ) {
		return '';
	}

	return function_exists( 'akaza_img' )
		? akaza_img( $relative )
		: trailingslashit( get_template_directory_uri() ) . 'assets/images/' . $relative;
};

$integration_groups = array(
	array(
		'title'       => __( 'Single Sign-On & Identity', 'akaza-adventure' ),
		'lead'        => __( 'Secure access through your existing identity environment', 'akaza-adventure' ),
		'text'        => __( 'Enable employees to securely access SucceedLEARN through supported SAML-based Single Sign-On (SSO), reducing the need for separate credentials and simplifying access management.', 'akaza-adventure' ),
		'supports'    => __( 'Supported Integrations:', 'akaza-adventure' ),
		'logos'       => array(
			array(
				'name' => __( 'Microsoft Entra ID', 'akaza-adventure' ),
				'file' => 'microsoft-entra-id.png',
			),
			array(
				'name' => __( 'OneLogin', 'akaza-adventure' ),
				'file' => 'onelogin.png',
			),
			array(
				'name' => __( 'Okta', 'akaza-adventure' ),
				'file' => 'okta.png',
			),
			array(
				'name' => __( 'JumpCloud', 'akaza-adventure' ),
				'file' => 'jumpcloud.png',
			),
			array(
				'name' => __( 'Other SAML 2.0 Identity Providers', 'akaza-adventure' ),
				'file' => 'others.png',
			),
		),
	),
	array(
		'title'       => __( 'Workplace Authentication', 'akaza-adventure' ),
		'lead'        => __( 'Connect with familiar workplace accounts', 'akaza-adventure' ),
		'text'        => __( 'Allow users to securely sign in through supported workplace accounts, creating a simpler and more familiar authentication experience.', 'akaza-adventure' ),
		'supports'    => __( 'Supported Integrations:', 'akaza-adventure' ),
		'logos'       => array(
			array(
				'name' => __( 'Google', 'akaza-adventure' ),
				'file' => 'google.png',
			),
			array(
				'name' => __( 'Microsoft', 'akaza-adventure' ),
				'file' => 'microsoft.png',
			),
		),
	),
	array(
		'title'       => __( 'HR & HCM Systems', 'akaza-adventure' ),
		'lead'        => __( 'Keep learner information aligned with your workforce', 'akaza-adventure' ),
		'text'        => __( 'Connect SucceedLEARN with supported HR and HCM systems to help automate employee onboarding, synchronise workforce information and maintain accurate learner records as your organisation changes.', 'akaza-adventure' ),
		'supports'    => __( 'Supported Integrations:', 'akaza-adventure' ),
		'logos'       => array(
			array(
				'name' => __( 'Keka', 'akaza-adventure' ),
				'file' => 'keka.webp',
			),
			array(
				'name' => __( 'Darwinbox', 'akaza-adventure' ),
				'file' => 'darwinbox.png',
			),
			array(
				'name' => __( 'Zoho People', 'akaza-adventure' ),
				'file' => 'zoho-people.png',
			),
			array(
				'name' => __( 'BambooHR', 'akaza-adventure' ),
				'file' => 'bamboohr.png',
			),
			array(
				'name' => __( 'Workday', 'akaza-adventure' ),
				'file' => 'workday.png',
			),
		),
	),
	array(
		'title'       => __( 'Automated User Provisioning', 'akaza-adventure' ),
		'lead'        => __( 'Keep user access aligned as your workforce changes', 'akaza-adventure' ),
		'text'        => __( 'Use SCIM-based provisioning to help automate user creation and relevant profile updates, reducing manual administration as employees join, move within or leave the organisation.', 'akaza-adventure' ),
		'supports'    => __( 'Supported Integration:', 'akaza-adventure' ),
		'logos'       => array(
			array(
				'name' => __( 'SCIM', 'akaza-adventure' ),
				'file' => 'scim.svg',
			),
		),
	),
	array(
		'title'       => __( 'LMS Compatibility', 'akaza-adventure' ),
		'lead'        => __( 'Deliver learning through your existing LMS environment', 'akaza-adventure' ),
		'text'        => __( 'Integrate applicable SucceedLEARN content with existing Learning Management Systems through SCORM-compatible packages, allowing organisations to deliver training within their preferred learning environment.', 'akaza-adventure' ),
		'supports'    => __( 'Supported Delivery:', 'akaza-adventure' ),
		'logos'       => array(
			array(
				'name' => __( 'SCORM-Compatible LMS', 'akaza-adventure' ),
				'file' => 'scorm.svg',
			),
		),
	),
	array(
		'title'       => __( 'Compliance Automation', 'akaza-adventure' ),
		'lead'        => __( 'Connect security awareness with your compliance ecosystem', 'akaza-adventure' ),
		'text'        => __( 'Connect SucceedLEARN with supported compliance platforms to help synchronise relevant security-awareness training and completion information.', 'akaza-adventure' ),
		'supports'    => __( 'Supported Integration:', 'akaza-adventure' ),
		'logos'       => array(
			array(
				'name' => __( 'Vanta', 'akaza-adventure' ),
				'file' => 'vanta.png',
			),
		),
	),
	array(
		'title'       => __( 'API-Based Connectivity', 'akaza-adventure' ),
		'lead'        => __( 'Connect beyond pre-built integrations', 'akaza-adventure' ),
		'text'        => __( 'For organisations with additional integration requirements, S-Sync supports API-based connectivity, providing greater flexibility to connect SucceedLEARN with relevant internal systems and third-party applications.', 'akaza-adventure' ),
		'supports'    => __( 'Capability:', 'akaza-adventure' ),
		'logos'       => array(
			array(
				'name' => __( 'API Connectivity', 'akaza-adventure' ),
				'file' => 'api.svg',
			),
		),
	),
);
?>

<section
	class="sl-s-sync-integrations"
	id="enterprise-integrations"
	aria-labelledby="sl-s-sync-integrations-title"
>
	<div class="container">

		<div class="sl-s-sync-integrations__intro">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Enterprise Integrations', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-s-sync-integrations-title">
				<?php esc_html_e( 'Connect SucceedLEARN With the', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'Systems You Already Use', 'akaza-adventure' ); ?></span>
			</h2>

			<p>
				<?php
				esc_html_e(
					'S-Sync connects SucceedLEARN with your existing identity, workforce, learning and compliance ecosystem—helping organisations simplify authentication, automate user management, synchronise employee information and streamline administration.',
					'akaza-adventure'
				);
				?>
			</p>

			<p>
				<?php
				esc_html_e(
					'From Single Sign-On and automated provisioning to HR system synchronisation and compliance automation, S-Sync helps your awareness programme work more efficiently within your existing technology environment.',
					'akaza-adventure'
				);
				?>
			</p>

		</div>

		<div class="sl-s-sync-integrations__groups">

			<?php foreach ( $integration_groups as $group ) : ?>

				<article class="sl-s-sync-integrations__card">

					<h3 class="sl-panel-title">
						<?php echo esc_html( $group['title'] ); ?>
					</h3>

					<p class="sl-s-sync-integrations__lead">
						<?php echo esc_html( $group['lead'] ); ?>
					</p>

					<p>
						<?php echo esc_html( $group['text'] ); ?>
					</p>

					<?php if ( ! empty( $group['supports'] ) ) : ?>
						<p class="sl-s-sync-integrations__supports">
							<?php echo esc_html( $group['supports'] ); ?>
						</p>
					<?php endif; ?>

					<div class="sl-s-sync-integrations__logos" role="list">

						<?php foreach ( $group['logos'] as $logo ) : ?>
							<?php
							$logo_src = $s_sync_logo_url( isset( $logo['file'] ) ? $logo['file'] : '' );
							?>

							<div class="sl-s-sync-integrations__logo" role="listitem">

								<?php if ( $logo_src ) : ?>

									<img
										src="<?php echo esc_url( $logo_src ); ?>"
										alt="<?php echo esc_attr( $logo['name'] ); ?>"
										width="120"
										height="48"
										loading="lazy"
										decoding="async"
									>

								<?php else : ?>

									<span class="sl-s-sync-integrations__logo-label">
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
