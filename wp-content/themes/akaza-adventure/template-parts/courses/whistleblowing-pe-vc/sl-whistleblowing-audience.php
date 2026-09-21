<?php
/**
 * Whistleblowing Training — Target Audience.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$audiences = array(
	array(
		'title' => __( 'Deal and investment teams', 'akaza-adventure' ),
		'text'  => __( 'Professionals working with transaction materials, target companies and sensitive financial information.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Analysts and associates', 'akaza-adventure' ),
		'text'  => __( 'Employees who may identify discrepancies or concerning behaviour during research and deal work.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Compliance, legal and risk teams', 'akaza-adventure' ),
		'text'  => __( 'Teams supporting policies, reporting arrangements and escalation processes.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Managers and wider employees', 'akaza-adventure' ),
		'text'  => __( 'Employees who need to understand what speaking up means and how concerns should be handled.', 'akaza-adventure' ),
	),
);
?>

<section
	id="target-audience"
	class="sl-whistleblowing-audience"
	aria-labelledby="sl-whistleblowing-audience-title"
>
	<div class="container">

		<div class="sl-whistleblowing-audience__intro">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Target Audience', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-whistleblowing-audience-title">
				<?php esc_html_e( 'Who Should Take a', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'Whistleblowing Course?', 'akaza-adventure' ); ?></span>
			</h2>

			<p>
				<?php esc_html_e( 'This course is relevant to professionals who may identify, receive or need to escalate concerns about workplace wrongdoing.', 'akaza-adventure' ); ?>
			</p>
		</div>

		<div class="sl-whistleblowing-audience__grid">
			<?php foreach ( $audiences as $audience ) : ?>
				<article class="sl-whistleblowing-audience__item">
					<h3 class="sl-panel-title">
						<?php echo esc_html( $audience['title'] ); ?>
					</h3>

					<p>
						<?php echo esc_html( $audience['text'] ); ?>
					</p>
				</article>
			<?php endforeach; ?>
		</div>

	</div>
</section>