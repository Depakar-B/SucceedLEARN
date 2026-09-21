<?php
/**
 * GDPR Employee Awareness Training - Sales and marketing module.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$learning_points = function_exists( 'succeedlearn_amp_get_gdpr_sales_marketing_points' )
	? succeedlearn_amp_get_gdpr_sales_marketing_points()
	: array();

$country_rules = function_exists( 'succeedlearn_amp_get_gdpr_country_rules' )
	? succeedlearn_amp_get_gdpr_country_rules()
	: array();
?>

<section
	class="sl-section sl-gdpr-sales-marketing"
	aria-labelledby="sl-gdpr-sales-marketing-title"
>
	<div class="sl-wrap">
		<div class="sl-gdpr-sales-marketing__grid">
			<div class="sl-gdpr-sales-marketing__content">
				<header class="sl-gdpr-sales-marketing__heading">
					<span class="sl-home-sub-heading">
						<?php
						esc_html_e(
							'The Module Most Awareness Courses Skip',
							'succeedlearn-amp'
						);
						?>
					</span>

					<h2
						class="sl-h2"
						id="sl-gdpr-sales-marketing-title"
					>
						<?php
						echo wp_kses(
							__(
								'It Even Teaches the Rule That <span>Changes at Every EU Border.</span>',
								'succeedlearn-amp'
							),
							array(
								'span' => array(),
							)
						);
						?>
					</h2>

					<p>
						<?php
						esc_html_e(
							'Send the same email to Dublin and to Berlin and only one of them is fine by default. This course tells your revenue team what they may actually send, to whom, in which country.',
							'succeedlearn-amp'
						);
						?>
					</p>
				</header>

				<ul class="sl-list sl-gdpr-sales-marketing__list">
					<?php foreach ( $learning_points as $point ) : ?>
						<li class="sl-list-item">
							<span class="sl-list-item__label">
								<?php echo esc_html( $point['label'] ); ?>
							</span>

							<span class="sl-list-item__text">
								<?php echo esc_html( $point['text'] ); ?>
							</span>
						</li>
					<?php endforeach; ?>
				</ul>

				<div class="sl-gdpr-sales-marketing__actions">
					<button
						type="button"
						class="sl-content-btn sl-content-btn-primary"
						data-cta="gdpr-sales-marketing-preview"
						<?php
						echo succeedlearn_amp_scroll_tap_attr( 'contact' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
						?>
					>
						<?php
						esc_html_e(
							'Preview the Sales and Marketing Module',
							'succeedlearn-amp'
						);
						?>
						<span aria-hidden="true">→</span>
					</button>
				</div>
			</div>

			<div class="sl-gdpr-sales-marketing__panel">
				<header class="sl-gdpr-sales-marketing__panel-header">
					<span class="sl-gdpr-sales-marketing__panel-eyebrow">
						<?php esc_html_e( 'From Lesson 6', 'succeedlearn-amp' ); ?>
					</span>

					<h3 class="sl-panel-title">
						<?php
						esc_html_e(
							'What May Your Team Send, by Country?',
							'succeedlearn-amp'
						);
						?>
					</h3>

					<div
						class="sl-gdpr-sales-marketing__legend"
						aria-label="<?php esc_attr_e( 'Outreach rule legend', 'succeedlearn-amp' ); ?>"
					>
						<span class="sl-gdpr-sales-marketing__legend-item">
							<span
								class="sl-gdpr-sales-marketing__legend-dot"
								aria-hidden="true"
							></span>
							<?php esc_html_e( 'Opt-out', 'succeedlearn-amp' ); ?>
						</span>

						<span class="sl-gdpr-sales-marketing__legend-item">
							<span
								class="sl-gdpr-sales-marketing__legend-dot sl-gdpr-sales-marketing__legend-dot--consent"
								aria-hidden="true"
							></span>
							<?php esc_html_e( 'Opt-in', 'succeedlearn-amp' ); ?>
						</span>
					</div>
				</header>

				<div
					class="sl-gdpr-sales-marketing__table-wrap"
					tabindex="0"
					role="region"
					aria-label="<?php esc_attr_e( 'Country outreach rules. Scroll horizontally to view the complete table.', 'succeedlearn-amp' ); ?>"
				>
					<table class="sl-gdpr-sales-marketing__table">
						<caption class="screen-reader-text">
							<?php
							esc_html_e(
								'Examples of sales and marketing outreach rules by country',
								'succeedlearn-amp'
							);
							?>
						</caption>

						<thead class="screen-reader-text">
							<tr>
								<th scope="col">
									<?php esc_html_e( 'Country', 'succeedlearn-amp' ); ?>
								</th>
								<th scope="col">
									<?php esc_html_e( 'Outreach rule', 'succeedlearn-amp' ); ?>
								</th>
							</tr>
						</thead>

						<tbody>
							<?php foreach ( $country_rules as $rule ) : ?>
								<?php
								$is_opt_in = (
									isset( $rule['type'] ) &&
									'opt-in' === $rule['type']
								);

								$dot_class = 'sl-gdpr-sales-marketing__status-dot';
								$tag_class = 'sl-gdpr-sales-marketing__tag';

								if ( $is_opt_in ) {
									$dot_class .= ' sl-gdpr-sales-marketing__status-dot--consent';
									$tag_class .= ' sl-gdpr-sales-marketing__tag--consent';
								}
								?>

								<tr class="sl-gdpr-sales-marketing__country">
									<th
										class="sl-gdpr-sales-marketing__country-name"
										scope="row"
									>
										<span
											class="<?php echo esc_attr( $dot_class ); ?>"
											aria-hidden="true"
										></span>

										<strong>
											<?php echo esc_html( $rule['country'] ); ?>
										</strong>
									</th>

									<td class="sl-gdpr-sales-marketing__country-detail">
										<span class="<?php echo esc_attr( $tag_class ); ?>">
											<?php echo esc_html( $rule['tag'] ); ?>
										</span>

										<p>
											<?php echo esc_html( $rule['text'] ); ?>
										</p>
									</td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>

				<footer class="sl-gdpr-sales-marketing__panel-footer">
					<span>
						<?php
						esc_html_e(
							'Taught directly in the course.',
							'succeedlearn-amp'
						);
						?>
					</span>

					<button
						type="button"
						class="sl-content-btn sl-content-btn-secondary"
						data-cta="gdpr-country-rules-preview"
						<?php
						echo succeedlearn_amp_scroll_tap_attr( 'contact' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
						?>
					>
						<?php
						esc_html_e(
							'Request the full preview',
							'succeedlearn-amp'
						);
						?>
						<span aria-hidden="true">→</span>
					</button>
				</footer>
			</div>
		</div>
	</div>
</section>