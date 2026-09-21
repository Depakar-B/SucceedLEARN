<?php
/**
 * Course archive — fixed filter top bar (sits below site header).
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
<div class="slf-courses-frame__top" data-slf-courses-top>
	<div class="slf-courses-frame__top-container">
		<div class="slf-courses-frame__top-inner">
			<div class="slf-courses-search">
				<label class="screen-reader-text" for="slf-courses-search-input"><?php esc_html_e( 'Search courses', 'akaza-adventure' ); ?></label>
				<svg class="slf-courses-search__icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
					<circle cx="11" cy="11" r="8"></circle>
					<path d="m21 21-4.35-4.35"></path>
				</svg>
				<input type="search" id="slf-courses-search-input" class="slf-courses-search__input" placeholder="<?php esc_attr_e( 'Search courses…', 'akaza-adventure' ); ?>" autocomplete="off">
				<button type="button" class="slf-courses-search__clear" id="slf-courses-search-clear" hidden aria-label="<?php esc_attr_e( 'Clear search', 'akaza-adventure' ); ?>">&times;</button>
			</div>

			<div class="slf-courses-controls">
				<button type="button" class="slf-courses-cat-toggle" data-slf-courses-cat-toggle aria-expanded="false" aria-controls="slf-courses-frame-side">
					<?php esc_html_e( 'Categories', 'akaza-adventure' ); ?>
				</button>
				<div class="slf-courses-sort">
					<label class="screen-reader-text" for="slf-courses-sort"><?php esc_html_e( 'Sort courses', 'akaza-adventure' ); ?></label>
					<select id="slf-courses-sort" class="slf-courses-sort__select">
						<option value="newest" <?php selected( $sort, 'newest' ); ?>><?php esc_html_e( 'Newest First', 'akaza-adventure' ); ?></option>
						<option value="oldest" <?php selected( $sort, 'oldest' ); ?>><?php esc_html_e( 'Oldest First', 'akaza-adventure' ); ?></option>
						<option value="a-z" <?php selected( $sort, 'a-z' ); ?>><?php esc_html_e( 'A to Z', 'akaza-adventure' ); ?></option>
						<option value="z-a" <?php selected( $sort, 'z-a' ); ?>><?php esc_html_e( 'Z to A', 'akaza-adventure' ); ?></option>
					</select>
				</div>
				<button type="button" class="slf-btn slf-btn--ghost slf-btn--sm" id="slf-courses-reset">
					<?php esc_html_e( 'Reset', 'akaza-adventure' ); ?>
				</button>
			</div>
		</div>
	</div>
</div>
