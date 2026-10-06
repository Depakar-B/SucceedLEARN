<?php
/**
 * UK Cyber Essentials AMP — Why security awareness matters.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$controls   = succeedlearn_amp_get_ukce_controls();
$behaviours = succeedlearn_amp_get_ukce_behaviours();
?>
<section
	class="sl-ukce-why"
	id="why-security-awareness-matters"
	aria-labelledby="sl-ukce-why-title"
>
	<div class="sl-wrap">
		<div class="sl-ukce-why__intro">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Five Technical Controls', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-ukce-why-title" class="sl-h2">
				<?php esc_html_e( 'Why Security Awareness Matters', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'for Cyber Essentials', 'succeedlearn-amp' ); ?></span>
			</h2>

			<p>
				<?php esc_html_e( 'Cyber Essentials is built around five technical controls designed to reduce an organization\'s exposure to common cyber-attacks:', 'succeedlearn-amp' ); ?>
			</p>
		</div>

		<div class="sl-ukce-why__layout">
			<div class="sl-ukce-why__points">
				<?php foreach ( $controls as $control ) : ?>
					<article class="sl-ukce-why__card">
						<p><?php echo esc_html( $control ); ?></p>
					</article>
				<?php endforeach; ?>
			</div>

			<div class="sl-ukce-why__conclusion">
				<p>
					<?php esc_html_e( 'The National Cyber Security Centre states that organizations applying for Cyber Essentials are responsible for ensuring that the requirements across all five controls are met within the defined scope.', 'succeedlearn-amp' ); ?>
				</p>
				<p>
					<?php esc_html_e( 'These controls are technical in nature, but employees interact with many of them every day.', 'succeedlearn-amp' ); ?>
				</p>
				<ul class="sl-ukce-why__list">
					<?php foreach ( $behaviours as $item ) : ?>
						<li><?php echo esc_html( $item ); ?></li>
					<?php endforeach; ?>
				</ul>
				<p>
					<?php esc_html_e( 'And their behavior can either support or weaken the security practices an organization has implemented.', 'succeedlearn-amp' ); ?>
				</p>
				<p>
					<?php esc_html_e( 'Employee security awareness can therefore help reinforce the secure behaviours surrounding Cyber Essentials technical controls.', 'succeedlearn-amp' ); ?>
				</p>
			</div>
		</div>
	</div>
</section>
