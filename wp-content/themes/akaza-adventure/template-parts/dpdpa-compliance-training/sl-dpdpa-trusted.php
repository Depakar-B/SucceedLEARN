<?php
/**
 * SucceedLEARN — DPDPA Compliance Training
 *
 * Section: Trusted by organisations
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$dpdpa_logos = array(
	array(
		'name' => 'TCS',
		'url'  => 'https://succeedlearn.com/wp-content/uploads/2026/03/TCS-e1786337779729.webp',
	),
	array(
		'name' => 'Tata',
		'url'  => 'https://succeedlearn.com/wp-content/uploads/2026/03/TATA-e1786337788227.webp',
	),
	array(
		'name' => 'Air India',
		'url'  => 'https://succeedlearn.com/wp-content/uploads/2026/03/AirIndia-e1786337713550.webp',
	),
	array(
		'name' => 'AirAsia',
		'url'  => 'https://succeedlearn.com/wp-content/uploads/2026/03/AirAsia-e1786337722388.webp',
	),
	array(
		'name' => 'DHL',
		'url'  => 'https://succeedlearn.com/wp-content/uploads/2026/03/DHL-1-e1786337623808.webp',
	),
	array(
		'name' => 'RazorPay',
		'url'  => 'https://succeedlearn.com/wp-content/uploads/2026/03/RazorPay-e1786337838191.webp',
	),
	array(
		'name' => 'Lenovo',
		'url'  => 'https://succeedlearn.com/wp-content/uploads/2026/03/Lenova-1-e1786337921600.webp',
	),
	array(
		'name' => 'PowerGrid',
		'url'  => 'https://succeedlearn.com/wp-content/uploads/2026/03/PowerGrid-e1786337848952.webp',
	),
);
?>

<section
	class="sl-dpdpa-trusted"
	aria-labelledby="sl-dpdpa-trusted-title"
>
	<div class="container">

		<div class="sl-dpdpa-trusted__heading">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Trusted by organisations', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-dpdpa-trusted-title">
				<?php esc_html_e( 'Trusted by teams that take', 'akaza-adventure' ); ?>
				<span>
					<?php esc_html_e( 'privacy seriously.', 'akaza-adventure' ); ?>
				</span>
			</h2>

			<p>
				<?php esc_html_e( 'Organisations across industries use SucceedLEARN to build practical privacy awareness and demonstrate completion.', 'akaza-adventure' ); ?>
			</p>

		</div>


		<div class="sl-dpdpa-trusted__grid">

			<!-- LOGOS -->
			<div class="sl-dpdpa-trusted__logos">

				<div class="sl-dpdpa-trusted__logo-grid">

					<?php foreach ( $dpdpa_logos as $logo ) : ?>

						<div class="sl-dpdpa-trusted__logo">

							<?php if ( ! empty( $logo['url'] ) && 'LOGO_URL_HERE' !== $logo['url'] ) : ?>

								<img
									src="<?php echo esc_url( $logo['url'] ); ?>"
									alt="<?php echo esc_attr( $logo['name'] ); ?>"
									loading="lazy"
									decoding="async"
								>

							<?php else : ?>

								<span class="sl-dpdpa-trusted__logo-placeholder">
									<?php echo esc_html( $logo['name'] ); ?>
								</span>

							<?php endif; ?>

						</div>

					<?php endforeach; ?>

				</div>

			</div>


			<!-- TRUST PROOF -->
			<div class="sl-dpdpa-trusted__proof">

				<article class="sl-dpdpa-trusted__proof-item">

					<div class="sl-dpdpa-trusted__proof-number">
						<?php esc_html_e( '900+', 'akaza-adventure' ); ?>
					</div>

					<div class="sl-dpdpa-trusted__proof-content">

						<p>
							<?php esc_html_e( 'organisations', 'akaza-adventure' ); ?>
                            </p>

					</div>

				</article>


				<article class="sl-dpdpa-trusted__proof-item">

					<div
						class="sl-dpdpa-trusted__proof-icon"
						aria-hidden="true"
					>
						<svg
							viewBox="0 0 24 24"
							focusable="false"
						>
							<path
								d="M12 3.5 19 6v5.5c0 4.5-2.9 7.7-7 9-4.1-1.3-7-4.5-7-9V6l7-2.5Z"
								fill="none"
								stroke="currentColor"
								stroke-width="1.7"
								stroke-linejoin="round"
							/>

							<path
								d="m8.8 12 2.1 2.1 4.4-4.5"
								fill="none"
								stroke="currentColor"
								stroke-width="1.7"
								stroke-linecap="round"
								stroke-linejoin="round"
							/>
						</svg>
					</div>

					<div class="sl-dpdpa-trusted__proof-content">

						<p>
							<?php esc_html_e( 'ISO 27001:2022', 'akaza-adventure' ); ?>
                        </p>

					</div>

				</article>


				<article class="sl-dpdpa-trusted__proof-item">

					<div
						class="sl-dpdpa-trusted__proof-icon"
						aria-hidden="true"
					>
						<svg
							viewBox="0 0 24 24"
							focusable="false"
						>
							<path
								d="M5 5.5h14v13H5z"
								fill="none"
								stroke="currentColor"
								stroke-width="1.7"
								stroke-linejoin="round"
							/>

							<path
								d="M8.5 9.5h7M8.5 13h4.5"
								fill="none"
								stroke="currentColor"
								stroke-width="1.7"
								stroke-linecap="round"
							/>
						</svg>
					</div>

					<div class="sl-dpdpa-trusted__proof-content">

						<p>
							<?php esc_html_e( 'SOC 2', 'akaza-adventure' ); ?>
                        </p>

					</div>

				</article>

			</div>

		</div>

	</div>
</section>