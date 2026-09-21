<?php
/**
 * Blog demo seed — dummy posts and categories for local/testing.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Demo category definitions.
 *
 * @return array<int, array{name: string, slug: string, description: string}>
 */
function akaza_blog_demo_categories_data() {
	return array(
		array(
			'name'        => 'Compliance',
			'slug'        => 'compliance',
			'description' => 'Regulatory compliance updates and practical guidance for global teams.',
		),
		array(
			'name'        => 'Security Awareness',
			'slug'        => 'security-awareness',
			'description' => 'Cybersecurity culture, phishing prevention, and security training insights.',
		),
		array(
			'name'        => 'Data Privacy',
			'slug'        => 'data-privacy',
			'description' => 'GDPR, DPDPA, and privacy programme best practices.',
		),
		array(
			'name'        => 'Workplace Culture',
			'slug'        => 'workplace-culture',
			'description' => 'Building respectful, inclusive, and psychologically safe workplaces.',
		),
		array(
			'name'        => 'HR Training',
			'slug'        => 'hr-training',
			'description' => 'Learning design, engagement, and rollout strategies for HR and L&D teams.',
		),
	);
}

/**
 * Demo post definitions.
 *
 * @return array<int, array{title: string, slug: string, excerpt: string, content: string, categories: string[], days_ago: int}>
 */
