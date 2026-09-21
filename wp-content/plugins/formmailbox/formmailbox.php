<?php
/**
 * Plugin Name:       FormMailbox
 * Description:       Create contact forms, securely store entries, and monitor email notification attempts.
 * Version:           0.1.0
 * Requires at least: 6.5
 * Requires PHP:      7.4
 * Author:            Depakar B
 * Author URI:        https://depakar418.github.io/portfolio/
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       formmailbox
 * Domain Path:       /languages
 *
 * @package FormMailbox
 */

defined( 'ABSPATH' ) || exit;

define( 'FORMMAILBOX_VERSION', '0.1.0' );
define( 'FORMMAILBOX_FILE', __FILE__ );
define( 'FORMMAILBOX_PATH', plugin_dir_path( __FILE__ ) );
define( 'FORMMAILBOX_URL', plugin_dir_url( __FILE__ ) );

require_once FORMMAILBOX_PATH . 'includes/class-formmailbox-activator.php';
require_once FORMMAILBOX_PATH . 'includes/class-formmailbox.php';

register_activation_hook( __FILE__, array( 'FormMailbox_Activator', 'activate' ) );

/**
 * Starts FormMailbox after WordPress has loaded active plugins.
 *
 * @return void
 */
function formmailbox_run() {
	$plugin = new FormMailbox();
	$plugin->run();
}

add_action( 'plugins_loaded', 'formmailbox_run' );
