<?php
/**
 * S-Signs AMP — Directive Posters & Behavioural Nudges.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$nudges_image = function_exists( 'succeedlearn_amp_get_ss_nudges_image' )
	? succeedlearn_amp_get_ss_nudges_image()
	: 'https://succeedlearn.com/wp-content/uploads/2026/09/S-Signs-Directive-and-Nudge-Posters.webp';
?>
<section class="sl-s-signs-nudges" aria-labelledby="sl-s-signs-nudges-title">
	<div class="sl-wrap">
		<div class="sl-s-signs-nudges__intro">
			<span class="sl-home-sub-heading"><?php esc_html_e( 'Two Communication Styles', 'succeedlearn-amp' ); ?></span>
			<h2 id="sl-s-signs-nudges-title" class="sl-h2">
				<?php esc_html_e( 'Directive Posters &', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'Behavioural Nudges', 'succeedlearn-amp' ); ?></span>
			</h2>
			<h3 class="sl-s-signs-nudges__subtitle">
				<?php esc_html_e( 'Different Messages for Different Awareness Objectives', 'succeedlearn-amp' ); ?>
			</h3>
			<p><?php esc_html_e( 'Not every security message needs to be communicated in the same way.', 'succeedlearn-amp' ); ?></p>
			<p><?php esc_html_e( 'S-Signs supports different types of visual reinforcement depending on what the organisation wants employees to understand or do.', 'succeedlearn-amp' ); ?></p>
		</div>

		<div class="sl-s-signs-nudges__layout">
			<div class="sl-s-signs-nudges__content">
				<div class="sl-s-signs-nudges__grid">
					<article class="sl-s-signs-nudges__card">
						<h3 class="sl-panel-title"><?php esc_html_e( 'Directive Security Posters', 'succeedlearn-amp' ); ?></h3>
						<p><?php esc_html_e( 'Clear, instructional visual content that communicates expected employee behaviours, security responsibilities or organisational best practices.', 'succeedlearn-amp' ); ?></p>
						<p><?php esc_html_e( 'Directive posters are useful when the message needs to be explicit.', 'succeedlearn-amp' ); ?></p>
					</article>
					<article class="sl-s-signs-nudges__card">
						<h3 class="sl-panel-title"><?php esc_html_e( 'Behavioural Nudges', 'succeedlearn-amp' ); ?></h3>
						<p><?php esc_html_e( 'Short visual prompts designed to encourage employees to pause and consider their behaviour before taking an action.', 'succeedlearn-amp' ); ?></p>
						<p><?php esc_html_e( 'Rather than explaining an entire policy, nudges keep a relevant security concept visible and encourage employees to make a more deliberate decision.', 'succeedlearn-amp' ); ?></p>
					</article>
				</div>
				<p class="sl-s-signs-nudges__closing">
					<?php esc_html_e( 'Together, directive posters and behavioural nudges give organisations flexibility to combine instruction with reinforcement.', 'succeedlearn-amp' ); ?>
				</p>
			</div>
			<div class="sl-s-signs-nudges__media">
				<div class="sl-s-signs-nudges__image">
					<amp-img
						src="<?php echo esc_url( $nudges_image ); ?>"
						width="800"
						height="600"
						layout="responsive"
						alt="<?php esc_attr_e( 'S-Signs directive posters and behavioural nudges', 'succeedlearn-amp' ); ?>"
					></amp-img>
				</div>
			</div>
		</div>
	</div>
</section>
