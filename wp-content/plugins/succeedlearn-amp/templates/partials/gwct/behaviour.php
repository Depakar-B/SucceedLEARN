<?php
/**
 * GWCT AMP — Behaviour / learning section.
 *
 * Expected vars: $behaviour_image (optional), $behaviour_image_alt (optional)
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$behaviour_image     = isset( $behaviour_image ) ? (string) $behaviour_image : '';
$behaviour_image_alt = isset( $behaviour_image_alt ) ? (string) $behaviour_image_alt : __( 'Workplace behaviour learning', 'succeedlearn-amp' );
$has_behaviour_image = ( '' !== $behaviour_image );
?>
<section class="sl-section">
	<div class="sl-wrap<?php echo $has_behaviour_image ? ' sl-gwct-split' : ''; ?>">
		<div class="sl-gwct-split__content">
			<span class="sl-eyebrow"><?php esc_html_e( 'Behaviour change', 'succeedlearn-amp' ); ?></span>
			<h2 class="sl-h2">
				<?php
				echo wp_kses(
					__( 'More Than Compliance. Learning That Changes <span>Workplace Behaviour</span>', 'succeedlearn-amp' ),
					array( 'span' => array() )
				);
				?>
			</h2>
			<ul class="sl-list sl-gwct-points">
				<li class="sl-list-item">
					<?php succeedlearn_amp_gwct_render_point_icon( 'journal-check' ); ?>
					<span class="sl-list-item__text"><?php esc_html_e( 'Policies establish expectations.', 'succeedlearn-amp' ); ?></span>
				</li>
				<li class="sl-list-item">
					<?php succeedlearn_amp_gwct_render_point_icon( 'people-fill' ); ?>
					<span class="sl-list-item__text"><?php esc_html_e( 'People shape workplace culture.', 'succeedlearn-amp' ); ?></span>
				</li>
			</ul>
			<p class="sl-lead"><?php esc_html_e( 'Effective workplace learning goes beyond checking compliance boxes. It empowers employees to make better decisions, build stronger relationships, and contribute to workplaces where everyone feels respected, valued, and able to succeed.', 'succeedlearn-amp' ); ?></p>
			<p class="sl-lead"><?php esc_html_e( 'SucceedLEARN combines storytelling, realistic workplace scenarios, interactive decision-making, and globally relevant content to help learners confidently apply what they’ve learned in everyday workplace situations.', 'succeedlearn-amp' ); ?></p>
		</div>
		<?php if ( $has_behaviour_image ) : ?>
			<div class="sl-gwct-split__visual">
				<div class="sl-gwct-media">
					<amp-img
						src="<?php echo esc_url( $behaviour_image ); ?>"
						width="640"
						height="480"
						layout="responsive"
						alt="<?php echo esc_attr( $behaviour_image_alt ); ?>"
					></amp-img>
				</div>
			</div>
		<?php endif; ?>
	</div>
</section>