function akaza_blog_demo_posts_data() {
	return array(
		array(
			'title'      => 'Building a Global Compliance Programme That Actually Works',
			'slug'       => 'demo-blog-global-compliance-programme',
			'excerpt'    => 'Most compliance programmes fail because they treat training as a checkbox. Here is how to design learning that changes behaviour across regions.',
			'content'    => '<!-- wp:paragraph -->
<p>Global organisations face a common challenge: policies written at headquarters do not always translate into everyday decisions in regional offices. A programme that looks complete on a dashboard can still leave people unsure what to do when a gift, a vendor request, or a data-sharing question lands on their desk. The difference between a paper programme and a working one is whether employees can apply the rules under pressure—not whether they clicked through an annual module.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>This guide walks through how to design a global compliance programme that holds up across regions, roles, and regulators. It is written for HR, legal, and L&amp;D leaders who already have policies in place and need learning that changes behaviour.</p>
<!-- /wp:paragraph -->

<!-- wp:heading -->
<h2>Why most global programmes stall after launch</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Many programmes launch with a strong policy pack, a single e-learning course, and a completion target. Six months later, completion is high and incidents have not moved. That gap usually comes from three design choices: content written only for headquarters, a single course for every role, and success defined as “finished the module.”</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Regional teams then quietly invent their own shortcuts. Managers skip conversations because they do not know how to handle grey areas. New joiners copy what they see, not what they were told in week one. The programme still exists in the LMS; it just is not present in the work.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Treat stall as a design problem, not a motivation problem. People will engage when the material helps them do their job without getting themselves—or the company—into trouble.</p>
<!-- /wp:paragraph -->

<!-- wp:heading -->
<h2>Start with a risk-based curriculum map</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Begin with the risks that actually matter for your operating model: bribery in sales-heavy markets, harassment in hybrid teams, data handling in customer-support centres, sanctions in cross-border finance. Map each risk to the roles that can create or prevent it. That map becomes the spine of your curriculum.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>A risk-based map also stops you from training everyone on everything. Finance needs deeper gifts-and-hospitality scenarios than warehouse teams. People managers need investigation-adjacent skills that individual contributors do not. When every audience gets the same 45-minute course, the people with the highest risk still leave underprepared.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Review the map with legal, HR, security, and a small group of regional leads. Their job is not to add every possible topic. It is to confirm which situations employees actually face this year.</p>
<!-- /wp:paragraph -->

<!-- wp:heading -->
<h2>Localise without rewriting everything</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Global standards can stay global: speak up, protect data, refuse bribes, treat people with respect. Localisation is about examples, language, and escalation paths. A gifts scenario that uses a US client dinner will not land in a market where festival hospitality is the real pressure point.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Build a core module once, then swap regional case studies, local hotline details, and manager contacts. Translate for meaning, not word-for-word. If a phrase has no cultural equivalent, rewrite the scene rather than forcing a clumsy translation.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Ask two people in each major region to review scenarios before launch. They will catch details headquarters will miss: job titles, public holidays, how people actually request approvals.</p>
<!-- /wp:paragraph -->

<!-- wp:heading -->
<h2>Role-based learning beats one-size-fits-all</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Split audiences into at least three tracks: all employees, people managers, and high-risk functions such as sales, procurement, and IT. All-employee content should be short and practical. Manager content should cover how to respond when someone raises a concern. High-risk tracks should go deeper on the decisions those teams make every week.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>New joiners need a tighter path than ten-year veterans. Give joiners the non-negotiables in the first 30 days, then layer role-specific modules after they have context. Veterans benefit more from refreshers tied to new risks or incidents than from repeating last year’s course.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>If your LMS cannot segment cleanly, start with two tracks rather than waiting for a perfect taxonomy. A rough split that people recognise is better than a perfect matrix nobody uses.</p>
<!-- /wp:paragraph -->

<!-- wp:heading -->
<h2>Measure application, not just completion</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Completion tells you the assignment was delivered. It does not tell you whether someone can identify a conflict of interest or report a phishing message. Add knowledge checks that use realistic choices, not trivia about policy section numbers.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Useful metrics include time-to-report after a simulation, manager confidence in handling a speak-up conversation, and whether high-risk teams can explain the approval path without opening the policy PDF. Share those numbers with leadership in the same pack as completion rates so the conversation does not stop at “green on the dashboard.”</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>When scores are weak in one region or role, treat it as a content or process issue. Re-assigning the same module rarely fixes a scenario that did not match the work.</p>
<!-- /wp:paragraph -->

<!-- wp:heading -->
<h2>Reinforce with microlearning instead of an annual event</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>A once-a-year course is easy to schedule and easy to forget. Behaviour sticks when people see short reminders in the flow of work: a two-minute clip before peak sales season, a checklist before festival gifting, a manager huddle guide after a public incident in the industry.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Plan a 12-month cadence at design time. Core course in Q1, two or three targeted refreshers, and an always-on library for new joiners. Keep refreshers under ten minutes. If a topic needs more depth, it belongs in the role-based track, not in a “quick” reminder.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Use the same characters and decisions across the year so people recognise the story. Reinforcement is not a new campaign every quarter. It is the same standard, practised again when the risk is live.</p>
<!-- /wp:paragraph -->

<!-- wp:heading -->
<h2>Equip managers as the first line of culture</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Employees watch what managers do after a mistake more closely than they watch the LMS. If a report is met with irritation, silence becomes the rational choice. Manager training should cover listening, documenting fairly, escalating, and closing the loop with the person who spoke up.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Give managers a one-page conversation guide, not another 40-minute lecture. Include phrases they can use, what not to promise, and when to stop and call HR or legal. Practise with short role-plays. Confidence comes from rehearsal, not from reading a policy summary.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Hold managers accountable for completion in their teams and for the quality of follow-up. A team that finishes every module but never raises issues is not automatically a low-risk team.</p>
<!-- /wp:paragraph -->

<!-- wp:heading -->
<h2>Close the loop from incidents to content</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Your strongest curriculum updates come from real events: a near-miss, a hotline theme, a vendor issue, a phishing wave. Build a quarterly review where ethics, HR, and security share anonymised patterns and decide which scenarios to add or rewrite.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Do not wait for a full annual refresh if a new risk is already in the business. A short module on a live issue beats a perfect course that ships nine months later. Tell employees why the update exists. People take content more seriously when they can see it is connected to work, not to a calendar.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>When you change a process—new approval tool, new speak-up channel—update the learning in the same release. Training that describes last year’s workflow trains people to do the wrong thing confidently.</p>
<!-- /wp:paragraph -->

<!-- wp:heading -->
<h2>Build an audit-ready evidence trail</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Regulators and customers will ask who was trained, on what, when, and how you handled exceptions. Design reporting before launch: assignment rules, completion evidence, assessment scores, and a record of who was exempted and why.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Store certificates and transcripts in a system you can search by legal entity and location. If contractors and vendors are in scope, they need the same evidence standard as employees, even if the course is shorter.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Audits go faster when you can show the risk map, the audience split, and how incidents fed back into content. That story is more convincing than a screenshot of 98% completion with no context.</p>
<!-- /wp:paragraph -->

<!-- wp:heading -->
<h2>A 90-day rollout plan you can actually run</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Days 1–30: lock the risk map, confirm audiences, and draft core scenarios with two regional reviewers. Days 31–60: build the core course and one manager track, set LMS rules, and run a pilot with a single business unit. Days 61–90: fix what the pilot broke, localise the highest-volume regions, brief managers, and launch with a 30-day completion window for the first wave.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Do not wait for every language and every legal entity before the first wave. Launch where risk and sponsorship are strongest, then expand. A live programme with a clear backlog beats a global launch that slips three quarters.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>After 90 days, report completion and one application metric—such as simulation reporting rate or manager confidence. Use that review to fund the next refreshers. A programme that actually works is a cycle: map risk, teach the decision, measure the behaviour, and write the next scenario from what you learned.</p>
<!-- /wp:paragraph -->',
			'categories' => array( 'compliance', 'hr-training' ),
			'days_ago'   => 3,
		),
		array(
			'title'      => 'Why Security Awareness Training Fails — And How to Fix It',
			'slug'       => 'demo-blog-security-awareness-training-fails',
			'excerpt'    => 'Employees tune out when security training feels generic or punitive. These five shifts help teams build habits that stick.',
			'content'    => 'Security awareness fails when content is abstract, outdated, or disconnected from how people actually work. Replace fear-based messaging with practical guidance: show how to verify suspicious links, explain why reporting matters, and celebrate near-miss reports. Gamified simulations and microlearning modules outperform long slide decks, especially for distributed teams working across time zones.',
			'categories' => array( 'security-awareness' ),
			'days_ago'   => 7,
		),
		array(
			'title'      => 'GDPR vs DPDPA: What Multinational Teams Need to Know',
			'slug'       => 'demo-blog-gdpr-vs-dpdpa',
			'excerpt'    => 'India’s DPDPA and the EU’s GDPR share goals but differ in scope, consent, and accountability. A side-by-side view for privacy leads.',
			'content'    => 'Privacy teams operating across Europe and India must understand where frameworks align and where local nuance matters. Both regimes emphasise purpose limitation, data minimisation, and individual rights—but implementation details around consent, cross-border transfers, and breach notification differ. Map your processing activities first, then tailor employee awareness content to the jurisdictions where your people and data actually sit.',
			'categories' => array( 'data-privacy', 'compliance' ),
			'days_ago'   => 12,
		),
		array(
			'title'      => 'Psychological Safety Starts With How Leaders Respond to Mistakes',
			'slug'       => 'demo-blog-psychological-safety-leaders',
			'excerpt'    => 'Teams speak up when leaders treat errors as learning signals—not performance failures. Training alone cannot create that climate.',
			'content'    => 'Workplace culture training works best when managers model the behaviours you expect. If employees fear blame after reporting an issue, harassment concern, or security mistake, silence becomes the rational choice. Train leaders to respond with curiosity, document fairly, and close the loop so reporters know their voice changed something.',
			'categories' => array( 'workplace-culture', 'hr-training' ),
			'days_ago'   => 18,
		),
		array(
			'title'      => 'Phishing Simulations: Measure Readiness Without Shaming People',
			'slug'       => 'demo-blog-phishing-simulations',
			'excerpt'    => 'Simulations are powerful when they teach—not trap. Use results to improve controls and coaching, not to punish clicks.',
			'content'    => 'Phishing programmes fail when they optimise for click rates instead of learning outcomes. Share aggregate trends with leadership, offer immediate micro-training at the moment of failure, and recognise teams that report suspicious messages quickly. Over time, reporting speed is a better culture metric than failure rate alone.',
			'categories' => array( 'security-awareness' ),
			'days_ago'   => 24,
		),
		array(
			'title'      => 'Code of Conduct Training That Reflects Real Grey Areas',
			'slug'       => 'demo-blog-code-of-conduct-grey-areas',
			'excerpt'    => 'Ethics training lands when it explores conflicts of interest, gifts, and pressure—not just definitions on a slide.',
			'content'    => 'Employees rarely struggle with obvious misconduct. They struggle with grey areas: accepting hospitality, working with relatives as vendors, or handling confidential information on personal devices. Scenario-based learning helps people practise decision-making before a real incident occurs.',
			'categories' => array( 'compliance', 'workplace-culture' ),
			'days_ago'   => 31,
		),
		array(
			'title'      => 'Rolling Out Mandatory Training Without Burning Out Your HR Team',
			'slug'       => 'demo-blog-mandatory-training-rollout',
			'excerpt'    => 'Automation, clear deadlines, and manager dashboards reduce manual chasing during compliance season.',
			'content'    => 'HR teams often spend weeks emailing reminders during annual training cycles. Centralise assignments in your LMS, segment audiences by role and location, and give managers visibility into completion rates for their teams. Escalation paths should be defined before launch—not invented mid-cycle.',
			'categories' => array( 'hr-training' ),
			'days_ago'   => 38,
		),
		array(
			'title'      => 'Third-Party Risk: Training Vendors and Contractors on Your Standards',
			'slug'       => 'demo-blog-third-party-risk-training',
			'excerpt'    => 'Your culture extends to partners who access systems or represent your brand. Extend training beyond full-time employees.',
			'content'    => 'Contractors, agencies, and vendors may not appear on your HR roster, but they can introduce compliance and security risk. Define minimum training requirements by access level, verify completion before granting system access, and revisit requirements when contracts renew.',
			'categories' => array( 'compliance', 'security-awareness' ),
			'days_ago'   => 45,
		),
		array(
			'title'      => 'Designing Inclusive Harassment Prevention for Distributed Teams',
			'slug'       => 'demo-blog-inclusive-harassment-prevention',
			'excerpt'    => 'Remote and hybrid work changed where misconduct happens. Update policies, channels, and training accordingly.',
			'content'    => 'Harassment prevention must cover digital channels, video calls, and off-site events—not just the physical office. Clarify reporting options, explain investigation basics, and train managers to recognise subtle exclusion or retaliation in virtual settings.',
			'categories' => array( 'workplace-culture', 'compliance' ),
			'days_ago'   => 52,
		),
		array(
			'title'      => 'Data Privacy Awareness for Non-Technical Employees',
			'slug'       => 'demo-blog-privacy-awareness-non-technical',
			'excerpt'    => 'Not everyone needs to read legal text—but everyone should know how to handle personal data responsibly.',
			'content'    => 'Privacy training should translate principles into daily habits: locking screens, sharing files securely, recognising personal data in spreadsheets, and knowing when to escalate a request. Use role-based examples for customer service, sales, HR, and finance teams.',
			'categories' => array( 'data-privacy' ),
			'days_ago'   => 60,
		),
		array(
			'title'      => 'Measuring Learning Impact Beyond Completion Rates',
			'slug'       => 'demo-blog-measuring-learning-impact',
			'excerpt'    => 'Completion is a start, not an outcome. Pair training data with incidents, audits, and culture surveys.',
			'content'    => 'Executives ask whether training worked. Build a simple measurement stack: completion and engagement metrics, assessment scores where appropriate, plus operational indicators such as policy exceptions, incident reports, or audit findings. Tell a story that connects learning investment to risk reduction.',
			'categories' => array( 'hr-training', 'compliance' ),
			'days_ago'   => 68,
		),
		array(
			'title'      => 'Security Culture in Mergers and Acquisitions',
			'slug'       => 'demo-blog-security-culture-ma',
			'excerpt'    => 'Integrating cultures after an acquisition? Align security expectations early before systems and identities merge.',
			'content'    => 'M&A integration creates a window where policies, tooling, and habits collide. Run baseline awareness training for incoming teams, harmonise acceptable-use expectations, and communicate clearly about reporting channels during transition.',
			'categories' => array( 'security-awareness', 'workplace-culture' ),
			'days_ago'   => 75,
		),
		array(
			'title'      => 'Annual Compliance Refreshers People Do Not Hate',
			'slug'       => 'demo-blog-compliance-refreshers',
			'excerpt'    => 'Short, scenario-led refreshers outperform repeating the same course every year.',
			'content'    => 'If learners see identical content annually, engagement drops. Refreshers should highlight what changed—new regulations, recent incidents, updated policies—and let experienced staff test out when appropriate.',
			'categories' => array( 'compliance', 'hr-training' ),
			'days_ago'   => 82,
		),
		array(
			'title'      => 'Accessibility in eLearning: A Checklist for Global Audiences',
			'slug'       => 'demo-blog-accessibility-elearning',
			'excerpt'    => 'Captions, readable contrast, keyboard navigation, and plain language make training usable for everyone.',
			'content'    => 'Global workforces include people with diverse abilities, languages, and devices. Build accessibility into templates from the start: caption videos, avoid colour-only cues, test with screen readers, and write at an appropriate reading level for frontline roles.',
			'categories' => array( 'hr-training', 'workplace-culture' ),
			'days_ago'   => 90,
		),
		array(
			'title'      => 'When to Localise Compliance Content — And When to Standardise',
			'slug'       => 'demo-blog-localise-compliance-content',
			'excerpt'    => 'Balance a consistent global standard with regional legal requirements and cultural context.',
			'content'    => 'Localisation is not just translation. Some topics require jurisdiction-specific modules; others benefit from one global narrative with local annexes. Work with legal and regional HR partners to decide what must vary and what can stay consistent for brand and efficiency.',
			'categories' => array( 'compliance', 'data-privacy' ),
			'days_ago'   => 98,
		),
	);
}

