<?php
/**
 * S-Play — AMP data helpers.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Include an S-Play section partial.
 *
 * @param string $name Partial basename without .php.
 */
function succeedlearn_amp_sp_partial( $name ) {
	$path = SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'partials/s-play/' . sanitize_file_name( (string) $name ) . '.php';
	if ( is_readable( $path ) ) {
		include $path;
	}
}

/**
 * @return string
 */
function succeedlearn_amp_get_sp_canonical_url() {
	$fallback = home_url( '/security-awareness/s-play/' );
	foreach ( array( 's-play', 's-play-gamified-training', 'security-awareness/s-play' ) as $slug ) {
		$page = get_page_by_path( $slug );
		if ( $page instanceof WP_Post && 'publish' === $page->post_status ) {
			$link = get_permalink( $page );
			if ( $link ) {
				return $link;
			}
		}
	}
	return $fallback;
}

/**
 * @return string
 */
function succeedlearn_amp_get_sp_page_title() {
	return __( 'Gamified Security Awareness Training', 'succeedlearn-amp' );
}

/**
 * @return string
 */
function succeedlearn_amp_get_sp_meta_description() {
	return __( 'S-Play transforms cybersecurity awareness into interactive learning through security games, challenges and decision-based activities within the SucceedLEARN Security Behaviour & Culture Suite.', 'succeedlearn-amp' );
}

/**
 * @return string
 */
function succeedlearn_amp_get_sp_hero_image() {
	return succeedlearn_amp_upload_url( '2026/09/Gamified-Security-Awareness-Training.webp' );
}

/**
 * @return string
 */
function succeedlearn_amp_get_sp_complements_image() {
	return succeedlearn_amp_upload_url( '2026/09/Why-Gamified-Security-Awareness-Matters.webp' );
}

/**
 * @return string
 */
function succeedlearn_amp_get_sp_works_image() {
	return succeedlearn_amp_upload_url( '2026/09/S-Play-Launch-in-Four-Steps.webp' );
}

/**
 * @return string
 */
function succeedlearn_amp_get_sp_delivery_image() {
	return succeedlearn_amp_upload_url( '2026/09/Visibility-into-Gamified-eLearning.webp' );
}

/**
 * @return string
 */
function succeedlearn_amp_get_sp_suite_image() {
	return succeedlearn_amp_upload_url( '2026/09/From-Awareness-to-Real-World-Readiness.webp' );
}

/**
 * @return string[]
 */
function succeedlearn_amp_get_sp_why_items() {
	return array(
		__( 'Apply previously learned security concepts.', 'succeedlearn-amp' ),
		__( 'Practise decision-making in a low-risk environment.', 'succeedlearn-amp' ),
		__( 'Receive immediate feedback.', 'succeedlearn-amp' ),
		__( 'Revisit important cybersecurity topics.', 'succeedlearn-amp' ),
		__( 'Increase participation in awareness initiatives.', 'succeedlearn-amp' ),
		__( 'Reinforce knowledge through active learning.', 'succeedlearn-amp' ),
	);
}

/**
 * @return array<int, array{title:string,text:string}>
 */
function succeedlearn_amp_get_sp_works_steps() {
	return array(
		array(
			'title' => __( 'Select S-Play', 'succeedlearn-amp' ),
			'text'  => __( 'Choose from the available library of interactive security awareness games based on the cybersecurity concepts and behaviours you want to reinforce. Different game formats provide different ways for employees to apply, revisit and test their security knowledge.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Select Users', 'succeedlearn-amp' ),
			'text'  => __( 'Deploy campaigns across the organisation or target specific departments, locations or custom user groups. This allows organisations to align gamified learning with different workforce populations and awareness initiatives.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Schedule', 'succeedlearn-amp' ),
			'text'  => __( 'Launch campaigns immediately or schedule them for a future date as part of an ongoing security awareness programme. Administrators can plan awareness activities in advance, ensuring continuous employee engagement without interrupting daily business operations.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Review & Launch', 'succeedlearn-amp' ),
			'text'  => __( 'Review the selected game, assigned users and campaign configuration before launch. Once confirmed, launch the campaign and monitor employee participation and campaign progress.', 'succeedlearn-amp' ),
		),
	);
}

