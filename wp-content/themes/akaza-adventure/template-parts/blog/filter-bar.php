<?php
/**
 * Blog archive — in-page search and sort toolbar.
 *
 * @package Akaza_Adventure
 *
 * @var array $args {
 *   @type string $sort Current sort key.
 * }
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$sort = isset( $args['sort'] ) ? $args['sort'] : 'newest';
?>
<div class="slf-blog-toolbar" data-slf-blog-toolbar>
	<div class="slf-blog-toolbar__inner">
		<div class="slf-blog-search">
			<label class="screen-reader-text" for="slf-blog-search-input"><?php esc_html_e( 'Search articles', 'akaza-adventure' ); ?></label>
			<svg class="slf-blog-search__icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
				<circle cx="11" cy="11" r="8"></circle>
				<path d="m21 21-4.35-4.35"></path>
			</svg>
			<input type="search" id="slf-blog-search-input" class="slf-blog-search__input" placeholder="<?php esc_attr_e( 'Search articles…', 'akaza-adventure' ); ?>" autocomplete="off">
			<button type="button" class="slf-blog-search__clear" id="slf-blog-search-clear" hidden aria-label="<?php esc_attr_e( 'Clear search', 'akaza-adventure' ); ?>">&times;</button>
		</div>

		<div class="slf-blog-controls">
			<div class="slf-blog-sort">
				<label class="screen-reader-text" for="slf-blog-sort"><?php esc_html_e( 'Sort articles', 'akaza-adventure' ); ?></label>
				<select id="slf-blog-sort" class="slf-blog-sort__select">
					<option value="newest" <?php selected( $sort, 'newest' ); ?>><?php esc_html_e( 'New to Old', 'akaza-adventure' ); ?></option>
					<option value="oldest" <?php selected( $sort, 'oldest' ); ?>><?php esc_html_e( 'Old to New', 'akaza-adventure' ); ?></option>
					<option value="a-z" <?php selected( $sort, 'a-z' ); ?>><?php esc_html_e( 'Title A → Z', 'akaza-adventure' ); ?></option>
					<option value="z-a" <?php selected( $sort, 'z-a' ); ?>><?php esc_html_e( 'Title Z → A', 'akaza-adventure' ); ?></option>
				</select>
			</div>
			<button type="button" class="slf-btn slf-btn--ghost slf-btn--sm" id="slf-blog-reset">
				<?php esc_html_e( 'Reset', 'akaza-adventure' ); ?>
			</button>
		</div>
	</div>
</div>
