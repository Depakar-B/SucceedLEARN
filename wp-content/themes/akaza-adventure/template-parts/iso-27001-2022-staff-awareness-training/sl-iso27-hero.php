<?php
/**
 * ISO 27001:2022 Staff Awareness Training - Hero section.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$iso27_hero_file  = '2026/10/ISO-27001-1.webp';
$iso27_hero_image = 'https://succeedlearn.com/wp-content/uploads/' . $iso27_hero_file;

if ( function_exists( 'akaza_upload_url' ) && file_exists( WP_CONTENT_DIR . '/uploads/' . $iso27_hero_file ) ) {
	$iso27_hero_image = akaza_upload_url( $iso27_hero_file );
}
?>

<section
	class="sl-iso27-hero"
	aria-labelledby="sl-iso27-hero-title"
>
	<div class="container">

		<div class="sl-iso27-hero__grid">

			<div class="sl-iso27-hero__content">

				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'ISO 27001 Awareness', 'akaza-adventure' ); ?>
				</span>

				<h1 id="sl-iso27-hero-title">
					<?php esc_html_e( 'ISO 27001', 'akaza-adventure' ); ?><span><?php esc_html_e( ':2022 Staff Awareness Training', 'akaza-adventure' ); ?></span>
				</h1>

				<h2 class="sl-hero-h2">
					<?php esc_html_e( 'Build Employee Awareness. Strengthen Your Information Security Management System.', 'akaza-adventure' ); ?>
				</h2>

				<p>
					<?php
					esc_html_e(
						'Help employees understand their information security responsibilities with engaging ISO 27001:2022 staff awareness training designed for today\'s workplace.',
						'akaza-adventure'
					);
					?>
				</p>

				<p>
					<?php
					esc_html_e(
						'The course introduces employees to ISO/IEC 27001:2022, the Information Security Management System (ISMS), the principles of confidentiality, integrity and availability, information security risks, and the everyday behaviors that help protect organizational information.',
						'akaza-adventure'
					);
					?>
				</p>

				<p>
					<?php
					esc_html_e(
						'Through practical examples, interactive learning and knowledge checks, employees learn how their actions contribute to information security and the effectiveness of the organization\'s ISMS.',
						'akaza-adventure'
					);
					?>
				</p>

				<div class="sl-iso27-hero__meta" aria-label="<?php esc_attr_e( 'Course details', 'akaza-adventure' ); ?>">
					<span class="sl-iso27-hero__meta-item">
						<strong><?php esc_html_e( 'Course Category:', 'akaza-adventure' ); ?></strong>
						<?php esc_html_e( 'Security Awareness', 'akaza-adventure' ); ?>
					</span>
					<span class="sl-iso27-hero__meta-item">
						<strong><?php esc_html_e( 'Total Duration:', 'akaza-adventure' ); ?></strong>
						<?php esc_html_e( '30 mins', 'akaza-adventure' ); ?>
					</span>
				</div>

				<div class="sl-hero-actions sl-iso27-hero__actions">
					<a class="sl-hero-btn sl-hero-btn-primary" href="#contact">
						<?php esc_html_e( 'Request a Demo', 'akaza-adventure' ); ?>
						<span aria-hidden="true">&rarr;</span>
					</a>
				</div>

			</div>

			<div class="sl-iso27-hero__media">
				<div class="sl-iso27-hero__image">
					<img
						src="<?php echo esc_url( $iso27_hero_image ); ?>"
						alt="<?php esc_attr_e( 'ISO 27001:2022 staff awareness training for employees', 'akaza-adventure' ); ?>"
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
