<?php
/**
 * S-Signs AMP — A Growing Library of Cybersecurity Awareness Posters.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$library_image = function_exists( 'succeedlearn_amp_get_ss_library_image' )
	? succeedlearn_amp_get_ss_library_image()
	: 'https://succeedlearn.com/wp-content/uploads/2026/09/A-growing-library-of-posters.webp';
?>
<section class="sl-s-signs-library" aria-labelledby="sl-s-signs-library-title">
	<div class="sl-wrap">
		<div class="sl-s-signs-library__grid">
			<div class="sl-s-signs-library__content">
				<span class="sl-home-sub-heading"><?php esc_html_e( 'Poster Library', 'succeedlearn-amp' ); ?></span>
				<h2 id="sl-s-signs-library-title" class="sl-h2">
					<?php esc_html_e( 'A Growing Library of', 'succeedlearn-amp' ); ?>
					<span><?php esc_html_e( 'Cybersecurity Awareness Posters', 'succeedlearn-amp' ); ?></span>
				</h2>
				<h3 class="sl-s-signs-library__subtitle">
					<?php esc_html_e( 'One Visual Library. Multiple Security Topics.', 'succeedlearn-amp' ); ?>
				</h3>
				<div class="sl-s-signs-library__copy">
					<p><?php esc_html_e( "S-Signs provides access to an extensive collection of professionally designed cybersecurity awareness posters covering a broad range of security topics relevant to today's workplace.", 'succeedlearn-amp' ); ?></p>
					<p><?php esc_html_e( 'Administrators can quickly browse, search, and filter posters based on awareness themes, enabling organisations to easily select relevant content for ongoing awareness campaigns.', 'succeedlearn-amp' ); ?></p>
					<p><?php esc_html_e( 'The growing poster library includes topics such as phishing awareness, remote working security, password hygiene, AI security, mobile device security, and more.', 'succeedlearn-amp' ); ?></p>
				</div>
			</div>
			<div class="sl-s-signs-library__media">
				<div class="sl-s-signs-library__image">
					<amp-img
						src="<?php echo esc_url( $library_image ); ?>"
						width="800"
						height="600"
						layout="responsive"
						alt="<?php esc_attr_e( 'A growing library of cybersecurity awareness posters', 'succeedlearn-amp' ); ?>"
					></amp-img>
				</div>
			</div>
		</div>
	</div>
</section>
