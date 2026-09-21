<?php
/**
 * Inclusive Workplace Training — From course completion to meaningful follow-through.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$followthrough_items = array(
	__( 'Manager-led discussions', 'akaza-adventure' ),
	__( 'Clear reminders of reporting channels', 'akaza-adventure' ),
	__( 'Regular policy communication', 'akaza-adventure' ),
	__( 'Fair and consistent responses to concerns', 'akaza-adventure' ),
	__( 'Opportunities for employee feedback', 'akaza-adventure' ),
	__( 'Review of recruitment and people-management practices', 'akaza-adventure' ),
	__( 'Continued leadership accountability', 'akaza-adventure' ),
);

// Optional image for the left column (set URL when asset is ready).
$followthrough_image = '';
?>
<section class="sl-inclusive-followthrough" id="inclusive-followthrough" aria-labelledby="sl-inclusive-followthrough-heading">
	<div class="container-xl">
		<div class="sl-inclusive-followthrough__inner">

			<h2 id="sl-inclusive-followthrough-heading">
				<?php esc_html_e( 'From course completion to meaningful follow-through', 'akaza-adventure' ); ?>
			</h2>

			<p>
				<?php esc_html_e( 'Completion records can show who finished a module. They cannot tell the whole story of workplace culture.', 'akaza-adventure' ); ?>
			</p>

			<h3 class="sl-inclusive-followthrough__list-intro">
				<?php esc_html_e( 'Organisations can strengthen the value of training by following it with:', 'akaza-adventure' ); ?>
			</h3>

			<div class="sl-inclusive-followthrough__split">
				<div class="sl-inclusive-followthrough__media">
					<?php if ( $followthrough_image ) : ?>
						<img
							src="<?php echo esc_url( $followthrough_image ); ?>"
							alt=""
							loading="lazy"
							decoding="async"
						/>
					<?php endif; ?>
				</div>

				<ul class="sl-inclusive-followthrough__list" role="list">
					<?php foreach ( $followthrough_items as $item ) : ?>
						<li>
							<span class="sl-inclusive-followthrough__icon" aria-hidden="true">
								<i class="bi bi-check2"></i>
							</span>
							<span><?php echo esc_html( $item ); ?></span>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>

			<p class="sl-inclusive-followthrough__closing">
				<?php esc_html_e( 'Training works best when employees see that its principles are reinforced after the course closes.', 'akaza-adventure' ); ?>
			</p>

			<div class="sl-inclusive-followthrough__actions">
				<a href="#contact" class="sl-content-btn sl-content-btn-primary">
					<?php esc_html_e( 'Request a Demo', 'akaza-adventure' ); ?>
				</a>
			</div>

		</div>
	</div>
</section>