/**
 * @return array<int, array{title:string,tagline:string,image:string,paragraphs:string[],learning_style:string,focus:string}>
 */
function succeedlearn_amp_get_sp_games() {
	return array(
		array(
			'title'          => __( 'Grab or Duck', 'succeedlearn-amp' ),
			'tagline'        => __( 'Make the Security Decision', 'succeedlearn-amp' ),
			'image'          => '2026/09/Grab-or-Duck-_Thumbnail.webp',
			'paragraphs'     => array(
				__( 'A fast-paced decision-making game where employees identify secure and insecure actions across different situations.', 'succeedlearn-amp' ),
				__( 'Learners must decide how to respond, with immediate feedback reinforcing the appropriate security behaviour.', 'succeedlearn-amp' ),
			),
			'learning_style' => __( 'Rapid Decision-Making', 'succeedlearn-amp' ),
			'focus'          => __( 'Recognition · Judgement · Secure Behaviour', 'succeedlearn-amp' ),
		),
		array(
			'title'          => __( 'Out of the Well', 'succeedlearn-amp' ),
			'tagline'        => __( 'Make the Right Choice to Progress', 'succeedlearn-amp' ),
			'image'          => '2026/09/Out-of-the-Well_thumbnail-Design.webp',
			'paragraphs'     => array(
				__( 'A scenario-driven security challenge where employees encounter situations requiring them to apply their cybersecurity knowledge and make informed decisions.', 'succeedlearn-amp' ),
				__( 'Progress depends on the choices learners make, encouraging them to think about how security principles apply in practice.', 'succeedlearn-amp' ),
			),
			'learning_style' => __( 'Scenario-Based Challenge', 'succeedlearn-amp' ),
			'focus'          => __( 'Application · Problem-Solving · Decision-Making', 'succeedlearn-amp' ),
		),
		array(
			'title'          => __( 'Cyber Crossword', 'succeedlearn-amp' ),
			'tagline'        => __( 'Test What Employees Remember', 'succeedlearn-amp' ),
			'image'          => '2026/09/ISA-Crossword-Thumbnail.webp',
			'paragraphs'     => array(
				__( 'A cybersecurity-themed crossword designed to reinforce terminology, concepts and security knowledge through recall.', 'succeedlearn-amp' ),
				__( 'The puzzle format gives employees a lighter way to revisit previously learned security concepts while testing what they remember.', 'succeedlearn-amp' ),
			),
			'learning_style' => __( 'Knowledge Challenge', 'succeedlearn-amp' ),
			'focus'          => __( 'Recall · Terminology · Knowledge Reinforcement', 'succeedlearn-amp' ),
		),
		array(
			'title'          => __( 'Back in Time', 'succeedlearn-amp' ),
			'tagline'        => __( 'Race Against Time to Protect the Future', 'succeedlearn-amp' ),
			'image'          => '2026/09/Back-in-Time-Thumbnail.webp',
			'paragraphs'     => array(
				__( 'A fast-paced security awareness game where employees travel back in time and answer questions across privacy, security and compliance topics.', 'succeedlearn-amp' ),
				__( 'Learners must make the right choices as they progress, reinforcing key concepts and helping build stronger security awareness through quick, interactive challenges.', 'succeedlearn-amp' ),
			),
			'learning_style' => __( 'Fast-Paced Knowledge Challenge', 'succeedlearn-amp' ),
			'focus'          => __( 'Privacy · Compliance · Security Awareness · Knowledge Reinforcement', 'succeedlearn-amp' ),
		),
	);
}

/**
 * @return array<int, array{title:string,text:string}>
 */
function succeedlearn_amp_get_sp_benefits() {
	return array(
		array(
			'title' => __( 'Decision-Based Learning', 'succeedlearn-amp' ),
			'text'  => __( 'Employees make choices rather than simply being shown the correct answer.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Immediate Feedback', 'succeedlearn-amp' ),
			'text'  => __( 'Learners can understand whether a decision was appropriate while they are actively engaged with the concept.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Scenario-Based Challenges', 'succeedlearn-amp' ),
			'text'  => __( 'Security concepts can be placed within situations that require employees to think about how they would respond.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Knowledge Reinforcement', 'succeedlearn-amp' ),
			'text'  => __( 'Games can revisit cybersecurity concepts employees have encountered through other awareness activities.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Short, Focused Experiences', 'succeedlearn-amp' ),
			'text'  => __( 'Individual activities provide another way to reinforce awareness without requiring employees to repeatedly complete lengthy courses.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Repeated Engagement', 'succeedlearn-amp' ),
			'text'  => __( 'Games can be incorporated into ongoing awareness campaigns, creating additional security touchpoints throughout the year.', 'succeedlearn-amp' ),
		),
	);
}

