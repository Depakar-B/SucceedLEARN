<?php
/**
 * Cookie Policy page content wrapper.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<main id="main-content" class="slf-section sl-legal-page">
	<?php get_template_part( 'template-parts/cookie-policy/hero' ); ?>
	<div class="sl-legal-page__body container">
		<?php get_template_part( 'template-parts/cookie-policy/sections' ); ?>
	</div>
</main>
