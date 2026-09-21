<?php
/**
 * DPDPA Compliance Training — Hero section.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section class="sl-dpdpa-hero" aria-labelledby="sl-dpdpa-hero-title">
	<div class="container">
		<div class="sl-dpdpa-hero__grid">
			<div class="sl-dpdpa-hero__copy">
				<?php
				if ( function_exists( 'akaza_render_hero_breadcrumbs' ) ) {
					akaza_render_hero_breadcrumbs();
				}
				?>

				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'DPDPA compliance training for employees', 'akaza-adventure' ); ?>
				</span>

				<h1 id="sl-dpdpa-hero-title">
					<?php esc_html_e( 'Every employee touches personal data. Almost none were ever taught how to handle it.', 'akaza-adventure' ); ?>
				</h1>

				<p class="sl-dpdpa-hero__lede">
					<?php esc_html_e( 'A 25-minute DPDPA course that teaches your workforce to handle personal data correctly, and gives you proof that they did.', 'akaza-adventure' ); ?>
				</p>

				<div class="sl-dpdpa-actions sl-hero-actions">
					<a class="sl-hero-btn sl-hero-btn-primary" href="#contact">
						<?php esc_html_e( 'Request a demo', 'akaza-adventure' ); ?>
					</a>
					<a class="sl-hero-btn sl-hero-btn-secondary" href="<?php echo esc_url( home_url( '/dpdpa-readiness-scorecard' ) ); ?>">
						<?php esc_html_e( 'Take the Readiness Scorecard', 'akaza-adventure' ); ?>
					</a>
				</div>

				<p class="sl-dpdpa-hero__fine">
					<?php esc_html_e( 'No obligation. Most demos take 20 minutes.', 'akaza-adventure' ); ?>
				</p>

				<p class="sl-dpdpa-hero__trust">
					<strong>900+</strong>
					<?php esc_html_e( 'organisations train with SucceedLearn', 'akaza-adventure' ); ?>
				</p>
			</div>

			<div class="sl-dpdpa-workday" aria-labelledby="dpdpaWdTitle">
				<div class="sl-dpdpa-workday__top">
					<span class="sl-dpdpa-workday__label" id="dpdpaWdTitle">
						<span class="sl-dpdpa-workday__live" aria-hidden="true"></span>
						<?php esc_html_e( 'One working day, 1,000 employees', 'akaza-adventure' ); ?>
					</span>
					<span class="sl-dpdpa-workday__clock" id="dpdpaWdClock">09:00</span>
				</div>

				<div class="sl-dpdpa-workday__grid" id="dpdpaWdGrid" aria-hidden="true"></div>

				<div class="sl-dpdpa-workday__count">
					<span class="sl-dpdpa-workday__num" id="dpdpaWdNum">0</span>
					<span class="sl-dpdpa-workday__sub">
						<?php esc_html_e( 'moments today when someone touched personal data', 'akaza-adventure' ); ?>
					</span>
				</div>

				<div class="sl-dpdpa-workday__math">
					<div class="sl-dpdpa-workday__m">
						<span class="k">1,000</span>
						<span class="l"><?php esc_html_e( 'employees', 'akaza-adventure' ); ?></span>
					</div>
					<div class="sl-dpdpa-workday__m">
						<span class="k">&times; 12</span>
						<span class="l"><?php esc_html_e( 'data moments each, on an ordinary day', 'akaza-adventure' ); ?></span>
					</div>
					<div class="sl-dpdpa-workday__m">
						<span class="k">&times; 250</span>
						<span class="l"><?php esc_html_e( 'working days a year', 'akaza-adventure' ); ?></span>
					</div>
				</div>

				<div class="sl-dpdpa-workday__foot">
					<span class="sq" aria-hidden="true"></span>
					<?php esc_html_e( 'Every one of them is a chance to get it right, or wrong.', 'akaza-adventure' ); ?>
				</div>
			</div>
		</div>
	</div>
</section>
