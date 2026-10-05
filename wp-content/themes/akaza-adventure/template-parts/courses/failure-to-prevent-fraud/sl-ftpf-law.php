<?php
/**
 * Failure to Prevent Fraud — Why this training matters / regulatory context.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$law_cards = array(
	array(
		'title' => __( 'Corporate liability can arise', 'akaza-adventure' ),
		'text'  => __( 'A large organisation can face criminal liability where an associated person commits a specified fraud offence intending to benefit the organisation and the organisation did not have reasonable fraud-prevention procedures in place.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Associated persons matter', 'akaza-adventure' ),
		'text'  => __( 'Fraud risk is not limited to the actions of directors or senior management. Employees, agents and others providing services for or on behalf of an organisation can be relevant to the offence.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Awareness supports stronger controls', 'akaza-adventure' ),
		'text'  => __( 'Government guidance identifies communication, including training, as one of the principles supporting reasonable fraud-prevention procedures, alongside areas such as risk assessment, due diligence and monitoring.', 'akaza-adventure' ),
	),
);

$reasons = array(
	array(
		'title' => __( 'Employees influence the information the organisation relies on', 'akaza-adventure' ),
		'text'  => __( 'Financial figures, investor communications, external reports and supplier information can all create risk when facts are inaccurate, incomplete or misleading.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Pressure can change behaviour', 'akaza-adventure' ),
		'text'  => __( 'Commercial targets, fundraising pressure and tight deadlines can increase the importance of employees knowing when information needs to be checked or challenged.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Small warning signs can be easy to overlook', 'akaza-adventure' ),
		'text'  => __( 'Employees need to recognise inconsistencies, weak audit trails, unusual behaviour and resistance to reasonable questions.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Early escalation matters', 'akaza-adventure' ),
		'text'  => __( 'Employees should understand that a concern does not need to be proven fraud before it is raised through the appropriate internal channel.', 'akaza-adventure' ),
	),
);
?>

<section id="why-it-matters" class="ftpf-section ftpf-section--grey ftpf-law" aria-labelledby="ftpf-law-title">
	<div class="ftpf-container">

		<div class="ftpf-law__header">
			<div>
				<span class="sl-home-sub-heading"><?php esc_html_e( 'Why This Training Matters', 'akaza-adventure' ); ?></span>
				<h2 id="ftpf-law-title">
					<?php esc_html_e( 'The regulatory landscape', 'akaza-adventure' ); ?>
					<span><?php esc_html_e( 'has changed', 'akaza-adventure' ); ?></span>
				</h2>
			</div>

			<div class="ftpf-law__header-copy">
				<p>
					<?php esc_html_e( 'The', 'akaza-adventure' ); ?>
					<strong><?php esc_html_e( 'Economic Crime and Corporate Transparency Act 2023', 'akaza-adventure' ); ?></strong>
					<?php esc_html_e( 'introduced a corporate offence of Failure to Prevent Fraud.', 'akaza-adventure' ); ?>
				</p>
				<p class="ftpf-law__highlight"><?php esc_html_e( 'The offence came into force on 1 September 2025.', 'akaza-adventure' ); ?></p>
				<p><?php esc_html_e( 'For organisations within scope, understanding how fraud can arise through employees, agents and other associated persons is now an important part of managing corporate fraud risk.', 'akaza-adventure' ); ?></p>
			</div>
		</div>

		<div class="ftpf-law__cards">
			<?php foreach ( $law_cards as $index => $card ) : ?>
				<article class="ftpf-law__card">
					<span class="ftpf-law__card-number"><?php echo esc_html( sprintf( '%02d', $index + 1 ) ); ?></span>
					<h3><?php echo esc_html( $card['title'] ); ?></h3>
					<p><?php echo esc_html( $card['text'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>

	</div>
</section>

<section class="ftpf-section ftpf-section--white ftpf-law-why" aria-labelledby="ftpf-law-why-title">
	<div class="ftpf-container">

		<div class="ftpf-law__why">
			<div>
				<span class="sl-home-sub-heading"><?php esc_html_e( 'The Organisational Challenge', 'akaza-adventure' ); ?></span>
				<h3 id="ftpf-law-why-title"><?php esc_html_e( 'Fraud risk can begin with an everyday decision', 'akaza-adventure' ); ?></h3>
				<p><?php esc_html_e( 'Misleading information, poor validation, weak documentation or a concern that is never raised can create exposure long before an issue is formally identified as fraud.', 'akaza-adventure' ); ?></p>
			</div>

			<ul class="ftpf-law__reasons">
				<?php foreach ( $reasons as $index => $reason ) : ?>
					<li>
						<span class="ftpf-law__reason-icon" aria-hidden="true"><?php echo esc_html( sprintf( '%02d', $index + 1 ) ); ?></span>
						<div>
							<strong><?php echo esc_html( $reason['title'] ); ?></strong>
							<p><?php echo esc_html( $reason['text'] ); ?></p>
						</div>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>

		<p class="ftpf-law__source">
			<?php esc_html_e( 'Regulatory context based on current UK Government guidance. Organisations should obtain legal advice regarding their specific obligations.', 'akaza-adventure' ); ?>
			<a href="https://www.gov.uk/government/publications/offence-of-failure-to-prevent-fraud-introduced-by-eccta" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'View Government guidance', 'akaza-adventure' ); ?></a>.
		</p>

	</div>
</section>
