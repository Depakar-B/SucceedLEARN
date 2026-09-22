<?php
/**
 * S-Signs — Flexible Distribution Across Your Organisation.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$distribution = array(
	__( 'Displayed across office notice boards', 'akaza-adventure' ),
	__( 'Used on digital display screens', 'akaza-adventure' ),
	__( 'Shared through organisation-wide email campaigns', 'akaza-adventure' ),
	__( 'Distributed via Microsoft Teams or other collaboration platforms', 'akaza-adventure' ),
	__( 'Added to internal newsletters', 'akaza-adventure' ),
	__( 'Used during awareness events and security campaigns', 'akaza-adventure' ),
	__( 'Displayed in common workspaces, reception areas, cafeterias, and meeting rooms', 'akaza-adventure' ),
);
?>

<section
	class="sl-s-signs-distribution"
	aria-labelledby="sl-s-signs-distribution-title"
>
	<div class="container">

		<div class="sl-s-signs-distribution__intro">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Everywhere Employees Work', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-s-signs-distribution-title">
				<?php esc_html_e( 'Flexible Distribution Across', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'Your Organisation', 'akaza-adventure' ); ?></span>
			</h2>

			<p>
				<?php
				esc_html_e(
					'S-Signs is designed to support organisations regardless of where employees work.',
					'akaza-adventure'
				);
				?>
			</p>

			<p>
				<?php esc_html_e( 'Awareness posters can be:', 'akaza-adventure' ); ?>
			</p>

		</div>

		<ul class="sl-list sl-s-signs-distribution__list">
			<?php foreach ( $distribution as $index => $item ) : ?>
				<li class="sl-list-item">
					<span class="sl-list-item__label" aria-hidden="true">
						<?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?>
					</span>
					<span class="sl-list-item__text">
						<?php echo esc_html( $item ); ?>
					</span>
				</li>
			<?php endforeach; ?>
		</ul>

		<p class="sl-s-signs-distribution__closing">
			<?php
			esc_html_e(
				'This flexibility enables organisations to continuously reinforce awareness across office-based, hybrid, and remote work environments.',
				'akaza-adventure'
			);
			?>
		</p>

	</div>
</section>
