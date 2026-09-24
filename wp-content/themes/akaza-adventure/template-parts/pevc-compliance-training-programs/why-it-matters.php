<?php
/**
 * PE/VC Homepage — Why it matters.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$panel_items = array(
	__( 'recognise unusual or higher-risk situations', 'akaza-adventure' ),
	__( 'understand their individual responsibilities', 'akaza-adventure' ),
	__( 'follow internal approval processes', 'akaza-adventure' ),
	__( 'protect sensitive information', 'akaza-adventure' ),
	__( 'raise concerns through the right channels', 'akaza-adventure' ),
	__( 'make better-informed decisions', 'akaza-adventure' ),
);
?>
<section
	id="why-it-matters"
	class="sl-pevc-why"
	aria-labelledby="sl-pevc-why-title"
>
	<div class="container">
		<div class="sl-pevc-why__layout">

			<div class="sl-pevc-why__copy">
				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'Why it matters', 'akaza-adventure' ); ?>
				</span>

				<h2 id="sl-pevc-why-title">
					<?php esc_html_e( 'Compliance is everyone’s business.', 'akaza-adventure' ); ?>
				</h2>

				<p class="sl-pevc-why__lead">
					<?php
					esc_html_e(
						'PE and VC employees make decisions around information, investors, counterparties, suppliers, payments, hospitality, workplace conduct and governance every day.',
						'akaza-adventure'
					);
					?>
				</p>

				<p>
					<?php
					esc_html_e(
						'The strongest compliance programmes do more than explain policies. They help employees recognise when an ordinary business situation becomes a compliance decision.',
						'akaza-adventure'
					);
					?>
				</p>
			</div>

			<aside class="sl-pevc-why__panel">
				<h3><?php esc_html_e( 'Effective training helps people:', 'akaza-adventure' ); ?></h3>
				<ul>
					<?php foreach ( $panel_items as $item ) : ?>
						<li><?php echo esc_html( $item ); ?></li>
					<?php endforeach; ?>
				</ul>
			</aside>

		</div>
	</div>
</section>
