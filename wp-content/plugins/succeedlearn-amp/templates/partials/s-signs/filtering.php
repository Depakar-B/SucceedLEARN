<?php
/**
 * S-Signs AMP — Meet S-Signs / The Visual Reinforcement Layer.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$filtering_image = function_exists( 'succeedlearn_amp_get_ss_filtering_image' )
	? succeedlearn_amp_get_ss_filtering_image()
	: 'https://succeedlearn.com/wp-content/uploads/2026/09/The-Visual-Reinforcement-Layer-of-SBCS.webp';
?>
<section class="sl-s-signs-filtering" aria-labelledby="sl-s-signs-filtering-title">
	<div class="sl-wrap">
		<div class="sl-s-signs-filtering__grid">
			<div class="sl-s-signs-filtering__content">
				<span class="sl-home-sub-heading"><?php esc_html_e( 'Meet S-Signs', 'succeedlearn-amp' ); ?></span>
				<h2 id="sl-s-signs-filtering-title" class="sl-h2">
					<?php esc_html_e( 'The Visual Reinforcement Layer of', 'succeedlearn-amp' ); ?>
					<span><?php esc_html_e( 'SucceedLEARN SBCS', 'succeedlearn-amp' ); ?></span>
				</h2>
				<div class="sl-s-signs-filtering__copy">
					<p><?php esc_html_e( 'S-Signs brings visual cybersecurity awareness into the everyday employee environment.', 'succeedlearn-amp' ); ?></p>
					<p><?php esc_html_e( 'Through professionally designed security-awareness posters and digital nudges, organisations can reinforce important security messages between formal training sessions, phishing campaigns, microlearning activities and other awareness interventions.', 'succeedlearn-amp' ); ?></p>
					<p><?php esc_html_e( 'Instead of asking employees to repeatedly complete learning, S-Signs provides short visual prompts that keep key cybersecurity concepts present throughout the year.', 'succeedlearn-amp' ); ?></p>
					<p><?php esc_html_e( 'Administrators can browse and filter available content, select relevant posters and distribute visual awareness across physical and digital communication channels.', 'succeedlearn-amp' ); ?></p>
					<p><strong><?php esc_html_e( 'Short message. Clear behaviour. Continuous awareness.', 'succeedlearn-amp' ); ?></strong></p>
				</div>
			</div>
			<div class="sl-s-signs-filtering__media">
				<div class="sl-s-signs-filtering__image">
					<amp-img
						src="<?php echo esc_url( $filtering_image ); ?>"
						width="800"
						height="600"
						layout="responsive"
						alt="<?php esc_attr_e( 'The Visual Reinforcement Layer of SucceedLEARN SBCS', 'succeedlearn-amp' ); ?>"
					></amp-img>
				</div>
			</div>
		</div>
	</div>
</section>
