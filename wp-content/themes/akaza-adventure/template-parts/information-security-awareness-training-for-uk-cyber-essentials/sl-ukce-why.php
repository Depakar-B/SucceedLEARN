<?php
/**
 * UK Cyber Essentials — Why Security Awareness Matters.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$controls = array(
	__( 'Firewalls', 'akaza-adventure' ),
	__( 'Secure Configuration', 'akaza-adventure' ),
	__( 'Security Update Management', 'akaza-adventure' ),
	__( 'User Access Control', 'akaza-adventure' ),
	__( 'Malware Protection', 'akaza-adventure' ),
);

$behaviours = array(
	__( 'Employees use organizational accounts.', 'akaza-adventure' ),
	__( 'They authenticate into cloud applications.', 'akaza-adventure' ),
	__( 'They work on laptops and mobile devices.', 'akaza-adventure' ),
	__( 'They respond to update prompts.', 'akaza-adventure' ),
	__( 'They access systems remotely.', 'akaza-adventure' ),
	__( 'They download files and applications.', 'akaza-adventure' ),
);
?>

<section
	class="sl-ukce-why"
	id="why-security-awareness-matters"
	aria-labelledby="sl-ukce-why-title"
>
	<div class="container">

		<div class="sl-ukce-why__intro">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Five Technical Controls', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-ukce-why-title">
				<?php esc_html_e( 'Why Security Awareness Matters', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'for Cyber Essentials', 'akaza-adventure' ); ?></span>
			</h2>

			<p>
				<?php esc_html_e( 'Cyber Essentials is built around five technical controls designed to reduce an organization\'s exposure to common cyber-attacks:', 'akaza-adventure' ); ?>
			</p>
		</div>

		<div class="sl-ukce-why__grid">
			<?php foreach ( $controls as $index => $control ) : ?>
				<article class="sl-ukce-why__card">
					<span class="sl-ukce-why__icon" aria-hidden="true">
						<span class="sl-ukce-why__num"><?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?></span>
					</span>
					<p><?php echo esc_html( $control ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>

		<div class="sl-ukce-why__conclusion">
			<p>
				<?php esc_html_e( 'The National Cyber Security Centre states that organizations applying for Cyber Essentials are responsible for ensuring that the requirements across all five controls are met within the defined scope.', 'akaza-adventure' ); ?>
			</p>
			<p>
				<?php esc_html_e( 'These controls are technical in nature, but employees interact with many of them every day.', 'akaza-adventure' ); ?>
			</p>
			<ul class="sl-ukce-why__list">
				<?php foreach ( $behaviours as $item ) : ?>
					<li><?php echo esc_html( $item ); ?></li>
				<?php endforeach; ?>
			</ul>
			<p>
				<?php esc_html_e( 'And their behavior can either support or weaken the security practices an organization has implemented.', 'akaza-adventure' ); ?>
			</p>
			<p>
				<?php esc_html_e( 'Employee security awareness can therefore help reinforce the secure behaviours surrounding Cyber Essentials technical controls.', 'akaza-adventure' ); ?>
			</p>
		</div>

	</div>
</section>
