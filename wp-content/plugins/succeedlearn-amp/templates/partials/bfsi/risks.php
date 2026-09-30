<?php
/**
 * BFSI & PE/VC AMP — Cybersecurity risks covered in the course.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$risks = succeedlearn_amp_get_bfsi_risks();
?>
<section
	class="sl-bfsi-risks"
	id="cybersecurity-risks-covered"
	aria-labelledby="sl-bfsi-risks-title"
>
	<div class="sl-wrap">
		<div class="sl-bfsi-risks__heading">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Course Coverage', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-bfsi-risks-title" class="sl-h2">
				<?php esc_html_e( 'Cybersecurity Risks Covered in the', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'Course', 'succeedlearn-amp' ); ?></span>
			</h2>
		</div>

		<div class="sl-bfsi-risks__grid">
			<?php foreach ( $risks as $risk ) : ?>
				<article class="sl-bfsi-risks__card">
					<div class="sl-bfsi-risks__media">
						<amp-img
							src="<?php echo esc_url( $risk['image'] ); ?>"
							width="640"
							height="360"
							layout="responsive"
							alt="<?php echo esc_attr( $risk['alt'] ); ?>"
						></amp-img>
					</div>

					<div class="sl-bfsi-risks__content">
						<h3 class="sl-panel-title"><?php echo esc_html( $risk['title'] ); ?></h3>

						<?php foreach ( $risk['copy'] as $paragraph ) : ?>
							<p><?php echo esc_html( $paragraph ); ?></p>
						<?php endforeach; ?>

						<p class="sl-bfsi-risks__topics">
							<strong><?php esc_html_e( 'Key areas:', 'succeedlearn-amp' ); ?></strong>
							<?php echo esc_html( $risk['topics'] ); ?>
						</p>
					</div>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
