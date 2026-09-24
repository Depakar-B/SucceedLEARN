<?php
/**
 * PE/VC Homepage — Audience / roles.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$roles = array(
	array(
		'num'   => '01',
		'title' => __( 'Senior Managers & Partners', 'akaza-adventure' ),
	),
	array(
		'num'   => '02',
		'title' => __( 'Investment & Deal Teams', 'akaza-adventure' ),
	),
	array(
		'num'   => '03',
		'title' => __( 'Compliance, Legal & MLRO Teams', 'akaza-adventure' ),
	),
	array(
		'num'   => '04',
		'title' => __( 'Finance, Operations & Fund Administration', 'akaza-adventure' ),
	),
	array(
		'num'   => '05',
		'title' => __( 'Investor Relations & Fundraising', 'akaza-adventure' ),
	),
	array(
		'num'   => '06',
		'title' => __( 'HR, Learning & Wider Employees', 'akaza-adventure' ),
	),
);
?>
<section
	class="sl-pevc-audience"
	aria-labelledby="sl-pevc-audience-title"
>
	<div class="container">
		<span class="sl-home-sub-heading">
			<?php esc_html_e( 'Designed for every role', 'akaza-adventure' ); ?>
		</span>

		<h2 id="sl-pevc-audience-title">
			<?php esc_html_e( 'Relevant learning across your firm', 'akaza-adventure' ); ?>
		</h2>

		<p class="sl-pevc-audience__lead">
			<?php
			esc_html_e(
				'Different employees face different risks. Course assignment should reflect the responsibilities attached to each role.',
				'akaza-adventure'
			);
			?>
		</p>

		<div class="sl-pevc-audience__grid">
			<?php foreach ( $roles as $role ) : ?>
				<div class="sl-pevc-audience__item">
					<div class="sl-pevc-audience__icon" aria-hidden="true">
						<?php echo esc_html( $role['num'] ); ?>
					</div>
					<strong><?php echo esc_html( $role['title'] ); ?></strong>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
