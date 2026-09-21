<?php
/**
 * Code of Conduct — Hero section.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_template_part(
	'template-parts/page-hero',
	null,
	array(
		'eyebrow' => __( 'By Solution', 'akaza-adventure' ),
		'title'   => __( 'Code of Conduct', 'akaza-adventure' ),
		'lead'    => __( 'Turn organisational values into clear everyday workplace decisions.', 'akaza-adventure' ),
	)
);
