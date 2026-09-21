<?php
/**
 * Plugin settings (Settings → Site Header).
 *
 * @package Akaza_Header_Footer
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Admin settings page and option handling.
 */
class AHF_Settings {

	const PAGE_SLUG = 'akaza-header-footer';

	/**
	 * Register hooks.
	 */
	public static function init() {
		add_action( 'admin_menu', array( __CLASS__, 'register_menu' ) );
		add_action( 'admin_init', array( __CLASS__, 'register_settings' ) );
		add_action( 'admin_enqueue_scripts', array( __CLASS__, 'enqueue_assets' ) );
		add_action( 'admin_bar_menu', array( __CLASS__, 'admin_bar_status' ), 100 );
		add_action( 'admin_notices', array( __CLASS__, 'disabled_notice' ) );
	}

	/**
	 * Settings → Site Header.
	 */
	public static function register_menu() {
		add_options_page(
			__( 'Akaza Header Footer', 'akaza-header-footer' ),
			__( 'Header Footer', 'akaza-header-footer' ),
			'manage_options',
			self::PAGE_SLUG,
			array( __CLASS__, 'render_page' )
		);
	}

	/**
	 * Register settings option.
	 */
	public static function register_settings() {
		register_setting(
			'ahf_settings_group',
			AHF_OPTION_SETTINGS,
			array(
				'type'              => 'array',
				'sanitize_callback' => array( __CLASS__, 'sanitize' ),
				'default'           => AHF_Config::default_settings(),
			)
		);
	}

	/**
	 * @param array<string, mixed> $input Raw input.
	 * @return array<string, mixed>
	 */
	public static function sanitize( $input ) {
		$defaults = AHF_Config::default_settings();
		$existing = AHF_Config::get_settings();
		$output   = wp_parse_args( $existing, $defaults );

		if ( ! is_array( $input ) ) {
			return $output;
		}

		$yes_no_keys = array(
			'enabled',
			'genesis_layout',
			'custom_desktop_menu',
			'smart_header_scroll',
			'desktop_extras',
			'mega_menu_fix',
			'mobile_header',
			'footer',
			'top_bar',
			'top_bar_show_button',
			'top_bar_show_button_2',
		);

		foreach ( $yes_no_keys as $key ) {
			$output[ $key ] = ( isset( $input[ $key ] ) && 'yes' === $input[ $key ] ) ? 'yes' : 'no';
		}

		$output['breakpoint'] = max( 768, min( 1600, absint( $input['breakpoint'] ?? $defaults['breakpoint'] ) ) );

		$text_keys = array(
			'contact_email',
			'phone_shortcode',
			'logo_alt',
			'cta_label',
			'primary_menu_location',
			'top_bar_message',
			'top_bar_btn_text',
			'top_bar_btn2_text',
		);

		foreach ( $text_keys as $key ) {
			if ( isset( $input[ $key ] ) ) {
				$output[ $key ] = sanitize_text_field( $input[ $key ] );
			}
		}

		$url_keys = array( 'icon_email', 'icon_phone', 'logo_url', 'cta_url', 'top_bar_btn_url', 'top_bar_btn2_url' );

		foreach ( $url_keys as $key ) {
			if ( isset( $input[ $key ] ) ) {
				$output[ $key ] = esc_url_raw( $input[ $key ] );
			}
		}

		if ( isset( $input['top_bar_color'] ) ) {
			$color = sanitize_hex_color( $input['top_bar_color'] );
			$output['top_bar_color'] = $color ? $color : $defaults['top_bar_color'];
		}

		if ( isset( $input['top_bar_btn_color'] ) ) {
			$btn_color = sanitize_hex_color( $input['top_bar_btn_color'] );
			$output['top_bar_btn_color'] = $btn_color ? $btn_color : '';
		}

		$allowed_visibility = array( 'all', 'guests', 'users' );
		if ( isset( $input['top_bar_visibility'] ) && in_array( $input['top_bar_visibility'], $allowed_visibility, true ) ) {
			$output['top_bar_visibility'] = $input['top_bar_visibility'];
		}

		$output['top_bar_status']        = ( 'yes' === $output['top_bar'] ) ? 'active' : 'inactive';
		$output['top_bar_btn_behavior']  = ( isset( $input['top_bar_btn_behavior'] ) && 'newwindow' === $input['top_bar_btn_behavior'] ) ? 'newwindow' : 'samewindow';
		$output['top_bar_btn2_behavior'] = ( isset( $input['top_bar_btn2_behavior'] ) && 'newwindow' === $input['top_bar_btn2_behavior'] ) ? 'newwindow' : 'samewindow';

		if ( isset( $input['top_bar_excluded_ids'] ) && is_array( $input['top_bar_excluded_ids'] ) ) {
			$output['top_bar_excluded_ids'] = AHF_Config::parse_id_list( $input['top_bar_excluded_ids'] );
		} else {
			$output['top_bar_excluded_ids'] = array();
		}

		$output['top_bar_excluded_extra'] = isset( $input['top_bar_excluded_extra'] )
			? sanitize_text_field( $input['top_bar_excluded_extra'] )
			: '';

		return $output;
	}

