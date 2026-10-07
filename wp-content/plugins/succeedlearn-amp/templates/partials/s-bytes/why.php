<?php
/**
 * S-Bytes AMP — Why Continuous Reinforcement Matters.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$why_image = succeedlearn_amp_get_sbytes_why_image();
?>
<section id="why-continuous-reinforcement" class="sl-sbytes-why" aria-labelledby="sl-sbytes-why-title">
	<div class="sl-wrap">
		<div class="sl-sbytes-why__layout">
			<div class="sl-sbytes-why__media">
				<div class="sl-sbytes-why__image">
					<amp-img
						src="<?php echo esc_url( $why_image ); ?>"
						width="960"
						height="720"
						layout="responsive"
						alt="<?php esc_attr_e( 'FunFoSec microlearning: Free Cloud Fiasco', 'succeedlearn-amp' ); ?>"
					></amp-img>
				</div>
			</div>
			<div class="sl-sbytes-why__content">
				<span class="sl-home-sub-heading"><?php esc_html_e( 'Continuous Reinforcement', 'succeedlearn-amp' ); ?></span>
				<h2 id="sl-sbytes-why-title" class="sl-h2">
					<?php esc_html_e( 'Why Continuous Reinforcement', 'succeedlearn-amp' ); ?>
					<span><?php esc_html_e( 'Matters', 'succeedlearn-amp' ); ?></span>
				</h2>
				<div class="sl-sbytes-why__body">
					<p><?php esc_html_e( 'Completing an annual security awareness training programme is an important first step, but secure behaviour cannot be developed through a single learning event. As cyber threats continue to evolve and employees face new attack techniques every day, knowledge naturally fades unless it is reinforced regularly.', 'succeedlearn-amp' ); ?></p>
					<p><?php esc_html_e( "S-Bytes complements your organisation's existing security awareness programme by delivering short, engaging microlearning videos directly to employees at regular intervals. Each lesson reinforces a specific security topic using simple language, relatable scenarios, and memorable storytelling - keeping cybersecurity top of mind without disrupting productivity.", 'succeedlearn-amp' ); ?></p>
					<p><?php esc_html_e( 'By transforming security awareness into a continuous habit rather than an annual obligation, organisations can build a more vigilant workforce, reduce human error, and foster a stronger culture of security.', 'succeedlearn-amp' ); ?></p>
					<p class="sl-sbytes-tagline"><?php esc_html_e( 'Learn once. Reinforce continuously. Remember when it matters.', 'succeedlearn-amp' ); ?></p>
				</div>
			</div>
		</div>
	</div>
</section>
