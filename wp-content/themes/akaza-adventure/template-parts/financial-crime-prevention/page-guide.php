<?php
/**
 * Financial Crime Prevention — Page guide section.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$guide_items = array(
	array(
		'href'  => '#what-is-financial-crime',
		'label' => __( 'What is Financial Crime Prevention?', 'akaza-adventure' ),
	),
	array(
		'href'  => '#why-it-matters',
		'label' => __( 'Why it matters now', 'akaza-adventure' ),
	),
	array(
		'href'  => '#online-employee-training',
		'label' => __( 'Online employee training', 'akaza-adventure' ),
	),
	array(
		'href'  => '#six-core-course-areas',
		'label' => __( 'Six core course areas', 'akaza-adventure' ),
	),
	array(
		'href'  => '#training-at-a-glance',
		'label' => __( 'Training at a glance', 'akaza-adventure' ),
	),
	array(
		'href'  => '#training-by-role',
		'label' => __( 'Training by role', 'akaza-adventure' ),
	),
	array(
		'href'  => '#cpd-certification',
		'label' => __( 'CPD certification', 'akaza-adventure' ),
	),
	array(
		'href'  => '#frequently-asked-questions',
		'label' => __( 'Frequently asked questions', 'akaza-adventure' ),
	),
);
?>
<section class="sl-fcp-page-guide" aria-labelledby="sl-fcp-page-guide-title">
	<div class="container">
		<div class="sl-fcp-page-guide__box">

			<div class="sl-fcp-page-guide__header">
				<div class="sl-fcp-page-guide__title-wrap">
					<h2 id="sl-fcp-page-guide-title">
						<?php esc_html_e( 'Page guide', 'akaza-adventure' ); ?>
					</h2>
				</div>

				<p class="sl-fcp-page-guide__intro">
					<?php esc_html_e( 'Jump directly to the information you need.', 'akaza-adventure' ); ?>
				</p>
			</div>

			<nav class="sl-fcp-page-guide__nav" aria-label="<?php esc_attr_e( 'Page guide', 'akaza-adventure' ); ?>">
				<div class="sl-fcp-page-guide__grid">
					<?php foreach ( $guide_items as $index => $item ) : ?>
						<a href="<?php echo esc_url( $item['href'] ); ?>" class="sl-fcp-page-guide__item">
							<span class="sl-fcp-page-guide__item-number">
								<?php echo esc_html( sprintf( '%02d', $index + 1 ) ); ?>
							</span>
							<span class="sl-fcp-page-guide__item-title">
								<?php echo esc_html( $item['label'] ); ?>
							</span>
						</a>
					<?php endforeach; ?>
				</div>
			</nav>

		</div>
	</div>
</section>