	/**
	 * @param string $hook_suffix Current admin page.
	 */
	public static function enqueue_assets( $hook_suffix ) {
		if ( 'settings_page_' . self::PAGE_SLUG !== $hook_suffix ) {
			return;
		}

		wp_enqueue_style(
			'epsh-admin',
			AHF_PLUGIN_URL . 'assets/css/admin.css',
			array(),
			AHF_VERSION
		);
	}

	/**
	 * @param WP_Admin_Bar $wp_admin_bar Admin bar.
	 */
	public static function admin_bar_status( $wp_admin_bar ) {
		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		}

		$enabled = AHF_Config::is_enabled();

		$wp_admin_bar->add_node(
			array(
				'id'    => 'epsh-status',
				'title' => $enabled
					? __( 'Site Header: ON', 'akaza-header-footer' )
					: __( 'Site Header: OFF', 'akaza-header-footer' ),
				'href'  => admin_url( 'options-general.php?page=' . self::PAGE_SLUG ),
			)
		);
	}

	/**
	 * Warning when plugin is disabled.
	 */
	public static function disabled_notice() {
		if ( ! current_user_can( 'manage_options' ) || AHF_Config::is_enabled() ) {
			return;
		}

		$screen = function_exists( 'get_current_screen' ) ? get_current_screen() : null;
		if ( $screen && 'settings_page_' . self::PAGE_SLUG === $screen->id ) {
			return;
		}

		printf(
			'<div class="notice notice-warning"><p><strong>%1$s</strong> %2$s <a href="%3$s">%4$s</a></p></div>',
			esc_html__( 'Akaza Header Footer is disabled.', 'akaza-header-footer' ),
			esc_html__( 'Custom header features are not loading.', 'akaza-header-footer' ),
			esc_url( admin_url( 'options-general.php?page=' . self::PAGE_SLUG ) ),
			esc_html__( 'Open settings', 'akaza-header-footer' )
		);
	}

	/**
	 * Settings page markup.
	 */
	public static function render_page() {
		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		}

		$s = AHF_Config::get_settings();
		?>
		<div class="wrap epsh-settings-wrap">
			<h1><?php esc_html_e( 'Akaza Header Footer', 'akaza-header-footer' ); ?></h1>

			<p class="description">
				<?php esc_html_e( 'Controls the custom desktop mega menu, Genesis nav layout, mobile header, site footer, and header notification bar. AMP pages use the elearnposh-amp plugin separately.', 'akaza-header-footer' ); ?>
			</p>

			<?php
			$footer_on = isset( $s['footer'] ) && 'yes' === $s['footer'];
			$plugin_on = isset( $s['enabled'] ) && 'yes' === $s['enabled'];
			?>
			<div class="notice <?php echo ( $plugin_on && $footer_on ) ? 'notice-success' : 'notice-warning'; ?> inline" style="margin:12px 0 16px;padding:10px 14px;">
				<p style="margin:0;">
					<strong><?php esc_html_e( 'Site footer:', 'akaza-header-footer' ); ?></strong>
					<?php
					if ( ! $plugin_on ) {
						esc_html_e( 'Plugin is disabled — footer will not show.', 'akaza-header-footer' );
					} elseif ( $footer_on ) {
						esc_html_e( 'Enabled on all non-AMP pages (replaces Elementor footer).', 'akaza-header-footer' );
					} else {
						esc_html_e( 'Disabled — enable it in the Site Footer section below.', 'akaza-header-footer' );
					}
					?>
					<a href="#epsh-footer-settings"><?php esc_html_e( 'Jump to footer settings', 'akaza-header-footer' ); ?></a>
				</p>
			</div>

			<?php if ( isset( $_GET['settings-updated'] ) ) : // phpcs:ignore WordPress.Security.NonceVerification.Recommended ?>
				<div class="notice notice-success is-dismissible">
					<p><?php esc_html_e( 'Settings saved.', 'akaza-header-footer' ); ?></p>
				</div>
			<?php endif; ?>

			<form method="post" action="options.php">
				<?php settings_fields( 'ahf_settings_group' ); ?>

				<h2><?php esc_html_e( 'General', 'akaza-header-footer' ); ?></h2>
				<table class="form-table" role="presentation">
					<?php self::render_toggle_row( 'enabled', __( 'Enable plugin', 'akaza-header-footer' ), $s ); ?>
					<?php self::render_toggle_row( 'genesis_layout', __( 'Genesis nav layout', 'akaza-header-footer' ), $s ); ?>
					<?php self::render_toggle_row( 'custom_desktop_menu', __( 'Custom desktop mega menu', 'akaza-header-footer' ), $s ); ?>
					<?php self::render_toggle_row( 'smart_header_scroll', __( 'Smart header on scroll (hide down / show up)', 'akaza-header-footer' ), $s ); ?>
					<?php self::render_toggle_row( 'desktop_extras', __( 'Desktop contact + CTA', 'akaza-header-footer' ), $s ); ?>
					<?php self::render_toggle_row( 'mega_menu_fix', __( 'Mega menu arrow fix', 'akaza-header-footer' ), $s ); ?>
					<?php self::render_toggle_row( 'mobile_header', __( 'Mobile header (≤ breakpoint)', 'akaza-header-footer' ), $s ); ?>
					<?php self::render_toggle_row( 'top_bar', __( 'Header notification bar', 'akaza-header-footer' ), $s ); ?>
					<tr>
						<th scope="row"><label for="ahf_breakpoint"><?php esc_html_e( 'Mobile breakpoint (px)', 'akaza-header-footer' ); ?></label></th>
						<td>
							<input type="number" id="ahf_breakpoint" name="<?php echo esc_attr( AHF_OPTION_SETTINGS ); ?>[breakpoint]" value="<?php echo esc_attr( (string) $s['breakpoint'] ); ?>" min="768" max="1600" step="1" class="small-text" />
						</td>
					</tr>
					<tr>
						<th scope="row"><label for="ahf_primary_menu"><?php esc_html_e( 'Primary menu location', 'akaza-header-footer' ); ?></label></th>
						<td>
							<input type="text" id="ahf_primary_menu" name="<?php echo esc_attr( AHF_OPTION_SETTINGS ); ?>[primary_menu_location]" value="<?php echo esc_attr( $s['primary_menu_location'] ); ?>" class="regular-text" />
						</td>
					</tr>
				</table>

				<h2><?php esc_html_e( 'Notification bar', 'akaza-header-footer' ); ?></h2>
				<p class="description"><?php esc_html_e( 'Turn on “Header notification bar” in General above. On desktop it appears at the bottom of the site header; on mobile it is a fixed strip at the bottom of the screen.', 'akaza-header-footer' ); ?></p>
				<table class="form-table" role="presentation">
					<tr>
						<th scope="row"><label for="ahf_top_bar_message"><?php esc_html_e( 'Message', 'akaza-header-footer' ); ?></label></th>
						<td><input type="text" id="ahf_top_bar_message" name="<?php echo esc_attr( AHF_OPTION_SETTINGS ); ?>[top_bar_message]" value="<?php echo esc_attr( $s['top_bar_message'] ); ?>" class="large-text" placeholder="<?php esc_attr_e( 'Check out our new product right now!', 'akaza-header-footer' ); ?>" /></td>
					</tr>
					<tr>
						<th scope="row"><label for="ahf_top_bar_color"><?php esc_html_e( 'Bar background color', 'akaza-header-footer' ); ?></label></th>
						<td><input type="color" id="ahf_top_bar_color" name="<?php echo esc_attr( AHF_OPTION_SETTINGS ); ?>[top_bar_color]" value="<?php echo esc_attr( $s['top_bar_color'] ); ?>" /></td>
					</tr>
					<tr>
						<th scope="row"><label for="ahf_top_bar_btn_color"><?php esc_html_e( 'Button background color', 'akaza-header-footer' ); ?></label></th>
						<td>
							<input type="color" id="ahf_top_bar_btn_color" name="<?php echo esc_attr( AHF_OPTION_SETTINGS ); ?>[top_bar_btn_color]" value="<?php echo esc_attr( $s['top_bar_btn_color'] ); ?>" />
							<p class="description"><?php esc_html_e( 'Applies to all notification bar buttons. Leave empty to auto-shade from the bar background.', 'akaza-header-footer' ); ?></p>
						</td>
					</tr>
					<tr>
						<th scope="row"><?php esc_html_e( 'Button 1', 'akaza-header-footer' ); ?></th>
						<td><?php self::render_toggle_row_inline( 'top_bar_show_button', $s, __( 'Show button 1', 'akaza-header-footer' ) ); ?></td>
					</tr>
					<tr>
						<th scope="row"><label for="ahf_top_bar_btn_text"><?php esc_html_e( 'Button 1 text', 'akaza-header-footer' ); ?></label></th>
						<td><input type="text" id="ahf_top_bar_btn_text" name="<?php echo esc_attr( AHF_OPTION_SETTINGS ); ?>[top_bar_btn_text]" value="<?php echo esc_attr( $s['top_bar_btn_text'] ); ?>" class="regular-text" /></td>
					</tr>
					<tr>
						<th scope="row"><label for="ahf_top_bar_btn_url"><?php esc_html_e( 'Button 1 URL', 'akaza-header-footer' ); ?></label></th>
						<td><input type="url" id="ahf_top_bar_btn_url" name="<?php echo esc_attr( AHF_OPTION_SETTINGS ); ?>[top_bar_btn_url]" value="<?php echo esc_attr( $s['top_bar_btn_url'] ); ?>" class="large-text" /></td>
					</tr>
					<tr>
						<th scope="row"><label for="ahf_top_bar_btn_behavior"><?php esc_html_e( 'Button 1 link', 'akaza-header-footer' ); ?></label></th>
						<td>
							<select id="ahf_top_bar_btn_behavior" name="<?php echo esc_attr( AHF_OPTION_SETTINGS ); ?>[top_bar_btn_behavior]">
								<option value="samewindow" <?php selected( $s['top_bar_btn_behavior'], 'samewindow' ); ?>><?php esc_html_e( 'Same window', 'akaza-header-footer' ); ?></option>
								<option value="newwindow" <?php selected( $s['top_bar_btn_behavior'], 'newwindow' ); ?>><?php esc_html_e( 'New window', 'akaza-header-footer' ); ?></option>
							</select>
						</td>
					</tr>
					<tr>
						<th scope="row"><?php esc_html_e( 'Button 2', 'akaza-header-footer' ); ?></th>
						<td><?php self::render_toggle_row_inline( 'top_bar_show_button_2', $s, __( 'Show button 2', 'akaza-header-footer' ) ); ?></td>
					</tr>
					<tr>
						<th scope="row"><label for="ahf_top_bar_btn2_text"><?php esc_html_e( 'Button 2 text', 'akaza-header-footer' ); ?></label></th>
						<td><input type="text" id="ahf_top_bar_btn2_text" name="<?php echo esc_attr( AHF_OPTION_SETTINGS ); ?>[top_bar_btn2_text]" value="<?php echo esc_attr( $s['top_bar_btn2_text'] ); ?>" class="regular-text" /></td>
					</tr>
					<tr>
						<th scope="row"><label for="ahf_top_bar_btn2_url"><?php esc_html_e( 'Button 2 URL', 'akaza-header-footer' ); ?></label></th>
						<td><input type="url" id="ahf_top_bar_btn2_url" name="<?php echo esc_attr( AHF_OPTION_SETTINGS ); ?>[top_bar_btn2_url]" value="<?php echo esc_attr( $s['top_bar_btn2_url'] ); ?>" class="large-text" /></td>
					</tr>
					<tr>
						<th scope="row"><label for="ahf_top_bar_btn2_behavior"><?php esc_html_e( 'Button 2 link', 'akaza-header-footer' ); ?></label></th>
						<td>
							<select id="ahf_top_bar_btn2_behavior" name="<?php echo esc_attr( AHF_OPTION_SETTINGS ); ?>[top_bar_btn2_behavior]">
								<option value="samewindow" <?php selected( $s['top_bar_btn2_behavior'], 'samewindow' ); ?>><?php esc_html_e( 'Same window', 'akaza-header-footer' ); ?></option>
								<option value="newwindow" <?php selected( $s['top_bar_btn2_behavior'], 'newwindow' ); ?>><?php esc_html_e( 'New window', 'akaza-header-footer' ); ?></option>
							</select>
						</td>
					</tr>
					<tr>
						<th scope="row"><label for="ahf_top_bar_visibility"><?php esc_html_e( 'Who can see it', 'akaza-header-footer' ); ?></label></th>
						<td>
							<select id="ahf_top_bar_visibility" name="<?php echo esc_attr( AHF_OPTION_SETTINGS ); ?>[top_bar_visibility]">
								<option value="all" <?php selected( $s['top_bar_visibility'], 'all' ); ?>><?php esc_html_e( 'Everyone', 'akaza-header-footer' ); ?></option>
								<option value="guests" <?php selected( $s['top_bar_visibility'], 'guests' ); ?>><?php esc_html_e( 'Guests only', 'akaza-header-footer' ); ?></option>
								<option value="users" <?php selected( $s['top_bar_visibility'], 'users' ); ?>><?php esc_html_e( 'Logged-in users only', 'akaza-header-footer' ); ?></option>
							</select>
						</td>
					</tr>
					<tr>
						<th scope="row"><?php esc_html_e( 'Exclude on pages', 'akaza-header-footer' ); ?></th>
						<td><?php self::render_top_bar_page_exclusions( $s ); ?></td>
					</tr>
					<tr>
						<th scope="row"><label for="ahf_top_bar_excluded_extra"><?php esc_html_e( 'Additional excluded IDs', 'akaza-header-footer' ); ?></label></th>
						<td>
							<input type="text" id="ahf_top_bar_excluded_extra" name="<?php echo esc_attr( AHF_OPTION_SETTINGS ); ?>[top_bar_excluded_extra]" value="<?php echo esc_attr( $s['top_bar_excluded_extra'] ); ?>" class="regular-text" placeholder="<?php esc_attr_e( 'e.g. 21597, 450', 'akaza-header-footer' ); ?>" />
							<p class="description"><?php esc_html_e( 'Optional comma-separated post/page IDs (for posts, landing pages, etc.).', 'akaza-header-footer' ); ?></p>
						</td>
					</tr>
				</table>

				<h2><?php esc_html_e( 'Contact & CTA', 'akaza-header-footer' ); ?></h2>
				<table class="form-table" role="presentation">
					<tr>
						<th scope="row"><label for="ahf_email"><?php esc_html_e( 'Email', 'akaza-header-footer' ); ?></label></th>
						<td><input type="email" id="ahf_email" name="<?php echo esc_attr( AHF_OPTION_SETTINGS ); ?>[contact_email]" value="<?php echo esc_attr( $s['contact_email'] ); ?>" class="regular-text" /></td>
					</tr>
					<tr>
						<th scope="row"><label for="ahf_phone_sc"><?php esc_html_e( 'Phone shortcode', 'akaza-header-footer' ); ?></label></th>
						<td><input type="text" id="ahf_phone_sc" name="<?php echo esc_attr( AHF_OPTION_SETTINGS ); ?>[phone_shortcode]" value="<?php echo esc_attr( $s['phone_shortcode'] ); ?>" class="regular-text" /></td>
					</tr>
					<tr>
						<th scope="row"><label for="ahf_cta_label"><?php esc_html_e( 'CTA label', 'akaza-header-footer' ); ?></label></th>
						<td><input type="text" id="ahf_cta_label" name="<?php echo esc_attr( AHF_OPTION_SETTINGS ); ?>[cta_label]" value="<?php echo esc_attr( $s['cta_label'] ); ?>" class="regular-text" /></td>
					</tr>
					<tr>
						<th scope="row"><label for="ahf_cta_url"><?php esc_html_e( 'CTA URL', 'akaza-header-footer' ); ?></label></th>
						<td><input type="url" id="ahf_cta_url" name="<?php echo esc_attr( AHF_OPTION_SETTINGS ); ?>[cta_url]" value="<?php echo esc_attr( $s['cta_url'] ); ?>" class="large-text" /></td>
					</tr>
					<tr>
						<th scope="row"><label for="ahf_logo_url"><?php esc_html_e( 'Logo URL', 'akaza-header-footer' ); ?></label></th>
						<td><input type="url" id="ahf_logo_url" name="<?php echo esc_attr( AHF_OPTION_SETTINGS ); ?>[logo_url]" value="<?php echo esc_attr( $s['logo_url'] ); ?>" class="large-text" /></td>
					</tr>
					<tr>
						<th scope="row"><label for="ahf_logo_alt"><?php esc_html_e( 'Logo alt text', 'akaza-header-footer' ); ?></label></th>
						<td><input type="text" id="ahf_logo_alt" name="<?php echo esc_attr( AHF_OPTION_SETTINGS ); ?>[logo_alt]" value="<?php echo esc_attr( $s['logo_alt'] ); ?>" class="regular-text" /></td>
					</tr>
				</table>

				<h2 id="epsh-footer-settings"><?php esc_html_e( 'Site Footer', 'akaza-header-footer' ); ?></h2>
				<p class="description">
					<?php esc_html_e( 'Custom footer for all non-AMP pages. When enabled, it replaces the Elementor Header & Footer Builder footer. AMP pages keep their own footer in elearnposh-amp.', 'akaza-header-footer' ); ?>
				</p>
				<table class="form-table" role="presentation">
					<?php self::render_toggle_row( 'footer', __( 'Enable custom site footer', 'akaza-header-footer' ), $s ); ?>
					<tr>
						<th scope="row"><?php esc_html_e( 'Footer contact email', 'akaza-header-footer' ); ?></th>
						<td>
							<p class="description" style="margin:0;">
								<?php
								printf(
									/* translators: %s: settings field name */
									esc_html__( 'Uses the same email as Contact & CTA above (%s).', 'akaza-header-footer' ),
									'<code>contact_email</code>'
								);
								?>
							</p>
						</td>
					</tr>
					<tr>
						<th scope="row"><?php esc_html_e( 'Footer links', 'akaza-header-footer' ); ?></th>
						<td>
							<p class="description" style="margin:0;">
								<?php esc_html_e( 'Course and legal links use the same page-ID helpers as the header (posh_get_*_page_url). Customize with ahf_footer_course_links, ahf_footer_bottom_links, or ahf_footer_social_links in your child theme.', 'akaza-header-footer' ); ?>
							</p>
						</td>
					</tr>
				</table>

				<?php submit_button(); ?>
			</form>

			<hr />
			<h2><?php esc_html_e( 'Desktop menu links', 'akaza-header-footer' ); ?></h2>
			<p><?php esc_html_e( 'Desktop and mobile nav items are defined in code. Customize with ahf_desktop_menu_items, ahf_mobile_menu_items, ahf_posh_courses, ahf_global_courses, ahf_important_resources, ahf_resource_links, or related filters in your child theme.', 'akaza-header-footer' ); ?></p>
			<h2><?php esc_html_e( 'Mobile menu links', 'akaza-header-footer' ); ?></h2>
			<p><?php esc_html_e( 'AMP header: edit elearnposh-amp → templates/components/menu.php', 'akaza-header-footer' ); ?></p>
		</div>
		<?php
	}

	/**
	 * @param string               $key     Setting key.
	 * @param string               $label   Field label.
	 * @param array<string, mixed> $settings Current settings.
	 */
	private static function render_toggle_row( $key, $label, $settings ) {
		$checked = isset( $settings[ $key ] ) && 'yes' === $settings[ $key ];
		$name    = AHF_OPTION_SETTINGS . '[' . $key . ']';
		?>
		<tr>
			<th scope="row"><?php echo esc_html( $label ); ?></th>
			<td>
				<input type="hidden" name="<?php echo esc_attr( $name ); ?>" value="no" />
				<label>
					<input type="checkbox" name="<?php echo esc_attr( $name ); ?>" value="yes" <?php checked( $checked ); ?> />
					<?php esc_html_e( 'Enabled', 'akaza-header-footer' ); ?>
				</label>
			</td>
		</tr>
		<?php
	}

	/**
	 * Inline checkbox for nested table rows.
	 *
	 * @param string               $key      Setting key.
	 * @param array<string, mixed> $settings Current settings.
	 */
	/**
	 * Checkbox list of pages where the notification bar is hidden.
	 *
	 * @param array<string, mixed> $settings Current settings.
	 */
	private static function render_top_bar_page_exclusions( $settings ) {
		$excluded = AHF_Config::parse_id_list( $settings['top_bar_excluded_ids'] ?? array() );
		$pages    = get_pages(
			array(
				'sort_column' => 'post_title',
				'sort_order'  => 'ASC',
				'post_status' => 'publish',
			)
		);
		$name     = AHF_OPTION_SETTINGS . '[top_bar_excluded_ids][]';
		?>
		<div class="epsh-page-exclusions">
			<?php if ( empty( $pages ) ) : ?>
				<p><?php esc_html_e( 'No published pages found.', 'akaza-header-footer' ); ?></p>
			<?php else : ?>
				<?php foreach ( $pages as $page ) : ?>
					<label class="epsh-page-exclusions__item">
						<input
							type="checkbox"
							name="<?php echo esc_attr( $name ); ?>"
							value="<?php echo esc_attr( (string) $page->ID ); ?>"
							<?php checked( in_array( (int) $page->ID, $excluded, true ) ); ?>
						/>
						<?php echo esc_html( $page->post_title ); ?>
						<span class="description"><?php echo esc_html( sprintf( '(ID: %d)', (int) $page->ID ) ); ?></span>
					</label>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
		<p class="description"><?php esc_html_e( 'The notification bar will not appear on checked pages.', 'akaza-header-footer' ); ?></p>
		<?php
	}

	private static function render_toggle_row_inline( $key, $settings, $label = '' ) {
		$checked = isset( $settings[ $key ] ) && 'yes' === $settings[ $key ];
		$name    = AHF_OPTION_SETTINGS . '[' . $key . ']';
		if ( '' === $label ) {
			$label = __( 'Show button in notification bar', 'akaza-header-footer' );
		}
		?>
		<input type="hidden" name="<?php echo esc_attr( $name ); ?>" value="no" />
		<label>
			<input type="checkbox" name="<?php echo esc_attr( $name ); ?>" value="yes" <?php checked( $checked ); ?> />
			<?php echo esc_html( $label ); ?>
		</label>
		<?php
	}
}
