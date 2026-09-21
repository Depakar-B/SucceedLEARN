<?php
/**
 * Cybersecurity Awareness — Integration Section
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$integration_image = function_exists( 'akaza_upload_url' )
	? akaza_upload_url( '2026/09/enterprise-integration-web.webp' )
	: 'https://succeedlearn.com/wp-content/uploads/2026/09/enterprise-integration-web.webp';
?>

<section
	class="sl-cyber-awareness-integration"
	aria-labelledby="sl-cyber-awareness-integration-title"
>
	<div class="container">

		<div class="sl-cyber-awareness-integration__grid">

			<div class="sl-cyber-awareness-integration__visual">
				<div class="sl-cyber-awareness-integration__image">
					<img
						src="<?php echo esc_url( $integration_image ); ?>"
						alt="<?php esc_attr_e( 'Enterprise tools connected to your Microsoft environment', 'akaza-adventure' ); ?>"
						width="1200"
						height="940"
						loading="lazy"
						decoding="async"
					/>
				</div>
			</div>

			<div class="sl-cyber-awareness-integration__content">

				<div class="sl-cyber-awareness-integration__heading">

					<span class="sl-home-sub-heading">
						<?php esc_html_e( 'Free Integration Setup', 'akaza-adventure' ); ?>
					</span>

					<h2 id="sl-cyber-awareness-integration-title">
						<?php
						echo wp_kses(
							__( 'Built to work with your <span>Microsoft environment.</span>', 'akaza-adventure' ),
							array( 'span' => array() )
						);
						?>
					</h2>

					<p>
						<?php esc_html_e( 'Connect the campaign with the enterprise tools your team already uses. Standard integration setup is included at no additional cost.', 'akaza-adventure' ); ?>
					</p>

				</div>

				<div class="sl-cyber-awareness-integration__list">

					<div class="sl-cyber-awareness-integration__item">
						<div class="sl-cyber-awareness-integration__item-title">
							<?php esc_html_e( 'Integrations', 'akaza-adventure' ); ?>
						</div>
						<div class="sl-cyber-awareness-integration__item-text">
							<?php esc_html_e( 'Free integration setup with your favourite enterprise tools', 'akaza-adventure' ); ?>
						</div>
					</div>

					<div class="sl-cyber-awareness-integration__item">
						<div class="sl-cyber-awareness-integration__item-title">
							<?php esc_html_e( 'SSO', 'akaza-adventure' ); ?>
						</div>
						<div class="sl-cyber-awareness-integration__item-text">
							<?php esc_html_e( 'Entra ID, OneLogin, Okta, JumpCloud and Google Workspace', 'akaza-adventure' ); ?>
						</div>
					</div>

					<div class="sl-cyber-awareness-integration__item">
						<div class="sl-cyber-awareness-integration__item-title">
							<?php esc_html_e( 'HRIS Systems', 'akaza-adventure' ); ?>
						</div>
						<div class="sl-cyber-awareness-integration__item-text">
							<?php esc_html_e( 'Darwinbox, Keka, Workday and more', 'akaza-adventure' ); ?>
						</div>
					</div>

					<div class="sl-cyber-awareness-integration__item">
						<div class="sl-cyber-awareness-integration__item-title">
							<?php esc_html_e( 'GRC Systems', 'akaza-adventure' ); ?>
						</div>
						<div class="sl-cyber-awareness-integration__item-text">
							<?php esc_html_e( 'Vanta customers receive a 50% discount on the price', 'akaza-adventure' ); ?>
						</div>
					</div>

				</div>

			</div>

		</div>

	</div>
</section>
