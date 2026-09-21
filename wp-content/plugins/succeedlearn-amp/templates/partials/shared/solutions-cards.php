<?php
/**
 * Shared AMP — Solutions / products card grid.
 *
 * Optional vars: $title, $description, $cta_href, $solutions
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'data/solutions-cards.php';

$overrides = array();
if ( isset( $title ) ) {
	$overrides['title'] = (string) $title;
}
if ( isset( $description ) ) {
	$overrides['description'] = (string) $description;
}
if ( isset( $cta_href ) ) {
	$overrides['cta_href'] = (string) $cta_href;
}
if ( isset( $solutions ) && is_array( $solutions ) ) {
	$overrides['solutions'] = $solutions;
}

$ctx         = succeedlearn_amp_prepare_solutions_cards_context( $overrides );
$title       = (string) $ctx['title'];
$description = (string) $ctx['description'];
$cta_href    = (string) $ctx['cta_href'];
$solutions   = is_array( $ctx['solutions'] ) ? $ctx['solutions'] : array();

if ( empty( $solutions ) ) {
	return;
}

$is_inpage_cta = ( '' !== $cta_href && '#' === $cta_href[0] );
$scroll_id     = $is_inpage_cta ? ltrim( $cta_href, '#' ) : '';
?>
<section class="sl-solutions-cards" id="solutions" aria-labelledby="sl-solutions-cards-heading">
	<div class="sl-wrap sl-solutions-cards__container">
		<?php if ( '' !== $title ) : ?>
			<header class="sl-solutions-cards__header">
				<span class="sl-eyebrow"><?php esc_html_e( 'Solutions', 'succeedlearn-amp' ); ?></span>
				<h2 id="sl-solutions-cards-heading" class="sl-h2"><?php echo esc_html( $title ); ?></h2>
				<?php if ( '' !== $description ) : ?>
					<p class="sl-lead"><?php echo esc_html( $description ); ?></p>
				<?php endif; ?>
			</header>
		<?php endif; ?>

		<div class="sl-solutions-cards__grid">
			<?php foreach ( $solutions as $item ) : ?>
				<article class="sl-solutions-cards__card">
					<div class="sl-solutions-cards__icon" aria-hidden="true">
						<amp-img
							src="<?php echo esc_url( $item['icon'] ); ?>"
							width="36"
							height="36"
							layout="fixed"
							alt=""
						></amp-img>
					</div>
					<div class="sl-solutions-cards__body">
						<h3><?php echo esc_html( $item['title'] ); ?></h3>
						<p><?php echo esc_html( $item['body'] ); ?></p>
						<?php if ( $is_inpage_cta && '' !== $scroll_id ) : ?>
							<button
								type="button"
								class="sl-solutions-cards__link"
								<?php echo succeedlearn_amp_scroll_tap_attr( $scroll_id ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
							>
								<?php echo esc_html( $item['cta'] ); ?>
							</button>
						<?php else : ?>
							<a class="sl-solutions-cards__link" href="<?php echo esc_url( $cta_href ); ?>">
								<?php echo esc_html( $item['cta'] ); ?>
							</a>
						<?php endif; ?>
					</div>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