/**
 * Whether demo blog posts already exist.
 *
 * @return bool
 */
function akaza_blog_demo_exists() {
	$existing = get_posts(
		array(
			'post_type'      => 'post',
			'post_status'    => 'any',
			'posts_per_page' => 1,
			'meta_key'       => '_akaza_demo_post',
			'meta_value'     => '1',
			'fields'         => 'ids',
		)
	);

	return ! empty( $existing );
}

/**
 * Insert demo categories and posts.
 *
 * @return array{created: int, skipped: bool}
 */
function akaza_seed_blog_demo_data() {
	if ( akaza_blog_demo_exists() ) {
		return array(
			'created' => 0,
			'skipped' => true,
		);
	}

	$category_ids = array();

	foreach ( akaza_blog_demo_categories_data() as $cat ) {
		$existing = get_category_by_slug( $cat['slug'] );
		if ( $existing ) {
			$category_ids[ $cat['slug'] ] = (int) $existing->term_id;
			continue;
		}

		$result = wp_insert_term(
			$cat['name'],
			'category',
			array(
				'slug'        => $cat['slug'],
				'description' => $cat['description'],
			)
		);

		if ( ! is_wp_error( $result ) ) {
			$category_ids[ $cat['slug'] ] = (int) $result['term_id'];
		}
	}

	$created = 0;

	foreach ( akaza_blog_demo_posts_data() as $post_data ) {
		if ( get_page_by_path( $post_data['slug'], OBJECT, 'post' ) ) {
			continue;
		}

		$post_date = gmdate( 'Y-m-d H:i:s', time() - ( DAY_IN_SECONDS * (int) $post_data['days_ago'] ) );

		$post_id = wp_insert_post(
			array(
				'post_title'   => $post_data['title'],
				'post_name'    => $post_data['slug'],
				'post_excerpt' => $post_data['excerpt'],
				'post_content' => $post_data['content'],
				'post_status'  => 'publish',
				'post_type'    => 'post',
				'post_date'    => $post_date,
				'post_date_gmt' => get_gmt_from_date( $post_date ),
			),
			true
		);

		if ( is_wp_error( $post_id ) || ! $post_id ) {
			continue;
		}

		update_post_meta( $post_id, '_akaza_demo_post', '1' );

		$term_ids = array();
		foreach ( $post_data['categories'] as $slug ) {
			if ( isset( $category_ids[ $slug ] ) ) {
				$term_ids[] = $category_ids[ $slug ];
			}
		}

		if ( ! empty( $term_ids ) ) {
			wp_set_post_categories( $post_id, $term_ids );
		}

		++$created;
	}

	update_option( 'akaza_blog_demo_seeded', '1', false );

	return array(
		'created' => $created,
		'skipped' => false,
	);
}

