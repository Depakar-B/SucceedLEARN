<?php
/**
 * Search and sort toolbar.
 *
 * @package Post_Lattice
 *
 * @var array $post_lattice_args {
 *   @type string $uid
 *   @type array  $config
 * }
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$post_lattice_uid    = isset( $post_lattice_args['uid'] ) ? $post_lattice_args['uid'] : 'plt';
$post_lattice_config = isset( $post_lattice_args['config'] ) ? $post_lattice_args['config'] : array();
$post_lattice_sort   = isset( $post_lattice_config['default_sort'] ) ? $post_lattice_config['default_sort'] : 'newest';
?>
<div class="plt-toolbar" data-plt-toolbar>
	<div class="plt-toolbar__inner">
		<?php if ( ! empty( $post_lattice_config['show_search'] ) ) : ?>
			<div class="plt-search">
				<label class="screen-reader-text" for="<?php echo esc_attr( $post_lattice_uid ); ?>-search">
					<?php echo esc_html( $post_lattice_config['search_label'] ); ?>
				</label>
				<svg class="plt-search__icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
					<circle cx="11" cy="11" r="8"></circle>
					<path d="m21 21-4.35-4.35"></path>
				</svg>
				<input
					type="search"
					id="<?php echo esc_attr( $post_lattice_uid ); ?>-search"
					class="plt-search__input"
					data-plt-search
					placeholder="<?php echo esc_attr( $post_lattice_config['search_placeholder'] ); ?>"
					autocomplete="off">
				<button
					type="button"
					class="plt-search__clear"
					data-plt-search-clear
					hidden
					aria-label="<?php echo esc_attr( $post_lattice_config['clear_search_label'] ); ?>">&times;</button>
			</div>
		<?php endif; ?>

		<?php if ( ! empty( $post_lattice_config['show_sort'] ) || ! empty( $post_lattice_config['show_reset'] ) ) : ?>
			<div class="plt-controls">
				<?php if ( ! empty( $post_lattice_config['show_sort'] ) ) : ?>
					<div class="plt-sort">
						<label class="screen-reader-text" for="<?php echo esc_attr( $post_lattice_uid ); ?>-sort">
							<?php echo esc_html( $post_lattice_config['sort_label'] ); ?>
						</label>
						<select id="<?php echo esc_attr( $post_lattice_uid ); ?>-sort" class="plt-sort__select" data-plt-sort>
							<option value="newest" <?php selected( $post_lattice_sort, 'newest' ); ?>><?php echo esc_html( $post_lattice_config['sort_newest'] ); ?></option>
							<option value="oldest" <?php selected( $post_lattice_sort, 'oldest' ); ?>><?php echo esc_html( $post_lattice_config['sort_oldest'] ); ?></option>
							<option value="a-z" <?php selected( $post_lattice_sort, 'a-z' ); ?>><?php echo esc_html( $post_lattice_config['sort_az'] ); ?></option>
							<option value="z-a" <?php selected( $post_lattice_sort, 'z-a' ); ?>><?php echo esc_html( $post_lattice_config['sort_za'] ); ?></option>
						</select>
					</div>
				<?php endif; ?>

				<?php if ( ! empty( $post_lattice_config['show_reset'] ) ) : ?>
					<button type="button" class="plt-btn plt-btn--ghost plt-btn--sm" data-plt-reset>
						<?php echo esc_html( $post_lattice_config['reset_text'] ); ?>
					</button>
				<?php endif; ?>
			</div>
		<?php endif; ?>

		<?php if ( ! empty( $post_lattice_config['show_view_toggle'] ) ) : ?>
			<div class="plt-view-toggle" role="group" aria-label="<?php esc_attr_e( 'Choose layout view', 'post-lattice' ); ?>">
				<button type="button" class="plt-view-toggle__btn is-active" data-plt-view="grid">
					<?php esc_html_e( 'Grid', 'post-lattice' ); ?>
				</button>
				<button type="button" class="plt-view-toggle__btn" data-plt-view="list">
					<?php esc_html_e( 'List', 'post-lattice' ); ?>
				</button>
			</div>
		<?php endif; ?>
	</div>
</div>
