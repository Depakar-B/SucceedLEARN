<?php
/**
 * Newsletter — Hero section.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$contact_url = function_exists( 'akaza_page_url' ) ? akaza_page_url( 'contact-us' ) : home_url( '/contact-us/' );
?>
<header class="slf-page-hero slf-blog-hero">
	<?php
	if ( function_exists( 'akaza_render_hero_breadcrumbs' ) ) {
		akaza_render_hero_breadcrumbs();
	}
	?>
	<p class="slf-eyebrow slf-eyebrow--sm"></p>
	<h1><?php esc_html_e( 'SucceedLEARN Newsletters', 'akaza-adventure' ); ?></h1>
	<h2 class="slf-blog-hero__subtitle">
		<?php esc_html_e( 'Updates, insights, and stories from our compliance and security awareness community.', 'akaza-adventure' ); ?>
	</h2>
	<p class="slf-lead slf-blog-hero__lead">
		<?php esc_html_e( 'Browse our newsletters by year or search to find past editions for your teams.', 'akaza-adventure' ); ?>
	</p>
	<div class="slf-blog-hero__actions">
		<a class="slf-btn slf-btn--primary" href="<?php echo esc_url( $contact_url ); ?>">
			<?php esc_html_e( 'Contact Us', 'akaza-adventure' ); ?>
		</a>
	</div>
</header>
