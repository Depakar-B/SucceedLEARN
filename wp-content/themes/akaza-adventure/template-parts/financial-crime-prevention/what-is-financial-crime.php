<?php
/**
 * Financial Crime Prevention — What is Financial Crime Prevention Training section.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section
	id="what-is-fcp"
	class="sl-fcp-section sl-fcp-section--grey sl-fcp-definition"
	aria-labelledby="sl-fcp-definition-title"
>
	<div class="container sl-fcp-definition__layout">
		<div class="sl-fcp-definition__content">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'FCP Definition', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-fcp-definition-title">
				<?php esc_html_e( 'What Is Financial Crime Prevention Training?', 'akaza-adventure' ); ?>
			</h2>

			<div class="sl-fcp-definition__answer">
				<strong><?php esc_html_e( 'Financial Crime Prevention Training explained', 'akaza-adventure' ); ?></strong>
				<p>
					<?php esc_html_e( 'Financial Crime Prevention Training helps employees recognise financial crime and compliance risks, understand relevant organisational controls and know when concerns should be prevented, escalated or reported.', 'akaza-adventure' ); ?>
				</p>
			</div>

			<p class="sl-fcp-lead">
				<?php esc_html_e( 'Financial crime and compliance risks can arise through money laundering, bribery, corruption, sanctions, tax evasion, fraud, misuse of confidential information and other forms of misconduct.', 'akaza-adventure' ); ?>
			</p>

			<p>
				<?php esc_html_e( 'Effective training connects these risks with situations employees may encounter in their roles, helping them understand warning signs and make informed decisions.', 'akaza-adventure' ); ?>
			</p>
		</div>

		<div class="sl-fcp-definition__media">
			<img
				class="sl-fcp-definition__image"
				src="<?php echo esc_url( 'https://succeedlearn.com/wp-content/uploads/2026/10/global_financial_crime_monitoring.webp' ); ?>"
				alt="<?php esc_attr_e( 'Global financial crime monitoring dashboard on a laptop beside compliance reports and a magnifying glass', 'akaza-adventure' ); ?>"
				width="1536"
				height="1024"
				loading="lazy"
				decoding="async"
			>
		</div>
	</div>
</section>
