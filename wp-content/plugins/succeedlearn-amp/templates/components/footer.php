<?php
/**
 * AMP footer.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$branding = succeedlearn_amp_get_header_branding();
$year     = gmdate( 'Y' );
?>
<footer class="sl-amp-footer">
	<div class="sl-amp-footer__grid">
		<div class="sl-amp-footer__col">
			<p class="sl-amp-footer__blurb">
				<?php esc_html_e( 'SucceedLEARN is a product of', 'succeedlearn-amp' ); ?>
				<a href="https://succeedtech.com/" rel="noopener"><?php esc_html_e( 'Succeed Technologies®', 'succeedlearn-amp' ); ?></a>
			</p>
			<p><a href="mailto:<?php echo esc_attr( $branding['email'] ); ?>"><?php echo esc_html( $branding['email'] ); ?></a></p>
			<p>
				<a href="https://www.linkedin.com/company/succeed-technologies/" rel="noopener noreferrer" target="_blank">LinkedIn</a>
			</p>
		</div>
		<div class="sl-amp-footer__col">
			<h4><?php esc_html_e( 'Our Pages', 'succeedlearn-amp' ); ?></h4>
			<ul>
				<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'succeedlearn-amp' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/about-us/' ) ); ?>"><?php esc_html_e( 'About Us', 'succeedlearn-amp' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>"><?php esc_html_e( 'Contact Us', 'succeedlearn-amp' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/courses/' ) ); ?>"><?php esc_html_e( 'By Courses', 'succeedlearn-amp' ); ?></a></li>
			</ul>
		</div>
		<div class="sl-amp-footer__col">
			<h4><?php esc_html_e( 'Important Links', 'succeedlearn-amp' ); ?></h4>
			<ul>
				<li><a href="<?php echo esc_url( home_url( '/privacy-policy/' ) ); ?>"><?php esc_html_e( 'Privacy Policy', 'succeedlearn-amp' ); ?></a></li>
				<li><a href="https://trust.succeedtech.com/" rel="noopener noreferrer" target="_blank"><?php esc_html_e( 'Trust Center', 'succeedlearn-amp' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/terms-and-conditions/' ) ); ?>"><?php esc_html_e( 'Terms', 'succeedlearn-amp' ); ?></a></li>
			</ul>
		</div>
	</div>
	<div class="sl-amp-footer__copy">
		&copy; <?php echo esc_html( $year ); ?> SucceedLEARN. <?php esc_html_e( 'All rights reserved.', 'succeedlearn-amp' ); ?>
	</div>
</footer>
<?php
$body_end = SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'components/body-end.php';
if ( is_readable( $body_end ) ) {
	include $body_end;
}
?>
