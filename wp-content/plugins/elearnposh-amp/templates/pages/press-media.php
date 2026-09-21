<?php
/**
 * Press and Media Coverage Page Template
 *
 * @package ElearnPOSH\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require ELEARNPOSH_AMP_TEMPLATES_DIR . 'partials/amp-page-shell-start.php';

global $redux_builder_amp;

$config  = \ElearnPOSH\AMP\Plugin::get_instance()->get_config();
$post_id = absint( get_the_ID() );
if ( ! $post_id ) {
	$post_id = $config->resolve_page_id_by_map_key( 'press-media' );
}
$post_body_class = 'post-' . $post_id;
$page_permalink  = get_permalink( $post_id ) ?: home_url( '/press-media/' );

$press_items = array(
	array(
		'image'       => 'https://elearnposh.com/wp-content/uploads/2020/08/India-today.png',
		'width'       => 400,
		'height'      => 160,
		'alt'         => 'India Today',
		'title'       => '5 things corporate should keep in mind for a compliant workplace',
		'description' => 'Article by Founder of eLearnPOSH.com',
		'url'         => 'https://www.indiatoday.in/education-today/featurephilia/story/5-things-corporate-should-keep-in-mind-for-a-compliant-workplace-1713043-2020-08-20',
	),
	array(
		'image'       => 'https://elearnposh.com/wp-content/uploads/2020/08/et-logo.png',
		'width'       => 400,
		'height'      => 160,
		'alt'         => 'The Economic Times',
		'title'       => 'Companies now look to check harassment during work from home',
		'description' => '"Companies are also putting virtual conferencing rules in place..." says the Founder of eLearnPOSH.com',
		'url'         => 'https://economictimes.indiatimes.com/news/company/corporate-trends/companies-now-look-to-check-harassment-during-work-from-home/articleshow/77725397.cms',
	),
	array(
		'image'       => 'https://elearnposh.com/wp-content/uploads/2020/08/BW-people-logo.jpg',
		'width'       => 400,
		'height'      => 160,
		'alt'         => 'BW People',
		'title'       => 'Working Remote: Biggest Dos and Don\'t\'s',
		'description' => 'Article by Founder of eLearnPOSH.com',
		'url'         => 'http://bwpeople.businessworld.in/article/Working-Remote-Biggest-Dos-and-Don-ts-of-Video-Conferencing-for-Employees/07-08-2020-305988/',
	),
	array(
		'image'       => 'https://elearnposh.com/wp-content/uploads/2020/08/Screenshot_2020-08-25_15-14-16.png',
		'width'       => 400,
		'height'      => 160,
		'alt'         => 'Inc42',
		'title'       => 'The Biggest Dos And Don\'t\'s Of Video Conferencing For Employees',
		'description' => '"Home is considered as a part of workplace" says the Founder of eLearnPOSH.com',
		'url'         => 'https://inc42.com/resources/working-remote-the-biggest-dos-and-donts-of-video-conferencing/',
	),
	array(
		'image'       => 'https://elearnposh.com/wp-content/uploads/2020/08/ciol.png',
		'width'       => 400,
		'height'      => 160,
		'alt'         => 'CIOL',
		'title'       => 'PoSH Law: Things Corporate Should Keep In Mind For A Compliant Workplace',
		'description' => 'Article by Founder of eLearnPOSH.com',
		'url'         => 'https://www.ciol.com/posh-law-things-corporate-keep-mind-compliant-workplace/',
	),
	array(
		'image'       => 'https://elearnposh.com/wp-content/uploads/2020/10/erHT.png',
		'width'       => 400,
		'height'      => 160,
		'alt'         => 'ETHRWorld',
		'title'       => 'Busting Myths around POSH Law',
		'description' => '"Though the awareness about this law has increased by leaps and bounds, there are still many misconceptions." says the Co-Founder of elearnPOSH.com',
		'url'         => 'https://hr.economictimes.indiatimes.com/news/workplace-4-0/diversity-and-inclusion/busting-myths-around-posh-law/78524767',
	),
	array(
		'image'       => 'https://elearnposh.com/wp-content/uploads/2020/10/ceoinsights.png',
		'width'       => 400,
		'height'      => 160,
		'alt'         => 'CEO Insights',
		'title'       => 'How to Create Awareness and Build a Culture to Ensure a Safe Workplace',
		'description' => 'Jeelani Khan, Learning Technology Evangelist & Co-Founder, eLearnPOSH.com',
		'url'         => 'https://www.ceoinsightsindia.com/industry-insider/how-to-create-awareness-and-build-a-culture-to-ensure-a-safe-workplace-nwid-3775.html',
	),
	array(
		'image'       => 'https://elearnposh.com/wp-content/uploads/2020/11/Silicon.gif',
		'width'       => 400,
		'height'      => 160,
		'alt'         => 'Siliconindia',
		'title'       => 'From Workplace to Cyber-Workspace: Practical Challenges Under Sexual Harassment of Women at Workplace',
		'description' => 'Article by Subject Matter Expert, eLearnPOSH.com',
		'url'         => 'https://hr.siliconindia.com/viewpoint/cxoinsights/from-workplace-to-cyberworkspace-practical-challenges-under-sexual-harassment-of-women-at-workplace-nwid-24978.html',
	),
);

$press_schema = array(
	'@context'    => 'https://schema.org',
	'@type'       => 'CollectionPage',
	'name'        => 'Media Coverage',
	'description' => 'Press and media coverage featuring eLearnPOSH on POSH compliance and workplace safety.',
	'url'         => $page_permalink,
	'inLanguage'  => get_bloginfo( 'language' ),
	'publisher'   => array(
		'@type' => 'Organization',
		'name'  => 'eLearnPOSH',
		'url'   => home_url( '/' ),
	),
);
?>
<!doctype html>
<html amp lang="<?php echo esc_attr( get_bloginfo( 'language' ) ); ?>">
<head>
	<meta charset="utf-8" />
	<link rel="shortcut icon" href="<?php echo esc_url( elearnposh_amp_get_favicon_url() ); ?>" type="image/png" />
	<title><?php esc_html_e( 'eLearnPOSH Press and Media Coverage on POSH Compliance', 'elearnposh-amp' ); ?> - eLearnPOSH</title>
	<link rel="dns-prefetch" href="https://cdn.ampproject.org" />
	<?php do_action( 'amp_post_template_head', $this ); ?>
	<style amp-custom>
		html{scroll-padding-top:200px}
		body{font-family:'Nunito Sans',Arial,sans-serif;margin:0;padding:0;padding-top:100px !important;background:#f8fafc;color:#0f172a}
		a{color:inherit}
		<?php
		elearnposh_amp_output_page_styles(
			'press-media',
			array(),
			array( 'press-enterprise-amp' )
		);
		?>
	</style>
	<script type="application/ld+json"><?php echo elearnposh_amp_encode_page_schema_json_ld( $press_schema ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></script>
	<?php elearnposh_amp_output_components( 'press-media' ); ?>
</head>
<body class="<?php echo esc_attr( $post_body_class ); ?>">
	<?php include ELEARNPOSH_AMP_TEMPLATES_DIR . 'components/menu.php'; ?>
	<div class="amp-content-wrapper">
	<?php include ELEARNPOSH_AMP_TEMPLATES_DIR . 'components/user-notification.php'; ?>
		<main class="ep-press-page" id="press-media-page">
			<section class="ep-press-hero">
				<div class="ep-press-hero__inner ep-press-shell">
					<?php elearnposh_amp_render_breadcrumbs(); ?>
					<div class="ep-press-hero__content">
						<h1><?php esc_html_e( 'Media Coverage', 'elearnposh-amp' ); ?></h1>
						<p class="ep-page-hero__subtitle ep-press-hero__subtitle">
							<?php esc_html_e( 'Featured stories and interviews on POSH compliance, remote work, and building safer workplaces.', 'elearnposh-amp' ); ?>
						</p>
					</div>
				</div>
			</section>

			<section class="ep-press-media" id="press-media-coverage">
				<div class="ep-press-shell">
					<div class="ep-press-grid">
						<?php foreach ( $press_items as $press_item ) : ?>
						<article class="ep-press-card">
							<div class="ep-press-card__image">
								<div class="ep-press-card__image-frame">
									<amp-img
										src="<?php echo esc_url( $press_item['image'] ); ?>"
										width="<?php echo esc_attr( (string) $press_item['width'] ); ?>"
										height="<?php echo esc_attr( (string) $press_item['height'] ); ?>"
										layout="fill"
										object-fit="contain"
										alt="<?php echo esc_attr( $press_item['alt'] ); ?>"
									></amp-img>
								</div>
							</div>
							<div class="ep-press-card__body">
								<?php if ( ! empty( $press_item['alt'] ) ) : ?>
								<span class="ep-press-outlet"><?php echo esc_html( $press_item['alt'] ); ?></span>
								<?php endif; ?>
								<h3>
									<?php if ( ! empty( $press_item['url'] ) ) : ?>
									<a href="<?php echo esc_url( $press_item['url'] ); ?>" target="_blank" rel="noopener noreferrer">
										<?php echo esc_html( $press_item['title'] ); ?>
									</a>
									<?php else : ?>
									<?php echo esc_html( $press_item['title'] ); ?>
									<?php endif; ?>
								</h3>
								<p><?php echo esc_html( $press_item['description'] ); ?></p>
								<?php if ( ! empty( $press_item['url'] ) ) : ?>
								<a class="ep-press-read" href="<?php echo esc_url( $press_item['url'] ); ?>" target="_blank" rel="noopener noreferrer">
									<?php esc_html_e( 'Read article', 'elearnposh-amp' ); ?>
								</a>
								<?php endif; ?>
							</div>
						</article>
						<?php endforeach; ?>
					</div>
				</div>
			</section>

			<section class="ep-press-queries" id="press-queries">
				<div class="ep-press-shell">
					<div class="ep-press-queries__inner">
						<h2><?php esc_html_e( 'For Press Queries', 'elearnposh-amp' ); ?></h2>
						<p><?php esc_html_e( 'For interviews, statements, or media requests, reach our team directly.', 'elearnposh-amp' ); ?></p>
						<div class="ep-press-contacts">
							<a class="ep-press-contact" href="mailto:contact@elearnposh.com">
								<span class="ep-press-contact__label"><?php esc_html_e( 'Email us', 'elearnposh-amp' ); ?></span>
								<span class="ep-press-contact__value">contact@elearnposh.com</span>
							</a>
							<a class="ep-press-contact" href="tel:+917259159807">
								<span class="ep-press-contact__label"><?php esc_html_e( 'Call us', 'elearnposh-amp' ); ?></span>
								<span class="ep-press-contact__value">+91-72591 59807</span>
							</a>
						</div>
					</div>
				</div>
			</section>
		</main>
	</div>
	<?php include ELEARNPOSH_AMP_TEMPLATES_DIR . 'components/footer.php'; ?>
</body>
</html>
