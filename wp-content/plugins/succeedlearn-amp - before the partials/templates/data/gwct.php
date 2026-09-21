<?php
/**
 * Global Workplace Compliance Training — AMP data helpers.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Include a GWCT section partial.
 *
 * @param string $name Partial basename without .php.
 */
function succeedlearn_amp_gwct_partial( $name ) {
	$path = SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'partials/gwct/' . sanitize_file_name( (string) $name ) . '.php';
	if ( is_readable( $path ) ) {
		include $path;
	}
}

/**
 * @return string
 */
function succeedlearn_amp_get_gwct_canonical_url() {
	$canonical = home_url( '/global-workplace-compliance-training-for-employees/' );
	foreach ( array( 'global-workplace-compliance-training-for-employees', 'global-workplace-compliance-training', 'global-workplace-compliance' ) as $slug ) {
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
function succeedlearn_amp_get_gwct_hero_image() {
	$uploads   = content_url( '/uploads' );
	$hero_img  = $uploads . '/2026/08/Collaborative-Compliance-Learning.png';
	$local_img = WP_CONTENT_DIR . '/uploads/2026/08/Collaborative-Compliance-Learning.png';
	if ( ! file_exists( $local_img ) ) {
		$hero_img = 'https://succeedlearn.com/wp-content/uploads/2026/08/Collaborative-Compliance-Learning.png';
	}
	return $hero_img;
}

/**
 * @return string
 */
function succeedlearn_amp_get_gwct_page_title() {
	return __( 'Global Workplace Compliance Training for Employees', 'succeedlearn-amp' );
}

/**
 * @return string
 */
function succeedlearn_amp_get_gwct_meta_description() {
	return __( 'Build workplaces where people and performance thrive with engaging, scenario-based global workplace compliance training for employees.', 'succeedlearn-amp' );
}

/**
 * @return array<int, array{title:string,meta:string,done:bool}>
 */
function succeedlearn_amp_get_gwct_behaviour_modules() {
	return array(
		array(
			'title' => __( 'Respectful Workplace Culture', 'succeedlearn-amp' ),
			'meta'  => __( '92% completed', 'succeedlearn-amp' ),
			'done'  => true,
		),
		array(
			'title' => __( 'Ethics & Code of Conduct', 'succeedlearn-amp' ),
			'meta'  => __( '88% completed', 'succeedlearn-amp' ),
			'done'  => true,
		),
		array(
			'title' => __( 'Inclusive Communication', 'succeedlearn-amp' ),
			'meta'  => __( 'In progress', 'succeedlearn-amp' ),
			'done'  => false,
		),
		array(
			'title' => __( 'Applied Behaviour Change', 'succeedlearn-amp' ),
			'meta'  => __( 'Scenario-based', 'succeedlearn-amp' ),
			'done'  => true,
		),
	);
}

/**
 * @return array<int, array<string, mixed>>
 */
function succeedlearn_amp_get_gwct_solutions() {
	return array(
		array(
			'id'       => 'inclusive-workplace-training',
			'title'    => __( 'Inclusive Workplace Training', 'succeedlearn-amp' ),
			'subtitle' => __( 'Create workplaces where everyone can contribute, collaborate, and belong.', 'succeedlearn-amp' ),
			'intro'    => __( 'Inclusive workplaces are built through everyday actions that encourage respect, reduce bias, and create a sense of belonging.', 'succeedlearn-amp' ),
			'body'     => __( 'Our Inclusive Workplace learning solutions help employees and leaders recognise unconscious bias, build inclusive behaviours, strengthen collaboration, and develop the confidence to support colleagues through positive everyday interactions.', 'succeedlearn-amp' ),
			'courses'  => array(
				__( 'Diversity, Equality, Inclusion and Belonging [DEIB]', 'succeedlearn-amp' ),
				__( 'Unconscious Bias Training', 'succeedlearn-amp' ),
				__( 'Bystander Intervention Training', 'succeedlearn-amp' ),
			),
			'outcomes' => array(
				__( 'Build awareness of diverse perspectives.', 'succeedlearn-amp' ),
				__( 'Recognise and reduce unconscious bias.', 'succeedlearn-amp' ),
				__( 'Strengthen inclusive leadership behaviours.', 'succeedlearn-amp' ),
				__( 'Foster psychological safety and belonging.', 'succeedlearn-amp' ),
			),
		),
		array(
			'id'         => 'workplace-harassment-prevention-training',
			'title'      => __( 'Workplace Harassment Prevention Training', 'succeedlearn-amp' ),
			'subtitle'   => __( 'Create respectful workplaces built on dignity, accountability, and trust.', 'succeedlearn-amp' ),
			'intro'      => __( 'Respect is the foundation of every successful workplace.', 'succeedlearn-amp' ),
			'body'       => __( 'Our workplace conduct training helps organisations prevent workplace harassment, promote respectful behaviour, and ensure employees understand their responsibilities.', 'succeedlearn-amp' ),
			'body_extra' => __( 'Designed to support regional compliance requirements while building a positive workplace culture.', 'succeedlearn-amp' ),
			'courses'    => array(
				__( 'Sexual Harassment Prevention Training (United States)', 'succeedlearn-amp' ),
				__( 'Prevention of Workplace Harassment Training (United Kingdom)', 'succeedlearn-amp' ),
			),
			'outcomes'   => array(
				__( 'Prevent workplace harassment.', 'succeedlearn-amp' ),
				__( 'Understand employee and manager responsibilities.', 'succeedlearn-amp' ),
				__( 'Respond appropriately to workplace concerns.', 'succeedlearn-amp' ),
				__( 'Promote respectful workplace behaviours.', 'succeedlearn-amp' ),
				__( 'Strengthen workplace accountability.', 'succeedlearn-amp' ),
			),
		),
		array(
			'id'         => 'responsible-use-of-generative-ai-training',
			'title'      => __( 'Responsible Use of Generative AI Training', 'succeedlearn-amp' ),
			'subtitle'   => __( 'Empower employees to use Artificial Intelligence responsibly and ethically.', 'succeedlearn-amp' ),
			'intro'      => __( 'Artificial Intelligence is transforming how organisations work, but responsible AI adoption requires informed human decisions.', 'succeedlearn-amp' ),
			'body'       => __( 'Our Responsible Use of AI training helps employees understand AI ethics, recognise bias, protect confidential information, and use generative AI responsibly in everyday work.', 'succeedlearn-amp' ),
			'body_extra' => __( 'Responsible technology begins with responsible people.', 'succeedlearn-amp' ),
			'courses'    => array(
				__( 'Responsible Use of Generative AI', 'succeedlearn-amp' ),
			),
			'outcomes'   => array(
				__( 'Understand responsible AI principles.', 'succeedlearn-amp' ),
				__( 'Recognise AI bias and limitations.', 'succeedlearn-amp' ),
				__( 'Protect privacy and confidential information.', 'succeedlearn-amp' ),
				__( 'Use AI confidently and ethically.', 'succeedlearn-amp' ),
				__( 'Apply responsible AI practices at work.', 'succeedlearn-amp' ),
			),
		),
	);
}

/**
 * @return array<int, array{title:string,text:string}>
 */
function succeedlearn_amp_get_gwct_why_choose_cards() {
	return array(
		array(
			'title' => __( 'Scenario-Based Learning', 'succeedlearn-amp' ),
			'text'  => __( 'Learners practise making decisions in realistic workplace situations that reflect everyday challenges.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Globally Relevant Content', 'succeedlearn-amp' ),
			'text'  => __( 'Learning experiences designed for international workforces across industries and cultures.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Behaviour-Focused Learning', 'succeedlearn-amp' ),
			'text'  => __( 'Training that encourages lasting behaviour change rather than short-term knowledge retention.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Interactive Learning Experience', 'succeedlearn-amp' ),
			'text'  => __( 'Videos, branching scenarios, reflection activities, and knowledge checks improve engagement and learning outcomes.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Accessible Learning Design', 'succeedlearn-amp' ),
			'text'  => __( 'Built using accessibility and inclusive learning principles to support diverse learners.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'LMS Compatible', 'succeedlearn-amp' ),
			'text'  => __( 'Seamlessly integrates with leading Learning Management Systems and enterprise learning platforms.', 'succeedlearn-amp' ),
		),
	);
}

/**
 * @return array<int, array{highlight:string,text:string,value:string}>
 */
function succeedlearn_amp_get_gwct_impact_themes() {
	return array(
		array(
			'highlight' => __( 'Every interaction', 'succeedlearn-amp' ),
			'text'      => __( 'shapes workplace culture.', 'succeedlearn-amp' ),
			'value'     => '96%',
		),
		array(
			'highlight' => __( 'Every decision', 'succeedlearn-amp' ),
			'text'      => __( 'builds trust.', 'succeedlearn-amp' ),
			'value'     => '93%',
		),
		array(
			'highlight' => __( 'Every conversation', 'succeedlearn-amp' ),
			'text'      => __( 'creates opportunities for inclusion.', 'succeedlearn-amp' ),
			'value'     => '91%',
		),
	);
}

/**
 * @return array<int, array{question:string,answer:string}>
 */
function succeedlearn_amp_get_gwct_faq_items() {
	return array(
		array(
			'question' => __( 'Who should take these courses?', 'succeedlearn-amp' ),
			'answer'   => __( 'The courses are suitable for employees, managers, supervisors, and leaders. Specific modules can be assigned based on role, location, and applicable compliance requirements.', 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'Can the training be customised for our organisation?', 'succeedlearn-amp' ),
			'answer'   => __( 'Yes. Course content, branding, policies, scenarios, assessments, and supporting resources can be tailored to your organisation’s requirements.', 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'Is the training suitable for a global workforce?', 'succeedlearn-amp' ),
			'answer'   => __( 'Yes. Organisations can create learning pathways based on each employee’s country, role, and responsibilities, helping deliver relevant training across a global workforce. We have a Global module which can be delivered to employees in multiple countries.', 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'How are the courses delivered?', 'succeedlearn-amp' ),
			'answer'   => __( 'The modules are delivered online and can be accessed through SucceedLEARN or, subject to technical compatibility, deployed through your organisation’s learning management system.', 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'Can we track employee completion and assessment scores?', 'succeedlearn-amp' ),
			'answer'   => __( 'Yes. Administrators can monitor enrolment, course progress, completion status, and assessment scores to support internal compliance reporting.', 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'How long does each module take to complete?', 'succeedlearn-amp' ),
			'answer'   => __( 'Completion time varies by topic and course version. Each course page provides the expected duration, intended audience, and learning objectives.', 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'How often is the course content reviewed?', 'succeedlearn-amp' ),
			'answer'   => __( 'The content is periodically reviewed to maintain relevance. Organisations should also ensure that training is supported by current internal policies and jurisdiction-specific legal advice.', 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'How can we request a demo or discuss our requirements?', 'succeedlearn-amp' ),
			'answer'   => __( 'Contact the SucceedLEARN team through the enquiry form to request a demonstration, explore relevant modules, and discuss customisation, deployment, and pricing.', 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'Does the training include assessments or knowledge checks?', 'succeedlearn-amp' ),
			'answer'   => __( 'Yes. Modules can include quizzes, scenario-based questions, and assessments to reinforce learning and measure understanding.', 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'Will employees receive a certificate after completing a course?', 'succeedlearn-amp' ),
			'answer'   => __( 'Certificates of completion can be provided for eligible modules, helping organisations maintain training records and demonstrate participation.', 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'Can the courses incorporate our workplace policies?', 'succeedlearn-amp' ),
			'answer'   => __( 'Yes. Relevant internal policies, reporting procedures, escalation routes, leadership messages, and contact information can be incorporated into the learning experience.', 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'Are the modules accessible on mobile devices?', 'succeedlearn-amp' ),
			'answer'   => __( 'The online modules are designed for flexible learning and can be accessed on compatible desktops, tablets, and mobile devices.', 'succeedlearn-amp' ),
		),
	);
}

/**
 * @return array<int, array{quote:string,name:string,role:string,note?:string}>
 */
function succeedlearn_amp_get_gwct_testimonials() {
	if ( function_exists( 'akaza_get_client_testimonials' ) ) {
		return akaza_get_client_testimonials();
	}

	return array(
		array(
			'quote' => 'The learning portal in Minda branding and integrated with our HRIS portal has made learner access seamless. I have recommended eLearnPOSH to my professional contacts.',
			'note'  => 'eLearnPOSH is a Product of SucceedLEARN. eLearnPOSH is for the POSH Compliance in India while SucceedLEARN is for Global Compliance.',
			'name'  => 'Mr. Sachchidanand Pande',
			'role'  => 'Group PR Head, UNO Minda Group',
		),
		array(
			'quote' => 'Succeed helped us make sure all of our workforce were trained and awareness was spread so effectively within a very short time. Your response to every email sent out by our employees was super quick and solution-oriented.',
			'name'  => 'Mr. Girisha Krishnappa',
			'role'  => 'People and Culture, AirAsia',
		),
		array(
			'quote' => 'An easy to use interface. The clarity and simplicity helps to navigate easily. The technical team is equally very good, their responses on queries are very prompt and they provide timely solutions.',
			'name'  => 'Ms. Gayatri Mishra',
			'role'  => 'L&D Specialist, Tata Smartfoodz Ltd',
		),
	);
}

/**
 * Prepare client logo vars used by the clients partial.
 */
function succeedlearn_amp_prepare_gwct_clients_context() {
	require_once SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'data/clients.php';

	$client_logos     = succeedlearn_amp_get_home_client_logos( 12 );
	$uploads_base     = content_url( '/uploads/2026/03' );
	$show_view_all    = false;
	$clients_page_url = home_url( '/clients/' );

	if ( class_exists( '\\SucceedLEARN\\AMP\\Plugin' ) ) {
		$config = \SucceedLEARN\AMP\Plugin::get_instance()->get_config();
		if ( $config && method_exists( $config, 'has_clients_page' ) && $config->has_clients_page() ) {
			$show_view_all    = true;
			$clients_page_url = $config->get_clients_url();
			if ( function_exists( 'succeedlearn_amp_url' ) ) {
				$clients_page_url = succeedlearn_amp_url( $clients_page_url );
			}
		}
	}

	return compact( 'client_logos', 'uploads_base', 'show_view_all', 'clients_page_url' );
}
