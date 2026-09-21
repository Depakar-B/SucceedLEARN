<?php
/**
 * FERPA — Trusted By Section.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/*
 * Replace these URLs with the final logo image URLs
 * from the WordPress Media Library.
 */
$sl_ferpa_logos = array(
	array(
		'name' => 'TCS',
		'url'  => 'https://succeedlearn.com/wp-content/uploads/2026/03/TCS-e1786337779729.webp',
	),
	array(
		'name' => 'Air India',
		'url'  => 'https://succeedlearn.com/wp-content/uploads/2026/03/AirIndia-e1786337713550.webp',
	),
	array(
		'name' => 'DHL',
		'url'  => 'https://succeedlearn.com/wp-content/uploads/2026/03/DHL-1-e1786337623808.webp',
	),
	array(
		'name' => 'Lupin',
		'url'  => 'https://succeedlearn.com/wp-content/uploads/2026/03/Lupin-1-e1786337911504.webp',
	),
	array(
		'name' => 'Razorpay',
		'url'  => 'https://succeedlearn.com/wp-content/uploads/2026/03/RazorPay-e1786337838191.webp',
	),
	array(
		'name' => 'Chargebee',
		'url'  => 'https://succeedlearn.com/wp-content/uploads/2026/03/Chargebee-e1786337666745.webp',
	),
	array(
		'name' => 'Lenovo',
		'url'  => 'https://succeedlearn.com/wp-content/uploads/2026/03/Lenova-1-e1786337921600.webp',
	),
	array(
		'name' => 'The Economist',
		'url'  => 'https://succeedlearn.com/wp-content/uploads/2026/03/The-Economist-e1786337770267.webp',
	),
);
?>

<section class="sl-ferpa-trusted" aria-labelledby="sl-ferpa-trusted-title">
	<div class="container">

		<div class="sl-ferpa-trusted__heading">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Compliance Training Trusted By Teams At', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-ferpa-trusted-title">
				<?php esc_html_e( 'Trusted by teams that take', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'compliance seriously.', 'akaza-adventure' ); ?></span>
			</h2>
		</div>

		<div class="sl-ferpa-trusted__logos">

			<?php foreach ( $sl_ferpa_logos as $logo ) : ?>

				<div class="sl-ferpa-trusted__logo">
					<img
						src="<?php echo esc_url( $logo['url'] ); ?>"
						alt="<?php echo esc_attr( $logo['name'] ); ?>"
						loading="lazy"
						decoding="async"
					>
				</div>

			<?php endforeach; ?>

		</div>

	</div>
</section>