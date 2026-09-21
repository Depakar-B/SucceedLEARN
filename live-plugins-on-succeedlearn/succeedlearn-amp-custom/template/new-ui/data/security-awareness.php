<?php
/**
 * Security Awareness — AMP data helpers.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Include a Security Awareness section partial.
 *
 * @param string $name Partial basename without .php.
 */
function succeedlearn_amp_sa_partial( $name ) {
	$path = SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'partials/security-awareness/' . sanitize_file_name( (string) $name ) . '.php';
	if ( is_readable( $path ) ) {
		include $path;
	}
}

/**
 * @return string
 */
function succeedlearn_amp_get_sa_canonical_url() {
	$canonical = home_url( '/security-awareness/' );
	foreach ( array( 'security-awareness', 'security-awareness-and-phishing' ) as $slug ) {
		$page = get_page_by_path( $slug );
		if ( $page instanceof WP_Post && 'publish' === $page->post_status ) {
			$link = get_permalink( $page );
			if ( $link ) {
				return $link;
			}
		}
	}
	return $canonical;
}

/**
 * @return string
 */
function succeedlearn_amp_get_sa_page_title() {
	return __( 'SucceedLEARN Security Behaviour & Culture Suite', 'succeedlearn-amp' );
}

/**
 * @return string
 */
function succeedlearn_amp_get_sa_meta_description() {
	return __( 'Build a security-aware workforce with continuous awareness training, phishing simulations, microlearning, gamification, analytics and integrations in one platform.', 'succeedlearn-amp' );
}

/**
 * @return string
 */
function succeedlearn_amp_get_sa_hero_image() {
	return 'https://succeedlearn.com/wp-content/uploads/2026/09/SucceedLEARN-Security-Behaviour-Culture-Suite.webp';
}

/**
 * Security Behaviour & Culture Suite brochure PDF URL.
 *
 * @return string
 */
function succeedlearn_amp_get_sa_brochure_url() {
	return add_query_arg(
		'download',
		'Security-Behaviour-Culture-Suite-Brochure.pdf',
		home_url( '/' )
	);
}

/**
 * @return string
 */
function succeedlearn_amp_get_sa_platform_image() {
	return 'https://succeedlearn.com/wp-content/uploads/2026/09/One-Platform.-Continuous-Security-Behaviour-Change-e1789024641243.webp';
}

/**
 * @return string
 */
function succeedlearn_amp_get_sa_lifecycle_image() {
	return 'https://succeedlearn.com/wp-content/uploads/2026/09/Build-Security-Awareness-Around-the-Employee-Lifecycle.webp';
}

/**
 * @return array<int, array{0:string,1:string}>
 */
function succeedlearn_amp_get_sa_stats() {
	return array(
		array( '1000+', __( 'Organisations Trained', 'succeedlearn-amp' ) ),
		array( '90%+', __( 'Training Completion', 'succeedlearn-amp' ) ),
		array( '70%', __( 'Reduction in Phishing Risk', 'succeedlearn-amp' ) ),
		array( '87%', __( 'Phishing Resilience', 'succeedlearn-amp' ) ),
	);
}

/**
 * Client logo vars for Security Awareness AMP (12 logos + View All CTA).
 *
 * @return array{client_logos:array,uploads_base:string,show_view_all:bool,clients_page_url:string}
 */
function succeedlearn_amp_prepare_sa_clients_context() {
	require_once SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'data/clients.php';

	$context              = succeedlearn_amp_prepare_home_clients_context( 12 );
	$context['show_view_all'] = true;

	if ( empty( $context['clients_page_url'] ) ) {
		$context['clients_page_url'] = home_url( '/clients/' );
	}

	$local_dir     = WP_CONTENT_DIR . '/uploads/2026/03';
	$production    = 'https://succeedlearn.com/wp-content/uploads/2026/03';
	$logo_keys     = array_keys( $context['client_logos'] );
	$first_logo    = ! empty( $logo_keys[0] ) ? (string) $logo_keys[0] : '';
	$local_missing = ( ! is_dir( $local_dir ) ) || ( $first_logo && ! file_exists( $local_dir . '/' . $first_logo ) );

	if ( $local_missing ) {
		$context['uploads_base'] = $production;
	}

	return $context;
}

/**
 * @return array<int, array{number:string,name:string,tagline:string,title:string,subtitle:string,url:string,paras:string[],highlight:string}>
 */
