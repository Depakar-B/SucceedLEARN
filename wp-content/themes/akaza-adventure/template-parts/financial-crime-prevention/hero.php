<?php
/**
 * Financial Crime Prevention — Hero section.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$hero_image = function_exists( 'akaza_upload_url' )
	? akaza_upload_url( '2026/02/Financial-Crime-Prevention-Trainings.svg' )
	: 'https://succeedlearn.com/wp-content/uploads/2026/02/Financial-Crime-Prevention-Trainings.svg';
?>
<section class="sl-fcp-hero" aria-labelledby="sl-fcp-hero-title">
	<div class="container">
		<div class="row sl-fcp-hero-row">
			<div class="col-12 col-lg-7">
				<?php
				if ( function_exists( 'akaza_render_hero_breadcrumbs' ) ) {
					akaza_render_hero_breadcrumbs();
				}
				?>

				<div class="sl-fcp-hero__content">
					<span class="sl-home-sub-heading">
						<?php esc_html_e( 'Financial crime prevention training', 'akaza-adventure' ); ?>
					</span>

					<h1 id="sl-fcp-hero-title">
						<?php esc_html_e( 'Financial Crime Prevention Training', 'akaza-adventure' ); ?>
					</h1>

					<h2 class="sl-fcp-hero__lead">
						<?php esc_html_e( 'Financial crime does not always begin with an obvious criminal act. ', 'akaza-adventure' ); ?>
					</h2>
					<p>
					<?php esc_html_e( 'It can begin with an unusual payment, an undisclosed conflict, a high-risk third party, confidential information shared carelessly or a warning sign that an employee does not recognise.', 'akaza-adventure' ); ?>		
				    </p>
					<p>
						<?php esc_html_e( 'When financial crime risks appear in everyday work, employees need to know how to recognise them, follow the right controls, escalate concerns and report them correctly.', 'akaza-adventure' ); ?>
					</p>

					<p>
						<?php esc_html_e( 'Practical Financial Crime Prevention eLearning helps organisations turn policies into decisions employees can apply in real situations.', 'akaza-adventure' ); ?>
					</p>

					<ul class="sl-fcp-hero__points">
						<li>
							<span class="sl-fcp-hero__dot" aria-hidden="true"></span>
							<span><?php esc_html_e( 'Scenario-based eLearning', 'akaza-adventure' ); ?></span>
						</li>
						<li>
							<span class="sl-fcp-hero__dot" aria-hidden="true"></span>
							<span><?php esc_html_e( 'Six core compliance areas', 'akaza-adventure' ); ?></span>
						</li>
						<li>
							<span class="sl-fcp-hero__dot" aria-hidden="true"></span>
							<span><?php esc_html_e( 'CPD-certified courses', 'akaza-adventure' ); ?></span>
						</li>
					</ul>

					<div class="sl-fcp-hero__actions sl-hero-actions">
						<a href="#contact" class="sl-hero-btn sl-hero-btn-primary" data-cta="fcp-demo">
							<?php esc_html_e( 'Request a demo', 'akaza-adventure' ); ?>
						</a>
						<a href="#contact" class="sl-hero-btn sl-hero-btn-secondary" data-cta="fcp-brochure">
							<?php esc_html_e( 'Download brochure', 'akaza-adventure' ); ?>
						</a>
					</div>
				</div>
			</div>

			<div class="col-12 col-lg-5">
				<div class="sl-fcp-hero__media">
					<img
						src="<?php echo esc_url( $hero_image ); ?>"
						alt="<?php esc_attr_e( 'Financial crime prevention training for employees', 'akaza-adventure' ); ?>"
						width="592"
						height="392"
						loading="eager"
						fetchpriority="high"
						decoding="async"
					>
				</div>
			</div>
		</div>
	</div>
</section>
