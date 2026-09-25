<?php
/**
 * PCI DSS — How the Training Supports PCI DSS Security Awareness.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<section
	class="sl-pci-strengthen"
	aria-labelledby="sl-pci-strengthen-title"
>
	<div class="container">

		<div class="sl-pci-strengthen__inner">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Requirement 12.6 Alignment', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-pci-strengthen-title">
				<?php esc_html_e( 'How the Training Supports', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'PCI DSS Security Awareness', 'akaza-adventure' ); ?></span>
			</h2>

			<div class="sl-pci-strengthen__copy">
				<p>
					<?php
					esc_html_e(
						'PCI DSS Requirement 12.6 treats security-awareness education as an ongoing activity. A formal security-awareness programme should help personnel understand relevant information-security policies and procedures and their role in protecting cardholder data.',
						'akaza-adventure'
					);
					?>
				</p>

				<p>
					<?php
					esc_html_e(
						'PCI DSS v4.x also explicitly includes awareness of phishing, related attacks and social engineering within security-awareness training.',
						'akaza-adventure'
					);
					?>
				</p>

				<p>
					<?php
					esc_html_e(
						"SucceedLEARN's two-module approach helps organisations provide awareness appropriate to different employee responsibilities, from foundational PCI DSS knowledge to practical payment-handler security.",
						'akaza-adventure'
					);
					?>
				</p>
			</div>

		</div>

	</div>
</section>