function succeedlearn_amp_get_sa_suite_products() {
	return array(
		array(
			'number'    => '01',
			'name'      => 'S-Aware',
			'tagline'   => __( 'Security Awareness Training', 'succeedlearn-amp' ),
			'title'     => __( 'Build the Foundation of Security Awareness', 'succeedlearn-amp' ),
			'subtitle'  => __( 'Core Security & Privacy Learning', 'succeedlearn-amp' ),
			'url'       => home_url( '/security-awareness/s-aware/' ),
			'paras'     => array(
				__( 'Build essential cybersecurity knowledge across your workforce with a comprehensive library of security and privacy awareness courses.', 'succeedlearn-amp' ),
				__( 'S-Aware provides CPD-certified learning mapped to recognised frameworks and regulations including ISO 27001, SOC 2, GDPR, HIPAA and PCI DSS.', 'succeedlearn-amp' ),
				__( 'Organisations can assign relevant courses from a shared library, customise learning to reflect their branding and policies, and deliver training through SucceedLEARN\'s SaaS platform or their own LMS using SCORM.', 'succeedlearn-amp' ),
				__( 'S-Aware creates the foundational knowledge employees need to understand security risks, their responsibilities, and the everyday behaviours that help protect organisational information.', 'succeedlearn-amp' ),
			),
			'highlight' => __( 'Build awareness. Support compliance. Establish the foundation for secure behaviour.', 'succeedlearn-amp' ),
		),
		array(
			'number'    => '02',
			'name'      => 'S-Bytes',
			'tagline'   => __( 'Security Microlearning', 'succeedlearn-amp' ),
			'title'     => __( 'Reinforce Security Awareness with Bite-Sized Learning', 'succeedlearn-amp' ),
			'subtitle'  => __( 'Continuous Microlearning Reinforcement', 'succeedlearn-amp' ),
			'url'       => home_url( '/security-awareness/s-bytes/' ),
			'paras'     => array(
				__( 'Security awareness shouldn\'t end when employees complete their annual training.', 'succeedlearn-amp' ),
				__( 'S-Bytes delivers short, engaging microlearning experiences designed to reinforce important security behaviours throughout the year.', 'succeedlearn-amp' ),
				__( 'Bite-sized modules of approximately 3–5 minutes make cybersecurity topics easier to revisit and remember without significantly disrupting the employee\'s working day.', 'succeedlearn-amp' ),
				__( 'Covering areas such as phishing, social engineering, account security, remote working, malware and data classification, S-Bytes helps organisations turn security awareness into an ongoing conversation.', 'succeedlearn-amp' ),
				__( 'Content can be delivered through channels including email, Slack, Teams or LMS, helping bring learning closer to employees\' everyday workflows.', 'succeedlearn-amp' ),
			),
			'highlight' => __( 'Short enough to consume. Relevant enough to remember. Regular enough to build habits.', 'succeedlearn-amp' ),
		),
		array(
			'number'    => '03',
			'name'      => 'S-Phish',
			'tagline'   => __( 'Phishing Simulation', 'succeedlearn-amp' ),
			'title'     => __( 'Turn Phishing Awareness into Practical Experience', 'succeedlearn-amp' ),
			'subtitle'  => __( 'Phishing Simulation & Resilience', 'succeedlearn-amp' ),
			'url'       => home_url( '/security-awareness/s-phish-phishing-simulation/' ),
			'paras'     => array(
				__( 'Knowing how phishing works is one thing. Recognising it when it lands in your inbox is another.', 'succeedlearn-amp' ),
				__( 'S-Phish enables organisations to test employee readiness through realistic phishing simulations designed to replicate the types of threats employees may encounter in the real world.', 'succeedlearn-amp' ),
				__( 'With 150+ ready-to-use phishing email and landing-page templates, custom campaign creation, flexible scheduling and automated remedial training, organisations can continuously assess how employees respond to simulated attacks.', 'succeedlearn-amp' ),
				__( 'Track opens, clicks, reports and repeat behaviour to identify where risk exists and where additional awareness may be required.', 'succeedlearn-amp' ),
			),
			'highlight' => __( 'Test. Learn. Strengthen.', 'succeedlearn-amp' ),
		),
		array(
			'number'    => '04',
			'name'      => 'S-Play',
			'tagline'   => __( 'Gamified Awareness', 'succeedlearn-amp' ),
			'title'     => __( 'Make Security Learning More Engaging', 'succeedlearn-amp' ),
			'subtitle'  => __( 'Gamified Security Awareness', 'succeedlearn-amp' ),
			'url'       => home_url( '/security-awareness/s-play-gamified-training/' ),
			'paras'     => array(
				__( 'Security concepts become more memorable when employees actively engage with them.', 'succeedlearn-amp' ),
				__( 'S-Play transforms cybersecurity reinforcement into interactive learning experiences through games including trivia, crosswords, scenario-based challenges and unique formats.', 'succeedlearn-amp' ),
				__( 'Short, replayable activities allow employees to test their knowledge, receive real-time feedback and reinforce important concepts through participation rather than passive consumption.', 'succeedlearn-amp' ),
				__( 'By bringing an element of challenge and play into security awareness, S-Play helps organisations maintain employee interest while creating additional opportunities to revisit and strengthen security knowledge.', 'succeedlearn-amp' ),
			),
			'highlight' => __( 'Play. Practise. Reinforce. Remember.', 'succeedlearn-amp' ),
		),
		array(
			'number'    => '05',
			'name'      => 'S-Sign',
			'tagline'   => __( 'Visual Reinforcement', 'succeedlearn-amp' ),
			'title'     => __( 'Keep Security Awareness Visible', 'succeedlearn-amp' ),
			'subtitle'  => __( 'Visual Security Reinforcement', 'succeedlearn-amp' ),
			'url'       => home_url( '/security-awareness/s-signs-security-awareness/' ),
			'paras'     => array(
				__( 'Not every security intervention needs to be another course.', 'succeedlearn-amp' ),
				__( 'S-Signs keeps important cybersecurity messages visible through a library of 50+ security awareness posters covering topics such as phishing, password security, clean desk practices and other everyday security behaviours.', 'succeedlearn-amp' ),
				__( 'Designed for use across email, intranets, screensavers and physical workplaces, S-Signs enables organisations to create regular visual touchpoints between formal learning activities.', 'succeedlearn-amp' ),
				__( 'Posters can be organised into monthly or quarterly awareness campaigns and adapted to incorporate organisational branding or policy references.', 'succeedlearn-amp' ),
			),
			'highlight' => __( 'Keep security visible. Keep secure behaviour top of mind.', 'succeedlearn-amp' ),
		),
		array(
			'number'    => '06',
			'name'      => 'S-Metrics',
			'tagline'   => __( 'Analytics & Reporting', 'succeedlearn-amp' ),
			'title'     => __( 'Turn Awareness Into Actionable Insight', 'succeedlearn-amp' ),
			'subtitle'  => __( 'Unified Awareness Reporting & Analytics', 'succeedlearn-amp' ),
			'url'       => home_url( '/security-awareness/s-metrics-tracking-reporting/' ),
			'paras'     => array(
				__( 'Training completion tells you whether employees finished a course. A mature security awareness programme needs visibility beyond completion alone.', 'succeedlearn-amp' ),
				__( 'S-Metrics brings data from across the SucceedLEARN security awareness ecosystem into a central reporting and analytics dashboard.', 'succeedlearn-amp' ),
				__( 'Organisations can track course completion, phishing simulation results, microlearning engagement, game participation and other awareness indicators from one place.', 'succeedlearn-amp' ),
				__( 'Filter results across users, groups, campaigns and locations, monitor trends over time, and export reporting for audits, management reviews or presentations.', 'succeedlearn-amp' ),
				__( 'By connecting learning activity with engagement and behavioural indicators, S-Metrics helps organisations understand where awareness is working and where further reinforcement may be needed.', 'succeedlearn-amp' ),
			),
			'highlight' => __( 'Measure participation. Identify risk. Demonstrate progress.', 'succeedlearn-amp' ),
		),
		array(
			'number'    => '07',
			'name'      => 'S-Sync',
			'tagline'   => __( 'Enterprise Integrations', 'succeedlearn-amp' ),
			'title'     => __( 'Connect Security Awareness with Your Existing Ecosystem', 'succeedlearn-amp' ),
			'subtitle'  => __( 'Enterprise Integration Framework', 'succeedlearn-amp' ),
			'url'       => home_url( '/security-awareness/s-sync-security-awareness/' ),
			'paras'     => array(
				__( 'Security awareness shouldn\'t create another disconnected system for your IT and compliance teams to manage.', 'succeedlearn-amp' ),
				__( 'S-Sync is the integration layer of the SucceedLEARN Security Behaviour & Culture Suite, designed to connect awareness programmes with an organisation\'s existing technology environment.', 'succeedlearn-amp' ),
				__( 'Through capabilities including SAML 2.0 Single Sign-On, SCIM provisioning, REST APIs and SCORM deployment, S-Sync can help streamline user access, provisioning, data exchange and learning delivery.', 'succeedlearn-amp' ),
				__( 'Support for enterprise identity providers including Microsoft Entra ID, Okta, OneLogin, Google Workspace, JumpCloud and Oracle helps organisations integrate SucceedLEARN into existing workflows while reducing administrative complexity.', 'succeedlearn-amp' ),
			),
			'highlight' => __( 'Connect. Simplify. Scale.', 'succeedlearn-amp' ),
		),
	);
}

