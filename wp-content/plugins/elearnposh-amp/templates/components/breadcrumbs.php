<?php
/**
 * Breadcrumb navigation component (AMP) — inline CMS style.
 *
 * @package ElearnPOSH\AMP
 *
 * @var array<int, array{label:string,url?:string}> $items Breadcrumb items.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( empty( $items ) || ! is_array( $items ) ) {
	return;
}
?>
<nav class="ep-breadcrumbs" aria-label="<?php esc_attr_e( 'Breadcrumb', 'elearnposh-amp' ); ?>" itemscope itemtype="https://schema.org/BreadcrumbList">
	<?php foreach ( $items as $index => $item ) : ?>
		<?php
		$is_last = ( $index === count( $items ) - 1 );
		$label   = isset( $item['label'] ) ? (string) $item['label'] : '';
		$url     = isset( $item['url'] ) ? (string) $item['url'] : '';
		?>
		<?php if ( $index > 0 ) : ?>
			<span class="ep-breadcrumbs__sep" aria-hidden="true"> &gt; </span>
		<?php endif; ?>
		<span itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
			<?php if ( ! $is_last && $url ) : ?>
				<a class="ep-breadcrumbs__link" href="<?php echo esc_url( $url ); ?>" itemprop="item">
					<span itemprop="name"><?php echo esc_html( $label ); ?></span>
				</a>
			<?php else : ?>
				<span class="ep-breadcrumbs__current" aria-current="page" itemprop="name"><?php echo esc_html( $label ); ?></span>
			<?php endif; ?>
			<meta itemprop="position" content="<?php echo esc_attr( (string) ( $index + 1 ) ); ?>">
		</span>
	<?php endforeach; ?>
</nav>
