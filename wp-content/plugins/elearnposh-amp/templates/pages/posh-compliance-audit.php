<?php
/**
 * POSH Compliance Audit (AMP) — marketing hero/about/FAQ + audit form.
 *
 * @package ElearnPOSH\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require ELEARNPOSH_AMP_TEMPLATES_DIR . 'partials/amp-page-shell-start.php';

$config  = \ElearnPOSH\AMP\Plugin::get_instance()->get_config();
$post_id = absint( get_the_ID() );
if ( ! $post_id ) {
	$post_id = $config->resolve_page_id_by_map_key( 'posh-compliance-audit' );
}
$post_body_class = 'post-' . $post_id;
$page_permalink  = $post_id ? get_permalink( $post_id ) : home_url( '/audit/' );

$page_title = get_the_title( $post_id ) ?: __( 'POSH Compliance Audit', 'elearnposh-amp' );
$hero_h1    = __( 'Free POSH Audit Tool Aligned with the SHe-Box PoSH Voluntary Compliance Checklist', 'elearnposh-amp' );
$hero_h2    = __( 'Check Your POSH Compliance Score and Download a Detailed Gap Report', 'elearnposh-amp' );
$page_desc  = __( 'Evaluate your organisation’s compliance with the Sexual Harassment of Women at Workplace (Prevention, Prohibition and Redressal) Act, 2013 using our free online POSH audit tool.', 'elearnposh-amp' );

$audit_faqs = array(
	array(
		'q'     => __( 'Why Use the Free POSH Audit Tool?', 'elearnposh-amp' ),
		'type'  => 'list',
		'items' => array(
			__( 'Free online POSH self-assessment', 'elearnposh-amp' ),
			__( 'No registration required', 'elearnposh-amp' ),
			__( 'Instant POSH compliance score', 'elearnposh-amp' ),
			__( 'Clear Yes, No and N/A summary', 'elearnposh-amp' ),
			__( 'Question-wise compliance status', 'elearnposh-amp' ),
			__( 'Identification of potential compliance gaps', 'elearnposh-amp' ),
			__( 'Downloadable PDF POSH audit report', 'elearnposh-amp' ),
			__( 'No personal information collected or stored', 'elearnposh-amp' ),
		),
	),
	array(
		'q'      => __( 'What Does the POSH Audit Report Include?', 'elearnposh-amp' ),
		'a_html' => '<p>' . esc_html__( 'The downloadable PDF report includes the organisation details entered during the assessment, the overall POSH compliance score, the total number of Yes, No and N/A responses, and the compliance status for each question.', 'elearnposh-amp' ) . '</p>'
			. '<p>' . esc_html__( 'It helps organisations identify responses marked as non-compliant and highlight potential compliance gaps for further internal review.', 'elearnposh-amp' ) . '</p>'
			. '<p>' . esc_html__( 'This accurately reflects the sample report, which provides an overall percentage, a Yes/No/N/A summary, and question-wise “Compliant” or “Not compliant” status.', 'elearnposh-amp' ) . '</p>',
	),
	array(
		'q' => __( 'Does the Report Provide Legal Advice or Recommendations?', 'elearnposh-amp' ),
		'a' => __( 'No. The report provides a POSH compliance score and question-wise compliance status based on the responses submitted. It does not constitute legal advice, compliance certification or detailed corrective recommendations.', 'elearnposh-amp' ),
	),
);

$page_schema = array(
	'@context'    => 'https://schema.org',
	'@type'       => 'WebPage',
	'name'        => $hero_h1,
	'description' => $page_desc,
	'url'         => $page_permalink,
	'inLanguage'  => get_bloginfo( 'language' ),
	'publisher'   => array(
		'@type' => 'Organization',
		'name'  => 'eLearnPOSH',
		'url'   => home_url( '/' ),
	),
);

$faq_schema = function_exists( 'elearnposh_amp_build_faq_schema' )
	? elearnposh_amp_build_faq_schema( $audit_faqs )
	: null;
?>
<!doctype html>
<html amp lang="<?php echo esc_attr( get_bloginfo( 'language' ) ); ?>">
<head>
	<meta charset="utf-8" />
	<link rel="shortcut icon" href="<?php echo esc_url( elearnposh_amp_get_favicon_url() ); ?>" type="image/png" />
	<title><?php echo esc_html( $page_title ); ?> - eLearnPOSH</title>
	<link rel="dns-prefetch" href="https://cdn.ampproject.org" />
	<?php do_action( 'amp_post_template_head', $this ); ?>

	<style amp-custom>
		body{font-family:'Nunito Sans',Arial,sans-serif;margin:0;padding:0;background:#fff;color:#0f172a}
		a{text-decoration:none;color:inherit}
		<?php include ELEARNPOSH_AMP_TEMPLATES_DIR . 'partials/faq-accordion-styles.php'; ?>
		<?php elearnposh_amp_output_page_styles( 'posh-compliance-audit', array(), array( 'page-hero-subtitle', 'posh-compliance-audit-page' ) ); ?>
		<?php
		if ( class_exists( 'EPA_AMP' ) ) {
			echo EPA_AMP::get_styles(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		}
		?>
	</style>
	<script type="application/ld+json"><?php echo elearnposh_amp_encode_page_schema_json_ld( $page_schema ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></script>
	<?php if ( $faq_schema ) : ?>
	<script type="application/ld+json"><?php echo elearnposh_amp_encode_page_schema_json_ld( $faq_schema ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></script>
	<?php endif; ?>
	<?php elearnposh_amp_output_components( 'posh-compliance-audit', array( 'amp-form', 'amp-mustache', 'amp-lightbox', 'amp-bind', 'amp-accordion' ) ); ?>
</head>
<body class="<?php echo esc_attr( $post_body_class ); ?>">

<?php include ELEARNPOSH_AMP_TEMPLATES_DIR . 'components/menu.php'; ?>

<div class="amp-content-wrapper">
<?php include ELEARNPOSH_AMP_TEMPLATES_DIR . 'components/user-notification.php'; ?>

<main class="ep-posh-audit-page" id="posh-compliance-audit-page">
	<section class="ep-posh-audit-hero" aria-labelledby="posh-audit-hero-title">
		<div class="ep-posh-audit-hero__inner">
			<?php elearnposh_amp_render_breadcrumbs(); ?>
			<div class="ep-posh-audit-hero__grid">
				<div class="ep-posh-audit-hero__content">
					<h1 id="posh-audit-hero-title"><?php echo esc_html( $hero_h1 ); ?></h1>
					<h2 class="ep-page-hero__subtitle ep-posh-audit-hero__subtitle"><?php echo esc_html( $hero_h2 ); ?></h2>
					<div class="ep-posh-audit-hero__desc">
						<p><?php echo esc_html( $page_desc ); ?></p>
						<p><?php esc_html_e( 'The assessment is aligned with key requirements under the POSH Act and the SHe-Box PoSH Voluntary Compliance Checklist.', 'elearnposh-amp' ); ?></p>
					</div>
				</div>
				<figure class="ep-posh-audit-hero__media">
					<?php
					$hero_img = 'https://elearnposh.com/wp-content/uploads/2026/07/POSH-Compliance-Audit.webp';
					if ( function_exists( 'elearnposh_amp_resolve_media_url' ) ) {
						$hero_img = elearnposh_amp_resolve_media_url( $hero_img );
					}
					?>
					<amp-img
						src="<?php echo esc_url( $hero_img ); ?>"
						width="1200"
						height="900"
						layout="responsive"
						alt="<?php esc_attr_e( 'POSH Compliance Audit dashboard with compliance score and checklist', 'elearnposh-amp' ); ?>"
					></amp-img>
				</figure>
			</div>
			<div class="ep-posh-audit-hero__points">
				<h3 class="ep-posh-audit-hero__points-title"><?php esc_html_e( 'Answer a structured series of compliance questions to:', 'elearnposh-amp' ); ?></h3>
				<ul class="ep-posh-audit-hero__checks">
					<li><span class="ep-posh-audit-hero__tick" aria-hidden="true"></span><span><?php esc_html_e( 'Receive an instant POSH compliance score', 'elearnposh-amp' ); ?></span></li>
					<li><span class="ep-posh-audit-hero__tick" aria-hidden="true"></span><span><?php esc_html_e( 'View the total number of compliant and non-compliant responses', 'elearnposh-amp' ); ?></span></li>
					<li><span class="ep-posh-audit-hero__tick" aria-hidden="true"></span><span><?php esc_html_e( 'Identify gaps where your response is “No”', 'elearnposh-amp' ); ?></span></li>
					<li><span class="ep-posh-audit-hero__tick" aria-hidden="true"></span><span><?php esc_html_e( 'Download the audit report for free', 'elearnposh-amp' ); ?></span></li>
				</ul>
			</div>
		</div>
	</section>

	<div class="ep-posh-audit-page__inner">
		<?php
		$raw_content   = $post_id ? (string) get_post_field( 'post_content', $post_id ) : '';
		$has_shortcode = $raw_content && (
			has_shortcode( $raw_content, 'posh_compliance_audit' )
			|| has_shortcode( $raw_content, 'posh_compliance_audit_amp' )
			|| false !== strpos( $raw_content, '[posh_compliance_audit' )
		);

		// Only the audit wizard — never render other page shortcodes (e.g. [contact_form]).
		if ( $has_shortcode || shortcode_exists( 'posh_compliance_audit_amp' ) || shortcode_exists( 'posh_compliance_audit' ) ) {
			if ( shortcode_exists( 'posh_compliance_audit_amp' ) ) {
				echo do_shortcode( '[posh_compliance_audit_amp]' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			} elseif ( shortcode_exists( 'posh_compliance_audit' ) ) {
				echo do_shortcode( '[posh_compliance_audit show_intro="0"]' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}
		} else {
			?>
			<div class="epa-amp-fallback">
				<p><?php esc_html_e( 'Please activate the POSH Compliance Audit Pro plugin to use this page.', 'elearnposh-amp' ); ?></p>
			</div>
			<?php
		}
		?>
	</div>

	<section class="ep-posh-audit-about" aria-labelledby="posh-audit-about-title">
		<div class="ep-posh-audit-about__inner">
			<div class="ep-posh-audit-about__grid">
				<div class="ep-posh-audit-about__copy">
					<h2 id="posh-audit-about-title"><?php esc_html_e( 'About the Free POSH Audit Tool', 'elearnposh-amp' ); ?></h2>
					<p><?php esc_html_e( 'The Free POSH Audit Tool by eLearnPOSH is an online self-assessment designed to help organisations evaluate their current POSH compliance status.', 'elearnposh-amp' ); ?></p>
					<p><?php esc_html_e( 'The tool assesses key areas under the POSH Act, 2013 and the SHe-Box PoSH Voluntary Compliance Checklist. Once the assessment is completed, it generates an overall POSH compliance score and a downloadable PDF report showing compliant and non-compliant responses.', 'elearnposh-amp' ); ?></p>
					<p><?php esc_html_e( 'This enables HR, legal, compliance and Internal Committee teams to identify potential compliance gaps that may require further internal review.', 'elearnposh-amp' ); ?></p>
				</div>
				<figure class="ep-posh-audit-about__media">
					<?php
					$about_img = 'https://elearnposh.com/wp-content/uploads/2026/07/POSH-Audit.webp';
					if ( function_exists( 'elearnposh_amp_resolve_media_url' ) ) {
						$about_img = elearnposh_amp_resolve_media_url( $about_img );
					}
					?>
					<amp-img
						src="<?php echo esc_url( $about_img ); ?>"
						width="640"
						height="480"
						layout="responsive"
						alt="<?php esc_attr_e( 'Professionals reviewing POSH compliance together', 'elearnposh-amp' ); ?>"
					></amp-img>
				</figure>
			</div>
		</div>
	</section>

	<div class="ep-posh-audit-faq">
		<?php
		if ( function_exists( 'elearnposh_amp_render_faq_section' ) ) {
			elearnposh_amp_render_faq_section( $audit_faqs, 'posh-audit-faq', __( 'FAQ', 'elearnposh-amp' ) );
		}
		?>
	</div>
</main>

</div>

<?php include ELEARNPOSH_AMP_TEMPLATES_DIR . 'components/footer.php'; ?>
<?php include ELEARNPOSH_AMP_TEMPLATES_DIR . 'components/bottom-bar.php'; ?>
</body>
</html>
