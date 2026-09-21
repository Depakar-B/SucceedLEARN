<?php
/**
 * Image grid helper functions.
 *
 * @package ElearnPOSH\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * AMP image lightbox element ID.
 *
 * @return string
 */
function elearnposh_amp_image_lightbox_id() {
	return 'ep-image-lightbox';
}

/**
 * AMP attributes that open the shared image lightbox.
 *
 * @return string
 */
function elearnposh_amp_image_lightbox_attrs() {
	return 'on="tap:' . elearnposh_amp_image_lightbox_id() . '" role="button" tabindex="0"';
}

/**
 * Render a single image card for grid sections.
 *
 * @param array $image Image data with src, width, height, and alt keys.
 */
function elearnposh_amp_render_image_card( array $image ) {
	$src = isset( $image['src'] ) ? esc_url( $image['src'] ) : '';

	if ( empty( $src ) ) {
		return;
	}

	$width  = isset( $image['width'] ) ? absint( $image['width'] ) : 1280;
	$height = isset( $image['height'] ) ? absint( $image['height'] ) : 880;
	$alt    = isset( $image['alt'] ) ? esc_attr( $image['alt'] ) : '';

	$figure_class = 'pfe-image-card';
	if ( ! empty( $image['plain'] ) ) {
		$figure_class = 'pfe-cms-plain-image';
	} elseif ( ! empty( $image['hero'] ) ) {
		$figure_class = 'pfe-image-card pfe-image-card--hero';
	}

	$lightbox_attrs = ! empty( $image['lightbox'] ) ? elearnposh_amp_image_lightbox_attrs() : '';
	if ( $lightbox_attrs ) {
		$figure_class .= ' pfe-image-card--expandable';
	}
	?>
	<figure class="<?php echo esc_attr( $figure_class ); ?>">
		<amp-img
			src="<?php echo $src; ?>"
			width="<?php echo esc_attr( (string) $width ); ?>"
			height="<?php echo esc_attr( (string) $height ); ?>"
			layout="responsive"
			alt="<?php echo $alt; ?>"
		></amp-img>
		<?php if ( $lightbox_attrs ) : ?>
		<div class="pfe-image-expand-btn">
			<amp-img
				src="<?php echo $src; ?>"
				width="36"
				height="36"
				layout="fixed"
				alt="<?php echo esc_attr( $alt ? sprintf( 'View full size: %s', $alt ) : 'View full size image' ); ?>"
				<?php echo $lightbox_attrs; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
			></amp-img>
			<span class="pfe-image-expand" aria-hidden="true">
				<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M8 3H5a2 2 0 0 0-2 2v3"/><path d="M21 8V5a2 2 0 0 0-2-2h-3"/><path d="M3 16v3a2 2 0 0 0 2 2h3"/><path d="M16 21h3a2 2 0 0 0 2-2v-3"/></svg>
			</span>
		</div>
		<?php endif; ?>
	</figure>
	<?php
}

/**
 * Output shared .pfe course page base styles.
 */
function elearnposh_amp_output_course_pfe_base_styles() {
	include ELEARNPOSH_AMP_TEMPLATES_DIR . 'partials/course-pfe-base-styles.php';
}

/**
 * Collect course screenshot images from post meta.
 *
 * @param int    $post_id      Post ID.
 * @param string $alt_prefix   Alt text prefix.
 * @return array<int, array{src:string,width:int,height:int,alt:string}>
 */
function elearnposh_amp_get_course_screenshot_images( $post_id, $alt_prefix = 'Course screenshot' ) {
	$post_id = absint( $post_id );
	$images  = array();
	$seen    = array();

	if ( ! $post_id ) {
		return $images;
	}

	for ( $i = 1; $i <= 10; $i++ ) {
		$attachment_id = get_post_meta( $post_id, 'course_screenshot_choose_image_' . $i, true );
		if ( ! $attachment_id ) {
			continue;
		}

		$url = wp_get_attachment_url( $attachment_id );
		if ( ! $url || isset( $seen[ $url ] ) ) {
			continue;
		}

		$seen[ $url ] = true;
		$images[]     = array(
			'src'    => $url,
			'width'  => 1280,
			'height' => 800,
			'alt'    => sprintf( '%s %d', $alt_prefix, count( $images ) + 1 ),
		);
	}

	return $images;
}

/**
 * Build image card data from URL strings.
 *
 * @param array<int, string> $urls        Image URLs.
 * @param string             $alt_prefix  Alt text prefix.
 * @return array<int, array{src:string,width:int,height:int,alt:string}>
 */
