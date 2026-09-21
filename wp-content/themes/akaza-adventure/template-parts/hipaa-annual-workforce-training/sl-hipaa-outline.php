<?php
/**
 * HIPAA Course Outline Section
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$course_topics = array(
	array(
		'title'     => __( 'What HIPAA is and who it applies to', 'akaza-adventure' ),
		'highlight' => false,
	),
	array(
		'title'     => __( 'Covered entities and business associates', 'akaza-adventure' ),
		'highlight' => false,
	),
	array(
		'title'     => __( 'Protected health information and what counts as identifiable', 'akaza-adventure' ),
		'highlight' => false,
	),
	array(
		'title'     => __( 'The Privacy Rule: permitted uses and disclosures', 'akaza-adventure' ),
		'highlight' => true,
	),
	array(
		'title'     => __( 'The Security Rule: administrative, physical and technical safeguards', 'akaza-adventure' ),
		'highlight' => true,
	),
	array(
		'title'     => __( 'The Breach Notification Rule and reporting duties', 'akaza-adventure' ),
		'highlight' => true,
	),
	array(
		'title'     => __( 'Minimum necessary and access on a need-to-know basis', 'akaza-adventure' ),
		'highlight' => false,
	),
	array(
		'title'     => __( 'Patient rights over their own health information', 'akaza-adventure' ),
		'highlight' => false,
	),
	array(
		'title'     => __( 'Civil penalties and organizational consequences', 'akaza-adventure' ),
		'highlight' => false,
	),
	array(
		'title'     => __( 'Workplace scenarios and end-of-course assessment', 'akaza-adventure' ),
		'highlight' => false,
	),
);

$learning_outcomes = array(
	__( 'Recognize protected health information in everyday work', 'akaza-adventure' ),
	__( 'Explain whether their organization is a covered entity or business associate', 'akaza-adventure' ),
	__( 'Apply the minimum necessary standard to a real request', 'akaza-adventure' ),
	__( 'Identify a permitted disclosure and distinguish it from one needing authorization', 'akaza-adventure' ),
	__( 'Recognize an incident that must be reported and report it promptly', 'akaza-adventure' ),
	__( 'Describe the consequences of a violation for the organization and the individual', 'akaza-adventure' ),
);

/**
 * Add the final WordPress Media Library URLs below.
 *
 * Example:
 * 'image_url' => 'https://yourwebsite.com/wp-content/uploads/2026/09/image.webp',
 *
 * Leave image_url empty to display the designed placeholder.
 */
$course_previews = array(
	array(
		'image_url'  => '',
		'file_name'  => __( 'hipaa-scenario.webp', 'akaza-adventure' ),
		'title'      => __( 'Clinical decision scenario', 'akaza-adventure' ),
		'description'=> __( 'A real workplace situation shown mid-decision.', 'akaza-adventure' ),
		'alt'        => __( 'HIPAA clinical decision training scenario', 'akaza-adventure' ),
	),
	array(
		'image_url'  => '',
		'file_name'  => __( 'hipaa-certificate.webp', 'akaza-adventure' ),
		'title'      => __( 'Completion certificate', 'akaza-adventure' ),
		'description'=> __( 'The artefact buyers ask to see before purchase.', 'akaza-adventure' ),
		'alt'        => __( 'HIPAA training completion certificate', 'akaza-adventure' ),
	),
);
?>

<section
	id="course-outline"
	class="sl-hipaa-outline"
	aria-labelledby="sl-hipaa-outline-title"
