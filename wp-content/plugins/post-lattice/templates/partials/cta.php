<?php
/**
 * Bottom call-to-action bar.
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

$post_lattice_uid      = isset( $post_lattice_args['uid'] ) ? $post_lattice_args['uid'] : 'plt';
$post_lattice_config   = isset( $post_lattice_args['config'] ) ? $post_lattice_args['config'] : array();
$post_lattice_title    = isset( $post_lattice_config['cta_title'] ) ? $post_lattice_config['cta_title'] : '';
$post_lattice_lead     = isset( $post_lattice_config['cta_description'] ) ? $post_lattice_config['cta_description'] : '';
$post_lattice_btn_text = isset( $post_lattice_config['cta_button_text'] ) ? $post_lattice_config['cta_button_text'] : '';
$post_lattice_btn_url  = isset( $post_lattice_config['cta_button_url'] ) ? $post_lattice_config['cta_button_url'] : '';

if ( ! $post_lattice_title && ! $post_lattice_lead && ( ! $post_lattice_btn_text || ! $post_lattice_btn_url ) ) {
	return;
}

$post_lattice_heading_id = $post_lattice_uid . '-cta';
?>
<section class="plt-cta"<?php echo $post_lattice_title ? ' aria-labelledby="' . esc_attr( $post_lattice_heading_id ) . '"' : ''; ?>>
	<div class="plt-cta__inner">
		<div class="plt-cta__content">
			<?php if ( $post_lattice_title ) : ?>
				<h3 id="<?php echo esc_attr( $post_lattice_heading_id ); ?>" class="plt-cta__title">
					<?php echo esc_html( $post_lattice_title ); ?>
				</h3>
			<?php endif; ?>
			<?php if ( $post_lattice_lead ) : ?>
				<p class="plt-cta__lead"><?php echo esc_html( $post_lattice_lead ); ?></p>
			<?php endif; ?>
		</div>
		<?php if ( $post_lattice_btn_text && $post_lattice_btn_url ) : ?>
			<a class="plt-btn plt-btn--primary" href="<?php echo esc_url( $post_lattice_btn_url ); ?>">
				<?php echo esc_html( $post_lattice_btn_text ); ?>
			</a>
		<?php endif; ?>
	</div>
</section>
