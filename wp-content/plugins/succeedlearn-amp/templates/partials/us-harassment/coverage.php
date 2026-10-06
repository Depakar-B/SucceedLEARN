<?php
/**
 * AMP partial — US Sexual Harassment Prevention Training — coverage.
 *
 * Expected vars: $coverage_items
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( empty( $coverage_items ) || ! is_array( $coverage_items ) ) {
	$coverage_items = function_exists( 'succeedlearn_amp_get_us_harassment_coverage_items' )
		? succeedlearn_amp_get_us_harassment_coverage_items()
		: array();
}

$images = function_exists( 'succeedlearn_amp_get_us_harassment_images' )
	? succeedlearn_amp_get_us_harassment_images()
	: array();
$coverage_image = isset( $images['coverage'] ) ? $images['coverage'] : '';
?>
<section class="sl-section sl-section--alt sl-us-harassment-coverage" aria-labelledby="sl-us-harassment-coverage-title">
	<div class="sl-wrap">
		<div class="sl-us-harassment-coverage__stack">
			<div class="sl-us-harassment-coverage__content">
				<span class="sl-eyebrow sl-home-sub-heading">
					<?php esc_html_e( 'Training Requirements', 'succeedlearn-amp' ); ?>
				</span>

				<h2 id="sl-us-harassment-coverage-title" class="sl-h2">
					<?php esc_html_e( 'What Should United States Harassment Prevention', 'succeedlearn-amp' ); ?>
					<span><?php esc_html_e( 'Training Cover?', 'succeedlearn-amp' ); ?></span>
				</h2>

				<div class="sl-us-harassment-coverage__intro">
					<p class="sl-lead">
						<?php
						esc_html_e(
							'United States harassment prevention training should help employees identify prohibited and inappropriate conduct, understand how concerns can be reported and recognize protection against retaliation. Supervisor learning should add guidance on policy enforcement, mandatory escalation, complaint handling, documentation, privacy and cooperation with investigations.',
							'succeedlearn-amp'
						);
						?>
					</p>
					<p>
						<?php
						esc_html_e(
							'The right course also depends on location. Federal anti-discrimination principles operate alongside state and local rules, which may specify who must be trained, the required duration and frequency, interactivity standards or recordkeeping obligations.',
							'succeedlearn-amp'
						);
						?>
					</p>
				</div>

				<div class="sl-us-harassment-coverage__checklist">
					<h3 class="sl-panel-title">
						<?php esc_html_e( 'Before assigning a course, confirm:', 'succeedlearn-amp' ); ?>
					</h3>

					<ul class="sl-us-harassment-bullets sl-us-harassment-coverage__list">
						<?php foreach ( $coverage_items as $requirement ) : ?>
							<li><?php echo esc_html( $requirement ); ?></li>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>

			<div class="sl-us-harassment-coverage__media">
				<?php if ( $coverage_image ) : ?>
					<div class="sl-us-harassment-coverage__image">
						<amp-img
							src="<?php echo esc_url( $coverage_image ); ?>"
							width="560"
							height="420"
							layout="responsive"
							alt="<?php esc_attr_e( 'Training session covering key topics in United States harassment prevention.', 'succeedlearn-amp' ); ?>"
						></amp-img>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
