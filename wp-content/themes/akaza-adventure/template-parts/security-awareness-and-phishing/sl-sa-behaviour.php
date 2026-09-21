<?php
/**
 * Security Awareness — From Awareness to Behaviour Change.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$behaviour_steps = array(
	array(
		'number' => '01',
		'title'  => __( 'Learn', 'akaza-adventure' ),
		'text'   => __( 'through structured security awareness training with S-Aware.', 'akaza-adventure' ),
		'slug'   => 'learn',
		'angle'  => 30,
	),
	array(
		'number' => '02',
		'title'  => __( 'Reinforce', 'akaza-adventure' ),
		'text'   => __( 'key concepts throughout the year with S-Bytes and S-Sign.', 'akaza-adventure' ),
		'slug'   => 'reinforce',
		'angle'  => 92,
	),
	array(
		'number' => '03',
		'title'  => __( 'Practise', 'akaza-adventure' ),
		'text'   => __( 'responses to realistic cyber threats through S-Phish and S-Play.', 'akaza-adventure' ),
		'slug'   => 'practise',
		'angle'  => 144,
	),
	array(
		'number' => '04',
		'title'  => __( 'Measure', 'akaza-adventure' ),
		'text'   => __( 'engagement, performance and behavioural indicators through S-Metrics.', 'akaza-adventure' ),
		'slug'   => 'measure',
		'angle'  => 246,
	),
	array(
		'number' => '05',
		'title'  => __( 'Connect', 'akaza-adventure' ),
		'text'   => __( 'the programme with your broader learning and technology environment through S-Sync.', 'akaza-adventure' ),
		'slug'   => 'connect',
		'angle'  => 298,
	),
);
?>

<section
	class="sl-sa-behaviour"
	id="from-awareness-to-behaviour-change"
	aria-labelledby="sl-sa-behaviour-title"
>

	<div class="container">

		<header class="sl-sa-behaviour__header">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Continuous security behaviour change', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-sa-behaviour-title">
				<?php esc_html_e( 'Continuous Behaviour Change.', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'Simplify administration.', 'akaza-adventure' ); ?></span>
				<?php esc_html_e( 'Scale your awareness programme.', 'akaza-adventure' ); ?>
			</h2>

			<p>
				<?php
				esc_html_e(
					'A strong security culture is not created through a single intervention. It develops through repeated experiences that help employees learn, practise, recognise, respond and improve. Instead of managing disconnected awareness activities, organisations can build a coordinated programme in which each intervention supports the next.',
					'akaza-adventure'
				);
				?>
			</p>

			<p>
				<?php
				esc_html_e(
					'The SucceedLEARN Security Behaviour & Culture Suite brings these experiences together into one continuous cycle.',
					'akaza-adventure'
				);
				?>
			</p>

		</header>

		<div class="sl-sa-behaviour__cycle">

			<div class="sl-sa-behaviour__ring" aria-hidden="true"></div>

			<div class="sl-sa-behaviour__centre">
				<p class="sl-sa-behaviour__centre-line">
					<?php esc_html_e( 'Continuous', 'akaza-adventure' ); ?>
				</p>
				<p class="sl-sa-behaviour__centre-line">
					<?php esc_html_e( 'Behaviour Change', 'akaza-adventure' ); ?>
				</p>
			</div>

			<?php foreach ( $behaviour_steps as $step ) : ?>

				<article
					class="sl-sa-behaviour__card sl-sa-behaviour__card--<?php echo esc_attr( $step['slug'] ); ?>"
					style="--sl-sa-orbit-angle: <?php echo esc_attr( (string) (int) $step['angle'] ); ?>deg;"
				>

					<span class="sl-sa-behaviour__number" aria-hidden="true">
						<?php echo esc_html( $step['number'] ); ?>
					</span>

					<div class="sl-sa-behaviour__card-body">

						<h3>
							<?php echo esc_html( $step['title'] ); ?>
						</h3>

						<p>
							<?php echo esc_html( $step['text'] ); ?>
						</p>

					</div>

				</article>

			<?php endforeach; ?>

		</div>

	</div>

</section>
