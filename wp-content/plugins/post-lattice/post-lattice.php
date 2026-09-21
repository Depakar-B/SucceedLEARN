<?php
/**
 * Plugin Name:       Post Lattice
 * Description:       Sell-ready filterable grid for blog posts, newsletters, and other post types. Search, sort, category or year filters, load more, and full admin control over text, layout, and colors.
 * Version:           1.0.0
 * Requires at least: 6.0
 * Requires PHP:      7.4
 * Author:            Depakar
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       post-lattice
 * Domain Path:       /languages
 *
 * @package Post_Lattice
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'PLT_VERSION', '1.0.0' );
define( 'PLT_FILE', __FILE__ );
define( 'PLT_DIR', plugin_dir_path( __FILE__ ) );
define( 'PLT_URL', plugin_dir_url( __FILE__ ) );
define( 'PLT_BASENAME', plugin_basename( __FILE__ ) );

require_once PLT_DIR . 'includes/class-defaults.php';
require_once PLT_DIR . 'includes/class-options.php';
require_once PLT_DIR . 'includes/class-features.php';
require_once PLT_DIR . 'includes/class-profiles.php';
require_once PLT_DIR . 'includes/class-query.php';
require_once PLT_DIR . 'includes/class-renderer.php';
require_once PLT_DIR . 'includes/class-assets.php';
require_once PLT_DIR . 'includes/class-shortcode.php';
require_once PLT_DIR . 'includes/class-block.php';
require_once PLT_DIR . 'includes/class-settings.php';
require_once PLT_DIR . 'includes/class-plugin.php';

/**
 * Plugin bootstrap.
 *
 * @return Post_Lattice_Plugin
 */
function post_lattice_plugin() {
	return Post_Lattice_Plugin::instance();
}

post_lattice_plugin();

register_activation_hook(
	__FILE__,
	array( 'Post_Lattice_Plugin', 'activate' )
);
