<?php
/**
 * Privacy Policy page content wrapper.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<main id="main-content" class="sl-legal-page sl-privacy-page">
	<?php get_template_part( 'template-parts/privacy-policy/hero' ); ?>
	<?php get_template_part( 'template-parts/privacy-policy/content' ); ?>
</main>
