<?php
/**
 * AMP header navigation — shared menu data with elearnposh-site-header when available.
 *
 * @package ElearnPOSH\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Header branding + contact block (mirrors EPSH mobile header extras).
 *
 * @return array{logo_url:string,logo_alt:string,home:string,email:string,cta_label:string,cta_url:string,phone:string}
 */
function elearnposh_amp_get_header_branding() {
	$branding = array(
		'logo_url'  => 'https://elearnposh.com/wp-content/uploads/2020/11/eLearn-posh-Logo.png',
		'logo_alt'  => 'eLearnPOSH',
		'home'      => home_url( '/' ),
		'email'     => 'sales@succeedtech.com',
		'cta_label' => 'Contact Us',
		'cta_url'   => home_url( '/contact-us/#demo' ),
		'phone'     => '',
	);

	if ( class_exists( 'EPSH_Config' ) && EPSH_Config::is_enabled() ) {
		$config = EPSH_Config::get();

		$branding['logo_url']  = (string) ( $config['logo']['url'] ?? $branding['logo_url'] );
		$branding['logo_alt']  = (string) ( $config['logo']['alt'] ?? $branding['logo_alt'] );
		$branding['home']      = (string) ( $config['logo']['home'] ?? $branding['home'] );
		$branding['email']     = (string) ( $config['contact']['email'] ?? $branding['email'] );
		$branding['cta_label'] = (string) ( $config['cta']['label'] ?? $branding['cta_label'] );
		$branding['cta_url']   = (string) ( $config['cta']['url'] ?? $branding['cta_url'] );

		if ( ! empty( $config['contact']['phone_shortcode'] ) ) {
			$branding['phone'] = trim( (string) do_shortcode( $config['contact']['phone_shortcode'] ) );
		}
	}

	$branding['home']    = elearnposh_amp_url( $branding['home'] );
	$branding['cta_url'] = function_exists( 'elearnposh_amp_get_contact_demo_url' )
		? elearnposh_amp_get_contact_demo_url()
		: elearnposh_amp_url( $branding['cta_url'] );

	return apply_filters( 'elearnposh_amp_header_branding', $branding );
}

/**
 * Mobile sidebar menu tree (same source as non-AMP mobile header).
 *
 * @return array<int, array<string, mixed>>
 */
function elearnposh_amp_get_nav_items() {
	if ( class_exists( 'EPSH_Menu_Items' ) ) {
		return EPSH_Menu_Items::get_mobile_items();
	}

	return apply_filters( 'elearnposh_amp_nav_items', elearnposh_amp_get_nav_items_fallback() );
}

/**
 * Fallback menu tree when elearnposh-site-header is inactive (matches EPSH mobile structure).
 *
 * @return array<int, array<string, mixed>>
 */
function elearnposh_amp_get_nav_items_fallback() {
	$posh_courses = array(
		array(
			'label' => __( 'POSH Training for Employees', 'elearnposh-amp' ),
			'url'   => '/solutions/posh-training-for-employees/',
		),
		array(
			'label' => __( 'POSH Training for Managers', 'elearnposh-amp' ),
			'url'   => '/solutions/posh-training-for-managers/',
		),
		array(
			'label' => __( 'POSH Training for IC Members', 'elearnposh-amp' ),
			'url'   => '/solutions/posh-training-for-ic-members/',
		),
		array(
			'label' => __( 'POSH Training for Higher Educational Institutions', 'elearnposh-amp' ),
			'url'   => '/solutions/posh-for-higher-educational-institutions/',
		),
		array(
			'label' => __( 'POCSO - Prevention of Child Sexual Abuse', 'elearnposh-amp' ),
			'url'   => '/solutions/pocso-prevention-of-child-sexual-abuse/',
		),
	);

	$global_courses = array(
		array(
			'label' => __( 'Unconscious Bias', 'elearnposh-amp' ),
			'url'   => '/solutions/unconscious-bias/',
		),
		array(
			'label' => __( 'Equality, Diversity & Inclusion', 'elearnposh-amp' ),
			'url'   => '/equality-and-diversity/',
		),
		array(
			'label' => __( 'Sexual Harassment Prevention for US', 'elearnposh-amp' ),
			'url'   => '/solutions/sexual-harassment-prevention-for-us/',
		),
	);

	$important_resources = array(
		array(
			'label' => __( 'Free POSH Audit', 'elearnposh-amp' ),
			'url'   => '/posh-compliance-audit/',
		),
		array(
			'label' => __( 'Complaint Management System', 'elearnposh-amp' ),
			'url'   => '/solutions/compliance-management-system/',
		),
		array(
			'label' => __( 'SHe-Box', 'elearnposh-amp' ),
			'url'   => '/she-box/',
		),
		array(
			'label' => __( 'About Us', 'elearnposh-amp' ),
			'url'   => '/about-us/',
		),
		array(
			'label' => __( 'FAQ', 'elearnposh-amp' ),
			'url'   => '/elearnposh-frequently-asked-questions-faqs/',
		),
	);

	$resource_links = array(
		array(
			'label' => __( 'Blog', 'elearnposh-amp' ),
			'url'   => '/blog/',
		),
		array(
			'label' => __( 'Newsletter', 'elearnposh-amp' ),
			'url'   => '/newsletter/',
		),
		array(
			'label' => __( 'Media', 'elearnposh-amp' ),
			'url'   => '/press/',
		),
		array(
			'label' => __( 'Enterprise Features', 'elearnposh-amp' ),
			'url'   => '/enterprise-features/',
		),
	);

	return array(
		array(
			'label'    => __( 'Solutions', 'elearnposh-amp' ),
			'variant'  => 'flat',
			'children' => array_merge(
				$posh_courses,
				array(
					array(
						'label'         => __( 'Global Courses', 'elearnposh-amp' ),
						'child_variant' => 'indent',
						'children'      => $global_courses,
					),
					array(
						'label'         => __( 'Important Resources', 'elearnposh-amp' ),
						'child_variant' => 'indent',
						'children'      => $important_resources,
					),
				)
			),
		),
		array(
			'label' => __( 'POSH Act', 'elearnposh-amp' ),
			'url'   => '/posh-act/',
		),
		array(
			'label' => __( 'External Members Directory', 'elearnposh-amp' ),
			'url'   => '/em-directory/members/',
		),
		array(
			'label' => __( 'Our Webinars', 'elearnposh-amp' ),
			'url'   => '/our-webinars/',
		),
		array(
			'label'    => __( 'Resources', 'elearnposh-amp' ),
			'variant'  => 'indent',
			'children' => $resource_links,
		),
	);
}