/**
 * @return array<int, array{number:string,title:string,text:string}>
 */
function succeedlearn_amp_get_sa_behaviour_steps() {
	return array(
		array(
			'number' => '01',
			'title'  => __( 'Learn', 'succeedlearn-amp' ),
			'text'   => __( 'through structured security awareness training with S-Aware.', 'succeedlearn-amp' ),
		),
		array(
			'number' => '02',
			'title'  => __( 'Reinforce', 'succeedlearn-amp' ),
			'text'   => __( 'key concepts throughout the year with S-Bytes and S-Sign.', 'succeedlearn-amp' ),
		),
		array(
			'number' => '03',
			'title'  => __( 'Practise', 'succeedlearn-amp' ),
			'text'   => __( 'responses to realistic cyber threats through S-Phish and S-Play.', 'succeedlearn-amp' ),
		),
		array(
			'number' => '04',
			'title'  => __( 'Measure', 'succeedlearn-amp' ),
			'text'   => __( 'engagement, performance and behavioural indicators through S-Metrics.', 'succeedlearn-amp' ),
		),
		array(
			'number' => '05',
			'title'  => __( 'Connect', 'succeedlearn-amp' ),
			'text'   => __( 'the programme with your broader learning and technology environment through S-Sync.', 'succeedlearn-amp' ),
		),
	);
}

