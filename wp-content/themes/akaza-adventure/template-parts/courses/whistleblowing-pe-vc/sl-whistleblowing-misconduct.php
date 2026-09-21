<?php
/**
 * Whistleblowing Training — Recognising Misconduct.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$concerns = array(
	array(
		'title' => __( 'Financial misreporting', 'akaza-adventure' ),
		'text'  => __( 'Concerns about discrepancies or misleading financial information.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Insider dealing and market abuse', 'akaza-adventure' ),
		'text'  => __( 'Potential misuse of information or inappropriate market conduct.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Bribery and conflicts', 'akaza-adventure' ),
		'text'  => __( 'Conduct involving improper influence or unmanaged conflicts of interest.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'AML and sanctions concerns', 'akaza-adventure' ),
		'text'  => __( 'Potential issues relating to anti-money laundering or sanctions obligations.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Confidential information', 'akaza-adventure' ),
		'text'  => __( 'Concerns involving unauthorised access to or misuse of sensitive information.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Retaliation for speaking up', 'akaza-adventure' ),
		'text'  => __( 'Unfair treatment linked to the raising of a legitimate concern.', 'akaza-adventure' ),
	),
);
?>

<section
	id="recognising-misconduct"
	class="sl-whistleblowing-misconduct"
	aria-labelledby="sl-whistleblowing-misconduct-title"
>
	<div class="container">

		<div class="sl-whistleblowing-misconduct__intro">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Recognising Misconduct', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-whistleblowing-misconduct-title">
				<?php esc_html_e( 'What Types of Concerns Can Qualify as', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'Whistleblowing?', 'akaza-adventure' ); ?></span>
			</h2>

			<p>
				<?php esc_html_e( 'The course introduces the types of wrongdoing employees may need to recognise and raise through appropriate channels.', 'akaza-adventure' ); ?>
			</p>
		</div>

		<div class="sl-whistleblowing-misconduct__grid">
			<?php foreach ( $concerns as $concern ) : ?>
				<article class="sl-whistleblowing-misconduct__card">
					<h3 class="sl-panel-title">
						<?php echo esc_html( $concern['title'] ); ?>
					</h3>

					<p>
						<?php echo esc_html( $concern['text'] ); ?>
					</p>
				</article>
			<?php endforeach; ?>
		</div>

	</div>
</section>