/**
 * @param string $path Menu path or absolute URL.
 */
function elearnposh_amp_menu_url( $path ) {
	return elearnposh_amp_url( $path );
}

/**
 * @param string $base_class Base link class.
 * @param string $path       Menu path.
 */
function elearnposh_amp_menu_link_class( $base_class, $path ) {
	if ( class_exists( 'EPSH_Menu_Items' ) ) {
		return EPSH_Menu_Items::menu_link_class( $base_class, $path );
	}

	$classes = array_filter( array_map( 'trim', explode( ' ', (string) $base_class ) ) );
	return implode( ' ', $classes );
}

/**
 * @param string $path Menu path.
 */
function elearnposh_amp_menu_current_attr( $path ) {
	if ( class_exists( 'EPSH_Menu_Items' ) ) {
		return EPSH_Menu_Items::menu_link_current_attr( $path );
	}

	return '';
}

/**
 * Whether a menu group contains nested accordion sections (Solutions pattern).
 *
 * @param array<string, mixed> $item Menu item.
 */
function elearnposh_amp_nav_has_nested_groups( $item ) {
	if ( empty( $item['children'] ) || ! is_array( $item['children'] ) ) {
		return false;
	}

	foreach ( $item['children'] as $child ) {
		if ( ! empty( $child['children'] ) ) {
			return true;
		}
	}

	return false;
}

/**
 * @param array<string, mixed> $item   Link item.
 * @param bool                 $indent Indent link styling.
 */
function elearnposh_amp_render_nav_link_li( $item, $indent = false ) {
	$path       = $item['url'] ?? '#';
	$base_class = $indent ? 'amp-menu-link amp-menu-link--indent' : 'amp-menu-link';
	$link_class = elearnposh_amp_menu_link_class( $base_class, $path );

	printf(
		'<li><a class="%1$s" href="%2$s" target="_top"%3$s>%4$s</a></li>',
		esc_attr( $link_class ),
		esc_url( elearnposh_amp_menu_url( $path ) ),
		elearnposh_amp_menu_current_attr( $path ), // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		esc_html( $item['label'] ?? '' )
	);
}

/**
 * @param array<int, array<string, mixed>> $items Flat top-level links.
 */
function elearnposh_amp_render_nav_flat_ul( $items ) {
	if ( empty( $items ) ) {
		return;
	}

	echo '<ul class="amp-mobile-nav-list" data-depth="0">';
	foreach ( $items as $item ) {
		elearnposh_amp_render_nav_link_li( $item, false );
	}
	echo '</ul>';
}

/**
 * Nested group inside Solutions (Global Courses, Important Resources).
 *
 * @param array<string, mixed> $group Group item.
 */
