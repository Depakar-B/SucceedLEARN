<?php
/**
 * ISO 27001 AMP — Why awareness matters.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$why_image = succeedlearn_amp_get_iso27001_why_image();
?>
<section
	class="sl-iso27-why"
	id="why-iso-27001-awareness-matters"
	aria-labelledby="sl-iso27-why-title"
>
	<div class="sl-wrap">
		<div class="sl-iso27-why__grid">
			<div class="sl-iso27-why__media">
				<div class="sl-iso27-why__image">
					<amp-img
						src="<?php echo esc_url( $why_image ); ?>"
						width="720"
						height="720"
						layout="responsive"
						alt="<?php esc_attr_e( 'Why ISO 27001:2022 awareness matters for employees', 'succeedlearn-amp' ); ?>"
					></amp-img>
				</div>
			</div>

			<div class="sl-iso27-why__content">
				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'Why It Matters', 'succeedlearn-amp' ); ?>
				</span>

				<h2 id="sl-iso27-why-title" class="sl-h2">
					<?php esc_html_e( 'Why ISO 27001:2022 Awareness', 'succeedlearn-amp' ); ?>
					<span><?php esc_html_e( 'Matters', 'succeedlearn-amp' ); ?></span>
				</h2>

				<div class="sl-iso27-why__copy">
					<p>
						<?php esc_html_e( 'ISO/IEC 27001:2022 is the international standard specifying requirements for establishing, implementing, maintaining and continually improving an Information Security Management System (ISMS).', 'succeedlearn-amp' ); ?>
					</p>

					<p>
						<?php esc_html_e( 'Technology and security controls are only part of information security. Employees interact with organizational information, systems, devices, applications, and third parties every day. Their decisions can either strengthen or undermine the controls an organization has established.', 'succeedlearn-amp' ); ?>
					</p>

					<p>
						<?php esc_html_e( 'ISO/IEC 27001:2022 places explicit emphasis on awareness and competence. Clause 7.3 addresses awareness of the information security policy, contribution to the effectiveness of the ISMS, and implications of not conforming with ISMS requirements. Annex A Control 6.3 addresses information security awareness, education and training.', 'succeedlearn-amp' ); ?>
					</p>

					<p>
						<?php esc_html_e( 'SucceedLEARN\'s ISO 27001:2022 awareness training helps translate these principles into information employees can understand and apply in their everyday work.', 'succeedlearn-amp' ); ?>
					</p>
				</div>
			</div>
		</div>
	</div>
</section>
