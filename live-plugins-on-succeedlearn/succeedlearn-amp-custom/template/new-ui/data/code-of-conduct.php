<?php
/**
 * Code of Conduct — AMP data helpers.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Include a Code of Conduct section partial.
 *
 * @param string $name Partial basename without .php.
 */
function succeedlearn_amp_coc_partial( $name ) {
	$path = SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'partials/code-of-conduct/' . sanitize_file_name( (string) $name ) . '.php';
	if ( is_readable( $path ) ) {
		include $path;
	}
}

/**
 * @return string
 */
function succeedlearn_amp_get_coc_canonical_url() {
	$canonical = home_url( '/code-of-conduct/' );
	foreach ( array( 'code-of-conduct' ) as $slug ) {
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
function succeedlearn_amp_get_coc_page_title() {
	return __( 'Code of Conduct', 'succeedlearn-amp' );
}

/**
 * @return string
 */
function succeedlearn_amp_get_coc_meta_description() {
	return '';
}

/**
 * Return the Code of Conduct feature cards.
 *
 * @return array
 */
function succeedlearn_amp_get_coc_features() {
	return array(
		array(
			'icon'  => 'scenario',
			'label' => __(
				'Scenario-Based Learning',
				'succeedlearn-amp'
			),
		),
		array(
			'icon'  => 'customizable',
			'label' => __(
				'Customizable',
				'succeedlearn-amp'
			),
		),
		array(
			'icon'  => 'scorm',
			'label' => __(
				'SCORM Compatible',
				'succeedlearn-amp'
			),
		),
		array(
			'icon'  => 'branding',
			'label' => __(
				'Branding',
				'succeedlearn-amp'
			),
		),
		array(
			'icon'  => 'certificate',
			'label' => __(
				'Certificates',
				'succeedlearn-amp'
			),
		),
		array(
			'icon'  => 'assessment',
			'label' => __(
				'Assessments',
				'succeedlearn-amp'
			),
		),
		array(
			'icon'  => 'responsive',
			'label' => __(
				'Mobile Responsive',
				'succeedlearn-amp'
			),
		),
		array(
			'icon'  => 'reporting',
			'label' => __(
				'Reporting',
				'succeedlearn-amp'
			),
		),
	);
}

/**
 * Return the Code of Conduct definition section data.
 *
 * @return array
 */
function succeedlearn_amp_get_coc_definition_data() {
	return array(
		'eyebrow'      => __(
			'Understanding the foundation',
			'succeedlearn-amp'
		),
		'title'        => __(
			'What Is',
			'succeedlearn-amp'
		),
		'title_accent' => __(
			'Code of Conduct Training?',
			'succeedlearn-amp'
		),
		'lead_accent'  => __(
			'Code of Conduct training',
			'succeedlearn-amp'
		),
		'lead_text'    => __(
			'helps employees understand the ethical standards, workplace behaviours and compliance responsibilities expected by their organization.',
			'succeedlearn-amp'
		),
		'image'        => array(
			'url'    => content_url(
				'/uploads/2026/08/What-Is-Code-of-Conduct.webp'
			),
			'alt'    => __(
				'Team collaborating on Code of Conduct training in a modern workplace',
				'succeedlearn-amp'
			),
			'width'  => 640,
			'height' => 800,
		),
		'introduction' => array(
			'title' => __(
				'From policy to practical workplace behaviour',
				'succeedlearn-amp'
			),
			'text'  => __(
				'Effective training goes beyond asking employees to read or acknowledge a policy. It helps them understand how the Code applies when real workplace situations arise.',
				'succeedlearn-amp'
			),
		),
		'flow_steps'   => array(
			array(
				'title' => __(
					'Understand the Code',
					'succeedlearn-amp'
				),
				'text'  => __(
					'Know the ethical standards and responsibilities.',
					'succeedlearn-amp'
				),
			),
			array(
				'title' => __(
					'Apply It',
					'succeedlearn-amp'
				),
				'text'  => __(
					'Think through real workplace situations.',
					'succeedlearn-amp'
				),
			),
			array(
				'title' => __(
					'Decide Better',
					'succeedlearn-amp'
				),
				'text'  => __(
					'Recognise risks and make responsible decisions.',
					'succeedlearn-amp'
				),
			),
		),
		'topics_intro' => __(
			'Practical scenarios include:',
			'succeedlearn-amp'
		),
		'topics'       => array(
			__( 'Conflicts of Interest', 'succeedlearn-amp' ),
			__( 'Gifts and Hospitality', 'succeedlearn-amp' ),
			__( 'Data Privacy', 'succeedlearn-amp' ),
			__( 'Anti-Bribery', 'succeedlearn-amp' ),
			__( 'Social Media', 'succeedlearn-amp' ),
			__( 'Confidential Information', 'succeedlearn-amp' ),
			__( 'Suspected Misconduct', 'succeedlearn-amp' ),
			__( 'Workplace Behaviour', 'succeedlearn-amp' ),
		),
	);
}
/**
 * Return the Code of Conduct "Why It Matters" section data.
 *
 * @return array
 */
function succeedlearn_amp_get_coc_matters_data() {
	return array(
		'eyebrow'      => __(
			'Why It Matters',
			'succeedlearn-amp'
		),
		'title'        => __(
			'Why Code of Conduct Training',
			'succeedlearn-amp'
		),
		'title_accent' => __(
			'Matters',
			'succeedlearn-amp'
		),
		'lead'         => __(
			'Employees make decisions every day that can affect colleagues, customers, business partners and the reputation of the organization.',
			'succeedlearn-amp'
		),
		'image'        => array(
			'url'    => content_url(
				'/uploads/2026/09/Why-Code-of-Conduct-Training-Matters-clean.webp'
			),
			'alt'    => __(
				'Code of Conduct training illustration showing workplace ethics, inclusion and reporting concerns',
				'succeedlearn-amp'
			),
			'width'  => 1200,
			'height' => 640,
		),
		'list_intro'   => __(
			'Some decisions are obvious. Others are not.',
			'succeedlearn-amp'
		),
		'scenarios'    => array(
			__(
				'Should an employee accept a gift from a supplier?',
				'succeedlearn-amp'
			),
			__(
				'What happens when a close relative applies for a position?',
				'succeedlearn-amp'
			),
			__(
				'Can confidential company information be entered into a public AI tool?',
				'succeedlearn-amp'
			),
			__(
				'Should an employee respond to a customer complaint on social media?',
				'succeedlearn-amp'
			),
			__(
				'What should someone do when they suspect misconduct but are not certain?',
				'succeedlearn-amp'
			),
		),
		'highlight'    => array(
			'eyebrow' => __(
				'Practical Decision-Making',
				'succeedlearn-amp'
			),
			'title'   => __(
				'The Policy-Practice Gap',
				'succeedlearn-amp'
			),
			'text'    => __(
				'The challenge is often not the absence of a policy. It is the gap between knowing what the policy says and applying it when real workplace situations arise.',
				'succeedlearn-amp'
			),
			'lead'    => __(
				'Employees need practical guidance, not just policy documents.',
				'succeedlearn-amp'
			),
		),
	);
}

/**
 * Return the Code of Conduct business problem section data.
 *
 * @return array
 */
function succeedlearn_amp_get_coc_problem_data() {
	return array(
		'eyebrow'      => __(
			'Business Problem',
			'succeedlearn-amp'
		),
		'title'        => __(
			'What Happens When Employees',
			'succeedlearn-amp'
		),
		'title_accent' => __(
			'Don’t Understand the Code?',
			'succeedlearn-amp'
		),
		'intro'        => __(
			'Organisations may have comprehensive policies and still experience compliance failures.',
			'succeedlearn-amp'
		),
		'cards'        => array(
			array(
				'title' => __(
					'Policy Without Understanding',
					'succeedlearn-amp'
				),
				'text'  => __(
					'Employees may acknowledge policies without fully understanding what they mean in everyday situations.',
					'succeedlearn-amp'
				),
			),
			array(
				'title' => __(
					'Low Engagement',
					'succeedlearn-amp'
				),
				'text'  => __(
					'Long, information-heavy compliance courses can encourage employees to complete training rather than genuinely learn from it.',
					'succeedlearn-amp'
				),
			),
			array(
				'title' => __(
					'Inconsistent Decisions',
					'succeedlearn-amp'
				),
				'text'  => __(
					'Without practical examples, employees may interpret the same ethical situation differently.',
					'succeedlearn-amp'
				),
			),
			array(
				'title' => __(
					'Delayed Reporting',
					'succeedlearn-amp'
				),
				'text'  => __(
					'Employees who do not understand reporting procedures may hesitate to raise concerns.',
					'succeedlearn-amp'
				),
			),
			array(
				'title' => __(
					'Limited Compliance Visibility',
					'succeedlearn-amp'
				),
				'text'  => __(
					'Organisations need evidence of training completion, assessment performance and policy acknowledgement to support governance and audit requirements.',
					'succeedlearn-amp'
				),
			),
		),
		'closing'      => array(
			'text'       => __(
				'A policy cannot anticipate every situation. Effective training helps employees develop the judgement required to apply organisational values when situations are unclear.',
				'succeedlearn-amp'
			),
			'button'     => __(
				'Explore Code of Conduct Training',
				'succeedlearn-amp'
			),
			'target'     => 'contact',
			'data_cta'   => 'coc-problem-demo',
		),
	);
}

/**
 * Return the Code of Conduct course coverage data.
 *
 * @return array
 */
function succeedlearn_amp_get_coc_coverage_data() {
	return array(
		'eyebrow'      => __(
			'Course Coverage',
			'succeedlearn-amp'
		),
		'title'        => __(
			'What Should Your',
			'succeedlearn-amp'
		),
		'title_accent' => __(
			'Code of Conduct Training Cover?',
			'succeedlearn-amp'
		),
		'intro'        => __(
			'The course can be configured around your organisation’s Code of Conduct, policies, industry and employee requirements.',
			'succeedlearn-amp'
		),
		'items'        => array(
			array(
				'title' => __(
					'Understanding the Code of Conduct',
					'succeedlearn-amp'
				),
				'body'  => __(
					'Understand organisational values, employee responsibilities and how the Code applies to everyday business decisions.',
					'succeedlearn-amp'
				),
			),
			array(
				'title' => __(
					'Respectful Workplace and Inclusion',
					'succeedlearn-amp'
				),
				'body'  => __(
					'Learn how respectful, equal opportunity and professional behaviour contribute to a safe and productive workplace.',
					'succeedlearn-amp'
				),
			),
			array(
				'title' => __(
					'Professional Conduct and Workplace Behaviour',
					'succeedlearn-amp'
				),
				'body'  => __(
					'Explore expectations around professional behaviour, meetings, communication, workplace safety and personal accountability.',
					'succeedlearn-amp'
				),
			),
			array(
				'title' => __(
					'Conflicts of Interest',
					'succeedlearn-amp'
				),
				'body'  => __(
					'Learn to identify actual, potential and perceived conflicts involving personal relationships, outside employment, vendors, financial interests and business opportunities.',
					'succeedlearn-amp'
				),
			),
			array(
				'title' => __(
					'Gifts, Hospitality and Business Courtesies',
					'succeedlearn-amp'
				),
				'body'  => __(
					'Understand when gifts, meals, entertainment and hospitality may be appropriate and when they could improperly influence a business decision.',
					'succeedlearn-amp'
				),
			),
			array(
				'title' => __(
					'Anti-Bribery and Anti-Corruption',
					'succeedlearn-amp'
				),
				'body'  => __(
					'Recognize bribery, improper payments and other forms of corruption and understand the importance of ethical business relationships.',
					'succeedlearn-amp'
				),
			),
			array(
				'title' => __(
					'Fair Competition and Business Integrity',
					'succeedlearn-amp'
				),
				'body'  => __(
					'Understand responsible interactions with competitors, customers, suppliers and other business partners, including risks such as price fixing, bid manipulation and other anti-competitive practices.',
					'succeedlearn-amp'
				),
			),
			array(
				'title' => __(
					'Financial Integrity and Responsible Recordkeeping',
					'succeedlearn-amp'
				),
				'body'  => __(
					'Learn the importance of accurate financial records, appropriate expenses, documentation, contracts and preservation of records.',
					'succeedlearn-amp'
				),
			),
			array(
				'title' => __(
					'Data Privacy and Responsible Information Handling',
					'succeedlearn-amp'
				),
				'body'  => __(
					'Understand how personal information should be collected, accessed, processed, stored and shared responsibly.',
					'succeedlearn-amp'
				),
			),
			array(
				'title' => __(
					'Confidential Information and Intellectual Property',
					'succeedlearn-amp'
				),
				'body'  => __(
					'Learn how to protect confidential business information, intellectual property, customer information and other sensitive organizational assets.',
					'succeedlearn-amp'
				),
			),
			array(
				'title' => __(
					'Protecting Company Assets',
					'succeedlearn-amp'
				),
				'body'  => __(
					'Understand responsible use of physical assets, technology, software, information, equipment and other company resources.',
					'succeedlearn-amp'
				),
			),
			array(
				'title' => __(
					'Social Media and External Communication',
					'succeedlearn-amp'
				),
				'body'  => __(
					'Learn what employees can and cannot communicate publicly, how to behave responsibly on social media and when communication should be handled by authorized representatives.',
					'succeedlearn-amp'
				),
			),
			array(
				'title' => __(
					'Working Responsibly with Third Parties',
					'succeedlearn-amp'
				),
				'body'  => __(
					'Understand ethical expectations when interacting with suppliers, consultants, contractors, business partners and other third parties.',
					'succeedlearn-amp'
				),
			),
			array(
				'title' => __(
					'Speak Up, Reporting and Non-Retaliation',
					'succeedlearn-amp'
				),
				'body'  => __(
					'Help employees recognize when concerns should be raised, understand available reporting channels and build confidence to speak up when something does not seem right.',
					'succeedlearn-amp'
				),
			),
			array(
				'title' => __(
					'Living the Code',
					'succeedlearn-amp'
				),
				'body'  => __(
					'Bring the learning together through practical decision-making principles employees can use when they encounter situations that are not explicitly covered by a policy.',
					'succeedlearn-amp'
				),
			),
		),
	);
}
/**
 * Return the Code of Conduct emerging risks section data.
 *
 * @return array
 */
function succeedlearn_amp_get_coc_emerging_risks_data() {
	return array(
		'eyebrow'      => __(
			'Emerging Topic',
			'succeedlearn-amp'
		),
		'title'        => __(
			'Prepare Employees for',
			'succeedlearn-amp'
		),
		'title_accent' => __(
			'New Ethical Risks',
			'succeedlearn-amp'
		),
		'lead'         => __(
			'Codes of Conduct are evolving as technology changes the workplace.',
			'succeedlearn-amp'
		),
		'intro'        => __(
			'Where relevant to your organisation’s policies, SucceedLEARN can incorporate emerging topics such as:',
			'succeedlearn-amp'
		),
		'image'        => array(
			'url'    => content_url(
				'/uploads/2026/08/Prepare-Employees.webp'
			),
			'alt'    => __(
				'Employees navigating a difficult workplace ethics situation',
				'succeedlearn-amp'
			),
			'width'  => 760,
			'height' => 500,
		),
		'topics'       => array(
			__( 'Responsible AI Use', 'succeedlearn-amp' ),
			__(
				'Generative AI and Confidential Information',
				'succeedlearn-amp'
			),
			__( 'Data Privacy', 'succeedlearn-amp' ),
			__( 'Digital Workplace Behaviour', 'succeedlearn-amp' ),
			__( 'Remote and Hybrid Working', 'succeedlearn-amp' ),
			__(
				'Cybersecurity Responsibilities',
				'succeedlearn-amp'
			),
			__( 'Third-Party Risk', 'succeedlearn-amp' ),
			__(
				'Sustainability and Responsible Business',
				'succeedlearn-amp'
			),
		),
		'closing'      => array(
			'example_label' => __(
				'For example:',
				'succeedlearn-amp'
			),
			'example'       => __(
				'Is it acceptable to paste confidential customer information into a public Generative AI tool to summarize it?',
				'succeedlearn-amp'
			),
			'message'       => __(
				'Modern workplace ethics training should help employees think through new situations rather than simply memorize yesterday’s rules.',
				'succeedlearn-amp'
			),
		),
	);
}

/**
 * Return Code of Conduct decision-scenario content.
 *
 * @return array
 */
function succeedlearn_amp_get_coc_decision_data() {
	return array(
		'eyebrow'    => __( 'Interactive Experience', 'succeedlearn-amp' ),
		'title'      => __( 'Experience Code of Conduct Through', 'succeedlearn-amp' ),
		'highlight'  => __( 'Real-World Scenarios', 'succeedlearn-amp' ),
		'intro'      => __( 'Employees learn differently when they participate rather than simply read. SucceedLEARN uses realistic workplace scenarios to help employees practise ethical judgement in situations they could genuinely encounter.', 'succeedlearn-amp' ),
		'scenarios'  => array(
			array(
				'number'      => '01',
				'description' => __( 'Navigating potential conflicts', 'succeedlearn-amp' ),
				'title'       => __( 'Conflict of Interest', 'succeedlearn-amp' ),
				'situation'   => __( 'Your team is evaluating three vendors. One of the vendors is owned by a close relative.', 'succeedlearn-amp' ),
				'question'    => __( 'What should you do?', 'succeedlearn-amp' ),
				'answer'      => __( 'The learner makes a decision and receives immediate feedback explaining the ethical considerations involved.', 'succeedlearn-amp' ),
			),
			array(
				'number'      => '02',
				'description' => __( 'Protecting sensitive information', 'succeedlearn-amp' ),
				'title'       => __( 'Confidentiality', 'succeedlearn-amp' ),
				'situation'   => __( 'An employee receives a confidential presentation before travelling.', 'succeedlearn-amp' ),
				'question'    => __( 'Would it be appropriate to review the presentation in a crowded airport lounge?', 'succeedlearn-amp' ),
				'answer'      => __( 'The learner considers the confidentiality risks involved and receives immediate feedback on the ethical considerations.', 'succeedlearn-amp' ),
			),
			array(
				'number'      => '03',
				'description' => __( 'Recognising when to raise concerns', 'succeedlearn-amp' ),
				'title'       => __( 'Speak Up', 'succeedlearn-amp' ),
				'situation'   => __( 'You notice behaviour that appears inconsistent with the Code, but you are not certain a violation has occurred.', 'succeedlearn-amp' ),
				'question'    => __( 'Should you report the concern?', 'succeedlearn-amp' ),
				'answer'      => __( 'The learner receives guidance on recognising when an ethical concern should be raised.', 'succeedlearn-amp' ),
			),
		),
		'closing'    => array(
			'prefix'   => __( 'These scenarios help employees develop', 'succeedlearn-amp' ),
			'emphasis' => __( 'ethical judgement', 'succeedlearn-amp' ),
			'suffix'   => __( ', not simply recall policy statements.', 'succeedlearn-amp' ),
		),
	);
}

/**
 * Return Code of Conduct learning-experience content.
 *
 * @return array
 */
function succeedlearn_amp_get_coc_learning_data() {
	return array(
		'eyebrow'   => __( 'Learning Experience', 'succeedlearn-amp' ),
		'title'     => __( 'Designed for', 'succeedlearn-amp' ),
		'highlight' => __( 'Engagement.', 'succeedlearn-amp' ),
		'title_end' => __( 'Built for Compliance.', 'succeedlearn-amp' ),
		'intro'     => __( 'Create a learning experience that keeps employees engaged while helping your organisation build stronger understanding of Code of Conduct requirements.', 'succeedlearn-amp' ),
		'items'     => array(
			array(
				'icon'  => 'scenario',
				'title' => __( 'Scenario-Based Learning', 'succeedlearn-amp' ),
				'text'  => __( 'Bring workplace ethics to life through realistic situations and decision-making exercises.', 'succeedlearn-amp' ),
			),
			array(
				'icon'  => 'knowledge',
				'title' => __( 'Interactive Knowledge Checks', 'succeedlearn-amp' ),
				'text'  => __( 'Reinforce important concepts throughout the learning journey.', 'succeedlearn-amp' ),
			),
			array(
				'icon'  => 'assessment',
				'title' => __( 'Assessments', 'succeedlearn-amp' ),
				'text'  => __( 'Measure employee understanding and define completion criteria based on your requirements.', 'succeedlearn-amp' ),
			),
			array(
				'icon'  => 'gamified',
				'title' => __( 'Gamified Learning', 'succeedlearn-amp' ),
				'text'  => __( 'Use interactive learning elements to make mandatory training more engaging.', 'succeedlearn-amp' ),
			),
			array(
				'icon'  => 'mobile',
				'title' => __( 'Mobile-Responsive Learning', 'succeedlearn-amp' ),
				'text'  => __( 'Allow employees to complete training across supported devices.', 'succeedlearn-amp' ),
			),
			array(
				'icon'  => 'certificate',
				'title' => __( 'Completion Certificates', 'succeedlearn-amp' ),
				'text'  => __( 'Provide certificates upon successful course completion where required.', 'succeedlearn-amp' ),
			),
		),
	);
}

/**
 * Return Code of Conduct customization content.
 *
 * @return array
 */
function succeedlearn_amp_get_coc_customization_data() {
	return array(
		'eyebrow'   => __( 'Customization', 'succeedlearn-amp' ),
		'title'     => __( 'Your Code. Your Policies.', 'succeedlearn-amp' ),
		'highlight' => __( 'Your Training.', 'succeedlearn-amp' ),
		'intro'     => __( 'Every organization has different values, policies, reporting procedures and compliance requirements.', 'succeedlearn-amp' ),
		'list_title' => __( "SucceedLEARN's custom Code of Conduct training can be adapted to incorporate:", 'succeedlearn-amp' ),
		'items'     => array(
			__( 'Company branding and colours', 'succeedlearn-amp' ),
			__( 'Your Code of Conduct', 'succeedlearn-amp' ),
			__( 'Organization-specific policies', 'succeedlearn-amp' ),
			__( 'Leadership messages', 'succeedlearn-amp' ),
			__( 'Reporting channels', 'succeedlearn-amp' ),
			__( 'Whistleblowing procedures', 'succeedlearn-amp' ),
			__( 'Gift thresholds', 'succeedlearn-amp' ),
			__( 'Organization-specific scenarios', 'succeedlearn-amp' ),
			__( 'Industry-specific examples', 'succeedlearn-amp' ),
			__( 'Assessments', 'succeedlearn-amp' ),
			__( 'Certificates', 'succeedlearn-amp' ),
			__( 'Languages', 'succeedlearn-amp' ),
		),
		'image'     => array(
			'url'    => content_url( '/uploads/2026/08/Code-of-Conduct-Customization.webp' ),
			'width'  => 1460,
			'height' => 1120,
			'alt'    => __( 'Custom Code of Conduct training tailored to an organization’s branding and policies', 'succeedlearn-amp' ),
		),
		'closing'   => __( 'The result is a course that feels like your organization’s Code of Conduct programme, rather than generic off-the-shelf training.', 'succeedlearn-amp' ),
		'cta'       => __( 'Discuss Your Customization Requirements', 'succeedlearn-amp' ),
	);
}

/**
 * Return Code of Conduct deployment content.
 *
 * @return array
 */
function succeedlearn_amp_get_coc_deployment_data() {
	return array(
		'eyebrow'   => __( 'Deployment', 'succeedlearn-amp' ),
		'title'     => __( 'Deploy Through Your LMS, or Let', 'succeedlearn-amp' ),
		'highlight' => __( 'SucceedLEARN Manage It', 'succeedlearn-amp' ),
		'intro'     => __( 'Codes of Conduct are evolving as technology changes the workplace.', 'succeedlearn-amp' ),
		'options'   => array(
			array(
				'eyebrow' => __( 'Already have an LMS?', 'succeedlearn-amp' ),
				'title'   => __( 'Host the course on your LMS using supported SCORM packages.', 'succeedlearn-amp' ),
				'items'   => array(
					__( 'SCORM 1.2 / SCORM 2004', 'succeedlearn-amp' ),
					__( 'SSO integration', 'succeedlearn-amp' ),
					__( 'HRIS / user provisioning', 'succeedlearn-amp' ),
					__( 'Automated reminders', 'succeedlearn-amp' ),
				),
			),
			array(
				'eyebrow' => __( "Don't have an LMS?", 'succeedlearn-amp' ),
				'title'   => __( 'Deliver the programme through SucceedLEARN’s hosted learning environment.', 'succeedlearn-amp' ),
				'items'   => array(
					__( 'Hosted SaaS delivery', 'succeedlearn-amp' ),
					__( 'Multilingual delivery', 'succeedlearn-amp' ),
					__( 'Learner management', 'succeedlearn-amp' ),
					__( 'Completion tracking and reporting', 'succeedlearn-amp' ),
				),
			),
		),
	);
}

/**
 * Return Code of Conduct accessibility content.
 *
 * @return array
 */
function succeedlearn_amp_get_coc_accessibility_data() {
	return array(
		'eyebrow'   => __( 'Accessibility', 'succeedlearn-amp' ),
		'title'     => __( 'Designed for', 'succeedlearn-amp' ),
		'highlight' => __( 'Today’s Workforce', 'succeedlearn-amp' ),
		'intro'     => __( 'Code of Conduct training may need to reach employees across roles, locations, languages and devices.', 'succeedlearn-amp' ),
		'list_title' => __( 'SucceedLEARN supports flexible enterprise deployment through:', 'succeedlearn-amp' ),
		'features'  => array(
			__( 'Mobile-Responsive Learning', 'succeedlearn-amp' ),
			__( 'Multilingual Delivery', 'succeedlearn-amp' ),
			__( 'Accessibility-Focused Course Design', 'succeedlearn-amp' ),
			__( 'LMS Integration', 'succeedlearn-amp' ),
			__( 'Hosted Deployment Options', 'succeedlearn-amp' ),
		),
		'closing'   => __( 'Where applicable, courses can be designed to support WCAG accessibility requirements.', 'succeedlearn-amp' ),
	);
}

/**
 * Return Code of Conduct reporting content.
 *
 * @return array
 */
function succeedlearn_amp_get_coc_reporting_data() {
	return array(
		'eyebrow'   => __( 'Reporting', 'succeedlearn-amp' ),
		'title'     => __( 'Turn Training Completion Into', 'succeedlearn-amp' ),
		'highlight' => __( 'Compliance Visibility', 'succeedlearn-amp' ),
		'lead'      => __( 'Knowing that training was assigned is not enough.', 'succeedlearn-amp' ),
		'intro'     => __( 'Compliance, HR and L&D teams need visibility into programme participation and learning outcomes. Depending on deployment configuration, SucceedLEARN reporting can help organizations monitor:', 'succeedlearn-amp' ),
		'items'     => array(
			__( 'Training assignments', 'succeedlearn-amp' ),
			__( 'Course completion', 'succeedlearn-amp' ),
			__( 'Assessment performance', 'succeedlearn-amp' ),
			__( 'Completion status', 'succeedlearn-amp' ),
			__( 'Learner progress', 'succeedlearn-amp' ),
			__( 'Certificates', 'succeedlearn-amp' ),
			__( 'Policy acknowledgement', 'succeedlearn-amp' ),
			__( 'Compliance reporting', 'succeedlearn-amp' ),
		),
		'image'     => array(
			'url' => content_url( '/uploads/2026/08/Code-of-Conduct-Reporting.webp' ),
			'alt' => __( 'Code of Conduct training reporting dashboard showing completion and compliance visibility', 'succeedlearn-amp' ),
		),
		'closing'   => __( 'Use training data to identify gaps, follow up with employees and support internal compliance and audit requirements.', 'succeedlearn-amp' ),
		'cta'       => __( 'Discuss Your Reporting Requirements', 'succeedlearn-amp' ),
	);
}

/**
 * Return Code of Conduct audience content.
 *
 * @return array
 */
function succeedlearn_amp_get_coc_audience_data() {
	return array(
		'eyebrow'   => __( 'Audience', 'succeedlearn-amp' ),
		'title'     => __( 'Who Should Take Code of Conduct', 'succeedlearn-amp' ),
		'highlight' => __( 'Training?', 'succeedlearn-amp' ),
		'intro'     => __( 'Code of Conduct training is generally relevant to employees across the organization because ethical responsibility is not limited to compliance teams.', 'succeedlearn-amp' ),
		'list_title' => __( 'Training can be assigned to:', 'succeedlearn-amp' ),
		'items'     => array(
			array(
				'title' => __( 'Employees', 'succeedlearn-amp' ),
				'text'  => __( 'Understand everyday responsibilities and expected behaviour.', 'succeedlearn-amp' ),
			),
			array(
				'title' => __( 'Managers', 'succeedlearn-amp' ),
				'text'  => __( 'Recognize concerns, respond appropriately and model ethical leadership.', 'succeedlearn-amp' ),
			),
			array(
				'title' => __( 'Leadership', 'succeedlearn-amp' ),
				'text'  => __( 'Reinforce accountability and organizational values.', 'succeedlearn-amp' ),
			),
			array(
				'title' => __( 'New Joiners', 'succeedlearn-amp' ),
				'text'  => __( 'Understand expected workplace behaviour from the beginning.', 'succeedlearn-amp' ),
			),
			array(
				'title' => __( 'Contractors & Consultants', 'succeedlearn-amp' ),
				'text'  => __( 'Understand applicable organizational expectations.', 'succeedlearn-amp' ),
			),
			array(
				'title' => __( 'Third Parties', 'succeedlearn-amp' ),
				'text'  => __( 'Where appropriate, communicate standards expected when representing or working with the organization.', 'succeedlearn-amp' ),
			),
		),
	);
}

/**
 * Return Code of Conduct One Programme content.
 *
 * @return array
 */
function succeedlearn_amp_get_coc_one_programme_data() {
	return array(
		'eyebrow'   => __( 'One Programme', 'succeedlearn-amp' ),
		'title'     => __( 'One Programme. One Shared', 'succeedlearn-amp' ),
		'highlight' => __( 'Understanding.', 'succeedlearn-amp' ),
		'intro'     => __( 'SucceedLEARN brings HR, compliance, learning, business leaders and employees together around one practical approach to Code of Conduct training.', 'succeedlearn-amp' ),
		'items'     => array(
			array(
				'icon'     => 'programme',
				'title'    => __( 'Code of Conduct Training', 'succeedlearn-amp' ),
				'text'     => __( 'One consistent learning experience connecting people, policies and practical workplace decisions.', 'succeedlearn-amp' ),
				'featured' => true,
			),
			array(
				'icon'     => 'hr',
				'title'    => __( 'For HR Leaders', 'succeedlearn-amp' ),
				'text'     => __( 'Build consistent understanding of workplace behaviour, organizational values and employee responsibilities.', 'succeedlearn-amp' ),
				'featured' => false,
			),
			array(
				'icon'     => 'compliance',
				'title'    => __( 'For Compliance Teams', 'succeedlearn-amp' ),
				'text'     => __( 'Strengthen policy awareness, improve reporting visibility and maintain evidence of employee training.', 'succeedlearn-amp' ),
				'featured' => false,
			),
			array(
				'icon'     => 'learning',
				'title'    => __( 'For Learning & Development', 'succeedlearn-amp' ),
				'text'     => __( 'Deliver interactive corporate compliance training that is easier for employees to understand and remember.', 'succeedlearn-amp' ),
				'featured' => false,
			),
			array(
				'icon'     => 'employees',
				'title'    => __( 'For Employees', 'succeedlearn-amp' ),
				'text'     => __( 'Understand what the Code means in practical situations and gain confidence to make responsible decisions.', 'succeedlearn-amp' ),
				'featured' => false,
			),
			array(
				'icon'     => 'business',
				'title'    => __( 'For Business Leaders', 'succeedlearn-amp' ),
				'text'     => __( 'Build a stronger ethical culture while reducing behavioural, compliance and reputational risk.', 'succeedlearn-amp' ),
				'featured' => false,
			),
		),
	);
}

/**
 * Return Code of Conduct industries content.
 *
 * @return array
 */
function succeedlearn_amp_get_coc_industries_data() {
	return array(
		'eyebrow'    => __( 'Industries', 'succeedlearn-amp' ),
		'title'      => __( 'Code of Conduct Training', 'succeedlearn-amp' ),
		'highlight'  => __( 'Across Industries', 'succeedlearn-amp' ),
		'lead'       => __( 'Ethical risks differ across industries.', 'succeedlearn-amp' ),
		'intro'      => __( 'SucceedLEARN can adapt training scenarios and examples for organisations operating in:', 'succeedlearn-amp' ),
		'industries' => array(
			__( 'Government & Public Sector', 'succeedlearn-amp' ),
			__( 'Banking & Financial Services', 'succeedlearn-amp' ),
			__( 'Information Technology', 'succeedlearn-amp' ),
			__( 'Healthcare', 'succeedlearn-amp' ),
			__( 'Pharmaceuticals', 'succeedlearn-amp' ),
			__( 'Manufacturing', 'succeedlearn-amp' ),
			__( 'Retail', 'succeedlearn-amp' ),
			__( 'Professional Services', 'succeedlearn-amp' ),
			__( 'Education', 'succeedlearn-amp' ),
			__( 'Global Enterprises', 'succeedlearn-amp' ),
		),
		'image'      => array(
			/*
			 * Add the complete image URL here.
			 * Example: content_url( '/uploads/2026/08/code-of-conduct-industries.webp' )
			 */
			'url'    => '',
			'width'  => 1120,
			'height' => 1280,
			'alt'    => __( 'Code of Conduct training adapted for employees across different industries', 'succeedlearn-amp' ),
		),
		'statement'  => __( 'Industry-specific versions can focus on the ethical risks employees are most likely to encounter in their roles.', 'succeedlearn-amp' ),
	);
}

/**
 * Return Code of Conduct differentiation content.
 *
 * @return array
 */
function succeedlearn_amp_get_coc_differentiation_data() {
	return array(
		'eyebrow'   => __( 'Differentiation', 'succeedlearn-amp' ),
		'title'     => __( 'More Than Traditional', 'succeedlearn-amp' ),
		'highlight' => __( 'Code of Conduct Training', 'succeedlearn-amp' ),
		'groups'    => array(
			array(
				'title'    => __( 'Traditional Compliance Training', 'succeedlearn-amp' ),
				'featured' => false,
				'items'    => array(
					__( 'Policy-heavy', 'succeedlearn-amp' ),
					__( 'Passive learning', 'succeedlearn-amp' ),
					__( 'Generic examples', 'succeedlearn-amp' ),
					__( 'Standard course', 'succeedlearn-amp' ),
					__( 'Completion focused', 'succeedlearn-amp' ),
					__( 'Generic branding', 'succeedlearn-amp' ),
					__( 'Limited deployment flexibility', 'succeedlearn-amp' ),
					__( 'Basic reporting', 'succeedlearn-amp' ),
				),
			),
			array(
				'title'    => __( 'SucceedLEARN Code of Conduct eLearning', 'succeedlearn-amp' ),
				'featured' => true,
				'items'    => array(
					__( 'Scenario-driven', 'succeedlearn-amp' ),
					__( 'Interactive decision-making', 'succeedlearn-amp' ),
					__( 'Customizable workplace scenarios', 'succeedlearn-amp' ),
					__( 'Organization-specific experience', 'succeedlearn-amp' ),
					__( 'Understanding and assessment', 'succeedlearn-amp' ),
					__( 'Organization branding', 'succeedlearn-amp' ),
					__( 'LMS or hosted deployment', 'succeedlearn-amp' ),
					__( 'Learning and compliance visibility', 'succeedlearn-amp' ),
				),
			),
		),
		'closing'   => __( 'The goal isn’t simply to get employees through another mandatory course. The goal is to help employees recognize ethical risks and make better decisions.', 'succeedlearn-amp' ),
		'cta'       => __( 'Explore Code of Conduct Training', 'succeedlearn-amp' ),
	);
}

/**
 * Return Code of Conduct social-proof statistics.
 *
 * @return array
 */
function succeedlearn_amp_get_coc_stats_data() {
	return array(
		'eyebrow'   => __( 'Social Proof', 'succeedlearn-amp' ),
		'title'     => __( 'Trusted by Organizations Building', 'succeedlearn-amp' ),
		'highlight' => __( 'Stronger Workplace Cultures', 'succeedlearn-amp' ),
		'stats'     => array(
			array(
				'value' => '250+',
				'label' => __( 'Organisations', 'succeedlearn-amp' ),
			),
			array(
				'value' => '1.2M+',
				'label' => __( 'Learners', 'succeedlearn-amp' ),
			),
			array(
				'value' => '40+',
				'label' => __( 'Countries', 'succeedlearn-amp' ),
			),
			array(
				'value' => '94%',
				'label' => __( 'Average completion', 'succeedlearn-amp' ),
			),
		),
	);
}

/**
 * Return Code of Conduct customer story content.
 *
 * @return array
 */
function succeedlearn_amp_get_coc_customer_story_data() {
	return array(
		'eyebrow'   => __( 'Customer Story', 'succeedlearn-amp' ),
		'title'     => __( 'From Policy Rollout to', 'succeedlearn-amp' ),
		'highlight' => __( 'Employee Understanding', 'succeedlearn-amp' ),
		'intro'     => __( 'A consistent Code of Conduct learning experience can help employees understand expectations, apply them in practical situations and make better workplace decisions.', 'succeedlearn-amp' ),
		'statement' => __( 'Turning policy into practical understanding.', 'succeedlearn-amp' ),
		'steps'     => array(
			array(
				'number'   => '01',
				'title'    => __( 'Challenge', 'succeedlearn-amp' ),
				'text'     => __( 'The organization needed to communicate its Code consistently across a geographically distributed workforce.', 'succeedlearn-amp' ),
				'featured' => false,
			),
			array(
				'number'   => '02',
				'title'    => __( 'Solution', 'succeedlearn-amp' ),
				'text'     => __( 'SucceedLEARN customized the course around the organization’s policies, branding, reporting procedures and workplace scenarios.', 'succeedlearn-amp' ),
				'featured' => true,
			),
			array(
				'number'   => '03',
				'title'    => __( 'Outcome', 'succeedlearn-amp' ),
				'text'     => __( 'Employees received a consistent learning experience while HR and compliance gained centralized visibility into completion and assessment.', 'succeedlearn-amp' ),
				'featured' => false,
			),
		),
		'cta'       => __( 'Read Customer Success Stories', 'succeedlearn-amp' ),
		'cta_url'   => '#',
	);
}