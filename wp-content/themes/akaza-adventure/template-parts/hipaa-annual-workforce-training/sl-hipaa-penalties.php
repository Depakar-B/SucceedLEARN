<?php
/**
 * HIPAA Penalty Tiers Section
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$penalty_tiers = array(
	array(
		'title'       => __( 'Unknowing violations', 'akaza-adventure' ),
		'description' => __( 'The organization did not know and could not reasonably have known about the violation.', 'akaza-adventure' ),
	),
	array(
		'title'       => __( 'Reasonable cause', 'akaza-adventure' ),
		'description' => __( 'The organization should have known about the violation, but the conduct did not amount to willful neglect.', 'akaza-adventure' ),
	),
	array(
		'title'       => __( 'Willful neglect, corrected', 'akaza-adventure' ),
		'description' => __( 'The violation resulted from willful neglect but was corrected within the required compliance window.', 'akaza-adventure' ),
	),
	array(
		'title'       => __( 'Willful neglect, uncorrected', 'akaza-adventure' ),
		'description' => __( 'The violation was not corrected within the required window and carries the most severe consequences.', 'akaza-adventure' ),
	),
);

$common_findings = array(
	array(
		'title'       => __( 'Curiosity access', 'akaza-adventure' ),
		'description' => __( 'Looking up a record with no work-related reason, including a colleague or public figure.', 'akaza-adventure' ),
	),
	array(
		'title'       => __( 'Verbal disclosure', 'akaza-adventure' ),
		'description' => __( 'Discussing a patient where other people can overhear, including corridors and lifts.', 'akaza-adventure' ),
	),
	array(
		'title'       => __( 'Misdirected records', 'akaza-adventure' ),
		'description' => __( 'Sending a fax, email or document to the wrong recipient.', 'akaza-adventure' ),
	),
	array(
		'title'       => __( 'Unsecured devices', 'akaza-adventure' ),
		'description' => __( 'Leaving workstations unattended or losing unencrypted laptops or portable media.', 'akaza-adventure' ),
	),
);
?>

<section
	class="sl-hipaa-penalties"
	aria-labelledby="sl-hipaa-penalties-title"
>
	<div class="container">

		<div class="sl-hipaa-penalties__grid">

			<div class="sl-hipaa-penalties__content">

				<header class="sl-hipaa-penalties__intro">

					<span class="sl-home-sub-heading">
						<?php esc_html_e( 'The part that changes behaviour', 'akaza-adventure' ); ?>
					</span>

					<h2 id="sl-hipaa-penalties-title">
						<?php esc_html_e( 'Penalty tiers, explained so staff ', 'akaza-adventure' ); ?>
						<span><?php esc_html_e( 'understand what is at stake.', 'akaza-adventure' ); ?></span>
					</h2>

					<p>
						<?php
						esc_html_e(
							'Most HIPAA training states that penalties exist. This course walks through how culpability changes the tier, which is the part that makes someone stop before opening a record they have no reason to open.',
							'akaza-adventure'
						);
						?>
					</p>

				</header>

				<ol class="sl-coc-reporting__list sl-hipaa-penalties__list">

					<?php foreach ( $penalty_tiers as $index => $tier ) : ?>

						<li class="sl-coc-reporting__list-item sl-hipaa-penalties__list-item">

							<span
								class="sl-coc-reporting__list-index sl-hipaa-penalties__list-index"
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

							<span class="sl-coc-reporting__list-label sl-hipaa-penalties__list-content">
								<strong>
									<?php echo esc_html( $tier['title'] ); ?>
								</strong>

								<span>
									<?php echo esc_html( $tier['description'] ); ?>
								</span>
							</span>

						</li>

					<?php endforeach; ?>

				</ol>

				<div class="sl-hipaa-penalties__note">

					<span
						class="sl-hipaa-icon sl-hipaa-penalties__note-icon"
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

					<p>
						<?php
						esc_html_e(
							'Penalty amounts are adjusted for inflation. The course teaches the tier structure and culpability standard rather than figures that date. Confirm current amounts with your compliance counsel.',
							'akaza-adventure'
						);
						?>
					</p>

				</div>

			</div>

			<aside
				class="sl-hipaa-penalties__findings-wrap"
				aria-labelledby="sl-hipaa-findings-title"
			>

				<div class="sl-hipaa-penalties__findings">

					<header class="sl-hipaa-penalties__findings-header">

						<div>
							<span class="sl-hipaa-penalties__findings-label">
								<?php esc_html_e( 'Workplace examples', 'akaza-adventure' ); ?>
							</span>

							<h3 id="sl-hipaa-findings-title">
								<?php esc_html_e( 'Common findings', 'akaza-adventure' ); ?>
							</h3>
						</div>

						<span
							class="sl-hipaa-icon sl-hipaa-penalties__findings-icon"
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
									d="M9 12L11.2 14.2L15.5 9.8"
									stroke="currentColor"
									stroke-width="1.7"
									stroke-linecap="round"
									stroke-linejoin="round"
								/>
							</svg>
						</span>

					</header>

					<div class="sl-hipaa-penalties__table">

						<?php foreach ( $common_findings as $finding ) : ?>

							<div class="sl-hipaa-penalties__finding">

								<div class="sl-hipaa-penalties__finding-title">
									<strong>
										<?php echo esc_html( $finding['title'] ); ?>
									</strong>
								</div>

								<div class="sl-hipaa-penalties__finding-detail">

									<span class="sl-hipaa-penalties__finding-badge">
										<?php esc_html_e( 'Common finding', 'akaza-adventure' ); ?>
									</span>

									<p>
										<?php echo esc_html( $finding['description'] ); ?>
									</p>

								</div>

							</div>

						<?php endforeach; ?>

					</div>

				</div>

			</aside>

		</div>

	</div>
</section>