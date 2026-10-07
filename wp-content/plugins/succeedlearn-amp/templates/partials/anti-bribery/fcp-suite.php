<?php
/**
 * Anti-Bribery AMP: page FCP suite (same courses as this page).
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$courses = array(
	array(
		'num'   => '01',
		'title' => __( 'Anti-Money Laundering (AML)', 'succeedlearn-amp' ),
		'text'  => __( 'Build awareness of money laundering risks, suspicious activity, customer due diligence, warning signs and appropriate escalation.', 'succeedlearn-amp' ),
		'slug'  => 'aml-pe-vc',
	),
	array(
		'num'     => '02',
		'title'   => __( 'Anti-Bribery and Anti-Corruption (ABAC)', 'succeedlearn-amp' ),
		'text'    => __( 'Help employees recognise bribery and corruption risks involving gifts, hospitality, conflicts, third parties and improper influence.', 'succeedlearn-amp' ),
		'slug'    => 'anti-bribery-anti-corruption',
		'current' => true,
	),
	array(
		'num'   => '03',
		'title' => __( 'Preventing Facilitation of Tax Evasion', 'succeedlearn-amp' ),
		'text'  => __( 'Help employees recognise tax-evasion facilitation risks, suspicious conduct and situations requiring appropriate prevention or escalation.', 'succeedlearn-amp' ),
		'slug'  => 'tax-evasion-facilitation',
	),
	array(
		'num'   => '04',
		'title' => __( 'Insider Trading', 'succeedlearn-amp' ),
		'text'  => __( 'Build awareness around inside information, confidential information, improper disclosure and responsible handling of market-sensitive data.', 'succeedlearn-amp' ),
		'slug'  => 'insider-trading',
	),
	array(
		'num'   => '05',
		'title' => __( 'Trade Compliance and Sanctions', 'succeedlearn-amp' ),
		'text'  => __( 'Help employees understand sanctions, restricted parties, high-risk jurisdictions, export controls and cross-border transaction risks.', 'succeedlearn-amp' ),
		'slug'  => 'trade-compliance-and-sanctions',
	),
	array(
		'num'   => '06',
		'title' => __( 'Failure to Prevent Fraud', 'succeedlearn-amp' ),
		'text'  => __( 'Develop awareness of fraud risks, associated-person risk, warning signs, preventive actions and reporting responsibilities.', 'succeedlearn-amp' ),
		'slug'  => 'failure-to-prevent-fraud',
	),
	array(
		'num'   => '07',
		'title' => __( 'Modern Slavery Awareness', 'succeedlearn-amp' ),
		'text'  => __( 'Build employee awareness of modern slavery risks and potential concerns within business activities and supply-chain relationships.', 'succeedlearn-amp' ),
		'slug'  => 'modern-slavery-awareness',
	),
	array(
		'num'   => '08',
		'title' => __( 'Responsible Use of AI', 'succeedlearn-amp' ),
		'text'  => __( 'Help employees understand responsible workplace use of AI and the importance of applying organisational controls when using AI tools.', 'succeedlearn-amp' ),
		'slug'  => 'responsible-use-of-gen-ai',
	),
);
?>
<section id="fcp-suite" class="sl-section sl-section--alt sl-course-suite sl-course-suite--fcp" aria-labelledby="sl-fcp-course-suite-title">
	<div class="sl-wrap">
		<div class="sl-course-suite__header">
			<div class="sl-course-suite__intro">
				<span class="sl-eyebrow sl-home-sub-heading">
					<?php esc_html_e( 'Financial Crime Prevention Suite', 'succeedlearn-amp' ); ?>
				</span>
				<h2 id="sl-fcp-course-suite-title" class="sl-h2">
					<?php esc_html_e( 'Explore Our eLearning Compliance Courses', 'succeedlearn-amp' ); ?>
				</h2>
				<p><?php esc_html_e( 'Build employee awareness across financial crime, ethical conduct and emerging compliance risks with practical, role-relevant eLearning.', 'succeedlearn-amp' ); ?></p>
			</div>
			<div class="sl-content-actions sl-course-suite__header-cta">
				<a class="sl-content-btn sl-content-btn-primary" href="#contact">
					<?php esc_html_e( 'Grab the whole suite for $1.5 per user per month', 'succeedlearn-amp' ); ?>
				</a>
			</div>
		</div>

		<div class="sl-course-suite__grid">
			<?php foreach ( $courses as $course ) : ?>
				<?php
				$is_current = ! empty( $course['current'] );
				$href       = $is_current ? '#contact' : succeedlearn_amp_course_suite_page_url( $course['slug'], '#contact' );
				$tile_class = 'sl-course-suite__tile' . ( $is_current ? ' is-active' : '' );
				$cta        = $is_current ? __( 'Buy This Course', 'succeedlearn-amp' ) : __( 'Explore More', 'succeedlearn-amp' );
				?>
				<a class="<?php echo esc_attr( $tile_class ); ?>" href="<?php echo esc_url( $href ); ?>">
					<div class="sl-course-suite__chrome">
						<span class="sl-course-suite__dash" aria-hidden="true"></span>
						<span class="sl-course-suite__num" aria-hidden="true"><?php echo esc_html( $course['num'] ); ?></span>
					</div>
					<h3 class="sl-panel-title"><?php echo esc_html( $course['title'] ); ?></h3>
					<p><?php echo esc_html( $course['text'] ); ?></p>
					<span class="sl-course-suite__cta">
						<?php echo esc_html( $cta ); ?>
						<span aria-hidden="true">→</span>
					</span>
				</a>
			<?php endforeach; ?>
		</div>
	</div>
</section>
