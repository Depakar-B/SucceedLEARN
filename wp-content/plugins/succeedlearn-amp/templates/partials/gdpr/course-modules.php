<?php
/**
 * GDPR Employee Awareness Training - Course modules.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$course_modules = function_exists( 'succeedlearn_amp_get_gdpr_course_modules' )
	? succeedlearn_amp_get_gdpr_course_modules()
	: array();
?>

<section
	class="sl-section sl-gdpr-course-modules"
	id="course-modules"
	aria-labelledby="sl-gdpr-course-modules-title"
>
	<div class="sl-wrap">
		<header class="sl-gdpr-course-modules__heading">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Inside the Course', 'succeedlearn-amp' ); ?>
			</span>

			<h2
				class="sl-h2"
				id="sl-gdpr-course-modules-title"
			>
				<?php
				echo wp_kses(
					__(
						'Thirty Minutes, Built Around <span>Real Situations.</span>',
						'succeedlearn-amp'
					),
					array(
						'span' => array(),
					)
				);
				?>
			</h2>

			<p>
				<?php
				esc_html_e(
					'Narrated lessons with assessments and engaging questions woven through the course, not saved for a final quiz.',
					'succeedlearn-amp'
				);
				?>
			</p>
		</header>

		<div class="sl-gdpr-course-modules__grid">
			<?php foreach ( $course_modules as $module ) : ?>
				<?php
				$card_classes = 'sl-gdpr-course-modules__card';

				if ( ! empty( $module['featured'] ) ) {
					$card_classes .= ' sl-gdpr-course-modules__card--featured';
				}
				?>

				<article class="<?php echo esc_attr( $card_classes ); ?>">
					<span
						class="sl-gdpr-course-modules__number"
						aria-hidden="true"
					>
						<?php echo esc_html( $module['number'] ); ?>
					</span>

					<div class="sl-gdpr-course-modules__content">
						<?php if ( ! empty( $module['label'] ) ) : ?>
							<span class="sl-gdpr-course-modules__label">
								<?php echo esc_html( $module['label'] ); ?>
							</span>
						<?php endif; ?>

						<h3 class="sl-panel-title">
							<?php echo esc_html( $module['title'] ); ?>
						</h3>

						<p>
							<?php echo esc_html( $module['text'] ); ?>
						</p>

						<?php if ( ! empty( $module['badge'] ) ) : ?>
							<span class="sl-gdpr-course-modules__badge">
								<?php echo esc_html( $module['badge'] ); ?>
							</span>
						<?php endif; ?>
					</div>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>