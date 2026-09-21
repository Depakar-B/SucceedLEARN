<?php
/**
 * Security Awareness AMP — Employee Lifecycle section.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$lifecycle_image = function_exists( 'succeedlearn_amp_get_sa_lifecycle_image' )
	? succeedlearn_amp_get_sa_lifecycle_image()
	: 'https://succeedlearn.com/wp-content/uploads/2026/09/Build-Security-Awareness-Around-the-Employee-Lifecycle.webp';
?>
<section
	class="sl-sa-lifecycle"
	id="employee-lifecycle"
	aria-labelledby="sl-sa-lifecycle-title"
>
	<div class="sl-wrap">
		<div class="sl-sa-lifecycle__layout">
			<div class="sl-sa-lifecycle__content">
				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'CONTINUOUS SECURITY AWARENESS', 'succeedlearn-amp' ); ?>
				</span>

				<h2 id="sl-sa-lifecycle-title">
					<?php esc_html_e( 'Build Security Awareness Around the', 'succeedlearn-amp' ); ?>
					<span><?php esc_html_e( 'Employee Lifecycle', 'succeedlearn-amp' ); ?></span>
				</h2>

				<p>
					<?php esc_html_e( 'Cyber risk does not begin and end with annual compliance training. Employees encounter different risks depending on their roles, responsibilities, access levels and stage within the organisation.', 'succeedlearn-amp' ); ?>
				</p>

				<p>
					<?php esc_html_e( 'A continuous awareness programme can support employees throughout their journey: from initial onboarding and foundational learning to ongoing reinforcement, phishing simulations, refresher learning and targeted interventions.', 'succeedlearn-amp' ); ?>
				</p>

				<p>
					<?php esc_html_e( 'This allows organisations to deliver the right awareness experiences at the right moments while maintaining consistent security messaging across the workforce.', 'succeedlearn-amp' ); ?>
				</p>
			</div>

			<div class="sl-sa-lifecycle__media">
				<div class="sl-sa-lifecycle__image">
					<amp-img
						src="<?php echo esc_url( $lifecycle_image ); ?>"
						width="640"
						height="520"
						layout="responsive"
						alt="<?php esc_attr_e( 'Build security awareness around the employee lifecycle', 'succeedlearn-amp' ); ?>"
					></amp-img>
				</div>
			</div>
		</div>
	</div>
</section>
