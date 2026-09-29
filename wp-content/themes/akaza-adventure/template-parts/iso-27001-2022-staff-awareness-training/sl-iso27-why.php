<?php
/**
 * ISO 27001:2022 Staff Awareness Training - Why Awareness Matters.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$iso27_why_file  = '2026/01/F-ISO-27001-Staff-Awareness-eLearning.webp';
$iso27_why_image = 'https://succeedlearn.com/wp-content/uploads/' . $iso27_why_file;

if ( function_exists( 'akaza_upload_url' ) && file_exists( WP_CONTENT_DIR . '/uploads/' . $iso27_why_file ) ) {
	$iso27_why_image = akaza_upload_url( $iso27_why_file );
}
?>

<section
	class="sl-iso27-why"
	id="why-iso-27001-awareness-matters"
	aria-labelledby="sl-iso27-why-title"
>
	<div class="container">

		<div class="sl-iso27-why__grid">

			<div class="sl-iso27-why__media">
				<div class="sl-iso27-why__image">
					<img
						src="<?php echo esc_url( $iso27_why_image ); ?>"
						alt="<?php esc_attr_e( 'Why ISO 27001:2022 awareness matters for employees', 'akaza-adventure' ); ?>"
						width="720"
						height="720"
						loading="lazy"
						decoding="async"
					/>
				</div>
			</div>

			<div class="sl-iso27-why__content">

				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'Why It Matters', 'akaza-adventure' ); ?>
				</span>

				<h2 id="sl-iso27-why-title">
					<?php esc_html_e( 'Why ISO 27001:2022 Awareness', 'akaza-adventure' ); ?>
					<span><?php esc_html_e( 'Matters', 'akaza-adventure' ); ?></span>
				</h2>

				<div class="sl-iso27-why__copy">
					<p>
						<?php
						esc_html_e(
							'ISO/IEC 27001:2022 is the international standard specifying requirements for establishing, implementing, maintaining and continually improving an Information Security Management System (ISMS).',
							'akaza-adventure'
						);
						?>
					</p>

					<p>
						<?php
						esc_html_e(
							'Technology and security controls are only part of information security. Employees interact with organizational information, systems, devices, applications, and third parties every day. Their decisions can either strengthen or undermine the controls an organization has established.',
							'akaza-adventure'
						);
						?>
					</p>

					<p>
						<?php
						esc_html_e(
							'ISO/IEC 27001:2022 places explicit emphasis on awareness and competence. Clause 7.3 addresses awareness of the information security policy, contribution to the effectiveness of the ISMS, and implications of not conforming with ISMS requirements. Annex A Control 6.3 addresses information security awareness, education and training.',
							'akaza-adventure'
						);
						?>
					</p>

					<p>
						<?php
						esc_html_e(
							'SucceedLEARN\'s ISO 27001:2022 awareness training helps translate these principles into information employees can understand and apply in their everyday work.',
							'akaza-adventure'
						);
						?>
					</p>
				</div>

			</div>

		</div>

	</div>
</section>
