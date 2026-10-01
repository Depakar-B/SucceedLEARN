<?php
/**
 * S-Sync — Enterprise Integrations (consolidated systems + capabilities).
 *
 * Brand logos use Media Library upload URLs where available; remaining
 * logos fall back to theme assets under assets/images/s-sync/.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Resolve an S-Sync integration logo URL.
 *
 * Prefers an explicit Media Library path (`url` key), then theme assets (`file`).
 *
 * @param array $logo Logo definition with optional `url` and/or `file`.
 * @return string Empty string when missing.
 */
$s_sync_logo_url = static function ( $logo ) {
	if ( ! empty( $logo['url'] ) ) {
		$path = ltrim( (string) $logo['url'], '/' );
		return function_exists( 'akaza_upload_url' )
			? akaza_upload_url( $path )
			: 'https://succeedlearn.com/wp-content/uploads/' . $path;
	}

	$file = isset( $logo['file'] ) ? ltrim( (string) $logo['file'], '/' ) : '';
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
				'url'  => '2026/10/Microsoft-Azure.webp',
			),
			array(
				'name' => __( 'OneLogin', 'akaza-adventure' ),
				'url'  => '2026/10/onelogin.webp',
			),
			array(
				'name' => __( 'Okta', 'akaza-adventure' ),
				'url'  => '2026/10/octa.webp',
			),
			array(
				'name' => __( 'JumpCloud', 'akaza-adventure' ),
				'url'  => '2026/10/jumpcloud.webp',
			),
			array(
				'name' => __( 'Other SAML 2.0 Identity Providers', 'akaza-adventure' ),
				'url'  => '2026/10/others.webp',
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
				'url'  => '2026/10/google.webp',
			),
			array(
				'name' => __( 'Microsoft', 'akaza-adventure' ),
				'url'  => '2026/10/microsoft.webp',
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
				'url'  => '2026/10/keka.webp',
			),
			array(
				'name' => __( 'Darwinbox', 'akaza-adventure' ),
				'url'  => '2026/10/darwinbox.webp',
			),
			array(
				'name' => __( 'Zoho People', 'akaza-adventure' ),
				'url'  => '2026/10/zoho-people.webp',
			),
			array(
				'name' => __( 'BambooHR', 'akaza-adventure' ),
				'url'  => '2026/10/bamboohr.webp',
			),
			array(
				'name' => __( 'Workday', 'akaza-adventure' ),
				'url'  => '2026/10/workday.webp',
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
				'url'  => '2026/10/scim.webp',
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
				'url'  => '2026/10/vanta.webp',
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
					'S-Sync connects SucceedLEARN with your existing identity, workforce, learning and compliance ecosystem—helping organisations simplify authentication, automate user management, synchronise employee information and streamline security-awareness administration.',
					'akaza-adventure'
				);
				?>
			</p>

			<p>
				<?php
				esc_html_e(
					'From Single Sign-On and automated provisioning to HR system synchronisation and compliance automation, S-Sync helps security awareness work more efficiently within your existing technology environment.',
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

					<?php
					$logo_names  = array();
					$image_logos = array();
					foreach ( $group['logos'] as $logo ) {
						$logo_names[] = $logo['name'];
						$logo_src     = $s_sync_logo_url( $logo );
						if ( $logo_src ) {
							$logo['src']   = $logo_src;
							$image_logos[] = $logo;
						}
					}
					?>

					<?php if ( ! empty( $logo_names ) ) : ?>
						<p class="sl-s-sync-integrations__names">
							<?php echo esc_html( implode( ' · ', $logo_names ) ); ?>
						</p>
					<?php endif; ?>

					<?php if ( ! empty( $image_logos ) ) : ?>
						<div class="sl-s-sync-integrations__logos" role="list">

							<?php foreach ( $image_logos as $logo ) : ?>

								<div class="sl-s-sync-integrations__logo" role="listitem">
									<img
										src="<?php echo esc_url( $logo['src'] ); ?>"
										alt="<?php echo esc_attr( $logo['name'] ); ?>"
										width="120"
										height="48"
										loading="lazy"
										decoding="async"
									>
								</div>

							<?php endforeach; ?>

						</div>
					<?php endif; ?>

				</article>

			<?php endforeach; ?>

		</div>

	</div>
</section>
