<?php
/**
 * Whistleblowing PE/VC AMP: Target Audience.
 *
 * Expected vars: $audiences
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section id="target-audience" class="sl-section sl-aml-pe-vc-audience" aria-labelledby="sl-whistleblowing-pe-vc-audience-title">
	<div class="sl-wrap">
		<div class="sl-aml-intro">
			<span class="sl-eyebrow sl-home-sub-heading">
				<?php esc_html_e( 'Target Audience', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-whistleblowing-pe-vc-audience-title" class="sl-h2">
				<?php
				echo wp_kses(
					__( 'Who Should Take a <span>Whistleblowing Course?</span>', 'succeedlearn-amp' ),
					array( 'span' => array() )
				);
				?>
			</h2>

			<p>
				<?php esc_html_e( 'This course is relevant to professionals who may identify, receive or need to escalate concerns about workplace wrongdoing.', 'succeedlearn-amp' ); ?>
			</p>
		</div>

		<ul class="sl-aml-outcome-list" role="list">
			<?php foreach ( $audiences as $audience ) : ?>
				<li class="sl-aml-outcome-list__item">
					<div>
						<h3 class="sl-panel-title"><?php echo esc_html( $audience['title'] ); ?></h3>
						<p><?php echo esc_html( $audience['text'] ); ?></p>
					</div>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>
