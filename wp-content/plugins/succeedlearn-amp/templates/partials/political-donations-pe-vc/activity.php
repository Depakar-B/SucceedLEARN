<?php
/**
 * Political Donations PE/VC AMP: Political Activity (desktop partial exists; not in page wrapper order).
 *
 * Expected vars: $activities
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section id="political-activity" class="sl-section sl-aml-pe-vc-activity" aria-labelledby="sl-political-donations-pe-vc-activity-title">
	<div class="sl-wrap">
		<div class="sl-aml-intro">
			<span class="sl-eyebrow sl-home-sub-heading">
				<?php esc_html_e( 'Political activity', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-political-donations-pe-vc-activity-title" class="sl-h2">
				<?php
				echo wp_kses(
					__( 'What Counts as Political Contributions, In-Kind Support and <span>Organisational Endorsement?</span>', 'succeedlearn-amp' ),
					array( 'span' => array() )
				);
				?>
			</h2>

			<p>
				<?php esc_html_e( 'Political activity is not limited to direct cash donations. Other forms of support may also need careful consideration depending on the circumstances.', 'succeedlearn-amp' ); ?>
			</p>
		</div>

		<ul class="sl-list sl-aml-list" role="list">
			<?php foreach ( $activities as $index => $activity ) : ?>
				<li class="sl-list-item">
					<span class="sl-aml-number" aria-hidden="true"><?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?></span>
					<span class="sl-list-item__text"><?php echo esc_html( $activity ); ?></span>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>
