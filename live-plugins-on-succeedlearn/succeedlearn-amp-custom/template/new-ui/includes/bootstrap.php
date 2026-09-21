<?php
/**
 * New-UI AMP helpers for Cyber + Infosec + SAP landings.
 *
 * Loaded only by those page templates so legacy AMP pages keep using style.php.
 *
 * @package SucceedLearn_AMP_Custom
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! defined( 'SL_AMP_NEWUI_PATH' ) ) {
	define( 'SL_AMP_NEWUI_PATH', trailingslashit( dirname( __DIR__ ) ) );
}

if ( ! defined( 'SUCCEEDLEARN_AMP_TEMPLATES_DIR' ) ) {
	define( 'SUCCEEDLEARN_AMP_TEMPLATES_DIR', SL_AMP_NEWUI_PATH );
}

if ( ! function_exists( 'succeedlearn_amp_sanitize_scroll_target_id' ) ) {
	/**
	 * @param string $target_id Raw id.
	 * @return string
	 */
	function succeedlearn_amp_sanitize_scroll_target_id( $target_id ) {
		return (string) preg_replace( '/[^a-zA-Z0-9_-]/', '', (string) $target_id );
	}
}

if ( ! function_exists( 'succeedlearn_amp_get_scroll_offset' ) ) {
	/**
	 * @return int
	 */
	function succeedlearn_amp_get_scroll_offset() {
		return (int) apply_filters( 'succeedlearn_amp_scroll_offset', 120 );
	}
}

if ( ! function_exists( 'succeedlearn_amp_scroll_tap_attr' ) ) {
	/**
	 * @param string       $target_id Target element id.
	 * @param int          $duration Scroll duration ms.
	 * @param string|array $prefix_actions Optional prefix actions.
	 * @return string
	 */
	function succeedlearn_amp_scroll_tap_attr( $target_id, $duration = 400, $prefix_actions = array() ) {
		$id = succeedlearn_amp_sanitize_scroll_target_id( $target_id );
		if ( '' === $id ) {
			return '';
		}

		$actions = array();
		foreach ( (array) $prefix_actions as $action ) {
			$action = trim( (string) $action );
			if ( '' !== $action ) {
				$actions[] = $action;
			}
		}
		$actions[] = sprintf(
			"AMP.scrollTo(id='%s', duration=%d, position='top')",
			$id,
			max( 0, (int) $duration )
		);

		return ' on="tap:' . esc_attr( implode( ', ', $actions ) ) . '"';
	}
}

