<?php
/**
 * UK Cyber Essentials AMP — Designed for everyday situations.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$learning_elements = succeedlearn_amp_get_ukce_learning_elements();
?>
<section
	class="sl-ukce-designed"
	id="practical-everyday-security-awareness"
	aria-labelledby="sl-ukce-designed-title"
>
	<div class="sl-wrap">
		<div class="sl-ukce-designed__heading">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Learning Experience', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-ukce-designed-title" class="sl-h2">
				<?php esc_html_e( 'Designed Based on Practical, Everyday', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'Security Awareness Situations', 'succeedlearn-amp' ); ?></span>
			</h2>
		</div>

		<div class="sl-ukce-designed__detail sl-ukce-designed__detail--label">
			<h3><?php esc_html_e( 'Learning elements', 'succeedlearn-amp' ); ?></h3>
		</div>

		<div class="sl-ukce-designed__grid">
			<?php foreach ( $learning_elements as $element ) : ?>
				<article class="sl-ukce-designed__card">
					<h3><?php echo esc_html( $element['title'] ); ?></h3>
					<p><?php echo esc_html( $element['text'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>

		<div class="sl-ukce-designed__details">
			<div class="sl-ukce-designed__detail">
				<h3><?php esc_html_e( 'Format & accessibility', 'succeedlearn-amp' ); ?></h3>
				<p>
					<?php esc_html_e( 'Fully responsive interface across desktop, tablet, and mobile — complete with a learner dashboard, progress tracking, automated reminder prompts, and seamless integration with your existing LMS or HR systems.', 'succeedlearn-amp' ); ?>
				</p>
			</div>

			<div class="sl-ukce-designed__detail">
				<h3><?php esc_html_e( 'Certificate', 'succeedlearn-amp' ); ?></h3>
				<p>
					<?php esc_html_e( 'Upon successful completion, you receive a CPD certificate valid as proof of training.', 'succeedlearn-amp' ); ?>
				</p>
			</div>
		</div>
	</div>
</section>