/**
 * @return array<int, array{icon:string,number:string,text:string}>
 */
function succeedlearn_amp_get_sa_achieve_items() {
	return array(
		array(
			'icon'   => 'shield',
			'number' => '01',
			'text'   => __( 'Building stronger employee understanding of cybersecurity risks.', 'succeedlearn-amp' ),
		),
		array(
			'icon'   => 'mail',
			'number' => '02',
			'text'   => __( 'Improving employees\' ability to recognise and respond to phishing and social engineering attempts.', 'succeedlearn-amp' ),
		),
		array(
			'icon'   => 'refresh',
			'number' => '03',
			'text'   => __( 'Reinforcing secure behaviours throughout the year.', 'succeedlearn-amp' ),
		),
		array(
			'icon'   => 'chart',
			'number' => '04',
			'text'   => __( 'Identifying areas of potential human cyber risk through measurable data.', 'succeedlearn-amp' ),
		),
		array(
			'icon'   => 'target',
			'number' => '05',
			'text'   => __( 'Delivering targeted interventions where additional support is required.', 'succeedlearn-amp' ),
		),
		array(
			'icon'   => 'eye',
			'number' => '06',
			'text'   => __( 'Creating greater visibility for security, compliance and leadership teams.', 'succeedlearn-amp' ),
		),
		array(
			'icon'   => 'clipboard',
			'number' => '07',
			'text'   => __( 'Supporting security awareness and regulatory compliance initiatives.', 'succeedlearn-amp' ),
		),
		array(
			'icon'   => 'users',
			'number' => '08',
			'text'   => __( 'Building a culture in which employees understand their role in protecting organisational information.', 'succeedlearn-amp' ),
		),
	);
}

/**
 * @return array<int, array{title:string,text:string}>
 */
