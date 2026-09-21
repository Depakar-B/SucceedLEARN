<?php
/**
 * HIPAA Course Comparison Section
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$comparison_rows = array(
	array(
		'criterion'    => __( 'Price visible before a sales call', 'akaza-adventure' ),
		'succeedlearn' => __( 'Published on this page', 'akaza-adventure' ),
		'elsewhere'    => __( 'Usually hidden behind an enquiry form', 'akaza-adventure' ),
	),
	array(
		'criterion'    => __( 'Full course outline visible', 'akaza-adventure' ),
		'succeedlearn' => __( 'Published on this page', 'akaza-adventure' ),
		'elsewhere'    => __( 'Often limited to summary bullets', 'akaza-adventure' ),
	),
	array(
		'criterion'    => __( 'Covers business associates, not only covered entities', 'akaza-adventure' ),
		'succeedlearn' => __( 'Yes, both', 'akaza-adventure' ),
		'elsewhere'    => __( 'Frequently focused on covered entities', 'akaza-adventure' ),
	),
	array(
		'criterion'    => __( 'Runs in your own LMS', 'akaza-adventure' ),
		'succeedlearn' => __( 'SCORM 1.2 and 2004', 'akaza-adventure' ),
		'elsewhere'    => __( 'Often locked to the vendor platform', 'akaza-adventure' ),
	),
	array(
		'criterion'    => __( 'Exportable audit records', 'akaza-adventure' ),
		'succeedlearn' => __( 'Excel and PDF, by department or individual', 'akaza-adventure' ),
		'elsewhere'    => __( 'Sometimes offered as a paid reporting add-on', 'akaza-adventure' ),
	),
	array(
		'criterion'    => __( 'Provider security posture', 'akaza-adventure' ),
		'succeedlearn' => __( 'ISO 27001:2022 and SOC 2', 'akaza-adventure' ),
		'elsewhere'    => __( 'Varies and is often unstated', 'akaza-adventure' ),
	),
	array(
		'criterion'    => __( 'Per-seat cost at 500 seats', 'akaza-adventure' ),
		'succeedlearn' => __( '$13', 'akaza-adventure' ),
		'elsewhere'    => __( 'Industry average near $85 per employee', 'akaza-adventure' ),
	),
);
?>

<section
	class="sl-hipaa-comparison"
	aria-labelledby="sl-hipaa-comparison-title"
>
	<div class="container">

		<header class="sl-hipaa-comparison__intro">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'How we compare', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-hipaa-comparison-title">
				<?php esc_html_e( 'What you should be checking ', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'before you buy any HIPAA course.', 'akaza-adventure' ); ?></span>
			</h2>

			<p>
				<?php
				esc_html_e(
					'These are the questions that determine whether a course survives an audit, rather than the ones that appear on a feature list.',
					'akaza-adventure'
				);
				?>
			</p>

		</header>

		<div
			class="sl-hipaa-comparison__table-wrap"
			tabindex="0"
			role="region"
			aria-label="<?php esc_attr_e( 'HIPAA course comparison table', 'akaza-adventure' ); ?>"
		>

			<table class="sl-hipaa-comparison__table">

				<thead>
					<tr>
						<th scope="col">
							<?php esc_html_e( 'What to check', 'akaza-adventure' ); ?>
						</th>

						<th
							scope="col"
							class="sl-hipaa-comparison__featured-heading"
						>
							<span
								class="sl-hipaa-icon sl-hipaa-comparison__heading-icon"
								aria-hidden="true"
							>
								<svg
									viewBox="0 0 24 24"
									fill="none"
									xmlns="http://www.w3.org/2000/svg"
									focusable="false"
								>
									<path
										d="M12 3.5L19 6.3V11.5C19 15.8 16.2 19.3 12 21C7.8 19.3 5 15.8 5 11.5V6.3L12 3.5Z"
										stroke="currentColor"
										stroke-width="1.7"
										stroke-linecap="round"
										stroke-linejoin="round"
									/>
									<path
										d="M8.8 12L11 14.2L15.5 9.7"
										stroke="currentColor"
										stroke-width="1.7"
										stroke-linecap="round"
										stroke-linejoin="round"
									/>
								</svg>
							</span>

							<?php esc_html_e( 'SucceedLEARN', 'akaza-adventure' ); ?>
						</th>

						<th scope="col">
							<?php esc_html_e( 'Commonly found elsewhere', 'akaza-adventure' ); ?>
						</th>
					</tr>
				</thead>

				<tbody>

					<?php foreach ( $comparison_rows as $row ) : ?>

						<tr>
							<th scope="row">
								<?php echo esc_html( $row['criterion'] ); ?>
							</th>

							<td class="sl-hipaa-comparison__featured-cell">
								<span
									class="sl-hipaa-icon sl-hipaa-comparison__check"
									aria-hidden="true"
								>
									<svg
										viewBox="0 0 24 24"
										fill="none"
										xmlns="http://www.w3.org/2000/svg"
										focusable="false"
									>
										<path
											d="M6.8 12.2L9.9 15.3L17.2 8"
											stroke="currentColor"
											stroke-width="2"
											stroke-linecap="round"
											stroke-linejoin="round"
										/>
									</svg>
								</span>

								<strong>
									<?php echo esc_html( $row['succeedlearn'] ); ?>
								</strong>
							</td>

							<td>
								<?php echo esc_html( $row['elsewhere'] ); ?>
							</td>
						</tr>

					<?php endforeach; ?>

				</tbody>

			</table>

		</div>

		<p class="sl-hipaa-comparison__note">

			<span
				class="sl-hipaa-icon sl-hipaa-comparison__note-icon"
				aria-hidden="true"
			>
				<svg
					viewBox="0 0 24 24"
					fill="none"
					xmlns="http://www.w3.org/2000/svg"
					focusable="false"
				>
					<circle
						cx="12"
						cy="12"
						r="9"
						stroke="currentColor"
						stroke-width="1.7"
					/>
					<path
						d="M12 10.5V16"
						stroke="currentColor"
						stroke-width="1.7"
						stroke-linecap="round"
					/>
					<circle
						cx="12"
						cy="7.7"
						r="1"
						fill="currentColor"
					/>
				</svg>
			</span>

			<span>
				<?php
				esc_html_e(
					'Comparison reflects publicly available information from provider websites at the time of writing. Vendors change their offers, so verify current terms directly before making a decision.',
					'akaza-adventure'
				);
				?>
			</span>

		</p>

	</div>
</section>