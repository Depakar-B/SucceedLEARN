<?php
/**
 * S-PhishReport page content wrapper.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<main id="main-content" class="sl-legal-page sl-sphish-report-page">
	<?php get_template_part( 'template-parts/s-phish-report/hero' ); ?>
	<?php get_template_part( 'template-parts/s-phish-report/content' ); ?>
</main>