function elearnposh_amp_render_nav_nested_accordion_li( $group ) {
	$slug        = sanitize_title( (string) ( $group['label'] ?? 'group' ) );
	$title_class = 'menu-title ' . $slug . '-title';
	?>
	<li class="has-submenu">
		<amp-accordion animate disable-session-states id="<?php echo esc_attr( $slug ); ?>-accordion">
			<section>
				<h5 class="<?php echo esc_attr( $title_class ); ?>">
					<span class="menu-label"><?php echo esc_html( $group['label'] ?? '' ); ?></span>
					<span class="arrow-icon" aria-hidden="true"></span>
				</h5>
				<ul class="amp-mobile-nav-list" data-depth="2" data-variant="indent">
					<?php
					foreach ( (array) ( $group['children'] ?? array() ) as $child ) {
						elearnposh_amp_render_nav_link_li( $child, true );
					}
					?>
				</ul>
			</section>
		</amp-accordion>
	</li>
	<?php
}

/**
 * Solutions accordion — flat POSH links + nested Global / Important Resources groups.
 *
 * @param array<string, mixed> $item Solutions menu item.
 */
function elearnposh_amp_render_solutions_accordion( $item ) {
	$flat_links = array();
	$groups     = array();

	foreach ( (array) ( $item['children'] ?? array() ) as $child ) {
		if ( ! empty( $child['children'] ) ) {
			$groups[] = $child;
		} else {
			$flat_links[] = $child;
		}
	}
	?>
	<amp-accordion expand-single-section id="solutions-accordion" animate disable-session-states>
		<section class="has-submenu">
			<h4 class="menu-title solutions-title">
				<span class="menu-label"><?php echo esc_html( $item['label'] ?? __( 'Solutions', 'elearnposh-amp' ) ); ?></span>
				<span class="arrow-icon" aria-hidden="true"></span>
			</h4>
			<ul class="amp-mobile-nav-list" data-depth="1" data-variant="flat">
				<?php
				foreach ( $flat_links as $link ) {
					elearnposh_amp_render_nav_link_li( $link, false );
				}
				foreach ( $groups as $group ) {
					elearnposh_amp_render_nav_nested_accordion_li( $group );
				}
				?>
			</ul>
		</section>
	</amp-accordion>
	<?php
}

/**
 * Simple accordion section (Resources).
 *
 * @param array<string, mixed> $item Menu item with children.
 */
function elearnposh_amp_render_nav_simple_accordion( $item ) {
	$accordion_id = sanitize_title( (string) ( $item['label'] ?? 'menu' ) ) . '-accordion';
	$title_slug   = sanitize_title( (string) ( $item['label'] ?? 'menu' ) );
	?>
	<amp-accordion expand-single-section id="<?php echo esc_attr( $accordion_id ); ?>" animate disable-session-states>
		<section class="has-submenu">
			<h4 class="menu-title <?php echo esc_attr( $title_slug ); ?>-title">
				<span class="menu-label"><?php echo esc_html( $item['label'] ?? '' ); ?></span>
				<span class="arrow-icon" aria-hidden="true"></span>
			</h4>
			<ul class="amp-mobile-nav-list" data-depth="1" data-variant="indent">
				<?php
				foreach ( (array) ( $item['children'] ?? array() ) as $child ) {
					elearnposh_amp_render_nav_link_li( $child, true );
				}
				?>
			</ul>
		</section>
	</amp-accordion>
	<?php
}

/**
 * Render full amp-sidebar navigation from shared mobile menu tree.
 */
function elearnposh_amp_render_nav_sidebar() {
	$items       = elearnposh_amp_get_nav_items();
	$flat_buffer = array();

	foreach ( $items as $item ) {
		if ( ! empty( $item['children'] ) ) {
			if ( $flat_buffer ) {
				elearnposh_amp_render_nav_flat_ul( $flat_buffer );
				$flat_buffer = array();
			}

			if ( elearnposh_amp_nav_has_nested_groups( $item ) ) {
				elearnposh_amp_render_solutions_accordion( $item );
			} else {
				elearnposh_amp_render_nav_simple_accordion( $item );
			}
			continue;
		}

		$flat_buffer[] = $item;
	}

	if ( $flat_buffer ) {
		elearnposh_amp_render_nav_flat_ul( $flat_buffer );
	}
}

/**
 * Sidebar contact block aligned with EPSH mobile header.
 */
function elearnposh_amp_render_nav_contact() {
	$brand = elearnposh_amp_get_header_branding();
	?>
	<div class="sidebar-contact">
		<a href="mailto:<?php echo esc_attr( $brand['email'] ); ?>" class="sidebar-email"><?php echo esc_html( $brand['email'] ); ?></a>
		<?php if ( ! empty( $brand['phone'] ) ) : ?>
			<div class="sidebar-phone"><?php echo wp_kses_post( $brand['phone'] ); ?></div>
		<?php endif; ?>
		<a href="<?php echo esc_url( $brand['cta_url'] ); ?>" class="sidebar-cta" target="_top"><?php echo esc_html( $brand['cta_label'] ); ?></a>
	</div>
	<?php
}
