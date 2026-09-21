<?php
/**
 * Newsletter archive — year filter pills.
 *
 * @package Akaza_Adventure
 *
 * @var array $args {
 *   @type string[] $years Year strings.
 * }
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$years = isset( $args['years'] ) ? $args['years'] : array();
?>
<nav class="slf-blog-pills" aria-label="<?php esc_attr_e( 'Filter by year', 'akaza-adventure' ); ?>">
	<div class="slf-blog-pills__scroll">
		<button type="button" class="slf-blog-pill is-active" data-year="all">
			<?php esc_html_e( 'All years', 'akaza-adventure' ); ?>
		</button>
		<?php foreach ( $years as $year ) : ?>
			<button type="button"
				class="slf-blog-pill"
				data-year="<?php echo esc_attr( (string) $year ); ?>">
				<?php echo esc_html( (string) $year ); ?>
			</button>
		<?php endforeach; ?>
	</div>
</nav>
