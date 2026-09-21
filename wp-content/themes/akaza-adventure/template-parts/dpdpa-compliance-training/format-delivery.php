<?php
/**
 * DPDPA Compliance Training — Format and delivery specs.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$rows = array(
	array( 'Duration', '25 minutes, self paced' ),
	array( 'Level', 'Beginner, foundational awareness for all employees' ),
	array( 'Assessment', '5 questions, minimum 4 correct, plus knowledge checks throughout' ),
	array( 'Certificate', 'Issued automatically on completion' ),
	array( 'Language', 'English now. Hindi in development, coming soon.' ),
	array( 'Delivery', 'Hosted SaaS LMS, SCORM package for your LMS, or LTI' ),
	array( 'Platform', 'Branded portal, SSO, HRIS integration, Android app, automated reminders' ),
	array( 'Security', 'ISO 27001:2022, SOC 2, GDPR-aligned' ),
);
?>
<section class="sl-dpdpa-format-delivery" aria-labelledby="sl-dpdpa-format-delivery-title">
	<div class="container">
		<div class="sl-dpdpa-section-heading">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Format, delivery and LMS integration', 'akaza-adventure' ); ?>
			</span>
			<h2 id="sl-dpdpa-format-delivery-title">
				<?php esc_html_e( 'Ready for the', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'LMS you already run.', 'akaza-adventure' ); ?></span>
			</h2>
		</div>

		<div class="sl-dpdpa-format-delivery__table-wrap">
			<table class="sl-dpdpa-format-delivery__table">
				<caption class="screen-reader-text">
					<?php esc_html_e( 'DPDPA course format, delivery and LMS integration specifications', 'akaza-adventure' ); ?>
				</caption>
				<tbody>
					<?php foreach ( $rows as $row ) : ?>
						<tr>
							<th scope="row"><?php echo esc_html( $row[0] ); ?></th>
							<td><strong><?php echo esc_html( $row[1] ); ?></strong></td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</section>
