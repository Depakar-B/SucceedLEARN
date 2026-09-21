<?php
/**
 * Terms and Conditions — Body content.
 *
 * Source: https://succeedlearn.com/terms-and-conditions/
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$toc_items = array(
	'introduction'          => __( '1. Introduction', 'akaza-adventure' ),
	'purchase-and-payment'  => __( '2. Purchase and Payment', 'akaza-adventure' ),
	'refund-cancellation'   => __( '3. Refund and Cancellation Policy', 'akaza-adventure' ),
	'intellectual-property' => __( '4. Intellectual Property', 'akaza-adventure' ),
	'usage-and-access'      => __( '5. Usage and Access', 'akaza-adventure' ),
	'governing-law'         => __( '6. Governing Law and Jurisdiction', 'akaza-adventure' ),
	'agreement-override'    => __( '7. Agreement Override', 'akaza-adventure' ),
	'contact-information'   => __( '8. Contact Information', 'akaza-adventure' ),
);
?>
<section class="sl-legal-body" aria-label="<?php esc_attr_e( 'Terms and Conditions details', 'akaza-adventure' ); ?>">
	<div class="sl-legal-body__container">

		<?php
		get_template_part(
			'template-parts/global/legal-toc',
			null,
			array(
				'items' => $toc_items,
				'title' => __( 'Terms and Conditions', 'akaza-adventure' ),
				'label' => __( 'On this page', 'akaza-adventure' ),
				'aria'  => __( 'Terms and Conditions sections', 'akaza-adventure' ),
			)
		);

		get_template_part( 'template-parts/terms-and-conditions/sections' );
		?>

	</div>
</section>
