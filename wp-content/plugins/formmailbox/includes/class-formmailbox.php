<?php
/**
 * Core plugin coordinator.
 *
 * @package FormMailbox
 */

defined( 'ABSPATH' ) || exit;

require_once FORMMAILBOX_PATH . 'admin/class-formmailbox-admin.php';
require_once FORMMAILBOX_PATH . 'includes/class-formmailbox-repository.php';
require_once FORMMAILBOX_PATH . 'includes/class-formmailbox-templates.php';
require_once FORMMAILBOX_PATH . 'public/class-formmailbox-renderer.php';

/**
 * Registers shared plugin functionality.
 */
final class FormMailbox {

	/**
	 * Registers plugin hooks.
	 *
	 * @return void
	 */
	public function run() {
		$repository = new FormMailbox_Repository();
		$renderer   = new FormMailbox_Renderer( $repository );
		$renderer->register_hooks();

		if ( is_admin() ) {
			$admin = new FormMailbox_Admin( $repository );
			$admin->register_hooks();
		}
	}
}
