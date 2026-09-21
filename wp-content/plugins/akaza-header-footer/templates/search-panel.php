<?php
/**
 * Desktop search panel markup (Solutions-sized dropdown).
 *
 * @package Akaza_Header_Footer
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div
	id="epsh-search-panel"
	class="epsh-search-panel"
	role="dialog"
	aria-modal="false"
	aria-label="<?php esc_attr_e( 'Site search', 'akaza-header-footer' ); ?>"
	hidden
	style="display:none"
>
	<div class="epsh-search-panel__inner">
		<div class="epsh-search-panel__head">
			<p class="epsh-search-panel__heading"><?php esc_html_e( 'Search', 'akaza-header-footer' ); ?></p>
			<button type="button" class="epsh-search-panel__close" aria-label="<?php esc_attr_e( 'Close search', 'akaza-header-footer' ); ?>">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>

		<form class="epsh-search-panel__form" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get" role="search">
			<label class="screen-reader-text" for="epsh-search-input"><?php esc_html_e( 'Search SucceedLEARN', 'akaza-header-footer' ); ?></label>
			<div class="epsh-search-panel__field">
				<svg class="epsh-search-panel__field-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" aria-hidden="true" focusable="false">
					<circle cx="11" cy="11" r="6.5" stroke="currentColor" stroke-width="1.75"></circle>
					<path d="M16.5 16.5L21 21" stroke="currentColor" stroke-width="1.75" stroke-linecap="round"></path>
				</svg>
				<input
					type="search"
					id="epsh-search-input"
					class="epsh-search-panel__input"
					name="s"
					placeholder="<?php esc_attr_e( 'Search courses, solutions, and more…', 'akaza-header-footer' ); ?>"
					autocomplete="off"
					autocapitalize="off"
					spellcheck="false"
				>
			</div>
			<button type="submit" class="epsh-search-panel__submit"><?php esc_html_e( 'Search', 'akaza-header-footer' ); ?></button>
		</form>

		<div class="epsh-search-panel__status" id="epsh-search-status" aria-live="polite"></div>
		<div class="epsh-search-panel__results" id="epsh-search-results" role="listbox" aria-label="<?php esc_attr_e( 'Search suggestions', 'akaza-header-footer' ); ?>"></div>
		<div class="epsh-search-panel__footer" id="epsh-search-footer" hidden>
			<a class="epsh-search-panel__view-all" id="epsh-search-view-all" href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<?php esc_html_e( 'View all results', 'akaza-header-footer' ); ?>
				<span aria-hidden="true">→</span>
			</a>
		</div>
	</div>
</div>
<div id="epsh-search-backdrop" class="epsh-search-backdrop" hidden style="display:none"></div>
