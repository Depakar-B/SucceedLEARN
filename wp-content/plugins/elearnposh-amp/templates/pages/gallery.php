<?php
/**
 * eLearnPOSH Gallery AMP Template
 *
 * @package ElearnPOSH\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$gallery_categories = array(
	'Anniversary'  => array(
		array(
			'src'    => 'https://elearnposh.com/wp-content/uploads/2026/06/safe-workplace-respectful-culture-posh.webp',
			'alt'    => 'Anniversary celebration moments at eLearnPOSH',
			'width'  => 1280,
			'height' => 880,
		),
		array(
			'src'    => 'https://elearnposh.com/wp-content/uploads/2026/06/posh-compliance-hr-workplace-policy.webp',
			'alt'    => 'Anniversary event snapshot with team',
			'width'  => 1280,
			'height' => 880,
		),
	),
	'Celebrations' => array(
		array(
			'src'    => 'https://elearnposh.com/wp-content/uploads/2026/06/posh-employee-training-workplace-awareness.webp',
			'alt'    => 'Celebration highlights with employees',
			'width'  => 1280,
			'height' => 880,
		),
		array(
			'src'    => 'https://elearnposh.com/wp-content/uploads/2026/06/workplace-harassment-prevention-training.webp',
			'alt'    => 'Celebratory session at workplace',
			'width'  => 1280,
			'height' => 880,
		),
	),
	'Team Outing'  => array(
		array(
			'src'    => 'https://elearnposh.com/wp-content/uploads/2026/06/posh-continuous-learning-microlearning.webp',
			'alt'    => 'Team outing and bonding activity',
			'width'  => 1280,
			'height' => 880,
		),
		array(
			'src'    => 'https://elearnposh.com/wp-content/uploads/2026/06/posh-elearning-course-employees.webp',
			'alt'    => 'Team outing event memory',
			'width'  => 1280,
			'height' => 880,
		),
	),
	'Awards'       => array(
		array(
			'src'    => 'https://elearnposh.com/wp-content/uploads/2026/06/posh-refresher-microlearning-scenarios.webp',
			'alt'    => 'Award ceremony moments',
			'width'  => 1280,
			'height' => 720,
		),
		array(
			'src'    => 'https://elearnposh.com/wp-content/uploads/2026/06/posh-bite-sized-training-whatsapp-teams.webp',
			'alt'    => 'Recognition and awards event',
			'width'  => 1280,
			'height' => 720,
		),
	),
);
?>
<!doctype html>
<html amp lang="<?php echo esc_attr( get_bloginfo( 'language' ) ); ?>">
<head>
	<meta charset="utf-8">
	<title><?php echo esc_html( get_the_title() ); ?> - eLearnPOSH</title>
	<?php do_action( 'amp_post_template_head', $this ); ?>
	<style amp-custom>
		body{margin:0;padding:0;padding-top:100px !important;font-family:'Nunito Sans',Arial,sans-serif;background:#f6f9fd;color:#0f172a}
		.eg-wrap{max-width:1240px;margin:0 auto;padding:0 0 40px}
		.eg-hero{background:linear-gradient(135deg,#0d2238 0%,#1672ba 100%);color:#fff;border-radius:18px;padding:18px 16px;margin:0;box-shadow:0 12px 28px rgba(13,34,56,.18)}
		.eg-hero h1{margin:0 0 8px;font-size:clamp(1.5rem,1.05rem + 1.7vw,2.2rem);line-height:1.2;letter-spacing:-.01em}
		.eg-hero p{margin:0;color:rgba(255,255,255,.9);font-size:14px;line-height:1.65}
		.eg-nav{display:flex;flex-wrap:wrap;gap:8px;margin:0;padding:18px 16px;position:sticky;top:74px;z-index:500;background:#f6f9fd;border-bottom:1px solid #dde8f3;box-shadow:0 4px 12px rgba(13,34,56,.06)}
		.eg-chip{display:inline-flex;align-items:center;justify-content:center;padding:7px 12px;border-radius:999px;background:#e8f2fd;border:1px solid #cadff5;color:#0f5a94;font-size:12px;font-weight:700}
		.eg-section{margin-top:0;padding:18px 16px;scroll-margin-top:calc(74px + 72px)}
		.eg-section h2{margin:0 0 12px;font-size:clamp(1.15rem,.95rem + .8vw,1.55rem);line-height:1.3;color:#0d2238}
		.eg-empty{background:#fff;border:1px dashed #c8dbee;border-radius:12px;padding:18px 16px;margin:0;text-align:center;color:#54708d}
		@media (min-width:641px){
			.eg-hero,.eg-nav,.eg-section,.eg-empty{padding:24px 20px}
		}
		@media (max-width:640px){
			body{padding-top:90px !important}
		}
		<?php
		$optimizer = \ElearnPOSH\AMP\Performance_Optimizer::get_instance();
		echo $optimizer->get_optimized_css( 'gallery', array( 'menu', 'footer', 'image-grid' ) );
		?>
	</style>
	<?php elearnposh_amp_output_current_page_schema_json_ld(); ?>

	<?php elearnposh_amp_output_components( 'gallery', array() ); ?>
</head>
<body>
<?php include ELEARNPOSH_AMP_TEMPLATES_DIR . 'components/menu.php'; ?>
<div class="amp-content-wrapper">
	<?php include ELEARNPOSH_AMP_TEMPLATES_DIR . 'components/user-notification.php'; ?>
	<div class="eg-wrap">
		<?php elearnposh_amp_render_breadcrumbs(); ?>
		<section class="eg-hero">
			<h1><?php esc_html_e( 'eLearnPOSH Gallery', 'elearnposh-amp' ); ?></h1>
			<p><?php esc_html_e( 'Browse key moments from events, celebrations, team outings, awards, and culture activities.', 'elearnposh-amp' ); ?></p>
		</section>

		<?php if ( ! empty( $gallery_categories ) ) : ?>
			<nav class="eg-nav" aria-label="<?php esc_attr_e( 'Gallery category navigation', 'elearnposh-amp' ); ?>">
				<?php foreach ( $gallery_categories as $category_name => $images ) : ?>
					<a class="eg-chip" href="#<?php echo esc_attr( sanitize_title( $category_name ) ); ?>">
						<?php echo esc_html( $category_name ); ?>
					</a>
				<?php endforeach; ?>
			</nav>

			<?php foreach ( $gallery_categories as $category_name => $images ) : ?>
				<section class="eg-section" id="<?php echo esc_attr( sanitize_title( $category_name ) ); ?>">
					<h2><?php echo esc_html( $category_name ); ?></h2>
					<div class="pfe-why-gallery" aria-label="<?php echo esc_attr( sprintf( __( '%s gallery images', 'elearnposh-amp' ), $category_name ) ); ?>">
						<?php foreach ( $images as $image ) : ?>
							<?php elearnposh_amp_render_image_card( $image ); ?>
						<?php endforeach; ?>
					</div>
				</section>
			<?php endforeach; ?>
		<?php else : ?>
			<div class="eg-empty">
				<?php esc_html_e( 'Gallery images will appear here once categories are configured.', 'elearnposh-amp' ); ?>
			</div>
		<?php endif; ?>
	</div>
</div>
<?php include ELEARNPOSH_AMP_TEMPLATES_DIR . 'components/footer.php'; ?>
</body>
</html>
