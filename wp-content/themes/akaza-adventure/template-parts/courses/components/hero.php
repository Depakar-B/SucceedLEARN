<?php
/**
 * Shared course hero.
 *
 * Args:
 * - modifier (string) optional BEM modifier, e.g. defensive-driving
 * - background_image (string) optional image URL
 * - eyebrow (string)
 * - title_main (string)
 * - title_highlight (string)
 * - description (string)
 * - primary_cta (array{text:string,url:string}) legacy single primary button
 * - secondary_cta (array{text:string,url:string}) legacy secondary button
 * - ctas (array<int,array{label?:string,text:string,url:string,style?:string}>) labeled CTA group
 * - meta (array<int,array{icon:string,label:string}>)
 * - card_badge (string)
 * - card_title (string)
 * - card_description (string)
 * - stats (array<int,array{value:string,label:string}>)
 * - features (array<int,string>)
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$modifier          = isset( $args['modifier'] ) ? sanitize_html_class( (string) $args['modifier'] ) : '';
$background_image  = isset( $args['background_image'] ) ? (string) $args['background_image'] : '';
$eyebrow           = isset( $args['eyebrow'] ) ? (string) $args['eyebrow'] : '';
$title_main        = isset( $args['title_main'] ) ? (string) $args['title_main'] : '';
$title_highlight   = isset( $args['title_highlight'] ) ? (string) $args['title_highlight'] : '';
$description       = isset( $args['description'] ) ? (string) $args['description'] : '';
$primary_cta       = ( isset( $args['primary_cta'] ) && is_array( $args['primary_cta'] ) ) ? $args['primary_cta'] : array();
$secondary_cta     = ( isset( $args['secondary_cta'] ) && is_array( $args['secondary_cta'] ) ) ? $args['secondary_cta'] : array();
$ctas              = ( isset( $args['ctas'] ) && is_array( $args['ctas'] ) ) ? $args['ctas'] : array();
$meta              = ( isset( $args['meta'] ) && is_array( $args['meta'] ) ) ? $args['meta'] : array();
$card_badge        = isset( $args['card_badge'] ) ? (string) $args['card_badge'] : '';
$card_title        = isset( $args['card_title'] ) ? (string) $args['card_title'] : '';
$card_description  = isset( $args['card_description'] ) ? (string) $args['card_description'] : '';
$stats             = ( isset( $args['stats'] ) && is_array( $args['stats'] ) ) ? $args['stats'] : array();
$features          = ( isset( $args['features'] ) && is_array( $args['features'] ) ) ? $args['features'] : array();

$hero_class = 'sl-course-hero';
if ( '' !== $modifier ) {
	$hero_class .= ' sl-course-hero--' . $modifier;
}

$primary_text   = isset( $primary_cta['text'] ) ? (string) $primary_cta['text'] : '';
$primary_url    = isset( $primary_cta['url'] ) ? (string) $primary_cta['url'] : '';
$secondary_text = isset( $secondary_cta['text'] ) ? (string) $secondary_cta['text'] : '';
$secondary_url  = isset( $secondary_cta['url'] ) ? (string) $secondary_cta['url'] : '';

if ( empty( $ctas ) ) {
	if ( '' !== $primary_text && '' !== $primary_url ) {
		$ctas[] = array(
			'text'  => $primary_text,
			'url'   => $primary_url,
			'style' => 'primary',
		);
	}
	if ( '' !== $secondary_text && '' !== $secondary_url ) {
		$ctas[] = array(
			'text'  => $secondary_text,
			'url'   => $secondary_url,
			'style' => 'secondary',
		);
	}
}

$style_attr = '';
if ( '' !== $background_image ) {
	$style_attr = '--course-hero-image: url("' . esc_url( $background_image ) . '")';
}

$show_card = ( '' !== $card_badge || '' !== $card_title || '' !== $card_description || ! empty( $stats ) || ! empty( $features ) );
?>
<section class="<?php echo esc_attr( $hero_class ); ?>"<?php echo '' !== $style_attr ? ' style="' . esc_attr( $style_attr ) . '"' : ''; ?>>
	<div class="sl-course-hero__background"></div>
	<div class="sl-course-hero__overlay"></div>

	<div class="sl-course-hero__container">
		<div class="sl-course-hero__content">
			<?php
			if ( function_exists( 'akaza_render_hero_breadcrumbs' ) ) {
				akaza_render_hero_breadcrumbs();
			}
			?>

			<?php if ( '' !== $eyebrow ) : ?>
				<div class="sl-course-hero__eyebrow">
					<span class="sl-course-hero__eyebrow-line"></span>
					<span><?php echo esc_html( $eyebrow ); ?></span>
				</div>
			<?php endif; ?>

			<?php if ( '' !== $title_main || '' !== $title_highlight ) : ?>
				<h1 class="sl-course-hero__title">
					<?php if ( '' !== $title_main ) : ?>
						<span class="sl-course-hero__title-main"><?php echo esc_html( $title_main ); ?></span>
					<?php endif; ?>
					<?php if ( '' !== $title_highlight ) : ?>
						<span class="sl-course-hero__title-highlight"><?php echo ( '' !== $title_main ? ' ' : '' ) . esc_html( $title_highlight ); ?></span>
					<?php endif; ?>
				</h1>
			<?php endif; ?>

			<?php if ( '' !== $description ) : ?>
				<p class="sl-course-hero__description"><?php echo esc_html( $description ); ?></p>
			<?php endif; ?>

			<?php if ( ! empty( $ctas ) ) : ?>
				<div class="sl-course-hero__actions">
					<?php foreach ( $ctas as $cta ) : ?>
						<?php
						if ( ! is_array( $cta ) ) {
							continue;
						}
						$cta_label = isset( $cta['label'] ) ? (string) $cta['label'] : '';
						$cta_text  = isset( $cta['text'] ) ? (string) $cta['text'] : '';
						$cta_url   = isset( $cta['url'] ) ? (string) $cta['url'] : '';
						$cta_style = isset( $cta['style'] ) ? (string) $cta['style'] : 'primary';
						if ( '' === $cta_text || '' === $cta_url ) {
							continue;
						}
						$cta_class = ( 'secondary' === $cta_style )
							? 'sl-course-hero__secondary-link'
							: 'sl-course-button sl-course-button--primary';
						?>
						<div class="sl-course-hero__cta-item">
							<?php if ( '' !== $cta_label ) : ?>
								<span class="sl-course-hero__cta-label"><?php echo esc_html( $cta_label ); ?></span>
							<?php endif; ?>
							<a href="<?php echo esc_url( $cta_url ); ?>" class="<?php echo esc_attr( $cta_class ); ?>">
								<span><?php echo esc_html( $cta_text ); ?></span>
								<?php if ( 'secondary' !== $cta_style ) : ?>
									<span class="sl-course-button__arrow" aria-hidden="true">→</span>
								<?php endif; ?>
							</a>
						</div>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>

			<?php if ( ! empty( $meta ) ) : ?>
				<div class="sl-course-hero__meta">
					<?php foreach ( $meta as $item ) : ?>
						<?php
						$icon  = isset( $item['icon'] ) ? (string) $item['icon'] : '';
						$label = isset( $item['label'] ) ? (string) $item['label'] : '';
						if ( '' === $label ) {
							continue;
						}
						?>
						<div class="sl-course-hero__meta-item">
							<?php if ( '' !== $icon ) : ?>
								<span class="sl-course-hero__meta-icon" aria-hidden="true"><?php echo esc_html( $icon ); ?></span>
							<?php endif; ?>
							<span><?php echo esc_html( $label ); ?></span>
						</div>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
		</div>

		<?php if ( $show_card ) : ?>
			<div class="sl-course-hero__card-wrapper">
				<div class="sl-course-hero__card">
					<div class="sl-course-hero__card-header">
						<?php if ( '' !== $card_badge ) : ?>
							<span class="sl-course-hero__badge"><?php echo esc_html( $card_badge ); ?></span>
						<?php endif; ?>

						<?php if ( '' !== $card_title ) : ?>
							<h3 class="sl-course-hero__card-title"><?php echo esc_html( $card_title ); ?></h3>
						<?php endif; ?>

						<?php if ( '' !== $card_description ) : ?>
							<p class="sl-course-hero__card-description"><?php echo esc_html( $card_description ); ?></p>
						<?php endif; ?>
					</div>

					<?php if ( ! empty( $stats ) ) : ?>
						<div class="sl-course-hero__stats">
							<?php foreach ( $stats as $stat ) : ?>
								<?php
								$value = isset( $stat['value'] ) ? (string) $stat['value'] : '';
								$label = isset( $stat['label'] ) ? (string) $stat['label'] : '';
								if ( '' === $value && '' === $label ) {
									continue;
								}
								?>
								<div class="sl-course-hero__stat">
									<?php if ( '' !== $value ) : ?>
										<strong><?php echo esc_html( $value ); ?></strong>
									<?php endif; ?>
									<?php if ( '' !== $label ) : ?>
										<span><?php echo esc_html( $label ); ?></span>
									<?php endif; ?>
								</div>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>

					<?php if ( ! empty( $features ) ) : ?>
						<div class="sl-course-hero__features">
							<?php foreach ( $features as $feature ) : ?>
								<?php
								$feature = (string) $feature;
								if ( '' === $feature ) {
									continue;
								}
								?>
								<span>
									<b aria-hidden="true">✓</b>
									<?php echo esc_html( $feature ); ?>
								</span>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		<?php endif; ?>
	</div>
</section>
