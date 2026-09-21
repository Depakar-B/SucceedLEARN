<?php
/**
 * Custom desktop navigation with mega menu panels.
 *
 * @package Akaza_Header_Footer
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Renders server-side desktop nav (SEO-friendly anchor links).
 */
class AHF_Custom_Nav {

	/**
	 * Register hooks.
	 */
	public static function init() {
		add_action( 'wp_enqueue_scripts', array( __CLASS__, 'enqueue' ), 25 );
		add_action( 'wp_head', array( __CLASS__, 'menu_link_polish_css' ), 999 );
		add_filter( 'body_class', array( __CLASS__, 'body_class' ) );
		add_action( 'after_setup_theme', array( __CLASS__, 'disable_legacy_nav' ), 100 );
	}

	/**
	 * @param string[] $classes Body classes.
	 * @return string[]
	 */
	public static function body_class( $classes ) {
		if ( self::should_load() ) {
			$classes[] = 'epsh-custom-desktop-nav';
		}
		return $classes;
	}

	/**
	 * Remove legacy theme desktop menu injector when present.
	 */
	public static function disable_legacy_nav() {
		if ( function_exists( 'ep_header_desktop_menu_extras' ) ) {
			remove_filter( 'wp_nav_menu_items', 'ep_header_desktop_menu_extras', 10 );
		}
	}

	/**
	 * Whether custom desktop nav should load.
	 */
	public static function should_load() {
		return AHF_Config::feature_enabled( 'custom_desktop_menu' )
			&& ! AHF_AMP::is_amp()
			&& ! is_admin();
	}

	/**
	 * Enqueue desktop nav assets.
	 */
	public static function enqueue() {
		if ( ! self::should_load() ) {
			return;
		}

		$config      = AHF_Config::get();
		$desktop_min = (int) $config['breakpoint'] + 1;

		wp_enqueue_style(
			'epsh-desktop-nav',
			AHF_PLUGIN_URL . 'assets/css/desktop-nav.css',
			array(),
			AHF_VERSION
		);

		wp_add_inline_style(
			'epsh-desktop-nav',
			sprintf(
				'@media (max-width: %1$dpx) { .epsh-desktop-nav-wrap { display: none !important; } }',
				(int) $config['breakpoint']
			) . self::menu_link_polish_rules()
		);

		wp_enqueue_script(
			'epsh-desktop-nav',
			AHF_PLUGIN_URL . 'assets/js/desktop-nav.js',
			array(),
			AHF_VERSION,
			true
		);

		wp_localize_script(
			'epsh-desktop-nav',
			'ahfDesktopNav',
			array(
				'desktopMin' => $desktop_min,
			)
		);

		if ( class_exists( 'AHF_Mega_Menu_Data' ) ) {
			wp_localize_script(
				'epsh-desktop-nav',
				'ahfMegaMenu',
				array(
					'categories' => AHF_Mega_Menu_Data::get_mega_menu_tree(),
					'i18n'       => array(
						'viewCourse'   => __( 'View course', 'akaza-header-footer' ),
						'noCourses'    => __( 'No courses in this category yet.', 'akaza-header-footer' ),
						'noCategories' => __( 'No solution categories available.', 'akaza-header-footer' ),
					),
				)
			);
		}
	}

