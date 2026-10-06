<?php
/**
 * SOC 2 AMP — How modules relate to SOC 2 + supports table.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$objective_rows = succeedlearn_amp_get_soc2_objective_rows();
?>
<section
	class="sl-soc2-relate"
	id="how-modules-relate-to-soc-2"
	aria-labelledby="sl-soc2-relate-title"
>
	<div class="sl-wrap">
		<div class="sl-soc2-relate__panel">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Control Environment Context', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-soc2-relate-title" class="sl-h2">
				<?php esc_html_e( 'How These Modules Relate', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'to SOC 2', 'succeedlearn-amp' ); ?></span>
			</h2>

			<p>
				<?php esc_html_e( 'SOC 2 does not prescribe a universal list of mandatory employee security-awareness topics.', 'succeedlearn-amp' ); ?>
			</p>

			<p>
				<?php esc_html_e( 'The appropriate controls for a SOC 2 engagement depend on the organisation’s system, risks, policies and applicable Trust Services Criteria. The AICPA’s Trust Services Criteria are used to evaluate controls relevant to Security, Availability, Processing Integrity, Confidentiality and Privacy; they are not a predefined employee training syllabus.', 'succeedlearn-amp' ); ?>
			</p>

			<p>
				<?php esc_html_e( 'The modules on this page have therefore been selected based on their relevance to employee security behaviours and organisational control objectives.', 'succeedlearn-amp' ); ?>
			</p>
		</div>

		<div class="sl-soc2-relate__supports" id="how-training-supports-soc-2">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Security Programme Alignment', 'succeedlearn-amp' ); ?>
			</span>

			<h3 id="sl-soc2-objectives-title">
				<?php esc_html_e( 'How the Training Supports', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'SOC 2 Security Objectives', 'succeedlearn-amp' ); ?></span>
			</h3>

			<div class="sl-soc2-objectives__table-wrap">
				<table class="sl-soc2-objectives__table">
					<caption class="sl-soc2-objectives__caption">
						<?php esc_html_e( 'How security awareness modules support SOC 2 security programme objectives', 'succeedlearn-amp' ); ?>
					</caption>
					<thead>
						<tr>
							<th scope="col"><?php esc_html_e( 'Security Awareness Area', 'succeedlearn-amp' ); ?></th>
							<th scope="col"><?php esc_html_e( 'Relevant Module Topics', 'succeedlearn-amp' ); ?></th>
							<th scope="col"><?php esc_html_e( 'How It Supports the Security Programme', 'succeedlearn-amp' ); ?></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ( $objective_rows as $row ) : ?>
							<tr>
								<td>
									<span class="sl-soc2-objectives__cell sl-soc2-objectives__cell--strong">
										<?php echo esc_html( $row['area'] ); ?>
									</span>
								</td>
								<td>
									<span class="sl-soc2-objectives__cell">
										<?php echo esc_html( $row['module'] ); ?>
									</span>
								</td>
								<td>
									<span class="sl-soc2-objectives__cell">
										<?php echo esc_html( $row['support'] ); ?>
									</span>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</section>
