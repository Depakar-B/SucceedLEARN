<?php
/**
 * Inclusive Workplace course data (EDI, Unconscious Bias, Bystander).
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * All inclusive workplace course definitions.
 *
 * @return array<string, array<string, mixed>>
 */
function akaza_get_inclusive_courses() {
	static $courses = null;

	if ( null !== $courses ) {
		return $courses;
	}

	$courses = array(
		'edi'              => array(
			'id'                => 'edi',
			'slug'              => 'equality-diversity-inclusion-training',
			'icon'              => 'bi-globe2',
			'tag'               => __( 'Equality & Diversity', 'akaza-adventure' ),
			'title'             => __( 'Equality, Diversity and Inclusion Training', 'akaza-adventure' ),
			'subtitle'          => __( 'Help employees recognise discrimination—not only define it', 'akaza-adventure' ),
			'overview'          => array(
				__( 'Equality and diversity affect who gets heard, who receives opportunities, how workplace rules are applied and whether employees feel respected.', 'akaza-adventure' ),
				__( 'The Equality, Diversity and Inclusion Training course helps learners understand the principles behind a fair and inclusive workplace. It examines the consequences of inequality, introduces different types and forms of discrimination and explains the steps employees can take when concerns arise.', 'akaza-adventure' ),
				__( 'The module also introduces equality and discrimination frameworks from multiple jurisdictions, making it relevant to organisations with an internationally distributed workforce.', 'akaza-adventure' ),
			),
			'covers_heading'    => __( 'What the Equality, Diversity and Inclusion Training covers', 'akaza-adventure' ),
			'covers_subheading' => __( 'From workplace principles to practical next steps', 'akaza-adventure' ),
			'covers_intro'      => array(
				__( 'This module walks employees through the ideas that shape a fair workplace, the impact of discrimination, and the legal context organisations operate in across multiple jurisdictions.', 'akaza-adventure' ),
				__( 'Learners also examine types and forms of discrimination, how to raise concerns, and the role every employee can play in supporting inclusion and equity day to day.', 'akaza-adventure' ),
			),
			'detail_blocks'     => array(
				array(
					'type'   => 'text',
					'number' => '01',
					'icon'   => 'bi-people',
					'title'  => __( 'Equality and diversity', 'akaza-adventure' ),
					'body'   => array(
						__( 'Learners explore what equality and diversity mean and why both matter in the workplace. The course considers how fair treatment and respect contribute to a working environment in which people with different characteristics, backgrounds and experiences can participate.', 'akaza-adventure' ),
					),
				),
				array(
					'type'   => 'text',
					'number' => '02',
					'icon'   => 'bi-exclamation-triangle',
					'title'  => __( 'Consequences of inequality and discrimination', 'akaza-adventure' ),
					'body'   => array(
						__( 'Discrimination can affect more than the individual directly involved. It can damage trust, morale, working relationships and confidence in the organisation. The course helps employees understand these wider consequences.', 'akaza-adventure' ),
					),
				),
				array(
					'type'       => 'jurisdictions',
					'number'     => '03',
					'icon'       => 'bi-globe2',
					'title'      => __( 'Legal frameworks around the world', 'akaza-adventure' ),
					'intro'      => __( 'The module introduces equality and discrimination frameworks relevant to:', 'akaza-adventure' ),
					'chips'      => array(
						__( 'India', 'akaza-adventure' ),
						__( 'Canada', 'akaza-adventure' ),
						__( 'Australia', 'akaza-adventure' ),
						__( 'United Arab Emirates', 'akaza-adventure' ),
						__( 'Hong Kong', 'akaza-adventure' ),
						__( 'Japan', 'akaza-adventure' ),
						__( 'Korea', 'akaza-adventure' ),
						__( 'United Kingdom', 'akaza-adventure' ),
						__( 'United States', 'akaza-adventure' ),
						__( 'China', 'akaza-adventure' ),
						__( 'Brazil', 'akaza-adventure' ),
						__( 'European Union', 'akaza-adventure' ),
						__( 'Singapore', 'akaza-adventure' ),
					),
					'disclaimer' => __( 'The course provides general awareness rather than jurisdiction-specific legal advice. Organisations should support training with current local guidance and their own policies.', 'akaza-adventure' ),
				),
				array(
					'type'      => 'chips',
					'number'    => '04',
					'icon'      => 'bi-person-badge',
					'title'     => __( 'Types of discrimination', 'akaza-adventure' ),
					'intro'     => __( 'Learners consider discrimination associated with characteristics and circumstances including:', 'akaza-adventure' ),
					'span_last' => true,
					'chips'     => array(
						__( 'Age', 'akaza-adventure' ),
						__( 'Disability', 'akaza-adventure' ),
						__( 'Gender reassignment', 'akaza-adventure' ),
						__( 'Sexual orientation', 'akaza-adventure' ),
						__( 'Pregnancy and maternity', 'akaza-adventure' ),
						__( 'Race', 'akaza-adventure' ),
						__( 'Religion or belief', 'akaza-adventure' ),
						__( 'Gender', 'akaza-adventure' ),
						__( 'Marriage and civil partnership', 'akaza-adventure' ),
					),
				),
				array(
					'type'   => 'chips',
					'number' => '05',
					'icon'   => 'bi-diagram-3',
					'title'  => __( 'Forms of discrimination', 'akaza-adventure' ),
					'intro'  => __( 'The course goes beyond a single definition and explores how discrimination may appear as:', 'akaza-adventure' ),
					'chips'  => array(
						__( 'Direct discrimination', 'akaza-adventure' ),
						__( 'Indirect discrimination', 'akaza-adventure' ),
						__( 'Associative discrimination', 'akaza-adventure' ),
						__( 'Perceptive discrimination', 'akaza-adventure' ),
						__( 'Victimisation or retaliation', 'akaza-adventure' ),
						__( 'Third-party harassment', 'akaza-adventure' ),
						__( 'Harassment', 'akaza-adventure' ),
					),
				),
				array(
					'type'   => 'text',
					'number' => '06',
					'icon'   => 'bi-chat-left-text',
					'title'  => __( 'Handling discrimination and complaints', 'akaza-adventure' ),
					'body'   => array(
						__( 'Knowing that something is wrong is only the beginning. Employees also need to understand what they can do next.', 'akaza-adventure' ),
						__( 'Depending on the situation and organisational policy, the course introduces possible steps such as objecting and providing feedback, raising the matter with an appropriate manager or reporting the concern to HR.', 'akaza-adventure' ),
					),
				),
				array(
					'type'   => 'text',
					'number' => '07',
					'icon'   => 'bi-shield-check',
					'title'  => __( 'Preventing discrimination and encouraging inclusion', 'akaza-adventure' ),
					'body'   => array(
						__( 'The module concludes by considering the role employees can play in preventing discrimination and encouraging greater diversity, inclusion and equity at work.', 'akaza-adventure' ),
					),
				),
				array(
					'type'   => 'outcomes',
					'number' => '08',
					'icon'   => 'bi-mortarboard',
					'title'  => __( 'Employees will learn to:', 'akaza-adventure' ),
					'chips'  => array(
						__( 'Explain equality, diversity, inclusion and equity', 'akaza-adventure' ),
						__( 'Understand the potential consequences of discrimination', 'akaza-adventure' ),
						__( 'Recognise different types and forms of discrimination', 'akaza-adventure' ),
						__( 'Appreciate that legal requirements vary between jurisdictions', 'akaza-adventure' ),
						__( 'Identify appropriate routes for raising concerns', 'akaza-adventure' ),
						__( 'Support fairer and more respectful workplace practices', 'akaza-adventure' ),
					),
				),
				array(
					'type'   => 'suited',
					'number' => '09',
					'icon'   => 'bi-building-check',
					'title'  => __( 'Best suited for:', 'akaza-adventure' ),
					'body'   => array(
						__( 'Organisations seeking broad employee awareness of equality, discrimination, diversity and inclusive workplace conduct.', 'akaza-adventure' ),
					),
				),
			),
			'contact_lead'      => __( 'See how Equality, Diversity and Inclusion Training fits your workforce, policies and jurisdictions.', 'akaza-adventure' ),
		),
		'unconscious-bias' => array(
			'id'                => 'unconscious-bias',
			'slug'              => 'unconscious-bias-training',
			'icon'              => 'bi-eye-slash',
			'tag'               => __( 'Unconscious Bias', 'akaza-adventure' ),
			'title'             => __( 'Unconscious Bias Training', 'akaza-adventure' ),
			'subtitle'          => __( 'Better decisions begin with a better pause', 'akaza-adventure' ),
			'overview'          => array(
				__( 'Not every unfair workplace decision begins with deliberate intent.', 'akaza-adventure' ),
				__( 'The brain uses patterns and shortcuts to process information quickly. These shortcuts can help people navigate everyday life, but they may also influence how employees evaluate ability, interpret behaviour, assign work or respond to colleagues.', 'akaza-adventure' ),
				__( 'The Unconscious Bias Training course helps employees recognise those automatic assumptions before they become unexamined decisions.', 'akaza-adventure' ),
				__( 'The goal is not to claim that people can remove every bias. It is to develop the awareness and habits required to question initial judgements and make decisions using more relevant, objective information.', 'akaza-adventure' ),
			),
			'covers_heading'    => __( 'What the Unconscious Bias Training covers', 'akaza-adventure' ),
			'covers_subheading' => __( 'From automatic assumptions to more considered workplace choices', 'akaza-adventure' ),
			'covers_intro'      => array(
				__( 'This module helps employees understand how unconscious bias can shape perceptions and decisions at work, often without deliberate intent.', 'akaza-adventure' ),
				__( 'Learners explore common bias types, what fuels them, and practical habits that support more objective, inclusive decision-making.', 'akaza-adventure' ),
			),
			'detail_blocks'     => array(
				array(
					'type'   => 'text',
					'number' => '01',
					'icon'   => 'bi-lightbulb',
					'title'  => __( 'Understanding unconscious bias', 'akaza-adventure' ),
					'body'   => array(
						__( 'Learners explore what unconscious bias means and how it can influence workplace perceptions, interactions and choices—often without the individual realising it.', 'akaza-adventure' ),
					),
				),
				array(
					'type'   => 'text',
					'number' => '02',
					'icon'   => 'bi-graph-up-arrow',
					'title'  => __( 'The impact of bias', 'akaza-adventure' ),
					'body'   => array(
						__( 'An assumption can affect who is recruited, trusted, included, developed or considered ready for progression. Bias may also influence everyday communication and working relationships.', 'akaza-adventure' ),
						__( 'The course encourages employees to consider both the immediate and cumulative impact of these decisions.', 'akaza-adventure' ),
					),
				),
				array(
					'type'  => 'definitions',
					'number'=> '03',
					'icon'  => 'bi-puzzle',
					'title' => __( 'What contributes to unconscious bias?', 'akaza-adventure' ),
					'intro' => __( 'The module examines contributing factors such as:', 'akaza-adventure' ),
					'items' => array(
						array(
							'term'       => __( 'Stereotypes', 'akaza-adventure' ),
							'definition' => __( 'Generalised beliefs applied to individuals because they are assumed to belong to a particular group', 'akaza-adventure' ),
						),
						array(
							'term'       => __( 'Propinquity', 'akaza-adventure' ),
							'definition' => __( 'The influence of familiarity or proximity on relationships, comfort and preference', 'akaza-adventure' ),
						),
					),
				),
				array(
					'type'  => 'definitions',
					'number'=> '04',
					'icon'  => 'bi-collection',
					'title' => __( 'Types of unconscious bias', 'akaza-adventure' ),
					'intro' => __( 'Learners are introduced to:', 'akaza-adventure' ),
					'items' => array(
						array(
							'term'       => __( 'Affinity bias', 'akaza-adventure' ),
							'definition' => __( 'Favouring people perceived as similar to us', 'akaza-adventure' ),
						),
						array(
							'term'       => __( 'Halo bias', 'akaza-adventure' ),
							'definition' => __( 'Allowing one positive quality to dominate an overall judgement', 'akaza-adventure' ),
						),
						array(
							'term'       => __( 'Confirmation bias', 'akaza-adventure' ),
							'definition' => __( 'Looking for information that supports an existing belief', 'akaza-adventure' ),
						),
						array(
							'term'       => __( 'Conformity bias', 'akaza-adventure' ),
							'definition' => __( 'Allowing group opinion to influence personal judgement', 'akaza-adventure' ),
						),
						array(
							'term'       => __( 'Gender bias', 'akaza-adventure' ),
							'definition' => __( 'Making assumptions based on gender', 'akaza-adventure' ),
						),
						array(
							'term'       => __( 'Social comparison bias', 'akaza-adventure' ),
							'definition' => __( 'Responding negatively to someone perceived as more capable or successful', 'akaza-adventure' ),
						),
						array(
							'term'       => __( 'Ageism', 'akaza-adventure' ),
							'definition' => __( 'Making assumptions about ability, attitude or potential based on age', 'akaza-adventure' ),
						),
					),
				),
				array(
					'type'  => 'chips',
					'number'=> '05',
					'icon'  => 'bi-shield-check',
					'title' => __( 'Practical ways to interrupt bias', 'akaza-adventure' ),
					'intro' => __( 'Awareness becomes useful when employees know what to do with it. The course encourages learners to:', 'akaza-adventure' ),
					'chips' => array(
						__( 'Acknowledge that they can be biased', 'akaza-adventure' ),
						__( 'Avoid unsupported assumptions', 'akaza-adventure' ),
						__( 'Practise self-reflection', 'akaza-adventure' ),
						__( 'Use objective decision-making criteria', 'akaza-adventure' ),
						__( 'Consult other people', 'akaza-adventure' ),
						__( 'Consider another person’s perspective', 'akaza-adventure' ),
						__( 'Encourage diversity within teams', 'akaza-adventure' ),
						__( 'Remain open to receiving feedback', 'akaza-adventure' ),
						__( 'Give constructive feedback', 'akaza-adventure' ),
					),
					'body'  => array(
						__( 'An assessment helps learners check their understanding of the course content.', 'akaza-adventure' ),
					),
					'full'  => true,
				),
				array(
					'type'  => 'outcomes',
					'number'=> '06',
					'icon'  => 'bi-mortarboard',
					'title' => __( 'Employees will learn to:', 'akaza-adventure' ),
					'chips' => array(
						__( 'Define unconscious bias', 'akaza-adventure' ),
						__( 'Recognise common workplace biases', 'akaza-adventure' ),
						__( 'Understand how bias may influence decisions and interactions', 'akaza-adventure' ),
						__( 'Question assumptions before acting on them', 'akaza-adventure' ),
						__( 'Apply more objective decision-making practices', 'akaza-adventure' ),
						__( 'Seek perspectives that challenge their initial thinking', 'akaza-adventure' ),
						__( 'Give and receive feedback more openly', 'akaza-adventure' ),
					),
				),
				array(
					'type'  => 'suited',
					'number'=> '07',
					'icon'  => 'bi-building-check',
					'title' => __( 'Best suited for:', 'akaza-adventure' ),
					'body'  => array(
						__( 'Employees, managers, recruiters and decision-makers who need to recognise assumptions and make more considered workplace choices.', 'akaza-adventure' ),
					),
				),
			),
			'contact_lead'      => __( 'See how Unconscious Bias Training helps your teams pause assumptions and make more objective workplace decisions.', 'akaza-adventure' ),
		),
		'bystander'        => array(
			'id'                => 'bystander',
			'slug'              => 'bystander-intervention-training',
			'icon'              => 'bi-people-fill',
			'tag'               => __( 'Bystander Intervention', 'akaza-adventure' ),
			'title'             => __( 'Bystander Intervention Training', 'akaza-adventure' ),
			'subtitle'          => __( 'When something is not right, silence should not feel like the only option', 'akaza-adventure' ),
			'overview'          => array(
				__( 'Witnessing sexual harassment can leave an employee with difficult questions.', 'akaza-adventure' ),
				__( 'Was that behaviour inappropriate? Should I say something? What if I misunderstood? Could intervening make the situation worse? Is there a way to help without confronting the person directly?', 'akaza-adventure' ),
				__( 'Uncertainty can turn a witness into a silent observer—even when they want to support the person affected.', 'akaza-adventure' ),
				__( 'The Bystander Intervention Training course gives employees practical options for responding to potential workplace sexual harassment. It helps learners recognise concerning conduct, understand the bystander effect and select an intervention method appropriate to the situation.', 'akaza-adventure' ),
			),
			'covers_heading'    => __( 'What the Bystander Intervention Training covers', 'akaza-adventure' ),
			'covers_subheading' => __( 'From recognising harm to choosing a safe response', 'akaza-adventure' ),
			'covers_intro'      => array(
				__( 'This module helps employees recognise workplace sexual harassment, understand why bystander action matters, and practise choosing a safe, proportionate response.', 'akaza-adventure' ),
				__( 'Learners explore quid pro quo and hostile work environment harassment, gender identity and expression, the bystander effect, and four practical intervention methods.', 'akaza-adventure' ),
			),
			'detail_blocks'     => array(
				array(
					'type'       => 'definitions',
					'number'     => '01',
					'icon'       => 'bi-exclamation-octagon',
					'title'      => __( 'Recognising sexual harassment', 'akaza-adventure' ),
					'body'       => array(
						__( 'Learners are introduced to workplace sexual harassment and the behaviours that may contribute to an unsafe, intimidating or hostile environment.', 'akaza-adventure' ),
					),
					'intro'      => __( 'The course explains two recognised forms of unlawful sexual harassment:', 'akaza-adventure' ),
					'items'      => array(
						array(
							'term'       => __( 'Quid pro quo sexual harassment', 'akaza-adventure' ),
							'definition' => __( 'When an employment benefit or consequence is linked to accepting or rejecting unwelcome sexual conduct', 'akaza-adventure' ),
						),
						array(
							'term'       => __( 'Hostile work environment sexual harassment', 'akaza-adventure' ),
							'definition' => __( 'When unwelcome conduct creates an intimidating, hostile or offensive working environment, subject to the relevant legal threshold', 'akaza-adventure' ),
						),
					),
					'disclaimer' => __( 'Definitions and requirements vary between jurisdictions. Training should be supported by applicable policies and legal guidance.', 'akaza-adventure' ),
				),
				array(
					'type'   => 'text',
					'number' => '02',
					'icon'   => 'bi-person-hearts',
					'title'  => __( 'Gender identity and gender expression', 'akaza-adventure' ),
					'body'   => array(
						__( 'The module also examines harassment based on gender identity and gender expression. Learners develop a clearer understanding of gender identity and how inappropriate behaviour may target a person’s actual or perceived identity or expression.', 'akaza-adventure' ),
					),
				),
				array(
					'type'   => 'text',
					'number' => '03',
					'icon'   => 'bi-eye',
					'title'  => __( 'Understanding bystander intervention', 'akaza-adventure' ),
					'body'   => array(
						__( 'A bystander is someone who witnesses or becomes aware of inappropriate behaviour. Intervention means choosing a safe and constructive response.', 'akaza-adventure' ),
						__( 'The course explains why intervention matters and explores the bystander effect—the tendency to assume that another person will respond when several people witness the same situation.', 'akaza-adventure' ),
					),
				),
				array(
					'type'  => 'definitions',
					'number'=> '04',
					'icon'  => 'bi-signpost-split',
					'title' => __( 'Four ways to intervene', 'akaza-adventure' ),
					'intro' => __( 'Direct confrontation is not the only response available. The module introduces four practical methods:', 'akaza-adventure' ),
					'items' => array(
						array(
							'term'       => __( 'Distract', 'akaza-adventure' ),
							'definition' => __( 'Interrupt or redirect the situation without directly addressing the behaviour', 'akaza-adventure' ),
						),
						array(
							'term'       => __( 'Direct', 'akaza-adventure' ),
							'definition' => __( 'Clearly address the conduct when it is appropriate and safe', 'akaza-adventure' ),
						),
						array(
							'term'       => __( 'Delegate', 'akaza-adventure' ),
							'definition' => __( 'Seek help from a manager, HR representative or another appropriate person', 'akaza-adventure' ),
						),
						array(
							'term'       => __( 'Delay', 'akaza-adventure' ),
							'definition' => __( 'Check in with the person affected after the incident and offer support', 'akaza-adventure' ),
						),
					),
					'note'  => array(
						__( 'Learners are encouraged to consider the circumstances, the people involved, organisational procedures and personal safety before choosing an approach.', 'akaza-adventure' ),
					),
				),
				array(
					'type'   => 'text',
					'number' => '05',
					'icon'   => 'bi-journal-check',
					'title'  => __( 'Scenario-based practice', 'akaza-adventure' ),
					'body'   => array(
						__( 'Four workplace scenarios give learners an opportunity to consider what they would do in different situations. This practice helps move the topic from theory to practical judgement.', 'akaza-adventure' ),
					),
					'full'   => true,
				),
				array(
					'type'  => 'outcomes',
					'number'=> '06',
					'icon'  => 'bi-mortarboard',
					'title' => __( 'Employees will learn to:', 'akaza-adventure' ),
					'chips' => array(
						__( 'Recognise potential workplace sexual harassment', 'akaza-adventure' ),
						__( 'Understand quid pro quo and hostile work environment harassment', 'akaza-adventure' ),
						__( 'Recognise harassment based on gender identity or expression', 'akaza-adventure' ),
						__( 'Explain the bystander effect', 'akaza-adventure' ),
						__( 'Identify the four intervention methods', 'akaza-adventure' ),
						__( 'Choose a safe and proportionate response', 'akaza-adventure' ),
						__( 'Support a colleague without taking control away from them', 'akaza-adventure' ),
						__( 'Use internal reporting or escalation channels appropriately', 'akaza-adventure' ),
					),
				),
				array(
					'type'  => 'suited',
					'number'=> '07',
					'icon'  => 'bi-building-check',
					'title' => __( 'Best suited for:', 'akaza-adventure' ),
					'body'  => array(
						__( 'Organisations seeking practical sexual-harassment prevention training that helps witnesses understand their response options.', 'akaza-adventure' ),
					),
				),
			),
			'contact_lead'      => __( 'See how Bystander Intervention Training gives witnesses clear, safe options when something is not right.', 'akaza-adventure' ),
		),
	);

	return $courses;
}

/**
 * Get one inclusive course by id.
 *
 * @param string $id Course id: edi|unconscious-bias|bystander.
 * @return array<string, mixed>|null
 */
function akaza_get_inclusive_course( $id ) {
	$courses = akaza_get_inclusive_courses();
	return isset( $courses[ $id ] ) ? $courses[ $id ] : null;
}

/**
 * Public URL for an inclusive course page.
 *
 * @param string $id Course id.
 * @return string
 */
function akaza_inclusive_course_url( $id ) {
	$course = akaza_get_inclusive_course( $id );
	if ( ! $course || empty( $course['slug'] ) ) {
		return home_url( '/' );
	}
	return home_url( '/' . trailingslashit( $course['slug'] ) );
}
