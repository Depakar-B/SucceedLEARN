<?php
/**
 * Financial Crime Prevention — What is Financial Crime Prevention section.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$demo_url = '#contact';
?>

<section
	id="what-is-financial-crime"
	class="sl-fcp-definition sl-fcp-after-guide"
	aria-labelledby="sl-fcp-definition-title"
>
	<div class="container">

		<div class="sl-fcp-definition__heading">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Clear definition', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-fcp-definition-title">
				<?php esc_html_e( 'What Is Financial Crime Prevention?', 'akaza-adventure' ); ?>
			</h2>

		</div>

		<div class="sl-fcp-definition__callout">

			<h3>
				<?php esc_html_e( 'Financial Crime Prevention explained', 'akaza-adventure' ); ?>
			</h3>

			<p>
				<?php esc_html_e(
					'Financial Crime Prevention is the coordinated use of policies, controls, monitoring, due diligence and employee awareness to help an organisation identify, prevent, escalate and report financial crime risks.',
					'akaza-adventure'
				); ?>
			</p>

		</div>

		<div class="sl-fcp-definition__content">

			<p class="sl-fcp-definition__lead">
				<?php esc_html_e(
					'Financial crime can include money laundering, terrorist financing, bribery, corruption, sanctions breaches, tax evasion, fraud, insider trading and market abuse.',
					'akaza-adventure'
				); ?>
			</p>

			<p>
				<?php esc_html_e(
					'Prevention does not depend on one department or one technology system. Employees across customer-facing, operational, financial, managerial and third-party-facing roles may encounter information or behaviour that requires closer attention.',
					'akaza-adventure'
				); ?>
			</p>

			<p>
				<?php esc_html_e(
					'Effective Financial Crime Prevention combines organisational controls with employees who understand warning signs, follow relevant procedures and know when a concern should be escalated.',
					'akaza-adventure'
				); ?>
			</p>

		</div>

		<div class="sl-fcp-actions">
			<a href="<?php echo esc_url( $demo_url ); ?>" class="sl-content-btn sl-content-btn-primary">
				<?php esc_html_e( 'Request a demo', 'akaza-adventure' ); ?>
			</a>
		</div>

	</div>
</section>
