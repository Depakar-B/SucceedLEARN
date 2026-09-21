<?php
/**
 * Breadcrumb navigation.
 *
 * @package Akaza_Adventure
 *
 * @var array $args {
 *   @type array $items  Breadcrumb items from akaza_get_breadcrumbs().
 *   @type bool  $inline Inside page hero (no full-width bar).
 * }
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$items  = isset( $args['items'] ) ? $args['items'] : array();
$inline = ! empty( $args['inline'] );

if ( empty( $items ) || count( $items ) < 2 ) {
	return;
}

$nav_class = $inline ? 'slf-breadcrumbs slf-breadcrumbs--inline' : 'slf-breadcrumbs';
?>
<nav class="<?php echo esc_attr( $nav_class ); ?>" aria-label="<?php esc_attr_e( 'Breadcrumb', 'akaza-adventure' ); ?>">
	<?php if ( ! $inline ) : ?>
	<div class="slf-container slf-breadcrumbs__container">
	<?php endif; ?>
		<ol class="slf-breadcrumbs__list" itemscope itemtype="https://schema.org/BreadcrumbList">
			<?php foreach ( $items as $index => $item ) : ?>
				<?php
				$is_current = ! empty( $item['current'] );
				$label      = isset( $item['label'] ) ? $item['label'] : '';
				$url        = isset( $item['url'] ) ? $item['url'] : '';
				$position   = $index + 1;
				?>
				<li class="slf-breadcrumbs__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
					<?php if ( ! $is_current && $url ) : ?>
						<a class="slf-breadcrumbs__link" href="<?php echo esc_url( $url ); ?>" itemprop="item">
							<span itemprop="name"><?php echo esc_html( $label ); ?></span>
						</a>
					<?php else : ?>
						<span class="slf-breadcrumbs__current" aria-current="page" itemprop="name">
							<?php echo esc_html( $label ); ?>
						</span>
					<?php endif; ?>
					<meta itemprop="position" content="<?php echo esc_attr( (string) $position ); ?>">
				</li>
			<?php endforeach; ?>
		</ol>
	<?php if ( ! $inline ) : ?>
	</div>
	<?php endif; ?>
</nav>
