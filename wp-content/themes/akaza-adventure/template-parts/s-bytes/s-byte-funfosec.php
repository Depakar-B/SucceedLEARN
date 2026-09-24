<?php
/**
 * S-Bytes — Why FunFoSec? (sticky intro + numbered cards).
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$sbytes_funfosec_benefits = array(
	array(
		'number' => '01',
		'title'  => __( 'Bite-Sized Learning', 'akaza-adventure' ),
		'body'   => __(
			'Each microlearning video is designed to be completed in just 3–5 minutes, making it easy for employees to learn without disrupting their workday. Short, focused learning improves participation, reduces learning fatigue, and helps reinforce key security concepts more effectively than lengthy training sessions.',
			'akaza-adventure'
		),
	),
	array(
		'number' => '02',
		'title'  => __( 'Learn Without Disruption', 'akaza-adventure' ),
		'body'   => __(
			'FunFoSec videos are delivered directly to employees through email, eliminating the need for additional logins or lengthy LMS sessions. Employees can access learning instantly across devices, making continuous security awareness simple, convenient, and easy to incorporate into their daily routine.',
			'akaza-adventure'
		),
	),
	array(
		'number' => '03',
		'title'  => __( 'Engaging & Memorable', 'akaza-adventure' ),
		'body'   => __(
			'Using humour, relatable workplace situations, and storytelling, FunFoSec transforms traditional security awareness into an engaging learning experience. By making complex cybersecurity topics easier to understand and remember, employees are more likely to retain knowledge and apply secure behaviours in real-world situations.',
			'akaza-adventure'
		),
	),
	array(
		'number' => '04',
		'title'  => __( 'Flexible Delivery & Progress Tracking', 'akaza-adventure' ),
		'body'   => __(
			'Organisations can schedule and distribute microlearning campaigns based on their awareness strategy while tracking employee participation and completion. This enables administrators to monitor engagement, measure learning progress, and support ongoing security awareness initiatives with greater visibility.',
			'akaza-adventure'
		),
	),
	array(
		'number' => '05',
		'title'  => __( 'Continuous Reinforcement', 'akaza-adventure' ),
		'body'   => __(
			'Security awareness is most effective when learning is reinforced consistently. FunFoSec delivers regular microlearning that keeps cybersecurity top of mind, helping employees retain critical concepts, adapt to emerging threats, and develop secure behaviours throughout the year rather than only during annual training.',
			'akaza-adventure'
		),
	),
);
?>

<section
	id="why-funfosec"
	class="sl-sbytes-funfosec"
	aria-labelledby="sl-sbytes-funfosec-title"
>
	<div class="container">

		<div class="sl-sbytes-funfosec__layout">

			<div class="sl-sbytes-funfosec__intro">

				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'Why FunFoSec?', 'akaza-adventure' ); ?>
				</span>

				<h2 id="sl-sbytes-funfosec-title">
					<?php esc_html_e( 'Why', 'akaza-adventure' ); ?>
					<span><?php esc_html_e( 'FunFoSec?', 'akaza-adventure' ); ?></span>
				</h2>

				<p>
					<?php
					esc_html_e(
						'Traditional cybersecurity training is often dull and repetitive, leading employees to tune out and miss crucial information. FunFoSec flips the script by delivering short, humorous, and highly memorable security lessons that employees will genuinely look forward to.',
						'akaza-adventure'
					);
					?>
				</p>
				<p>
					<?php
					esc_html_e(
						'By delivering awareness in small, regular bursts, FunFoSec helps organisations reinforce secure behaviours long after formal security awareness training has been completed.',
						'akaza-adventure'
					);
					?>
				</p>

				<div class="sl-sbytes-funfosec__actions sl-hero-actions">
					<a href="#request-demo" class="sl-hero-btn sl-hero-btn-primary">
						<?php esc_html_e( 'Contact Us', 'akaza-adventure' ); ?>
					</a>
				</div>

			</div>

			<div
				class="sl-sbytes-funfosec__cards"
				tabindex="0"
				aria-label="<?php esc_attr_e( 'Why FunFoSec cards', 'akaza-adventure' ); ?>"
			>
				<div class="sl-sbytes-funfosec__grid">

					<?php foreach ( $sbytes_funfosec_benefits as $item ) : ?>

						<article class="sl-sbytes-funfosec__card">

							<div class="sl-sbytes-funfosec__title-row">
								<span class="sl-sbytes-funfosec__number">
									<?php echo esc_html( $item['number'] ); ?>
								</span>
								<h3><?php echo esc_html( $item['title'] ); ?></h3>
							</div>

							<p><?php echo esc_html( $item['body'] ); ?></p>

						</article>

					<?php endforeach; ?>

				</div>
			</div>

		</div>

	</div>
</section>
