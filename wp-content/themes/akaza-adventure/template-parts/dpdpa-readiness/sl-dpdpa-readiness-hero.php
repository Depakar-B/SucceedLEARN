<?php
/**
 * DPDPA Readiness Scorecard Hero.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$hero_points = array(
	array(
		'title' => __( '15 questions', 'akaza-adventure' ),
		'text'  => __( 'About 4 minutes', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Instant score', 'akaza-adventure' ),
		'text'  => __( 'No email needed to see it', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Forwardable result', 'akaza-adventure' ),
		'text'  => __( 'Share the result with your team', 'akaza-adventure' ),
	),
);
?>

<section
	class="sl-dpdpa-readiness-hero"
	aria-labelledby="sl-dpdpa-readiness-hero-title"
>
	<div class="container">

		<div class="sl-dpdpa-readiness-hero__grid">

			<div class="sl-dpdpa-readiness-hero__content">

				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'Free DPDPA readiness scorecard', 'akaza-adventure' ); ?>
				</span>

				<h1 id="sl-dpdpa-readiness-hero-title">
					<?php
					echo wp_kses(
						__( 'How ready is your workforce, not your <span>policy binder?</span>', 'akaza-adventure' ),
						array(
							'span' => array(),
						)
					);
					?>
				</h1>

				<p class="sl-dpdpa-readiness-hero__description">
					<?php
					esc_html_e(
						'Fifteen questions about what your employees actually know and do day to day, not whether you\'ve appointed a DPO or filed a DPIA. Your score and headline result appear immediately, no email required.',
						'akaza-adventure'
					);
					?>
				</p>

				<ul class="sl-list sl-dpdpa-readiness-hero__points">

					<?php foreach ( $hero_points as $index => $point ) : ?>

						<li class="sl-list-item">
							<span class="sl-list-item__label" aria-hidden="true">
								<?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?>
							</span>
							<span class="sl-list-item__text">
								<strong><?php echo esc_html( $point['title'] ); ?></strong>
								<?php echo esc_html( $point['text'] ); ?>
							</span>
						</li>

					<?php endforeach; ?>

				</ul>

				<div class="sl-dpdpa-readiness-hero__scope">

					<div class="sl-dpdpa-readiness-hero__scope-item">
						<strong>
							<?php esc_html_e( 'What this checks:', 'akaza-adventure' ); ?>
						</strong>
						<p>
							<?php
							esc_html_e(
								'everyday employee-level readiness, recognising personal data, consent basics, safe handling, rights requests, and breach reporting.',
								'akaza-adventure'
							);
							?>
						</p>
					</div>

					<div class="sl-dpdpa-readiness-hero__scope-item">
						<strong>
							<?php esc_html_e( 'What it does not check:', 'akaza-adventure' ); ?>
						</strong>
						<p>
							<?php
							esc_html_e(
								'DPO appointment, DPIAs, Consent Manager registration or other Significant Data Fiduciary obligations, that\'s a different exercise, not what this tool or our course covers.',
								'akaza-adventure'
							);
							?>
						</p>
					</div>

				</div>

			</div>

			<div class="sl-dpdpa-readiness-hero__visual">

				<div class="sl-dpdpa-readiness-hero__image-scroll">

					<div class="sl-dpdpa-readiness-hero__image">
						<div class="sl-dpdpa-readiness-hero__placeholder">
							<span>
								<?php esc_html_e( 'DPDPA readiness scorecard image', 'akaza-adventure' ); ?>
								<br>
								<?php esc_html_e( 'Recommended: 900 × 1100px', 'akaza-adventure' ); ?>
							</span>
						</div>
					</div>

				</div>

			</div>

		</div>

	</div>
</section>
