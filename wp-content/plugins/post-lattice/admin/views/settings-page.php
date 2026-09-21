<?php
/**
 * Settings page markup.
 *
 * @package Post_Lattice
 *
 * @var array      $post_lattice_tabs        Tab schema.
 * @var string     $post_lattice_active_tab  Active admin tab.
 * @var array      $post_lattice_profiles    Profile rows.
 * @var array|null $post_lattice_editing     Currently edited profile.
 * @var string     $post_lattice_edit_tab    Active edit tab.
 * @var bool       $post_lattice_is_pro      Whether Pro is active.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! isset( $post_lattice_tabs[ $post_lattice_active_tab ] ) ) {
	$post_lattice_active_tab = 'profiles';
}
$post_lattice_edit_tabs = array( 'layout', 'text', 'style' );
if ( ! in_array( $post_lattice_edit_tab, $post_lattice_edit_tabs, true ) ) {
	$post_lattice_edit_tab = 'layout';
}
?>
<div class="wrap plt-settings">
	<h1><?php esc_html_e( 'Post Lattice', 'post-lattice' ); ?></h1>
	<?php
	$post_lattice_notice = isset( $_GET['plt_notice'] ) ? sanitize_key( (string) wp_unslash( $_GET['plt_notice'] ) ) : ''; // phpcs:ignore WordPress.Security.NonceVerification.Recommended -- Read-only admin notice flag.
	if ( 'shortcode_limit' === $post_lattice_notice ) :
		?>
		<div class="notice notice-warning is-dismissible">
			<p><?php esc_html_e( 'Free version allows one custom shortcode plus Default. Upgrade to Pro for unlimited shortcodes.', 'post-lattice' ); ?></p>
		</div>
	<?php endif; ?>
	<p class="plt-settings__intro">
		<?php esc_html_e( 'Create shortcode sections, then edit each section with its own full layout, filters, text, and colors.', 'post-lattice' ); ?>
	</p>
	<?php if ( is_array( $post_lattice_editing ) ) : ?>
		<div class="plt-help">
			<p>
				<a class="button" href="<?php echo esc_url( admin_url( 'admin.php?page=post-lattice&tab=profiles' ) ); ?>">
					<?php esc_html_e( 'Back to shortcode list', 'post-lattice' ); ?>
				</a>
			</p>
			<h3><?php
			/* translators: %s: shortcode profile name */
			echo esc_html( sprintf( __( 'Edit: %s', 'post-lattice' ), $post_lattice_editing['name'] ) );
			?></h3>
			<h2 class="nav-tab-wrapper" style="margin-bottom:12px;">
				<?php foreach ( $post_lattice_edit_tabs as $post_lattice_one_edit_tab ) : ?>
					<a class="nav-tab <?php echo $post_lattice_edit_tab === $post_lattice_one_edit_tab ? 'nav-tab-active' : ''; ?>"
						href="<?php echo esc_url( admin_url( 'admin.php?page=post-lattice&tab=profiles&edit_profile=' . rawurlencode( $post_lattice_editing['slug'] ) . '&edit_tab=' . rawurlencode( $post_lattice_one_edit_tab ) ) ); ?>">
						<?php echo esc_html( $post_lattice_tabs[ $post_lattice_one_edit_tab ]['label'] ); ?>
					</a>
				<?php endforeach; ?>
			</h2>
			<form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" class="plt-settings__form">
				<?php wp_nonce_field( 'plt_profile_actions' ); ?>
				<input type="hidden" name="action" value="plt_save_profile">
				<input type="hidden" name="profile[slug]" value="<?php echo esc_attr( $post_lattice_editing['slug'] ); ?>">
				<input type="hidden" name="edit_tab" value="<?php echo esc_attr( $post_lattice_edit_tab ); ?>">
				<table class="form-table">
					<tr>
						<th><label for="plt-edit-name"><?php esc_html_e( 'Name', 'post-lattice' ); ?></label></th>
						<td><input id="plt-edit-name" class="regular-text" type="text" name="profile[name]" value="<?php echo esc_attr( $post_lattice_editing['name'] ); ?>" required></td>
					</tr>
				</table>
				<?php foreach ( $post_lattice_tabs[ $post_lattice_edit_tab ]['sections'] as $post_lattice_section ) : ?>
					<div class="plt-section">
						<h2><?php echo esc_html( $post_lattice_section['title'] ); ?></h2>
						<table class="form-table">
							<?php foreach ( $post_lattice_section['fields'] as $post_lattice_field ) : ?>
								<?php $post_lattice_row_locked = ! $post_lattice_is_pro && ! empty( $post_lattice_field['pro'] ); ?>
								<tr<?php echo $post_lattice_row_locked ? ' class="plt-field-pro-locked"' : ''; ?>>
									<?php if ( 'checkbox' === $post_lattice_field['type'] ) : ?>
										<th></th>
										<td><?php Post_Lattice_Settings::render_field( $post_lattice_field, $post_lattice_editing, 'profile_config' ); ?></td>
									<?php else : ?>
										<th><label for="<?php echo esc_attr( $post_lattice_field['id'] ); ?>"><?php echo esc_html( $post_lattice_field['label'] ); ?></label></th>
										<td><?php Post_Lattice_Settings::render_field( $post_lattice_field, $post_lattice_editing, 'profile_config' ); ?></td>
									<?php endif; ?>
								</tr>
							<?php endforeach; ?>
						</table>
					</div>
				<?php endforeach; ?>
				<?php submit_button( __( 'Save shortcode settings', 'post-lattice' ) ); ?>
			</form>
		</div>
	<?php else : ?>
		<div class="plt-help">
			<h2><?php esc_html_e( 'Shortcodes', 'post-lattice' ); ?></h2>
			<table class="widefat striped plt-help__table">
				<thead>
					<tr>
						<th><?php esc_html_e( 'Name', 'post-lattice' ); ?></th>
						<th><?php esc_html_e( 'Shortcode', 'post-lattice' ); ?></th>
						<th><?php esc_html_e( 'Post types', 'post-lattice' ); ?></th>
						<th><?php esc_html_e( 'Actions', 'post-lattice' ); ?></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ( $post_lattice_profiles as $post_lattice_profile ) : ?>
						<tr>
							<td><strong><?php echo esc_html( $post_lattice_profile['name'] ); ?></strong><br><code><?php echo esc_html( $post_lattice_profile['slug'] ); ?></code></td>
							<td><code><?php echo esc_html( Post_Lattice_Profiles::shortcode_for_profile( $post_lattice_profile ) ); ?></code></td>
							<td><?php echo esc_html( implode( ', ', (array) $post_lattice_profile['post_types'] ) ); ?></td>
							<td>
								<a class="button" href="<?php echo esc_url( admin_url( 'admin.php?page=post-lattice&tab=profiles&edit_profile=' . rawurlencode( $post_lattice_profile['slug'] ) ) ); ?>"><?php esc_html_e( 'Edit', 'post-lattice' ); ?></a>
								<form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" style="display:inline;">
									<?php wp_nonce_field( 'plt_profile_actions' ); ?>
									<input type="hidden" name="action" value="plt_duplicate_profile">
									<input type="hidden" name="slug" value="<?php echo esc_attr( $post_lattice_profile['slug'] ); ?>">
									<button type="submit" class="button"><?php esc_html_e( 'Duplicate', 'post-lattice' ); ?></button>
								</form>
								<?php if ( 'default' !== $post_lattice_profile['slug'] ) : ?>
									<form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" style="display:inline;">
										<?php wp_nonce_field( 'plt_profile_actions' ); ?>
										<input type="hidden" name="action" value="plt_delete_profile">
										<input type="hidden" name="slug" value="<?php echo esc_attr( $post_lattice_profile['slug'] ); ?>">
										<button type="submit" class="button button-link-delete" onclick="return confirm('<?php echo esc_js( __( 'Delete this shortcode?', 'post-lattice' ) ); ?>');"><?php esc_html_e( 'Delete', 'post-lattice' ); ?></button>
									</form>
								<?php endif; ?>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>

			<h3><?php esc_html_e( 'Add shortcode', 'post-lattice' ); ?></h3>
			<?php
			$post_lattice_custom_count = 0;
			foreach ( $post_lattice_profiles as $post_lattice_p ) {
				if ( 'default' !== $post_lattice_p['slug'] ) {
					$post_lattice_custom_count++;
				}
			}
			$post_lattice_at_free_limit = ! $post_lattice_is_pro && $post_lattice_custom_count >= 1;
			?>
			<?php if ( $post_lattice_at_free_limit ) : ?>
				<div class="plt-pro-banner">
					<strong><?php esc_html_e( 'Pro feature: unlimited shortcodes', 'post-lattice' ); ?></strong>
					<?php esc_html_e( 'Free version allows one custom shortcode in addition to Default. Upgrade to Pro to create as many as you need.', 'post-lattice' ); ?>
				</div>
			<?php endif; ?>
			<form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
				<?php wp_nonce_field( 'plt_profile_actions' ); ?>
				<input type="hidden" name="action" value="plt_save_profile">
				<table class="form-table">
					<tr>
						<th><label for="plt-profile-name"><?php esc_html_e( 'Name', 'post-lattice' ); ?></label></th>
						<td>
							<input id="plt-profile-name" class="regular-text" type="text" name="profile[name]" <?php echo $post_lattice_at_free_limit ? 'disabled' : 'required'; ?>>
							<?php if ( $post_lattice_at_free_limit ) : ?>
								<p class="description plt-pro-note"><span class="plt-pro-badge"><?php esc_html_e( 'Pro', 'post-lattice' ); ?></span> <?php esc_html_e( 'Upgrade to Pro to add more shortcodes.', 'post-lattice' ); ?></p>
							<?php endif; ?>
						</td>
					</tr>
				</table>
				<?php submit_button( __( 'Create shortcode', 'post-lattice' ), 'primary', 'submit', false, $post_lattice_at_free_limit ? array( 'disabled' => 'disabled' ) : array() ); ?>
			</form>
		</div>
	<?php endif; ?>
</div>
