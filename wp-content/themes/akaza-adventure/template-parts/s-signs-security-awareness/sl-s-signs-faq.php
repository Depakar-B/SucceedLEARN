<?php
/**
 * S-Signs — Frequently Asked Questions (from existing page).
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$faq_items = array(
	array(
		'question' => __( 'What is the purpose of security awareness posters?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'Posters act as constant visual reminders that help reinforce key security practices employees have learned through training.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'How do posters support long-term learning?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'By regularly displaying reminders, posters help people retain and apply important behaviors over time.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'Are image-based posters really effective?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'Yes. Visual cues are processed faster by the brain and often stick longer than text-heavy messages.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'Where should these posters be placed?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'In high-visibility areas like hallways, break rooms, near elevators, and digitally on intranet pages or email.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'Can posters replace formal training?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'No-they complement formal training by keeping messages alive after a course or simulation is over.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'How often should new posters be shown?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'Weekly or monthly rotations work well to keep the content fresh and employees engaged.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'Can I send these posters by email?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'Absolutely! S-Signs are formatted for easy email distribution in addition to print.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'Can we customize posters with our branding?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'Yes. Logos, colors, and even department-specific messaging can be added to match your brand.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'Do visual campaigns really change behavior?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'When combined with training, yes-visual nudges encourage everyday vigilance and habit-building.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'Is there a psychological reason posters work?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'Yes. Visual repetition triggers recall, and humour or surprise in posters increases message retention and sharing.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'Can we track poster engagement?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'If emailed through the LMS, views can be tracked to show reach and frequency.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'Are the posters aligned with global awareness campaigns?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'Yes. We include posters for Cybersecurity Awareness Month, Data Privacy Day, and more.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'Can I request posters in different languages?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'Localized versions can be created on request-contact us for language options.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'How many posters are included in S-Signs?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'Currently, over 50 posters are available and the library continues to grow.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'Are there posters for specific threats like phishing?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'Yes, phishing is one of the most covered topics, with multiple poster designs.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'Do the posters include interactive elements?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'Most are static, but QR codes or embedded links can be added upon request.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'Can I print them in large formats?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'Yes, high-resolution files are available for print sizes up to A2 or larger.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'Can I edit the text in a poster?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'Editable formats are available so you can localize or change messaging.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'Are these available with the SucceedLEARN subscription?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'Yes, S-Signs is included in the Security Awareness Package.', 'akaza-adventure' ) . '</p>',
	),
	array(
		'question' => __( 'How do I get started with S-Signs?', 'akaza-adventure' ),
		'answer'   => '<p>' . esc_html__( 'Just browse the library, pick a poster or campaign, and deploy instantly!', 'akaza-adventure' ) . '</p>',
	),
);

get_template_part(
	'template-parts/global/faq',
	null,
	array(
		'id'            => 'frequently-asked-questions',
		'section_class' => 'sl-s-signs-faq',
		'eyebrow'       => __( "FAQ's", 'akaza-adventure' ),
		'title_html'    => __( 'Frequently Asked <span>Questions</span>', 'akaza-adventure' ),
		'description'   => __( 'Answers to common questions about S-Signs and visual security awareness.', 'akaza-adventure' ),
		'cta_text'      => __( 'Request Demo', 'akaza-adventure' ),
		'cta_url'       => '#request-demo',
		'numbered'      => true,
		'open_first'    => true,
		'schema'        => true,
		'items'         => $faq_items,
	)
);
