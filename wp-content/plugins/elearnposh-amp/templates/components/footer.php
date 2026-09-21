<?php
/**
 * AMP Footer Component — matches elearnposh-site-header footer layout.
 *
 * @package ElearnPOSH\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( class_exists( 'EPSH_Footer_Items' ) ) {
	$contact      = EPSH_Footer_Items::get_contact();
	$bottom_links = EPSH_Footer_Items::get_bottom_links();
	$social_links = EPSH_Footer_Items::get_social_links();
	$cert_badges  = EPSH_Footer_Items::get_cert_badges();
} else {
	$plugin        = \ElearnPOSH\AMP\Plugin::get_instance();
	$config        = $plugin->get_config();
	$contact       = array(
		'email'           => 'sales@succeedtech.com',
		'fixed_phone'     => array(
			'url'  => 'tel:+917019012446',
			'text' => '+91-70190 12446',
		),
		'shuffled_phones' => $config->get_shuffled_phones( 2 ),
	);
	$bottom_links  = array(
		array( 'label' => __( 'Terms and Conditions', 'elearnposh-amp' ), 'url' => '/terms-and-conditions/' ),
		array( 'label' => __( 'Privacy Policy', 'elearnposh-amp' ), 'url' => '/privacy-policy/' ),
		array( 'label' => __( 'FAQs', 'elearnposh-amp' ), 'url' => '/elearnposh-frequently-asked-questions-faqs/' ),
		array( 'label' => __( 'Sitemap', 'elearnposh-amp' ), 'url' => '/site-map/' ),
	);
	$social_links  = array(
		array( 'label' => 'LinkedIn', 'url' => 'https://in.linkedin.com/company/elearnposh2018', 'icon' => 'linkedin', 'external' => true ),
		array( 'label' => 'YouTube', 'url' => 'https://www.youtube.com/@eLearnPOSH/featured', 'icon' => 'youtube', 'external' => true ),
		array( 'label' => 'Twitter', 'url' => 'https://x.com/elearnposh_', 'icon' => 'twitter', 'external' => true ),
		array( 'label' => 'Instagram', 'url' => 'https://www.instagram.com/elearnposh/', 'icon' => 'instagram', 'external' => true ),
		array( 'label' => 'Facebook', 'url' => 'https://www.facebook.com/eLearnPOSH', 'icon' => 'facebook', 'external' => true ),
		array(
			'label'    => 'Ariba Network',
			'url'      => 'https://portal.us.bn.cloud.ariba.com/dashboard/public/appext/company-profile#/?sourceApplication=SBN&bnoId=BNO-100000026977453',
			'icon'     => 'ariba',
			'external' => true,
			'image'    => array(
				'src'    => 'https://dxt3p7040kgaw.cloudfront.net/wp-content/uploads/2019/11/ariba-succeed-mobile_1253897be78ecbc116687542bfd033e7-1.jpg',
				'width'  => 85,
				'height' => 26,
				'alt'    => __( 'Ariba Network', 'elearnposh-amp' ),
			),
		),
	);
	$cert_badges   = array(
		array(
			'src'    => 'https://elearnposh.com/wp-content/uploads/2025/12/ISO-27001.webp',
			'alt'    => __( 'ISO 27001 Information Security Management System Certified', 'elearnposh-amp' ),
			'width'  => 100,
			'height' => 100,
		),
		array(
			'src'    => 'https://elearnposh.com/wp-content/uploads/2025/12/GDPR.webp',
			'alt'    => __( 'GDPR Compliant', 'elearnposh-amp' ),
			'width'  => 100,
			'height' => 100,
		),
		array(
			'src'    => 'https://elearnposh.com/wp-content/uploads/2025/12/Soc-2.webp',
			'alt'    => __( 'AICPA SOC for Service Organizations', 'elearnposh-amp' ),
			'width'  => 100,
			'height' => 100,
		),
	);
}

$email = sanitize_email( $contact['email'] );

$course_groups = array(
	array(
		'heading' => __( 'POSH Courses', 'elearnposh-amp' ),
		'links'   => array(
			array(
				'label' => __( 'POSH Training for Employees', 'elearnposh-amp' ),
				'url'   => class_exists( 'EPSH_Menu_Items' ) ? EPSH_Menu_Items::get_employees_menu_path() : '/solutions/posh-training-for-employees/',
			),
			array(
				'label' => __( 'POSH Training for Managers', 'elearnposh-amp' ),
				'url'   => class_exists( 'EPSH_Menu_Items' ) ? EPSH_Menu_Items::get_managers_menu_path() : '/solutions/posh-training-for-managers/',
			),
			array(
				'label' => __( 'POSH Training for IC Members', 'elearnposh-amp' ),
				'url'   => class_exists( 'EPSH_Menu_Items' ) ? EPSH_Menu_Items::get_ic_members_menu_path() : '/solutions/posh-training-for-ic-members/',
			),
			array(
				'label' => class_exists( 'EPSH_Menu_Items' ) ? EPSH_Menu_Items::get_hei_menu_label() : __( 'POSH Training for Higher Educational Institutions', 'elearnposh-amp' ),
				'url'   => class_exists( 'EPSH_Menu_Items' ) ? EPSH_Menu_Items::get_hei_menu_path() : '/solutions/posh-for-higher-educational-institutions/',
			),
			array(
				'label' => class_exists( 'EPSH_Menu_Items' ) ? EPSH_Menu_Items::get_pocso_menu_label() : __( 'POCSO - Prevention of Child Sexual Abuse', 'elearnposh-amp' ),
				'url'   => class_exists( 'EPSH_Menu_Items' ) ? EPSH_Menu_Items::get_pocso_menu_path() : '/solutions/pocso-prevention-of-child-sexual-abuse/',
			),
		),
	),
	array(
		'heading' => __( 'Global Courses', 'elearnposh-amp' ),
		'links'   => class_exists( 'EPSH_Menu_Items' )
			? EPSH_Menu_Items::get_global_courses()
			: array(
				array( 'label' => __( 'Unconscious Bias', 'elearnposh-amp' ), 'url' => '/solutions/unconscious-bias/' ),
				array( 'label' => __( 'Equality, Diversity & Inclusion', 'elearnposh-amp' ), 'url' => '/equality-and-diversity/' ),
				array( 'label' => __( 'Sexual Harassment Prevention for US', 'elearnposh-amp' ), 'url' => '/solutions/sexual-harassment-prevention-for-us/' ),
			),
	),
);

/**
 * Social icon SVG for AMP footer.
 *
 * @param string $icon Icon key.
 */
