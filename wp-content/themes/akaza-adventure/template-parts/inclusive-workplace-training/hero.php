<?php
/**
 * Inclusive Workplace Training — Hero section.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section class="sl-global-hero" id="inclusive-workplace-training-hero">

	<div class="container">

		<div class="row sl-global-hero-row align-items-stretch">

			<div class="col-lg-6">

				<?php
				if ( function_exists( 'akaza_render_hero_breadcrumbs' ) ) {
					akaza_render_hero_breadcrumbs();
				}
				?>

				<div class="sl-global-hero-content">

					<span class="sl-global-hero-eyebrow">
						<?php esc_html_e( 'Global Workplace Compliance Training for Employees', 'akaza-adventure' ); ?>
					</span>

					<h1>
						<?php esc_html_e( 'Inclusive Workplace Training', 'akaza-adventure' ); ?>
					</h1>

					<h2>
						<?php esc_html_e( 'Make inclusion visible in the moments that matter', 'akaza-adventure' ); ?>
					</h2>

					<p>
						<?php esc_html_e( 'A policy can define your organisation’s values. Everyday behaviour determines whether employees experience them.', 'akaza-adventure' ); ?>
					</p>

					<p>
						<?php esc_html_e( 'It happens in the candidate who is assessed on assumptions rather than evidence. The colleague whose idea is overlooked until someone else repeats it. The employee who witnesses inappropriate conduct but does not know whether—or how—to intervene. The person who is treated differently because of their identity, circumstances or perceived characteristics.', 'akaza-adventure' ); ?>
					</p>

					<p>
						<?php esc_html_e( 'These moments can shape whether people feel respected, heard and able to contribute.', 'akaza-adventure' ); ?>
					</p>

					<div class="sl-global-hero-buttons sl-hero-actions">

						<a href="#contact" class="sl-hero-btn sl-hero-btn-primary">
							<?php esc_html_e( 'Book a Demo', 'akaza-adventure' ); ?>
						</a>

						<a href="<?php echo esc_url( home_url( '/hr-compliance-suite/' ) ); ?>" class="sl-hero-btn sl-hero-btn-secondary">
							<?php esc_html_e( 'View HR Compliance Suite', 'akaza-adventure' ); ?>
						</a>

					</div>

				</div>

			</div>

			<div class="col-lg-6">

				<div class="sl-global-behaviour-visual sl-inclusive-hero-dashboard">

					<div class="sl-global-behaviour-visual-card">

						<div class="sl-global-behaviour-visual-top">
							<span class="sl-global-behaviour-dot"></span>
							<span class="sl-global-behaviour-dot"></span>
							<span class="sl-global-behaviour-dot"></span>
							<span class="sl-global-behaviour-visual-top-title">
								<?php esc_html_e( 'Learning Dashboard', 'akaza-adventure' ); ?>
							</span>
						</div>

						<div class="sl-global-behaviour-visual-body">

							<div class="sl-global-behaviour-dashboard-head">
								<div class="sl-global-behaviour-visual-icon" aria-hidden="true">
									<i class="bi bi-people-fill"></i>
								</div>

								<div>
									<p class="sl-global-behaviour-dashboard-label">
										<?php esc_html_e( 'Inclusive Workplace', 'akaza-adventure' ); ?>
									</p>
									<h3 class="sl-global-behaviour-dashboard-title">
										<?php esc_html_e( 'Inclusion Progress Snapshot', 'akaza-adventure' ); ?>
									</h3>
								</div>
							</div>

							<div class="sl-global-behaviour-progress">
								<div class="sl-global-behaviour-progress__meta">
									<span><?php esc_html_e( 'Overall completion', 'akaza-adventure' ); ?></span>
									<strong>87%</strong>
								</div>
								<div
									class="sl-global-behaviour-progress__bar"
									role="progressbar"
									aria-valuemin="0"
									aria-valuemax="100"
									aria-valuenow="87"
									aria-label="<?php esc_attr_e( 'Overall completion', 'akaza-adventure' ); ?>"
								>
									<span style="width: 87%;"></span>
								</div>
								<p class="sl-global-behaviour-progress__note">
									<?php esc_html_e( 'Placeholder metrics — final content coming soon', 'akaza-adventure' ); ?>
								</p>
							</div>

							<div class="sl-global-behaviour-visual-items">

								<?php
								$hero_metrics = array(
									array(
										'icon'  => 'bi-eye',
										'title' => __( 'Unconscious Bias Awareness', 'akaza-adventure' ),
										'meta'  => __( 'Evidence over assumptions', 'akaza-adventure' ),
										'value' => 82,
									),
									array(
										'icon'  => 'bi-chat-square-text',
										'title' => __( 'Inclusive Communication', 'akaza-adventure' ),
										'meta'  => __( 'Ideas heard the first time', 'akaza-adventure' ),
										'value' => 74,
									),
									array(
										'icon'  => 'bi-shield-check',
										'title' => __( 'Bystander Intervention', 'akaza-adventure' ),
										'meta'  => __( 'Know when and how to act', 'akaza-adventure' ),
										'value' => 70,
									),
									array(
										'icon'  => 'bi-heart',
										'title' => __( 'Respect & Belonging', 'akaza-adventure' ),
										'meta'  => __( 'Everyday behaviour in practice', 'akaza-adventure' ),
										'value' => 91,
									),
								);

								foreach ( $hero_metrics as $metric ) :
									$value = (int) $metric['value'];
									?>
									<div class="sl-global-behaviour-visual-item sl-inclusive-hero-metric">
										<span class="sl-global-behaviour-visual-item__icon" aria-hidden="true">
											<i class="bi <?php echo esc_attr( $metric['icon'] ); ?>"></i>
										</span>
										<div class="sl-global-behaviour-visual-item__content">
											<strong><?php echo esc_html( $metric['title'] ); ?></strong>
											<small><?php echo esc_html( $metric['meta'] ); ?></small>
											<div
												class="sl-inclusive-hero-metric__bar"
												role="progressbar"
												aria-valuemin="0"
												aria-valuemax="100"
												aria-valuenow="<?php echo esc_attr( (string) $value ); ?>"
												aria-label="<?php echo esc_attr( $metric['title'] ); ?>"
											>
												<span style="width: <?php echo esc_attr( (string) $value ); ?>%;"></span>
											</div>
										</div>
										<span class="sl-global-behaviour-visual-item__status sl-inclusive-hero-metric__value">
											<?php echo esc_html( (string) $value . '%' ); ?>
										</span>
									</div>
								<?php endforeach; ?>

							</div>

						</div>

					</div>

					<div class="sl-global-behaviour-floating-card">

						<span class="sl-global-behaviour-floating-icon" aria-hidden="true">
							<i class="bi bi-graph-up-arrow"></i>
						</span>

						<div>
							<strong><?php esc_html_e( 'Inclusion', 'akaza-adventure' ); ?></strong>
							<small><?php esc_html_e( 'Moments that matter', 'akaza-adventure' ); ?></small>
						</div>

					</div>

				</div>

			</div>

		</div>

	</div>

</section>
