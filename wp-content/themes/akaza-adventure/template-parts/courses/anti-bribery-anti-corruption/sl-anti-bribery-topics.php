<?php
/**
 * Anti-Bribery and Anti-Corruption — Topics Covered section.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<section
	id="topics"
	class="sl-course-topics sl-anti-bribery-topics"
	aria-labelledby="sl-anti-bribery-topics-title"
>
	<div class="container">

		<div class="sl-anti-bribery-topics__intro">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Topics Covered', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-anti-bribery-topics-title">
				<?php esc_html_e( 'What bribery and corruption risks does ABAC', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'training cover?', 'akaza-adventure' ); ?></span>
			</h2>

			<p>
				<?php
				esc_html_e(
					'The course connects abstract rules to six familiar areas of work, helping employees identify warning signs before a decision becomes a breach.',
					'akaza-adventure'
				);
				?>
			</p>

		</div>

		<div class="sl-anti-bribery-topics__grid">

			<article class="sl-anti-bribery-topics__card">
				<div class="sl-anti-bribery-topics__number" aria-hidden="true">01</div>
				<div class="sl-anti-bribery-topics__card-content">
					<h3><?php esc_html_e( 'Gifts & hospitality', 'akaza-adventure' ); ?></h3>
					<p>
						<?php
						esc_html_e(
							'Value, timing, frequency, purpose, approvals and accurate records.',
							'akaza-adventure'
						);
						?>
					</p>
				</div>
			</article>

			<article class="sl-anti-bribery-topics__card">
				<div class="sl-anti-bribery-topics__number" aria-hidden="true">02</div>
				<div class="sl-anti-bribery-topics__card-content">
					<h3><?php esc_html_e( 'Third parties & agents', 'akaza-adventure' ); ?></h3>
					<p>
						<?php
						esc_html_e(
							'Indirect payments, unusual commissions and associated-person exposure.',
							'akaza-adventure'
						);
						?>
					</p>
				</div>
			</article>

			<article class="sl-anti-bribery-topics__card">
				<div class="sl-anti-bribery-topics__number" aria-hidden="true">03</div>
				<div class="sl-anti-bribery-topics__card-content">
					<h3><?php esc_html_e( 'Travel & entertainment', 'akaza-adventure' ); ?></h3>
					<p>
						<?php
						esc_html_e(
							'Reasonable business purpose, pre-approval, receipts and transparency.',
							'akaza-adventure'
						);
						?>
					</p>
				</div>
			</article>

			<article class="sl-anti-bribery-topics__card">
				<div class="sl-anti-bribery-topics__number" aria-hidden="true">04</div>
				<div class="sl-anti-bribery-topics__card-content">
					<h3><?php esc_html_e( 'Facilitation payments', 'akaza-adventure' ); ?></h3>
					<p>
						<?php
						esc_html_e(
							'Requests to speed up routine action and the correct response under policy and law.',
							'akaza-adventure'
						);
						?>
					</p>
				</div>
			</article>

			<article class="sl-anti-bribery-topics__card">
				<div class="sl-anti-bribery-topics__number" aria-hidden="true">05</div>
				<div class="sl-anti-bribery-topics__card-content">
					<h3><?php esc_html_e( 'Donations & sponsorships', 'akaza-adventure' ); ?></h3>
					<p>
						<?php
						esc_html_e(
							'Links to decision-makers, destination of funds and hidden commercial motives.',
							'akaza-adventure'
						);
						?>
					</p>
				</div>
			</article>

			<article class="sl-anti-bribery-topics__card">
				<div class="sl-anti-bribery-topics__number" aria-hidden="true">06</div>
				<div class="sl-anti-bribery-topics__card-content">
					<h3><?php esc_html_e( 'Nepotism & cronyism', 'akaza-adventure' ); ?></h3>
					<p>
						<?php
						esc_html_e(
							'Employment or favours offered to influence or reward a business decision.',
							'akaza-adventure'
						);
						?>
					</p>
				</div>
			</article>

		</div>

	</div>
</section>
