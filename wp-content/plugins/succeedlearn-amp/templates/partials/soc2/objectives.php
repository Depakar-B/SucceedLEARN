<?php
/**
 * SOC 2 AMP — How the training supports security objectives.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$objective_rows = succeedlearn_amp_get_soc2_objective_rows();
?>
<section
	class="sl-soc2-objectives"
	id="how-training-supports-soc-2"
	aria-labelledby="sl-soc2-objectives-title"
>
	<div class="sl-wrap">
		<div class="sl-soc2-objectives__heading">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Security Programme Alignment', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-soc2-objectives-title" class="sl-h2">
				<?php esc_html_e( 'How the Training Supports', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'SOC 2 Security Objectives', 'succeedlearn-amp' ); ?></span>
			</h2>
		</div>

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
</section>
