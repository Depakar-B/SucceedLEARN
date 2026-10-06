<?php
/**
 * AMP partial — US Sexual Harassment Prevention Training — workplace.
 *
 * Expected vars: $journey
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( empty( $journey ) || ! is_array( $journey ) ) {
	$journey = function_exists( 'succeedlearn_amp_get_us_harassment_journey' )
		? succeedlearn_amp_get_us_harassment_journey()
		: array();
}

$images = function_exists( 'succeedlearn_amp_get_us_harassment_images' )
	? succeedlearn_amp_get_us_harassment_images()
	: array();
$workplace_image = isset( $images['workplace'] ) ? $images['workplace'] : '';
?>
<section class="sl-section sl-us-harassment-workplace" aria-labelledby="sl-us-harassment-workplace-title">
	<div class="sl-wrap">
		<div class="sl-us-harassment-workplace__stack">
			<div class="sl-us-harassment-workplace__content">
				<span class="sl-eyebrow sl-home-sub-heading">
					<?php esc_html_e( 'Learning for Real Workplace Situations', 'succeedlearn-amp' ); ?>
				</span>

				<h2 id="sl-us-harassment-workplace-title" class="sl-h2">
					<?php esc_html_e( 'Learning for Real Workplace', 'succeedlearn-amp' ); ?>
					<span><?php esc_html_e( 'Situations', 'succeedlearn-amp' ); ?></span>
				</h2>

				<div class="sl-us-harassment-workplace__intro">
					<p class="sl-lead">
						<?php
						esc_html_e(
							'Harassment is not limited to a physical office or a single type of interaction. Course scenarios can help learners consider conduct in meetings, email and chat, video calls, client locations, business travel, work events and remote or hybrid environments.',
							'succeedlearn-amp'
						);
						?>
					</p>
					<p>
						<?php
						esc_html_e(
							'Learners examine how context, frequency, severity, authority and impact can affect the assessment of conduct. They also learn that an organization’s policy may set behavioral expectations that are broader than the minimum legal threshold.',
							'succeedlearn-amp'
						);
						?>
					</p>
				</div>

				<h3 class="sl-panel-title sl-us-harassment-workplace__list-title">
					<?php esc_html_e( 'The learning journey moves from recognition to action:', 'succeedlearn-amp' ); ?>
				</h3>

				<ul class="sl-us-harassment-bullets sl-us-harassment-workplace__list">
					<?php foreach ( $journey as $item ) : ?>
						<li><?php echo esc_html( $item ); ?></li>
					<?php endforeach; ?>
				</ul>
			</div>

			<div class="sl-us-harassment-workplace__media">
				<?php if ( $workplace_image ) : ?>
					<div class="sl-us-harassment-workplace__image">
						<amp-img
							src="<?php echo esc_url( $workplace_image ); ?>"
							width="560"
							height="420"
							layout="responsive"
							alt="<?php esc_attr_e( 'Team discussion in a hybrid workplace covering real harassment prevention situations.', 'succeedlearn-amp' ); ?>"
						></amp-img>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
