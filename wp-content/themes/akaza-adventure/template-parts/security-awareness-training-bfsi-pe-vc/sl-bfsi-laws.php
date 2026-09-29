<?php
/**
 * BFSI & PE/VC — Laws & Regulations.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$rows = array(
	array(
		'law'      => __( 'General Data Protection Regulation (GDPR)', 'akaza-adventure' ),
		'relevance' => __( 'The Data Privacy Training is designed to operationalise GDPR requirements by training employees on lawful basis, personal and special-category data handling, data minimisation, retention, DSAR routing, breach identification and 72-hour reporting, third-party sharing, cross-border transfers, and accountability, helping employers demonstrate compliance through workforce awareness and defensible controls.', 'akaza-adventure' ),
	),
	array(
		'law'      => __( 'EU Digital Operational Resilience Act (DORA)', 'akaza-adventure' ),
		'relevance' => __( 'Establishes direct accountability for organisations, particularly financial entities, for ICT (Information and Communication Technology) and security risks arising from third-party service providers, making employee awareness of vendor onboarding, data sharing, and ongoing oversight a regulatory necessity addressed by this training.', 'akaza-adventure' ),
	),
);
?>

<section
	class="sl-bfsi-laws"
	id="laws-and-regulations"
	aria-labelledby="sl-bfsi-laws-title"
>
	<div class="container">

		<div class="sl-bfsi-laws__heading">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Regulatory Context', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-bfsi-laws-title">
				<?php esc_html_e( 'Laws &', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'Regulations', 'akaza-adventure' ); ?></span>
			</h2>
		</div>

		<div class="sl-bfsi-laws__table-wrap">
			<table class="sl-bfsi-laws__table">
				<caption class="screen-reader-text">
					<?php esc_html_e( 'How GDPR and DORA relate to the BFSI and PE/VC cybersecurity awareness course', 'akaza-adventure' ); ?>
				</caption>
				<thead>
					<tr>
						<th scope="col"><?php esc_html_e( 'Legislation / Concept', 'akaza-adventure' ); ?></th>
						<th scope="col"><?php esc_html_e( 'Relevance in the Course', 'akaza-adventure' ); ?></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ( $rows as $row ) : ?>
						<tr>
							<td>
								<span class="sl-bfsi-laws__cell sl-bfsi-laws__cell--strong">
									<?php echo esc_html( $row['law'] ); ?>
								</span>
							</td>
							<td>
								<span class="sl-bfsi-laws__cell">
									<?php echo esc_html( $row['relevance'] ); ?>
								</span>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>

	</div>
</section>