/**
 * Seed demo blog content when the archive is empty.
 *
 * @return void
 */
function akaza_maybe_seed_blog_demo() {
	if ( akaza_blog_demo_exists() ) {
		return;
	}

	$published = get_posts(
		array(
			'post_type'      => 'post',
			'post_status'    => 'publish',
			'posts_per_page' => 1,
			'fields'         => 'ids',
		)
	);

	if ( ! empty( $published ) ) {
		return;
	}

	akaza_seed_blog_demo_data();
}

/**
 * Push the long-form compliance demo article into the existing seeded post.
 */
function akaza_sync_demo_compliance_longform() {
	if ( '1' === get_option( 'akaza_demo_compliance_longform' ) ) {
		return;
	}

	$post = get_page_by_path( 'demo-blog-global-compliance-programme', OBJECT, 'post' );
	if ( ! $post ) {
		return;
	}

	$content = '';
	foreach ( akaza_blog_demo_posts_data() as $data ) {
		if ( 'demo-blog-global-compliance-programme' === $data['slug'] ) {
			$content = $data['content'];
			break;
		}
	}

	if ( '' === $content ) {
		return;
	}

	wp_update_post(
		array(
			'ID'           => (int) $post->ID,
			'post_content' => $content,
		)
	);
	update_post_meta( (int) $post->ID, 'akaza_show_toc', 1 );
	update_option( 'akaza_demo_compliance_longform', '1', false );
}
add_action( 'init', 'akaza_sync_demo_compliance_longform', 30 );

