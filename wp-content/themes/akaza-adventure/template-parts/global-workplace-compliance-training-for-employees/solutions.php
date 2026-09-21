<?php
/**
 * Global Workplace Compliance Training for Employees — Workplace Learning Solutions.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$solutions = array(
	array(
		'id'          => 'inclusive-workplace-training',
		'title'       => __( 'Inclusive Workplace Training', 'akaza-adventure' ),
		'subtitle'    => __( 'Create workplaces where everyone can contribute, collaborate, and belong.', 'akaza-adventure' ),
		'intro'       => __( 'Inclusive workplaces are built through everyday actions that encourage respect, reduce bias, and create a sense of belonging.', 'akaza-adventure' ),
		'body'        => __( 'Our Inclusive Workplace learning solutions help employees and leaders recognise unconscious bias, build inclusive behaviours, strengthen collaboration, and develop the confidence to support colleagues through positive everyday interactions.', 'akaza-adventure' ),
		'courses'     => array(
			__( 'Diversity, Equality, Inclusion and Belonging [DEIB]', 'akaza-adventure' ),
			__( 'Unconscious Bias Training', 'akaza-adventure' ),
			__( 'Bystander Intervention Training', 'akaza-adventure' ),
		),
		'outcomes'    => array(
			__( 'Build awareness of diverse perspectives.', 'akaza-adventure' ),
			__( 'Recognise and reduce unconscious bias.', 'akaza-adventure' ),
			__( 'Strengthen inclusive leadership behaviours.', 'akaza-adventure' ),
			__( 'Foster psychological safety and belonging.', 'akaza-adventure' ),
		),
		'cta_label'   => __( 'Explore Inclusive Workplace Training', 'akaza-adventure' ),
		'cta_url'     => '#inclusive-workplace-training',
	),
	array(
		'id'          => 'workplace-harassment-prevention-training',
		'title'       => __( 'Workplace Harassment Prevention Training', 'akaza-adventure' ),
		'subtitle'    => __( 'Create respectful workplaces built on dignity, accountability, and trust.', 'akaza-adventure' ),
		'intro'       => __( 'Respect is the foundation of every successful workplace.', 'akaza-adventure' ),
		'body'        => __( 'Our workplace conduct training helps organisations prevent workplace harassment, promote respectful behaviour, and ensure employees understand their responsibilities.', 'akaza-adventure' ),
		'body_extra'  => __( 'Designed to support regional compliance requirements while building a positive workplace culture.', 'akaza-adventure' ),
		'courses'     => array(
			array(
				'label' => __( 'Sexual Harassment Prevention Training (United States)', 'akaza-adventure' ),
				'flag'  => 'us',
			),
			array(
				'label' => __( 'Prevention of Workplace Harassment Training (United Kingdom)', 'akaza-adventure' ),
				'flag'  => 'gb',
			),
			array(
				'label' => __( 'Prevention of Sexual Harassment (POSH) - Global Framework', 'akaza-adventure' ),
				'icon'  => 'bi-globe2',
			),
			array(
				'label' => __( 'Prevention of Sexual Harassment (POSH) - India', 'akaza-adventure' ),
				'flag'  => 'in',
			),
		),
		'outcomes'    => array(
			__( 'Prevent workplace harassment.', 'akaza-adventure' ),
			__( 'Understand employee and manager responsibilities.', 'akaza-adventure' ),
			__( 'Respond appropriately to workplace concerns.', 'akaza-adventure' ),
			__( 'Promote respectful workplace behaviours.', 'akaza-adventure' ),
			__( 'Strengthen workplace accountability.', 'akaza-adventure' ),
		),
		'cta_label'   => __( 'Explore Workplace Harassment Prevention', 'akaza-adventure' ),
		'cta_url'     => '#workplace-harassment-prevention-training',
	),
	array(
		'id'          => 'responsible-use-of-generative-ai-training',
		'title'       => __( 'Responsible Use of Generative AI Training', 'akaza-adventure' ),
		'subtitle'    => __( 'Empower employees to use Artificial Intelligence responsibly and ethically.', 'akaza-adventure' ),
		'intro'       => __( 'Artificial Intelligence is transforming how organisations work, but responsible AI adoption requires informed human decisions.', 'akaza-adventure' ),
		'body'        => __( 'Our Responsible Use of AI training helps employees understand AI ethics, recognise bias, protect confidential information, and use generative AI responsibly in everyday work.', 'akaza-adventure' ),
		'body_extra'  => __( 'Responsible technology begins with responsible people.', 'akaza-adventure' ),
		'outcomes'    => array(
			__( 'Understand responsible AI principles.', 'akaza-adventure' ),
			__( 'Recognise AI bias and limitations.', 'akaza-adventure' ),
			__( 'Protect privacy and confidential information.', 'akaza-adventure' ),
			__( 'Use AI confidently and ethically.', 'akaza-adventure' ),
			__( 'Apply responsible AI practices at work.', 'akaza-adventure' ),
		),
		/* Set image URL when the asset is ready. */
		'image'       => '',
		'image_alt'   => __( 'Responsible Use of Generative AI training', 'akaza-adventure' ),
		'cta_label'   => __( 'Explore Responsible Use of Generative AI Training', 'akaza-adventure' ),
		'cta_url'     => '#responsible-use-of-generative-ai-training',
	),
);
?>
<section id="solutions" class="sl-global-solutions-section" aria-labelledby="sl-global-solutions-heading">

	<div class="container">

		<div class="sl-global-solutions-heading">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Our solutions', 'akaza-adventure' ); ?>
			</span>
			<h2 id="sl-global-solutions-heading">
				<?php
				echo wp_kses(
					__( 'Workplace Learning <span>Solutions</span>', 'akaza-adventure' ),
					array( 'span' => array() )
				);
				?>
			</h2>
		</div>

		<div class="sl-global-solutions-list">

			<?php foreach ( $solutions as $solution ) : ?>
				<?php
				$has_courses  = ! empty( $solution['courses'] );
				$has_outcomes = ! empty( $solution['outcomes'] );
				$has_image    = array_key_exists( 'image', $solution );
				$has_meta     = $has_courses || $has_outcomes || $has_image;
				$card_class   = 'sl-global-solution';
				if ( empty( $solution['subtitle'] ) && empty( $solution['intro'] ) && empty( $solution['body'] ) && empty( $solution['body_extra'] ) && ! $has_meta ) {
					$card_class .= ' sl-global-solution--placeholder';
				}
				$meta_class = 'sl-global-solution__meta';
				if ( $has_image ) {
					$meta_class .= ' sl-global-solution__meta--with-media';
				}
				?>
				<article
					id="<?php echo esc_attr( $solution['id'] ); ?>"
					class="<?php echo esc_attr( $card_class ); ?>"
					aria-labelledby="<?php echo esc_attr( $solution['id'] . '-title' ); ?>"
				>

					<div class="sl-global-solution__head">
						<h3 id="<?php echo esc_attr( $solution['id'] . '-title' ); ?>" class="sl-global-solution__title">
							<?php echo esc_html( $solution['title'] ); ?>
						</h3>

						<?php if ( ! empty( $solution['subtitle'] ) ) : ?>
							<p class="sl-global-solution__subtitle">
								<?php echo esc_html( $solution['subtitle'] ); ?>
							</p>
						<?php endif; ?>
					</div>

					<?php if ( ! empty( $solution['intro'] ) || ! empty( $solution['body'] ) || ! empty( $solution['body_extra'] ) ) : ?>
						<div class="sl-global-solution__copy">
							<?php if ( ! empty( $solution['intro'] ) ) : ?>
								<p class="sl-global-solution__text sl-global-solution__text--lead">
									<?php echo esc_html( $solution['intro'] ); ?>
								</p>
							<?php endif; ?>

							<?php if ( ! empty( $solution['body'] ) ) : ?>
								<p class="sl-global-solution__text">
									<?php echo esc_html( $solution['body'] ); ?>
								</p>
							<?php endif; ?>

							<?php if ( ! empty( $solution['body_extra'] ) ) : ?>
								<p class="sl-global-solution__text">
									<?php echo esc_html( $solution['body_extra'] ); ?>
								</p>
							<?php endif; ?>
						</div>
					<?php endif; ?>

					<?php if ( $has_meta ) : ?>
						<div class="<?php echo esc_attr( $meta_class ); ?>">

							<?php if ( $has_courses ) : ?>
								<div class="sl-global-solution__block sl-global-solution__block--courses">
									<h4 class="sl-global-solution__label">
										<span class="sl-global-solution__label-icon" aria-hidden="true">
											<i class="bi bi-collection-play"></i>
										</span>
										<?php esc_html_e( 'Included Learning Courses', 'akaza-adventure' ); ?>
									</h4>
									<ul class="sl-global-solution__list">
										<?php foreach ( $solution['courses'] as $course ) : ?>
											<?php
											$course_label = is_array( $course ) ? ( $course['label'] ?? '' ) : $course;
											$course_flag  = ( is_array( $course ) && ! empty( $course['flag'] ) ) ? sanitize_key( $course['flag'] ) : '';
											$course_icon  = ( is_array( $course ) && ! empty( $course['icon'] ) ) ? $course['icon'] : 'bi-mortarboard-fill';
											?>
											<li class="sl-global-solution__chip">
												<span class="sl-global-solution__chip-icon<?php echo $course_flag ? ' sl-global-solution__chip-icon--flag' : ''; ?>" aria-hidden="true">
													<?php if ( $course_flag ) : ?>
														<img
															src="<?php echo esc_url( 'https://flagcdn.com/w80/' . $course_flag . '.png' ); ?>"
															srcset="<?php echo esc_url( 'https://flagcdn.com/w160/' . $course_flag . '.png' ); ?> 2x"
															alt=""
															width="40"
															height="30"
															loading="lazy"
															decoding="async"
														/>
													<?php else : ?>
														<i class="bi <?php echo esc_attr( $course_icon ); ?>"></i>
													<?php endif; ?>
												</span>
												<span class="sl-global-solution__chip-text"><?php echo esc_html( $course_label ); ?></span>
											</li>
										<?php endforeach; ?>
									</ul>
								</div>
							<?php endif; ?>

							<?php if ( $has_outcomes ) : ?>
								<div class="sl-global-solution__block sl-global-solution__block--outcomes">
									<h4 class="sl-global-solution__label">
										<span class="sl-global-solution__label-icon" aria-hidden="true">
											<i class="bi bi-bullseye"></i>
										</span>
										<?php esc_html_e( 'Key Learning Outcomes', 'akaza-adventure' ); ?>
									</h4>
									<ul class="sl-global-solution__list">
										<?php foreach ( $solution['outcomes'] as $outcome ) : ?>
											<li class="sl-global-solution__chip">
												<span class="sl-global-solution__chip-icon" aria-hidden="true">
													<i class="bi bi-check-lg"></i>
												</span>
												<span class="sl-global-solution__chip-text"><?php echo esc_html( $outcome ); ?></span>
											</li>
										<?php endforeach; ?>
									</ul>
								</div>
							<?php endif; ?>

							<?php if ( $has_image ) : ?>
								<div class="sl-global-solution__media">
									<?php if ( ! empty( $solution['image'] ) ) : ?>
										<img
											src="<?php echo esc_url( $solution['image'] ); ?>"
											alt="<?php echo esc_attr( ! empty( $solution['image_alt'] ) ? $solution['image_alt'] : '' ); ?>"
											loading="lazy"
											decoding="async"
										/>
									<?php endif; ?>
								</div>
							<?php endif; ?>

						</div>
					<?php endif; ?>

					<?php if ( ! empty( $solution['cta_label'] ) && ! empty( $solution['cta_url'] ) ) : ?>
						<div class="sl-global-solution__actions">
							<a href="<?php echo esc_url( $solution['cta_url'] ); ?>" class="sl-content-btn sl-content-btn-primary">
								<?php echo esc_html( $solution['cta_label'] ); ?>
							</a>
						</div>
					<?php endif; ?>

				</article>
			<?php endforeach; ?>

		</div>

	</div>

</section>
