<?php
/**
 * Cybersecurity Awareness AMP — Campaign section.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$campaign = succeedlearn_amp_csa_campaign_data();
?>
<section class="sl-section sl-csa-campaign" id="campaign" aria-labelledby="sl-csa-campaign-title">
	<div class="sl-wrap">
		<header class="sl-csa-section-heading">
			<span class="sl-home-sub-heading"><?php esc_html_e( 'One Complete Campaign', 'succeedlearn-amp' ); ?></span>
			<h2 id="sl-csa-campaign-title" class="sl-h2">
				<?php echo wp_kses_post( __( 'From awareness to <span>measurable action</span>', 'succeedlearn-amp' ) ); ?>
			</h2>
			<p class="sl-lead"><?php echo esc_html( $campaign['intro'] ); ?></p>
		</header>

		<?php foreach ( $campaign['rows'] as $index => $row ) : ?>
			<article class="sl-csa-campaign__row<?php echo 1 === $index ? ' sl-csa-campaign__row--reverse' : ''; ?>">
				<div class="sl-csa-campaign__content">
					<span class="sl-csa-campaign__number" aria-hidden="true"><?php echo esc_html( $row['number'] ); ?></span>
					<h3><?php echo esc_html( $row['title'] ); ?></h3>
					<p><?php echo esc_html( $row['text'] ); ?></p>
					<ul class="sl-csa-checklist">
						<?php foreach ( $row['items'] as $item ) : ?>
							<li>
								<span aria-hidden="true">✓</span>
								<?php echo esc_html( $item ); ?>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>

				<?php if ( ! empty( $row['image'] ) ) : ?>
					<div class="sl-csa-campaign__image">
						<amp-img
							src="<?php echo esc_url( $row['image'] ); ?>"
							width="1254"
							height="1254"
							layout="responsive"
							alt="<?php echo esc_attr( ! empty( $row['alt'] ) ? $row['alt'] : $row['title'] ); ?>"
						></amp-img>
					</div>
				<?php else : ?>
					<div class="sl-csa-placeholder" role="img" aria-label="<?php esc_attr_e( 'Campaign interface preview', 'succeedlearn-amp' ); ?>">
						<span aria-hidden="true">▥</span>
						<strong><?php esc_html_e( 'Campaign preview', 'succeedlearn-amp' ); ?></strong>
					</div>
				<?php endif; ?>
			</article>
		<?php endforeach; ?>
	</div>
</section>
