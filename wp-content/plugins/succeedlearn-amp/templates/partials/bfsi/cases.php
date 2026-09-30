<?php
/**
 * BFSI & PE/VC AMP — Case studies: real consequences of non-compliance.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$cases = succeedlearn_amp_get_bfsi_cases();
?>
<section class="sl-bfsi-cases" aria-labelledby="sl-bfsi-cases-title">
	<div class="sl-wrap">
		<div class="sl-bfsi-cases__layout">
			<div class="sl-bfsi-cases__intro">
				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'Real-World Impact', 'succeedlearn-amp' ); ?>
				</span>

				<h2 id="sl-bfsi-cases-title" class="sl-h2">
					<?php esc_html_e( 'Case Studies: Real Consequences of', 'succeedlearn-amp' ); ?>
					<span><?php esc_html_e( 'Non-Compliance', 'succeedlearn-amp' ); ?></span>
				</h2>

				<div class="sl-bfsi-cases__copy">
					<p><?php esc_html_e( 'Although Social Engineering, Insider Threat, Physical Security, Data Privacy, Third-Party Risk, and AI-based Attacks training are not always explicitly mandated as standalone legal requirements, regulators consistently expect documented, role-based security and privacy training as part of reasonable organizational controls. Companies that fail to train employees on threat recognition, data handling, vendor risks, and incident reporting face significantly higher penalties after incidents, making such training effectively mandatory in practice to demonstrate compliance, due diligence, and risk reduction.', 'succeedlearn-amp' ); ?></p>
					<p><?php esc_html_e( 'Following are a few cases of companies facing penalties, thus highlighting the need for compliance:', 'succeedlearn-amp' ); ?></p>
				</div>
			</div>

			<div class="sl-bfsi-cases__cards">
				<?php foreach ( $cases as $index => $case ) : ?>
					<article class="sl-bfsi-cases__card">
						<span class="sl-bfsi-cases__number" aria-hidden="true">
							<?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?>
						</span>
						<h3 class="sl-panel-title"><?php echo esc_html( $case['title'] ); ?></h3>
						<p><?php echo esc_html( $case['text'] ); ?></p>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>