function elearnposh_amp_urls_to_image_cards( array $urls, $alt_prefix = 'Course screenshot' ) {
	$images = array();

	foreach ( $urls as $url ) {
		$url = esc_url( $url );
		if ( empty( $url ) ) {
			continue;
		}

		$images[] = array(
			'src'    => $url,
			'width'  => 1280,
			'height' => 800,
			'alt'    => sprintf( '%s %d', $alt_prefix, count( $images ) + 1 ),
		);
	}

	return $images;
}

/**
 * Convert slide arrays into AMP image card data.
 *
 * @param array<int, array{src:string,alt?:string,width?:int,height?:int}> $slides Slide data.
 * @return array<int, array{src:string,width:int,height:int,alt:string}>
 */
function elearnposh_amp_slides_to_image_cards( array $slides ) {
	$images = array();

	foreach ( $slides as $slide ) {
		$src = isset( $slide['src'] ) ? esc_url( $slide['src'] ) : '';
		if ( empty( $src ) ) {
			continue;
		}

		$images[] = array(
			'src'    => $src,
			'width'  => isset( $slide['width'] ) ? absint( $slide['width'] ) : 1280,
			'height' => isset( $slide['height'] ) ? absint( $slide['height'] ) : 880,
			'alt'    => isset( $slide['alt'] ) ? (string) $slide['alt'] : '',
		);
	}

	return $images;
}

/**
 * Render a responsive hero image grid (replaces carousel on AMP).
 *
 * @param array  $images      Image card data.
 * @param string $aria_label  Accessible label.
 * @param string $modifier    Gallery modifier: '' for standard, 'hero' for hero section.
 */
function elearnposh_amp_render_image_gallery( array $images, $aria_label = '', $modifier = '' ) {
	if ( empty( $images ) ) {
		return;
	}

	$class = 'hero' === $modifier ? 'pfe-hero-gallery' : 'pfe-why-gallery';
	?>
	<div class="<?php echo esc_attr( $class ); ?>"<?php echo $aria_label ? ' aria-label="' . esc_attr( $aria_label ) . '"' : ''; ?>>
		<?php foreach ( $images as $image ) : ?>
			<?php elearnposh_amp_render_image_card( $image ); ?>
		<?php endforeach; ?>
	</div>
	<?php
}

/**
 * Render a hero image carousel (desktop .pfe-carousel parity).
 *
 * @param array  $images      Image card data.
 * @param string $aria_label  Accessible label.
 * @param int    $delay_ms    Autoplay delay in milliseconds.
 */
function elearnposh_amp_render_image_carousel( array $images, $aria_label = '', $delay_ms = 5000 ) {
	if ( empty( $images ) ) {
		return;
	}

	$delay_ms = max( 1000, absint( $delay_ms ) );
	?>
	<div class="pfe-carousel"<?php echo $aria_label ? ' aria-label="' . esc_attr( $aria_label ) . '"' : ''; ?>>
		<amp-carousel
			class="pfe-carousel__track"
			width="800"
			height="500"
			layout="responsive"
			type="slides"
			delay="<?php echo esc_attr( (string) $delay_ms ); ?>"
			autoplay
			loop
			role="region">
			<?php foreach ( $images as $image ) : ?>
				<?php
				$src = isset( $image['src'] ) ? esc_url( $image['src'] ) : '';
				if ( empty( $src ) ) {
					continue;
				}
				$width  = isset( $image['width'] ) ? absint( $image['width'] ) : 800;
				$height = isset( $image['height'] ) ? absint( $image['height'] ) : 500;
				$alt    = isset( $image['alt'] ) ? esc_attr( $image['alt'] ) : '';
				?>
				<div class="pfe-carousel__slide">
					<amp-img
						src="<?php echo $src; ?>"
						width="<?php echo esc_attr( (string) $width ); ?>"
						height="<?php echo esc_attr( (string) $height ); ?>"
						layout="responsive"
						alt="<?php echo $alt; ?>">
					</amp-img>
				</div>
			<?php endforeach; ?>
		</amp-carousel>
	</div>
	<?php
}

/**
 * Output the shared AMP image lightbox shell once per page.
 */
function elearnposh_amp_render_image_lightbox_shell() {
	static $rendered = false;

	if ( $rendered ) {
		return;
	}

	$rendered = true;
	include ELEARNPOSH_AMP_TEMPLATES_DIR . 'components/amp-image-lightbox.php';
}
