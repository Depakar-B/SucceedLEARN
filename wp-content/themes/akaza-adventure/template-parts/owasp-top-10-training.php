<?php
/**
 * OWASP Top 10 Training — page content wrapper.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<main id="main-content" class="sl-training-page sl-owasp-page">
	<?php get_template_part( 'template-parts/owasp/sl-owasp-hero' ); ?>
	<?php get_template_part( 'template-parts/owasp/sl-owasp-overview' ); ?>
	<?php get_template_part( 'template-parts/owasp/sl-owasp-what-is' ); ?>
	<?php get_template_part( 'template-parts/owasp/sl-owasp-curriculum' ); ?>
	<?php get_template_part( 'template-parts/owasp/sl-owasp-coding' ); ?>
	<?php get_template_part( 'template-parts/owasp/sl-owasp-outcomes' ); ?>
	<?php get_template_part( 'template-parts/owasp/sl-owasp-audience' ); ?>
	<?php get_template_part( 'template-parts/owasp/sl-owasp-experience' ); ?>
	<?php get_template_part( 'template-parts/owasp/sl-owasp-impact' ); ?>
	<?php get_template_part( 'template-parts/owasp/sl-owasp-culture' ); ?>
	<?php get_template_part( 'template-parts/owasp/sl-owasp-delivery' ); ?>
	<?php get_template_part( 'template-parts/owasp/sl-owasp-faq' ); ?>
	<?php get_template_part( 'template-parts/owasp/sl-owasp-contact' ); ?>
</main>
