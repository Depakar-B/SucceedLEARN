<?php
/**
 * Shared legal page table of contents sidebar.
 *
 * Args:
 * - items (array)  anchor => label
 * - title (string) optional sidebar heading
 * - label (string) optional small label above title
 * - aria  (string) optional nav aria-label
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$items = ( isset( $args['items'] ) && is_array( $args['items'] ) ) ? $args['items'] : array();
$title = isset( $args['title'] ) ? (string) $args['title'] : __( 'Contents', 'akaza-adventure' );
$label = isset( $args['label'] ) ? (string) $args['label'] : __( 'On this page', 'akaza-adventure' );
$aria  = isset( $args['aria'] ) ? (string) $args['aria'] : __( 'Page sections', 'akaza-adventure' );

if ( empty( $items ) ) {
	return;
}

$index = 0;
?>
<nav class="sl-legal-toc" aria-label="<?php echo esc_attr( $aria ); ?>">
	<div class="sl-legal-toc__header">
		<span class="sl-legal-toc__label"><?php echo esc_html( $label ); ?></span>
		<p class="sl-legal-toc__title"><?php echo esc_html( $title ); ?></p>
	</div>
	<ol class="sl-legal-toc__list">
		<?php foreach ( $items as $anchor => $item_label ) : ?>
			<?php
			++$index;
			$num = (string) $index;
			// Prefer leading number from label when present (e.g. "1. Introduction").
			if ( preg_match( '/^(\d+)\.\s*(.+)$/u', (string) $item_label, $matches ) ) {
				$num        = $matches[1];
				$item_label = $matches[2];
			}
			?>
			<li>
				<a href="#<?php echo esc_attr( (string) $anchor ); ?>">
					<span class="sl-legal-toc__num" aria-hidden="true"><?php echo esc_html( $num ); ?></span>
					<span class="sl-legal-toc__text"><?php echo esc_html( (string) $item_label ); ?></span>
				</a>
			</li>
		<?php endforeach; ?>
	</ol>
</nav>