/**
 * Delete all demo blog posts (categories are kept).
 *
 * @return int Number of posts deleted.
 */
function akaza_delete_blog_demo_data() {
	$post_ids = get_posts(
		array(
			'post_type'      => 'post',
			'post_status'    => 'any',
			'posts_per_page' => -1,
			'meta_key'       => '_akaza_demo_post',
			'meta_value'     => '1',
			'fields'         => 'ids',
		)
	);

	$deleted = 0;
	foreach ( $post_ids as $post_id ) {
		if ( wp_delete_post( (int) $post_id, true ) ) {
			++$deleted;
		}
	}

	delete_option( 'akaza_blog_demo_seeded' );

	return $deleted;
}

/**
 * Demo newsletter editions spanning multiple years.
 *
 * @return array<int, array{title: string, slug: string, excerpt: string, content: string, year: int, month: int}>
 */
function akaza_newsletter_demo_posts_data() {
	return array(
		array(
			'title'   => 'SucceedLEARN Newsletter — August 2026',
			'slug'    => 'demo-newsletter-august-2026',
			'excerpt' => 'This month: DPDPA rollout checklists, phishing trends, and a new manager toolkit for hybrid teams.',
			'content' => 'Welcome to the August 2026 edition of the SucceedLEARN newsletter. This issue covers practical DPDPA awareness for frontline teams, updated phishing simulation findings, and a short manager toolkit for reinforcing compliance habits in hybrid workplaces. Use the scenarios with your L&D partners and share completion dashboards with regional leads.',
			'year'    => 2026,
			'month'   => 8,
		),
		array(
			'title'   => 'SucceedLEARN Newsletter — May 2026',
			'slug'    => 'demo-newsletter-may-2026',
			'excerpt' => 'Vendor onboarding, third-party access reviews, and a refresher on reporting channels.',
			'content' => 'The May 2026 newsletter focuses on third-party risk. When contractors and agencies access your systems, they need the same baseline awareness as employees. This edition includes a vendor training checklist, sample contract clauses for learning requirements, and reminders on how to report suspected incidents.',
			'year'    => 2026,
			'month'   => 5,
		),
		array(
			'title'   => 'SucceedLEARN Newsletter — January 2026',
			'slug'    => 'demo-newsletter-january-2026',
			'excerpt' => 'New-year compliance calendar, mandatory refresher planning, and accessibility tips for eLearning.',
			'content' => 'Start 2026 with a clear training calendar. This edition maps typical Q1 refreshers, explains how to stagger assignments so HR is not flooded, and lists accessibility checks (captions, contrast, keyboard navigation) before you launch global modules.',
			'year'    => 2026,
			'month'   => 1,
		),
		array(
			'title'   => 'SucceedLEARN Newsletter — October 2025',
			'slug'    => 'demo-newsletter-october-2025',
			'excerpt' => 'Cybersecurity awareness month special: simulations that teach, not shame.',
			'content' => 'October 2025 is cybersecurity awareness month. We share how to run phishing simulations that coach rather than punish, how to brief executives with trend data, and how to recognise teams that report suspicious messages quickly.',
			'year'    => 2025,
			'month'   => 10,
		),
		array(
			'title'   => 'SucceedLEARN Newsletter — June 2025',
			'slug'    => 'demo-newsletter-june-2025',
			'excerpt' => 'Code of conduct grey areas, gifts and hospitality, and manager response playbooks.',
			'content' => 'The June 2025 edition explores ethics grey areas employees actually face: hospitality, conflicts of interest, and confidential data on personal devices. Scenario-based snippets are included for classroom or LMS use.',
			'year'    => 2025,
			'month'   => 6,
		),
		array(
			'title'   => 'SucceedLEARN Newsletter — February 2025',
			'slug'    => 'demo-newsletter-february-2025',
			'excerpt' => 'Psychological safety, speak-up culture, and how leaders should respond to mistakes.',
			'content' => 'February 2025 looks at speak-up culture. Training cannot create psychological safety if managers punish honest mistakes. This newsletter offers talking points for leaders and a short checklist after an employee reports a concern.',
			'year'    => 2025,
			'month'   => 2,
		),
		array(
			'title'   => 'SucceedLEARN Newsletter — November 2024',
			'slug'    => 'demo-newsletter-november-2024',
			'excerpt' => 'Year-end audit prep, evidence of training, and closing the loop on incomplete assignments.',
			'content' => 'The November 2024 newsletter helps teams prepare for year-end audits. Capture completion evidence, document exceptions, and plan escalations for overdue mandatory training before the calendar year closes.',
			'year'    => 2024,
			'month'   => 11,
		),
		array(
			'title'   => 'SucceedLEARN Newsletter — July 2024',
			'slug'    => 'demo-newsletter-july-2024',
			'excerpt' => 'GDPR and DPDPA side-by-side for multinational privacy leads.',
			'content' => 'July 2024 compares GDPR and DPDPA for L&D and privacy teams. Map processing activities first, then localise employee awareness content to the jurisdictions where your people and data actually sit.',
			'year'    => 2024,
			'month'   => 7,
		),
		array(
			'title'   => 'SucceedLEARN Newsletter — March 2024',
			'slug'    => 'demo-newsletter-march-2024',
			'excerpt' => 'Launch issue: why scenario-based compliance learning outperforms annual slide decks.',
			'content' => 'Welcome to the March 2024 launch edition. We introduce SucceedLEARN’s approach to scenario-led compliance and security awareness, and share a starter plan for rolling out role-based modules without burning out HR.',
			'year'    => 2024,
			'month'   => 3,
		),
	);
}

