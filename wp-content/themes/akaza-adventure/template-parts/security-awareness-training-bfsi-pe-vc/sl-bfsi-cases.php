<?php
/**
 * BFSI & PE/VC — Case Studies: Real Consequences of Non-Compliance.
 * Sticky left intro + scrollable right case cards.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$cases = array(
	array(
		'title' => __( 'Interserve Group Limited (UK)', 'akaza-adventure' ),
		'text'  => __( 'Interserve Group Limited (UK) was fined £4.4 million by the UK Information Commissioner’s Office (ICO) after a phishing email enabled attackers to access internal systems and compromise the personal data of over 100,000 employees. The regulator concluded that the breach stemmed from a social-engineering attack combined with inadequate security awareness and response controls, highlighting the compliance risk of insufficient employee training.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Morgan Stanley – Insider Data Misuse (United States)', 'akaza-adventure' ),
		'text'  => __( 'In 2016, Morgan Stanley faced regulatory action after a former financial advisor misused authorised system access to extract data relating to approximately 350,000 client accounts and attempted to transfer it externally. The incident resulted in enforcement scrutiny, litigation exposure, reputational damage, and a significant compliance remediation programme, highlighting how failure to adequately prevent, monitor, and train employees on insider threat risks can lead to severe regulatory and business consequences.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Target Corporation (2013)', 'akaza-adventure' ),
		'text'  => __( 'A major data breach occurred after attackers accessed Target’s network through a compromised third-party vendor, exposing millions of customer records. Target paid USD 18.5 million in regulatory settlements with U.S. states and incurred substantial remediation and legal costs, highlighting how weak third-party oversight and lack of employee awareness can lead to severe financial and reputational consequences.', 'akaza-adventure' ),
	),
);
?>

<section
	class="sl-bfsi-cases"
	aria-labelledby="sl-bfsi-cases-title"
>
	<div class="container">

		<div class="sl-bfsi-cases__layout">

			<div class="sl-bfsi-cases__intro">

				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'Real-World Impact', 'akaza-adventure' ); ?>
				</span>

				<h2 id="sl-bfsi-cases-title">
					<?php esc_html_e( 'Case Studies: Real Consequences of', 'akaza-adventure' ); ?>
					<span><?php esc_html_e( 'Non-Compliance', 'akaza-adventure' ); ?></span>
				</h2>

				<div class="sl-bfsi-cases__copy">
					<p>
						<?php
						esc_html_e(
							'Although Social Engineering, Insider Threat, Physical Security, Data Privacy, Third-Party Risk, and AI-based Attacks training are not always explicitly mandated as standalone legal requirements, regulators consistently expect documented, role-based security and privacy training as part of reasonable organizational controls. Companies that fail to train employees on threat recognition, data handling, vendor risks, and incident reporting face significantly higher penalties after incidents, making such training effectively mandatory in practice to demonstrate compliance, due diligence, and risk reduction.',
							'akaza-adventure'
						);
						?>
					</p>
				</div>

			</div>

			<div class="sl-bfsi-cases__cards">

				<?php foreach ( $cases as $index => $case ) : ?>

					<article class="sl-bfsi-cases__card">
						<span class="sl-bfsi-cases__number" aria-hidden="true">
							<?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?>
						</span>
						<h3 class="sl-panel-title">
							<?php echo esc_html( $case['title'] ); ?>
						</h3>
						<p>
							<?php echo esc_html( $case['text'] ); ?>
						</p>
					</article>

				<?php endforeach; ?>

			</div>

		</div>

	</div>
</section>
