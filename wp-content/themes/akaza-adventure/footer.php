<?php
/**
 * Prefer secondary chrome footer on opted-in landings.
 * Else Akaza Header Footer plugin, then theme fallback.
 *
 * @package Akaza_Adventure
 */

if ( function_exists( 'akaza_uses_secondary_header' ) && akaza_uses_secondary_header() ) {
	get_template_part( 'template-parts/global/secondary-footer' );
	wp_footer();
	echo '</body></html>';
	return;
}

if ( has_action( 'ahf_render_site_footer' ) ) {
	do_action( 'ahf_render_site_footer' );
	wp_footer();
	echo '</body></html>';
	return;
}
?>
<footer class="slf-footer" role="contentinfo">
	<div class="slf-container slf-footer__grid">
		<div class="slf-footer__brand">
			<span class="slf-logo slf-logo--footer">
				<img class="slf-logo__mark" src="<?php echo esc_url( slf_img( 'logo-mark.svg' ) ); ?>" alt="" width="54" height="56" loading="lazy" decoding="async">
				<span class="slf-logo__text">
					<img src="<?php echo esc_url( slf_img( 'logo-word.svg' ) ); ?>" alt="SucceedLEARN" width="114" height="18" loading="lazy" decoding="async">
					<img src="<?php echo esc_url( slf_img( 'logo-tag.svg' ) ); ?>" alt="" width="60" height="13" loading="lazy" decoding="async">
				</span>
			</span>
			<p>Global compliance and security training that turns mandatory learning into measurable outcomes.</p>
		</div>
		<nav class="slf-footer__col" aria-label="Solutions">
			<h3>Solutions</h3>
			<ul>
				<li><a href="<?php echo esc_url( akaza_page_url( 'solutions' ) ); ?>"><?php esc_html_e( 'Security Awareness', 'akaza-adventure' ); ?></a></li>
				<li><a href="<?php echo esc_url( akaza_page_url( 'solutions' ) ); ?>"><?php esc_html_e( 'Compliance Training', 'akaza-adventure' ); ?></a></li>
				<li><a href="<?php echo esc_url( akaza_courses_url() ); ?>"><?php esc_html_e( 'LMS', 'akaza-adventure' ); ?></a></li>
				<li><a href="<?php echo esc_url( akaza_page_url( 'solutions' ) ); ?>"><?php esc_html_e( 'HR Compliance', 'akaza-adventure' ); ?></a></li>
				<li><a href="<?php echo esc_url( akaza_page_url( 'solutions' ) ); ?>"><?php esc_html_e( 'Financial Crime Prevention', 'akaza-adventure' ); ?></a></li>
				<li><a href="<?php echo esc_url( akaza_page_url( 'solutions' ) ); ?>"><?php esc_html_e( 'Health & Safety', 'akaza-adventure' ); ?></a></li>
			</ul>
		</nav>
		<nav class="slf-footer__col" aria-label="Industries">
			<h3>Industries</h3>
			<ul>
				<li><a href="#">Financial Services</a></li>
				<li><a href="#">Healthcare</a></li>
				<li><a href="#">Technology</a></li>
				<li><a href="#">Education</a></li>
				<li><a href="#">Manufacturing</a></li>
				<li><a href="#">Government</a></li>
			</ul>
		</nav>
		<nav class="slf-footer__col" aria-label="Partners">
			<h3>Partners</h3>
			<ul>
				<li><a href="#">Channel Partners</a></li>
				<li><a href="#">Resellers</a></li>
				<li><a href="#">Consultants</a></li>
				<li><a href="#">MSSPs</a></li>
			</ul>
		</nav>
		<nav class="slf-footer__col" aria-label="About">
			<h3>About Us</h3>
			<ul>
				<li><a href="#">Blogs</a></li>
				<li><a href="#">Case Studies</a></li>
				<li><a href="#">Whitepapers</a></li>
				<li><a href="#">Webinars</a></li>
			</ul>
		</nav>
	</div>
	<div class="slf-footer__bar">
		<div class="slf-container slf-footer__bar-inner">
			<p>&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> SucceedLEARN. All rights reserved. · Sales: <a href="mailto:sales@succeedtech.com">sales@succeedtech.com</a> · Support: <a href="mailto:support@succeedtech.com">support@succeedtech.com</a></p>
		</div>
	</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
