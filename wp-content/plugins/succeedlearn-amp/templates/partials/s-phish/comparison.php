<?php
/**
 * S-Phish AMP: Traditional Phishing Awareness vs S-Phish.
 *
 * Expected vars: $comparison_rows
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section id="traditional-vs-s-phish" class="sl-section sl-s-phish-comparison" aria-labelledby="sl-s-phish-comparison-title">
	<div class="sl-wrap">
		<div class="sl-s-phish-intro">
			<span class="sl-eyebrow sl-home-sub-heading">
				<?php esc_html_e( 'Traditional Phishing Awareness vs S-Phish', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-s-phish-comparison-title" class="sl-h2">
				<?php esc_html_e( 'Traditional Phishing Awareness vs', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( "SucceedLEARN's Phishing Simulation Tool", 'succeedlearn-amp' ); ?></span>
			</h2>
		</div>

		<div class="sl-s-phish-comparison__table-wrap">
			<table class="sl-s-phish-comparison__table">
				<thead>
					<tr>
						<th scope="col"><?php esc_html_e( 'Traditional Approach', 'succeedlearn-amp' ); ?></th>
						<th scope="col" class="sl-s-phish-comparison__sphish-heading"><?php esc_html_e( 'S-Phish', 'succeedlearn-amp' ); ?></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ( $comparison_rows as $row ) : ?>
						<tr>
							<td><?php echo esc_html( $row['traditional'] ); ?></td>
							<td class="sl-s-phish-comparison__sphish-cell"><?php echo esc_html( $row['sphish'] ); ?></td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</section>
