<?php
/**
 * S-Bytes — Growing Library.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<section
	id="funfosec-library"
	class="sl-sbytes-library"
	aria-labelledby="sl-sbytes-library-title"
>
	<div class="container">

		<div class="sl-sbytes-library__content">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'FunFoSec Library', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-sbytes-library-title">
				<?php esc_html_e( 'A Growing Library for Everyday', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'Cyber Risks', 'akaza-adventure' ); ?></span>
			</h2>

			<h3 class="sl-panel-title">
				<?php esc_html_e( 'One Series. Multiple Security Topics.', 'akaza-adventure' ); ?>
			</h3>

			<div class="sl-sbytes-library__body">
				<p>
					<?php esc_html_e( 'Employees encounter cybersecurity risks in many different ways.', 'akaza-adventure' ); ?>
				</p>
				<p>
					<?php
					esc_html_e(
						'The FunFoSec library addresses a broad range of security topics through short stories and relatable scenarios designed to make individual security behaviours easier to understand.',
						'akaza-adventure'
					);
					?>
				</p>
			</div>

			<div class="sl-sbytes-library__actions sl-hero-actions">
				<a href="#funfosec-library" class="sl-hero-btn sl-hero-btn-primary">
					<?php esc_html_e( 'FunFoSec Video Library', 'akaza-adventure' ); ?>
				</a>
			</div>

			<div class="sl-sbytes-library__placeholder">
				<span><?php esc_html_e( 'FunFoSec Video Library Placeholder', 'akaza-adventure' ); ?></span>
			</div>

		</div>

	</div>
</section>
