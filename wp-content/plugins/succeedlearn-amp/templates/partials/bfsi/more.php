<?php
/**
 * BFSI & PE/VC AMP — More training for BFSI & PE/VC organisations.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$courses   = succeedlearn_amp_get_bfsi_more_courses();
$pevc_home = succeedlearn_amp_get_bfsi_course_url(
	'private-equity-venture-capital-compliance-training',
	home_url( '/private-equity-venture-capital-compliance-training/' )
);
?>
<section
	class="sl-bfsi-more"
	id="more-training-for-bfsi-pe-vc"
	aria-labelledby="sl-bfsi-more-title"
>
	<div class="sl-wrap">
		<div class="sl-bfsi-more__heading">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Related Training', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-bfsi-more-title" class="sl-h2">
				<?php esc_html_e( 'More Training for BFSI & PE/VC', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'Organisations', 'succeedlearn-amp' ); ?></span>
			</h2>

			<p><?php esc_html_e( 'Looking for broader BFSI & PE/VC workforce training?', 'succeedlearn-amp' ); ?></p>

			<p><?php esc_html_e( 'In addition to Cybersecurity Awareness Training, SucceedLEARN offers other training modules designed for financial-services organisations.', 'succeedlearn-amp' ); ?></p>

			<h3 class="sl-bfsi-more__subtitle">
				<?php esc_html_e( 'Other Training Available', 'succeedlearn-amp' ); ?>
			</h3>
		</div>

		<div class="sl-bfsi-more__grid">
			<?php foreach ( $courses as $course ) : ?>
				<a class="sl-bfsi-more__card" href="<?php echo esc_url( $course['href'] ); ?>">
					<h3><?php echo esc_html( $course['title'] ); ?></h3>
				</a>
			<?php endforeach; ?>
		</div>

		<div class="sl-bfsi-more__cta">
			<a class="sl-content-btn sl-content-btn-primary" href="<?php echo esc_url( $pevc_home ); ?>">
				<?php esc_html_e( 'Explore BFSI & PE/VC Training', 'succeedlearn-amp' ); ?>
			</a>
		</div>
	</div>
</section>