>
	<div class="container">

		<header class="sl-hipaa-outline__intro">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'What is inside', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-hipaa-outline-title">
				<?php esc_html_e( 'The full outline, ', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'published up front.', 'akaza-adventure' ); ?></span>
			</h2>

			<p>
				<?php
				esc_html_e(
					'Your compliance officer can review the complete scope now rather than sitting through a call to find out what is covered.',
					'akaza-adventure'
				);
				?>
			</p>

		</header>

		<div class="sl-hipaa-outline__grid">

			<article class="sl-hipaa-outline__panel">

				<header class="sl-hipaa-outline__panel-header">

					<div>
						<span class="sl-hipaa-outline__panel-label">
							<?php esc_html_e( 'Course content', 'akaza-adventure' ); ?>
						</span>

						<h3>
							<?php esc_html_e( 'Course outline', 'akaza-adventure' ); ?>
						</h3>
					</div>

					<span class="sl-hipaa-outline__count">
						<?php
						printf(
							/* translators: %d: Number of course topics. */
							esc_html(
								_n(
									'%d topic',
									'%d topics',
									count( $course_topics ),
									'akaza-adventure'
								)
							),
							(int) count( $course_topics )
						);
						?>
					</span>

				</header>

				<ol class="sl-hipaa-outline__list">

					<?php foreach ( $course_topics as $index => $topic ) : ?>

						<li
							class="sl-hipaa-outline__item<?php echo $topic['highlight'] ? ' sl-hipaa-outline__item--highlighted' : ''; ?>"
						>
							<span
								class="sl-hipaa-outline__number"
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

							<span class="sl-hipaa-outline__item-text">
								<?php echo esc_html( $topic['title'] ); ?>
							</span>
						</li>

					<?php endforeach; ?>

				</ol>

			</article>

			<article class="sl-hipaa-outline__panel">

				<header class="sl-hipaa-outline__panel-header">

					<div>
						<span class="sl-hipaa-outline__panel-label">
							<?php esc_html_e( 'Practical outcomes', 'akaza-adventure' ); ?>
						</span>

						<h3>
							<?php esc_html_e( 'On completion, staff can', 'akaza-adventure' ); ?>
						</h3>
					</div>

					<span class="sl-hipaa-outline__count">
						<?php
						printf(
							/* translators: %d: Number of learning outcomes. */
							esc_html(
								_n(
									'%d outcome',
									'%d outcomes',
									count( $learning_outcomes ),
									'akaza-adventure'
								)
							),
							(int) count( $learning_outcomes )
						);
						?>
					</span>

				</header>

				<ul class="sl-hipaa-outline__list" role="list">

					<?php foreach ( $learning_outcomes as $outcome ) : ?>

						<li class="sl-hipaa-outline__item">

							<span
								class="sl-hipaa-icon sl-hipaa-outline__check"
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

							<span class="sl-hipaa-outline__item-text">
								<?php echo esc_html( $outcome ); ?>
							</span>

						</li>

					<?php endforeach; ?>

				</ul>

				<div class="sl-hipaa-outline__outcome-note">

					<span
						class="sl-hipaa-icon sl-hipaa-outline__note-icon"
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
								d="M8.7 12L11 14.3L15.6 9.7"
								stroke="currentColor"
								stroke-width="1.7"
								stroke-linecap="round"
								stroke-linejoin="round"
							/>
						</svg>
					</span>

					<p>
						<strong>
							<?php esc_html_e( 'Assessment included.', 'akaza-adventure' ); ?>
						</strong>

						<?php
						esc_html_e(
							'Learners must demonstrate understanding before completion is recorded.',
							'akaza-adventure'
						);
						?>
					</p>

				</div>

			</article>

		</div>

		<div
			class="sl-hipaa-outline__previews"
			aria-label="<?php esc_attr_e( 'Course previews', 'akaza-adventure' ); ?>"
		>

			<?php foreach ( $course_previews as $preview ) : ?>

				<figure class="sl-hipaa-outline__preview">

					<div class="sl-hipaa-outline__browser-bar">

						<span
							class="sl-hipaa-outline__browser-dots"
							aria-hidden="true"
						>
							<i></i>
							<i></i>
							<i></i>
						</span>

						<span class="sl-hipaa-outline__file-name">
							<?php echo esc_html( $preview['file_name'] ); ?>
						</span>

					</div>

					<div class="sl-hipaa-outline__preview-media">

						<?php if ( ! empty( $preview['image_url'] ) ) : ?>

							<img
								src="<?php echo esc_url( $preview['image_url'] ); ?>"
								alt="<?php echo esc_attr( $preview['alt'] ); ?>"
								loading="lazy"
								decoding="async"
								width="720"
								height="405"
							>

						<?php else : ?>

							<div class="sl-hipaa-outline__placeholder">

								<span
									class="sl-hipaa-icon sl-hipaa-outline__placeholder-icon"
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
										<circle
											cx="9"
											cy="10"
											r="1.5"
											stroke="currentColor"
											stroke-width="1.7"
										/>
										<path
											d="M5.5 17L10 12.5L13 15.5L15 13.5L18.5 17"
											stroke="currentColor"
											stroke-width="1.7"
											stroke-linecap="round"
											stroke-linejoin="round"
										/>
									</svg>
								</span>

								<strong>
									<?php echo esc_html( $preview['title'] ); ?>
								</strong>

								<span>
									<?php echo esc_html( $preview['description'] ); ?>
								</span>

							</div>

						<?php endif; ?>

					</div>

					<figcaption class="screen-reader-text">
						<?php echo esc_html( $preview['title'] ); ?>
					</figcaption>

				</figure>

			<?php endforeach; ?>

		</div>

	</div>
</section>