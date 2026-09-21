<?php
/**
 * Terms and Conditions — Article sections (shared by desktop + AMP).
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<article class="sl-legal-content">

	<section id="introduction" class="sl-legal-section">
		<h2><?php esc_html_e( '1. Introduction', 'akaza-adventure' ); ?></h2>
		<p><?php esc_html_e( 'These Terms and Conditions are applicable only for purchase of services and subscriptions from our online portal (for example, webinars or online training programs). This is not applicable for any purchase performed through our other sales channels. There may be a separate Service Agreement that will be signed with the organization. For more details, reach out to your Sales/Support POC.', 'akaza-adventure' ); ?></p>
		<p><?php esc_html_e( 'By purchasing our learning services, you agree to abide by these Terms and Conditions. Please read them carefully before making a purchase. For the purposes of these Terms and Conditions, "you" and "your" refer to the individual or entity purchasing the course/learning services. "Succeed Technologies," "we," "us," and "our" refer to Succeed Technologies Private Limited including its products delivered through eLearnPOSH.com and SucceedLEARN.com, the provider of the courses/learning services.', 'akaza-adventure' ); ?></p>
	</section>

	<section id="purchase-and-payment" class="sl-legal-section">
		<h2><?php esc_html_e( '2. Purchase and Payment', 'akaza-adventure' ); ?></h2>

		<h3><?php esc_html_e( '2.1 Purchase of Learning Services', 'akaza-adventure' ); ?></h3>
		<ul>
			<li><?php esc_html_e( 'To purchase a course/learning service, you must complete the checkout process and provide accurate and complete payment and personal information.', 'akaza-adventure' ); ?></li>
			<li><?php esc_html_e( 'By placing an order, you confirm that you are legally capable of entering into binding contracts.', 'akaza-adventure' ); ?></li>
		</ul>

		<h3><?php esc_html_e( '2.2 Payment Methods', 'akaza-adventure' ); ?></h3>
		<ul>
			<li><?php esc_html_e( 'We accept various payment methods including credit/debit cards, UPI, and other specified options.', 'akaza-adventure' ); ?></li>
			<li><?php esc_html_e( 'All payments are processed securely through our payment gateway providers. To know more about the terms and conditions of our payment gateway providers (Razorpay / Stripe).', 'akaza-adventure' ); ?></li>
		</ul>

		<h3><?php esc_html_e( '2.3 Pricing', 'akaza-adventure' ); ?></h3>
		<ul>
			<li><?php esc_html_e( 'Our courses are priced based on the value we provide to customers. Prices are subject to change at our discretion without prior notice.', 'akaza-adventure' ); ?></li>
			<li><?php esc_html_e( 'All prices are listed in INR/USD and exclude any applicable service taxes unless otherwise stated.', 'akaza-adventure' ); ?></li>
			<li>
				<?php
				echo wp_kses(
					sprintf(
						/* translators: %s: support email */
						__( 'If you require a GST invoice, please write to our customer support at %s.', 'akaza-adventure' ),
						'<a href="mailto:support@succeedtech.com">support@succeedtech.com</a>'
					),
					array(
						'a' => array( 'href' => true ),
					)
				);
				?>
			</li>
		</ul>
	</section>

	<section id="refund-cancellation" class="sl-legal-section">
		<h2><?php esc_html_e( '3. Refund and Cancellation Policy', 'akaza-adventure' ); ?></h2>

		<h3><?php esc_html_e( '3.1 Refunds and Cancellations', 'akaza-adventure' ); ?></h3>
		<ul>
			<li><?php esc_html_e( 'Refund or cancellation requests can be submitted within 30 days of the payment date.', 'akaza-adventure' ); ?></li>
			<li><?php esc_html_e( 'Refunds or cancellations are granted if the course content or delivery does not align with the advertised description.', 'akaza-adventure' ); ?></li>
			<li><?php esc_html_e( 'Succeed Technologies will review and determine the reasonableness of each refund or cancellation request.', 'akaza-adventure' ); ?></li>
			<li><?php esc_html_e( 'We reserve the right to approve or deny refund or cancellation requests.', 'akaza-adventure' ); ?></li>
			<li><?php esc_html_e( 'Refunds or cancellation may be denied if the customer has gained substantial benefit from the course material within the 30-day period.', 'akaza-adventure' ); ?></li>
		</ul>

		<h3><?php esc_html_e( '3.2 Non-Refundable Situations', 'akaza-adventure' ); ?></h3>
		<ul>
			<li><?php esc_html_e( 'No refunds or cancellations will be provided for courses purchased during promotional sales or with discount codes.', 'akaza-adventure' ); ?></li>
		</ul>
	</section>

	<section id="intellectual-property" class="sl-legal-section">
		<h2><?php esc_html_e( '4. Intellectual Property', 'akaza-adventure' ); ?></h2>

		<h3><?php esc_html_e( '4.1 Intellectual Property Rights', 'akaza-adventure' ); ?></h3>
		<ul>
			<li><?php esc_html_e( 'All content, including text, graphics, images, videos, and other materials provided in the course/learning services, are the intellectual property of Succeed Technologies.', 'akaza-adventure' ); ?></li>
			<li><?php esc_html_e( 'You are granted a limited, non-exclusive, non-transferable license to access and view the course/learning services content for personal, or organizational users\' consumption.', 'akaza-adventure' ); ?></li>
			<li><?php esc_html_e( 'The courses/learning services bought through this channel are not for resale, unless agreed through a separate partnership agreement.', 'akaza-adventure' ); ?></li>
		</ul>

		<h3><?php esc_html_e( '4.2 Restrictions', 'akaza-adventure' ); ?></h3>
		<ul>
			<li><?php esc_html_e( 'You may not reproduce, distribute, modify, create derivative works from, publicly display, or commercially exploit any part of the course/learning services content without explicit written permission from Succeed Technologies.', 'akaza-adventure' ); ?></li>
			<li><?php esc_html_e( 'Any unauthorized use of the course/learning service content is strictly prohibited and may result in legal action.', 'akaza-adventure' ); ?></li>
		</ul>
	</section>

	<section id="usage-and-access" class="sl-legal-section">
		<h2><?php esc_html_e( '5. Usage and Access', 'akaza-adventure' ); ?></h2>

		<h3><?php esc_html_e( '5.1 Account Suspension', 'akaza-adventure' ); ?></h3>
		<ul>
			<li><?php esc_html_e( 'Access to your account may be suspended or terminated if suspicious or fraudulent activity is detected.', 'akaza-adventure' ); ?></li>
			<li><?php esc_html_e( 'In the event of account suspension due to suspicious activity, no refunds will be issued.', 'akaza-adventure' ); ?></li>
		</ul>

		<h3><?php esc_html_e( '5.2 Permitted Use', 'akaza-adventure' ); ?></h3>
		<ul>
			<li><?php esc_html_e( 'Courses/learning services are intended for individual use only and may not be shared, resold, or redistributed in any form.', 'akaza-adventure' ); ?></li>
			<li><?php esc_html_e( 'The courses/learning services purchased through this channel should be used only by a single user from one login ID.', 'akaza-adventure' ); ?></li>
			<li><?php esc_html_e( 'It should not be used by way of broadcasting to multiple individuals.', 'akaza-adventure' ); ?></li>
		</ul>
	</section>

	<section id="governing-law" class="sl-legal-section">
		<h2><?php esc_html_e( '6. Governing Law and Jurisdiction', 'akaza-adventure' ); ?></h2>
		<p><?php esc_html_e( 'These Terms and Conditions are governed by and construed in accordance with the laws of India. Any disputes arising from these terms will be subject to the exclusive jurisdiction of the courts of Bengaluru, India.', 'akaza-adventure' ); ?></p>
	</section>

	<section id="agreement-override" class="sl-legal-section">
		<h2><?php esc_html_e( '7. Agreement Override', 'akaza-adventure' ); ?></h2>
		<p><?php esc_html_e( 'Any specific agreement signed with Succeed Technologies will take precedence over the terms mentioned herein.', 'akaza-adventure' ); ?></p>
	</section>

	<section id="contact-information" class="sl-legal-section">
		<h2><?php esc_html_e( '8. Contact Information', 'akaza-adventure' ); ?></h2>
		<p>
			<?php
			echo wp_kses(
				sprintf(
					/* translators: %s: support email */
					__( 'For any queries, issues, or support requests, please contact our customer support team at %s.', 'akaza-adventure' ),
					'<a href="mailto:support@succeedtech.com">support@succeedtech.com</a>'
				),
				array(
					'a' => array( 'href' => true ),
				)
			);
			?>
		</p>
		<p><?php esc_html_e( 'We are committed to providing prompt and effective assistance to all inquiries.', 'akaza-adventure' ); ?></p>
		<p>
			<?php
			echo wp_kses(
				__( '<strong>SucceedLEARN</strong> is a product of <strong>Succeed Technologies&reg;</strong>, a dynamic organization that aims to revolutionize how people learn online and simplify Compliance eLearning for organizations across the globe.', 'akaza-adventure' ),
				array( 'strong' => array() )
			);
			?>
		</p>
	</section>

</article>
