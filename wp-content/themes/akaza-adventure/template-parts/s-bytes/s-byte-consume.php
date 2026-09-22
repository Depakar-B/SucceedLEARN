<?php
/**
 * S-Bytes — Designed Around How Users Actually Consume Content.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$sbytes_consume_features = array(
	array(
		'title' => __( 'Bite-Sized Learning', 'akaza-adventure' ),
		'body'  => __(
			'Each FunFoSec video focuses on a specific cybersecurity concept and is designed to be consumed within a few minutes.',
			'akaza-adventure'
		),
	),
	array(
		'title' => __( 'Relatable Storytelling', 'akaza-adventure' ),
		'body'  => __(
			'Security concepts are brought to life through workplace situations and everyday digital experiences rather than presented only through definitions and policies.',
			'akaza-adventure'
		),
	),
	array(
		'title' => __( 'Humour-Driven Engagement', 'akaza-adventure' ),
		'body'  => __(
			'Cybersecurity is serious. Learning about it doesn\'t always have to feel serious. FunFoSec uses humour to make security topics approachable and memorable while keeping the underlying awareness message clear.',
			'akaza-adventure'
		),
	),
	array(
		'title' => __( 'Simple, Practical Language', 'akaza-adventure' ),
		'body'  => __(
			'Complex cybersecurity concepts are translated into straightforward messages employees can understand regardless of their level of technical expertise.',
			'akaza-adventure'
		),
	),
	array(
		'title' => __( 'Easy Access', 'akaza-adventure' ),
		'body'  => __(
			'Microlearning can be delivered directly to employees in their inbox, helping reduce unnecessary barriers between the learner and the awareness experience.',
			'akaza-adventure'
		),
	),
	array(
		'title' => __( 'Regular Reinforcement', 'akaza-adventure' ),
		'body'  => __(
			'Organisations can create recurring awareness touchpoints that help employees revisit security concepts throughout the year rather than relying exclusively on annual training.',
			'akaza-adventure'
		),
	),
);
?>

<section
	id="designed-for-users"
	class="sl-sbytes-consume"
	aria-labelledby="sl-sbytes-consume-title"
>
	<div class="container">

		<div class="sl-sbytes-consume__intro">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'How Users Consume Content', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-sbytes-consume-title">
				<?php esc_html_e( 'Designed Around How Users Actually', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'Consume Content', 'akaza-adventure' ); ?></span>
			</h2>

			<p>
				<?php esc_html_e( 'Employees already have busy working days.', 'akaza-adventure' ); ?>
			</p>

			<p>
				<?php
				esc_html_e(
					'Continuous awareness only works when learning is easy to access, quick to complete and relevant enough to hold attention.',
					'akaza-adventure'
				);
				?>
			</p>

			<p>
				<?php esc_html_e( 'S-Bytes is designed around those realities.', 'akaza-adventure' ); ?>
			</p>

		</div>

		<div class="sl-sbytes-consume__grid">
			<?php foreach ( $sbytes_consume_features as $feature ) : ?>
				<article class="sl-sbytes-consume__card">
					<h3 class="sl-panel-title">
						<?php echo esc_html( $feature['title'] ); ?>
					</h3>
					<p>
						<?php echo esc_html( $feature['body'] ); ?>
					</p>
				</article>
			<?php endforeach; ?>
		</div>

	</div>
</section>