/**
 * Ensure the newsletter category exists.
 *
 * @return int Term ID or 0.
 */
function akaza_ensure_newsletter_category() {
	$slug     = function_exists( 'akaza_newsletter_category_slug' ) ? akaza_newsletter_category_slug() : 'newsletter';
	$existing = get_category_by_slug( $slug );

	if ( $existing && ! is_wp_error( $existing ) ) {
		return (int) $existing->term_id;
	}

	$result = wp_insert_term(
		'Newsletter',
		'category',
		array(
			'slug'        => $slug,
			'description' => 'SucceedLEARN newsletter editions.',
		)
	);

	return is_wp_error( $result ) ? 0 : (int) $result['term_id'];
}

/**
 * Whether demo newsletter posts already exist.
 *
 * @return bool
 */
function akaza_newsletter_demo_exists() {
	$existing = get_posts(
		array(
			'post_type'      => 'post',
			'post_status'    => 'any',
			'posts_per_page' => 1,
			'meta_key'       => '_akaza_demo_newsletter',
			'meta_value'     => '1',
			'fields'         => 'ids',
		)
	);

	return ! empty( $existing );
}

/**
 * Insert demo newsletter posts.
 *
 * @return array{created: int, skipped: bool}
 */
function akaza_seed_newsletter_demo_data() {
	if ( akaza_newsletter_demo_exists() ) {
		return array(
			'created' => 0,
			'skipped' => true,
		);
	}

	$term_id = akaza_ensure_newsletter_category();
	if ( ! $term_id ) {
		return array(
			'created' => 0,
			'skipped' => true,
		);
	}

	$created = 0;

	foreach ( akaza_newsletter_demo_posts_data() as $post_data ) {
		if ( get_page_by_path( $post_data['slug'], OBJECT, 'post' ) ) {
			continue;
		}

		$post_date = sprintf(
			'%04d-%02d-15 10:00:00',
			(int) $post_data['year'],
			(int) $post_data['month']
		);

		$post_id = wp_insert_post(
			array(
				'post_title'    => $post_data['title'],
				'post_name'     => $post_data['slug'],
				'post_excerpt'  => $post_data['excerpt'],
				'post_content'  => $post_data['content'],
				'post_status'   => 'publish',
				'post_type'     => 'post',
				'post_date'     => $post_date,
				'post_date_gmt' => get_gmt_from_date( $post_date ),
			),
			true
		);

		if ( is_wp_error( $post_id ) || ! $post_id ) {
			continue;
		}

		update_post_meta( $post_id, '_akaza_demo_newsletter', '1' );
		wp_set_post_categories( $post_id, array( $term_id ) );
		++$created;
	}

	update_option( 'akaza_newsletter_demo_seeded', '1', false );

	return array(
		'created' => $created,
		'skipped' => false,
	);
}

