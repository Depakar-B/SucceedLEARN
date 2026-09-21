<?php
/**
 * Top bar notification markup.
 *
 * @package Akaza_Header_Footer
 *
 * @var array  $bar       Top bar settings.
 * @var string $placement desktop|mobile.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$is_desktop = ( 'desktop' === $placement );
$class      = $is_desktop ? 'epsh-top-bar epsh-top-bar--header' : 'epsh-top-bar epsh-top-bar--mobile';

$buttons = array();

if ( 'yes' === $bar['show_button'] && ! empty( $bar['btn_text'] ) && ! empty( $bar['btn_url'] ) ) {
	$buttons[] = array(
		'text'     => $bar['btn_text'],
		'url'      => $bar['btn_url'],
		'behavior' => $bar['btn_behavior'],
	);
}

if ( 'yes' === $bar['show_button_2'] && ! empty( $bar['btn2_text'] ) && ! empty( $bar['btn2_url'] ) ) {
	$buttons[] = array(
		'text'     => $bar['btn2_text'],
		'url'      => $bar['btn2_url'],
		'behavior' => $bar['btn2_behavior'],
	);
}

$inline_style = '';
if ( $is_desktop ) {
	$inline_style = sprintf(
		'width:100%%;max-width:100%%;display:block;box-sizing:border-box;flex:0 0 100%%;order:2;margin:0;background:%s;color:#fff;',
		esc_attr( $bar['color'] )
	);
}
?>
<div class="<?php echo esc_attr( $class ); ?>"<?php echo $inline_style ? ' style="' . esc_attr( $inline_style ) . '"' : ''; ?> role="region" aria-label="<?php esc_attr_e( 'Site notification', 'akaza-header-footer' ); ?>">
	<div class="epsh-top-bar__inner">
		<p class="epsh-top-bar__message"><?php echo esc_html( $bar['message'] ); ?></p>
		<?php if ( ! empty( $buttons ) ) : ?>
			<div class="epsh-top-bar__actions">
				<?php foreach ( $buttons as $button ) : ?>
					<?php
					$target = ( 'newwindow' === $button['behavior'] ) ? ' target="_blank" rel="noopener noreferrer"' : '';
					?>
					<a class="epsh-top-bar__cta" href="<?php echo esc_url( $button['url'] ); ?>"<?php echo $target; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
						<?php echo esc_html( $button['text'] ); ?>
					</a>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
	</div>
</div>
