<?php
/**
 * PE/VC Homepage — Full-width illustration after decision journey.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$image_url = 'https://succeedlearn.com/wp-content/uploads/2026/09/PEVC-Image.webp';
?>

<section
	class="sl-pevc-image"
	aria-label="<?php esc_attr_e( 'Private Equity and Venture Capital compliance illustration', 'akaza-adventure' ); ?>"
>
	<div class="container">
		<figure class="sl-pevc-image__figure">
			<img
				src="<?php echo esc_url( $image_url ); ?>"
				alt="<?php esc_attr_e( 'Global PE and VC compliance and financial transactions illustration', 'akaza-adventure' ); ?>"
				loading="lazy"
				decoding="async"
			>
		</figure>
	</div>
</section>
