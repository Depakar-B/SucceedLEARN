<?php
/**
 * Code of Conduct — Customization.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$customization_items = array(
	__( 'Company branding and colours', 'akaza-adventure' ),
	__( 'Your Code of Conduct', 'akaza-adventure' ),
	__( 'Organization-specific policies', 'akaza-adventure' ),
	__( 'Leadership messages', 'akaza-adventure' ),
	__( 'Reporting channels', 'akaza-adventure' ),
	__( 'Whistleblowing procedures', 'akaza-adventure' ),
	__( 'Gift thresholds', 'akaza-adventure' ),
	__( 'Organization-specific scenarios', 'akaza-adventure' ),
	__( 'Industry-specific examples', 'akaza-adventure' ),
	__( 'Assessments', 'akaza-adventure' ),
	__( 'Certificates', 'akaza-adventure' ),
	__( 'Languages', 'akaza-adventure' ),
);

$customization_image = '2026/09/Customization-Your-Code-Your-Policies-scaled.webp';
?>

<section class="sl-coc-customization" aria-labelledby="sl-coc-customization-title">
	<div class="container">

		<div class="sl-coc-customization__heading">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Customization', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-coc-customization-title">
				<?php
				echo wp_kses(
					__( 'Your Code. Your Policies. <span>Your Training.</span>', 'akaza-adventure' ),
					array( 'span' => array() )
				);
				?>
			</h2>

			<p>
				<?php esc_html_e( 'Every organization has different values, policies, reporting procedures and compliance requirements.', 'akaza-adventure' ); ?>
			</p>

		</div>

		<div class="sl-coc-customization__intro">
			<h3>
				<?php esc_html_e( "SucceedLEARN's custom Code of Conduct training can be adapted to incorporate:", 'akaza-adventure' ); ?>
			</h3>
		</div>

		<div class="sl-coc-customization__layout">

			<div class="sl-coc-customization__list-box">
				<ul class="sl-coc-customization__list">
					<?php foreach ( $customization_items as $index => $item ) : ?>
						<li class="sl-coc-customization__list-item">
							<span class="sl-coc-customization__list-index" aria-hidden="true">
								<?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?>
							</span>
							<span class="sl-coc-customization__list-label">
								<?php echo esc_html( $item ); ?>
							</span>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>

			<div class="sl-coc-customization__media">
				<img
					src="<?php echo esc_url( akaza_upload_url( $customization_image ) ); ?>"
					alt="<?php esc_attr_e( 'Custom Code of Conduct training dashboard tailored to an organization’s branding and policies', 'akaza-adventure' ); ?>"
					width="730"
					height="1120"
					loading="lazy"
					decoding="async"
				/>
			</div>

		</div>

		<div class="sl-coc-section-close">
			<p class="sl-coc-section-close__text">
				<?php
				echo wp_kses(
					__( 'The result is a course that feels like your organization’s Code of Conduct programme, rather than generic off-the-shelf training.', 'akaza-adventure' ),
					array( 'strong' => array() )
				);
				?>
			</p>

			<div class="sl-coc-section-close__actions">
				<a class="sl-content-btn sl-content-btn-primary" href="#contact" data-cta="coc-customization-demo">
					<?php esc_html_e( 'Discuss Your Customization Requirements', 'akaza-adventure' ); ?>
					<span aria-hidden="true">→</span>
				</a>
			</div>
		</div>

	</div>
</section>