if ( ! function_exists( 'succeedlearn_amp_include_style_partial' ) ) {
	/**
	 * @param string $name Style partial basename.
	 */
	function succeedlearn_amp_include_style_partial( $name ) {
		$base = SL_AMP_NEWUI_PATH . 'styles/' . sanitize_file_name( $name );

		$css_path = $base . '.css';
		if ( is_readable( $css_path ) ) {
			echo file_get_contents( $css_path ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped,WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents
			return;
		}

		$php_path = $base . '.php';
		if ( is_readable( $php_path ) ) {
			include $php_path;
		}
	}
}

if ( ! function_exists( 'succeedlearn_amp_output_page_styles' ) ) {
	/**
	 * Inline new-UI CSS into amp-custom for Cyber/Infosec only.
	 *
	 * @param string   $page_type Page type key.
	 * @param string[] $style_files Extra style partials.
	 * @param string[] $always_inline Always-inline partials.
	 */
	function succeedlearn_amp_output_page_styles( $page_type, $style_files = array(), $always_inline = array() ) {
		unset( $page_type );

		// Lean stack for these two landings (no legacy style.php).
		$files = array_values(
			array_unique(
				array_merge(
					array(
						'global-foundation',
						'global-ui',
						'global-ui-buttons',
						'global-panel-title',
						'global-highlight',
						'scroll-to-top',
						'footer',
					),
					(array) $style_files,
					(array) $always_inline
				)
			)
		);

		foreach ( $files as $file ) {
			succeedlearn_amp_include_style_partial( $file );
		}
	}
}

if ( ! function_exists( 'succeedlearn_amp_output_components' ) ) {
	/**
	 * @param string   $page_type Page type.
	 * @param string[] $additional Extra AMP components.
	 */
	function succeedlearn_amp_output_components( $page_type, $additional = array() ) {
		unset( $page_type );

		$scripts = array(
			'amp-form'      => 'https://cdn.ampproject.org/v0/amp-form-0.1.js',
			'amp-mustache'  => 'https://cdn.ampproject.org/v0/amp-mustache-0.2.js',
			'amp-accordion' => 'https://cdn.ampproject.org/v0/amp-accordion-0.1.js',
			'amp-bind'      => 'https://cdn.ampproject.org/v0/amp-bind-0.1.js',
			'amp-lightbox'  => 'https://cdn.ampproject.org/v0/amp-lightbox-0.1.js',
			'amp-sidebar'   => 'https://cdn.ampproject.org/v0/amp-sidebar-0.1.js',
			'amp-carousel'  => 'https://cdn.ampproject.org/v0/amp-carousel-0.1.js',
			'amp-position-observer' => 'https://cdn.ampproject.org/v0/amp-position-observer-0.1.js',
		);

		$additional = array_values( array_unique( (array) $additional ) );
		foreach ( $additional as $component ) {
			$component = sanitize_key( (string) $component );
			if ( empty( $scripts[ $component ] ) ) {
				continue;
			}
			$attr = ( 'amp-mustache' === $component ) ? 'custom-template' : 'custom-element';
			printf(
				'<script async %1$s="%2$s" src="%3$s"></script>' . "\n",
				esc_attr( $attr ),
				esc_attr( $component ),
				esc_url( $scripts[ $component ] )
			);
		}
	}
}

if ( ! function_exists( 'succeedlearn_amp_upload_url' ) ) {
	/**
	 * @param string $path Path under uploads/.
	 * @return string
	 */
	function succeedlearn_amp_upload_url( $path ) {
		if ( function_exists( 'akaza_upload_url' ) ) {
			return akaza_upload_url( $path );
		}

		$path  = ltrim( (string) $path, '/' );
		$path  = preg_replace( '#^uploads/#', '', $path );
		$local = WP_CONTENT_DIR . '/uploads/' . $path;

		if ( file_exists( $local ) ) {
			return content_url( '/uploads/' . $path );
		}

		return 'https://succeedlearn.com/wp-content/uploads/' . $path;
	}
}

if ( ! function_exists( 'succeedlearn_amp_get_header_branding' ) ) {
	/**
	 * @return array{logo_url:string,logo_alt:string,email:string,cta_url:string,cta_label:string}
	 */
	function succeedlearn_amp_get_header_branding() {
		$logo       = 'https://succeedlearn.com/wp-content/uploads/2025/12/logo.webp';
		$local_logo = WP_CONTENT_DIR . '/uploads/2025/12/logo.webp';
		if ( file_exists( $local_logo ) ) {
			$logo = content_url( '/uploads/2025/12/logo.webp' );
		}

		return array(
			'logo_url'  => $logo,
			'logo_alt'  => 'SucceedLEARN',
			'email'     => 'sales@succeedtech.com',
			'cta_url'   => home_url( '/contact-us/' ),
			'cta_label' => __( 'Request Demo', 'succeedlearn-amp-custom' ),
		);
	}
}

if ( ! function_exists( 'succeedlearn_amp_get_nav_items' ) ) {
	/**
	 * @return array<int, array{label:string,url:string,children?:array}>
	 */
	function succeedlearn_amp_get_nav_items() {
		$items = array(
			array(
				'label'    => __( 'By Solution', 'succeedlearn-amp-custom' ),
				'url'      => home_url( '/solutions/' ),
				'children' => array(
					array( 'label' => __( 'Security Awareness', 'succeedlearn-amp-custom' ), 'url' => home_url( '/security-awareness/' ) ),
					array( 'label' => __( 'HR Compliance Suite', 'succeedlearn-amp-custom' ), 'url' => home_url( '/hr-compliance-suite/' ) ),
					array( 'label' => __( 'Financial Crime Prevention', 'succeedlearn-amp-custom' ), 'url' => home_url( '/financial-crime-prevention/' ) ),
					array( 'label' => __( 'Workplace Health & Safety', 'succeedlearn-amp-custom' ), 'url' => home_url( '/workplace-health-and-safety/' ) ),
					array( 'label' => __( 'Code of Conduct', 'succeedlearn-amp-custom' ), 'url' => home_url( '/code-of-conduct/' ) ),
					array( 'label' => __( 'PE & VC Suite', 'succeedlearn-amp-custom' ), 'url' => home_url( '/private-equity-and-venture-capital-suite/' ) ),
					array( 'label' => __( 'India ESG Awareness', 'succeedlearn-amp-custom' ), 'url' => home_url( '/india-esg-awareness/' ) ),
				),
			),
			array(
				'label' => __( 'By Courses', 'succeedlearn-amp-custom' ),
				'url'   => home_url( '/courses/' ),
			),
			array(
				'label' => __( 'About Us', 'succeedlearn-amp-custom' ),
				'url'   => home_url( '/about-us/' ),
			),
			array(
				'label' => __( 'Contact Us', 'succeedlearn-amp-custom' ),
				'url'   => home_url( '/contact-us/' ),
			),
		);

		return apply_filters( 'succeedlearn_amp_nav_items', $items );
	}
}

if ( ! function_exists( 'succeedlearn_amp_render_nav_sidebar' ) ) {
	/**
	 * Render amp-sidebar nav markup (normal AMP menu used on non-SEO landings).
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
				<button type="button" class="sl-amp-sidebar__close" on="tap:sidebar.close" aria-label="<?php esc_attr_e( 'Close menu', 'succeedlearn-amp-custom' ); ?>">
					<span aria-hidden="true">×</span>
				</button>
			</div>

			<nav class="sl-amp-sidebar__nav" aria-label="<?php esc_attr_e( 'Primary', 'succeedlearn-amp-custom' ); ?>">
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
}

if ( ! function_exists( 'succeedlearn_amp_render_landing_header' ) ) {
	/**
	 * Compact SEO landing header (logo + CTA, no menu).
	 * Use only on US/UK Cyber and Infosec campaign pages.
	 *
	 * @param array $args Header args.
	 */
	function succeedlearn_amp_render_landing_header( $args = array() ) {
		$branding = succeedlearn_amp_get_header_branding();
		$args     = wp_parse_args(
			(array) $args,
			array(
				'cta_label'  => __( 'Contact us', 'succeedlearn-amp-custom' ),
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
}

if ( ! function_exists( 'succeedlearn_amp_render_faq_accordion' ) ) {
	/**
	 * @param array  $items FAQ items.
	 * @param string $extra_class Extra class.
	 */
	function succeedlearn_amp_render_faq_accordion( $items, $extra_class = '' ) {
		if ( empty( $items ) || ! is_array( $items ) ) {
			return;
		}

		$classes = trim( 'sl-amp-faq ' . (string) $extra_class );
		?>
		<div class="<?php echo esc_attr( $classes ); ?>">
			<amp-accordion class="sl-amp-faq__accordion" animate expand-single-section disable-session-states>
				<?php
				$is_first = true;
				foreach ( $items as $index => $item ) :
					$question = isset( $item['question'] ) ? (string) $item['question'] : '';
					$answer   = isset( $item['answer'] ) ? (string) $item['answer'] : '';
					if ( '' === $question || '' === $answer ) {
						continue;
					}
					$num      = str_pad( (string) ( (int) $index + 1 ), 2, '0', STR_PAD_LEFT ) . '.';
					$has_html = false !== strpos( $answer, '<' );
					?>
					<section class="sl-amp-faq__item"<?php echo $is_first ? ' expanded' : ''; ?>>
						<h3 class="sl-amp-faq__summary">
							<span class="sl-amp-faq__num" aria-hidden="true"><?php echo esc_html( $num ); ?></span>
							<span class="sl-amp-faq__q"><?php echo esc_html( $question ); ?></span>
						</h3>
						<div class="sl-amp-faq__panel">
							<?php if ( $has_html ) : ?>
								<div class="sl-amp-faq__answer">
									<?php echo wp_kses_post( $answer ); ?>
								</div>
							<?php else : ?>
								<p><?php echo esc_html( $answer ); ?></p>
							<?php endif; ?>
						</div>
					</section>
					<?php
					$is_first = false;
				endforeach;
				?>
			</amp-accordion>
		</div>
		<?php
	}
}

if ( ! function_exists( 'succeedlearn_amp_url' ) ) {
	/**
	 * @param string $path Absolute or relative URL/path.
	 * @return string
	 */
	function succeedlearn_amp_url( $path = '/' ) {
		$path = (string) $path;
		if ( '' === $path ) {
			$path = '/';
		}
		if ( 0 === strpos( $path, 'http://' ) || 0 === strpos( $path, 'https://' ) ) {
			return $path;
		}
		return home_url( $path );
	}
}

if ( ! function_exists( 'succeedlearn_amp_render_hero_breadcrumbs' ) ) {
	/**
	 * @param string $fallback_label Optional current-page label.
	 */
	function succeedlearn_amp_render_hero_breadcrumbs( $fallback_label = '' ) {
		static $done = false;
		if ( $done || is_front_page() ) {
			return;
		}

		$items = array();
		if ( function_exists( 'akaza_get_breadcrumbs' ) ) {
			$items = akaza_get_breadcrumbs();
		}

		if ( count( $items ) < 2 ) {
			$label = '' !== $fallback_label
				? $fallback_label
				: ( function_exists( 'get_the_title' ) ? get_the_title() : '' );
			if ( '' === $label ) {
				return;
			}
			$items = array(
				array(
					'label' => __( 'Home', 'succeedlearn-amp-custom' ),
					'url'   => home_url( '/' ),
				),
				array(
					'label'   => $label,
					'url'     => '',
					'current' => true,
				),
			);
		}

		foreach ( $items as &$item ) {
			if ( empty( $item['current'] ) && ! empty( $item['url'] ) ) {
				$item['url'] = succeedlearn_amp_url( $item['url'] );
			}
		}
		unset( $item );

		$done    = true;
		$partial = SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'partials/shared/breadcrumbs.php';
		if ( is_readable( $partial ) ) {
			include $partial;
		}
	}
}

if ( ! function_exists( 'succeedlearn_amp_render_fixed_widgets' ) ) {
	/**
	 * Scroll-to-top widget for new-UI AMP pages.
	 */
	function succeedlearn_amp_render_fixed_widgets() {
		static $done = false;
		if ( $done ) {
			return;
		}
		$done = true;
		$path = SL_AMP_NEWUI_PATH . 'components/scroll-to-top.php';
		if ( is_readable( $path ) ) {
			include $path;
		}
	}
}
