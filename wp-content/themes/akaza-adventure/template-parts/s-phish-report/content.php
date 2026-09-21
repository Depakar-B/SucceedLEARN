<?php
/**
 * S-PhishReport — Body content.
 *
 * Source: https://succeedlearn.com/s-phish-report/
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$toc_items = array(
	'introduction'              => __( '1. Introduction', 'akaza-adventure' ),
	'overview'                  => __( '2. Overview', 'akaza-adventure' ),
	'key-features'              => __( '3. Key Features', 'akaza-adventure' ),
	'permissions-and-scopes'    => __( '4. Permissions and Scopes', 'akaza-adventure' ),
	'data-privacy-and-security' => __( '5. Data Privacy and Security', 'akaza-adventure' ),
	'admin-configuration'       => __( '6. Admin Configuration and Deployment', 'akaza-adventure' ),
	'use-of-data'               => __( '7. Use of Data', 'akaza-adventure' ),
	'changes-to-policy'         => __( '8. Changes to This Policy', 'akaza-adventure' ),
	'disclaimer'                => __( '9. Disclaimer', 'akaza-adventure' ),
);
?>
<section class="sl-legal-body" aria-label="<?php esc_attr_e( 'S-PhishReport policy details', 'akaza-adventure' ); ?>">
	<div class="sl-legal-body__container">

		<?php
		get_template_part(
			'template-parts/global/legal-toc',
			null,
			array(
				'items' => $toc_items,
				'title' => __( 'S-PhishReport', 'akaza-adventure' ),
				'label' => __( 'On this page', 'akaza-adventure' ),
				'aria'  => __( 'S-PhishReport sections', 'akaza-adventure' ),
			)
		);

		get_template_part( 'template-parts/s-phish-report/sections' );
		?>

	</div>
</section>
