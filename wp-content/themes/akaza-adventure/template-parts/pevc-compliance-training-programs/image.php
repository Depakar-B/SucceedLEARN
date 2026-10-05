<?php
/**
 * PE/VC Homepage — Full-width illustration after decision journey.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$image_url = 'https://succeedlearn.com/wp-content/uploads/2026/10/corporate_workflow_and_compliance_strategy.webp';
?>

<section
	class="sl-pevc-image"
	aria-label="<?php esc_attr_e( 'Private Equity and Venture Capital compliance illustration', 'akaza-adventure' ); ?>"
>
	<div class="container">
		<figure class="sl-pevc-image__figure">
			<img
				src="<?php echo esc_url( $image_url ); ?>"
				alt="<?php esc_attr_e( 'PE and VC professional reviewing a step-by-step compliance process', 'akaza-adventure' ); ?>"
				loading="lazy"
				decoding="async"
			>
		</figure>
	</div>
</section>
