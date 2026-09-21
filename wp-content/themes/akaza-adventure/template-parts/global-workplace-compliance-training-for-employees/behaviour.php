<?php
/**
 * Global Workplace Compliance Training for Employees — More Than Compliance section.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/* Set image URL when the asset is ready. */
$behaviour_image     = '';
$behaviour_image_alt = __( 'Workplace behaviour learning', 'akaza-adventure' );
$has_behaviour_image = ( '' !== $behaviour_image );
?>
<section class="sl-global-behaviour-section">

	<div class="container">

		<div class="row align-items-center gy-5">

			<?php if ( $has_behaviour_image ) : ?>
				<div class="col-lg-5">
					<div class="sl-global-behaviour-media">
						<img
							src="<?php echo esc_url( $behaviour_image ); ?>"
							alt="<?php echo esc_attr( $behaviour_image_alt ); ?>"
							loading="lazy"
							decoding="async"
						/>
					</div>
				</div>
			<?php endif; ?>

			<div class="<?php echo $has_behaviour_image ? 'col-lg-7' : 'col-12'; ?>">

				<div class="sl-global-behaviour-content">

					<span class="sl-home-sub-heading">
						<?php esc_html_e( 'Behaviour change', 'akaza-adventure' ); ?>
					</span>

					<h2 class="sl-global-behaviour-title">
						<?php
						echo wp_kses(
							__( 'More Than Compliance. Learning That Changes <span>Workplace Behaviour</span>', 'akaza-adventure' ),
							array( 'span' => array() )
						);
						?>
					</h2>

					<ul class="sl-global-behaviour-points">

						<li class="sl-global-behaviour-point">
							<span class="sl-global-behaviour-point__icon" aria-hidden="true">
								<i class="bi bi-journal-check"></i>
							</span>
							<p class="sl-global-behaviour-point__text">
								<?php esc_html_e( 'Policies establish expectations.', 'akaza-adventure' ); ?>
							</p>
						</li>

						<li class="sl-global-behaviour-point">
							<span class="sl-global-behaviour-point__icon" aria-hidden="true">
								<i class="bi bi-people-fill"></i>
							</span>
							<p class="sl-global-behaviour-point__text">
								<?php esc_html_e( 'People shape workplace culture.', 'akaza-adventure' ); ?>
							</p>
						</li>

					</ul>

					<p class="sl-global-behaviour-description">
						<?php esc_html_e( 'Effective workplace learning goes beyond checking compliance boxes. It empowers employees to make better decisions, build stronger relationships, and contribute to workplaces where everyone feels respected, valued, and able to succeed.', 'akaza-adventure' ); ?>
					</p>

					<p class="sl-global-behaviour-description">
						<?php esc_html_e( 'SucceedLEARN combines storytelling, realistic workplace scenarios, interactive decision-making, and globally relevant content to help learners confidently apply what they’ve learned in everyday workplace situations.', 'akaza-adventure' ); ?>
					</p>

				</div>

			</div>

		</div>

	</div>

</section>
