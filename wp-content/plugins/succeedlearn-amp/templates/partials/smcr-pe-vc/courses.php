<?php
/**
 * SMCR PE/VC AMP: Role-Based Learning.
 *
 * Expected vars: $role_courses
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section id="courses" class="sl-section sl-smcr-pe-vc-courses" aria-labelledby="sl-smcr-pe-vc-courses-title">
	<div class="sl-wrap">
		<div class="sl-aml-intro">
			<span class="sl-eyebrow sl-home-sub-heading">
				<?php esc_html_e( 'Role-Based Learning', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-smcr-pe-vc-courses-title" class="sl-h2">
				<?php esc_html_e( 'UK SMCR Training Courses for Employees and Senior Managers', 'succeedlearn-amp' ); ?>
			</h2>

			<p>
				<?php esc_html_e( "Choose learning that reflects the learner's responsibilities rather than using the same content for every role.", 'succeedlearn-amp' ); ?>
			</p>
		</div>

		<div class="sl-smcr-role-cards">
			<?php foreach ( $role_courses as $course ) : ?>
				<?php
				$mod = isset( $course['mod'] ) ? sanitize_html_class( (string) $course['mod'] ) : '';
				$card_class = 'sl-aml-card sl-smcr-role-cards__card';
				if ( '' !== $mod ) {
					$card_class .= ' sl-smcr-role-cards__card--' . $mod;
				}
				?>
				<article class="<?php echo esc_attr( $card_class ); ?>">
					<span class="sl-smcr-role-cards__eyebrow"><?php echo esc_html( $course['eyebrow'] ); ?></span>
					<h3 class="sl-panel-title"><?php echo esc_html( $course['title'] ); ?></h3>
					<p><?php echo esc_html( $course['description'] ); ?></p>
					<ul class="sl-list" role="list">
						<?php foreach ( $course['features'] as $feature ) : ?>
							<li class="sl-list-item">
								<span class="sl-list-item__text"><?php echo esc_html( $feature ); ?></span>
							</li>
						<?php endforeach; ?>
					</ul>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
