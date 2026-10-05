<?php
/**
 * BFSI & PE/VC AMP — Laws & regulations.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$rows = succeedlearn_amp_get_bfsi_law_rows();
?>
<section
	class="sl-bfsi-laws"
	id="laws-and-regulations"
	aria-labelledby="sl-bfsi-laws-title"
>
	<div class="sl-wrap">
		<div class="sl-bfsi-laws__heading">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Regulatory Context', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-bfsi-laws-title" class="sl-h2">
				<?php esc_html_e( 'Laws &', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'Regulations', 'succeedlearn-amp' ); ?></span>
			</h2>
		</div>

		<div class="sl-bfsi-laws__table-wrap">
			<table class="sl-bfsi-laws__table">
				<caption class="sl-bfsi-laws__caption">
					<?php esc_html_e( 'How GDPR and DORA relate to the BFSI and PE/VC cybersecurity awareness course', 'succeedlearn-amp' ); ?>
				</caption>
				<thead>
					<tr>
						<th scope="col"><?php esc_html_e( 'Legislation / Concept', 'succeedlearn-amp' ); ?></th>
						<th scope="col"><?php esc_html_e( 'Relevance in the Course', 'succeedlearn-amp' ); ?></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ( $rows as $row ) : ?>
						<tr>
							<td>
								<span class="sl-bfsi-laws__cell sl-bfsi-laws__cell--strong"><?php echo esc_html( $row['law'] ); ?></span>
							</td>
							<td>
								<span class="sl-bfsi-laws__cell"><?php echo esc_html( $row['relevance'] ); ?></span>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</section>
