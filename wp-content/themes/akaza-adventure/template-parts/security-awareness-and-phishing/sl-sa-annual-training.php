<?php
/**
 * Security Awareness — Why annual training isn't enough section.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$annual_training_items = array(
	array(
		'number' => '01',
		'title'  => __( 'New Joiners', 'akaza-adventure' ),
		'text'   => array(
			__( 'Establishing security awareness early helps employees understand their role in protecting organisational information from the moment they join. ', 'akaza-adventure' ),
		),
	),
	array(
		'number' => '02',
		'title'  => __( 'Employees Across the Organisation', 'akaza-adventure' ),
		'text'   => array(
			__( 'Give every employee a strong foundation in cybersecurity awareness. ', 'akaza-adventure' ),
		),
	),
	array(
		'number' => '03',
		'title'  => __( 'Managers & People Leaders', 'akaza-adventure' ),
		'text'   => array(
			__( 'Regular awareness and reinforcement can help leaders recognise risks, encourage secure practices within their teams and lead by example. ', 'akaza-adventure' ),
		),
	),
	array(
		'number' => '04',
		'title'  => __( 'High-Risk & Targeted Groups', 'akaza-adventure' ),
		'text'   => array(
			__( ' Different employee groups may face different levels and types of cyber risk. Use insights from learning and simulation activities to identify where additional awareness or reinforcement may be needed and deliver more focused interventions. ', 'akaza-adventure' ),
		),
	),
	array(
		'number' => '05',
		'title'  => __( 'Remote & Hybrid Workforces', 'akaza-adventure' ),
		'text'   => array(
			__( 'Keep security awareness consistent wherever employees work. Continuous digital learning and reinforcement can help employees remain aware of cybersecurity risks while working across offices, homes and distributed environments. ', 'akaza-adventure' ),
		),
	),
);
?>

<section
	class="sl-sa-annual-training"
	id="why-annual-training-isnt-enough"
	aria-labelledby="sl-sa-annual-training-title"
>

	<div class="container">

		<div class="sl-sa-annual-training__heading">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'One Security Culture. Across the Organisation.', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-sa-annual-training-title">
				<?php esc_html_e( 'Security Awareness Training Program Built for ', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( "Every Employee", 'akaza-adventure' ); ?></span>
			</h2>
			<h3 id="sl-sa-annual-training-subtitle">
				<?php esc_html_e( "Cybersecurity is everyone's responsibility, but not every employee faces the same risks.", 'akaza-adventure' ); ?>
			</h3>
			
			<p>
				<?php esc_html_e(
					'The SucceedLEARN Security Behaviour & Culture Suite enables organisations to build awareness across the workforce through continuous learning, practical simulations and regular reinforcement. From a new employee, learning the fundamentals to teams facing more frequent or complex cyber threats, security awareness can become part of how employees think and act every day. ',
					'akaza-adventure'
				); ?>
			</p>

		</div>

		<div class="sl-sa-annual-training__grid">

			<?php foreach ( $annual_training_items as $item ) : ?>

				<article class="sl-sa-annual-training__card">

					<div class="sl-sa-annual-training__title-row">
						<span class="sl-sa-annual-training__number">
							<?php echo esc_html( $item['number'] ); ?>
						</span>
						<h3><?php echo esc_html( $item['title'] ); ?></h3>
					</div>

					<?php foreach ( $item['text'] as $paragraph ) : ?>
						<p><?php echo esc_html( $paragraph ); ?></p>
					<?php endforeach; ?>

				</article>

			<?php endforeach; ?>

		</div>

	</div>

</section>
