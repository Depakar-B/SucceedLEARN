<?php
/**
 * ISO 27001:2022 Staff Awareness Training — Customisation.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$iso27_custom_file  = '2026/01/ISO-27001-1.webp';
$iso27_custom_image = 'https://succeedlearn.com/wp-content/uploads/' . $iso27_custom_file;

if ( function_exists( 'akaza_upload_url' ) && file_exists( WP_CONTENT_DIR . '/uploads/' . $iso27_custom_file ) ) {
	$iso27_custom_image = akaza_upload_url( $iso27_custom_file );
}

$customise_items = array(
	__( 'Branding', 'akaza-adventure' ),
	__( 'Internal terminology', 'akaza-adventure' ),
	__( 'Organization-specific examples', 'akaza-adventure' ),
	__( 'Relevant workforce or industry context', 'akaza-adventure' ),
);
?>

<section
	class="sl-iso27-customise"
	id="customise-the-training"
	aria-labelledby="sl-iso27-customise-title"
>
	<div class="container">

		<div class="sl-iso27-customise__grid">

			<div class="sl-iso27-customise__content">

				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'Customisation', 'akaza-adventure' ); ?>
				</span>

				<h2 id="sl-iso27-customise-title">
					<?php esc_html_e( 'Learning That Reflects', 'akaza-adventure' ); ?>
					<span><?php esc_html_e( 'Your Organisation', 'akaza-adventure' ); ?></span>
				</h2>

				<p>
					<?php esc_html_e( 'ISO 27001 awareness becomes more meaningful when employees can connect general information security principles with the policies and procedures they are expected to follow internally. Depending on the agreed customization scope, the training can be adapted to incorporate organization-specific elements such as:', 'akaza-adventure' ); ?>
				</p>

				<ul class="sl-iso27-customise__list">
					<?php foreach ( $customise_items as $item ) : ?>
						<li><?php echo esc_html( $item ); ?></li>
					<?php endforeach; ?>
				</ul>

			</div>

			<div class="sl-iso27-customise__media">
				<div class="sl-iso27-customise__image">
					<img
						src="<?php echo esc_url( $iso27_custom_image ); ?>"
						alt="<?php esc_attr_e( 'Customisable ISO 27001:2022 staff awareness training for your organisation', 'akaza-adventure' ); ?>"
						width="720"
						height="540"
						loading="lazy"
						decoding="async"
					/>
				</div>
			</div>

		</div>

	</div>
</section>
