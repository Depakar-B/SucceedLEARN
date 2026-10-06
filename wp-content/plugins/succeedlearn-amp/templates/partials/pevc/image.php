<?php
/**
 * PE/VC Suite AMP — Illustration section.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( empty( $images ) || ! is_array( $images ) ) {
	$images = succeedlearn_amp_get_pevc_images();
}

$image_url = isset( $images['illustration'] ) ? $images['illustration'] : '';
if ( ! $image_url ) {
	return;
}
?>
<section
	class="sl-pevc-image"
	aria-label="<?php esc_attr_e( 'Private Equity and Venture Capital compliance illustration', 'succeedlearn-amp' ); ?>"
>
	<div class="sl-wrap">
		<figure class="sl-pevc-image__figure">
			<amp-img
				src="<?php echo esc_url( $image_url ); ?>"
				width="1200"
				height="675"
				layout="responsive"
				alt="<?php esc_attr_e( 'PE and VC professional reviewing a step-by-step compliance process', 'succeedlearn-amp' ); ?>"
			></amp-img>
		</figure>
	</div>
</section>
