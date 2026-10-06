<?php
/**
 * AMP partial — US Sexual Harassment Prevention Training — requirements.
 *
 * Expected vars: $jurisdictions
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( empty( $jurisdictions ) || ! is_array( $jurisdictions ) ) {
	$jurisdictions = function_exists( 'succeedlearn_amp_get_us_harassment_jurisdictions' )
		? succeedlearn_amp_get_us_harassment_jurisdictions()
		: array();
}

$images = function_exists( 'succeedlearn_amp_get_us_harassment_images' )
	? succeedlearn_amp_get_us_harassment_images()
	: array();
$requirements_image = isset( $images['requirements'] ) ? $images['requirements'] : '';
?>
<section class="sl-section sl-us-harassment-requirements" aria-labelledby="sl-us-harassment-requirements-title">
	<div class="sl-wrap">
		<div class="sl-us-harassment-requirements__stack">
			<div class="sl-us-harassment-requirements__content">
				<span class="sl-eyebrow sl-home-sub-heading">
					<?php esc_html_e( 'Federal & State Requirements', 'succeedlearn-amp' ); ?>
				</span>

				<h2 id="sl-us-harassment-requirements-title" class="sl-h2">
					<?php esc_html_e( 'Federal Principles and Selected', 'succeedlearn-amp' ); ?>
					<span><?php esc_html_e( 'State Requirements', 'succeedlearn-amp' ); ?></span>
				</h2>

				<div class="sl-us-harassment-requirements__intro">
					<p class="sl-lead">
						<?php
						esc_html_e(
							'At federal level, Title VII of the Civil Rights Act prohibits employment discrimination based on sex and other protected characteristics for covered employers. Federal law does not create one universal harassment-training timetable for every private employer, but effective prevention, reporting and corrective practices remain important parts of workplace risk management.',
							'succeedlearn-amp'
						);
						?>
					</p>
					<p>
						<?php esc_html_e( 'Several jurisdictions impose more specific training duties. Examples include:', 'succeedlearn-amp' ); ?>
					</p>
				</div>

				<div class="sl-us-harassment-requirements__cards sl-amp-card-grid">
					<?php foreach ( $jurisdictions as $jurisdiction ) : ?>
						<article class="sl-us-harassment-requirements__card">
							<div class="sl-us-harassment-requirements__card-content">
								<h3 class="sl-panel-title">
									<?php echo esc_html( $jurisdiction['title'] ); ?>
								</h3>
								<p>
									<?php echo esc_html( $jurisdiction['description'] ); ?>
								</p>
							</div>
						</article>
					<?php endforeach; ?>
				</div>

				<div class="sl-us-harassment-requirements__closing">
					<p>
						<?php
						esc_html_e(
							'Other state, city and territorial rules may also apply. Requirements can change, so employers should verify current obligations for each work location and obtain legal advice where appropriate.',
							'succeedlearn-amp'
						);
						?>
					</p>
				</div>
			</div>

			<div class="sl-us-harassment-requirements__media">
				<?php if ( $requirements_image ) : ?>
					<div class="sl-us-harassment-requirements__image">
						<amp-img
							src="<?php echo esc_url( $requirements_image ); ?>"
							width="560"
							height="420"
							layout="responsive"
							alt="<?php esc_attr_e( 'Instructor presenting federal principles and selected US state harassment training requirements.', 'succeedlearn-amp' ); ?>"
						></amp-img>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
