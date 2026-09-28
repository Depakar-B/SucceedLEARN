<?php
/**
 * PE/VC Homepage — Programme approach.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$steps = array(
	array(
		'num'   => '1',
		'title' => __( 'Identify learner groups', 'akaza-adventure' ),
		'text'  => __( 'Map teams, responsibilities and decision-making roles.', 'akaza-adventure' ),
	),
	array(
		'num'   => '2',
		'title' => __( 'Map relevant risks', 'akaza-adventure' ),
		'text'  => __( 'Identify which compliance topics matter to each group.', 'akaza-adventure' ),
	),
	array(
		'num'   => '3',
		'title' => __( 'Assign relevant learning', 'akaza-adventure' ),
		'text'  => __( 'Combine broad awareness with specialist learning.', 'akaza-adventure' ),
	),
	array(
		'num'   => '4',
		'title' => __( 'Track and refresh', 'akaza-adventure' ),
		'text'  => __( 'Monitor learning and refresh as responsibilities or risks change.', 'akaza-adventure' ),
	),
);
?>
<section
	id="programme"
	class="sl-pevc-programme"
	aria-labelledby="sl-pevc-programme-title"
>
	<div class="container">
		<span class="sl-home-sub-heading">
			<?php esc_html_e( 'A role-based approach', 'akaza-adventure' ); ?>
		</span>

		<h2 id="sl-pevc-programme-title">
			<?php esc_html_e( 'Building an Effective PE and VC Compliance Training Programme', 'akaza-adventure' ); ?>
		</h2>

		<p class="sl-pevc-programme__lead">
			<?php
			esc_html_e(
				'Start with responsibilities and risk, then map the learning that each learner group needs.',
				'akaza-adventure'
			);
			?>
		</p>

		<div class="sl-pevc-programme__grid">
			<?php foreach ( $steps as $step ) : ?>
				<article class="sl-pevc-programme__card">
					<span aria-hidden="true"><?php echo esc_html( $step['num'] ); ?></span>
					<h3><?php echo esc_html( $step['title'] ); ?></h3>
					<p><?php echo esc_html( $step['text'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
