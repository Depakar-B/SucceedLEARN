<?php
/**
 * PCI DSS — Topics Covered.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$topics = array(
	array(
		'title' => __( 'PCI Council and PCI DSS Goals', 'akaza-adventure' ),
		'items' => array(
			__( 'Why should you know or follow the PCI DSS Guidelines?', 'akaza-adventure' ),
		),
	),
	array(
		'title' => __( 'Customer Payments Handler', 'akaza-adventure' ),
		'items' => array(
			__( 'Card-Present', 'akaza-adventure' ),
			__( 'Card-Not-Present', 'akaza-adventure' ),
		),
	),
	array(
		'title' => __( 'PCI DSS Requirements', 'akaza-adventure' ),
		'items' => array(),
	),
	array(
		'title' => __( 'Social Engineering', 'akaza-adventure' ),
		'items' => array(
			__( 'Phishing', 'akaza-adventure' ),
			__( 'Pretexting', 'akaza-adventure' ),
			__( 'Baiting', 'akaza-adventure' ),
			__( 'Tailgating', 'akaza-adventure' ),
		),
	),
	array(
		'title' => __( 'Code – 10 Calls', 'akaza-adventure' ),
		'items' => array(),
	),
	array(
		'title' => __( "Do's and Don'ts", 'akaza-adventure' ),
		'items' => array(),
	),
);
?>

<section
	class="sl-pci-topics"
	aria-labelledby="sl-pci-topics-title"
>
	<div class="container">

		<div class="sl-pci-topics__intro">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Curriculum Overview', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-pci-topics-title">
				<?php esc_html_e( 'PCI DSS Topics', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'Covered', 'akaza-adventure' ); ?></span>
			</h2>

		</div>

		<div class="sl-pci-topics__grid">

			<?php foreach ( $topics as $index => $topic ) : ?>

				<article class="sl-pci-topics__card">
					<span class="sl-pci-topics__number" aria-hidden="true">
						<?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?>
					</span>
					<h3 class="sl-panel-title">
						<?php echo esc_html( $topic['title'] ); ?>
					</h3>
					<?php if ( ! empty( $topic['items'] ) ) : ?>
						<ul class="sl-pci-topics__list">
							<?php foreach ( $topic['items'] as $item ) : ?>
								<li><?php echo esc_html( $item ); ?></li>
							<?php endforeach; ?>
						</ul>
					<?php endif; ?>
				</article>

			<?php endforeach; ?>

		</div>

	</div>
</section>
