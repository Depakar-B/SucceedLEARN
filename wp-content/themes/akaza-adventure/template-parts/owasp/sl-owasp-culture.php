<?php
/**
 * OWASP — Secure development culture.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$flow = array(
	__( 'Secure Design', 'akaza-adventure' ),
	__( 'Secure Coding', 'akaza-adventure' ),
	__( 'Testing', 'akaza-adventure' ),
	__( 'Deployment', 'akaza-adventure' ),
	__( 'Monitoring', 'akaza-adventure' ),
);
?>

<section class="sl-owasp-culture" aria-labelledby="sl-owasp-culture-title">
	<div class="container">
		<div class="sl-owasp-culture__grid">

			<div class="sl-owasp-culture__content">
				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'Organisational value', 'akaza-adventure' ); ?>
				</span>
				<h2 id="sl-owasp-culture-title">
					<?php
					echo wp_kses(
						__( 'Strengthen Your <span>Secure Development Culture</span>', 'akaza-adventure' ),
						array( 'span' => array() )
					);
					?>
				</h2>
				<p>
					<?php
					esc_html_e(
						'Application security becomes more sustainable when developers, testers, architects, DevOps and security teams share a common understanding of risk.',
						'akaza-adventure'
					);
					?>
				</p>
				<p>
					<?php
					esc_html_e(
						'SucceedLEARN OWASP Top 10 training provides that foundation by connecting secure design, secure coding, testing, deployment and monitoring across the software lifecycle.',
						'akaza-adventure'
					);
					?>
				</p>
				<div class="sl-hero-actions">
					<a class="sl-hero-btn sl-hero-btn-primary" href="#request-demo">
						<?php esc_html_e( 'Request a Demo', 'akaza-adventure' ); ?>
					</a>
				</div>
			</div>

			<div class="sl-owasp-culture__flow" aria-label="<?php esc_attr_e( 'Secure development lifecycle', 'akaza-adventure' ); ?>">
				<?php foreach ( $flow as $index => $step ) : ?>
					<?php if ( $index > 0 ) : ?>
						<b aria-hidden="true">→</b>
					<?php endif; ?>
					<span><?php echo esc_html( $step ); ?></span>
				<?php endforeach; ?>
			</div>

		</div>
	</div>
</section>