/**
 * @return array<int, array{title:string,text:string}>
 */
function succeedlearn_amp_get_sp_employees() {
	return array(
		array(
			'title' => __( 'New Joiners', 'succeedlearn-amp' ),
			'text'  => __( 'Reinforce foundational security knowledge after initial onboarding and awareness training.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Employees Across the Organisation', 'succeedlearn-amp' ),
			'text'  => __( 'Give employees an interactive way to revisit and apply everyday cybersecurity concepts.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Managers & People Leaders', 'succeedlearn-amp' ),
			'text'  => __( 'Reinforce security decision-making among employees responsible for teams, information and business decisions.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Remote & Hybrid Workforces', 'succeedlearn-amp' ),
			'text'  => __( 'Keep employees engaged with security awareness regardless of where they work.', 'succeedlearn-amp' ),
		),
	);
}

/**
 * @return array<int, array{title:string,text:string}>
 */
function succeedlearn_amp_get_sp_teams() {
	return array(
		array(
			'title' => __( 'Information Security & Cybersecurity Teams', 'succeedlearn-amp' ),
			'text'  => __( 'Reinforce important cyber risks through interactive campaigns and practical security challenges.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Compliance & Risk Teams', 'succeedlearn-amp' ),
			'text'  => __( 'Complement existing security and compliance awareness initiatives with ongoing employee engagement.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Learning & Development Teams', 'succeedlearn-amp' ),
			'text'  => __( 'Introduce gamification into the learning experience and diversify how cybersecurity concepts are reinforced.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'HR & People Teams', 'succeedlearn-amp' ),
			'text'  => __( 'Incorporate engaging security-awareness activities into broader employee learning and communication initiatives.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Leadership', 'succeedlearn-amp' ),
			'text'  => __( 'Support an organisational culture where cybersecurity remains visible, participative and relevant throughout the year.', 'succeedlearn-amp' ),
		),
	);
}

/**
 * Suite products from global SBCS component.
 *
 * @return array<int, array{name:string,action:string,description:string}>
 */
function succeedlearn_amp_get_sp_suite_items() {
	return array(
		array(
			'name'        => __( 'S-Aware', 'succeedlearn-amp' ),
			'action'      => __( 'Learn', 'succeedlearn-amp' ),
			'description' => __( 'Build foundational cybersecurity and privacy knowledge.', 'succeedlearn-amp' ),
		),
		array(
			'name'        => __( 'S-Bytes', 'succeedlearn-amp' ),
			'action'      => __( 'Reinforce', 'succeedlearn-amp' ),
			'description' => __( 'Keep important security concepts fresh through continuous microlearning.', 'succeedlearn-amp' ),
		),
		array(
			'name'        => __( 'S-Phish', 'succeedlearn-amp' ),
			'action'      => __( 'Test', 'succeedlearn-amp' ),
			'description' => __( 'Give employees practical experience recognising realistic phishing threats.', 'succeedlearn-amp' ),
		),
		array(
			'name'        => __( 'S-Play', 'succeedlearn-amp' ),
			'action'      => __( 'Engage', 'succeedlearn-amp' ),
			'description' => __( 'Reinforce cybersecurity concepts through interactive and gamified learning.', 'succeedlearn-amp' ),
		),
		array(
			'name'        => __( 'S-Signs', 'succeedlearn-amp' ),
			'action'      => __( 'Remind', 'succeedlearn-amp' ),
			'description' => __( 'Keep security visible through ongoing awareness campaigns and visual nudges.', 'succeedlearn-amp' ),
		),
		array(
			'name'        => __( 'S-Metrics', 'succeedlearn-amp' ),
			'action'      => __( 'Measure', 'succeedlearn-amp' ),
			'description' => __( 'Bring awareness and behavioural data together to understand programme performance.', 'succeedlearn-amp' ),
		),
		array(
			'name'        => __( 'S-Sync', 'succeedlearn-amp' ),
			'action'      => __( 'Connect', 'succeedlearn-amp' ),
			'description' => __( "Integrate security awareness with the organisation's wider learning and technology ecosystem.", 'succeedlearn-amp' ),
		),
	);
}

/**
 * @return array<int, array{title:string,text:string}>
 */
function succeedlearn_amp_get_sp_choose_items() {
	return array(
		array(
			'title' => __( 'Interactive Learning Experience', 'succeedlearn-amp' ),
			'text'  => __( 'Move beyond passive awareness programmes by engaging employees through interactive games that encourage participation, critical thinking, and practical application of cybersecurity concepts.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Multiple Game Experiences', 'succeedlearn-amp' ),
			'text'  => __( 'Use different formats - including decision-based games, scenario challenges and knowledge puzzles, to reinforce cybersecurity concepts in different ways.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Improved Knowledge Retention', 'succeedlearn-amp' ),
			'text'  => __( 'Gamified learning reinforces key security topics through repeated interaction and active participation, helping employees remember and apply secure behaviours more effectively.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Flexible Campaign Management', 'succeedlearn-amp' ),
			'text'  => __( 'Select games, target relevant users, schedule campaigns and manage gamified awareness activities through a structured campaign workflow.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Continuous Employee Engagement', 'succeedlearn-amp' ),
			'text'  => __( 'Introduce interactive learning at different points throughout the year rather than relying exclusively on one-time awareness events.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Supports a Strong Security Culture', 'succeedlearn-amp' ),
			'text'  => __( 'By making cybersecurity learning enjoyable and accessible, S-Play encourages regular participation and helps organisations build long-term security-conscious behaviours across the workforce.', 'succeedlearn-amp' ),
		),
	);
}

/**
 * @return array<int, array{traditional:string,s_play:string}>
 */
function succeedlearn_amp_get_sp_comparison_items() {
	return array(
		array(
			'traditional' => __( 'Primarily passive learning', 'succeedlearn-amp' ),
			's_play'      => __( 'Active participation', 'succeedlearn-amp' ),
		),
		array(
			'traditional' => __( 'Longer learning experiences', 'succeedlearn-amp' ),
			's_play'      => __( 'Short, focused game-based activities', 'succeedlearn-amp' ),
		),
		array(
			'traditional' => __( 'Limited learner interaction', 'succeedlearn-amp' ),
			's_play'      => __( 'Interactive challenges and decision-making', 'succeedlearn-amp' ),
		),
		array(
			'traditional' => __( 'Often centred around scheduled training', 'succeedlearn-amp' ),
			's_play'      => __( 'Can support ongoing reinforcement', 'succeedlearn-amp' ),
		),
		array(
			'traditional' => __( 'Knowledge consumption', 'succeedlearn-amp' ),
			's_play'      => __( 'Knowledge application and reinforcement', 'succeedlearn-amp' ),
		),
		array(
			'traditional' => __( 'Completion-focused', 'succeedlearn-amp' ),
			's_play'      => __( 'Engagement-focused', 'succeedlearn-amp' ),
		),
	);
}

/**
 * @return array<int, array{question:string,answer:string}>
 */
function succeedlearn_amp_get_sp_faq_items() {
	return array(
		array(
			'question' => __( 'What is gamified security awareness training?', 'succeedlearn-amp' ),
			'answer'   => '<p>' . esc_html__( 'Gamified security awareness training uses game mechanics, interactive challenges, scenarios and decision-making activities to help employees actively engage with cybersecurity concepts rather than only consuming passive learning content.', 'succeedlearn-amp' ) . '</p>',
		),
		array(
			'question' => __( 'What is S-Play?', 'succeedlearn-amp' ),
			'answer'   => '<p>' . esc_html__( 'S-Play is the gamified cybersecurity learning solution within the SucceedLEARN Security Behaviour & Culture Suite. It enables organisations to reinforce security awareness through interactive games and structured awareness campaigns.', 'succeedlearn-amp' ) . '</p>',
		),
		array(
			'question' => __( 'What cybersecurity games are available in S-Play?', 'succeedlearn-amp' ),
			'answer'   => '<p>' . esc_html__( 'S-Play currently includes interactive learning experiences such as Grab or Duck, Out of the Well and Cyber Crossword, with different formats designed to reinforce decision-making, application and knowledge recall.', 'succeedlearn-amp' ) . '</p>',
		),
		array(
			'question' => __( 'Does S-Play replace security awareness training?', 'succeedlearn-amp' ),
			'answer'   => '<p>' . esc_html__( 'No. S-Play is designed to complement foundational security awareness training by giving employees additional opportunities to revisit, apply and reinforce cybersecurity concepts through interactive learning.', 'succeedlearn-amp' ) . '</p>',
		),
		array(
			'question' => __( 'Can S-Play be used throughout the year?', 'succeedlearn-amp' ),
			'answer'   => '<p>' . esc_html__( 'Yes. Organisations can schedule gamified security awareness campaigns at different points throughout their awareness programme, helping create additional employee engagement beyond formal training events.', 'succeedlearn-amp' ) . '</p>',
		),
		array(
			'question' => __( 'Can security games be assigned to specific employee groups?', 'succeedlearn-amp' ),
			'answer'   => '<p>' . esc_html__( 'Yes. S-Play campaigns can be assigned across the organisation or targeted to specific departments, locations, teams or custom employee groups.', 'succeedlearn-amp' ) . '</p>',
		),
		array(
			'question' => __( 'Can administrators schedule S-Play campaigns in advance?', 'succeedlearn-amp' ),
			'answer'   => '<p>' . esc_html__( 'Yes. Campaigns can be launched immediately or scheduled for a future date, allowing organisations to incorporate gamified activities into their wider security awareness calendar.', 'succeedlearn-amp' ) . '</p>',
		),
		array(
			'question' => __( 'Can organisations track employee participation in S-Play?', 'succeedlearn-amp' ),
			'answer'   => '<p>' . esc_html__( 'S-Play provides visibility into campaign activity and employee participation. When used within the wider SucceedLEARN SBCS ecosystem, S-Play activity can also contribute to broader programme measurement through S-Metrics.', 'succeedlearn-amp' ) . '</p>',
		),
		array(
			'question' => __( 'How does gamification support cybersecurity awareness?', 'succeedlearn-amp' ),
			'answer'   => '<p>' . esc_html__( 'Gamification encourages employees to interact with security concepts through challenges, decisions and knowledge-based activities. This gives learners opportunities to actively apply and revisit what they have learned rather than relying entirely on passive content consumption.', 'succeedlearn-amp' ) . '</p>',
		),
		array(
			'question' => __( 'Who can use S-Play?', 'succeedlearn-amp' ),
			'answer'   => '<p>' . esc_html__( 'S-Play can be used across different employee populations, including new joiners, existing employees, managers, remote and hybrid workers, and other groups that organisations want to engage through cybersecurity awareness activities.', 'succeedlearn-amp' ) . '</p>',
		),
		array(
			'question' => __( 'Can S-Play complement phishing simulations and microlearning?', 'succeedlearn-amp' ),
			'answer'   => '<p>' . esc_html__( 'Yes. Within SBCS, S-Play can work alongside S-Phish for phishing simulations, S-Bytes for continuous microlearning and S-Aware for foundational security awareness training, creating multiple forms of learning and reinforcement.', 'succeedlearn-amp' ) . '</p>',
		),
		array(
			'question' => __( "Can S-Play be delivered through an organisation's LMS?", 'succeedlearn-amp' ),
			'answer'   => '<p>' . esc_html__( "S-Play supports SucceedLEARN-based delivery, and SCORM delivery can be available depending on the applicable game or deployment configuration. Organisations can select the delivery approach that fits their learning environment.", 'succeedlearn-amp' ) . '</p>',
		),
	);
}

/**
 * FAQPage JSON-LD for the S-Play AMP page.
 *
 * @return array<string, mixed>
 */
function succeedlearn_amp_sp_faq_schema() {
	$entities = array();
	foreach ( succeedlearn_amp_get_sp_faq_items() as $item ) {
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
