<?php
/**
 * Code of Conduct — Customer Story Section
 *
 * Circular cycle layout mirrors SAP behaviour section.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$story_steps = array(
	array(
		'number' => '01',
		'title'  => __( 'Challenge', 'akaza-adventure' ),
		'text'   => __( 'The organization needed to communicate its Code consistently across a geographically distributed workforce.', 'akaza-adventure' ),
		'slug'   => 'challenge',
		'angle'  => 0,
	),
	array(
		'number' => '02',
		'title'  => __( 'Solution', 'akaza-adventure' ),
		'text'   => __( 'SucceedLEARN customized the course around the organization’s policies, branding, reporting procedures and workplace scenarios.', 'akaza-adventure' ),
		'slug'   => 'solution',
		'angle'  => 120,
	),
	array(
		'number' => '03',
		'title'  => __( 'Outcome', 'akaza-adventure' ),
		'text'   => __( 'Employees received a consistent learning experience while HR and compliance gained centralized visibility into completion and assessment.', 'akaza-adventure' ),
		'slug'   => 'outcome',
		'angle'  => 240,
	),
);
?>

<section
	class="sl-coc-customer-story"
	aria-labelledby="sl-coc-customer-story-title"
>
	<div class="container">

		<div class="sl-coc-customer-story__heading">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Customer Story', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-coc-customer-story-title">
				<?php
				echo wp_kses(
					__( 'From Policy Rollout to <span>Employee Understanding</span>', 'akaza-adventure' ),
					array( 'span' => array() )
				);
				?>
			</h2>

			<p>
				<?php
				esc_html_e(
					'A consistent Code of Conduct learning experience can help employees understand expectations, apply them in practical situations and make better workplace decisions.',
					'akaza-adventure'
				);
				?>
			</p>

		</div>

		<div class="sl-coc-customer-story__cycle">

			<div class="sl-coc-customer-story__ring" aria-hidden="true"></div>

			<div class="sl-coc-customer-story__centre">
				<p class="sl-coc-customer-story__centre-line">
					<?php esc_html_e( 'Turning policy into', 'akaza-adventure' ); ?>
				</p>
				<p class="sl-coc-customer-story__centre-line">
					<?php esc_html_e( 'practical understanding', 'akaza-adventure' ); ?>
				</p>
			</div>

			<?php foreach ( $story_steps as $step ) : ?>

				<article
					class="sl-coc-customer-story__card sl-coc-customer-story__card--<?php echo esc_attr( $step['slug'] ); ?>"
					style="--sl-coc-orbit-angle: <?php echo esc_attr( (string) (int) $step['angle'] ); ?>deg;"
				>

					<span class="sl-coc-customer-story__number" aria-hidden="true">
						<?php echo esc_html( $step['number'] ); ?>
					</span>

					<div class="sl-coc-customer-story__card-body">
						<h3 class="sl-panel-title">
							<?php echo esc_html( $step['title'] ); ?>
						</h3>

						<p>
							<?php echo esc_html( $step['text'] ); ?>
						</p>
					</div>

				</article>

			<?php endforeach; ?>

		</div>

		<div class="sl-coc-customer-story__action">

			<a
				class="sl-content-btn sl-content-btn-primary"
				href="#"
			>
				<?php esc_html_e( 'Read Customer Success Stories', 'akaza-adventure' ); ?>

				<span aria-hidden="true">→</span>
			</a>

		</div>

	</div>
</section>
