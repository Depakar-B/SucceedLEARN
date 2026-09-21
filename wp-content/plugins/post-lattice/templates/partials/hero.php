<?php
/**
 * Heading block.
 *
 * @package Post_Lattice
 *
 * @var array $post_lattice_args {
 *   @type string $uid
 *   @type array  $config
 * }
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$post_lattice_uid         = isset( $post_lattice_args['uid'] ) ? $post_lattice_args['uid'] : 'plt';
$post_lattice_config      = isset( $post_lattice_args['config'] ) ? $post_lattice_args['config'] : array();
$post_lattice_title       = isset( $post_lattice_config['hero_title'] ) ? $post_lattice_config['hero_title'] : '';
$post_lattice_subtitle    = isset( $post_lattice_config['hero_subtitle'] ) ? $post_lattice_config['hero_subtitle'] : '';
$post_lattice_description = isset( $post_lattice_config['hero_description'] ) ? $post_lattice_config['hero_description'] : '';
$post_lattice_btn_text    = isset( $post_lattice_config['hero_button_text'] ) ? $post_lattice_config['hero_button_text'] : '';
$post_lattice_btn_url     = isset( $post_lattice_config['hero_button_url'] ) ? $post_lattice_config['hero_button_url'] : '';
$post_lattice_show_button = ! empty( $post_lattice_config['show_hero_button'] ) && $post_lattice_btn_text && $post_lattice_btn_url;

if ( ! $post_lattice_title && ! $post_lattice_subtitle && ! $post_lattice_description && ! $post_lattice_show_button ) {
	return;
}

$post_lattice_heading_id = $post_lattice_uid . '-heading';
?>
<header class="plt-hero">
	<?php if ( $post_lattice_title ) : ?>
		<h2 class="plt-hero__title" id="<?php echo esc_attr( $post_lattice_heading_id ); ?>">
			<?php echo esc_html( $post_lattice_title ); ?>
		</h2>
	<?php endif; ?>

	<?php if ( $post_lattice_subtitle ) : ?>
		<p class="plt-hero__subtitle"><?php echo esc_html( $post_lattice_subtitle ); ?></p>
	<?php endif; ?>

	<?php if ( $post_lattice_description ) : ?>
		<p class="plt-hero__lead"><?php echo esc_html( $post_lattice_description ); ?></p>
	<?php endif; ?>

	<?php if ( $post_lattice_show_button ) : ?>
		<div class="plt-hero__actions">
			<a class="plt-btn plt-btn--primary" href="<?php echo esc_url( $post_lattice_btn_url ); ?>">
				<?php echo esc_html( $post_lattice_btn_text ); ?>
			</a>
		</div>
	<?php endif; ?>
</header>