/**
 * Seed demo newsletters when the category has no published posts.
 *
 * @return void
 */
function akaza_maybe_seed_newsletter_demo() {
	if ( akaza_newsletter_demo_exists() ) {
		return;
	}

	$slug = function_exists( 'akaza_newsletter_category_slug' ) ? akaza_newsletter_category_slug() : 'newsletter';

	$published = get_posts(
		array(
			'post_type'      => 'post',
			'post_status'    => 'publish',
			'posts_per_page' => 1,
			'fields'         => 'ids',
			'category_name'  => $slug,
		)
	);

	if ( ! empty( $published ) ) {
		return;
	}

	akaza_seed_newsletter_demo_data();
}

/**
 * Delete demo newsletter posts.
 *
 * @return int Number of posts deleted.
 */
function akaza_delete_newsletter_demo_data() {
	$post_ids = get_posts(
		array(
			'post_type'      => 'post',
			'post_status'    => 'any',
			'posts_per_page' => -1,
			'meta_key'       => '_akaza_demo_newsletter',
			'meta_value'     => '1',
			'fields'         => 'ids',
		)
	);

	$deleted = 0;
	foreach ( $post_ids as $post_id ) {
		if ( wp_delete_post( (int) $post_id, true ) ) {
			++$deleted;
		}
	}

	delete_option( 'akaza_newsletter_demo_seeded' );

	return $deleted;
}

/**
 * Admin tools: seed or remove demo blog content.
 */
function akaza_blog_demo_admin_menu() {
	add_management_page(
		__( 'Blog Demo Data', 'akaza-adventure' ),
		__( 'Blog Demo Data', 'akaza-adventure' ),
		'manage_options',
		'akaza-blog-demo',
		'akaza_blog_demo_admin_page'
	);
}
add_action( 'admin_menu', 'akaza_blog_demo_admin_menu' );

/**
 * Render demo data admin page.
 */
