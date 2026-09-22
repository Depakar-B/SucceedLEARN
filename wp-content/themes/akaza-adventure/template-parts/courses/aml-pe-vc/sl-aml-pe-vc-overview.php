<?php
/**
 * SucceedLEARN
 * AML Training for PE/VC — What Is AML Overview
 *
 * @package Akaza_Adventure
 */

defined( 'ABSPATH' ) || exit;
?>

<section
	id="overview"
	class="sl-aml-pe-vc-overview"
	aria-labelledby="sl-aml-pe-vc-overview-title"
>
	<div class="container">

		<div class="sl-aml-pe-vc-overview__grid">

			<div class="sl-aml-pe-vc-overview__content">

				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'Course Overview', 'akaza-adventure' ); ?>
				</span>

				<h2 id="sl-aml-pe-vc-overview-title">
					<?php
					echo wp_kses_post(
						__(
							'What Is <span>Anti-Money Laundering?</span>',
							'akaza-adventure'
						)
					);
					?>
				</h2>

				<p>
					<?php
					esc_html_e(
						'Money laundering is the process of disguising the criminal origin of illicit funds so that they appear to come from legitimate sources.',
						'akaza-adventure'
					);
					?>
				</p>

				<p>
					<?php
					esc_html_e(
						'For investment professionals, AML awareness matters because high-value transactions, cross-border capital, complex ownership structures and offshore fund flows can create financial crime exposure.',
						'akaza-adventure'
					);
					?>
				</p>

				<div class="sl-aml-pe-vc-overview__definition">
					<strong><?php esc_html_e( 'In this course', 'akaza-adventure' ); ?></strong>
					<p>
						<?php
						esc_html_e(
							'Learners connect core AML principles with practical situations involving investors, beneficial ownership, source of funds, due diligence and suspicious activity.',
							'akaza-adventure'
						);
						?>
					</p>
				</div>

			</div>

			<div class="sl-aml-pe-vc-overview__media">
				<div
					class="sl-aml-pe-vc-overview__image-placeholder"
					role="img"
					aria-label="<?php esc_attr_e( 'AML Course Introduction Visual placeholder', 'akaza-adventure' ); ?>"
				>
					<span><?php esc_html_e( 'AML Course Introduction Visual', 'akaza-adventure' ); ?></span>
					<small>
						<?php
						esc_html_e(
							'Replace with an approved money laundering or investor onboarding scenario from the course.',
							'akaza-adventure'
						);
						?>
					</small>
				</div>
			</div>

		</div>

	</div>
</section>
