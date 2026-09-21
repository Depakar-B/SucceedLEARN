<?php
/**
 * DPDPA Compliance Training - Format and delivery specifications.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$rows = function_exists( 'succeedlearn_amp_dpdpa_format_delivery_rows' )
	? succeedlearn_amp_dpdpa_format_delivery_rows()
	: array();
?>

<section
	class="sl-section sl-dpdpa-format-delivery"
	aria-labelledby="sl-dpdpa-format-delivery-title"
>
	<div class="sl-wrap">
		<header class="sl-dpdpa-section-heading sl-dpdpa-format-delivery__heading">
			<span class="sl-home-sub-heading">
				<?php
				esc_html_e(
					'Format, delivery and LMS integration',
					'succeedlearn-amp'
				);
				?>
			</span>

			<h2
				class="sl-h2"
				id="sl-dpdpa-format-delivery-title"
			>
				<?php
				echo wp_kses(
					__(
						'Ready for the <span>LMS you already run.</span>',
						'succeedlearn-amp'
					),
					array(
						'span' => array(),
					)
				);
				?>
			</h2>
		</header>

		<div class="sl-dpdpa-format-delivery__table-wrap">
			<table class="sl-dpdpa-format-delivery__table">
				<caption class="screen-reader-text">
					<?php
					esc_html_e(
						'DPDPA course format, delivery and LMS integration specifications',
						'succeedlearn-amp'
					);
					?>
				</caption>

				<tbody>
					<?php foreach ( $rows as $row ) : ?>
						<tr>
							<th scope="row">
								<?php echo esc_html( $row['label'] ); ?>
							</th>

							<td>
								<strong>
									<?php echo esc_html( $row['value'] ); ?>
								</strong>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</section>