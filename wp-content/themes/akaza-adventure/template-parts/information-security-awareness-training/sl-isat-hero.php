<?php
/**
 * Information Security Awareness Training - Hero section.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$isat_hero_file  = '2026/01/Information-Security-Awareness-Hero-Section-1.webp';
$isat_hero_image = 'https://succeedlearn.com/wp-content/uploads/' . $isat_hero_file;
$isat_hero_local = WP_CONTENT_DIR . '/uploads/' . $isat_hero_file;

if ( function_exists( 'akaza_upload_url' ) && file_exists( $isat_hero_local ) ) {
	$isat_hero_image = akaza_upload_url( $isat_hero_file );
}
?>

<section
	class="sl-isat-hero"
	aria-labelledby="sl-isat-hero-title"
>
	<div class="container">

		<div class="sl-isat-hero__grid">

			<div class="sl-isat-hero__content">

				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'Security Awareness', 'akaza-adventure' ); ?>
				</span>

				<h1 id="sl-isat-hero-title">
					<?php esc_html_e( 'Information Security Awareness Training', 'akaza-adventure' ); ?>
				</h1>

				<h2 class="sl-hero-h2">
					<?php esc_html_e( 'Build a Security-Aware Workforce. Reduce Human-Led Cyber Risk.', 'akaza-adventure' ); ?>
				</h2>

				<p>
					<?php esc_html_e( 'Equip employees with the practical knowledge they need to recognize cyber threats, protect organizational information, and make safer security decisions every day.', 'akaza-adventure' ); ?>
				</p>

				<p>
					<?php esc_html_e( 'SucceedLEARN\'s Information Security Awareness Training is an employee-focused eLearning course designed to help organizations strengthen information security awareness and support their security and compliance requirements.', 'akaza-adventure' ); ?>
				</p>

				<p>
					<?php esc_html_e( 'Through 10 focused security sub awareness modules, employees build practical knowledge across account security, social engineering, malware, data classification, physical security, remote working, third-party risk, insider threats, incident reporting and emerging AI-based attacks.', 'akaza-adventure' ); ?>
				</p>

				<div class="sl-isat-hero__meta" aria-label="<?php esc_attr_e( 'Course details', 'akaza-adventure' ); ?>">
					<span class="sl-isat-hero__meta-item">
						<strong><?php esc_html_e( 'Course Category:', 'akaza-adventure' ); ?></strong>
						<?php esc_html_e( 'Security Awareness', 'akaza-adventure' ); ?>
					</span>
				</div>

				<div class="sl-hero-actions sl-isat-hero__actions">
					<a class="sl-hero-btn sl-hero-btn-primary" href="#contact">
						<?php esc_html_e( 'Request a Demo', 'akaza-adventure' ); ?>
						<span aria-hidden="true"></span>
					</a>
				</div>

			</div>

			<div class="sl-isat-hero__media">
				<div class="sl-isat-hero__image">
					<img
						src="<?php echo esc_url( $isat_hero_image ); ?>"
						alt="<?php esc_attr_e( 'Information Security Awareness Training for employees', 'akaza-adventure' ); ?>"
						width="720"
						height="540"
						loading="eager"
						decoding="async"
					/>
				</div>
			</div>

		</div>

	</div>
</section>
