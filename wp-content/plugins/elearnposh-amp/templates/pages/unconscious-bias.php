<?php
/**
 * Unconscious Bias Page Template
 *
 * @package ElearnPOSH\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $wpdb, $post;
$ep_id = $post->ID;

remove_all_actions( 'the_content' );
remove_all_actions( 'amp_post_template_content' );
remove_all_actions( 'ampforwp_content' );

$bias_faq_items = array(
	array(
		'question'    => __( 'What is unconscious bias and how does it impact the workplace?', 'elearnposh-amp' ),
		'answer_html' => '<p>' . esc_html__( 'Unconscious bias refers to unintentional attitudes or stereotypes impacting decisions without awareness, affecting workplace dynamics, including hiring and promotions. These biases may unintentionally foster discrimination and hinder diversity in the workplace. Recognizing and addressing unconscious bias is crucial for promoting diversity, equity, and inclusion in various settings, including the workplace, education, and social environments.', 'elearnposh-amp' ) . '</p>',
	),
	array(
		'question'    => __( 'What are the types of biases?', 'elearnposh-amp' ),
		'answer_html' => '<p>' . esc_html__( 'Various types of biases can impact decision-making and perceptions. Some common types include:', 'elearnposh-amp' ) . '</p><ul><li><b>' . esc_html__( 'Confirmation Bias:', 'elearnposh-amp' ) . '</b> ' . esc_html__( 'Giving preference to information that confirms pre-existing beliefs.', 'elearnposh-amp' ) . '</li><li><b>' . esc_html__( 'Stereotyping:', 'elearnposh-amp' ) . '</b> ' . esc_html__( 'Applying generalized beliefs or assumptions about a group of people to an individual within that group.', 'elearnposh-amp' ) . '</li><li><b>' . esc_html__( 'Affinity Bias:', 'elearnposh-amp' ) . '</b> ' . esc_html__( 'Favoring people who share similar characteristics or backgrounds.', 'elearnposh-amp' ) . '</li><li><b>' . esc_html__( 'Halo Effect:', 'elearnposh-amp' ) . '</b> ' . esc_html__( 'Allowing one positive trait to influence perceptions of an individual\'s overall character.', 'elearnposh-amp' ) . '</li><li><b>' . esc_html__( 'Anchoring Bias:', 'elearnposh-amp' ) . '</b> ' . esc_html__( 'Reliance on the first piece of information encountered when making decisions.', 'elearnposh-amp' ) . '</li><li><b>' . esc_html__( 'Conformity Bias:', 'elearnposh-amp' ) . '</b> ' . esc_html__( 'Altering one\'s opinions or behaviours to align with the majority.', 'elearnposh-amp' ) . '</li><li><b>' . esc_html__( 'Attribution Bias:', 'elearnposh-amp' ) . '</b> ' . esc_html__( 'Attributing others\' successes to external factors and failures to internal factors, or vice versa.', 'elearnposh-amp' ) . '</li><li><b>' . esc_html__( 'Contrast Effect:', 'elearnposh-amp' ) . '</b> ' . esc_html__( 'Evaluating someone\'s characteristics based on how they compare to others recently encountered.', 'elearnposh-amp' ) . '</li></ul>',
	),
	array(
		'question'    => __( 'How can addressing unconscious biases contribute to a more inclusive work environment?', 'elearnposh-amp' ),
		'answer_html' => '<p>' . esc_html__( 'Addressing unconscious biases helps develop inclusivity by dismantling equality barriers. It also helps in recognizing and mitigating biases ensuring fair decision-making, fostering empathy and collaboration. This cultivates inclusive policies, benefiting diverse perspectives and talent. Growing awareness creates a culture of respect, boosting employee engagement and well-being.', 'elearnposh-amp' ) . '</p>',
	),
	array(
		'question'    => __( 'What are the key benefits of diversity and inclusion training for professionals?', 'elearnposh-amp' ),
		'answer_html' => '<p>' . esc_html__( 'Diversity training fosters an inclusive workplace, enhancing awareness of biases and promoting collaboration. It improves communication, attracts diverse talent, and addresses systemic biases for a fair, innovative, and competitive environment.', 'elearnposh-amp' ) . '</p>',
	),
	array(
		'question'    => __( 'What are some practical tips for mitigating unconscious biases in decision-making processes?', 'elearnposh-amp' ),
		'answer_html' => '<p>' . esc_html__( 'Some practical tips for mitigating unconscious biases in decision-making process:', 'elearnposh-amp' ) . '</p><ul><li>' . esc_html__( 'Mitigating bias with awareness training', 'elearnposh-amp' ) . '</li><li>' . esc_html__( 'Utilize diverse panels for varied perspectives', 'elearnposh-amp' ) . '</li><li>' . esc_html__( 'Establishing and adhering to objective criteria', 'elearnposh-amp' ) . '</li><li>' . esc_html__( 'Regularly audit organizational policies to enforce inclusive policies for fair policies', 'elearnposh-amp' ) . '</li><li>' . esc_html__( 'Encourage open feedback on potential biases', 'elearnposh-amp' ) . '</li><li>' . esc_html__( 'Ensure leadership commitment for fostering an inclusive environment', 'elearnposh-amp' ) . '</li></ul>',
	),
	array(
		'question'    => __( 'Is unconscious bias training relevant for all levels of employees in an organization?', 'elearnposh-amp' ),
		'answer_html' => '<p>' . esc_html__( 'Yes, unconscious bias training is relevant for all employees, irrespective of their level. The unconscious bias training helps in fostering awareness, promoting inclusive practices, and contributing to the creation of a more equitable workplace.', 'elearnposh-amp' ) . '</p>',
	),
	array(
		'question'    => __( 'How does our course go beyond just highlighting biases to provide practical solutions?', 'elearnposh-amp' ),
		'answer_html' => '<p>' . esc_html__( 'Our course not only points out biases but actively engages employees in defining, understanding, and recognizing various types and manifestations of unconscious bias. It\'s not just about awareness; it\'s about providing practical strategies that employees can use to prevent bias, fostering a workplace where inclusivity is not just discussed but actively practised.', 'elearnposh-amp' ) . '</p>',
	),
	array(
		'question'    => __( 'How does an eLearning course effectively address unconscious biases in the workplace?', 'elearnposh-amp' ),
		'answer_html' => '<p>' . esc_html__( 'An eLearning course effectively tackles workplace unconscious biases by providing accessible and targeted education. It cultivates awareness, imparts practical strategies, and promotes ongoing learning, empowering participants to recognize, understand, and mitigate biases. The eLearning format ensures flexibility, scalability, and consistent delivery, making it a potent tool for developing an inclusive workplace culture.', 'elearnposh-amp' ) . '</p>',
	),
	array(
		'question'    => __( 'How to prevent unconscious bias?', 'elearnposh-amp' ),
		'answer_html' => '<p>' . esc_html__( 'To prevent unconscious bias, organizations can implement anti-bias training, adopt diverse hiring practices, and promote inclusive leadership. They can also establish feedback mechanisms, and utilize objective metrics in different processes of the organization (e.g. in hiring, performance evaluation etc.). Integrating diversity and inclusion policies as workplace solutions, conducting audits, and supporting affinity groups are essential steps. Collectively, these strategies can help mitigate bias, promoting an equitable and inclusive workplace.', 'elearnposh-amp' ) . '</p>',
	),
);

$faq_schema = array(
	'@context'   => 'https://schema.org',
	'@type'      => 'FAQPage',
	'mainEntity' => array(),
);

foreach ( $bias_faq_items as $bias_faq_item ) {
	$faq_schema['mainEntity'][] = array(
		'@type'          => 'Question',
		'name'           => $bias_faq_item['question'],
		'acceptedAnswer' => array(
			'@type' => 'Answer',
			'text'  => wp_strip_all_tags( $bias_faq_item['answer_html'] ),
		),
	);
}

$demo_url        = elearnposh_amp_url( '/contact-us/#demo' );
$post_body_class = 'post-' . absint( $ep_id );
$ub_outcomes     = array(
	__( 'Define Unconscious Bias', 'elearnposh-amp' ),
	__( 'Describe the impact of Unconscious Bias', 'elearnposh-amp' ),
	__( 'List the different types of Unconscious Bias', 'elearnposh-amp' ),
	__( 'Identify the manifestations of Unconscious Bias', 'elearnposh-amp' ),
	__( 'Adopt strategies to prevent Unconscious Bias', 'elearnposh-amp' ),
);
$gallery_images  = elearnposh_amp_get_course_screenshot_images( $ep_id, __( 'Unconscious Bias screenshot', 'elearnposh-amp' ) );
if ( empty( $gallery_images ) ) {
	$gallery_images = elearnposh_amp_urls_to_image_cards(
		array(
			'https://elearnposh.com/wp-content/uploads/2024/02/UB-001.jpg',
			'https://elearnposh.com/wp-content/uploads/2024/02/UB-002.jpg',
			'https://elearnposh.com/wp-content/uploads/2024/02/UB-003.jpg',
			'https://elearnposh.com/wp-content/uploads/2024/02/UB-004.jpg',
			'https://elearnposh.com/wp-content/uploads/2024/02/UB-005.jpg',
		),
		__( 'Unconscious Bias screenshot', 'elearnposh-amp' )
	);
}
?>
<!doctype html>
<html amp lang="<?php echo esc_attr( get_bloginfo( 'language' ) ); ?>">
<head>
	<meta charset="utf-8" />
	<link rel="shortcut icon" href="<?php echo esc_url( elearnposh_amp_get_favicon_url() ); ?>" type="image/png" />
	<title><?php echo esc_html( get_post_meta( $ep_id, 'title', true ) ?: get_the_title() ); ?> - eLearnPOSH</title>

	<?php remove_action( 'amp_post_template_head', 'wp_site_icon' ); ?>
	<?php do_action( 'amp_post_template_head', $this ); ?>

	<style amp-custom>
	<?php elearnposh_amp_output_optimized_css( 'course', array( 'course-page', 'menu', 'footer' ) ); ?>
	<?php elearnposh_amp_output_course_pfe_base_styles(); ?>
	<?php elearnposh_amp_output_course_pfe_extended_styles(); ?>
	<?php include ELEARNPOSH_AMP_TEMPLATES_DIR . 'partials/faq-accordion-styles.php'; ?>
	</style>

	<script type="application/ld+json"><?php echo elearnposh_amp_encode_page_schema_json_ld( $faq_schema ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></script>
	<?php elearnposh_amp_output_components( 'course', array( 'amp-accordion' ) ); ?>
</head>

<body class="<?php echo esc_attr( $post_body_class ); ?>">
	<?php include ELEARNPOSH_AMP_TEMPLATES_DIR . 'components/menu.php'; ?>

	<div class="amp-content-wrapper">
		<main class="pfe">
			<section class="pfe-hero">
				<div class="pfe-wrap">
				<?php elearnposh_amp_render_breadcrumbs(); ?>
					<div class="pfe-hero-grid">
						<div>
							<span class="pfe-kicker"><?php esc_html_e( 'Unconscious Bias eLearning', 'elearnposh-amp' ); ?></span>
							<h1><?php esc_html_e( 'Unconscious Bias eLearning', 'elearnposh-amp' ); ?></h1>
							<p><?php esc_html_e( 'In our professional thought processes, there are underlying beliefs and assumptions that subtly shape our decisions, actions, and collaborations. These subtle influencers are known as unconscious biases.', 'elearnposh-amp' ); ?></p>
							<p style="margin-top:12px;"><?php esc_html_e( 'While these biases might be subtle, their impact can be significant, especially in a workplace setting. This course aims not just to highlight biases but to equip participants with tips to address and mitigate them.', 'elearnposh-amp' ); ?></p>
							<div class="pfe-hero-actions">
								<a class="btn-primary" href="<?php echo $demo_url; ?>"><?php esc_html_e( 'Schedule a Demo', 'elearnposh-amp' ); ?></a>
							</div>
						</div>
						<?php elearnposh_amp_render_image_gallery( $gallery_images, __( 'Unconscious Bias preview images', 'elearnposh-amp' ), 'hero' ); ?>
					</div>
				</div>
			</section>

			<?php
			elearnposh_amp_render_course_details_cards(
				__( 'Through this course, the employees should be able to:', 'elearnposh-amp' ),
				array(
					__( 'Duration: 25 min', 'elearnposh-amp' ),
					__( 'Use of real-life scenarios', 'elearnposh-amp' ),
					__( 'Self-paced learning', 'elearnposh-amp' ),
					__( 'Summative assessment', 'elearnposh-amp' ),
					__( 'Certificate upon Course Completion', 'elearnposh-amp' ),
				),
				$ub_outcomes,
				'',
				'',
				'',
				'ub-details',
				__( 'Course Details', 'elearnposh-amp' ),
				__( 'Learning Objectives', 'elearnposh-amp' )
			);
			?>

			<section class="pfe-section-sm">
				<div class="pfe-wrap">
					<?php
					elearnposh_amp_render_cta_band(
						__( 'By the end of this journey, you\'ll not only recognize and understand your biases but will also be equipped with tools and strategies to challenge and change them. Improve productivity by promoting inclusive decision making. Educate your employees on Unconscious Bias using our engaging eLearning.', 'elearnposh-amp' ),
						$demo_url
					);
					?>
				</div>
			</section>

			<section class="pfe-section" id="pfe-faq">
				<div class="pfe-wrap">
					<h2 class="pfe-title"><?php esc_html_e( 'FAQs', 'elearnposh-amp' ); ?></h2>
					<amp-accordion animate expand-single-section>
						<?php foreach ( $bias_faq_items as $bias_faq_index => $bias_faq_item ) : ?>
						<section<?php echo 0 === $bias_faq_index ? ' expanded' : ''; ?>>
							<h3 class="faq-q"><?php echo esc_html( ( $bias_faq_index + 1 ) . '. ' . $bias_faq_item['question'] ); ?></h3>
							<div class="faq-a">
								<?php echo wp_kses_post( $bias_faq_item['answer_html'] ); ?>
							</div>
						</section>
						<?php endforeach; ?>
					</amp-accordion>
				</div>
			</section>

			<section class="pfe-section-sm">
				<div class="pfe-wrap">
					<?php
					elearnposh_amp_render_cta_band(
						__( 'Explore our Unconscious Bias eLearning along with our other Global DEI modules', 'elearnposh-amp' ),
						$demo_url
					);
					?>
				</div>
			</section>

			<?php elearnposh_amp_render_top_courses_section( array( 'exclude' => 'unconscious-bias' ) ); ?>
		</main>
		<div class="hrtag-end"></div>
	</div><!-- .amp-content-wrapper -->
	<?php include ELEARNPOSH_AMP_TEMPLATES_DIR . 'components/footer.php'; ?>
</body>
</html>
