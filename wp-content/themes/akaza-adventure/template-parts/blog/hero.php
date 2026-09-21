<?php
/**
 * Blog — Hero section.
 *
 * @package Akaza_Adventure
 *
 * @var array $args {
 *   @type WP_Term|null $term Category term when on a category archive.
 * }
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$term        = isset( $args['term'] ) && $args['term'] instanceof WP_Term ? $args['term'] : null;
$contact_url = function_exists( 'akaza_page_url' ) ? akaza_page_url( 'contact-us' ) : home_url( '/contact-us/' );

if ( $term ) {
	$title       = $term->name;
	$subtitle    = function_exists( 'akaza_get_category_subtitle' ) ? akaza_get_category_subtitle( $term->term_id ) : '';
	$description = term_description( $term->term_id, 'category' );
} else {
	$title       = __( 'SucceedLEARN Blogs', 'akaza-adventure' );
	$subtitle    = __( 'Expert insights on compliance, security awareness, and building safer organisations worldwide.', 'akaza-adventure' );
	$description = __( 'Browse articles covering compliance updates, training best practices, and workplace culture. Filter by topic or search to find guidance for your teams.', 'akaza-adventure' );
}
?>
<header class="slf-page-hero slf-blog-hero">
	<?php
	if ( function_exists( 'akaza_render_hero_breadcrumbs' ) ) {
		akaza_render_hero_breadcrumbs();
	}
	?>
	<p class="slf-eyebrow slf-eyebrow--sm"></p>
	<h1><?php echo esc_html( $title ); ?></h1>
	<?php if ( $subtitle ) : ?>
		<h2 class="slf-blog-hero__subtitle">
			<?php echo esc_html( $subtitle ); ?>
		</h2>
	<?php endif; ?>
	<?php if ( $description ) : ?>
		<?php if ( $term ) : ?>
			<div class="slf-lead slf-blog-hero__lead">
				<?php echo wp_kses_post( $description ); ?>
			</div>
		<?php else : ?>
			<p class="slf-lead slf-blog-hero__lead">
				<?php echo esc_html( $description ); ?>
			</p>
		<?php endif; ?>
	<?php endif; ?>
	<div class="slf-blog-hero__actions">
		<a class="slf-btn slf-btn--primary" href="<?php echo esc_url( $contact_url ); ?>">
			<?php esc_html_e( 'Contact Us', 'akaza-adventure' ); ?>
		</a>
	</div>
</header>
