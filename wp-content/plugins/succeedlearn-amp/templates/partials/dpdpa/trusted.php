<?php
/** DPDPA AMP - Trusted organisations. @package SucceedLEARN\AMP */
if ( ! defined( 'ABSPATH' ) ) { exit; }
$logos = function_exists( 'succeedlearn_amp_dpdpa_trusted_logos' ) ? succeedlearn_amp_dpdpa_trusted_logos() : array();
?>
<section class="sl-section sl-section--alt sl-dpdpa-trusted" aria-labelledby="sl-dpdpa-trusted-title">
	<div class="sl-wrap">
		<h2 id="sl-dpdpa-trusted-title" class="sl-h2"><?php esc_html_e( 'Compliance training ', 'succeedlearn-amp' ); ?><span><?php esc_html_e( 'trusted by teams at', 'succeedlearn-amp' ); ?></span></h2>
		<div class="sl-dpdpa-trusted__grid">
			<?php foreach ( $logos as $logo ) : ?>
				<div class="sl-dpdpa-trusted__logo">
					<?php if ( ! empty( $logo['url'] ) ) : ?>
						<amp-img src="<?php echo esc_url( $logo['url'] ); ?>" width="180" height="60" layout="intrinsic" alt="<?php echo esc_attr( $logo['name'] ); ?>"></amp-img>
					<?php else : ?><strong><?php echo esc_html( $logo['name'] ); ?></strong><?php endif; ?>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
