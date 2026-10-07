<?php
/**
 * Anti-Bribery AMP: Target audience.
 *
 * Expected vars: $audience
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section id="abac-target-audience" class="sl-section sl-section--alt sl-aml-pe-vc-audience" aria-labelledby="sl-anti-bribery-audience-title">
	<div class="sl-wrap">
		<div class="sl-aml-intro">
			<span class="sl-eyebrow sl-home-sub-heading">
				<?php esc_html_e( 'Target Audience', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-anti-bribery-audience-title" class="sl-h2">
				<?php
				echo wp_kses(
					__( 'Who should take <span>Anti-Bribery and Anti-Corruption training?</span>', 'succeedlearn-amp' ),
					array( 'span' => array() )
				);
				?>
			</h2>

			<p>
				<?php esc_html_e( 'The course is suitable for employees, managers and relevant contractors, with particular value for people who interact with suppliers, intermediaries, clients or public officials, approve expenses or influence commercial decisions.', 'succeedlearn-amp' ); ?>
			</p>
		</div>

		<ul class="sl-aml-outcome-list" role="list">
			<?php foreach ( $audience as $item ) : ?>
				<li class="sl-aml-outcome-list__item">
					<span class="sl-aml-number" aria-hidden="true"><?php echo esc_html( $item['num'] ); ?></span>
					<div>
						<h3 class="sl-panel-title"><?php echo esc_html( $item['title'] ); ?></h3>
					</div>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>