function akaza_blog_demo_admin_page() {
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}

	$message             = '';
	$newsletter_message  = '';

	if ( isset( $_POST['akaza_blog_demo_action'] ) && check_admin_referer( 'akaza_blog_demo_action' ) ) {
		$action = sanitize_key( wp_unslash( $_POST['akaza_blog_demo_action'] ) );

		if ( 'seed' === $action ) {
			$result  = akaza_seed_blog_demo_data();
			$message = $result['skipped']
				? __( 'Demo posts already exist — nothing was added.', 'akaza-adventure' )
				: sprintf(
					/* translators: %d: number of posts created */
					__( 'Created %d demo blog posts and categories.', 'akaza-adventure' ),
					(int) $result['created']
				);
		} elseif ( 'delete' === $action ) {
			$deleted = akaza_delete_blog_demo_data();
			$message = sprintf(
				/* translators: %d: number of posts deleted */
				__( 'Removed %d demo blog posts.', 'akaza-adventure' ),
				$deleted
			);
		} elseif ( 'seed_newsletter' === $action ) {
			$result             = akaza_seed_newsletter_demo_data();
			$newsletter_message = $result['skipped']
				? __( 'Demo newsletters already exist — nothing was added.', 'akaza-adventure' )
				: sprintf(
					/* translators: %d: number of posts created */
					__( 'Created %d demo newsletter posts.', 'akaza-adventure' ),
					(int) $result['created']
				);
		} elseif ( 'delete_newsletter' === $action ) {
			$deleted            = akaza_delete_newsletter_demo_data();
			$newsletter_message = sprintf(
				/* translators: %d: number of posts deleted */
				__( 'Removed %d demo newsletter posts.', 'akaza-adventure' ),
				$deleted
			);
		}
	}

	$demo_exists             = akaza_blog_demo_exists();
	$newsletter_demo_exists  = akaza_newsletter_demo_exists();
	?>
	<div class="wrap">
		<h1><?php esc_html_e( 'Blog Demo Data', 'akaza-adventure' ); ?></h1>
		<p><?php esc_html_e( 'Seed dummy blog posts and categories to test the Blog page template (filters, cards, load more).', 'akaza-adventure' ); ?></p>

		<?php if ( $message ) : ?>
			<div class="notice notice-success is-dismissible"><p><?php echo esc_html( $message ); ?></p></div>
		<?php endif; ?>

		<form method="post" style="margin-top: 1rem;">
			<?php wp_nonce_field( 'akaza_blog_demo_action' ); ?>
			<p>
				<button type="submit" name="akaza_blog_demo_action" value="seed" class="button button-primary">
					<?php esc_html_e( 'Seed demo posts & categories', 'akaza-adventure' ); ?>
				</button>
				<?php if ( $demo_exists ) : ?>
					<button type="submit" name="akaza_blog_demo_action" value="delete" class="button" onclick="return confirm('<?php echo esc_js( __( 'Delete all demo blog posts?', 'akaza-adventure' ) ); ?>');">
						<?php esc_html_e( 'Remove demo posts', 'akaza-adventure' ); ?>
					</button>
				<?php endif; ?>
			</p>
		</form>

		<p><strong><?php esc_html_e( 'Categories:', 'akaza-adventure' ); ?></strong>
			<?php echo esc_html( implode( ', ', wp_list_pluck( akaza_blog_demo_categories_data(), 'name' ) ) ); ?>
		</p>
		<p><strong><?php esc_html_e( 'Posts:', 'akaza-adventure' ); ?></strong>
			<?php echo (int) count( akaza_blog_demo_posts_data() ); ?>
			<?php esc_html_e( 'sample articles (auto-seeded when no published posts exist).', 'akaza-adventure' ); ?>
		</p>
		<hr style="margin: 2rem 0;">

		<h2><?php esc_html_e( 'Newsletter Demo Data', 'akaza-adventure' ); ?></h2>
		<p><?php esc_html_e( 'Seed dummy newsletter posts (category: newsletter) across multiple years to test the Newsletter page template and year filter.', 'akaza-adventure' ); ?></p>

		<?php if ( $newsletter_message ) : ?>
			<div class="notice notice-success is-dismissible"><p><?php echo esc_html( $newsletter_message ); ?></p></div>
		<?php endif; ?>

		<form method="post" style="margin-top: 1rem;">
			<?php wp_nonce_field( 'akaza_blog_demo_action' ); ?>
			<p>
				<button type="submit" name="akaza_blog_demo_action" value="seed_newsletter" class="button button-primary">
					<?php esc_html_e( 'Seed demo newsletters', 'akaza-adventure' ); ?>
				</button>
				<?php if ( $newsletter_demo_exists ) : ?>
					<button type="submit" name="akaza_blog_demo_action" value="delete_newsletter" class="button" onclick="return confirm('<?php echo esc_js( __( 'Delete all demo newsletter posts?', 'akaza-adventure' ) ); ?>');">
						<?php esc_html_e( 'Remove demo newsletters', 'akaza-adventure' ); ?>
					</button>
				<?php endif; ?>
			</p>
		</form>

		<p><strong><?php esc_html_e( 'Newsletters:', 'akaza-adventure' ); ?></strong>
			<?php echo (int) count( akaza_newsletter_demo_posts_data() ); ?>
			<?php esc_html_e( 'sample editions (auto-seeded when the newsletter category has no published posts).', 'akaza-adventure' ); ?>
		</p>
	</div>
	<?php
}
