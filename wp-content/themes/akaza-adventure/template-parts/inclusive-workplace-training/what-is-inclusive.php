<?php
/**
 * Inclusive Workplace Training — What does an inclusive workplace look like in practice?
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$inclusive_checklist = array(
	__( 'People are treated fairly and respectfully', 'akaza-adventure' ),
	__( 'Decisions are based on relevant information rather than assumptions', 'akaza-adventure' ),
	__( 'Employees understand how discrimination may occur', 'akaza-adventure' ),
	__( 'Different perspectives are considered', 'akaza-adventure' ),
	__( 'Inappropriate conduct is recognised', 'akaza-adventure' ),
	__( 'Employees know how to raise concerns', 'akaza-adventure' ),
	__( 'Witnesses understand the options available to them', 'akaza-adventure' ),
	__( 'Organisational expectations are reflected in everyday behaviour', 'akaza-adventure' ),
);

$dashboard_metrics = array(
	array(
		'icon'  => 'bi-person-check',
		'title' => __( 'Fair Treatment', 'akaza-adventure' ),
		'meta'  => __( 'Respect in everyday decisions', 'akaza-adventure' ),
		'value' => 88,
	),
	array(
		'icon'  => 'bi-eye',
		'title' => __( 'Bias Awareness', 'akaza-adventure' ),
		'meta'  => __( 'Evidence over assumptions', 'akaza-adventure' ),
		'value' => 76,
	),
	array(
		'icon'  => 'bi-chat-square-text',
		'title' => __( 'Raise Concerns', 'akaza-adventure' ),
		'meta'  => __( 'Clear reporting pathways', 'akaza-adventure' ),
		'value' => 82,
	),
	array(
		'icon'  => 'bi-people-fill',
		'title' => __( 'Shared Expectations', 'akaza-adventure' ),
		'meta'  => __( 'Behaviour that matches policy', 'akaza-adventure' ),
		'value' => 91,
	),
);
?>
<section class="sl-inclusive-what-is" id="inclusive-workplace-what-is">

	<div class="container-xl">

		<div class="sl-inclusive-what-is__inner">

			<div class="sl-inclusive-what-is__content">

				<span class="sl-inclusive-what-is__eyebrow">
					<?php esc_html_e( 'Inclusion in Practice', 'akaza-adventure' ); ?>
				</span>

				<h2><?php esc_html_e( 'What does an inclusive workplace look like in practice?', 'akaza-adventure' ); ?></h2>

				<p>
					<?php esc_html_e( 'An inclusive workplace is not one in which everyone thinks, communicates or works in the same way.', 'akaza-adventure' ); ?>
				</p>

				<p>
					<?php esc_html_e( 'It is one in which people can bring different identities, experiences and perspectives to work without those differences becoming barriers to dignity, participation or opportunity.', 'akaza-adventure' ); ?>
				</p>

			</div>

			<!-- Two columns: key points | dashboard -->
			<div class="sl-inclusive-what-is__split">

				<div class="sl-inclusive-what-is__points">
					<h3 class="sl-inclusive-what-is__list-intro">
						<?php esc_html_e( 'An inclusive workplace is where:', 'akaza-adventure' ); ?>
					</h3>

					<ul class="sl-inclusive-what-is__checklist" role="list">
						<?php foreach ( $inclusive_checklist as $item ) : ?>
							<li>
								<span class="sl-inclusive-what-is__check-icon" aria-hidden="true">
									<i class="bi bi-check2"></i>
								</span>
								<span><?php echo esc_html( $item ); ?></span>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>

				<div class="sl-inclusive-what-is__dashboard-wrap">

					<div class="sl-global-behaviour-visual sl-inclusive-what-is-dashboard">

						<div class="sl-global-behaviour-visual-card">

						<div class="sl-global-behaviour-visual-top">
							<span class="sl-global-behaviour-dot"></span>
							<span class="sl-global-behaviour-dot"></span>
							<span class="sl-global-behaviour-dot"></span>
							<span class="sl-global-behaviour-visual-top-title">
								<?php esc_html_e( 'Live Snapshot', 'akaza-adventure' ); ?>
							</span>
						</div>

							<div class="sl-global-behaviour-visual-body">

								<div class="sl-global-behaviour-dashboard-head">
									<div class="sl-global-behaviour-visual-icon" aria-hidden="true">
										<i class="bi bi-building-check"></i>
									</div>
									<div>
										<p class="sl-global-behaviour-dashboard-label">
											<?php esc_html_e( 'Inclusive Workplace', 'akaza-adventure' ); ?>
										</p>
										<h3 class="sl-global-behaviour-dashboard-title">
											<?php esc_html_e( 'Inclusion in Practice Snapshot', 'akaza-adventure' ); ?>
										</h3>
									</div>
								</div>

								<div class="sl-global-behaviour-progress">
									<div class="sl-global-behaviour-progress__meta">
										<span><?php esc_html_e( 'Overall readiness', 'akaza-adventure' ); ?></span>
										<strong>84%</strong>
									</div>
									<div
										class="sl-global-behaviour-progress__bar"
										role="progressbar"
										aria-valuemin="0"
										aria-valuemax="100"
										aria-valuenow="84"
										aria-label="<?php esc_attr_e( 'Overall readiness', 'akaza-adventure' ); ?>"
									>
										<span style="width: 84%;"></span>
									</div>
									<p class="sl-global-behaviour-progress__note">
										<?php esc_html_e( 'Placeholder metrics — final content coming soon', 'akaza-adventure' ); ?>
									</p>
								</div>

								<div class="sl-global-behaviour-visual-items">
									<?php foreach ( $dashboard_metrics as $metric ) :
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

					</div>

				</div>

			</div>

			<div class="sl-inclusive-what-is__footer">
				<p class="sl-inclusive-what-is__closing">
					<?php esc_html_e( 'Creating that environment takes more than awareness. Employees need relevant knowledge, practical guidance and opportunities to think about how they would respond in realistic situations.', 'akaza-adventure' ); ?>
				</p>

				<p class="sl-inclusive-what-is__cta-line">
					<?php esc_html_e( 'That is where effective workplace inclusion training can help.', 'akaza-adventure' ); ?>
				</p>
			</div>

		</div>

	</div>

</section>
