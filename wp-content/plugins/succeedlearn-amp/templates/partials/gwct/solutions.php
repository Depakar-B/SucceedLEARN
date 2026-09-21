<?php
/**
 * GWCT AMP — Workplace learning solutions section.
 *
 * Expected vars: $solutions
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section class="sl-section" id="solutions">
	<div class="sl-wrap">
		<span class="sl-eyebrow"><?php esc_html_e( 'Our solutions', 'succeedlearn-amp' ); ?></span>
		<h2 class="sl-h2">
			<?php
			echo wp_kses(
				__( 'Workplace Learning <span>Solutions</span>', 'succeedlearn-amp' ),
				array( 'span' => array() )
			);
			?>
		</h2>
		<div class="sl-gwct-solutions">
			<?php foreach ( $solutions as $solution ) : ?>
				<?php
				$has_courses  = ! empty( $solution['courses'] );
				$has_outcomes = ! empty( $solution['outcomes'] );
				$has_image    = array_key_exists( 'image', $solution );
				$has_meta     = $has_courses || $has_outcomes || $has_image;
				$meta_class   = 'sl-gwct-solution__meta';
				if ( $has_image ) {
					$meta_class .= ' sl-gwct-solution__meta--with-media';
				}
				$image_url = $has_image ? (string) $solution['image'] : '';
				$image_alt = ! empty( $solution['image_alt'] ) ? (string) $solution['image_alt'] : '';
				?>
				<article id="<?php echo esc_attr( $solution['id'] ); ?>" class="sl-gwct-solution">
					<h3><?php echo esc_html( $solution['title'] ); ?></h3>
					<?php if ( ! empty( $solution['subtitle'] ) ) : ?>
						<p class="sl-gwct-solution__subtitle"><?php echo esc_html( $solution['subtitle'] ); ?></p>
					<?php endif; ?>
					<?php if ( ! empty( $solution['intro'] ) ) : ?>
						<p><?php echo esc_html( $solution['intro'] ); ?></p>
					<?php endif; ?>
					<?php if ( ! empty( $solution['body'] ) ) : ?>
						<p><?php echo esc_html( $solution['body'] ); ?></p>
					<?php endif; ?>
					<?php if ( ! empty( $solution['body_extra'] ) ) : ?>
						<p><?php echo esc_html( $solution['body_extra'] ); ?></p>
					<?php endif; ?>

					<?php if ( $has_meta ) : ?>
						<div class="<?php echo esc_attr( $meta_class ); ?>">
							<?php if ( $has_courses ) : ?>
								<div class="sl-gwct-solution__block">
									<h4 class="sl-gwct-solution__label">
										<?php succeedlearn_amp_gwct_render_icon( 'collection-play', 'sl-gwct-solution__label-icon' ); ?>
										<?php esc_html_e( 'Included Learning Courses', 'succeedlearn-amp' ); ?>
									</h4>
									<ul class="sl-list">
										<?php foreach ( $solution['courses'] as $course ) : ?>
											<?php
											$course_label = is_array( $course ) ? ( $course['label'] ?? '' ) : $course;
											$course_flag  = ( is_array( $course ) && ! empty( $course['flag'] ) ) ? sanitize_key( $course['flag'] ) : '';
											$course_icon  = ( is_array( $course ) && ! empty( $course['icon'] ) ) ? (string) $course['icon'] : 'mortarboard-fill';
											$item_class   = 'sl-list-item';

											if ( $course_flag ) {
												$item_class .= ' sl-gwct-course--flag';
											} else {
												$icon_key = sanitize_key( $course_icon );
												if (
													in_array( $icon_key, array( 'globe', 'globe2', 'bi-globe2', 'bi-globe' ), true )
													|| false !== stripos( $course_label, 'Global Framework' )
												) {
													$course_icon = 'globe';
												}
											}
											?>
											<li class="<?php echo esc_attr( $item_class ); ?>">
												<?php if ( $course_flag ) : ?>
													<span class="sl-gwct-solution__chip-icon sl-gwct-solution__chip-icon--flag" aria-hidden="true">
														<amp-img
															src="<?php echo esc_url( 'https://flagcdn.com/w40/' . $course_flag . '.png' ); ?>"
															srcset="<?php echo esc_url( 'https://flagcdn.com/w80/' . $course_flag . '.png' ); ?> 2x"
															width="28"
															height="21"
															alt=""
															layout="fixed"
														></amp-img>
													</span>
												<?php else : ?>
													<?php succeedlearn_amp_gwct_render_icon( $course_icon, 'sl-gwct-solution__chip-icon' ); ?>
												<?php endif; ?>
												<span class="sl-list-item__text"><?php echo esc_html( $course_label ); ?></span>
											</li>
										<?php endforeach; ?>
									</ul>
								</div>
							<?php endif; ?>

							<?php if ( $has_outcomes ) : ?>
								<div class="sl-gwct-solution__block">
									<h4 class="sl-gwct-solution__label">
										<?php succeedlearn_amp_gwct_render_icon( 'bullseye', 'sl-gwct-solution__label-icon' ); ?>
										<?php esc_html_e( 'Key Learning Outcomes', 'succeedlearn-amp' ); ?>
									</h4>
									<ul class="sl-list">
										<?php foreach ( $solution['outcomes'] as $outcome ) : ?>
											<li class="sl-list-item">
												<?php succeedlearn_amp_gwct_render_icon( 'check-lg', 'sl-gwct-solution__chip-icon' ); ?>
												<span class="sl-list-item__text"><?php echo esc_html( $outcome ); ?></span>
											</li>
										<?php endforeach; ?>
									</ul>
								</div>
							<?php endif; ?>

							<?php if ( $has_image ) : ?>
								<div class="sl-gwct-solution__media">
									<?php if ( '' !== $image_url ) : ?>
										<amp-img
											src="<?php echo esc_url( $image_url ); ?>"
											width="640"
											height="480"
											layout="responsive"
											alt="<?php echo esc_attr( $image_alt ); ?>"
										></amp-img>
									<?php else : ?>
										<div
											class="sl-gwct-solution__image-placeholder"
											role="img"
											aria-label="<?php echo esc_attr( $image_alt ? $image_alt : __( 'Solution image placeholder', 'succeedlearn-amp' ) ); ?>"
										>
											<span><?php esc_html_e( 'Image placeholder', 'succeedlearn-amp' ); ?></span>
											<small><?php esc_html_e( 'Recommended: 640 × 480 px', 'succeedlearn-amp' ); ?></small>
										</div>
									<?php endif; ?>
								</div>
							<?php endif; ?>
						</div>
					<?php endif; ?>

					<?php if ( ! empty( $solution['cta_label'] ) && ! empty( $solution['cta_url'] ) ) : ?>
						<p class="sl-gwct-solution__actions">
							<a class="sl-btn sl-btn--primary" href="<?php echo esc_url( $solution['cta_url'] ); ?>">
								<?php echo esc_html( $solution['cta_label'] ); ?>
							</a>
						</p>
					<?php endif; ?>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