	/**
	 * Late head CSS so menu panels stay plain text (no arrows/underlines), even when CSS is cached.
	 */
	public static function menu_link_polish_css() {
		if ( ! self::should_load() ) {
			return;
		}

		echo '<style id="epsh-nav-link-polish">' . self::menu_link_polish_rules() . '</style>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}

	/**
	 * @return string
	 */
	private static function menu_link_polish_rules() {
		$base      = 'body.epsh-custom-desktop-nav';
		$hosts     = array( '.site-header', '.genesis-header' );
		$targets   = array( 'a', '.epsh-nav-link', '.epsh-nav-trigger' );
		$pseudos   = array( '', ':hover', ':focus', ':focus-visible', ':active', '.is-active' );
		$selectors = array();

		foreach ( $hosts as $host ) {
			foreach ( $targets as $target ) {
				foreach ( $pseudos as $pseudo ) {
					$selectors[] = $base . ' ' . $host . ' ' . $target . $pseudo;
				}
			}
		}

		$states = implode( ',', $selectors );
		$pseudo = array();

		foreach ( $selectors as $selector ) {
			$pseudo[] = $selector . '::before';
			$pseudo[] = $selector . '::after';
		}

		return $states . '{text-decoration:none!important;text-decoration-line:none!important;'
			. '-webkit-text-decoration:none!important;border:none!important;border-bottom:none!important;'
			. 'outline:none!important;box-shadow:none!important;background-image:none!important}'
			. implode( ',', $pseudo ) . '{content:none!important;display:none!important;'
			. 'visibility:hidden!important;width:0!important;height:0!important;opacity:0!important;'
			. 'border:none!important;background:none!important}'
			. $base . ' .epsh-mega-group-caret{display:none!important;visibility:hidden!important;'
			. 'width:0!important;height:0!important;border:none!important}'
			. $base . ' .epsh-mega-group-toggle{display:none!important;width:0!important;'
			. 'min-width:0!important;padding:0!important;margin:0!important;border:0!important;'
			. 'overflow:hidden!important}'
			. $base . ' .epsh-mega-group-head>.epsh-mega-link{border-radius:8px!important}';
	}

	/**
	 * Output desktop navigation inside Genesis header.
	 */
	public static function render() {
		if ( ! self::should_load() ) {
			return;
		}

		$items = AHF_Menu_Items::get_desktop_items();

		echo '<div class="epsh-desktop-nav-wrap nav-primary">';
		echo '<nav class="epsh-desktop-nav" aria-label="' . esc_attr__( 'Main navigation', 'akaza-header-footer' ) . '">';
		echo '<ul class="epsh-nav-list">';

		foreach ( $items as $item ) {
			self::render_item( $item );
		}

		echo '</ul>';
		echo '</nav>';
		echo '</div>';

		if ( AHF_Config::feature_enabled( 'desktop_extras' ) ) {
			echo '<div class="epsh-header-extras-wrap">';
			echo self::render_extras(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			echo '</div>';
		}
	}

	/**
	 * @param array<string, mixed> $item Menu item.
	 */
	private static function render_item( $item ) {
		$type = isset( $item['type'] ) ? (string) $item['type'] : 'link';

		if ( 'interactive_mega' === $type ) {
			self::render_interactive_mega_item( $item );
			return;
		}

		if ( 'mega' === $type && ! empty( $item['rows'] ) ) {
			self::render_mega_item( $item );
			return;
		}

		if ( 'dropdown' === $type && ! empty( $item['links'] ) ) {
			self::render_dropdown_item( $item );
			return;
		}

		if ( empty( $item['url'] ) ) {
			return;
		}

		$url   = AHF_Config::menu_url( $item['url'] );
		$class = AHF_Menu_Items::menu_link_class( 'epsh-nav-link', $item['url'] );

		printf(
			'<li class="epsh-nav-item%3$s"><a class="%1$s" href="%2$s"%4$s>%5$s</a></li>',
			esc_attr( $class ),
			esc_url( $url ),
			AHF_Config::is_menu_url_active( $item['url'] ) ? ' is-active' : '',
			AHF_Menu_Items::menu_link_current_attr( $item['url'] ), // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			esc_html( $item['label'] )
		);
	}

	/**
	 * @param array<string, mixed> $item Interactive mega menu item.
	 */
	private static function render_interactive_mega_item( $item ) {
		$slug           = ! empty( $item['slug'] ) ? sanitize_title( (string) $item['slug'] ) : sanitize_title( $item['label'] );
		$categories     = class_exists( 'AHF_Mega_Menu_Data' ) ? AHF_Mega_Menu_Data::get_mega_menu_tree() : array();
		$first_category = ( ! empty( $categories ) && is_array( $categories[0] ) ) ? $categories[0] : null;
		$first_courses  = ( $first_category && ! empty( $first_category['courses'] ) && is_array( $first_category['courses'] ) )
			? $first_category['courses']
			: array();
		$first_course   = ! empty( $first_courses[0] ) && is_array( $first_courses[0] ) ? $first_courses[0] : null;
		$is_active      = class_exists( 'AHF_Mega_Menu_Data' ) && AHF_Mega_Menu_Data::tree_has_active_page();
		$item_class     = 'epsh-nav-item epsh-has-mega epsh-has-interactive-mega' . ( $is_active ? ' is-active' : '' );
		$trigger        = 'epsh-nav-link epsh-nav-trigger' . ( $is_active ? ' is-active' : '' );
		?>
		<li class="<?php echo esc_attr( $item_class ); ?>" data-epsh-mega="<?php echo esc_attr( $slug ); ?>">
			<div class="epsh-mega-anchor">
				<button
					type="button"
					class="<?php echo esc_attr( $trigger ); ?>"
					aria-expanded="false"
					aria-haspopup="true"
					aria-controls="epsh-mega-<?php echo esc_attr( $slug ); ?>"
					<?php echo $is_active ? 'aria-current="true"' : ''; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
				>
					<span class="epsh-nav-label"><?php echo esc_html( $item['label'] ); ?></span>
					<span class="epsh-caret" aria-hidden="true"></span>
				</button>
				<div
					class="epsh-nav-panel epsh-mega-panel epsh-mega-panel--wide epsh-mega-panel--solutions epsh-mega-panel--interactive"
					id="epsh-mega-<?php echo esc_attr( $slug ); ?>"
					hidden
					data-epsh-interactive-mega
				>
					<div class="epsh-mega-shell">
						<div class="epsh-mega-interactive">
							<nav class="epsh-mega-topics" aria-label="<?php esc_attr_e( 'Solutions', 'akaza-header-footer' ); ?>">
								<p class="epsh-mega-col-heading"><?php esc_html_e( 'Solutions', 'akaza-header-footer' ); ?></p>
								<ul class="epsh-mega-topics__list" role="list">
									<?php if ( empty( $categories ) ) : ?>
										<li class="epsh-mega-topics__empty">
											<?php esc_html_e( 'No solution categories available.', 'akaza-header-footer' ); ?>
										</li>
									<?php else : ?>
										<?php foreach ( $categories as $index => $category ) : ?>
											<?php
											$category_url = (string) ( $category['url'] ?? '' );
											if ( '' === $category_url ) {
												$category_url = '#';
											}
											?>
											<li>
												<a
													href="<?php echo esc_url( $category_url ); ?>"
													class="epsh-mega-topic<?php echo 0 === (int) $index ? ' is-active' : ''; ?>"
													data-category-id="<?php echo esc_attr( (string) ( $category['id'] ?? '' ) ); ?>"
													aria-current="<?php echo 0 === (int) $index ? 'true' : 'false'; ?>"
												>
													<span class="epsh-mega-topic__label"><?php echo esc_html( (string) ( $category['label'] ?? '' ) ); ?></span>
													<span class="epsh-mega-topic__arrow" aria-hidden="true"></span>
												</a>
											</li>
										<?php endforeach; ?>
									<?php endif; ?>
								</ul>
							</nav>
							<div class="epsh-mega-courses" aria-live="polite">
								<p class="epsh-mega-col-heading"><?php esc_html_e( 'Courses', 'akaza-header-footer' ); ?></p>
								<ul class="epsh-mega-courses__list" role="list">
									<?php if ( empty( $first_courses ) ) : ?>
										<li class="epsh-mega-courses__empty">
											<?php esc_html_e( 'No courses in this category yet.', 'akaza-header-footer' ); ?>
										</li>
									<?php else : ?>
										<?php foreach ( $first_courses as $course_index => $course ) : ?>
											<li>
												<button
													type="button"
													class="epsh-mega-course<?php echo 0 === (int) $course_index ? ' is-active' : ''; ?>"
													data-course-id="<?php echo esc_attr( (string) ( $course['id'] ?? '' ) ); ?>"
													aria-pressed="<?php echo 0 === (int) $course_index ? 'true' : 'false'; ?>"
												>
													<span class="epsh-mega-course__label"><?php echo esc_html( (string) ( $course['label'] ?? '' ) ); ?></span>
												</button>
											</li>
										<?php endforeach; ?>
									<?php endif; ?>
								</ul>
							</div>
							<article class="epsh-mega-preview" aria-live="polite">
								<?php
								$preview_url   = (string) ( $first_course['url'] ?? '' );
								$preview_label = (string) ( $first_course['label'] ?? '' );
								$preview_desc  = (string) ( $first_course['description'] ?? '' );
								$preview_image = (string) ( $first_course['image'] ?? '' );
								$has_preview   = ! empty( $first_course ) && '' !== $preview_url;
								?>
								<a
									class="epsh-mega-preview__link"
									href="<?php echo $has_preview ? esc_url( $preview_url ) : '#'; ?>"
									<?php echo $has_preview ? '' : 'hidden'; ?>
									tabindex="<?php echo $has_preview ? '0' : '-1'; ?>"
								>
									<div class="epsh-mega-preview__media">
										<img
											class="epsh-mega-preview__image"
											alt="<?php echo esc_attr( $preview_label ); ?>"
											width="<?php echo esc_attr( (string) ( $first_course['image_width'] ?? 640 ) ); ?>"
											height="<?php echo esc_attr( (string) ( $first_course['image_height'] ?? 400 ) ); ?>"
											loading="lazy"
											decoding="async"
											<?php if ( '' !== $preview_image ) : ?>
												src="<?php echo esc_url( $preview_image ); ?>"
											<?php else : ?>
												hidden
											<?php endif; ?>
										>
									</div>
									<div class="epsh-mega-preview__body">
										<p class="epsh-mega-preview__title"><?php echo esc_html( $preview_label ); ?></p>
										<p class="epsh-mega-preview__description"><?php echo esc_html( $preview_desc ); ?></p>
										<span class="epsh-mega-preview__cta"><?php esc_html_e( 'View course', 'akaza-header-footer' ); ?></span>
									</div>
								</a>
							</article>
						</div>
					</div>
				</div>
			</div>
		</li>
		<?php
	}

	/**
	 * @param array<string, mixed> $item Mega menu item.
	 */
	private static function render_mega_item( $item ) {
		$slug        = sanitize_title( $item['label'] );
		$rows        = $item['rows'] ?? array();
		$is_active   = AHF_Menu_Items::mega_has_active_child( $rows );
		$item_class  = 'epsh-nav-item epsh-has-mega' . ( $is_active ? ' is-active' : '' );
		$trigger_cls = 'epsh-nav-link epsh-nav-trigger' . ( $is_active ? ' is-active' : '' );
		?>
		<li class="<?php echo esc_attr( $item_class ); ?>" data-epsh-mega="<?php echo esc_attr( $slug ); ?>">
			<div class="epsh-mega-anchor">
				<button
					type="button"
					class="<?php echo esc_attr( $trigger_cls ); ?>"
					aria-expanded="false"
					aria-haspopup="true"
					aria-controls="epsh-mega-<?php echo esc_attr( $slug ); ?>"
					<?php echo $is_active ? 'aria-current="true"' : ''; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
				>
					<span class="epsh-nav-label"><?php echo esc_html( $item['label'] ); ?></span>
					<span class="epsh-caret" aria-hidden="true"></span>
				</button>
				<div class="epsh-nav-panel epsh-mega-panel epsh-mega-panel--wide epsh-mega-panel--solutions" id="epsh-mega-<?php echo esc_attr( $slug ); ?>" hidden>
					<div class="epsh-mega-shell">
						<div class="epsh-mega-inner">
							<?php foreach ( $rows as $row ) : ?>
								<div class="epsh-mega-col">
									<?php if ( ! empty( $row['heading'] ) ) : ?>
										<p class="epsh-mega-heading"><?php echo esc_html( $row['heading'] ); ?></p>
									<?php endif; ?>
									<?php if ( ! empty( $row['links'] ) ) : ?>
										<ul class="epsh-mega-links">
											<?php foreach ( $row['links'] as $link ) : ?>
												<?php self::render_mega_link_item( $link ); ?>
											<?php endforeach; ?>
										</ul>
									<?php endif; ?>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
			</div>
		</li>
		<?php
	}

	/**
	 * @param array<string, mixed> $link Mega menu link or expandable group.
	 */
	private static function render_mega_link_item( $link ) {
		$children = $link['children'] ?? array();

		if ( empty( $children ) ) {
			$link_path  = $link['url'] ?? '#';
			$link_class = AHF_Menu_Items::menu_link_class( 'epsh-mega-link', $link_path );
			?>
			<li>
				<a class="<?php echo esc_attr( $link_class ); ?>" href="<?php echo esc_url( AHF_Config::menu_url( $link_path ) ); ?>"<?php echo AHF_Menu_Items::menu_link_current_attr( $link_path ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
					<?php echo esc_html( $link['label'] ?? '' ); ?>
				</a>
			</li>
			<?php
			return;
		}

		$group_path     = $link['url'] ?? '#';
		$group_class    = AHF_Menu_Items::menu_link_class( 'epsh-mega-link', $group_path );
		$is_active      = AHF_Menu_Items::link_item_has_active( $link );
		$group_slug     = sanitize_title( (string) ( $link['label'] ?? 'group' ) );
		$sublinks_id    = 'epsh-mega-sublinks-' . $group_slug;
		$group_class_li = 'epsh-mega-group' . ( $is_active ? ' is-active is-open' : '' );
		?>
		<li class="<?php echo esc_attr( $group_class_li ); ?>">
			<div class="epsh-mega-group-head">
				<a class="<?php echo esc_attr( $group_class ); ?>" href="<?php echo esc_url( AHF_Config::menu_url( $group_path ) ); ?>"<?php echo AHF_Menu_Items::menu_link_current_attr( $group_path ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
					<?php echo esc_html( $link['label'] ?? '' ); ?>
				</a>
				<button
					type="button"
					class="epsh-mega-group-toggle"
					aria-expanded="<?php echo $is_active ? 'true' : 'false'; ?>"
					aria-controls="<?php echo esc_attr( $sublinks_id ); ?>"
					aria-label="<?php echo esc_attr( sprintf( __( 'Expand %s links', 'akaza-header-footer' ), $link['label'] ?? '' ) ); ?>"
				>
					<span class="epsh-mega-group-caret" aria-hidden="true"></span>
				</button>
			</div>
			<ul class="epsh-mega-sublinks" id="<?php echo esc_attr( $sublinks_id ); ?>"<?php echo $is_active ? '' : ' hidden'; ?>>
				<?php foreach ( $children as $child ) : ?>
					<?php
					$child_path  = $child['url'] ?? '#';
					$child_class = AHF_Menu_Items::menu_link_class( 'epsh-mega-sublink', $child_path );
					?>
					<li>
						<a class="<?php echo esc_attr( $child_class ); ?>" href="<?php echo esc_url( AHF_Config::menu_url( $child_path ) ); ?>"<?php echo AHF_Menu_Items::menu_link_current_attr( $child_path ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
							<?php echo esc_html( $child['label'] ?? '' ); ?>
						</a>
					</li>
				<?php endforeach; ?>
			</ul>
		</li>
		<?php
	}

	/**
	 * @param array<string, mixed> $item Dropdown menu item.
	 */
	private static function render_dropdown_item( $item ) {
		$slug       = sanitize_title( $item['label'] );
		$links      = $item['links'] ?? array();
		$is_active  = AHF_Menu_Items::links_have_active( $links );
		$item_class = 'epsh-nav-item epsh-has-dropdown' . ( $is_active ? ' is-active' : '' );
		$trigger    = 'epsh-nav-link epsh-nav-trigger' . ( $is_active ? ' is-active' : '' );
		?>
		<li class="<?php echo esc_attr( $item_class ); ?>" data-epsh-dropdown="<?php echo esc_attr( $slug ); ?>">
			<div class="epsh-dropdown-anchor">
				<button
					type="button"
					class="<?php echo esc_attr( $trigger ); ?>"
					aria-expanded="false"
					aria-haspopup="true"
					aria-controls="epsh-dropdown-<?php echo esc_attr( $slug ); ?>"
					<?php echo $is_active ? 'aria-current="true"' : ''; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
				>
					<span class="epsh-nav-label"><?php echo esc_html( $item['label'] ); ?></span>
					<span class="epsh-caret" aria-hidden="true"></span>
				</button>
				<div class="epsh-nav-panel epsh-dropdown-panel" id="epsh-dropdown-<?php echo esc_attr( $slug ); ?>" hidden>
					<ul class="epsh-dropdown-links">
						<?php foreach ( $links as $link ) : ?>
							<?php
							$link_path  = $link['url'] ?? '#';
							$link_class = AHF_Menu_Items::menu_link_class( 'epsh-dropdown-link', $link_path );
							?>
							<li>
								<a class="<?php echo esc_attr( $link_class ); ?>" href="<?php echo esc_url( AHF_Config::menu_url( $link_path ) ); ?>"<?php echo AHF_Menu_Items::menu_link_current_attr( $link_path ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
									<?php echo esc_html( $link['label'] ?? '' ); ?>
								</a>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>
		</li>
		<?php
	}

	/**
	 * Contact block + CTA button markup (email + CTA only; no phone).
	 */
	private static function render_extras() {
		$config  = AHF_Config::get();
		$contact = $config['contact'];
		$cta     = $config['cta'];

		$email = esc_html( $contact['email'] );

		$mail_icon = '<svg class="epsh-header-email__icon" width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false"><rect x="3.5" y="5.5" width="17" height="13" rx="2" stroke="currentColor" stroke-width="1.75"/><path d="M4 7.5l8 6.25L20 7.5" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"/></svg>';

		$contact_block = sprintf(
			'<div class="epsh-header-contact">
				<div class="epsh-header-email">
					%1$s
					<a href="mailto:%2$s">%2$s</a>
				</div>
			</div>',
			$mail_icon,
			$email
		);

		$button = sprintf(
			'<a class="epsh-btn-posh-a btn-posh-a" href="%1$s"><span class="epsh-btn-posh btn-posh">%2$s</span></a>',
			esc_url( AHF_Config::menu_url( $cta['url'] ) ),
			esc_html( $cta['label'] )
		);

		$search = '';
		if ( class_exists( 'AHF_Site_Search' ) ) {
			$search = AHF_Site_Search::render_toggle_button();
		}

		// Order: CTA | search icon | email (Figma + present search).
		return $button . $search . $contact_block;
	}
}