$amp_footer_social_svg = static function ( $icon ) {
	if ( class_exists( 'EPSH_Footer_Items' ) ) {
		return EPSH_Footer_Items::get_social_svg( $icon );
	}

	$svgs = array(
		'linkedin'  => '<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false"><path fill="#fff" d="M20.45 20.45h-3.55v-5.57c0-1.33-.02-3.04-1.85-3.04-1.85 0-2.13 1.45-2.13 2.94v5.67H9.35V9h3.41v1.56h.05c.48-.9 1.64-1.85 3.37-1.85 3.6 0 4.27 2.37 4.27 5.45v6.29zM5.34 7.43a2.06 2.06 0 1 1 0-4.13 2.06 2.06 0 0 1 0 4.13zm1.78 13.02H3.56V9h3.56v11.45zM22.22 0H1.77C.79 0 0 .77 0 1.73v20.54C0 23.23.79 24 1.77 24h20.45c.98 0 1.78-.77 1.78-1.73V1.73C24 .77 23.2 0 22.22 0z"/></svg>',
		'youtube'   => '<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false"><path fill="#fff" d="M23.5 6.19a3.02 3.02 0 0 0-2.12-2.14C19.5 3.55 12 3.55 12 3.55s-7.5 0-9.38.5A3.02 3.02 0 0 0 .5 6.2C0 8.07 0 12 0 12s0 3.93.5 5.81a3.02 3.02 0 0 0 2.12 2.14c1.88.5 9.38.5 9.38.5s7.5 0 9.38-.5a3.02 3.02 0 0 0 2.12-2.14c.5-1.88.5-5.81.5-5.81s0-3.93-.5-5.81zM9.55 15.57V8.43L15.82 12l-6.27 3.57z"/></svg>',
		'twitter'   => '<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false"><path fill="#fff" d="M18.24 2.25h3.31l-7.23 8.26L23 21.75h-6.66l-5.21-6.82-5.97 6.82H1.85l7.73-8.84L1.25 2.25h6.83l4.71 6.23 5.45-6.23zm-1.16 17.52h1.83L7.08 4.13H5.12l11.96 15.64z"/></svg>',
		'instagram' => '<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false"><path fill="#fff" d="M12 2.16c3.2 0 3.58.01 4.85.07 3.25.15 4.77 1.69 4.92 4.92.06 1.27.07 1.65.07 4.85 0 3.21-.01 3.58-.07 4.85-.15 3.23-1.66 4.77-4.92 4.92-1.27.06-1.64.07-4.85.07-3.2 0-3.58-.01-4.85-.07-3.26-.15-4.77-1.7-4.92-4.92-.06-1.27-.07-1.64-.07-4.85 0-3.2.01-3.58.07-4.85.15-3.23 1.66-4.77 4.92-4.92 1.27-.06 1.65-.07 4.85-.07zM12 0C8.74 0 8.33.01 7.05.07 2.7.27.27 2.69.07 7.05.01 8.33 0 8.74 0 12s.01 3.67.07 4.95c.2 4.36 2.62 6.78 6.98 6.98 1.28.06 1.69.07 4.95.07s3.67-.01 4.95-.07c4.35-.2 6.78-2.62 6.98-6.98.06-1.28.07-1.69.07-4.95s-.01-3.67-.07-4.95C23.74 2.69 21.31.27 16.95.07 15.67.01 15.26 0 12 0zm0 5.84a6.16 6.16 0 1 0 0 12.32 6.16 6.16 0 0 0 0-12.32zM12 16a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm6.41-11.85a1.44 1.44 0 1 0 0 2.88 1.44 1.44 0 0 0 0-2.88z"/></svg>',
		'facebook'  => '<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false"><path fill="#fff" d="M24 12.07C24 5.44 18.63.07 12 .07S0 5.44 0 12.07c0 5.99 4.39 10.95 10.13 11.86v-8.39H7.08v-3.47h3.05V9.43c0-3 1.79-4.67 4.53-4.67 1.31 0 2.69.24 2.69.24v2.95h-1.52c-1.49 0-1.96.93-1.96 1.88v2.25h3.33l-.53 3.47h-2.8v8.39C19.61 23.02 24 18.06 24 12.07z"/></svg>',
	);

	return $svgs[ $icon ] ?? '';
};
?>
<footer class="epsh-site-footer" id="epsh-site-footer">
	<div class="epsh-footer-center">
		<div class="epsh-footer-grid">
			<div class="epsh-footer-col epsh-footer-col-contact">
				<div class="epsh-footer-item">
					<h2><?php esc_html_e( 'Contact Details', 'elearnposh-amp' ); ?></h2>
					<div class="epsh-footer-contact-stack">
						<ul>
							<?php if ( $email ) : ?>
								<li>
									<a href="<?php echo esc_url( 'mailto:' . $email ); ?>">
										<span class="epsh-footer-contact-icon" aria-hidden="true">&#128231;</span>
										<?php echo esc_html( $email ); ?>
									</a>
								</li>
							<?php endif; ?>
							<?php if ( ! empty( $contact['fixed_phone']['url'] ) ) : ?>
								<li>
									<a href="<?php echo esc_url( $contact['fixed_phone']['url'] ); ?>">
										<span class="epsh-footer-contact-icon" aria-hidden="true">&#128241;</span>
										<?php echo esc_html( $contact['fixed_phone']['text'] ); ?>
									</a>
								</li>
							<?php endif; ?>
							<?php foreach ( $contact['shuffled_phones'] as $phone ) : ?>
								<li class="epsh-footer-random-mobilenum-div footer-random-mobilenum-div">
									<a href="<?php echo esc_url( $phone['url'] ); ?>">
										<span class="epsh-footer-contact-icon" aria-hidden="true">&#128241;</span>
										<span class="epsh-mobile-number-text"><?php echo esc_html( $phone['text'] ); ?></span>
									</a>
								</li>
							<?php endforeach; ?>
						</ul>
						<?php if ( ! empty( $cert_badges ) ) : ?>
							<div class="epsh-footer-cert-badges">
								<?php foreach ( $cert_badges as $badge ) : ?>
									<amp-img
										src="<?php echo esc_url( $badge['src'] ); ?>"
										layout="fixed"
										alt="<?php echo esc_attr( $badge['alt'] ); ?>"
										width="<?php echo esc_attr( (string) $badge['width'] ); ?>"
										height="<?php echo esc_attr( (string) $badge['height'] ); ?>"
									></amp-img>
								<?php endforeach; ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>

			<div class="epsh-footer-col epsh-footer-col-courses">
				<div class="epsh-footer-item">
					<h2><?php esc_html_e( 'Solutions', 'elearnposh-amp' ); ?></h2>
					<ul>
						<?php foreach ( $course_groups as $group ) : ?>
							<li class="epsh-footer-course-group-title">
								<?php echo esc_html( $group['heading'] ); ?>
							</li>
							<?php foreach ( $group['links'] as $link ) : ?>
								<li>
									<a href="<?php echo esc_url( elearnposh_amp_menu_url( $link['url'] ) ); ?>">
										<?php echo esc_html( $link['label'] ); ?>
									</a>
								</li>
							<?php endforeach; ?>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>

			<div class="epsh-footer-col epsh-footer-col-aside footer-newsletter">
				<div class="epsh-footer-aside-card">
					<div class="epsh-footer-item epsh-footer-social footer-social">
						<h2><?php esc_html_e( 'Get Social With Us', 'elearnposh-amp' ); ?></h2>
						<div class="epsh-social-icons social-icons">
							<?php foreach ( $social_links as $social ) : ?>
								<div class="epsh-icon-container icon-container">
									<a
										href="<?php echo esc_url( $social['url'] ); ?>"
										<?php echo ! empty( $social['external'] ) ? 'target="_blank" rel="noopener"' : ''; ?>
										aria-label="<?php echo esc_attr( $social['label'] ); ?>"
									>
										<?php if ( ! empty( $social['image'] ) ) : ?>
											<amp-img
												src="<?php echo esc_url( $social['image']['src'] ); ?>"
												layout="fixed"
												alt="<?php echo esc_attr( $social['image']['alt'] ); ?>"
												width="<?php echo esc_attr( (string) $social['image']['width'] ); ?>"
												height="<?php echo esc_attr( (string) $social['image']['height'] ); ?>"
											></amp-img>
										<?php else : ?>
											<span class="epsh-social-icon social-icon <?php echo esc_attr( $social['icon'] ); ?>">
												<?php echo $amp_footer_social_svg( $social['icon'] ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
											</span>
										<?php endif; ?>
									</a>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
					<div class="epsh-footer-newsletter-form footer-newsletter-form" id="newsletter-subscription-form">
						<?php
						$footer_newsletter = do_shortcode( '[newsletter_subscription_footer amp="true"]' );
						if ( function_exists( 'elearnposh_amp_sanitize_amp_form_markup' ) ) {
							$footer_newsletter = elearnposh_amp_sanitize_amp_form_markup( $footer_newsletter );
						}
						echo $footer_newsletter; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
						?>
					</div>
				</div>
			</div>
		</div>

		<div class="epsh-footer-hr hrtag"></div>

		<div class="epsh-footer-meta meta-content">
			<p class="epsh-footer-copyright footer-copyright">
				<?php esc_html_e( 'Copyright © 2024 eLearnPOSH.com Powered By ', 'elearnposh-amp' ); ?>
				<a href="<?php echo esc_url( 'https://succeedlearn.com/' ); ?>" target="_blank" rel="noopener">
					<?php esc_html_e( 'Succeed Technologies®', 'elearnposh-amp' ); ?>
				</a>
			</p>
			<ul class="epsh-footer-bottom-links footer-bottom-links">
				<?php foreach ( $bottom_links as $link ) : ?>
					<li>
						<a href="<?php echo esc_url( elearnposh_amp_menu_url( $link['url'] ) ); ?>">
							<?php echo esc_html( $link['label'] ); ?>
						</a>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>
</footer>
<?php include ELEARNPOSH_AMP_TEMPLATES_DIR . 'components/body-end.php'; ?>
