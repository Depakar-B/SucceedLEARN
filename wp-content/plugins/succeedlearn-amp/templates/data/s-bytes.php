<?php
/**
 * S-Bytes — AMP data helpers.
 *
 * Content mirrors the desktop partials (template-parts/s-bytes/*).
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Include an S-Bytes section partial.
 *
 * @param string $name Partial basename without .php.
 */
function succeedlearn_amp_sbytes_partial( $name ) {
	$path = SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'partials/s-bytes/' . sanitize_file_name( (string) $name ) . '.php';
	if ( is_readable( $path ) ) {
		include $path;
	}
}

/**
 * @return string
 */
function succeedlearn_amp_get_sbytes_canonical_url() {
	$fallback = home_url( '/security-awareness/s-bytes/' );
	foreach ( array(
		's-bytes',
		's-byte',
		'security-awareness/s-bytes',
	) as $slug ) {
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
function succeedlearn_amp_get_sbytes_page_title() {
	return __( 'Information Security Awareness Microlearning Series', 'succeedlearn-amp' );
}

/**
 * @return string
 */
function succeedlearn_amp_get_sbytes_meta_description() {
	return __( 'S-Bytes is the continuous microlearning layer of the SucceedLEARN Security Behaviour & Culture Suite. The FunFoSec series delivers short, engaging, humour-driven cybersecurity awareness videos that keep secure behaviours top of mind all year.', 'succeedlearn-amp' );
}

/**
 * YouTube video ID for the "Meet S-Bytes" section.
 *
 * @return string
 */
function succeedlearn_amp_get_sbytes_meet_video_id() {
	return 'feUvTcuxHl0';
}

/**
 * Hero image (matches live desktop: Meet-S-Bytes-FunFoSec.webp).
 *
 * @return string
 */
function succeedlearn_amp_get_sbytes_hero_image() {
	return succeedlearn_amp_upload_url( '2026/09/Meet-S-Bytes-FunFoSec.webp' );
}

/**
 * @return string
 */
function succeedlearn_amp_get_sbytes_why_image() {
	return succeedlearn_amp_upload_url( '2026/09/FunFoSec-Microlearning-Free-Cloud-Fiasco.webp' );
}

/**
 * @return string
 */
function succeedlearn_amp_get_sbytes_fatigue_image() {
	return succeedlearn_amp_upload_url( '2026/09/S-Bytes-Security-Awareness-Without-Fatigue.webp' );
}

/**
 * @return string
 */
function succeedlearn_amp_get_sbytes_works_image() {
	return succeedlearn_amp_upload_url( '2026/10/S-Bytes-Campaign-Four-Steps.webp' );
}

/**
 * @return string
 */
function succeedlearn_amp_get_sbytes_delivered_image() {
	return succeedlearn_amp_upload_url( '2026/09/Awareness-Delivered-where-employees-work.webp' );
}

/**
 * @return string
 */
function succeedlearn_amp_get_sbytes_visibility_image() {
	return succeedlearn_amp_upload_url( '2026/09/S-Bytes-Continuous-Learning-Visibility.webp' );
}

/**
 * @return string
 */
function succeedlearn_amp_get_sbytes_suite_image() {
	return succeedlearn_amp_upload_url( '2026/09/From-Awareness-to-Real-World-Readiness.webp' );
}

/**
 * @return string[]
 */
function succeedlearn_amp_get_sbytes_fatigue_points() {
	return array(
		__( 'Reinforcing concepts introduced during annual security awareness training', 'succeedlearn-amp' ),
		__( 'Recurring security awareness initiatives', 'succeedlearn-amp' ),
		__( 'Highlighting emerging cybersecurity risks', 'succeedlearn-amp' ),
		__( 'Refreshing previously learned security concepts', 'succeedlearn-amp' ),
		__( 'Maintaining awareness between formal training cycles', 'succeedlearn-amp' ),
	);
}

/**
 * @return array<int, array{title:string,text:string}>
 */
function succeedlearn_amp_get_sbytes_consume_items() {
	return array(
		array(
			'title' => __( 'Bite-Sized Learning', 'succeedlearn-amp' ),
			'text'  => __( 'Each FunFoSec video focuses on a specific cybersecurity concept and is designed to be consumed within a few minutes.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Relatable Storytelling', 'succeedlearn-amp' ),
			'text'  => __( 'Security concepts are brought to life through workplace situations and everyday digital experiences rather than presented only through definitions and policies.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Humour-Driven Engagement', 'succeedlearn-amp' ),
			'text'  => __( "Cybersecurity is serious. Learning about it doesn't always have to feel serious. FunFoSec uses humour to make security topics approachable and memorable while keeping the underlying awareness message clear.", 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Simple, Practical Language', 'succeedlearn-amp' ),
			'text'  => __( 'Complex cybersecurity concepts are translated into straightforward messages employees can understand regardless of their level of technical expertise.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Easy Access', 'succeedlearn-amp' ),
			'text'  => __( 'Microlearning can be delivered directly to employees in their inbox, helping reduce unnecessary barriers between the learner and the awareness experience.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Regular Reinforcement', 'succeedlearn-amp' ),
			'text'  => __( 'Organisations can create recurring awareness touchpoints that help employees revisit security concepts throughout the year rather than relying exclusively on annual training.', 'succeedlearn-amp' ),
		),
	);
}

/**
 * FunFoSec library: topics and videos (mirrors s-byte-library-data.php).
 *
 * Each video: title, description, file (path under uploads/).
 *
 * @return array<int, array{id:string,label:string,videos:array<int,array{title:string,description:string,file:string}>}>
 */
function succeedlearn_amp_get_sbytes_library_topics() {
	return array(
		array(
			'id'     => 'physical-security',
			'label'  => 'Physical Security',
			'videos' => array(
				array(
					'title'       => 'Clean Desk Policy: More Than Just Wiping Away Dust!',
					'description' => 'Understand the importance of securing sensitive information physically, beyond just tidying the desk.',
					'file'        => '2025/08/Clean-Desk-Policy-1-1.jpg',
				),
				array(
					'title'       => 'The Dinner, The Dash, and the Laptop Panic!',
					'description' => 'Bob highlights the risks associated with leaving company laptops unattended while traveling or in public areas.',
					'file'        => '2025/08/Travelling-with-Laptops.jpg',
				),
				array(
					'title'       => 'Gentleman in Crisis: Bob vs. The Endless Queue!',
					'description' => 'Humorous insights on how politeness can lead to serious physical security breaches through tailgating.',
					'file'        => '2025/08/Tailgating.jpg',
				),
				array(
					'title'       => "Bob's Wild Visitor Adventure: Importance of Visitor Management",
					'description' => "The necessity of strict visitor management, hilariously depicted through Bob's chaotic visitor experience.",
					'file'        => '2025/08/Visitor-Management-1.jpg',
				),
			),
		),
		array(
			'id'     => '3rd-party-apps',
			'label'  => '3rd Party Apps',
			'videos' => array(
				array(
					'title'       => "Navigating the AI Wave: Safe Use of AI Dos and Don'ts",
					'description' => 'Risks of unauthorized AI tool usage demonstrated by Richard, emphasizing safe and compliant use of AI.',
					'file'        => '2025/08/Safe-Use-of-AI.jpg',
				),
				array(
					'title'       => "Richard's Presentation Predicament: Click Wrap Agreements",
					'description' => 'Richard learns the pitfalls of casually accepting online license agreements without reading.',
					'file'        => '2025/08/Click-Wrap-Agreement.jpg',
				),
			),
		),
		array(
			'id'     => 'account-security',
			'label'  => 'Account Security',
			'videos' => array(
				array(
					'title'       => 'Password Pandemonium',
					'description' => "Demonstrates the dangers of weak passwords through Bob's humorous yet eye-opening experience.",
					'file'        => '2025/08/Password-Pandomonium.jpg',
				),
				array(
					'title'       => "Bob's Weekend and the MFA Fatigue Fraud",
					'description' => 'Bob experiences how persistent authentication prompts can lead to account compromise via MFA fatigue attacks.',
					'file'        => '2025/08/MFA-Fatigue.jpg',
				),
				array(
					'title'       => "Bob Locks it All, But What's Missing? (2FA)",
					'description' => "Importance of Two-Factor Authentication shown by Bob's incomplete security measures.",
					'file'        => '2025/08/MFA.jpg',
				),
				array(
					'title'       => 'Protect Your Mobile Devices: A Cautionary Tale',
					'description' => 'Simple yet essential tips to safeguard mobile devices and the valuable data they contain.',
					'file'        => '2025/08/Mobile-Device-Security.jpg',
				),
				array(
					'title'       => "Click, Crash, Chaos: A Senior Manager's Cyber Slip-Up",
					'description' => "Senior managers' account security is critical, highlighted through Bob's hilarious yet cautionary mishap.",
					'file'        => '2025/08/Senior-Management-Account-Security.jpg',
				),
			),
		),
		array(
			'id'     => 'remote-working',
			'label'  => 'Remote Working',
			'videos' => array(
				array(
					'title'       => "Public WiFi Perils: Bob's Brewing Disaster",
					'description' => "Risks of unsecured WiFi networks humorously illustrated through Bob's coffee-shop catastrophe.",
					'file'        => '2025/08/Unsecure-WIFI.jpg',
				),
				array(
					'title'       => 'Work from Home Gone Wild',
					'description' => "Protecting office devices at home becomes crucial in Jane's funny yet instructional remote-work scenario.",
					'file'        => '2025/08/WFH-1.jpg',
				),
				array(
					'title'       => 'The Perils of Public Display of Information',
					'description' => 'Risks involved with unintentionally exposing company data in public spaces, vividly depicted.',
					'file'        => '2025/08/Public-conversation.jpg',
				),
				array(
					'title'       => 'Meeting Mayhem: Lost Control',
					'description' => 'How insecure video conferencing settings can lead to serious privacy and security embarrassments.',
					'file'        => '2025/08/Video-Conferencing-Security.jpg',
				),
				array(
					'title'       => 'The Mobile Life: Balancing Connection and Security',
					'description' => 'Strategies for securing mobile work devices without sacrificing connectivity or convenience.',
					'file'        => '2025/08/Mobile-Phone-Potection.jpg',
				),
			),
		),
		array(
			'id'     => 'social-engineering',
			'label'  => 'Social Engineering',
			'videos' => array(
				array(
					'title'       => "Bob's WhatsApp Woes: A Cautionary Tale",
					'description' => "Bob's casual WhatsApp communications highlight how easily unofficial messaging can jeopardize data security.",
					'file'        => '2025/08/WhatsApp-Woes.jpg',
				),
				array(
					'title'       => "Richard's Over-Share Ordeal",
					'description' => 'Demonstrates the dangers of oversharing sensitive information through social media channels.',
					'file'        => '2025/08/Social-Media-Usage.jpg',
				),
				array(
					'title'       => 'Conversation Hijack and the Moonwalk Menace',
					'description' => 'How hijacked conversations lead to serious data breaches, wrapped in comedic missteps.',
					'file'        => '2025/08/Conversation-Hijack-2.jpg',
				),
				array(
					'title'       => "Richard's Close Call: The Perils of Deep Fake Attacks",
					'description' => "Introduction to the deep fake threat with Richard's funny yet alarming incident.",
					'file'        => '2025/08/Deep-Fakes.jpg',
				),
				array(
					'title'       => 'A Whale of a Mistake',
					'description' => 'Pete learns how hackers target senior executives through urgent requests (whaling), leading to a humorous office disaster.',
					'file'        => '2025/08/Whaling-1.jpg',
				),
				array(
					'title'       => "Richard's Work-life Imbalance: Costly Communication",
					'description' => 'The hazards of using WhatsApp for official business communications, leading to significant misunderstandings.',
					'file'        => '2025/08/WhatsApp-Communications-for-Official-Use.jpg',
				),
			),
		),
		array(
			'id'     => 'phishing',
			'label'  => 'Phishing',
			'videos' => array(
				array(
					'title'       => 'Bob Tweets, Scammers Eat!',
					'description' => 'Demonstrates Angler phishing attacks, where public complaints are exploited by scammers.',
					'file'        => '2025/08/Angler-Phishing.jpg',
				),
				array(
					'title'       => "The Cost of Free: Richard's Phishing Lesson",
					'description' => 'Richard learns the hard way that irresistible offers can be costly phishing scams.',
					'file'        => '2025/08/Attractive-Offer.jpg',
				),
				array(
					'title'       => "Bob's Email Scare: A Lesson in Online Security",
					'description' => 'Bob faces an urgent phishing email attack, emphasizing caution with unsolicited urgent messages.',
					'file'        => '2025/08/Phishing-email.jpg',
				),
				array(
					'title'       => "Jane's Digital Arrest: A Lesson in Phone Scam Awareness",
					'description' => 'Jane experiences a dramatic phone scam (vishing), highlighting the risks of digital arrest scams.',
					'file'        => '2025/08/Vishing-Digital-Arrest.jpg',
				),
				array(
					'title'       => 'The Mysterious Link: A Short Trip to Trouble',
					'description' => 'Bob encounters shortened-link phishing (SmartLinks) on LinkedIn, highlighting the dangers of clicking without verification.',
					'file'        => '2025/08/LinkedIn-Smartlink.jpg',
				),
				array(
					'title'       => 'A Smishing Adventure',
					'description' => 'Bob falls victim to SMS-based phishing (smishing), demonstrating the risks of trusting suspicious text messages.',
					'file'        => '2025/08/Smishing.jpg',
				),
				array(
					'title'       => "Jane's Cybersecurity Chronicles: The New Threat Called Quishing",
					'description' => "QR codes as phishing vectors explored through Jane's humorous yet cautionary story.",
					'file'        => '2025/08/Quishing.jpg',
				),
			),
		),
		array(
			'id'     => 'malware',
			'label'  => 'Malware',
			'videos' => array(
				array(
					'title'       => 'Finders Keepers? More Like Finders Weepers!',
					'description' => "Dangers of unknown USB drives humorously illustrated through Richard's experience.",
					'file'        => '2025/08/Baiting.jpg',
				),
				array(
					'title'       => "Ransomware: Because Hackers Don't Do Free Trials!",
					'description' => 'Jane learns how ransomware can lock critical data and demand payment, highlighting protective measures.',
					'file'        => '2025/08/Ransomware-SMT.jpg',
				),
				array(
					'title'       => 'Free Protection? More Like Free Trouble!',
					'description' => "Free antivirus scams and malware, vividly illustrated through Bob's adventures.",
					'file'        => '2025/08/Scareware.jpg',
				),
				array(
					'title'       => 'The Update Dilemma: Why System Updates Matter',
					'description' => "Importance of timely software updates depicted humorously through Bob and Jane's update saga.",
					'file'        => '2025/08/Updating-your-PC.jpg',
				),
				array(
					'title'       => "Secure Downloads: Bob's Digital Misadventure",
					'description' => "Risks associated with downloading unauthorized files, illustrated through Bob's movie mishap.",
					'file'        => '2025/08/Movie-Download.jpg',
				),
			),
		),
		array(
			'id'     => 'data-classification',
			'label'  => 'Data Classification',
			'videos' => array(
				array(
					'title'       => 'Label It or Lose It: Bob Learns the Hard Way!',
					'description' => 'The importance of classifying and protecting information based on sensitivity, humorously depicted through Bob.',
					'file'        => '2025/08/Classifying-Documents.jpg',
				),
			),
		),
		array(
			'id'     => 'incident-reporting',
			'label'  => 'Incident Reporting',
			'videos' => array(
				array(
					'title'       => 'The Responsibility of Reporting: Security Incident Awareness',
					'description' => 'Importance of promptly reporting incidents, through comedic scenarios involving Bob, Jane, and Richard.',
					'file'        => '2025/08/Reporting-Security-Incidents.jpg',
				),
			),
		),
		array(
			'id'     => 'privacy-data-protection',
			'label'  => 'Privacy & Data Protection',
			'videos' => array(
				array(
					'title'       => 'Free Cloud Fiasco: Unapproved Cloud Storage',
					'description' => "Dangers of unauthorized cloud services demonstrated by Bob's significant security breach.",
					'file'        => '2025/09/image.jpg',
				),
				array(
					'title'       => "Richard's Vendor Dilemma: The NDA Balancing Act",
					'description' => "Importance of NDAs in vendor engagements shown through Richard's humorous yet insightful scenario.",
					'file'        => '2025/08/Vendor-Management.jpg',
				),
				array(
					'title'       => 'Teamwork: The Smart Way to Share Documents',
					'description' => 'Secure document-sharing practices demonstrated in a funny yet informative team scenario.',
					'file'        => '2025/08/Sharing-Documents.jpg',
				),
				array(
					'title'       => 'The Print Out Predicament',
					'description' => "Risks of unattended confidential printouts highlighted through Richard's amusing office adventure.",
					'file'        => '2025/08/Network-Printing.jpg',
				),
				array(
					'title'       => "Bob's Big Broadcast: The Email That Overshared",
					'description' => 'Bob humorously showcases the perils of carelessly sending bulk emails without verifying recipients and attachments.',
					'file'        => '2025/08/Safe-Emailing-Bulk.jpg',
				),
				array(
					'title'       => 'Richard and His Beloved Hard Drive: A Heartbreaking Backup Story',
					'description' => 'Richard discovers the security risks associated with external storage devices after misplacing sensitive company data.',
					'file'        => '2025/08/External-Storage.jpg',
				),
			),
		),
	);
}

/**
 * @return array<int, array{title:string,paragraphs:string[]}>
 */
function succeedlearn_amp_get_sbytes_works_steps() {
	return array(
		array(
			'title'      => __( 'Select S-Bytes', 'succeedlearn-amp' ),
			'paragraphs' => array(
				__( 'Choose FunFoSec videos based on the cybersecurity topics and behaviours your organisation wants to reinforce.', 'succeedlearn-amp' ),
				__( 'The growing library allows organisations to address both foundational security concepts and evolving cyber risks.', 'succeedlearn-amp' ),
			),
		),
		array(
			'title'      => __( 'Select Users', 'succeedlearn-amp' ),
			'paragraphs' => array(
				__( 'Microlearning Campaigns can be deployed organisation-wide or customised for specific groups based on teams, location, custom user groups etc.', 'succeedlearn-amp' ),
			),
		),
		array(
			'title'      => __( 'Schedule', 'succeedlearn-amp' ),
			'paragraphs' => array(
				__( "S-Bytes provides flexible campaign scheduling options. Rather than delivering multiple microlearning's at once, organisations can distribute focused learning at regular intervals to create continuous awareness throughout the year.", 'succeedlearn-amp' ),
				__( 'Determine how frequently employees should receive microlearning based on your security awareness strategy.', 'succeedlearn-amp' ),
			),
		),
		array(
			'title'      => __( 'Review', 'succeedlearn-amp' ),
			'paragraphs' => array(
				__( 'Before launching, administrators can review every campaign setting. Once reviewed, campaigns can be launched with a single click, allowing organisations to track the campaign and user status.', 'succeedlearn-amp' ),
			),
		),
	);
}

/**
 * "Why S-Bytes?" (FunFoSec) benefit cards.
 *
 * @return array<int, array{title:string,text:string}>
 */
function succeedlearn_amp_get_sbytes_funfosec_items() {
	return array(
		array(
			'title' => __( 'Bite-Sized Learning', 'succeedlearn-amp' ),
			'text'  => __( 'Each microlearning video is designed to be completed in just 3-5 minutes, making it easy for employees to learn without disrupting their workday. Short, focused learning improves participation, reduces learning fatigue, and helps reinforce key security concepts more effectively than lengthy training sessions.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Learn Without Disruption', 'succeedlearn-amp' ),
			'text'  => __( 'FunFoSec videos are delivered directly to employees through email, eliminating the need for additional logins or lengthy LMS sessions. Employees can access learning instantly across devices, making continuous security awareness simple, convenient, and easy to incorporate into their daily routine.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Engaging & Memorable', 'succeedlearn-amp' ),
			'text'  => __( 'Using humour, relatable workplace situations, and storytelling, FunFoSec transforms traditional security awareness into an engaging learning experience. By making complex cybersecurity topics easier to understand and remember, employees are more likely to retain knowledge and apply secure behaviours in real-world situations.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Flexible Delivery & Progress Tracking', 'succeedlearn-amp' ),
			'text'  => __( 'Organisations can schedule and distribute microlearning campaigns based on their awareness strategy while tracking employee participation and completion. This enables administrators to monitor engagement, measure learning progress, and support ongoing security awareness initiatives with greater visibility.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Continuous Reinforcement', 'succeedlearn-amp' ),
			'text'  => __( 'Security awareness is most effective when learning is reinforced consistently. FunFoSec delivers regular microlearning that keeps cybersecurity top of mind, helping employees retain critical concepts, adapt to emerging threats, and develop secure behaviours throughout the year rather than only during annual training.', 'succeedlearn-amp' ),
		),
	);
}

/**
 * @return array<int, array{title:string,text:string}>
 */
function succeedlearn_amp_get_sbytes_employees() {
	return array(
		array(
			'title' => __( 'New Joiners', 'succeedlearn-amp' ),
			'text'  => __( 'Reinforce foundational security concepts after onboarding and keep awareness active as employees settle into their roles.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Employees Across the Organisation', 'succeedlearn-amp' ),
			'text'  => __( 'Deliver short and understandable security messages to employees across functions and levels of technical knowledge.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Managers & People Leaders', 'succeedlearn-amp' ),
			'text'  => __( 'Keep important security behaviours visible for employees responsible for teams, information and organisational decision-making.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Remote & Hybrid Workforces', 'succeedlearn-amp' ),
			'text'  => __( 'Reinforce security behaviours relevant to employees working across offices, homes, public environments and distributed teams.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Busy Workforces', 'succeedlearn-amp' ),
			'text'  => __( 'Introduce regular awareness without repeatedly taking employees away from their work for lengthy training sessions.', 'succeedlearn-amp' ),
		),
	);
}

/**
 * @return array<int, array{title:string,text:string}>
 */
function succeedlearn_amp_get_sbytes_teams() {
	return array(
		array(
			'title' => __( 'Information Security & Cybersecurity Teams', 'succeedlearn-amp' ),
			'text'  => __( 'Keep important security risks visible and reinforce employee behaviours between formal training and simulation activities.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Compliance & Risk Teams', 'succeedlearn-amp' ),
			'text'  => __( 'Support ongoing awareness initiatives and demonstrate that security communication extends beyond a single annual training event.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Learning & Development Teams', 'succeedlearn-amp' ),
			'text'  => __( 'Introduce bite-sized learning into broader employee development programmes without creating unnecessary learning fatigue.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'HR & People Teams', 'succeedlearn-amp' ),
			'text'  => __( 'Incorporate regular security awareness into the employee experience and help maintain security messaging throughout the employee lifecycle.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Leadership', 'succeedlearn-amp' ),
			'text'  => __( 'Support a culture in which cybersecurity remains visible and relevant across the organisation throughout the year.', 'succeedlearn-amp' ),
		),
	);
}

/**
 * Suite products from global SBCS component.
 *
 * @return array<int, array{name:string,action:string,description:string}>
 */
function succeedlearn_amp_get_sbytes_suite_items() {
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
 * @return array<int, array{question:string,answer:string}>
 */
function succeedlearn_amp_get_sbytes_faq_items() {
	$pairs = array(
		array( __( 'What is cybersecurity awareness microlearning?', 'succeedlearn-amp' ), __( 'Cybersecurity awareness microlearning delivers short, focused learning experiences that reinforce individual security topics and behaviours. Instead of relying only on longer annual training, microlearning provides regular awareness touchpoints throughout the year.', 'succeedlearn-amp' ) ),
		array( __( 'What is S-Bytes?', 'succeedlearn-amp' ), __( 'S-Bytes is the continuous microlearning solution within the SucceedLEARN Security Behaviour & Culture Suite. Through the FunFoSec Microlearning Series, it delivers short, engaging cybersecurity awareness content designed around relatable situations, storytelling and practical security behaviours.', 'succeedlearn-amp' ) ),
		array( __( 'What is the FunFoSec Microlearning Series?', 'succeedlearn-amp' ), __( "FunFoSec is SucceedLEARN's cybersecurity microlearning series delivered through S-Bytes. It uses relatable workplace situations, simple language, storytelling and humour to make cybersecurity concepts easier for employees to understand and remember.", 'succeedlearn-amp' ) ),
		array( __( 'How long are S-Bytes microlearning videos?', 'succeedlearn-amp' ), __( 'Each S-Bytes microlearning video is designed to be completed in approximately 3-5 minutes, allowing employees to reinforce important cybersecurity concepts without significantly interrupting their workday.', 'succeedlearn-amp' ) ),
		array( __( 'What cybersecurity topics are covered in S-Bytes?', 'succeedlearn-amp' ), __( 'The FunFoSec library covers a growing range of cybersecurity topics through short, scenario-based learning experiences. Organisations can select videos based on the specific security topics and behaviours they want to reinforce across their workforce.', 'succeedlearn-amp' ) ),
		array( __( 'How is S-Bytes microlearning delivered to employees?', 'succeedlearn-amp' ), __( 'Unique learning links can be delivered directly to employees through channels such as email, WhatsApp or Teams, allowing employees to access the assigned microlearning without requiring an additional learner login.', 'succeedlearn-amp' ) ),
		array( __( 'Can organisations schedule recurring cybersecurity microlearning?', 'succeedlearn-amp' ), __( 'Yes. S-Bytes provides flexible campaign scheduling, allowing organisations to distribute focused microlearning at regular intervals based on their security awareness strategy rather than delivering multiple lessons at once.', 'succeedlearn-amp' ) ),
		array( __( 'Can S-Bytes microlearning be assigned to specific employee groups?', 'succeedlearn-amp' ), __( 'Yes. Microlearning campaigns can be deployed organisation-wide or assigned to specific groups based on factors such as teams, locations and custom user groups, enabling more targeted security awareness initiatives.', 'succeedlearn-amp' ) ),
		array( __( 'Can organisations track employee participation and completion?', 'succeedlearn-amp' ), __( 'Yes. S-Bytes enables administrators to monitor employee participation and completion, helping them understand whether assigned microlearning is reaching the workforce and where additional communication or reinforcement may be needed. S-Bytes activity can also contribute to broader security-awareness measurement through S-Metrics when used as part of the wider SBCS ecosystem.', 'succeedlearn-amp' ) ),
		array( __( 'Does S-Bytes replace annual security awareness training?', 'succeedlearn-amp' ), __( 'No. S-Bytes is designed to complement foundational security awareness training, not replace it. Short microlearning interventions help reinforce previously learned concepts, highlight emerging cyber risks and maintain employee awareness between formal training cycles.', 'succeedlearn-amp' ) ),
	);

	$items = array();
	foreach ( $pairs as $pair ) {
		$items[] = array(
			'question' => $pair[0],
			'answer'   => '<p>' . esc_html( $pair[1] ) . '</p>',
		);
	}

	return $items;
}

/**
 * FAQPage JSON-LD for the S-Bytes AMP page.
 *
 * @return array<string, mixed>
 */
function succeedlearn_amp_sbytes_faq_schema() {
	$entities = array();
	foreach ( succeedlearn_amp_get_sbytes_faq_items() as $item ) {
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
