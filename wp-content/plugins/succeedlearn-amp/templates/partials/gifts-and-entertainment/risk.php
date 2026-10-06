<?php
/**
 * Gifts and Entertainment AMP: Compliance Risks.
 *
 * Expected vars: $risk_items
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section id="risk" class="sl-section sl-aml-pe-vc-risk" aria-labelledby="sl-gifts-risk-title">
	<div class="sl-wrap">
		<div class="sl-aml-intro">
			<span class="sl-eyebrow sl-home-sub-heading">
				<?php esc_html_e( 'PE/VC compliance risk', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-gifts-risk-title" class="sl-h2">
				<?php esc_html_e( 'Gifts and Entertainment Compliance Risks', 'succeedlearn-amp' ); ?>
			</h2>

			<div class="sl-aml-copy">
				<p>
					<?php esc_html_e( 'Gifts and entertainment can support legitimate professional relationships, but inappropriate benefits may create actual or perceived conflicts of interest, bribery concerns, regulatory scrutiny or reputational risk.', 'succeedlearn-amp' ); ?>
				</p>
				<p>
					<?php esc_html_e( 'This becomes particularly important in PE/VC environments, where professionals regularly engage with investors, advisers, vendors and portfolio company stakeholders around significant commercial decisions.', 'succeedlearn-amp' ); ?>
				</p>
			</div>
		</div>

		<ul class="sl-aml-outcome-list" role="list">
			<?php foreach ( $risk_items as $item ) : ?>
				<li class="sl-aml-outcome-list__item">
					<span class="sl-aml-number" aria-hidden="true"><?php echo esc_html( $item['num'] ); ?></span>
					<div>
						<h3 class="sl-panel-title"><?php echo esc_html( $item['title'] ); ?></h3>
						<p><?php echo esc_html( $item['text'] ); ?></p>
					</div>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>
