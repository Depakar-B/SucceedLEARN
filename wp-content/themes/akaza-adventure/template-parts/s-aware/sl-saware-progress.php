<?php
/**
 * SucceedLEARN — S-Aware
 *
 * Section: Visibility Into Learning Progress
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$progress_items = array(
	__( 'Course participation', 'akaza-adventure' ),
	__( 'Training completion', 'akaza-adventure' ),
	__( 'Assessment performance', 'akaza-adventure' ),
	__( 'Learner progress', 'akaza-adventure' ),
);

?>

<section class="sl-saware-progress" aria-labelledby="saware-progress-title">

	<div class="container">

		<div class="sl-saware-progress__grid">

			<!-- Left: Sticky Image -->
			<div class="sl-saware-progress__media">

				<div class="sl-saware-progress__image">

					<div class="sl-saware-progress__image-placeholder">
						<span>
							<?php esc_html_e( 'Image Placeholder', 'akaza-adventure' ); ?>
						</span>
					</div>

				</div>

			</div>

			<!-- Right: Content -->
			<div class="sl-saware-progress__content">

				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'Learning Progress', 'akaza-adventure' ); ?>
				</span>

				<h2 id="saware-progress-title">
					<?php esc_html_e( 'Visibility Into', 'akaza-adventure' ); ?>
					<span>
						<?php esc_html_e( 'Learning Progress', 'akaza-adventure' ); ?>
					</span>
				</h2>

				<div class="sl-saware-progress__intro">

					<p>
						<?php
						esc_html_e(
							'Security awareness should be measurable.',
							'akaza-adventure'
						);
						?>
					</p>

					<p>
						<?php
						esc_html_e(
							'S-Aware enables organisations to monitor learning activity and understand how employees are progressing through assigned awareness programmes.',
							'akaza-adventure'
						);
						?>
					</p>

					<p>
						<?php
						esc_html_e(
							'Depending on the deployment and programme configuration, organisations can use learning data and assessments to monitor areas such as:',
							'akaza-adventure'
						);
						?>
					</p>

				</div>

				<ul class="sl-list sl-list--2up sl-saware-progress__list">

					<?php foreach ( $progress_items as $index => $item ) : ?>

						<li class="sl-list-item">

							<span class="sl-list-item__label" aria-hidden="true">
								<?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?>
							</span>

							<span class="sl-list-item__text">
								<?php echo esc_html( $item ); ?>
							</span>

						</li>

					<?php endforeach; ?>

				</ul>

				<div class="sl-saware-progress__copy">

					<p>
						<?php
						esc_html_e(
							'These insights help security, compliance and learning teams understand programme participation and identify opportunities for additional communication, learning or reinforcement.',
							'akaza-adventure'
						);
						?>
					</p>

					<p>
						<?php
						esc_html_e(
							'For organisations using the wider SucceedLEARN Security Behaviour & Culture Suite, awareness data can form part of a broader view of employee security engagement and behaviour through S-Metrics.',
							'akaza-adventure'
						);
						?>
					</p>

				</div>

			</div>

		</div>

	</div>

</section>