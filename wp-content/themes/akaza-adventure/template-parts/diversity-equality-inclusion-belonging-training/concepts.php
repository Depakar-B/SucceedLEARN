<?php
/**
 * DEI&B — Four concepts section.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$concepts = array(
	array(
		'icon'     => 'bi-people',
		'label'    => __( 'Diversity', 'akaza-adventure' ),
		'question' => __( 'who is represented?', 'akaza-adventure' ),
		'answer'   => __( 'People bring different identities, backgrounds, experiences and perspectives to work. Recognising this diversity helps employees appreciate that colleagues may experience the same workplace differently.', 'akaza-adventure' ),
	),
	array(
		'icon'     => 'bi-balance-scale',
		'label'    => __( 'Equality', 'akaza-adventure' ),
		'question' => __( 'are people treated fairly?', 'akaza-adventure' ),
		'answer'   => __( 'Equality concerns fair treatment and access to opportunity. It asks employees to recognise when someone’s characteristics or circumstances influence how they are treated.', 'akaza-adventure' ),
	),
	array(
		'icon'     => 'bi-hand-thumbs-up',
		'label'    => __( 'Inclusion', 'akaza-adventure' ),
		'question' => __( 'can people participate?', 'akaza-adventure' ),
		'answer'   => __( 'Inclusion means enabling people to contribute. Listening, considering different needs and giving ideas fair attention help make participation meaningful.', 'akaza-adventure' ),
	),
	array(
		'icon'     => 'bi-heart',
		'label'    => __( 'Belonging', 'akaza-adventure' ),
		'question' => __( 'do people feel accepted and valued?', 'akaza-adventure' ),
		'answer'   => __( 'Belonging describes a person’s experience of being part of a team. Respectful relationships, meaningful participation and consistent treatment help create the conditions for it.', 'akaza-adventure' ),
	),
);
?>
<section class="sl-deib-concepts" aria-labelledby="sl-deib-concepts-heading">

	<div class="container">

		<div class="sl-deib-concepts__intro">
			<h2 id="sl-deib-concepts-heading">
				<?php esc_html_e( 'From representation to belonging', 'akaza-adventure' ); ?>
			</h2>
			<p>
				<?php esc_html_e( 'Each concept in the module asks a different question about the employee experience.', 'akaza-adventure' ); ?>
			</p>
		</div>

		<div class="sl-deib-concepts__list">
			<?php foreach ( $concepts as $concept ) : ?>
				<article class="sl-deib-concepts__row">
					<div class="sl-deib-concepts__question">
						<span class="sl-deib-concepts__icon" aria-hidden="true">
							<i class="bi <?php echo esc_attr( $concept['icon'] ); ?>"></i>
						</span>
						<h3>
							<?php echo esc_html( $concept['label'] ); ?>:
							<span><?php echo esc_html( $concept['question'] ); ?></span>
						</h3>
					</div>
					<p class="sl-deib-concepts__answer">
						<?php echo esc_html( $concept['answer'] ); ?>
					</p>
				</article>
			<?php endforeach; ?>
		</div>

		<p class="sl-deib-concepts__closing">
			<?php esc_html_e( 'The course’s equality, discrimination and inclusion content supports this wider goal of workplace belonging.', 'akaza-adventure' ); ?>
		</p>

	</div>

</section>
