<?php
/**
 * S-Bytes — Hero section.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<section class="sl-sbytes-hero" aria-labelledby="sl-sbytes-hero-title">

	<div class="container">

		<div class="sl-sbytes-hero__top">

			<?php
			if ( function_exists( 'akaza_render_hero_breadcrumbs' ) ) {
				akaza_render_hero_breadcrumbs();
			}
			?>

			<span class="sl-home-sub-heading sl-sbytes-hero__eyebrow">
				<?php esc_html_e( 'S-Bytes', 'akaza-adventure' ); ?>
			</span>

			<h1 id="sl-sbytes-hero-title">
				<?php esc_html_e( 'Information', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'Security Awareness Microlearning Series', 'akaza-adventure' ); ?></span>
			</h1>

		</div>

		<div class="sl-sbytes-hero__grid">

			<div class="sl-sbytes-hero__content">

				<h2 class="sl-hero-h2 sl-sbytes-hero__subheading">
					<?php esc_html_e( 'Bite-Sized Security Awareness That Keeps Cybersecurity Top of Mind', 'akaza-adventure' ); ?>
				</h2>

				<p class="sl-sbytes-hero__description">
					<?php esc_html_e( 'Reinforce essential security behaviours throughout the year with short, engaging and memorable microlearning designed to fit naturally into the employee workday.', 'akaza-adventure' ); ?>
				</p>

				<p class="sl-sbytes-hero__description">
					<?php esc_html_e( 'Welcome to FunFoSec, the information security awareness microlearning series from SucceedLEARN Security Behaviour & Culture Suite that redefines how your employees interact with cybersecurity. It transforms complex cybersecurity topics into quick, relatable learning experiences that help employees remember what matters and apply secure behaviours in everyday situations.', 'akaza-adventure' ); ?>
				</p>

				<p class="sl-sbytes-hero__tagline">
					<?php esc_html_e( 'Short enough to consume. Engaging enough to remember. Continuous enough to build habits.', 'akaza-adventure' ); ?>
				</p>

				<div class="sl-sbytes-hero__actions sl-hero-actions">
					<a
						href="#request-demo"
						class="sl-hero-btn sl-hero-btn-primary"
					>
						<?php esc_html_e( 'Request a Demo', 'akaza-adventure' ); ?>
					</a>
				</div>

			</div>

			<div class="sl-sbytes-hero__visual">
				<div class="sl-sbytes-hero__image-placeholder">
					<span>
						<?php esc_html_e( 'Image Placeholder', 'akaza-adventure' ); ?>
					</span>
				</div>
			</div>

		</div>

	</div>

</section>
