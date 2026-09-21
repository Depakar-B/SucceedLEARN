<?php
/**
 * Clients page content wrapper.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<main id="main-content" class="sl-clients-page">
	<?php get_template_part( 'template-parts/clients/hero' ); ?>
	<?php get_template_part( 'template-parts/home/stats' ); ?>
	<?php get_template_part( 'template-parts/clients/logo-grid' ); ?>
	<?php get_template_part( 'template-parts/clients/cta-strip' ); ?>
</main>
