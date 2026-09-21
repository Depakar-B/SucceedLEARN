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
		<h2 class="sl-h2"><?php esc_html_e( 'Workplace Learning Solutions', 'succeedlearn-amp' ); ?></h2>
		<div class="sl-gwct-solutions">
			<?php foreach ( $solutions as $solution ) : ?>
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
					<div class="sl-gwct-solution__meta">
						<?php if ( ! empty( $solution['courses'] ) ) : ?>
							<div class="sl-gwct-solution__block">
								<h4><?php esc_html_e( 'Included Learning Courses', 'succeedlearn-amp' ); ?></h4>
								<ul>
									<?php foreach ( $solution['courses'] as $course ) : ?>
										<li><?php echo esc_html( $course ); ?></li>
									<?php endforeach; ?>
								</ul>
							</div>
						<?php endif; ?>
						<?php if ( ! empty( $solution['outcomes'] ) ) : ?>
							<div class="sl-gwct-solution__block">
								<h4><?php esc_html_e( 'Key Learning Outcomes', 'succeedlearn-amp' ); ?></h4>
								<ul>
									<?php foreach ( $solution['outcomes'] as $outcome ) : ?>
										<li><?php echo esc_html( $outcome ); ?></li>
									<?php endforeach; ?>
								</ul>
							</div>
						<?php endif; ?>
					</div>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
