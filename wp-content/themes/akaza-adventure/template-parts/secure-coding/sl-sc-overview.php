<?php
/**
 * Secure Coding — Course overview.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$pillars = array(
	array(
		'title' => __( 'Prevent rather than remediate', 'akaza-adventure' ),
		'text'  => __( 'Build security into implementation choices before issues become release blockers, incidents or expensive rework.', 'akaza-adventure' ),
		'icon'  => '<path d="M12 3l7 3v5c0 4.8-2.8 8.2-7 10-4.2-1.8-7-5.2-7-10V6l7-3Z"/><path d="m9 12 2 2 4-5"/>',
	),
	array(
		'title' => __( 'Create a shared security language', 'akaza-adventure' ),
		'text'  => __( 'Give development, QA, DevOps and security teams common principles for reviews, requirements and release decisions.', 'akaza-adventure' ),
		'icon'  => '<path d="M8 9l-4 3 4 3"/><path d="m16 9 4 3-4 3"/><path d="m14 5-4 14"/>',
	),
	array(
		'title' => __( 'Strengthen secure-by-default habits', 'akaza-adventure' ),
		'text'  => __( 'Help developers make the safer choice the normal choice — not an extra step reserved for high-risk releases.', 'akaza-adventure' ),
		'icon'  => '<path d="M5 12h14"/><path d="M12 5v14"/><circle cx="12" cy="12" r="9"/>',
	),
);
?>

<section class="sl-sc-overview" id="overview" aria-labelledby="sl-sc-overview-title">
	<div class="container">

		<div class="sl-sc-overview__grid">

			<div class="sl-sc-overview__intro">
				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'Course overview', 'akaza-adventure' ); ?>
				</span>

				<h2 id="sl-sc-overview-title">
					<?php
					echo wp_kses(
						__( 'Security problems often begin with <span>ordinary coding decisions.</span>', 'akaza-adventure' ),
						array( 'span' => array() )
					);
					?>
				</h2>

				<p>
					<?php
					esc_html_e(
						'Code can work exactly as intended and still expose data, trust the wrong input, grant too much access or fail insecurely. Secure coding training helps teams recognise these moments early — while the code is still inexpensive to change.',
						'akaza-adventure'
					);
					?>
				</p>
			</div>

			<div class="sl-sc-overview__side">

				<div class="sl-sc-overview__answer">
					<p>
						<strong><?php esc_html_e( 'What is secure coding training?', 'akaza-adventure' ); ?></strong>
					</p>
					<p>
						<?php
						esc_html_e(
							'It is practical developer education focused on preventing software vulnerabilities through safer design, implementation, review and testing habits. Instead of memorising attack names, learners understand how to make better decisions at trust boundaries, around sensitive data, during authentication and authorisation, when handling errors, and when choosing dependencies.',
							'akaza-adventure'
						);
						?>
					</p>
				</div>

				<div class="sl-sc-overview__pillars" aria-label="<?php esc_attr_e( 'Why secure coding matters', 'akaza-adventure' ); ?>">
					<?php foreach ( $pillars as $pillar ) : ?>
						<div class="sl-sc-overview__pillar">
							<div class="sl-sc-overview__icon" aria-hidden="true">
								<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" focusable="false">
									<?php echo $pillar['icon']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG paths. ?>
								</svg>
							</div>
							<div>
								<h3 class="sl-panel-title"><?php echo esc_html( $pillar['title'] ); ?></h3>
								<p><?php echo esc_html( $pillar['text'] ); ?></p>
							</div>
						</div>
					<?php endforeach; ?>
				</div>

			</div>

		</div>

	</div>
</section>
