<?php
/**
 * AMP navigation / branding helpers.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * @return array{logo_url:string,logo_alt:string,email:string,cta_url:string,cta_label:string}
 */
function succeedlearn_amp_get_header_branding() {
	// Prefer the company-colour logo used in the main site header.
	$logo       = 'https://succeedlearn.com/wp-content/uploads/2025/12/logo.webp';
	$local_logo = WP_CONTENT_DIR . '/uploads/2025/12/logo.webp';
	if ( file_exists( $local_logo ) ) {
		$logo = content_url( '/uploads/2025/12/logo.webp' );
	} else {
		$fallback = WP_CONTENT_DIR . '/uploads/2025/11/logo.webp';
		if ( file_exists( $fallback ) ) {
			$logo = content_url( '/uploads/2025/11/logo.webp' );
		}
	}

	return apply_filters(
		'succeedlearn_amp_header_branding',
		array(
			'logo_url'  => $logo,
			'logo_alt'  => 'SucceedLEARN',
			'email'     => 'sales@succeedtech.com',
			'cta_url'   => home_url( '/contact-us/' ),
			'cta_label' => __( 'Request Demo', 'succeedlearn-amp' ),
		)
	);
}

/**
 * @return array<int, array{label:string,url:string,children?:array}>
 */
function succeedlearn_amp_get_nav_items() {
	$items = array(
		array(
			'label'    => __( 'By Solution', 'succeedlearn-amp' ),
			'url'      => home_url( '/solutions/' ),
			'children' => array(
				array( 'label' => __( 'Security Awareness', 'succeedlearn-amp' ), 'url' => home_url( '/security-awareness/' ) ),
				array( 'label' => __( 'HR Compliance Suite', 'succeedlearn-amp' ), 'url' => home_url( '/hr-compliance-suite/' ) ),
				array( 'label' => __( 'Financial Crime Prevention', 'succeedlearn-amp' ), 'url' => home_url( '/financial-crime-prevention/' ) ),
				array( 'label' => __( 'Workplace Health & Safety', 'succeedlearn-amp' ), 'url' => home_url( '/workplace-health-and-safety/' ) ),
				array( 'label' => __( 'Code of Conduct', 'succeedlearn-amp' ), 'url' => home_url( '/code-of-conduct/' ) ),
				array( 'label' => __( 'PE & VC Suite', 'succeedlearn-amp' ), 'url' => home_url( '/private-equity-and-venture-capital-suite/' ) ),
				array( 'label' => __( 'India ESG Awareness', 'succeedlearn-amp' ), 'url' => home_url( '/india-esg-awareness/' ) ),
			),
		),
		array(
			'label' => __( 'By Courses', 'succeedlearn-amp' ),
			'url'   => home_url( '/courses/' ),
		),
		array(
			'label' => __( 'About Us', 'succeedlearn-amp' ),
			'url'   => home_url( '/about-us/' ),
		),
		array(
			'label' => __( 'Contact Us', 'succeedlearn-amp' ),
			'url'   => home_url( '/contact-us/' ),
		),
	);

	return apply_filters( 'succeedlearn_amp_nav_items', $items );
}

/**
 * Render amp-sidebar nav markup.
 */
