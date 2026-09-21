<?php
/**
 * GDPR Employee Awareness — Sales & Marketing Module.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<section
	class="sl-gdpr-sales-marketing"
	aria-labelledby="sl-gdpr-sales-marketing-title"
>
	<div class="container">

		<div class="sl-gdpr-sales-marketing__grid">

			<!-- Left: Content -->
			<div class="sl-gdpr-sales-marketing__content">

				<div class="sl-gdpr-sales-marketing__heading">

					<span class="sl-home-sub-heading">
						<?php esc_html_e( 'The Module Most Awareness Courses Skip', 'akaza-adventure' ); ?>
					</span>

					<h2 id="sl-gdpr-sales-marketing-title">
						<?php esc_html_e( 'It Even Teaches the Rule That', 'akaza-adventure' ); ?>
						<span><?php esc_html_e( 'Changes at Every EU Border.', 'akaza-adventure' ); ?></span>
					</h2>

					<p>
						<?php esc_html_e( 'Send the same email to Dublin and to Berlin and only one of them is fine by default. This course tells your revenue team what they may actually send, to whom, in which country.', 'akaza-adventure' ); ?>
					</p>

				</div>


				<ul class="sl-list sl-gdpr-sales-marketing__list">

					<li class="sl-list-item">
						<span class="sl-list-item__label">
							<?php esc_html_e( 'Consent vs legitimate interests', 'akaza-adventure' ); ?>
						</span>
						<span class="sl-list-item__text">
							<?php esc_html_e( 'in sales and marketing.', 'akaza-adventure' ); ?>
						</span>
					</li>

					<li class="sl-list-item">
						<span class="sl-list-item__label">
							<?php esc_html_e( 'Opt-out vs opt-in countries', 'akaza-adventure' ); ?>
						</span>
						<span class="sl-list-item__text">
							<?php esc_html_e( 'where cold email needs an objection route versus documented consent first.', 'akaza-adventure' ); ?>
						</span>
					</li>

					<li class="sl-list-item">
						<span class="sl-list-item__label">
							<?php esc_html_e( 'Existing customer exemptions', 'akaza-adventure' ); ?>
						</span>
						<span class="sl-list-item__text">
							<?php esc_html_e( 'in some opt-in countries.', 'akaza-adventure' ); ?>
						</span>
					</li>

					<li class="sl-list-item">
						<span class="sl-list-item__label">
							<?php esc_html_e( 'Opt-out as withdrawal', 'akaza-adventure' ); ?>
						</span>
						<span class="sl-list-item__text">
							<?php esc_html_e( 'plus the documented phone-then-email consent route.', 'akaza-adventure' ); ?>
						</span>
					</li>

				</ul>


				<div class="sl-gdpr-sales-marketing__actions">

					<a
						class="sl-content-btn sl-content-btn-primary"
						href="#contact"
					>
						<?php esc_html_e( 'Preview the Sales & Marketing Module', 'akaza-adventure' ); ?>
						<span aria-hidden="true">→</span>
					</a>

				</div>

			</div>


			<!-- Right: Country Rules -->
			<div class="sl-gdpr-sales-marketing__panel">

				<div class="sl-gdpr-sales-marketing__panel-header">

					<div>
						<span class="sl-gdpr-sales-marketing__panel-eyebrow">
							<?php esc_html_e( 'From Lesson 6', 'akaza-adventure' ); ?>
						</span>

						<h3 class="sl-panel-title">
							<?php esc_html_e( 'What May Your Team Send, by Country?', 'akaza-adventure' ); ?>
						</h3>
					</div>

					<div class="sl-gdpr-sales-marketing__legend">

						<span class="sl-gdpr-sales-marketing__legend-item">
							<span
								class="sl-gdpr-sales-marketing__legend-dot sl-gdpr-sales-marketing__legend-dot--allowed"
								aria-hidden="true"
							></span>
							<?php esc_html_e( 'Opt-out', 'akaza-adventure' ); ?>
						</span>

						<span class="sl-gdpr-sales-marketing__legend-item">
							<span
								class="sl-gdpr-sales-marketing__legend-dot sl-gdpr-sales-marketing__legend-dot--consent"
								aria-hidden="true"
							></span>
							<?php esc_html_e( 'Opt-in', 'akaza-adventure' ); ?>
						</span>

					</div>

				</div>


				<div class="sl-gdpr-sales-marketing__countries">

					<div class="sl-gdpr-sales-marketing__country">

						<div class="sl-gdpr-sales-marketing__country-name">
							<span class="sl-gdpr-sales-marketing__status-dot" aria-hidden="true"></span>

							<strong>
								<?php esc_html_e( 'United Kingdom', 'akaza-adventure' ); ?>
							</strong>
						</div>

						<div class="sl-gdpr-sales-marketing__country-detail">
							<span class="sl-gdpr-sales-marketing__tag">
								<?php esc_html_e( 'Cold email permitted', 'akaza-adventure' ); ?>
							</span>

							<p>
								<?php esc_html_e( 'Allowed if the recipient can object to further contact.', 'akaza-adventure' ); ?>
							</p>
						</div>

					</div>


					<div class="sl-gdpr-sales-marketing__country">

						<div class="sl-gdpr-sales-marketing__country-name">
							<span class="sl-gdpr-sales-marketing__status-dot" aria-hidden="true"></span>

							<strong>
								<?php esc_html_e( 'Ireland', 'akaza-adventure' ); ?>
							</strong>
						</div>

						<div class="sl-gdpr-sales-marketing__country-detail">
							<span class="sl-gdpr-sales-marketing__tag">
								<?php esc_html_e( 'Cold email permitted', 'akaza-adventure' ); ?>
							</span>

							<p>
								<?php esc_html_e( 'Same model, objection route required.', 'akaza-adventure' ); ?>
							</p>
						</div>

					</div>


					<div class="sl-gdpr-sales-marketing__country">

						<div class="sl-gdpr-sales-marketing__country-name">
							<span
								class="sl-gdpr-sales-marketing__status-dot sl-gdpr-sales-marketing__status-dot--consent"
								aria-hidden="true"
							></span>

							<strong>
								<?php esc_html_e( 'Germany', 'akaza-adventure' ); ?>
							</strong>
						</div>

						<div class="sl-gdpr-sales-marketing__country-detail">
							<span class="sl-gdpr-sales-marketing__tag sl-gdpr-sales-marketing__tag--consent">
								<?php esc_html_e( 'Documented consent first', 'akaza-adventure' ); ?>
							</span>

							<p>
								<?php esc_html_e( 'No email without previously documented consent.', 'akaza-adventure' ); ?>
							</p>
						</div>

					</div>


					<div class="sl-gdpr-sales-marketing__country">

						<div class="sl-gdpr-sales-marketing__country-name">
							<span
								class="sl-gdpr-sales-marketing__status-dot sl-gdpr-sales-marketing__status-dot--consent"
								aria-hidden="true"
							></span>

							<strong>
								<?php esc_html_e( 'Netherlands', 'akaza-adventure' ); ?>
							</strong>
						</div>

						<div class="sl-gdpr-sales-marketing__country-detail">
							<span class="sl-gdpr-sales-marketing__tag sl-gdpr-sales-marketing__tag--consent">
								<?php esc_html_e( 'Documented consent first', 'akaza-adventure' ); ?>
							</span>

							<p>
								<?php esc_html_e( 'Some existing customer or contract negotiation exemptions apply.', 'akaza-adventure' ); ?>
							</p>
						</div>

					</div>


					<div class="sl-gdpr-sales-marketing__country">

						<div class="sl-gdpr-sales-marketing__country-name">
							<span class="sl-gdpr-sales-marketing__status-dot" aria-hidden="true"></span>

							<strong>
								<?php esc_html_e( 'France', 'akaza-adventure' ); ?>
							</strong>
						</div>

						<div class="sl-gdpr-sales-marketing__country-detail">
							<span class="sl-gdpr-sales-marketing__tag">
								<?php esc_html_e( 'Conditional outreach', 'akaza-adventure' ); ?>
							</span>

							<p>
								<?php esc_html_e( 'Rules depend on the nature of the contact and the relationship with the recipient.', 'akaza-adventure' ); ?>
							</p>
						</div>

					</div>

				</div>


				<div class="sl-gdpr-sales-marketing__panel-footer">

					<span>
						<?php esc_html_e( 'Taught directly in the course.', 'akaza-adventure' ); ?>
					</span>

					<a href="#contact">
						<?php esc_html_e( 'Request the full preview', 'akaza-adventure' ); ?>
						<span aria-hidden="true">→</span>
					</a>

				</div>

			</div>

		</div>

	</div>
</section>