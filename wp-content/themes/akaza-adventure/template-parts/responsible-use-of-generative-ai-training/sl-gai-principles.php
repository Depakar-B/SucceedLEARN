<?php
/**
 * Responsible Use of Generative AI Training - Five principles employees should remember.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$gai_principles = array(
	array(
		'title' => __( 'Protect information', 'akaza-adventure' ),
		'text'  => __( 'Consider what is being shared before entering content into a generative AI tool.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Seek approval', 'akaza-adventure' ),
		'text'  => __( 'Obtain the required approval before integrating AI with organisational systems.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Check the output', 'akaza-adventure' ),
		'text'  => __( 'Treat AI-generated responses as material that may require verification and human review.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Consider the context', 'akaza-adventure' ),
		'text'  => __( 'Recognise that regulatory expectations can vary by country, industry and use case.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Respect ownership', 'akaza-adventure' ),
		'text'  => __( 'Consider copyright and permitted use when creating, adapting or sharing AI-generated material.', 'akaza-adventure' ),
	),
);
?>

<section
	class="sl-gai-principles"
	id="five-principles"
	aria-labelledby="sl-gai-principles-title"
>
	<div class="container">

		<div class="sl-gai-principles__heading">
			<h2 id="sl-gai-principles-title">
				<?php esc_html_e( 'Five principles', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'employees should remember', 'akaza-adventure' ); ?></span>
			</h2>
		</div>

		<ol class="sl-gai-principles__list">
			<?php foreach ( $gai_principles as $gai_index => $gai_principle ) : ?>
				<li class="sl-gai-principles__item">
					<span class="sl-gai-principles__number" aria-hidden="true">
						<?php echo esc_html( str_pad( (string) ( $gai_index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?>
					</span>
					<div class="sl-gai-principles__body">
						<h3><?php echo esc_html( $gai_principle['title'] ); ?></h3>
						<p><?php echo esc_html( $gai_principle['text'] ); ?></p>
					</div>
				</li>
			<?php endforeach; ?>
		</ol>

	</div>
</section>
