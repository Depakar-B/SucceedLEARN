<?php
/**
 * SucceedLEARN
 * Insider Trading eLearning
 * Interactive Learning Section
 *
 * @package Akaza_Adventure
 */

defined( 'ABSPATH' ) || exit;
?>

<section
	class="sl-insider-trading-interactive"
	aria-labelledby="sl-insider-trading-interactive-title"
>
	<div class="container">

		<div class="sl-insider-trading-interactive__intro">

			<span class="sl-home-sub-heading">
				<?php
				esc_html_e(
					'Interactive Insider Trading eLearning',
					'akaza-adventure'
				);
				?>
			</span>

			<h2 id="sl-insider-trading-interactive-title">
				<?php
				echo wp_kses_post(
					__(
						'How Does Interactive Insider Trading eLearning Reinforce <span>Market Abuse Regulations?</span>',
						'akaza-adventure'
					)
				);
				?>
			</h2>

			<p>
				<?php
				esc_html_e(
					'Employees work through practical situations, make decisions, receive feedback and reinforce their understanding through knowledge checks. This helps connect Market Abuse Regulations with workplace judgement.',
					'akaza-adventure'
				);
				?>
			</p>

		</div>

		<div class="sl-insider-trading-interactive__images">

			<figure class="sl-insider-trading-interactive__image">
				<img
					src="<?php echo esc_url( get_template_directory_uri() . '/images/course-introduction.png' ); ?>"
					alt="<?php esc_attr_e( 'SucceedLEARN Insider Trading eLearning course introduction', 'akaza-adventure' ); ?>"
					loading="lazy"
				>
			</figure>

			<figure class="sl-insider-trading-interactive__image">
				<img
					src="<?php echo esc_url( get_template_directory_uri() . '/images/karen-dilemma.png' ); ?>"
					alt="<?php esc_attr_e( 'SucceedLEARN Insider Trading eLearning scenario', 'akaza-adventure' ); ?>"
					loading="lazy"
				>
			</figure>

			<figure class="sl-insider-trading-interactive__image">
				<img
					src="<?php echo esc_url( get_template_directory_uri() . '/images/course-knowledge-check.png' ); ?>"
					alt="<?php esc_attr_e( 'SucceedLEARN Insider Trading eLearning knowledge check', 'akaza-adventure' ); ?>"
					loading="lazy"
				>
			</figure>

		</div>

	</div>
</section>