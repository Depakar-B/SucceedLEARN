<?php
/**
 * Global Financial Crime Prevention course suite for course pages.
 * Same content as the FCP home "Explore Our eLearning Compliance Courses"
 * section, with the current course highlighted.
 *
 * Usage:
 * get_template_part( 'template-parts/global/fcp-course-suite', null, array( ... ) );
 *
 * Args:
 * - current (string) key of the current course: aml, abac, tax-evasion,
 *   insider-trading, trade-sanctions, ftpf, msa, ai
 * - contact (string) anchor for the suite price button (default #contact)
 *
 * @package Akaza_Adventure
 */

defined( 'ABSPATH' ) || exit;

$args    = is_array( $args ?? null ) ? $args : array();
$current = isset( $args['current'] ) ? (string) $args['current'] : '';
$contact = isset( $args['contact'] ) ? (string) $args['contact'] : '#contact';

$course_url = static function ( array $slugs ) {
	foreach ( $slugs as $slug ) {
		$page = get_page_by_path( $slug );
		if ( $page ) {
			return get_permalink( $page );
		}
	}
	return '';
};

$courses = array(
	array(
		'key'   => 'aml',
		'title' => __( 'Anti-Money Laundering (AML)', 'akaza-adventure' ),
		'text'  => __( 'Build awareness of money laundering risks, suspicious activity, customer due diligence, warning signs and appropriate escalation.', 'akaza-adventure' ),
		'slugs' => array( 'aml-pe-vc' ),
	),
	array(
		'key'   => 'abac',
		'title' => __( 'Anti-Bribery and Anti-Corruption (ABAC)', 'akaza-adventure' ),
		'text'  => __( 'Help employees recognise bribery and corruption risks involving gifts, hospitality, conflicts, third parties and improper influence.', 'akaza-adventure' ),
		'slugs' => array( 'anti-bribery-anti-corruption' ),
	),
	array(
		'key'   => 'tax-evasion',
		'title' => __( 'Preventing Facilitation of Tax Evasion', 'akaza-adventure' ),
		'text'  => __( 'Help employees recognise tax-evasion facilitation risks, suspicious conduct and situations requiring appropriate prevention or escalation.', 'akaza-adventure' ),
		'slugs' => array( 'tax-evasion-facilitation' ),
	),
	array(
		'key'   => 'insider-trading',
		'title' => __( 'Insider Trading', 'akaza-adventure' ),
		'text'  => __( 'Build awareness around inside information, confidential information, improper disclosure and responsible handling of market-sensitive data.', 'akaza-adventure' ),
		'slugs' => array( 'insider-trading' ),
	),
	array(
		'key'   => 'trade-sanctions',
		'title' => __( 'Trade Compliance and Sanctions', 'akaza-adventure' ),
		'text'  => __( 'Help employees understand sanctions, restricted parties, high-risk jurisdictions, export controls and cross-border transaction risks.', 'akaza-adventure' ),
		'slugs' => array( 'trade-compliance-and-sanctions' ),
	),
	array(
		'key'   => 'ftpf',
		'title' => __( 'Failure to Prevent Fraud', 'akaza-adventure' ),
		'text'  => __( 'Develop awareness of fraud risks, associated-person risk, warning signs, preventive actions and reporting responsibilities.', 'akaza-adventure' ),
		'slugs' => array( 'failure-to-prevent-fraud', 'failur-to-prevent-fraud' ),
	),
	array(
		'key'   => 'msa',
		'title' => __( 'Modern Slavery Awareness', 'akaza-adventure' ),
		'text'  => __( 'Build employee awareness of modern slavery risks and potential concerns within business activities and supply-chain relationships.', 'akaza-adventure' ),
		'slugs' => array( 'modern-slavery-awareness' ),
	),
	array(
		'key'   => 'ai',
		'title' => __( 'Responsible Use of AI', 'akaza-adventure' ),
		'text'  => __( 'Help employees understand responsible workplace use of AI and the importance of applying organisational controls when using AI tools.', 'akaza-adventure' ),
		'slugs' => array( 'responsible-use-of-gen-ai', 'responsible-use-of-ai' ),
	),
);
?>

<section
	id="fcp-suite"
	class="sl-fcp-course-suite"
	aria-labelledby="sl-fcp-course-suite-title"
>
	<div class="container">

		<div class="sl-fcp-course-suite__header">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Financial Crime Prevention Suite', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-fcp-course-suite-title">
				<?php esc_html_e( 'Explore Our eLearning Compliance Courses', 'akaza-adventure' ); ?>
			</h2>

			<p class="sl-fcp-course-suite__lead">
				<?php esc_html_e( 'Build employee awareness across financial crime, ethical conduct and emerging compliance risks with practical, role-relevant eLearning.', 'akaza-adventure' ); ?>
			</p>

			<div class="sl-fcp-course-suite__price">
				<a href="<?php echo esc_attr( $contact ); ?>" class="sl-fcp-course-suite__cta" data-cta="fcp-suite-price">
					<?php
					printf(
						/* translators: %s: price per user per month. */
						esc_html__( 'Grab the whole suite for %s per user per month', 'akaza-adventure' ),
						'<span class="sl-fcp-course-suite__price-amount">' . esc_html__( '$1.5', 'akaza-adventure' ) . '</span>'
					);
					?>
				</a>
			</div>
		</div>

		<div class="sl-fcp-course-suite__grid">
			<?php foreach ( $courses as $index => $course ) : ?>
				<?php
				$is_current = ( $course['key'] === $current );
				$href       = $is_current ? '' : $course_url( $course['slugs'] );
				?>
				<article class="sl-fcp-course-suite__card<?php echo $is_current ? ' is-current' : ''; ?>">
					<div class="sl-fcp-course-suite__card-top">
						<span class="sl-fcp-course-suite__number"><?php echo esc_html( sprintf( '%02d', $index + 1 ) ); ?></span>
					</div>

					<h3><?php echo esc_html( $course['title'] ); ?></h3>

					<p><?php echo esc_html( $course['text'] ); ?></p>

					<?php if ( $is_current ) : ?>
						<a href="<?php echo esc_attr( $contact ); ?>" class="sl-fcp-course-suite__link">
							<?php esc_html_e( 'Buy This Course', 'akaza-adventure' ); ?>
							<span aria-hidden="true">→</span>
						</a>
					<?php elseif ( '' !== $href ) : ?>
						<a href="<?php echo esc_url( $href ); ?>" class="sl-fcp-course-suite__link">
							<?php esc_html_e( 'Explore More', 'akaza-adventure' ); ?>
							<span aria-hidden="true">→</span>
						</a>
					<?php else : ?>
						<a href="<?php echo esc_attr( $contact ); ?>" class="sl-fcp-course-suite__link">
							<?php esc_html_e( 'Enquire Now', 'akaza-adventure' ); ?>
							<span aria-hidden="true">→</span>
						</a>
					<?php endif; ?>
				</article>
			<?php endforeach; ?>
		</div>

	</div>
</section>
