<?php
/**
 * Reusable solutions / products card grid.
 *
 * Usage:
 * get_template_part( 'template-parts/global/solutions-carousel' );
 * get_template_part( 'template-parts/global/solutions-carousel', null, array(
 *   'title'       => '...',
 *   'description' => '...',
 * ) );
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$args        = is_array( $args ?? null ) ? $args : array();
$title       = isset( $args['title'] ) ? (string) $args['title'] : __( 'Explore our learning solutions', 'akaza-adventure' );
$description = isset( $args['description'] ) ? (string) $args['description'] : __( 'From security awareness to workplace compliance—browse the programmes organizations use to train teams at scale.', 'akaza-adventure' );
$cta_href    = function_exists( 'akaza_page_url' ) ? akaza_page_url( 'contact-us' ) : home_url( '/contact-us/' );

$solutions = array(
	array(
		'icon'  => 'https://succeedlearn.com/wp-content/uploads/2026/01/Comprehensive-Security-Awareness.svg',
		'title' => __( 'Comprehensive Security Awareness Training Program', 'akaza-adventure' ),
		'body'  => __( 'Looking for a complete, organization-wide cybersecurity awareness solution? Our Security Awareness Suite brings together immersive training, real phishing simulations, bite-sized videos, gamified learning, visual reminders, analytics dashboards, and seamless integrations.', 'akaza-adventure' ),
		'cta'   => __( 'Fill out the form to explore the full suite.', 'akaza-adventure' ),
	),
	array(
		'icon'  => 'https://succeedlearn.com/wp-content/uploads/2026/01/S-Aware.svg',
		'title' => __( 'S-Aware - Cybersecurity & Data Protection Training', 'akaza-adventure' ),
		'body'  => __( 'Looking to strengthen employee security behaviour across your organization? S-Aware offers comprehensive cybersecurity and data protection training designed to reduce human risk. From phishing to passwords, social engineering to data handling, your teams learn through engaging modules built for real-world threats.', 'akaza-adventure' ),
		'cta'   => __( 'Fill the form to explore customisation options for your organization.', 'akaza-adventure' ),
	),
	array(
		'icon'  => 'https://succeedlearn.com/wp-content/uploads/2026/01/S-Phish.svg',
		'title' => __( 'S-Phish - Phishing Simulation Platform', 'akaza-adventure' ),
		'body'  => __( 'Need a reliable way to test your organization’s security posture? S-Phish enables you to run realistic phishing simulations, measure vulnerability levels, identify high-risk groups, and track improvements over time. With automated campaigns, templates, reporting dashboards, and behavioural insights, S-Phish becomes your continuous defence mechanism.', 'akaza-adventure' ),
		'cta'   => __( 'Fill out the form to schedule a walkthrough.', 'akaza-adventure' ),
	),
	array(
		'icon'  => 'https://succeedlearn.com/wp-content/uploads/2026/01/S-Bytes.svg',
		'title' => __( 'S-Bytes - 5-Minute Cybersecurity Microlearning', 'akaza-adventure' ),
		'body'  => __( 'Want cybersecurity training that employees actually enjoy? S-Bytes delivers short, story-driven, humorous microlearning videos under five minutes—perfect for busy teams. If you need high-impact learning with high completion rates, share your details and we’ll assist.', 'akaza-adventure' ),
		'cta'   => __( 'Share your details and we’ll assist.', 'akaza-adventure' ),
	),
	array(
		'icon'  => 'https://succeedlearn.com/wp-content/uploads/2026/01/S-Metrics.svg',
		'title' => __( 'S-Metrics - Security Awareness Analytics Hub', 'akaza-adventure' ),
		'body'  => __( 'Struggling to measure the impact of your awareness program? S-Metrics brings all training, simulation, engagement, and behaviour data into a single dashboard. Track risk reduction, completions, phish-prone users, trends, policy acceptance, and more.', 'akaza-adventure' ),
		'cta'   => __( 'Fill in the form to see S-Metrics in action.', 'akaza-adventure' ),
	),
	array(
		'icon'  => 'https://succeedlearn.com/wp-content/uploads/2026/01/S-Play.svg',
		'title' => __( 'S-Play - Gamified Cybersecurity Learning', 'akaza-adventure' ),
		'body'  => __( 'Looking for security training that doesn’t feel like training? S-Play uses interactive games to help employees practise secure behaviours through challenge-based learning. It transforms complex cyber concepts into fun, competitive, skill-building activities that enhance retention and drive behaviour change.', 'akaza-adventure' ),
		'cta'   => __( 'Share your contact details to explore how gamified learning can boost engagement.', 'akaza-adventure' ),
	),
	array(
		'icon'  => 'https://succeedlearn.com/wp-content/uploads/2026/01/S-Signs.svg',
		'title' => __( 'S-Signs - Cybersecurity Poster Library', 'akaza-adventure' ),
		'body'  => __( 'Want ready-to-use visual reminders to reinforce secure behaviour? S-Signs provides a full library of professionally designed posters covering phishing risks, MFA, passwords, device safety, social engineering, clean desk policy, and more.', 'akaza-adventure' ),
		'cta'   => __( 'Fill the form to access the complete poster collection.', 'akaza-adventure' ),
	),
	array(
		'icon'  => 'https://succeedlearn.com/wp-content/uploads/2026/01/S-Sync.svg',
		'title' => __( 'S-Sync - Integration Layer for IT, HR & Compliance', 'akaza-adventure' ),
		'body'  => __( 'Need your cybersecurity training ecosystem to work seamlessly with existing systems? S-Sync ensures smooth integration with your LMS, HRIS, identity provider, and compliance workflows.', 'akaza-adventure' ),
		'cta'   => __( 'Share your details to learn about implementation.', 'akaza-adventure' ),
	),
	array(
		'icon'  => 'https://succeedlearn.com/wp-content/uploads/2026/01/POSH-Fundamentals.svg',
		'title' => __( 'POSH Fundamentals India - Anti-Sexual Harassment (India)', 'akaza-adventure' ),
		'body'  => __( 'Looking for POSH training that meets legal requirements and drives real culture change? Our POSH Fundamentals program offers interactive learning, Indian legal compliance, case-based scenarios, IC guidance, and practical insights to help employees create safer workplaces.', 'akaza-adventure' ),
		'cta'   => __( 'Fill out the form for details.', 'akaza-adventure' ),
	),
	array(
		'icon'  => 'https://succeedlearn.com/wp-content/uploads/2026/01/Harassment-Prevention-USA.svg',
		'title' => __( 'Harassment Prevention USA - Anti-Harassment Training (U.S.)', 'akaza-adventure' ),
		'body'  => __( 'Need a compliant, engaging harassment-prevention program for U.S. workplaces? This course covers federal and state laws, protected classes, acceptable behaviour, retaliation, reporting, and real scenarios tailored for American teams.', 'akaza-adventure' ),
		'cta'   => __( 'Submit your information and we’ll guide you with deployment options for your workforce.', 'akaza-adventure' ),
	),
	array(
		'icon'  => 'https://succeedlearn.com/wp-content/uploads/2026/01/Code-of-Conduct.svg',
		'title' => __( 'Code of Conduct Training', 'akaza-adventure' ),
		'body'  => __( 'Looking to implement organization-wide ethical behaviour? Our Code of Conduct program covers conflicts of interest, gifts, anti-bribery, confidentiality, insider trading, social media, data protection, and more. It transforms policies into practical, everyday decisions employees can apply.', 'akaza-adventure' ),
		'cta'   => __( 'Fill in the form.', 'akaza-adventure' ),
	),
	array(
		'icon'  => 'https://succeedlearn.com/wp-content/uploads/2026/01/Information-Security.svg',
		'title' => __( 'Information Security / DPDP / GDPR Awareness', 'akaza-adventure' ),
		'body'  => __( 'Need training that prepares employees for global data protection regulations? Our program simplifies Information Security, GDPR principles, data handling rules, privacy rights, and breach prevention. With clear, relatable examples and sector-specific risks, your teams build strong compliance habits.', 'akaza-adventure' ),
		'cta'   => __( 'Share your contact details for customised deployment options.', 'akaza-adventure' ),
	),
	array(
		'icon'  => 'https://succeedlearn.com/wp-content/uploads/2026/01/Anti-Bribery-Corruption.svg',
		'title' => __( 'Anti-Bribery & Corruption (ABC)', 'akaza-adventure' ),
		'body'  => __( 'Worried about bribery risks, third-party interactions, or ethical lapses? Our ABC training explains bribery red flags, facilitation payments, hospitality risks, conflicts, reporting duties, and global enforcement scenarios.', 'akaza-adventure' ),
		'cta'   => __( 'Fill out the form to strengthen your organization’s anti-corruption framework.', 'akaza-adventure' ),
	),
	array(
		'icon'  => 'https://succeedlearn.com/wp-content/uploads/2026/01/Gift-Hospitality-Training.svg',
		'title' => __( 'Gift & Hospitality Training', 'akaza-adventure' ),
		'body'  => __( 'Need clarity on acceptable gifts and hospitality? This training explains thresholds, approvals, conflict situations, vendor relationships, cultural considerations, and high-risk scenarios employees often face. It helps prevent reputational and regulatory harm by ensuring transparent decision-making.', 'akaza-adventure' ),
		'cta'   => __( 'Share your information to explore customisable content for your policies.', 'akaza-adventure' ),
	),
	array(
		'icon'  => 'https://succeedlearn.com/wp-content/uploads/2026/01/Anti-Trust-Fair-Competition.svg',
		'title' => __( 'Anti-Trust & Fair Competition', 'akaza-adventure' ),
		'body'  => __( 'Looking to protect your organization from competition law violations? This course explains anti-competitive behaviour, price-fixing risks, market dominance, bid rigging, and collusive practices with global case studies. It prepares employees to identify and avoid illegal conduct.', 'akaza-adventure' ),
		'cta'   => __( 'Fill out the form to implement a practical, business-friendly training solution.', 'akaza-adventure' ),
	),
	array(
		'icon'  => 'https://succeedlearn.com/wp-content/uploads/2026/01/Business-Continuity.svg',
		'title' => __( 'Business Continuity (BCMS)', 'akaza-adventure' ),
		'body'  => __( 'Need better preparedness for operational disruptions? Our BCMS training covers crisis response, risk assessment, incident communication, recovery planning, and maintaining critical services during unexpected events. It helps employees understand their role in organizational resilience.', 'akaza-adventure' ),
		'cta'   => __( 'Submit your details and our team will support your rollout plan.', 'akaza-adventure' ),
	),
	array(
		'icon'  => 'https://succeedlearn.com/wp-content/uploads/2026/01/AML-CFT-KYC-Compliance-Training.svg',
		'title' => __( 'AML / CFT / KYC Compliance Training', 'akaza-adventure' ),
		'body'  => __( 'Looking to strengthen financial crime compliance? This program explains money laundering stages, red flags, KYC procedures, suspicious transaction indicators, reporting obligations, and preventative controls. Ideal for banks, fintech, NBFCs, and regulated sectors.', 'akaza-adventure' ),
		'cta'   => __( 'Fill in the form for a tailored AML/CFT/KYC learning solution.', 'akaza-adventure' ),
	),
	array(
		'icon'  => 'https://succeedlearn.com/wp-content/uploads/2026/01/Insider-Trading-Awareness.svg',
		'title' => __( 'Insider Trading Awareness', 'akaza-adventure' ),
		'body'  => __( 'Want employees to understand and avoid insider trading violations? This training clarifies material non-public information, trading windows, disclosure rules, prohibited conduct, and corporate responsibilities. It protects both individuals and the organization from severe penalties.', 'akaza-adventure' ),
		'cta'   => __( 'Share your information for customised insider-trading compliance modules.', 'akaza-adventure' ),
	),
	array(
		'icon'  => 'https://succeedlearn.com/wp-content/uploads/2026/01/Equal-Opportunity-DEI-Training.svg',
		'title' => __( 'Equal Opportunity & DEI Training', 'akaza-adventure' ),
		'body'  => __( 'Looking to build a respectful, inclusive workplace? Our DEI training covers unconscious bias, inclusive communication, equal opportunity obligations, cultural sensitivity, and intervention techniques. It strengthens employee awareness and supports healthier team dynamics.', 'akaza-adventure' ),
		'cta'   => __( 'Fill out the form to deploy DEI programs that shift behaviours and perspectives.', 'akaza-adventure' ),
	),
);
?>
<section class="sl-solutions-cards" aria-labelledby="sl-solutions-cards-heading">
	<div class="sl-solutions-cards__container">
		<?php if ( '' !== $title ) : ?>
			<header class="sl-solutions-cards__header">
				<span class="sl-home-sub-heading"><?php esc_html_e( 'Solutions', 'akaza-adventure' ); ?></span>
				<h2 id="sl-solutions-cards-heading"><?php echo esc_html( $title ); ?></h2>
				<?php if ( '' !== $description ) : ?>
					<p><?php echo esc_html( $description ); ?></p>
				<?php endif; ?>
			</header>
		<?php endif; ?>

		<div class="sl-solutions-cards__grid">
			<?php foreach ( $solutions as $item ) : ?>
				<article class="sl-solutions-cards__card">
					<div class="sl-solutions-cards__icon">
						<img
							src="<?php echo esc_url( $item['icon'] ); ?>"
							alt=""
							width="48"
							height="48"
							loading="lazy"
							decoding="async"
						/>
					</div>
					<div class="sl-solutions-cards__body">
						<h3><?php echo esc_html( $item['title'] ); ?></h3>
						<p><?php echo esc_html( $item['body'] ); ?></p>
						<a class="sl-solutions-cards__link" href="<?php echo esc_url( $cta_href ); ?>">
							<?php echo esc_html( $item['cta'] ); ?>
						</a>
					</div>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
