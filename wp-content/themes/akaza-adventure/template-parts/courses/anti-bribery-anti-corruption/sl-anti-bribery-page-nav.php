<?php
/**
 * Anti-Bribery & Anti-Corruption — in-page section navigation.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<nav
	class="sl-anti-bribery-page-nav"
	aria-label="<?php esc_attr_e( 'On this page', 'akaza-adventure' ); ?>"
>
	<div class="sl-anti-bribery-page-nav__container">

		<span class="sl-anti-bribery-page-nav__label">
			<?php esc_html_e( 'On this page', 'akaza-adventure' ); ?>
		</span>

		<div class="sl-anti-bribery-page-nav__links" role="list">

			<a class="sl-anti-bribery-page-nav__link is-active" href="#overview" role="listitem">
				<?php esc_html_e( 'What is ABAC?', 'akaza-adventure' ); ?>
			</a>

			<a class="sl-anti-bribery-page-nav__link" href="#outcomes" role="listitem">
				<?php esc_html_e( 'Outcomes', 'akaza-adventure' ); ?>
			</a>

			<a class="sl-anti-bribery-page-nav__link" href="#course-options" role="listitem">
				<?php esc_html_e( 'UK, US & India', 'akaza-adventure' ); ?>
			</a>

			<a class="sl-anti-bribery-page-nav__link" href="#experience" role="listitem">
				<?php esc_html_e( 'Course experience', 'akaza-adventure' ); ?>
			</a>

			<a class="sl-anti-bribery-page-nav__link" href="#laws" role="listitem">
				<?php esc_html_e( 'Laws covered', 'akaza-adventure' ); ?>
			</a>

			<a class="sl-anti-bribery-page-nav__link" href="#faqs" role="listitem">
				<?php esc_html_e( 'FAQs', 'akaza-adventure' ); ?>
			</a>

		</div>

	</div>
</nav>