function succeedlearn_amp_render_nav_sidebar() {
	$items    = succeedlearn_amp_get_nav_items();
	$branding = succeedlearn_amp_get_header_branding();
	?>
	<amp-sidebar id="sidebar" layout="nodisplay" side="right" class="sl-amp-sidebar">
		<div class="sl-amp-sidebar__top">
			<a class="sl-amp-sidebar__brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" on="tap:sidebar.close">
				<amp-img
					src="<?php echo esc_url( $branding['logo_url'] ); ?>"
					width="130"
					height="44"
					layout="fixed"
					alt="<?php echo esc_attr( $branding['logo_alt'] ); ?>"
				></amp-img>
			</a>
			<button type="button" class="sl-amp-sidebar__close" on="tap:sidebar.close" aria-label="<?php esc_attr_e( 'Close menu', 'succeedlearn-amp' ); ?>">
				<span aria-hidden="true">×</span>
			</button>
		</div>

		<nav class="sl-amp-sidebar__nav" aria-label="<?php esc_attr_e( 'Primary', 'succeedlearn-amp' ); ?>">
			<ul class="sl-amp-sidebar__list">
				<?php foreach ( $items as $item ) : ?>
					<?php if ( ! empty( $item['children'] ) ) : ?>
						<li class="sl-amp-sidebar__item sl-amp-sidebar__item--parent">
							<amp-accordion class="sl-amp-sidebar__accordion" animate>
								<section>
									<h4 class="sl-amp-sidebar__parent-title">
										<span class="sl-amp-sidebar__parent-label"><?php echo esc_html( $item['label'] ); ?></span>
										<span class="sl-amp-sidebar__chevron" aria-hidden="true">
											<span class="sl-amp-sidebar__chevron-right">›</span>
											<span class="sl-amp-sidebar__chevron-down">›</span>
										</span>
									</h4>
									<div class="sl-amp-sidebar__children">
										<?php foreach ( $item['children'] as $child ) : ?>
											<a class="sl-amp-sidebar__link sl-amp-sidebar__link--child" href="<?php echo esc_url( $child['url'] ); ?>" on="tap:sidebar.close">
												<?php echo esc_html( $child['label'] ); ?>
											</a>
										<?php endforeach; ?>
									</div>
								</section>
							</amp-accordion>
						</li>
					<?php else : ?>
						<li class="sl-amp-sidebar__item">
							<a class="sl-amp-sidebar__link sl-amp-sidebar__link--top" href="<?php echo esc_url( $item['url'] ); ?>" on="tap:sidebar.close">
								<?php echo esc_html( $item['label'] ); ?>
							</a>
						</li>
					<?php endif; ?>
				<?php endforeach; ?>
			</ul>
		</nav>

		<div class="sl-amp-sidebar__footer">
			<a class="sl-amp-btn" href="<?php echo esc_url( $branding['cta_url'] ); ?>" on="tap:sidebar.close">
				<?php echo esc_html( $branding['cta_label'] ); ?>
			</a>
			<a class="sl-amp-sidebar__email" href="mailto:<?php echo esc_attr( $branding['email'] ); ?>">
				<?php echo esc_html( $branding['email'] ); ?>
			</a>
		</div>
	</amp-sidebar>
	<?php
}

/**
 * Render a compact landing-page AMP header (logo + CTA, no menu).
 *
 * @param array $args {
 *     @type string $cta_label Plain CTA label (used if cta_html empty).
 *     @type string $cta_html   Optional HTML label (kses limited).
 *     @type string $cta_scroll Target id for succeedlearn_amp_scroll_tap_attr().
 *     @type string $cta_class  Extra button classes.
 *     @type bool   $show_cta   Whether to render the header CTA button.
 */
function succeedlearn_amp_render_landing_header( $args = array() ) {
	$branding = succeedlearn_amp_get_header_branding();
	$args     = wp_parse_args(
		(array) $args,
		array(
			'cta_label'  => __( 'Contact us', 'succeedlearn-amp' ),
			'cta_html'   => '',
			'cta_scroll' => 'contact',
			'cta_class'  => '',
			'show_cta'   => true,
		)
	);

	$show_cta  = ! empty( $args['show_cta'] );
	$cta_class = trim( 'sl-btn sl-btn--primary sl-amp-landing-header__cta ' . (string) $args['cta_class'] );
	?>
	<div id="sl-page-top"></div>
	<header class="sl-amp-landing-header" role="banner">
		<div class="sl-amp-landing-header__inner">
			<span class="sl-amp-landing-header__logo">
				<amp-img
					src="<?php echo esc_url( $branding['logo_url'] ); ?>"
					width="140"
					height="40"
					layout="fixed"
					alt="<?php echo esc_attr( $branding['logo_alt'] ); ?>"
				></amp-img>
			</span>

			<?php if ( $show_cta ) : ?>
			<button
				type="button"
				class="<?php echo esc_attr( $cta_class ); ?>"
				data-cta="landing-header"
				<?php echo succeedlearn_amp_scroll_tap_attr( (string) $args['cta_scroll'] ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
			>
				<?php
				if ( '' !== trim( (string) $args['cta_html'] ) ) {
					echo wp_kses(
						(string) $args['cta_html'],
						array(
							'span' => array(
								'class' => array(),
							),
						)
					);
				} else {
					echo esc_html( (string) $args['cta_label'] );
				}
				?>
				<svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
					<path d="M5 12h13M13 6l6 6-6 6" />
				</svg>
			</button>
			<?php endif; ?>
		</div>
	</header>
	<?php
}

