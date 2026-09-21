<?php
/**
 * Terms and Conditions page content wrapper.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<main id="main-content" class="sl-legal-page sl-terms-page">
	<?php get_template_part( 'template-parts/terms-and-conditions/hero' ); ?>
	<?php get_template_part( 'template-parts/terms-and-conditions/content' ); ?>
</main>
