<?php
/**
 * Preventing the Facilitation of Tax Evasion Training — Audience.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$audience_groups = array(
	array(
		'title'       => __( 'Senior Management', 'akaza-adventure' ),
		'description' => __( 'Leaders responsible for organisational tone, oversight, prevention frameworks and policy.', 'akaza-adventure' ),
	),
	array(
		'title'       => __( 'Employees & Managers', 'akaza-adventure' ),
		'description' => __( 'People who interact with clients, third parties or participate in business decisions.', 'akaza-adventure' ),
	),
	array(
		'title'       => __( 'Finance & Accounts', 'akaza-adventure' ),
		'description' => __( 'Professionals involved in financial transactions, payments, reporting and financial administration.', 'akaza-adventure' ),
	),
	array(
		'title'       => __( 'Procurement & Vendor Teams', 'akaza-adventure' ),
		'description' => __( 'People managing suppliers, contractors, procurement processes and vendor relationships.', 'akaza-adventure' ),
	),
	array(
		'title'       => __( 'Compliance & Risk', 'akaza-adventure' ),
		'description' => __( 'Professionals supporting regulatory compliance, risk frameworks, controls and monitoring.', 'akaza-adventure' ),
	),
	array(
		'title'       => __( 'Legal & Audit', 'akaza-adventure' ),
		'description' => __( 'Professionals supporting governance, legal oversight, investigations or assurance activities.', 'akaza-adventure' ),
	),
	array(
		'title'       => __( 'Third-Party & Intermediary-Facing Roles', 'akaza-adventure' ),
		'description' => __( 'Employees working with agents, suppliers, contractors, advisers or intermediaries.', 'akaza-adventure' ),
	),
	array(
		'title'       => __( 'Financial Transaction Roles', 'akaza-adventure' ),
		'description' => __( 'Individuals involved in payments, transactions, procurement, customer activity or vendor management.', 'akaza-adventure' ),
	),
	array(
		'title'       => __( 'Other Risk-Exposed Roles', 'akaza-adventure' ),
		'description' => __( 'Anyone whose responsibilities could expose the organisation or individual to tax compliance or facilitation risk.', 'akaza-adventure' ),
	),
);
?>

<section
	id="training-audience"
	class="sl-tax-evasion-audience"
	aria-labelledby="sl-tax-evasion-audience-title"
>
	<div class="container">

		<div class="sl-tax-evasion-audience__intro">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Preventing Facilitation of Tax Evasion Training Audience', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-tax-evasion-audience-title">
				<?php esc_html_e( 'Who Should Take Preventing Facilitation of Tax Evasion', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'Training?', 'akaza-adventure' ); ?></span>
			</h2>

			<p>
				<?php esc_html_e( 'The course is relevant to people whose responsibilities involve leadership, financial activity, business decisions, third-party relationships or tax compliance risks.', 'akaza-adventure' ); ?>
			</p>

		</div>

		<div class="sl-tax-evasion-audience__grid">

			<?php foreach ( $audience_groups as $group ) : ?>

				<article class="sl-tax-evasion-audience__card">

					<h3 class="sl-panel-title">
						<?php echo esc_html( $group['title'] ); ?>
					</h3>

					<p>
						<?php echo esc_html( $group['description'] ); ?>
					</p>

				</article>

			<?php endforeach; ?>

		</div>

	</div>
</section>