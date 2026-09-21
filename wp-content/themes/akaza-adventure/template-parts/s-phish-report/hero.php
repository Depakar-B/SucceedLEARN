<?php
/**
 * S-PhishReport — Hero.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_template_part(
	'template-parts/global/legal-hero',
	null,
	array(
		'id'      => 'sphish-report',
		'eyebrow' => __( 'Legal', 'akaza-adventure' ),
		'title'   => __( 'S-PhishReport', 'akaza-adventure' ),
		'lead'    => __( 'Privacy Policy and Terms of Use for the S-PhishReport Google Add-On, provided by Succeed Technologies Pvt Ltd.', 'akaza-adventure' ),
	)
);
