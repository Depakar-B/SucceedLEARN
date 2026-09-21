<?php
/**
 * DPDPA Compliance Training AMP - Course coverage.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$coverage_items = function_exists( 'succeedlearn_amp_dpdpa_coverage_items' )
	? succeedlearn_amp_dpdpa_coverage_items()
	: array();

$curriculum_items = function_exists( 'succeedlearn_amp_dpdpa_curriculum_items' )
	? succeedlearn_amp_dpdpa_curriculum_items()
	: array();
?>

<section
	class="sl-section sl-section--alt sl-dpdpa-course-coverage"
	aria-labelledby="sl-dpdpa-course-coverage-title"
>
	<div class="sl-wrap">

		<header class="sl-dpdpa-course-coverage__heading">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'What the DPDPA course covers', 'succeedlearn-amp' ); ?>
			</span>

			<h2
				id="sl-dpdpa-course-coverage-title"
				class="sl-h2"
			>
				<?php
				esc_html_e(
					'Built for every employee who ',
					'succeedlearn-amp'
				);
				?>

				<span>
					<?php esc_html_e( 'handles personal data.', 'succeedlearn-amp' ); ?>
				</span>
			</h2>

			<p class="sl-lead">
				<?php
				esc_html_e(
					"This isn't role-based training, and it isn't written for a DPO. It's built for the person who has never read the Act and never will, and still needs to get this right.",
					'succeedlearn-amp'
				);
				?>
			</p>
		</header>

		<div class="sl-list sl-dpdpa-course-coverage__grid">
			<?php foreach ( $coverage_items as $index => $item ) : ?>
				<article class="sl-list-item sl-dpdpa-course-coverage__card">
					<span
						class="sl-dpdpa-course-coverage__number"
						aria-hidden="true"
					>
						<?php
						echo esc_html(
							str_pad(
								(string) ( $index + 1 ),
								2,
								'0',
								STR_PAD_LEFT
							)
						);
						?>
					</span>

					<div class="sl-dpdpa-course-coverage__card-content">
						<h3 class="sl-panel-title">
							<?php echo esc_html( $item['title'] ); ?>
						</h3>

						<p>
							<?php echo esc_html( $item['text'] ); ?>
						</p>
					</div>
				</article>
			<?php endforeach; ?>
		</div>

		<?php if ( ! empty( $curriculum_items ) ) : ?>
			<div class="sl-dpdpa-course-coverage__curriculum">
				<header class="sl-dpdpa-course-coverage__panel-heading">
					<h3 class="sl-panel-title">
						<?php
						esc_html_e(
							'Full 13-module DPDPA course curriculum',
							'succeedlearn-amp'
						);
						?>
					</h3>
				</header>

				<ol class="sl-list sl-dpdpa-course-coverage__curriculum-list">
					<?php foreach ( $curriculum_items as $index => $item ) : ?>
						<li class="sl-list-item sl-dpdpa-course-coverage__curriculum-item">
							<span
								class="sl-dpdpa-course-coverage__curriculum-number"
								aria-hidden="true"
							>
								<?php
								echo esc_html(
									str_pad(
										(string) ( $index + 1 ),
										2,
										'0',
										STR_PAD_LEFT
									)
								);
								?>
							</span>

							<div class="sl-dpdpa-course-coverage__curriculum-content">
								<h4>
									<?php echo esc_html( $item['title'] ); ?>
								</h4>

								<p>
									<?php echo esc_html( $item['text'] ); ?>
								</p>
							</div>
						</li>
					<?php endforeach; ?>
				</ol>
			</div>
		<?php endif; ?>

	</div>
</section>