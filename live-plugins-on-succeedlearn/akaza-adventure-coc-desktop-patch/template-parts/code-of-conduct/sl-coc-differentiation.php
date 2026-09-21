<?php
/**
 * Code of Conduct — Differentiation.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$traditional_items = array(
	__( 'Policy-heavy', 'akaza-adventure' ),
	__( 'Passive learning', 'akaza-adventure' ),
	__( 'Generic examples', 'akaza-adventure' ),
	__( 'Standard course', 'akaza-adventure' ),
	__( 'Completion focused', 'akaza-adventure' ),
	__( 'Generic branding', 'akaza-adventure' ),
	__( 'Limited deployment flexibility', 'akaza-adventure' ),
	__( 'Basic reporting', 'akaza-adventure' ),
);

$succeedlearn_items = array(
	__( 'Scenario-driven', 'akaza-adventure' ),
	__( 'Interactive decision-making', 'akaza-adventure' ),
	__( 'Customizable workplace scenarios', 'akaza-adventure' ),
	__( 'Organization-specific experience', 'akaza-adventure' ),
	__( 'Understanding + assessment', 'akaza-adventure' ),
	__( 'Organization branding', 'akaza-adventure' ),
	__( 'LMS or hosted deployment', 'akaza-adventure' ),
	__( 'Learning and compliance visibility', 'akaza-adventure' ),
);
?>

<section class="sl-coc-differentiation" aria-labelledby="sl-coc-differentiation-title">
	<div class="container">

		<div class="sl-coc-differentiation__heading">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Differentiation', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-coc-differentiation-title">
				<?php
				echo wp_kses(
					__( 'More Than Traditional <span>Code of Conduct Training</span>', 'akaza-adventure' ),
					array( 'span' => array() )
				);
				?>
			</h2>

		</div>

		<div class="sl-coc-differentiation__grid">

			<article class="sl-coc-differentiation__card">

				<div class="sl-coc-differentiation__card-head">
					<h3 class="sl-panel-title">
						<?php esc_html_e( 'Traditional Compliance Training', 'akaza-adventure' ); ?>
					</h3>
				</div>

				<ul class="sl-coc-reporting__list">
					<?php foreach ( $traditional_items as $index => $item ) : ?>
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

			<article class="sl-coc-differentiation__card">

				<div class="sl-coc-differentiation__card-head">
					<h3 class="sl-panel-title">
						<?php esc_html_e( 'SucceedLEARN Code of Conduct eLearning', 'akaza-adventure' ); ?>
					</h3>
				</div>

				<ul class="sl-coc-reporting__list">
					<?php foreach ( $succeedlearn_items as $index => $item ) : ?>
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

		</div>

		<div class="sl-coc-section-close">
			<p class="sl-coc-section-close__text">
				<?php esc_html_e( 'The goal isn’t simply to get employees through another mandatory course. The goal is to help employees recognize ethical risks and make better decisions.', 'akaza-adventure' ); ?>
			</p>

			<div class="sl-coc-section-close__actions">
				<a class="sl-content-btn sl-content-btn-primary" href="#contact" data-cta="coc-differentiation-demo">
					<?php esc_html_e( 'Explore Code of Conduct Training', 'akaza-adventure' ); ?>
					<span aria-hidden="true">→</span>
				</a>
			</div>
		</div>

	</div>
</section>
