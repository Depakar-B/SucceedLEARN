<?php
/**
 * Shared solutions / products card grid — AMP data.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Resolve a solutions card icon URL (local uploads preferred).
 *
 * @param string $filename File under uploads/2026/01/.
 * @return string
 */
function succeedlearn_amp_get_solutions_card_icon_url( $filename ) {
	$filename  = ltrim( (string) $filename, '/' );
	$local     = WP_CONTENT_DIR . '/uploads/2026/01/' . $filename;
	$local_url = content_url( '/uploads/2026/01/' . $filename );
	if ( file_exists( $local ) ) {
		return $local_url;
	}
	return 'https://succeedlearn.com/wp-content/uploads/2026/01/' . $filename;
}

/**
 * Solutions card items (mirrors theme solutions-carousel).
 *
 * @return array<int, array{icon:string,title:string,body:string,cta:string}>
 */
function succeedlearn_amp_get_solutions_cards() {
	$items = array(
		array(
			'icon'  => 'Comprehensive-Security-Awareness.svg',
			'title' => __( 'Comprehensive Security Awareness Training Program', 'succeedlearn-amp' ),
			'body'  => __( 'Looking for a complete, organisation-wide cybersecurity awareness solution? Our Security Awareness Suite brings together immersive training, real phishing simulations, bite-sized videos, gamified learning, visual reminders, analytics dashboards, and seamless integrations.', 'succeedlearn-amp' ),
			'cta'   => __( 'Fill out the form to explore the full suite.', 'succeedlearn-amp' ),
		),
		array(
			'icon'  => 'S-Aware.svg',
			'title' => __( 'S-Aware - Cybersecurity & Data Protection Training', 'succeedlearn-amp' ),
			'body'  => __( 'Looking to strengthen employee security behaviour across your organisation? S-Aware offers comprehensive cybersecurity and data protection training designed to reduce human risk. From phishing to passwords, social engineering to data handling, your teams learn through engaging modules built for real-world threats.', 'succeedlearn-amp' ),
			'cta'   => __( 'Fill the form to explore customisation options for your organisation.', 'succeedlearn-amp' ),
		),
		array(
			'icon'  => 'S-Phish.svg',
			'title' => __( 'S-Phish - Phishing Simulation Platform', 'succeedlearn-amp' ),
			'body'  => __( 'Need a reliable way to test your organisation’s security posture? S-Phish enables you to run realistic phishing simulations, measure vulnerability levels, identify high-risk groups, and track improvements over time. With automated campaigns, templates, reporting dashboards, and behavioural insights, S-Phish becomes your continuous defence mechanism.', 'succeedlearn-amp' ),
			'cta'   => __( 'Fill out the form to schedule a walkthrough.', 'succeedlearn-amp' ),
		),
		array(
			'icon'  => 'S-Bytes.svg',
			'title' => __( 'S-Bytes - 5-Minute Cybersecurity Microlearning', 'succeedlearn-amp' ),
			'body'  => __( 'Want cybersecurity training that employees actually enjoy? S-Bytes delivers short, story-driven, humorous microlearning videos under five minutes—perfect for busy teams. If you need high-impact learning with high completion rates, share your details and we’ll assist.', 'succeedlearn-amp' ),
			'cta'   => __( 'Share your details and we’ll assist.', 'succeedlearn-amp' ),
		),
		array(
			'icon'  => 'S-Metrics.svg',
			'title' => __( 'S-Metrics - Security Awareness Analytics Hub', 'succeedlearn-amp' ),
			'body'  => __( 'Struggling to measure the impact of your awareness program? S-Metrics brings all training, simulation, engagement, and behaviour data into a single dashboard. Track risk reduction, completions, phish-prone users, trends, policy acceptance, and more.', 'succeedlearn-amp' ),
			'cta'   => __( 'Fill in the form to see S-Metrics in action.', 'succeedlearn-amp' ),
		),
		array(
			'icon'  => 'S-Play.svg',
			'title' => __( 'S-Play - Gamified Cybersecurity Learning', 'succeedlearn-amp' ),
			'body'  => __( 'Looking for security training that doesn’t feel like training? S-Play uses interactive games to help employees practise secure behaviours through challenge-based learning. It transforms complex cyber concepts into fun, competitive, skill-building activities that enhance retention and drive behaviour change.', 'succeedlearn-amp' ),
			'cta'   => __( 'Share your contact details to explore how gamified learning can boost engagement.', 'succeedlearn-amp' ),
		),
		array(
			'icon'  => 'S-Signs.svg',
			'title' => __( 'S-Signs - Cybersecurity Poster Library', 'succeedlearn-amp' ),
			'body'  => __( 'Want ready-to-use visual reminders to reinforce secure behaviour? S-Signs provides a full library of professionally designed posters covering phishing risks, MFA, passwords, device safety, social engineering, clean desk policy, and more.', 'succeedlearn-amp' ),
			'cta'   => __( 'Fill the form to access the complete poster collection.', 'succeedlearn-amp' ),
		),
		array(
			'icon'  => 'S-Sync.svg',
			'title' => __( 'S-Sync - Integration Layer for IT, HR & Compliance', 'succeedlearn-amp' ),
			'body'  => __( 'Need your cybersecurity training ecosystem to work seamlessly with existing systems? S-Sync ensures smooth integration with your LMS, HRIS, identity provider, and compliance workflows.', 'succeedlearn-amp' ),
			'cta'   => __( 'Share your details to learn about implementation.', 'succeedlearn-amp' ),
		),
		array(
			'icon'  => 'POSH-Fundamentals.svg',
			'title' => __( 'POSH Fundamentals India - Anti-Sexual Harassment (India)', 'succeedlearn-amp' ),
			'body'  => __( 'Looking for POSH training that meets legal requirements and drives real culture change? Our POSH Fundamentals program offers interactive learning, Indian legal compliance, case-based scenarios, IC guidance, and practical insights to help employees create safer workplaces.', 'succeedlearn-amp' ),
			'cta'   => __( 'Fill out the form for details.', 'succeedlearn-amp' ),
		),
		array(
			'icon'  => 'Harassment-Prevention-USA.svg',
			'title' => __( 'Harassment Prevention USA - Anti-Harassment Training (U.S.)', 'succeedlearn-amp' ),
			'body'  => __( 'Need a compliant, engaging harassment-prevention program for U.S. workplaces? This course covers federal and state laws, protected classes, acceptable behaviour, retaliation, reporting, and real scenarios tailored for American teams.', 'succeedlearn-amp' ),
			'cta'   => __( 'Submit your information and we’ll guide you with deployment options for your workforce.', 'succeedlearn-amp' ),
		),
		array(
			'icon'  => 'Code-of-Conduct.svg',
			'title' => __( 'Code of Conduct Training', 'succeedlearn-amp' ),
			'body'  => __( 'Looking to implement organisation-wide ethical behaviour? Our Code of Conduct program covers conflicts of interest, gifts, anti-bribery, confidentiality, insider trading, social media, data protection, and more. It transforms policies into practical, everyday decisions employees can apply.', 'succeedlearn-amp' ),
			'cta'   => __( 'Fill in the form.', 'succeedlearn-amp' ),
		),
		array(
			'icon'  => 'Information-Security.svg',
			'title' => __( 'Information Security / DPDP / GDPR Awareness', 'succeedlearn-amp' ),
			'body'  => __( 'Need training that prepares employees for global data protection regulations? Our program simplifies Information Security, GDPR principles, data handling rules, privacy rights, and breach prevention. With clear, relatable examples and sector-specific risks, your teams build strong compliance habits.', 'succeedlearn-amp' ),
			'cta'   => __( 'Share your contact details for customised deployment options.', 'succeedlearn-amp' ),
		),
		array(
			'icon'  => 'Anti-Bribery-Corruption.svg',
			'title' => __( 'Anti-Bribery & Corruption (ABC)', 'succeedlearn-amp' ),
			'body'  => __( 'Worried about bribery risks, third-party interactions, or ethical lapses? Our ABC training explains bribery red flags, facilitation payments, hospitality risks, conflicts, reporting duties, and global enforcement scenarios.', 'succeedlearn-amp' ),
			'cta'   => __( 'Fill out the form to strengthen your organisation’s anti-corruption framework.', 'succeedlearn-amp' ),
		),
		array(
			'icon'  => 'Gift-Hospitality-Training.svg',
			'title' => __( 'Gift & Hospitality Training', 'succeedlearn-amp' ),
			'body'  => __( 'Need clarity on acceptable gifts and hospitality? This training explains thresholds, approvals, conflict situations, vendor relationships, cultural considerations, and high-risk scenarios employees often face. It helps prevent reputational and regulatory harm by ensuring transparent decision-making.', 'succeedlearn-amp' ),
			'cta'   => __( 'Share your information to explore customisable content for your policies.', 'succeedlearn-amp' ),
		),
		array(
			'icon'  => 'Anti-Trust-Fair-Competition.svg',
			'title' => __( 'Anti-Trust & Fair Competition', 'succeedlearn-amp' ),
			'body'  => __( 'Looking to protect your organisation from competition law violations? This course explains anti-competitive behaviour, price-fixing risks, market dominance, bid rigging, and collusive practices with global case studies. It prepares employees to identify and avoid illegal conduct.', 'succeedlearn-amp' ),
			'cta'   => __( 'Fill out the form to implement a practical, business-friendly training solution.', 'succeedlearn-amp' ),
		),
		array(
			'icon'  => 'Business-Continuity.svg',
			'title' => __( 'Business Continuity (BCMS)', 'succeedlearn-amp' ),
			'body'  => __( 'Need better preparedness for operational disruptions? Our BCMS training covers crisis response, risk assessment, incident communication, recovery planning, and maintaining critical services during unexpected events. It helps employees understand their role in organisational resilience.', 'succeedlearn-amp' ),
			'cta'   => __( 'Submit your details and our team will support your rollout plan.', 'succeedlearn-amp' ),
		),
		array(
			'icon'  => 'AML-CFT-KYC-Compliance-Training.svg',
			'title' => __( 'AML / CFT / KYC Compliance Training', 'succeedlearn-amp' ),
			'body'  => __( 'Looking to strengthen financial crime compliance? This program explains money laundering stages, red flags, KYC procedures, suspicious transaction indicators, reporting obligations, and preventative controls. Ideal for banks, fintech, NBFCs, and regulated sectors.', 'succeedlearn-amp' ),
			'cta'   => __( 'Fill in the form for a tailored AML/CFT/KYC learning solution.', 'succeedlearn-amp' ),
		),
		array(
			'icon'  => 'Insider-Trading-Awareness.svg',
			'title' => __( 'Insider Trading Awareness', 'succeedlearn-amp' ),
			'body'  => __( 'Want employees to understand and avoid insider trading violations? This training clarifies material non-public information, trading windows, disclosure rules, prohibited conduct, and corporate responsibilities. It protects both individuals and the organisation from severe penalties.', 'succeedlearn-amp' ),
			'cta'   => __( 'Share your information for customised insider-trading compliance modules.', 'succeedlearn-amp' ),
		),
		array(
			'icon'  => 'Equal-Opportunity-DEI-Training.svg',
			'title' => __( 'Equal Opportunity & DEI Training', 'succeedlearn-amp' ),
			'body'  => __( 'Looking to build a respectful, inclusive workplace? Our DEI training covers unconscious bias, inclusive communication, equal opportunity obligations, cultural sensitivity, and intervention techniques. It strengthens employee awareness and supports healthier team dynamics.', 'succeedlearn-amp' ),
			'cta'   => __( 'Fill out the form to deploy DEI programs that shift behaviours and perspectives.', 'succeedlearn-amp' ),
		),
	);

	foreach ( $items as &$item ) {
		$item['icon'] = succeedlearn_amp_get_solutions_card_icon_url( $item['icon'] );
	}
	unset( $item );

	return $items;
}

/**
 * Context for the solutions cards partial.
 *
 * @param array<string, mixed> $overrides Optional overrides (title, description, cta_href, solutions).
 * @return array<string, mixed>
 */
function succeedlearn_amp_prepare_solutions_cards_context( $overrides = array() ) {
	$contact_url = home_url( '/contact-us/' );
	$cta_href    = function_exists( 'succeedlearn_amp_url' )
		? succeedlearn_amp_url( $contact_url )
		: $contact_url;

	$defaults = array(
		'title'       => __( 'Explore our learning solutions', 'succeedlearn-amp' ),
		'description' => __( 'From security awareness to workplace compliance—browse the programmes organisations use to train teams at scale.', 'succeedlearn-amp' ),
		'cta_href'    => $cta_href,
		'solutions'   => succeedlearn_amp_get_solutions_cards(),
	);

	return array_merge( $defaults, is_array( $overrides ) ? $overrides : array() );
}
