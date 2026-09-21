<?php
/**
 * Code of Conduct — Reporting.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$reporting_items = array(
	__( 'Training assignments', 'akaza-adventure' ),
	__( 'Course completion', 'akaza-adventure' ),
	__( 'Assessment performance', 'akaza-adventure' ),
	__( 'Completion status', 'akaza-adventure' ),
	__( 'Learner progress', 'akaza-adventure' ),
	__( 'Certificates', 'akaza-adventure' ),
	__( 'Policy acknowledgement', 'akaza-adventure' ),
	__( 'Compliance reporting', 'akaza-adventure' ),
);

$reporting_image = '2026/09/Reporting-Turn-Training-Completion-scaled.webp';
?>

<section class="sl-coc-reporting" aria-labelledby="sl-coc-reporting-title">
	<div class="container">

		<div class="sl-coc-reporting__heading">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Reporting', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-coc-reporting-title">
				<?php
				echo wp_kses(
					__( 'Turn Training Completion Into <span>Compliance Visibility</span>', 'akaza-adventure' ),
					array( 'span' => array() )
				);
				?>
			</h2>

			<h3>
				<?php esc_html_e( 'Knowing that training was assigned is not enough.', 'akaza-adventure' ); ?>
			</h3>

			<p>
				<?php esc_html_e( 'Compliance, HR and L&D teams need visibility into programme participation and learning outcomes. Depending on deployment configuration, SucceedLEARN reporting can help organizations monitor:', 'akaza-adventure' ); ?>
			</p>

		</div>

		<div class="sl-coc-reporting__layout">

			<div class="sl-coc-reporting__media">
				<img
					src="<?php echo esc_url( akaza_upload_url( $reporting_image ) ); ?>"
					alt="<?php esc_attr_e( 'Course completion reports dashboard showing training completion and compliance visibility', 'akaza-adventure' ); ?>"
					width="730"
					height="560"
					loading="lazy"
					decoding="async"
				/>
			</div>

			<div class="sl-coc-reporting__card">
				<ul class="sl-coc-reporting__list">
					<?php foreach ( $reporting_items as $index => $item ) : ?>
						<li class="sl-coc-reporting__list-item">
							<span class="sl-coc-reporting__list-index" aria-hidden="true">
								<?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?>
							</span>
							<span class="sl-coc-reporting__list-label">
								<?php echo esc_html( $item ); ?>
							</span>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>

		</div>

		<div class="sl-coc-section-close">
			<p class="sl-coc-section-close__text">
				<?php esc_html_e( 'Use training data to identify gaps, follow up with employees and support internal compliance and audit requirements.', 'akaza-adventure' ); ?>
			</p>

			<div class="sl-coc-section-close__actions">
				<a class="sl-content-btn sl-content-btn-primary" href="#contact" data-cta="coc-reporting-demo">
					<?php esc_html_e( 'Discuss Your Reporting Requirements', 'akaza-adventure' ); ?>
					<span aria-hidden="true">→</span>
				</a>
			</div>
		</div>

	</div>
</section>
