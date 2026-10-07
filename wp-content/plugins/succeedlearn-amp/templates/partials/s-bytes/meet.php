<?php
/**
 * S-Bytes AMP — Meet S-Bytes (FunFoSec video).
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$video_id = succeedlearn_amp_get_sbytes_meet_video_id();
?>
<section id="meet-s-bytes" class="sl-sbytes-meet" aria-labelledby="sl-sbytes-meet-title">
	<div class="sl-wrap">
		<div class="sl-sbytes-meet__intro">
			<span class="sl-home-sub-heading"><?php esc_html_e( 'Meet S-Bytes', 'succeedlearn-amp' ); ?></span>
			<h2 id="sl-sbytes-meet-title" class="sl-h2">
				<?php esc_html_e( 'Meet S-Bytes:', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'The FunFoSec Microlearning Series', 'succeedlearn-amp' ); ?></span>
			</h2>
			<h3 class="sl-panel-title"><?php esc_html_e( 'Continuous Security Awareness, One Byte at a Time', 'succeedlearn-amp' ); ?></h3>
		</div>
		<div class="sl-sbytes-meet__grid">
			<div class="sl-sbytes-meet__content">
				<p><?php esc_html_e( 'S-Bytes is the continuous microlearning layer of the SucceedLEARN Security Behaviour & Culture Suite, delivering short security awareness videos through the FunFoSec Microlearning Series. Using relatable workplace situations, simple language, storytelling and humour, FunFoSec turns everyday cybersecurity challenges into memorable learning experiences employees can easily understand and relate to. Familiar characters such as Bob, Jane and Richard encounter realistic security situations, with each microlearning experience focusing on a specific security concept to reinforce awareness throughout the year without adding another lengthy training requirement. S-Bytes turns security awareness from an occasional learning event into a continuous conversation.', 'succeedlearn-amp' ); ?></p>
			</div>
			<?php if ( '' !== $video_id ) : ?>
			<div class="sl-sbytes-meet__media">
				<div class="sl-sbytes-meet__video">
					<amp-youtube
						data-videoid="<?php echo esc_attr( $video_id ); ?>"
						layout="responsive"
						width="16"
						height="9"
						data-param-rel="0"
						data-param-modestbranding="1"
						data-param-playsinline="1"
						title="<?php esc_attr_e( 'Meet S-Bytes: Information Security Awareness Microlearning Series', 'succeedlearn-amp' ); ?>"
					></amp-youtube>
				</div>
			</div>
			<?php endif; ?>
		</div>
	</div>
</section>
