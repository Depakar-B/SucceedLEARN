<?php
/**
 * S-Play — Benefits for Organisations.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$benefits = array(
	__( 'Increase participation in cybersecurity awareness initiatives.', 'akaza-adventure' ),
	__( 'Reinforce secure decision-making through engaging learning experiences.', 'akaza-adventure' ),
	__( 'Improve knowledge retention with repeated exposure to key security concepts.', 'akaza-adventure' ),
	__( 'Reduce awareness fatigue associated with traditional training methods.', 'akaza-adventure' ),
	__( 'Support long-term behavioural change across the workforce.', 'akaza-adventure' ),
	__( 'Complement existing security awareness and compliance programmes.', 'akaza-adventure' ),
	__( 'Foster a stronger security culture through continuous employee engagement.', 'akaza-adventure' ),
);
?>

<section
	class="sl-s-play-benefits"
	aria-labelledby="sl-s-play-benefits-title"
>
	<div class="container">

		<div class="sl-s-play-benefits__intro">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Organisational Outcomes', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-s-play-benefits-title">
				<?php esc_html_e( 'Benefits for', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'Organisations', 'akaza-adventure' ); ?></span>
			</h2>

			<p>
				<?php
				esc_html_e(
					'Organisations implementing S-Play can strengthen employee engagement while reinforcing security awareness through continuous, interactive learning.',
					'akaza-adventure'
				);
				?>
			</p>

			<p>
				<?php esc_html_e( 'The platform helps organisations:', 'akaza-adventure' ); ?>
			</p>

		</div>

		<ul class="sl-list sl-s-play-benefits__list">

			<?php foreach ( $benefits as $index => $benefit ) : ?>

				<li class="sl-list-item">
					<span class="sl-list-item__label" aria-hidden="true">
						<?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?>
					</span>
					<span class="sl-list-item__text">
						<?php echo esc_html( $benefit ); ?>
					</span>
				</li>

			<?php endforeach; ?>

		</ul>

	</div>
</section>
