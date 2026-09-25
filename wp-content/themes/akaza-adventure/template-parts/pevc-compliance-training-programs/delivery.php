<?php
/**
 * PE/VC Homepage — Delivery options.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$options = array(
	array(
		'title' => __( 'Hosted on SucceedLEARN', 'akaza-adventure' ),
		'text'  => __(
			'Assign learning, manage users, configure deadlines and monitor progress through the hosted platform.',
			'akaza-adventure'
		),
	),
	array(
		'title' => __( 'SCORM for your LMS', 'akaza-adventure' ),
		'text'  => __(
			'Deploy suitable learning through your compatible existing Learning Management System.',
			'akaza-adventure'
		),
	),
	array(
		'title' => __( 'Customisation on demand', 'akaza-adventure' ),
		'text'  => __(
			'Adapt terminology, policies, reporting routes and relevant scenarios.',
			'akaza-adventure'
		),
	),
);
?>
<section
	id="delivery"
	class="sl-pevc-delivery"
	aria-labelledby="sl-pevc-delivery-title"
>
	<div class="container">
		<span class="sl-home-sub-heading">
			<?php esc_html_e( 'Flexible delivery', 'akaza-adventure' ); ?>
		</span>

		<h2 id="sl-pevc-delivery-title">
			<?php esc_html_e( 'Delivered your way', 'akaza-adventure' ); ?>
		</h2>

		<p class="sl-pevc-delivery__lead">
			<?php esc_html_e( 'Choose the approach that works for your firm.', 'akaza-adventure' ); ?>
		</p>

		<div class="sl-pevc-delivery__grid">
			<?php foreach ( $options as $option ) : ?>
				<article class="sl-pevc-delivery__card">
					<h3><?php echo esc_html( $option['title'] ); ?></h3>
					<p><?php echo esc_html( $option['text'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
