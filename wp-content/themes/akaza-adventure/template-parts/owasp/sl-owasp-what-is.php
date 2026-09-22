<?php
/**
 * OWASP — What is the OWASP Top 10?
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<section class="sl-owasp-what-is" aria-labelledby="sl-owasp-what-is-title">
	<div class="container">
		<div class="sl-owasp-what-is__block">
			<div class="sl-owasp-what-is__number" aria-hidden="true">01</div>
			<div>
				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'A direct answer for learners and buyers', 'akaza-adventure' ); ?>
				</span>
				<h2 id="sl-owasp-what-is-title">
					<?php
					echo wp_kses(
						__( 'What Is the <span>OWASP Top 10?</span>', 'akaza-adventure' ),
						array( 'span' => array() )
					);
					?>
				</h2>
				<p class="sl-owasp-what-is__lead">
					<?php
					esc_html_e(
						'The OWASP Top 10 is a widely recognised application-security awareness resource developed by the Open Worldwide Application Security Project. It identifies ten major categories of security risk affecting modern web applications and gives developers, security teams and technology organisations a shared language for discussing application-security weaknesses.',
						'akaza-adventure'
					);
					?>
				</p>
				<p>
					<?php
					esc_html_e(
						'The OWASP Top 10:2025 reflects changes in modern development environments, including cloud infrastructure, software supply chains, automated delivery pipelines and emerging application-security risks. This training translates those concepts into practical learning for people responsible for building and maintaining software.',
						'akaza-adventure'
					);
					?>
				</p>
			</div>
		</div>
	</div>
</section>
