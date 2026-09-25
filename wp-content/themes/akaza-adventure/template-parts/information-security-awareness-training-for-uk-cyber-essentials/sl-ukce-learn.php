<?php
/**
 * UK Cyber Essentials — What Will Employees Learn?
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$learn_items = array(
	__( 'Protect organizational accounts and authentication credentials.', 'akaza-adventure' ),
	__( 'Understand the importance of appropriate access and authentication practices.', 'akaza-adventure' ),
	__( 'Recognize malware and potentially unsafe downloads, links, or files.', 'akaza-adventure' ),
	__( 'Understand why software and security updates should not be ignored.', 'akaza-adventure' ),
	__( 'Recognize risks associated with devices and applications.', 'akaza-adventure' ),
	__( 'Work more securely when accessing organizational systems remotely.', 'akaza-adventure' ),
	__( 'Understand the security considerations associated with cloud services and remote access.', 'akaza-adventure' ),
	__( 'Recognize suspicious activity that may affect organizational systems or devices.', 'akaza-adventure' ),
	__( 'Follow organizational security procedures when using company technology.', 'akaza-adventure' ),
	__( 'Report potential security concerns through appropriate internal channels.', 'akaza-adventure' ),
);
?>

<section
	class="sl-ukce-learn"
	id="what-will-employees-learn"
	aria-labelledby="sl-ukce-learn-title"
>
	<div class="container">

		<div class="sl-ukce-learn__intro">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Learning Outcomes', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-ukce-learn-title">
				<?php esc_html_e( 'What Will Employees', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'Learn?', 'akaza-adventure' ); ?></span>
			</h2>

			<p>
				<?php esc_html_e( 'Through the training, employees can build practical awareness around security behaviours relevant to the Cyber Essentials environment.', 'akaza-adventure' ); ?>
			</p>

			<p>
				<?php esc_html_e( 'Learners will be better equipped to:', 'akaza-adventure' ); ?>
			</p>
		</div>

		<div class="sl-ukce-learn__grid">
			<?php foreach ( $learn_items as $index => $item ) : ?>
				<article class="sl-ukce-learn__card">
					<span class="sl-ukce-learn__number" aria-hidden="true">
						<?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?>
					</span>
					<p><?php echo esc_html( $item ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>

		<div class="sl-ukce-learn__note">
			<p>
				<?php esc_html_e( 'The aim is not to make employees responsible for implementing Cyber Essentials technical controls. It is to help them understand the secure behaviours that complement those controls.', 'akaza-adventure' ); ?>
			</p>
		</div>

	</div>
</section>
