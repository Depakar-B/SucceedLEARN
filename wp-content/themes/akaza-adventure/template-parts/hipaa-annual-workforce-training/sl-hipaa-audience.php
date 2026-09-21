<?php
/**
 * HIPAA Training Audience Section
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$audience_groups = array(
	array(
		'title'       => __( 'Covered entities', 'akaza-adventure' ),
		'description' => __( 'Organizations that directly provide, manage or pay for healthcare services.', 'akaza-adventure' ),
		'items'       => array(
			__( 'Hospitals and health systems', 'akaza-adventure' ),
			__( 'Physician practices and clinics', 'akaza-adventure' ),
			__( 'Dental and behavioral health providers', 'akaza-adventure' ),
			__( 'Pharmacies and health plans', 'akaza-adventure' ),
			__( 'Payers and healthcare clearinghouses', 'akaza-adventure' ),
		),
	),
	array(
		'title'       => __( 'Business associates', 'akaza-adventure' ),
		'description' => __( 'Third parties that create, receive, maintain or transmit protected health information.', 'akaza-adventure' ),
		'items'       => array(
			__( 'Billing and revenue-cycle firms', 'akaza-adventure' ),
			__( 'IT and cloud vendors', 'akaza-adventure' ),
			__( 'Transcription and claims processors', 'akaza-adventure' ),
			__( 'Legal and accounting firms handling PHI', 'akaza-adventure' ),
			__( 'Medical device and digital-health companies', 'akaza-adventure' ),
		),
	),
);

$workforce_roles = array(
	__( 'Clinical and nursing staff', 'akaza-adventure' ),
	__( 'Front desk and scheduling teams', 'akaza-adventure' ),
	__( 'Medical records and HIM teams', 'akaza-adventure' ),
	__( 'Billing and coding teams', 'akaza-adventure' ),
	__( 'IT and security teams', 'akaza-adventure' ),
	__( 'Facilities staff', 'akaza-adventure' ),
	__( 'Contractors and vendors', 'akaza-adventure' ),
	__( 'Temporary staff', 'akaza-adventure' ),
);
?>

<section
	class="sl-hipaa-audience"
	aria-labelledby="sl-hipaa-audience-title"
>
	<div class="container">

		<header class="sl-hipaa-audience__intro">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Who needs this training', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-hipaa-audience-title">
				<?php esc_html_e( 'Every workforce member who could ', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'encounter PHI.', 'akaza-adventure' ); ?></span>
			</h2>

			<p>
				<?php
				esc_html_e(
					'HIPAA training is not limited to clinical staff. Anyone who could see, hear or handle protected health information falls within scope, as does every business associate working on your behalf.',
					'akaza-adventure'
				);
				?>
			</p>

		</header>

		<div class="sl-hipaa-audience__organizations">

			<?php foreach ( $audience_groups as $group ) : ?>

				<article class="sl-hipaa-audience__card">

					<div class="sl-hipaa-audience__card-heading">

						<span
							class="sl-hipaa-icon sl-hipaa-audience__card-icon"
							aria-hidden="true"
						>
							<svg
								viewBox="0 0 24 24"
								fill="none"
								xmlns="http://www.w3.org/2000/svg"
								focusable="false"
							>
								<path
									d="M4 20V7.5L12 4L20 7.5V20"
									stroke="currentColor"
									stroke-width="1.7"
									stroke-linecap="round"
									stroke-linejoin="round"
								/>
								<path
									d="M2.5 20H21.5"
									stroke="currentColor"
									stroke-width="1.7"
									stroke-linecap="round"
								/>
								<path
									d="M8 10H10M14 10H16M8 14H10M14 14H16M11 20V16H13V20"
									stroke="currentColor"
									stroke-width="1.7"
									stroke-linecap="round"
									stroke-linejoin="round"
								/>
							</svg>
						</span>

						<div>
							<h3>
								<?php echo esc_html( $group['title'] ); ?>
							</h3>

							<p>
								<?php echo esc_html( $group['description'] ); ?>
							</p>
						</div>

					</div>

					<ul class="sl-coc-reporting__list sl-hipaa-audience__list" role="list">

						<?php foreach ( $group['items'] as $index => $item ) : ?>

							<li class="sl-coc-reporting__list-item">
								<span class="sl-coc-reporting__list-index" aria-hidden="true">
									<?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?>
								</span>
								<span class="sl-coc-reporting__list-label">
									<?php echo esc_html( $item ); ?>
								</span>
							</li>

						<?php endforeach; ?>

					</ul>

				</article>

			<?php endforeach; ?>

		</div>

		<article class="sl-hipaa-audience__card sl-hipaa-audience__roles">

			<div class="sl-hipaa-audience__card-heading">

				<span
					class="sl-hipaa-icon sl-hipaa-audience__roles-icon"
					aria-hidden="true"
				>
					<svg
						viewBox="0 0 24 24"
						fill="none"
						xmlns="http://www.w3.org/2000/svg"
						focusable="false"
					>
						<circle
							cx="9"
							cy="8"
							r="3"
							stroke="currentColor"
							stroke-width="1.7"
						/>
						<circle
							cx="17"
							cy="10"
							r="2.5"
							stroke="currentColor"
							stroke-width="1.7"
						/>
						<path
							d="M3.5 19C3.5 15.9 6 13.5 9 13.5C12 13.5 14.5 15.9 14.5 19"
							stroke="currentColor"
							stroke-width="1.7"
							stroke-linecap="round"
						/>
						<path
							d="M15 14.5C18 14.1 20.5 16 20.5 19"
							stroke="currentColor"
							stroke-width="1.7"
							stroke-linecap="round"
						/>
					</svg>
				</span>

				<div>
					<h3>
						<?php esc_html_e( 'Roles inside both', 'akaza-adventure' ); ?>
					</h3>

					<p>
						<?php
						esc_html_e(
							'Training applies across the workforce wherever protected health information may be encountered.',
							'akaza-adventure'
						);
						?>
					</p>
				</div>

			</div>

			<div class="sl-hipaa-audience__roles-columns">

				<?php foreach ( array_chunk( $workforce_roles, 4 ) as $column_index => $column_roles ) : ?>

					<ul class="sl-coc-reporting__list sl-hipaa-audience__list" role="list">

						<?php foreach ( $column_roles as $row_index => $role ) : ?>

							<?php
							$item_number = ( $column_index * 4 ) + $row_index + 1;
							?>

							<li class="sl-coc-reporting__list-item">
								<span class="sl-coc-reporting__list-index" aria-hidden="true">
									<?php echo esc_html( str_pad( (string) $item_number, 2, '0', STR_PAD_LEFT ) ); ?>
								</span>
								<span class="sl-coc-reporting__list-label">
									<?php echo esc_html( $role ); ?>
								</span>
							</li>

						<?php endforeach; ?>

					</ul>

				<?php endforeach; ?>

			</div>

		</article>

	</div>
</section>