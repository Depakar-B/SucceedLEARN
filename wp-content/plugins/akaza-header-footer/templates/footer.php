<?php
/**
 * Non-AMP site footer markup — SucceedLEARN.
 *
 * @package Akaza_Header_Footer
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$config             = AHF_Config::get();
$contact            = AHF_Footer_Items::get_contact();
$bottom_links       = AHF_Footer_Items::get_bottom_links();
$social_links       = AHF_Footer_Items::get_social_links();
$cert_badges        = AHF_Footer_Items::get_cert_badges();
$complete_solutions = AHF_Footer_Items::get_complete_solutions();
$email              = sanitize_email( $contact['email'] );
$logo_url           = ! empty( $config['logo']['white_url'] )
	? $config['logo']['white_url']
	: ( $config['logo']['url'] ?? '' );
$logo_alt           = $config['logo']['alt'] ?? 'SucceedLEARN';

$our_pages = array(
	array(
		'label' => __( 'Home', 'akaza-header-footer' ),
		'url'   => '/',
	),
	array(
		'label' => __( 'About Us', 'akaza-header-footer' ),
		'url'   => AHF_Menu_Items::path_from_page_id( 2901, '/about-us/' ),
	),
	array(
		'label' => __( 'Contact Us', 'akaza-header-footer' ),
		'url'   => AHF_Menu_Items::path_from_page_id( 87, '/contact-us/' ),
	),
	array(
		'label' => __( 'By Courses', 'akaza-header-footer' ),
		'url'   => AHF_Menu_Items::get_courses_menu_path(),
	),
);

$solutions = AHF_Menu_Items::get_succeedlearn_solutions();
?>
<footer class="epsh-site-footer epsh-site-footer--sl" id="epsh-site-footer">
	<div class="epsh-footer-center">
		<div class="epsh-footer-grid epsh-footer-grid--sl">
			<div class="epsh-footer-col epsh-footer-col-brand">
				<?php if ( $logo_url ) : ?>
					<a class="epsh-footer-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
						<img
							src="<?php echo esc_url( $logo_url ); ?>"
							alt="<?php echo esc_attr( $logo_alt ); ?>"
							width="150"
							height="50"
							loading="lazy"
							decoding="async"
						/>
					</a>
				<?php endif; ?>
				<p class="epsh-footer-blurb">
					<?php
					echo wp_kses_post(
						sprintf(
							/* translators: %s: Succeed Technologies link */
							__( 'SucceedLEARN is a product of %s, a dynamic organization that aims to revolutionize how people learn online and simplify Compliance eLearning for organizations across the globe.', 'akaza-header-footer' ),
							'<a href="' . esc_url( 'https://succeedtech.com/' ) . '" rel="noopener">' . esc_html__( 'Succeed Technologies®', 'akaza-header-footer' ) . '</a>'
						)
					);
					?>
				</p>
				<h2><?php esc_html_e( 'Get in touch', 'akaza-header-footer' ); ?></h2>
				<ul class="epsh-footer-contact-list">
					<?php if ( $email ) : ?>
						<li>
							<a href="<?php echo esc_url( 'mailto:' . $email ); ?>"><?php echo esc_html( $email ); ?></a>
						</li>
					<?php endif; ?>
				</ul>
				<?php if ( ! empty( $social_links ) ) : ?>
					<div class="epsh-footer-social">
						<?php foreach ( $social_links as $social ) : ?>
							<a
								href="<?php echo esc_url( $social['url'] ); ?>"
								<?php echo ! empty( $social['external'] ) ? 'target="_blank" rel="noopener"' : ''; ?>
								aria-label="<?php echo esc_attr( $social['label'] ); ?>"
								class="epsh-footer-social-link"
							>
								<span class="epsh-social-icon <?php echo esc_attr( $social['icon'] ); ?>">
									<?php echo AHF_Footer_Items::get_social_svg( $social['icon'] ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
								</span>
							</a>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>
			</div>

			<div class="epsh-footer-col">
				<h2><?php esc_html_e( 'Our Pages', 'akaza-header-footer' ); ?></h2>
				<ul>
					<?php foreach ( $our_pages as $link ) : ?>
						<li>
							<a href="<?php echo esc_url( AHF_Footer_Items::link_url( $link['url'] ) ); ?>">
								<?php echo esc_html( $link['label'] ); ?>
							</a>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>

			<div class="epsh-footer-col">
				<h2><?php esc_html_e( 'By Solution', 'akaza-header-footer' ); ?></h2>
				<ul>
					<?php foreach ( $solutions as $link ) : ?>
						<li>
							<a href="<?php echo esc_url( AHF_Footer_Items::link_url( $link['url'] ) ); ?>">
								<?php echo esc_html( $link['label'] ); ?>
							</a>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>

			<div class="epsh-footer-col">
				<h2><?php esc_html_e( 'Important Links', 'akaza-header-footer' ); ?></h2>
				<ul>
					<?php foreach ( $bottom_links as $link ) : ?>
						<li>
							<a href="<?php echo esc_url( AHF_Footer_Items::link_url( $link['url'] ) ); ?>"<?php echo ! empty( $link['external'] ) ? ' target="_blank" rel="noopener"' : ''; ?>>
								<?php echo esc_html( $link['label'] ); ?>
							</a>
						</li>
					<?php endforeach; ?>
				</ul>
				<?php if ( ! empty( $cert_badges ) ) : ?>
					<div class="epsh-footer-cert-block">
						<h2 class="epsh-footer-cert-title"><?php esc_html_e( 'Security, Privacy & Compliance', 'akaza-header-footer' ); ?></h2>
						<div class="epsh-footer-cert-badges">
							<?php foreach ( $cert_badges as $badge ) : ?>
								<img
									src="<?php echo esc_url( $badge['src'] ); ?>"
									alt="<?php echo esc_attr( $badge['alt'] ); ?>"
									width="<?php echo esc_attr( (string) $badge['width'] ); ?>"
									height="<?php echo esc_attr( (string) $badge['height'] ); ?>"
									loading="lazy"
									decoding="async"
								/>
							<?php endforeach; ?>
						</div>
					</div>
				<?php endif; ?>
			</div>
		</div>

		<?php if ( ! empty( $complete_solutions ) ) : ?>
			<section class="epsh-footer-solutions" aria-labelledby="epsh-footer-solutions-heading">
				<h2 id="epsh-footer-solutions-heading"><?php esc_html_e( 'Our Complete Solutions', 'akaza-header-footer' ); ?></h2>
				<div class="epsh-footer-solutions-grid">
					<?php foreach ( $complete_solutions as $group ) : ?>
						<div class="epsh-footer-solutions-col">
							<h3 class="epsh-footer-solutions-title">
								<?php echo esc_html( $group['label'] ); ?>
							</h3>
							<ul>
								<?php foreach ( $group['courses'] as $course ) : ?>
									<li>
										<a href="<?php echo esc_url( AHF_Footer_Items::link_url( $course['url'] ) ); ?>" title="<?php echo esc_attr( $course['label'] ); ?>">
											<?php echo esc_html( $course['label'] ); ?>
										</a>
									</li>
								<?php endforeach; ?>
							</ul>
						</div>
					<?php endforeach; ?>
				</div>
			</section>
		<?php endif; ?>

		<div class="epsh-footer-meta">
			<p class="epsh-footer-copyright">
				&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?>
				<?php esc_html_e( 'SucceedLEARN. All rights reserved.', 'akaza-header-footer' ); ?>
			</p>
		</div>
	</div>
</footer>
