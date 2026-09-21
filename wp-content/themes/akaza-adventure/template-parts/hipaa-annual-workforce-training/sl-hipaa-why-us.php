<?php
/**
 * HIPAA Why Trust Us Section
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$trust_points = array(
	array(
		'title'       => __( '200,000 learners and 900 organizations', 'akaza-adventure' ),
		'description' => __( 'Across compliance programmes, with a 95 percent completion rate.', 'akaza-adventure' ),
	),
	array(
		'title'       => __( 'ISO 27001:2022 and SOC 2', 'akaza-adventure' ),
		'description' => __( 'A training vendor handling your staff data should meet the same standard you are being asked to meet.', 'akaza-adventure' ),
	),
	array(
		'title'       => __( 'Recognised for Innovation in Education', 'akaza-adventure' ),
		'description' => __( 'At the 15th Aegis Graham Bell Awards 2025.', 'akaza-adventure' ),
	),
	array(
		'title'       => __( 'We publish our scope boundaries', 'akaza-adventure' ),
		'description' => __( 'This is workforce awareness training. It is not privacy-officer certification, and we say so rather than letting you discover it later.', 'akaza-adventure' ),
	),
);

$client_names = array(
	__( 'Lupin', 'akaza-adventure' ),
	__( 'TCS', 'akaza-adventure' ),
	__( 'DHL', 'akaza-adventure' ),
	__( 'Air India', 'akaza-adventure' ),
	__( 'Lenovo', 'akaza-adventure' ),
	__( 'Chargebee', 'akaza-adventure' ),
);

/**
 * Add the final WordPress Media Library image URL here.
 *
 * Example:
 * $dashboard_image_url = 'https://example.com/wp-content/uploads/2026/09/admin-dashboard.webp';
 */
$dashboard_image_url = '';
?>

<section
	class="sl-hipaa-why-us"
	aria-labelledby="sl-hipaa-why-us-title"
>
	<div class="container">

		<div class="sl-hipaa-why-us__grid">

			<div class="sl-hipaa-why-us__content">

				<header class="sl-hipaa-why-us__intro">

					<span class="sl-home-sub-heading">
						<?php esc_html_e( 'Why trust us with this', 'akaza-adventure' ); ?>
					</span>

					<h2 id="sl-hipaa-why-us-title">
						<?php esc_html_e( 'Compliance training is not a side product for us. ', 'akaza-adventure' ); ?>
						<span><?php esc_html_e( 'It is the whole company.', 'akaza-adventure' ); ?></span>
					</h2>

					<p>
						<?php
						esc_html_e(
							'We have spent about a decade building courses that regulated organizations run across their entire workforce, and the thing we optimize for is not content volume. It is whether people finish, and whether you can prove it afterwards.',
							'akaza-adventure'
						);
						?>
					</p>

				</header>

				<ol class="sl-coc-reporting__list sl-hipaa-why-us__list">

					<?php foreach ( $trust_points as $index => $point ) : ?>

						<li class="sl-coc-reporting__list-item sl-hipaa-why-us__list-item">

							<span
								class="sl-coc-reporting__list-index sl-hipaa-why-us__list-index"
								aria-hidden="true"
							>
								<?php
								echo esc_html(
									str_pad(
										(string) ( $index + 1 ),
										2,
										'0',
										STR_PAD_LEFT
									)
								);
								?>
							</span>

							<span class="sl-coc-reporting__list-label sl-hipaa-why-us__list-content">

								<strong>
									<?php echo esc_html( $point['title'] ); ?>
								</strong>

								<span>
									<?php echo esc_html( $point['description'] ); ?>
								</span>

							</span>

						</li>

					<?php endforeach; ?>

				</ol>

			</div>

			<aside class="sl-hipaa-why-us__visual">

				<figure class="sl-hipaa-why-us__figure">

					<div class="sl-hipaa-why-us__image">

						<?php if ( ! empty( $dashboard_image_url ) ) : ?>

							<img
								src="<?php echo esc_url( $dashboard_image_url ); ?>"
								alt="<?php esc_attr_e( 'SucceedLEARN administration dashboard showing learner completion progress', 'akaza-adventure' ); ?>"
								loading="lazy"
								decoding="async"
								width="1200"
								height="675"
							>

						<?php else : ?>

							<div class="sl-hipaa-why-us__placeholder">

								<span
									class="sl-hipaa-icon sl-hipaa-why-us__placeholder-icon"
									aria-hidden="true"
								>
									<svg
										viewBox="0 0 24 24"
										fill="none"
										xmlns="http://www.w3.org/2000/svg"
										focusable="false"
									>
										<rect
											x="3.5"
											y="4.5"
											width="17"
											height="15"
											rx="2"
											stroke="currentColor"
											stroke-width="1.7"
										/>
										<path
											d="M7 15L10.2 11.8L12.8 14.4L15 12.2L18 15.2"
											stroke="currentColor"
											stroke-width="1.7"
											stroke-linecap="round"
											stroke-linejoin="round"
										/>
										<circle
											cx="9"
											cy="9"
											r="1.3"
											stroke="currentColor"
											stroke-width="1.7"
										/>
									</svg>
								</span>

								<strong>
									<?php esc_html_e( 'Admin completion dashboard', 'akaza-adventure' ); ?>
								</strong>

								<span>
									<?php esc_html_e( 'Recommended image: 1200 × 675 px WebP', 'akaza-adventure' ); ?>
								</span>

							</div>

						<?php endif; ?>

					</div>

					<figcaption>
						<?php
						esc_html_e(
							'Completion progress across departments—the view a compliance lead works from.',
							'akaza-adventure'
						);
						?>
					</figcaption>

				</figure>

				<div class="sl-hipaa-why-us__clients">

					<p>
						<?php esc_html_e( 'Enterprise compliance programmes delivered for teams at', 'akaza-adventure' ); ?>
					</p>

					<ul role="list">

						<?php foreach ( $client_names as $client_name ) : ?>

							<li><?php echo esc_html( $client_name ); ?></li>

						<?php endforeach; ?>

					</ul>

				</div>

			</aside>

		</div>

	</div>
</section>