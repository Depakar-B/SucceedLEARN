<?php
/**
 * Privacy Policy — Body content.
 *
 * Source: https://succeedlearn.com/privacy-policy/
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$toc_items = array(
	'introduction'           => __( '1. Introduction', 'akaza-adventure' ),
	'information-we-collect' => __( '2. Information We Collect', 'akaza-adventure' ),
	'how-we-collect'         => __( '3. How We Collect Information', 'akaza-adventure' ),
	'how-we-use'             => __( '4. How We Use Your Information', 'akaza-adventure' ),
	'cookies'                => __( '5. Cookies', 'akaza-adventure' ),
	'data-security'          => __( '6. Data Security', 'akaza-adventure' ),
	'third-party'            => __( '7. Third-Party Access and Disclosure', 'akaza-adventure' ),
	'data-retention'         => __( '8. Data Retention Policy', 'akaza-adventure' ),
	'international-transfer' => __( '10. International Data Transfers', 'akaza-adventure' ),
	'representative'         => __( '11. Representative', 'akaza-adventure' ),
	'user-rights'            => __( '12. User Rights and Controls', 'akaza-adventure' ),
	'policy-updates'         => __( '13. Policy Updates', 'akaza-adventure' ),
	'contact-us'             => __( '14. Contact Us', 'akaza-adventure' ),
);
?>
<section class="sl-legal-body" aria-label="<?php esc_attr_e( 'Privacy Policy details', 'akaza-adventure' ); ?>">
	<div class="sl-legal-body__container">

		<?php
		get_template_part(
			'template-parts/global/legal-toc',
			null,
			array(
				'items' => $toc_items,
				'title' => __( 'Privacy Policy', 'akaza-adventure' ),
				'label' => __( 'On this page', 'akaza-adventure' ),
				'aria'  => __( 'Privacy Policy sections', 'akaza-adventure' ),
			)
		);

		get_template_part( 'template-parts/privacy-policy/sections' );
		?>

	</div>
</section>
