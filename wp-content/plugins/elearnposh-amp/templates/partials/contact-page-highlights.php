<?php
/**
 * Contact page highlights — single tick-list key points (AMP).
 *
 * @package ElearnPOSH\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( empty( $ep_contact_key_points ) ) {
	return;
}
?>
<div class="ep-contact-highlights" aria-label="<?php esc_attr_e( 'Highlights of eLearnPOSH', 'elearnposh-amp' ); ?>">
	<h2 class="ep-contact-highlights__title"><?php esc_html_e( 'Highlights of eLearnPOSH', 'elearnposh-amp' ); ?></h2>
	<ul class="ep-contact-keypoints">
		<?php foreach ( $ep_contact_key_points as $point ) : ?>
		<li class="ep-contact-keypoints__item">
			<span class="ep-contact-keypoints__icon" aria-hidden="true">&#10003;</span>
			<span class="ep-contact-keypoints__text"><?php echo esc_html( $point ); ?></span>
		</li>
		<?php endforeach; ?>
	</ul>
</div>
