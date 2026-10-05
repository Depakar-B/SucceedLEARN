<?php
/**
 * UK Cyber Essentials AMP — What certification requires vs what training supports.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section
	class="sl-ukce-requires"
	id="what-cyber-essentials-requires"
	aria-labelledby="sl-ukce-requires-title"
>
	<div class="sl-wrap">
		<div class="sl-ukce-requires__panel">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Certification Clarity', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-ukce-requires-title" class="sl-h2">
				<?php esc_html_e( 'What Cyber Essentials Requires and', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'What Training Supports', 'succeedlearn-amp' ); ?></span>
			</h2>

			<p>
				<?php esc_html_e( 'Cyber Essentials requires organisations to implement the technical requirements associated with all five controls within their certification scope. The current v3.3 requirements are effective from 27 April 2026.', 'succeedlearn-amp' ); ?>
			</p>

			<p>
				<?php esc_html_e( 'Employee awareness training can reinforce the human behaviours surrounding those technical controls, but training itself does not configure a firewall, apply software updates, remove unnecessary services or technically restrict system access.', 'succeedlearn-amp' ); ?>
			</p>

			<p>
				<?php esc_html_e( 'The distinction can be thought of simply:', 'succeedlearn-amp' ); ?>
			</p>

			<div class="sl-ukce-requires__compare">
				<article class="sl-ukce-requires__compare-card">
					<h3><?php esc_html_e( 'Cyber Essentials technical controls', 'succeedlearn-amp' ); ?></h3>
					<p><?php esc_html_e( 'Protect the organisation’s IT environment', 'succeedlearn-amp' ); ?></p>
				</article>
				<article class="sl-ukce-requires__compare-card">
					<h3><?php esc_html_e( 'Employee security awareness', 'succeedlearn-amp' ); ?></h3>
					<p><?php esc_html_e( 'Helps employees use that environment securely', 'succeedlearn-amp' ); ?></p>
				</article>
			</div>

			<p>
				<?php esc_html_e( 'Both contribute to stronger cybersecurity, but they serve different purposes.', 'succeedlearn-amp' ); ?>
			</p>
		</div>
	</div>
</section>
