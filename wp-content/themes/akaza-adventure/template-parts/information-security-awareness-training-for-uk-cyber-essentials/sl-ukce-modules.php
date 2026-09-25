<?php
/**
 * UK Cyber Essentials — Core module cards.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$modules = array(
	array(
		'number'  => '01',
		'title'   => __( 'Account Security', 'akaza-adventure' ),
		'tagline' => __( 'Support Secure User Access', 'akaza-adventure' ),
		'lead'    => __( 'User Access Control is one of the five Cyber Essentials technical controls.', 'akaza-adventure' ),
		'text'    => __( 'The Account Security module helps employees understand secure authentication and the importance of protecting organisational accounts and credentials.', 'akaza-adventure' ),
		'topics'  => __( 'Password Security · Authentication · MFA · Credential Protection · Account Access', 'akaza-adventure' ),
		'note'    => __( 'The Cyber Essentials requirements include controls around user accounts, authentication and appropriate access.', 'akaza-adventure' ),
		'cta'     => __( 'Explore Account Security Training', 'akaza-adventure' ),
	),
	array(
		'number'  => '02',
		'title'   => __( 'Malware', 'akaza-adventure' ),
		'tagline' => __( 'Strengthen Employee Malware Awareness', 'akaza-adventure' ),
		'lead'    => __( 'Malware Protection is another of the five Cyber Essentials technical controls.', 'akaza-adventure' ),
		'text'    => __( 'The Malware module helps employees recognise behaviours that may expose organisational devices and systems to malicious software, including suspicious links, attachments and downloads.', 'akaza-adventure' ),
		'topics'  => __( 'Malware · Ransomware · Suspicious Links · Malicious Attachments · Unsafe Downloads', 'akaza-adventure' ),
		'note'    => __( 'Cyber Essentials explicitly includes Malware Protection as one of its core technical controls.', 'akaza-adventure' ),
		'cta'     => __( 'Explore Malware Awareness Training', 'akaza-adventure' ),
	),
	array(
		'number'  => '03',
		'title'   => __( 'Remote Work Security', 'akaza-adventure' ),
		'tagline' => __( 'Reinforce Secure Working Beyond the Office', 'akaza-adventure' ),
		'lead'    => __( 'Cyber Essentials requirements apply to relevant devices and services within scope, including environments involving home working and cloud services.', 'akaza-adventure' ),
		'text'    => __( 'The Remote Work Security module helps employees understand secure behaviour when accessing organisational systems and information outside controlled office environments.', 'akaza-adventure' ),
		'topics'  => __( 'Remote Working · Wi-Fi Security · Device Protection · Secure Access · Cloud Security Awareness', 'akaza-adventure' ),
		'note'    => __( 'Cyber Essentials has evolved to account for home working, BYOD and cloud services, and current v3.3 requirements state that cloud services cannot simply be excluded from scope.', 'akaza-adventure' ),
		'cta'     => __( 'Explore Remote Work Security Training', 'akaza-adventure' ),
	),
);
?>

<section
	class="sl-ukce-modules"
	id="security-awareness-modules"
	aria-labelledby="sl-ukce-modules-title"
>
	<div class="container">

		<div class="sl-ukce-modules__heading">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'S-Aware Modules', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-ukce-modules-title">
				<?php esc_html_e( 'Security Awareness Modules Relevant to', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'Cyber Essentials', 'akaza-adventure' ); ?></span>
			</h2>

			<h3 class="sl-ukce-modules__subtitle">
				<?php esc_html_e( 'Focused Employee Awareness Around Key Cyber Essentials Controls', 'akaza-adventure' ); ?>
			</h3>
		</div>

		<div class="sl-ukce-modules__grid">
			<?php foreach ( $modules as $module ) : ?>
				<article class="sl-ukce-modules__card">
					<div class="sl-ukce-modules__number">
						<?php echo esc_html( $module['number'] ); ?>
					</div>

					<div class="sl-ukce-modules__content">
						<h3 class="sl-panel-title">
							<?php echo esc_html( $module['title'] ); ?>
						</h3>

						<p class="sl-ukce-modules__tagline">
							<?php echo esc_html( $module['tagline'] ); ?>
						</p>

						<p class="sl-ukce-modules__lead">
							<?php echo esc_html( $module['lead'] ); ?>
						</p>

						<p>
							<?php echo esc_html( $module['text'] ); ?>
						</p>

						<p class="sl-ukce-modules__topics">
							<strong><?php esc_html_e( 'Key Topics:', 'akaza-adventure' ); ?></strong>
							<?php echo esc_html( $module['topics'] ); ?>
						</p>

						<p class="sl-ukce-modules__note">
							<?php echo esc_html( $module['note'] ); ?>
						</p>

						<a class="sl-ukce-modules__link" href="#contact">
							<?php echo esc_html( $module['cta'] ); ?>
						</a>
					</div>
				</article>
			<?php endforeach; ?>
		</div>

	</div>
</section>
