<?php
/**
 * BFSI & PE/VC — Who Should Take This Training?
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$audiences = array(
	__( 'Finance and investment professionals handling transactions, investor information and financial data.', 'akaza-adventure' ),
	__( 'Senior leaders and executive assistants who may be targeted by impersonation, whaling and deepfake attacks.', 'akaza-adventure' ),
	__( 'Customer and client-facing employees receiving external communications and handling sensitive information.', 'akaza-adventure' ),
	__( 'HR, Legal, Risk and Compliance teams working with personal, confidential or regulated information.', 'akaza-adventure' ),
	__( 'IT and Information Security teams responsible for systems, access and security controls.', 'akaza-adventure' ),
	__( 'Employees working with vendors and service providers who may introduce third-party risks.', 'akaza-adventure' ),
	__( 'Remote and hybrid employees accessing organisational information outside controlled office environments.', 'akaza-adventure' ),
	__( 'All employees and contractors who access organisational systems, data or physical premises.', 'akaza-adventure' ),
);
?>

<section
	class="sl-bfsi-audience"
	aria-labelledby="sl-bfsi-audience-title"
>
	<div class="container">

		<div class="sl-bfsi-audience__intro">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Target Audience', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-bfsi-audience-title">
				<?php esc_html_e( 'Who Should Take', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'This Training?', 'akaza-adventure' ); ?></span>
			</h2>

			<p>
				<?php
				esc_html_e(
					'The course is designed for employees whose roles expose them to organisational systems, financial information, sensitive data, external communications or high-value decisions.',
					'akaza-adventure'
				);
				?>
			</p>

			<p class="sl-bfsi-audience__lead">
				<?php esc_html_e( 'It is particularly relevant for:', 'akaza-adventure' ); ?>
			</p>

		</div>

		<ul class="sl-bfsi-audience__list">
			<?php foreach ( $audiences as $audience ) : ?>
				<li><?php echo esc_html( $audience ); ?></li>
			<?php endforeach; ?>
		</ul>

	</div>
</section>