function succeedlearn_amp_get_sa_leadership_items() {
	return array(
		array(
			'title' => __( 'Information Security & Cybersecurity Teams', 'succeedlearn-amp' ),
			'text'  => __( 'Information Security & Cybersecurity Teams can run awareness initiatives, phishing simulations and targeted interventions while gaining greater visibility into human cyber risk.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Compliance & Risk Teams', 'succeedlearn-amp' ),
			'text'  => __( 'Compliance & Risk Teams can support awareness requirements with structured programmes, measurable participation and reporting.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Learning & Development Teams', 'succeedlearn-amp' ),
			'text'  => __( 'Learning & Development Teams can deliver engaging, continuous learning experiences rather than relying solely on lengthy annual courses.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'HR & People Teams', 'succeedlearn-amp' ),
			'text'  => __( 'HR & People Teams can integrate security awareness into onboarding and ongoing employee development.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Leadership Teams', 'succeedlearn-amp' ),
			'text'  => __( 'Leadership Teams can gain clearer visibility into awareness initiatives and how employee security behaviour is developing across the organisation.', 'succeedlearn-amp' ),
		),
	);
}

/**
 * @return array<int, array{number:string,title:string,text:string}>
 */
function succeedlearn_amp_get_sa_audience_items() {
	return array(
		array(
			'number' => '01',
			'title'  => __( 'New Joiners', 'succeedlearn-amp' ),
			'text'   => __( 'Establishing security awareness early helps employees understand their role in protecting organisational information from the moment they join.', 'succeedlearn-amp' ),
		),
		array(
			'number' => '02',
			'title'  => __( 'Employees Across the Organisation', 'succeedlearn-amp' ),
			'text'   => __( 'Give every employee a strong foundation in cybersecurity awareness.', 'succeedlearn-amp' ),
		),
		array(
			'number' => '03',
			'title'  => __( 'Managers & People Leaders', 'succeedlearn-amp' ),
			'text'   => __( 'Regular awareness and reinforcement can help leaders recognise risks, encourage secure practices within their teams and lead by example.', 'succeedlearn-amp' ),
		),
		array(
			'number' => '04',
			'title'  => __( 'High-Risk & Targeted Groups', 'succeedlearn-amp' ),
			'text'   => __( 'Different employee groups may face different levels and types of cyber risk. Use insights from learning and simulation activities to identify where additional awareness or reinforcement may be needed and deliver more focused interventions.', 'succeedlearn-amp' ),
		),
		array(
			'number' => '05',
			'title'  => __( 'Remote & Hybrid Workforces', 'succeedlearn-amp' ),
			'text'   => __( 'Keep security awareness consistent wherever employees work. Continuous digital learning and reinforcement can help employees remain aware of cybersecurity risks while working across offices, homes and distributed environments.', 'succeedlearn-amp' ),
		),
	);
}

/**
 * @return array<int, array{number:string,title:string,text:string}>
 */
function succeedlearn_amp_get_sa_process_items() {
	return array(
		array(
			'number' => '01',
			'title'  => __( 'One Connected Security Awareness Ecosystem', 'succeedlearn-amp' ),
			'text'   => __( 'Bring training, microlearning, phishing simulations, gamification, awareness nudges and analytics together instead of managing multiple disconnected initiatives.', 'succeedlearn-amp' ),
		),
		array(
			'number' => '02',
			'title'  => __( 'Continuous Rather Than Annual', 'succeedlearn-amp' ),
			'text'   => __( 'Create security touchpoints throughout the year so employees continue learning long after mandatory training has been completed.', 'succeedlearn-amp' ),
		),
		array(
			'number' => '03',
			'title'  => __( 'Behaviour-Focused Security Training', 'succeedlearn-amp' ),
			'text'   => __( 'Move beyond course completion and focus on helping employees recognise risks and develop stronger day-to-day security habits.', 'succeedlearn-amp' ),
		),
		array(
			'number' => '04',
			'title'  => __( 'Practical and Measurable', 'succeedlearn-amp' ),
			'text'   => __( 'Combine learning with simulations and analytics to understand engagement, identify areas requiring reinforcement and make informed programme decisions.', 'succeedlearn-amp' ),
		),
		array(
			'number' => '05',
			'title'  => __( 'Built to Scale', 'succeedlearn-amp' ),
			'text'   => __( 'Create awareness programmes that can support different employee groups, organisational requirements and security priorities as your programme evolves.', 'succeedlearn-amp' ),
		),
	);
}

/**
 * @return array<int, array{traditional:string,succeedlearn:string}>
 */
function succeedlearn_amp_get_sa_comparison_items() {
	return array(
		array(
			'traditional'  => __( 'Annual awareness training', 'succeedlearn-amp' ),
			'succeedlearn' => __( 'Continuous learning and reinforcement', 'succeedlearn-amp' ),
		),
		array(
			'traditional'  => __( 'Single learning format', 'succeedlearn-amp' ),
			'succeedlearn' => __( 'Multi-format learning ecosystem', 'succeedlearn-amp' ),
		),
		array(
			'traditional'  => __( 'Theoretical knowledge', 'succeedlearn-amp' ),
			'succeedlearn' => __( 'Learning combined with practical simulations', 'succeedlearn-amp' ),
		),
		array(
			'traditional'  => __( 'Separate phishing tools', 'succeedlearn-amp' ),
			'succeedlearn' => __( 'Integrated phishing simulations', 'succeedlearn-amp' ),
		),
		array(
			'traditional'  => __( 'Generic communication', 'succeedlearn-amp' ),
			'succeedlearn' => __( 'Targeted awareness interventions', 'succeedlearn-amp' ),
		),
		array(
			'traditional'  => __( 'Completion-focused reporting', 'succeedlearn-amp' ),
			'succeedlearn' => __( 'Behavioural and engagement insights', 'succeedlearn-amp' ),
		),
		array(
			'traditional'  => __( 'Passive employee participation', 'succeedlearn-amp' ),
			'succeedlearn' => __( 'Interactive and gamified experiences', 'succeedlearn-amp' ),
		),
	);
}

/**
 * Static programme activity values for AMP (no JS chart builder).
 *
 * @return array<int, int>
 */
function succeedlearn_amp_get_sa_activity_values() {
	return array( 62, 68, 71, 76, 73, 82, 79, 86, 84, 91, 88, 94 );
}

/**
 * Security Behaviour & Culture Suite FAQ items.
 *
 * @return array<int, array{question:string,answer:string}>
 */
function succeedlearn_amp_get_sa_faq_items() {
	return array(
		array(
			'question' => __( 'What is the SucceedLEARN Security Behaviour & Culture Suite?', 'succeedlearn-amp' ),
			'answer'   => '<p>' . esc_html__( 'The SucceedLEARN Security Behaviour & Culture Suite (SBCS) is an integrated security awareness ecosystem designed to help organisations strengthen employee cybersecurity knowledge, behaviour and resilience.', 'succeedlearn-amp' ) . '</p>'
				. '<p>' . esc_html__( 'The suite combines security awareness training, microlearning, phishing simulations, gamified learning, visual reinforcement, analytics and integrations to create a continuous security awareness programme rather than relying solely on periodic training.', 'succeedlearn-amp' ) . '</p>',
		),
		array(
			'question' => __( 'What solutions are included in the Security Behaviour & Culture Suite?', 'succeedlearn-amp' ),
			'answer'   => '<p>' . esc_html__( 'The SucceedLEARN Security Behaviour & Culture Suite brings together seven interconnected solutions:', 'succeedlearn-amp' ) . '</p>'
				. '<ul>'
				. '<li><strong>S-Aware:</strong> ' . esc_html__( 'Foundational security and privacy awareness training.', 'succeedlearn-amp' ) . '</li>'
				. '<li><strong>S-Bytes:</strong> ' . esc_html__( 'Bite-sized microlearning for continuous reinforcement.', 'succeedlearn-amp' ) . '</li>'
				. '<li><strong>S-Phish:</strong> ' . esc_html__( 'Realistic phishing simulations to test employee readiness.', 'succeedlearn-amp' ) . '</li>'
				. '<li><strong>S-Play:</strong> ' . esc_html__( 'Gamified security learning and engagement.', 'succeedlearn-amp' ) . '</li>'
				. '<li><strong>S-Signs:</strong> ' . esc_html__( 'Visual security awareness reinforcement and nudges.', 'succeedlearn-amp' ) . '</li>'
				. '<li><strong>S-Metrics:</strong> ' . esc_html__( 'Reporting and analytics for measuring programme performance.', 'succeedlearn-amp' ) . '</li>'
				. '<li><strong>S-Sync:</strong> ' . esc_html__( "Integrations that connect security awareness with the organisation's wider technology and learning ecosystem.", 'succeedlearn-amp' ) . '</li>'
				. '</ul>'
				. '<p>' . esc_html__( 'Together, these solutions help organisations learn, reinforce, test, engage, remind, measure and connect their security awareness activities.', 'succeedlearn-amp' ) . '</p>',
		),
		array(
			'question' => __( 'How is the SBCS approach different from traditional security awareness training?', 'succeedlearn-amp' ),
			'answer'   => '<p>' . esc_html__( 'Traditional security awareness programmes often centre around annual training and course completion. While foundational training remains important, employee security behaviour needs to be reinforced throughout the year.', 'succeedlearn-amp' ) . '</p>'
				. '<p>' . esc_html__( 'SBCS combines multiple awareness interventions, including training, microlearning, phishing simulations, gamification and visual reinforcement, with measurement and analytics.', 'succeedlearn-amp' ) . '</p>'
				. '<p>' . esc_html__( 'This enables organisations to move from a periodic "train and complete" approach towards a continuous cycle of learning, practice, reinforcement and measurement.', 'succeedlearn-amp' ) . '</p>',
		),
		array(
			'question' => __( 'Why is continuous security awareness important?', 'succeedlearn-amp' ),
			'answer'   => '<p>' . esc_html__( 'Cyber threats continue to evolve, while employees make security-related decisions throughout their everyday work.', 'succeedlearn-amp' ) . '</p>'
				. '<p>' . esc_html__( 'A single annual training session may build initial awareness, but knowledge can fade over time. Continuous security awareness creates regular opportunities to revisit important concepts, practise recognising threats and reinforce secure behaviours.', 'succeedlearn-amp' ) . '</p>'
				. '<p>' . esc_html__( 'By maintaining regular security touchpoints throughout the year, organisations can help keep cybersecurity visible and relevant rather than treating it as a once-a-year compliance activity.', 'succeedlearn-amp' ) . '</p>',
		),
		array(
			'question' => __( 'Can organisations use individual S-Series solutions without implementing the entire suite?', 'succeedlearn-amp' ),
			'answer'   => '<p>' . esc_html__( 'Yes. Organisations can select individual S-Series solutions based on their security awareness requirements and programme objectives.', 'succeedlearn-amp' ) . '</p>'
				. '<p>' . esc_html__( 'For example, an organisation may begin with S-Aware for foundational awareness training or S-Phish for phishing simulations and later introduce additional solutions for microlearning, gamification and visual reinforcements.', 'succeedlearn-amp' ) . '</p>'
				. '<p>' . esc_html__( 'The solutions are designed to work together as part of the wider SBCS ecosystem, allowing organisations to develop their security awareness programme over time.', 'succeedlearn-amp' ) . '</p>',
		),
		array(
			'question' => __( 'What cybersecurity topics can employees learn about through SucceedLEARN?', 'succeedlearn-amp' ),
			'answer'   => '<p>' . esc_html__( 'The SucceedLEARN security awareness ecosystem can address a range of security, privacy and cyber-risk topics depending on the selected courses and awareness programme.', 'succeedlearn-amp' ) . '</p>'
				. '<p>' . esc_html__( 'These can include areas such as information security, phishing and social engineering, password and account security, data protection and privacy, secure remote working, malware and cyber threats, responsible use of technology, responsible use of AI, information handling and incident identification and reporting.', 'succeedlearn-amp' ) . '</p>'
				. '<p>' . esc_html__( 'Organisations can structure their awareness initiatives around relevant workforce risks, security priorities and programme requirements.', 'succeedlearn-amp' ) . '</p>',
		),
		array(
			'question' => __( 'Can the security awareness programme be customised for our organisation?', 'succeedlearn-amp' ),
			'answer'   => '<p>' . esc_html__( 'Customisation can be supported depending on the selected S-Series solution, content and agreed scope.', 'succeedlearn-amp' ) . '</p>'
				. '<p>' . esc_html__( 'This may include elements such as organisational branding, internal policies and procedures, organisation-specific terminology, reporting mechanisms, examples and other relevant internal requirements.', 'succeedlearn-amp' ) . '</p>',
		),
		array(
			'question' => __( 'Can SucceedLEARN support our security and compliance objectives?', 'succeedlearn-amp' ),
			'answer'   => '<p>' . esc_html__( 'Security awareness is an important component of many cybersecurity, information security, privacy and compliance programmes.', 'succeedlearn-amp' ) . '</p>'
				. '<p>' . esc_html__( 'SucceedLEARN can help organisations deliver structured awareness initiatives, track participation and learning activity, conduct practical simulations, and maintain reporting that can support internal governance, audits and relevant compliance objectives.', 'succeedlearn-amp' ) . '</p>'
				. '<p>' . esc_html__( "The specific training and programme requirements should be determined based on the organisation's applicable regulatory, contractual and security obligations.", 'succeedlearn-amp' ) . '</p>',
		),
		array(
			'question' => __( "Can security awareness training be delivered through the client's existing LMS?", 'succeedlearn-amp' ),
			'answer'   => '<p>' . esc_html__( "Depending on the selected SucceedLEARN solution and deployment model, security awareness content can be delivered through SucceedLEARN's learning environment or through an organisation's existing Learning Management System using compatible content formats such as SCORM.", 'succeedlearn-amp' ) . '</p>'
				. '<p>' . esc_html__( 'This gives organisations flexibility to incorporate security awareness into their existing learning infrastructure while also having the option of using the wider SucceedLEARN ecosystem.', 'succeedlearn-amp' ) . '</p>',
		),
		array(
			'question' => __( 'How can organisations measure the effectiveness of their security awareness programme?', 'succeedlearn-amp' ),
			'answer'   => '<p>' . esc_html__( 'Security awareness effectiveness should be evaluated using more than course completion alone.', 'succeedlearn-amp' ) . '</p>'
				. '<p>' . esc_html__( 'Across the SBCS ecosystem, organisations can gain visibility into indicators such as learning participation, assessment performance, phishing simulation behaviour, reporting behaviour, remedial learning and other engagement measures depending on the solutions deployed.', 'succeedlearn-amp' ) . '</p>'
				. '<p>' . esc_html__( 'S-Metrics provides the measurement layer of the suite, helping bring relevant awareness and behavioural information together to provide greater visibility into programme performance and areas where additional reinforcement may be required.', 'succeedlearn-amp' ) . '</p>',
		),
		array(
			'question' => __( 'Who is the SucceedLEARN Security Behaviour & Culture Suite designed for?', 'succeedlearn-amp' ),
			'answer'   => '<p>' . esc_html__( 'SBCS is designed for organisations seeking to build stronger cybersecurity awareness and security behaviours across their workforce.', 'succeedlearn-amp' ) . '</p>'
				. '<p>' . esc_html__( "Employees across roles and departments can participate in awareness and reinforcement activities, while teams including Information Security, Cybersecurity, Compliance, Risk, Learning & Development, HR and People functions can use the suite to support and manage different aspects of the organisation's security awareness programme.", 'succeedlearn-amp' ) . '</p>'
				. '<p>' . esc_html__( 'This enables security awareness to become a shared organisational initiative rather than the responsibility of a single function.', 'succeedlearn-amp' ) . '</p>',
		),
		array(
			'question' => __( 'How do the S-Series solutions work together to support behaviour change?', 'succeedlearn-amp' ),
			'answer'   => '<p>' . esc_html__( 'Each S-Series solution addresses a different part of the security behaviour journey.', 'succeedlearn-amp' ) . '</p>'
				. '<ul>'
				. '<li><strong>S-Aware</strong> ' . esc_html__( 'helps employees learn.', 'succeedlearn-amp' ) . '</li>'
				. '<li><strong>S-Bytes</strong> ' . esc_html__( 'reinforces knowledge.', 'succeedlearn-amp' ) . '</li>'
				. '<li><strong>S-Phish</strong> ' . esc_html__( 'puts awareness to the test.', 'succeedlearn-amp' ) . '</li>'
				. '<li><strong>S-Play</strong> ' . esc_html__( 'creates engagement through gamified learning.', 'succeedlearn-amp' ) . '</li>'
				. '<li><strong>S-Signs</strong> ' . esc_html__( 'keeps security visible.', 'succeedlearn-amp' ) . '</li>'
				. '<li><strong>S-Metrics</strong> ' . esc_html__( 'measures programme performance.', 'succeedlearn-amp' ) . '</li>'
				. '<li><strong>S-Sync</strong> ' . esc_html__( 'connects the ecosystem.', 'succeedlearn-amp' ) . '</li>'
				. '</ul>'
				. '<p>' . esc_html__( 'Together, they create a continuous cycle in which employees can learn, practise, receive reinforcement and improve, while organisations gain greater visibility into their security awareness programme.', 'succeedlearn-amp' ) . '</p>'
				. '<p>' . esc_html__( 'This helps move security awareness beyond isolated training activities towards a broader culture of continuous security learning and behaviour change.', 'succeedlearn-amp' ) . '</p>',
		),
	);
}

/**
 * FAQPage JSON-LD for the Security Awareness AMP page.
 *
 * @return array<string, mixed>
 */
function succeedlearn_amp_sa_faq_schema() {
	$entities = array();
	foreach ( succeedlearn_amp_get_sa_faq_items() as $item ) {
		$entities[] = array(
			'@type'          => 'Question',
			'name'           => $item['question'],
			'acceptedAnswer' => array(
				'@type' => 'Answer',
				'text'  => wp_strip_all_tags( $item['answer'] ),
			),
		);
	}

	return array(
		'@context'   => 'https://schema.org',
		'@type'      => 'FAQPage',
		'mainEntity' => $entities,
	);
}
