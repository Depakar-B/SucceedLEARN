<?php
/**
 * Secondary global footer (matches live Eduma chrome).
 * Opt-in via akaza_secondary_header_slugs() / akaza_uses_secondary_header().
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$logo_url      = 'https://succeedlearn.com/wp-content/uploads/2025/12/logo.webp';
$email         = 'sales@succeedtech.com';
$linkedin_url  = 'https://www.linkedin.com/company/succeedlearn';
$trust_url     = 'https://trust.succeedtech.com/';
$succeedtech   = 'https://succeedtech.com';

$cert_badges = array(
	array(
		'src' => 'https://succeedlearn.com/wp-content/uploads/2026/03/ISO-27001.webp',
		'alt' => 'ISO 27001',
	),
	array(
		'src' => 'https://succeedlearn.com/wp-content/uploads/2026/03/GDPR.webp',
		'alt' => 'GDPR',
	),
	array(
		'src' => 'https://succeedlearn.com/wp-content/uploads/2026/03/Soc-2.webp',
		'alt' => 'SOC 2',
	),
);

$our_pages = array(
	array( 'label' => __( 'Home', 'akaza-adventure' ), 'url' => home_url( '/' ) ),
	array( 'label' => __( 'About Us', 'akaza-adventure' ), 'url' => home_url( '/about-us/' ) ),
	array( 'label' => __( 'Contact Us', 'akaza-adventure' ), 'url' => home_url( '/contact-us/' ) ),
	array( 'label' => __( 'By Courses', 'akaza-adventure' ), 'url' => home_url( '/by-courses-best-elearning-courses-succeedlearn/' ) ),
);

$solutions = array(
	array( 'label' => __( 'Security Awareness (SA)', 'akaza-adventure' ), 'url' => home_url( '/security-awareness/' ) ),
	array( 'label' => __( 'HR Compliance Suite', 'akaza-adventure' ), 'url' => home_url( '/hr-compliance-suite/' ) ),
	array( 'label' => __( 'Financial Crime Prevention', 'akaza-adventure' ), 'url' => home_url( '/financial-crime-prevention-suite/' ) ),
	array( 'label' => __( 'Workplace Health and Safety', 'akaza-adventure' ), 'url' => home_url( '/workplace-health-and-safety-suite/' ) ),
	array( 'label' => __( 'Code of Conduct', 'akaza-adventure' ), 'url' => home_url( '/code-of-conduct-elearning-training/' ) ),
	array( 'label' => __( 'Private Equity and Venture Capital Suite', 'akaza-adventure' ), 'url' => home_url( '/private-equity-and-venture-capital-suite/' ) ),
	array( 'label' => __( 'India ESG Awareness', 'akaza-adventure' ), 'url' => home_url( '/india-esg-awareness/' ) ),
);

$important = array(
	array( 'label' => __( 'Privacy Policy', 'akaza-adventure' ), 'url' => home_url( '/privacy-policy/' ) ),
	array( 'label' => __( 'Trust Center', 'akaza-adventure' ), 'url' => $trust_url, 'external' => true ),
	array( 'label' => __( 'Terms And Conditions', 'akaza-adventure' ), 'url' => home_url( '/terms-and-conditions/' ) ),
);
?>
<footer class="sl-secondary-footer" role="contentinfo">
	<div class="sl-secondary-footer__main">
		<div class="sl-secondary-footer__inner">
			<div class="sl-secondary-footer__brand">
				<a class="sl-secondary-footer__logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php esc_attr_e( 'SucceedLEARN home', 'akaza-adventure' ); ?>">
					<img
						src="<?php echo esc_url( $logo_url ); ?>"
						alt="SucceedLEARN"
						width="150"
						height="50"
						loading="lazy"
						decoding="async"
					/>
				</a>

				<p class="sl-secondary-footer__about">
					<?php
					echo wp_kses(
						sprintf(
							/* translators: %s: Succeed Technologies site URL */
							__( 'SucceedLEARN is a product of <a href="%s" target="_blank" rel="noopener noreferrer">Succeed Technologies®</a>, a dynamic organization that aims to revolutionize how people learn online and simplify Compliance eLearning for organizations across the globe.', 'akaza-adventure' ),
							esc_url( $succeedtech )
						),
						array(
							'a' => array(
								'href'   => array(),
								'target' => array(),
								'rel'    => array(),
							),
						)
					);
					?>
				</p>

				<h3 class="sl-secondary-footer__heading"><?php esc_html_e( 'Get in touch', 'akaza-adventure' ); ?></h3>
				<p class="sl-secondary-footer__email-row">
					<span class="sl-secondary-footer__email-icon" aria-hidden="true">✉</span>
					<a href="<?php echo esc_url( 'mailto:' . $email ); ?>"><?php echo esc_html( $email ); ?></a>
				</p>

				<div class="sl-secondary-footer__social">
					<a
						class="sl-secondary-footer__social-link"
						href="<?php echo esc_url( $linkedin_url ); ?>"
						target="_blank"
						rel="noopener noreferrer"
						aria-label="<?php esc_attr_e( 'LinkedIn', 'akaza-adventure' ); ?>"
					>
						<svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
							<path d="M4.98 3.5C4.98 4.88 3.86 6 2.5 6S0 4.88 0 3.5 1.12 1 2.5 1s2.48 1.12 2.48 2.5zM.5 8.5h4V23h-4V8.5zM8.5 8.5h3.8v2h.05c.53-1 1.82-2.05 3.75-2.05 4.01 0 4.75 2.64 4.75 6.07V23h-4v-6.6c0-1.57-.03-3.59-2.19-3.59-2.19 0-2.53 1.71-2.53 3.48V23h-4V8.5z"/>
						</svg>
					</a>
				</div>

				<div class="sl-secondary-footer__certs" aria-label="<?php esc_attr_e( 'Certifications', 'akaza-adventure' ); ?>">
					<?php foreach ( $cert_badges as $badge ) : ?>
						<img
							src="<?php echo esc_url( $badge['src'] ); ?>"
							alt="<?php echo esc_attr( $badge['alt'] ); ?>"
							width="72"
							height="72"
							loading="lazy"
							decoding="async"
						/>
					<?php endforeach; ?>
				</div>
			</div>

			<nav class="sl-secondary-footer__col" aria-label="<?php esc_attr_e( 'Our Pages', 'akaza-adventure' ); ?>">
				<h3 class="sl-secondary-footer__heading"><?php esc_html_e( 'Our Pages', 'akaza-adventure' ); ?></h3>
				<ul class="sl-secondary-footer__links">
					<?php foreach ( $our_pages as $item ) : ?>
						<li><a href="<?php echo esc_url( $item['url'] ); ?>"><?php echo esc_html( $item['label'] ); ?></a></li>
					<?php endforeach; ?>
				</ul>
			</nav>

			<nav class="sl-secondary-footer__col" aria-label="<?php esc_attr_e( 'By Solution', 'akaza-adventure' ); ?>">
				<h3 class="sl-secondary-footer__heading"><?php esc_html_e( 'By Solution', 'akaza-adventure' ); ?></h3>
				<ul class="sl-secondary-footer__links">
					<?php foreach ( $solutions as $item ) : ?>
						<li><a href="<?php echo esc_url( $item['url'] ); ?>"><?php echo esc_html( $item['label'] ); ?></a></li>
					<?php endforeach; ?>
				</ul>
			</nav>

			<nav class="sl-secondary-footer__col" aria-label="<?php esc_attr_e( 'Important Links', 'akaza-adventure' ); ?>">
				<h3 class="sl-secondary-footer__heading"><?php esc_html_e( 'Important Links', 'akaza-adventure' ); ?></h3>
				<ul class="sl-secondary-footer__links">
					<?php foreach ( $important as $item ) : ?>
						<li>
							<a
								href="<?php echo esc_url( $item['url'] ); ?>"
								<?php echo ! empty( $item['external'] ) ? ' target="_blank" rel="noopener noreferrer"' : ''; ?>
							>
								<?php echo esc_html( $item['label'] ); ?>
							</a>
						</li>
					<?php endforeach; ?>
				</ul>
			</nav>
		</div>
	</div>

	<div class="sl-secondary-footer__bar">
		<p>
			<?php
			printf(
				/* translators: %s: current year */
				esc_html__( 'Copyright© %s SucceedLEARN.com Powered By Succeed Technologies . All rights reserved.', 'akaza-adventure' ),
				esc_html( gmdate( 'Y' ) )
			);
			?>
		</p>
	</div>
</footer>
