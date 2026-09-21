<?php
/**
 * Home Page Template
 *
 * @package ElearnPOSH\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<!doctype html>
<html amp lang="<?php echo esc_attr( get_bloginfo( 'language' ) ); ?>">
<head>
	<link rel="preconnect" href="https://cdn.ampproject.org">
	<link rel="dns-prefetch" href="https://cdn.ampproject.org">
	<link rel="preconnect" href="https://res.cloudinary.com">
	<link rel="dns-prefetch" href="https://res.cloudinary.com">
	<link rel="preconnect" href="https://elearnposh.com">
	<link rel="dns-prefetch" href="https://elearnposh.com">
	<?php
	$ep_amp_home_hero_img = 'https://elearnposh.com/wp-content/uploads/2026/07/Best-Cost-effecient-eLearning-POSH-Training.webp';
	?>
	<link rel="preload" as="image" href="<?php echo esc_url( $ep_amp_home_hero_img ); ?>">
	<meta charset="utf-8" />
	<link rel="shortcut icon" href="<?php echo esc_url( elearnposh_amp_get_favicon_url() ); ?>" type="image/png" />
	<title><?php echo esc_html( get_bloginfo( 'name' ) . ' - Best in Class & Comprehensive POSH eLearning' ); ?></title>
	
	<?php do_action( 'amp_post_template_head', $this ); ?>
	
	<style amp-custom>
	<?php elearnposh_amp_output_page_styles( 'home', array( 'home-page' ), array( 'contact-form', 'home-clients-testimonials', 'eposh-vz', 'home-sections' ) ); ?>
	</style>
	
	<script type="application/ld+json"><?php echo wp_json_encode( elearnposh_amp_get_homepage_schema_graph(), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></script>
	
	<?php elearnposh_amp_output_components( 'home', array( 'amp-form', 'amp-mustache', 'amp-bind' ) ); ?>
</head>

<body>
	<?php include ELEARNPOSH_AMP_TEMPLATES_DIR . 'components/menu.php'; ?>
	<?php include ELEARNPOSH_AMP_TEMPLATES_DIR . 'components/user-notification.php'; ?>
	
	<!-- Hero Section -->
	<div class="showcase content content-width">
		<div class="pricing-img">
		<amp-img 
			src="<?php echo esc_url( $ep_amp_home_hero_img ); ?>" 
			width="250" 
			height="60"
			layout="responsive"
			importance="high"
		></amp-img>
		</div>
		<div class="information">
			<h1 class="heading">
				<?php esc_html_e( 'Prevent workplace sexual harassment with our comprehensive POSH training', 'elearnposh-amp' ); ?>
			</h1>
			<p class="brief">
				<?php esc_html_e( 'Go beyond basic POSH compliance with on-demand eLearning, expert-led webinars, and practical tools for IC Members that help organisations build safer, more respectful workplaces.', 'elearnposh-amp' ); ?>
			</p>
		</div>
		<div class="col-12 text-left mt-4 home-hero-cta-wrap">
			<a href="#schedule-a-demo" class="btn btn-schedule px-5 text-white text-center" aria-label="<?php esc_attr_e( 'Schedule a free demo of POSH training', 'elearnposh-amp' ); ?>" title="<?php esc_attr_e( 'Schedule a free demo', 'elearnposh-amp' ); ?>">
				<?php esc_html_e( 'Schedule a Free Demo', 'elearnposh-amp' ); ?>
			</a>
		</div>
		<div class="home-hero-video-wrap">
			<amp-video
				class="home-hero-video"
				controls
				width="640"
				height="360"
				layout="responsive"
				preload="none"
				poster="https://res.cloudinary.com/dhrgc7mqu/video/upload/so_0,w_1280,h_720,c_fill,f_jpg/v1692691119/eLearnPOSH_homepage_z2dgs3.jpg"
			>
				<source src="https://res.cloudinary.com/dhrgc7mqu/video/upload/v1692691119/eLearnPOSH_homepage_z2dgs3.mp4" type="video/mp4" />
				<div fallback>
					<p><?php esc_html_e( 'This browser does not support the video element.', 'elearnposh-amp' ); ?></p>
				</div>
			</amp-video>
		</div>

	</div>
	
	
<div class="achievement-government-wrap">
		<!-- Achievement Section -->
	<section class="achievement">
		<div class="achievement-row">
			<div class="achievement-content">
				<p class="achievement-content-description">
					<?php esc_html_e( 'eLearnPOSH.com by Succeed Technologies is approved and empanelled by the', 'elearnposh-amp' ); ?>
					<b><?php esc_html_e( 'Ministry of Women and Child Development', 'elearnposh-amp' ); ?></b>
					<?php esc_html_e( 'to provide POSH training.', 'elearnposh-amp' ); ?>
				</p>
			</div>
			<div class="achievement-img">
				<div class="achievement-img-inner">
					<amp-img 
						src="https://elearnposh.com/wp-content/uploads/2025/06/Ministry-of-Women-and-child-dev-1.png" 
						width="300" 
						height="150"
						layout="responsive"
						alt="<?php esc_attr_e( 'Ministry Logo', 'elearnposh-amp' ); ?>">
					</amp-img>
				</div>
			</div>
		</div>
	</section>
	<!-- Government Section -->
	<section class="government">
		<div class="govt-container">
		<div class="govt-main-content">
			<div class="govt-text-content">
				<h3>
					eLearnPOSH.com has been recognized as the winner in the "Innovation in Education" category at the 15th Aegis Graham Bell Awards 2025.
				</h3>
				<p>
					Succeed Technologies (eLearnPOSH) was awarded for "Innovation in Education" by Hon'ble Minister Shri Jayant Chaudhary, MoS for Ministry of Education, Government of India in the 15th Aegis Graham Bell Awards.
				</p>
			</div>
		</div>
		<div class="govt-supported-section">
			<div class="govt-supported-award">
				<amp-img
					src="https://elearnposh.com/wp-content/uploads/2025/12/Aegis_Award.webp"
					width="600"
					height="400"
					layout="responsive"
					alt="Aegis Graham Bell Awards 2025">
				</amp-img>
			</div>
			<div class="govt-supported-right">
				<span class="govt-supported-label">Supported by</span>
				<div class="govt-supported-logos">
					<amp-img 
						src="https://elearnposh.com/wp-content/uploads/2025/06/Govt-Logos-without-Emblem.png" 
						width="250" 
						height="60" 
						layout="responsive"
						alt="Government Logos">
					</amp-img>
				</div>
			</div>
		</div>
		</div>
	</section>

	<section id="home-stats-section" aria-label="<?php esc_attr_e( 'Key statistics', 'elearnposh-amp' ); ?>">
		<?php
		/** Key statistics: final values only (no count-up). */
		$home_stats_figures = array(
			array( 'value' => '900+', 'label' => __( 'Organizations Trust Us', 'elearnposh-amp' ) ),
			array( 'value' => '200000+', 'label' => __( 'Employees Trained', 'elearnposh-amp' ) ),
			array( 'value' => '95%', 'label' => __( 'Course Completion', 'elearnposh-amp' ) ),
			array( 'value' => '92%', 'label' => __( 'Customer Retention Rate', 'elearnposh-amp' ) ),
			array( 'value' => '10+Years', 'label' => __( 'Industry Expertise', 'elearnposh-amp' ) ),
			array( 'value' => '5+Years', 'label' => __( 'Content Library', 'elearnposh-amp' ) ),
		);
		?>
		<div class="stats-bar">
			<?php foreach ( $home_stats_figures as $row ) : ?>
				<div class="stat">
					<h2><?php echo esc_html( $row['value'] ); ?></h2>
					<span><?php echo esc_html( $row['label'] ); ?></span>
				</div>
			<?php endforeach; ?>
		</div>
	</section>
</div>
<!-- Removed extra closing div to fix markup structure -->

	<section id="amp-pricing-block" aria-label="<?php esc_attr_e( 'Comprehensive offerings on POSH', 'elearnposh-amp' ); ?>">

	<div class="amp-pricing-inner">

		<h2 class="eposh-section-title"><?php esc_html_e( 'Comprehensive Offerings on POSH', 'elearnposh-amp' ); ?></h2>

		<div class="amp-pricing-group amp-pricing-group--employees">
			<p class="amp-group-heading"><?php esc_html_e( 'POSH Training for Employees & Managers', 'elearnposh-amp' ); ?></p>
			<?php $posh_employees_url = elearnposh_amp_get_employees_page_url(); ?>
			<div class="amp-pricing-cards amp-pricing-cards--duo">

			<div class="amp-pc">
				<div>
					<div class="amp-pricelist-title">
						<h3><?php esc_html_e( 'POSH Foundation', 'elearnposh-amp' ); ?></h3>
						<p><?php esc_html_e( 'Your foundation for a safer workplace', 'elearnposh-amp' ); ?></p>
					</div>
					<div class="amp-pricelist-desc">
						<p><?php esc_html_e( '12-Month Compliance Subscription Includes:', 'elearnposh-amp' ); ?></p>
					</div>
				</div>
				<div class="amp-pc-body">
					<p class="amp-pro-h" style="margin-bottom:10px;"><?php esc_html_e( 'Standard Offerings', 'elearnposh-amp' ); ?></p>
					<ul class="amp-pc-list">
						<li><?php esc_html_e( 'POSH for Employees (45-50 Minutes eLearning)', 'elearnposh-amp' ); ?></li>
						<li class="amp-lang-item">
							<span class="amp-lang-label"><?php esc_html_e( 'Available in English + 8 Regional Languages', 'elearnposh-amp' ); ?></span>
							<ul class="amp-sub-list">
								<li><?php esc_html_e( 'Hindi', 'elearnposh-amp' ); ?></li>
								<li><?php esc_html_e( 'Marathi', 'elearnposh-amp' ); ?></li>
								<li><?php esc_html_e( 'Gujarati', 'elearnposh-amp' ); ?></li>
								<li><?php esc_html_e( 'Bengali', 'elearnposh-amp' ); ?></li>
								<li><?php esc_html_e( 'Kannada', 'elearnposh-amp' ); ?></li>
								<li><?php esc_html_e( 'Tamil', 'elearnposh-amp' ); ?></li>
								<li><?php esc_html_e( 'Telugu', 'elearnposh-amp' ); ?></li>
								<li><?php esc_html_e( 'Malayalam', 'elearnposh-amp' ); ?></li>
							</ul>
						</li>
						<li><?php esc_html_e( 'Aligned to POSH policy - Gender Neutral / Specific Options', 'elearnposh-amp' ); ?></li>
					</ul>
				</div>
				<div class="amp-pc-footer">
					<a class="amp-pc-btn" href="<?php echo esc_url( $posh_employees_url ); ?>" aria-label="<?php esc_attr_e( 'Know more about POSH Foundation', 'elearnposh-amp' ); ?>"><?php esc_html_e( 'Know More', 'elearnposh-amp' ); ?></a>
				</div>
			</div>

			<div class="amp-pc amp-pc--pro">
				<div>
					<div class="amp-pricelist-title">
						<h3><?php esc_html_e( 'POSH Pro', 'elearnposh-amp' ); ?></h3>
						<p><?php esc_html_e( 'Beyond compliance - build a culture of respect', 'elearnposh-amp' ); ?></p>
					</div>
					<div class="amp-pricelist-desc">
						<p><?php esc_html_e( '12-Month Compliance Subscription Includes:', 'elearnposh-amp' ); ?></p>
					</div>
				</div>
				<div class="amp-pc-body">
					<div class="amp-pro-sections">
						<div class="amp-pro-block">
							<p class="amp-pro-h"><?php esc_html_e( '1. Organisations can choose 1 standard training module among', 'elearnposh-amp' ); ?></p>
							<ul class="amp-pc-list amp-pc-list-nested">
								<li><?php esc_html_e( 'POSH Foundation', 'elearnposh-amp' ); ?></li>
								<li><?php esc_html_e( 'POSH in Action - Live-Action Training Modules', 'elearnposh-amp' ); ?></li>
								<li><?php esc_html_e( 'POSH Fundamentals', 'elearnposh-amp' ); ?></li>
							</ul>
						</div>
						<div class="amp-pro-block">
							<p class="amp-pro-h"><?php esc_html_e( '2. Refresher Training Flexibility', 'elearnposh-amp' ); ?></p>
							<ul class="amp-pc-list amp-pc-list-nested">
								<li><?php esc_html_e( 'Refresher Module (Q & A based adaptive learning)', 'elearnposh-amp' ); ?></li>
								<li><?php esc_html_e( 'ePOSH Bytes - Multiple MicroLearning Modules (2-5 min)', 'elearnposh-amp' ); ?></li>
								<li><?php esc_html_e( 'Respect at workplace', 'elearnposh-amp' ); ?></li>
							</ul>
						</div>
						<div class="amp-pro-block">
							<p class="amp-pro-h"><?php esc_html_e( '3. Manager eLearning (English)', 'elearnposh-amp' ); ?></p>
							<ul class="amp-pc-list amp-pc-list-nested">
								<li><?php esc_html_e( 'Everything in POSH Foundation +', 'elearnposh-amp' ); ?></li>
								<li><?php esc_html_e( 'POSH in Action - Live-Action Training Modules', 'elearnposh-amp' ); ?></li>
								<li><?php esc_html_e( 'ePOSH Bytes - Multiple MicroLearning Modules (2-5 min each)', 'elearnposh-amp' ); ?></li>
								<li><?php esc_html_e( 'Manager eLearning (English)', 'elearnposh-amp' ); ?></li>
							</ul>
						</div>
						<div class="amp-pro-block">
							<p class="amp-pro-h"><?php esc_html_e( '4. Quick Release of MicroLearning via WhatsApp, Teams and Email', 'elearnposh-amp' ); ?></p>
							<p class="amp-pro-copy">
								<?php esc_html_e( 'Deploy short microlearning modules instantly across WhatsApp, Microsoft Teams, and email.', 'elearnposh-amp' ); ?>
							</p>
						</div>
						<div class="amp-pro-block">
							<p class="amp-pro-h"><?php esc_html_e( '5. POSH Resource Tab for HR & Compliance Teams', 'elearnposh-amp' ); ?></p>
							<ul class="amp-pc-list">
								<li><?php esc_html_e( 'Diversity Survey', 'elearnposh-amp' ); ?></li>
								<li><?php esc_html_e( 'Policy Drafting Tools', 'elearnposh-amp' ); ?></li>
								<li><?php esc_html_e( 'POSHters - Multilingual Editable Posters', 'elearnposh-amp' ); ?></li>
								<li><?php esc_html_e( 'POSH Audit', 'elearnposh-amp' ); ?></li>
								<li><?php esc_html_e( 'District Officer Contact Details', 'elearnposh-amp' ); ?></li>
								<li><?php esc_html_e( 'External Members Directory', 'elearnposh-amp' ); ?></li>
								<li><?php esc_html_e( 'Organizational Compliance Certificate', 'elearnposh-amp' ); ?></li>
							</ul>
						</div>
					</div>
					<amp-accordion class="amp-pro-sections-accordion" animate disable-session-states expand-single-section>
						<section expanded>
							<h3 class="amp-pro-acc-head"><span class="amp-pro-acc-head-text"><?php esc_html_e( '1. Organisations can choose 1 standard training module among', 'elearnposh-amp' ); ?></span><span class="amp-pro-acc-arrow" aria-hidden="true">â–¾</span></h3>
							<div class="amp-pro-acc-content">
								<ul class="amp-pc-list amp-pc-list-nested">
									<li><?php esc_html_e( 'POSH Foundation', 'elearnposh-amp' ); ?></li>
									<li><?php esc_html_e( 'POSH in Action - Live-Action Training Modules', 'elearnposh-amp' ); ?></li>
									<li><?php esc_html_e( 'POSH Fundamentals', 'elearnposh-amp' ); ?></li>
								</ul>
							</div>
						</section>
						<section>
							<h3 class="amp-pro-acc-head"><span class="amp-pro-acc-head-text"><?php esc_html_e( '2. Refresher Training Flexibility', 'elearnposh-amp' ); ?></span><span class="amp-pro-acc-arrow" aria-hidden="true">â–¾</span></h3>
							<div class="amp-pro-acc-content">
								<ul class="amp-pc-list amp-pc-list-nested">
									<li><?php esc_html_e( 'Refresher Module (Q & A based adaptive learning)', 'elearnposh-amp' ); ?></li>
									<li><?php esc_html_e( 'ePOSH Bytes - Multiple MicroLearning Modules (2-5 min)', 'elearnposh-amp' ); ?></li>
									<li><?php esc_html_e( 'Respect at workplace', 'elearnposh-amp' ); ?></li>
								</ul>
							</div>
						</section>
						<section>
							<h3 class="amp-pro-acc-head"><span class="amp-pro-acc-head-text"><?php esc_html_e( '3. Manager eLearning (English)', 'elearnposh-amp' ); ?></span><span class="amp-pro-acc-arrow" aria-hidden="true">â–¾</span></h3>
							<div class="amp-pro-acc-content">
								<ul class="amp-pc-list amp-pc-list-nested">
									<li><?php esc_html_e( 'Everything in POSH Foundation +', 'elearnposh-amp' ); ?></li>
									<li><?php esc_html_e( 'POSH in Action - Live-Action Training Modules', 'elearnposh-amp' ); ?></li>
									<li><?php esc_html_e( 'ePOSH Bytes - Multiple MicroLearning Modules (2-5 min each)', 'elearnposh-amp' ); ?></li>
									<li><?php esc_html_e( 'Manager eLearning (English)', 'elearnposh-amp' ); ?></li>
								</ul>
							</div>
						</section>
						<section>
							<h3 class="amp-pro-acc-head"><span class="amp-pro-acc-head-text"><?php esc_html_e( '4. Quick Release of MicroLearning via WhatsApp, Teams and Email', 'elearnposh-amp' ); ?></span><span class="amp-pro-acc-arrow" aria-hidden="true">â–¾</span></h3>
							<div class="amp-pro-acc-content">
								<p class="amp-pro-copy">
									<?php esc_html_e( 'Deploy short microlearning modules instantly across WhatsApp, Microsoft Teams, and email.', 'elearnposh-amp' ); ?>
								</p>
							</div>
						</section>
						<section>
							<h3 class="amp-pro-acc-head"><span class="amp-pro-acc-head-text"><?php esc_html_e( '5. POSH Resource Tab for HR & Compliance Teams', 'elearnposh-amp' ); ?></span><span class="amp-pro-acc-arrow" aria-hidden="true">â–¾</span></h3>
							<div class="amp-pro-acc-content">
								<ul class="amp-pc-list">
									<li><?php esc_html_e( 'Diversity Survey', 'elearnposh-amp' ); ?></li>
									<li><?php esc_html_e( 'Policy Drafting Tools', 'elearnposh-amp' ); ?></li>
									<li><?php esc_html_e( 'POSHters - Multilingual Editable Posters', 'elearnposh-amp' ); ?></li>
									<li><?php esc_html_e( 'POSH Audit', 'elearnposh-amp' ); ?></li>
									<li><?php esc_html_e( 'District Officer Contact Details', 'elearnposh-amp' ); ?></li>
									<li><?php esc_html_e( 'External Members Directory', 'elearnposh-amp' ); ?></li>
									<li><?php esc_html_e( 'Organizational Compliance Certificate', 'elearnposh-amp' ); ?></li>
								</ul>
							</div>
						</section>
					</amp-accordion>
				</div>
				<div class="amp-pc-footer">
					<a class="amp-pc-btn" href="<?php echo esc_url( $posh_employees_url ); ?>" aria-label="<?php esc_attr_e( 'Know more about POSH Pro', 'elearnposh-amp' ); ?>"><?php esc_html_e( 'Know More', 'elearnposh-amp' ); ?></a>
				</div>
			</div>

			</div><!-- .amp-pricing-cards--duo -->
		</div><!-- .amp-pricing-group--employees -->

		<div class="amp-pricing-group amp-pricing-group--ic">
			<p class="amp-group-heading amp-group-heading--ic"><?php esc_html_e( 'POSH Training for Internal Committee (IC)', 'elearnposh-amp' ); ?></p>
			<div class="amp-pricing-cards amp-pricing-cards--single">
				<div class="amp-pc amp-pc--ic">
				<div>
					<div class="amp-pricelist-title">
						<h3><?php esc_html_e( 'POSH for IC Members', 'elearnposh-amp' ); ?></h3>
						<p><?php esc_html_e( 'Best IC Training & Capacity Building', 'elearnposh-amp' ); ?></p>
					</div>
					<div class="amp-pricelist-desc">
						<p><?php esc_html_e( '12-Month Compliance Subscription Includes:', 'elearnposh-amp' ); ?></p>
					</div>
				</div>
				<div class="amp-pc-body">
					<ul class="amp-pc-list">
						<li><?php esc_html_e( '110 Minutes of IC eLearning', 'elearnposh-amp' ); ?></li>
						<li><?php esc_html_e( '3 x 90 Min Live Webinars', 'elearnposh-amp' ); ?></li>
						<li><?php esc_html_e( 'Library of Recorded Webinars', 'elearnposh-amp' ); ?></li>
						<li><?php esc_html_e( 'Policy Drafting Tool & Expert Review', 'elearnposh-amp' ); ?></li>
						<li><?php esc_html_e( 'Complaints Management System', 'elearnposh-amp' ); ?></li>
						<li><?php esc_html_e( 'IC Knowledge Base', 'elearnposh-amp' ); ?></li>
						<li><?php esc_html_e( 'POSH Posters & Templates Library', 'elearnposh-amp' ); ?></li>
						<li><?php esc_html_e( 'Ask an Expert', 'elearnposh-amp' ); ?></li>
						<li><?php esc_html_e( 'POSH Audit Tool', 'elearnposh-amp' ); ?></li>
						<li><?php esc_html_e( 'IC Meeting Register', 'elearnposh-amp' ); ?></li>
						<li><?php esc_html_e( 'DO Contact Details', 'elearnposh-amp' ); ?></li>
					</ul>
				</div>
				<div class="amp-pc-footer">
					<a class="amp-pc-btn" href="<?php echo elearnposh_amp_url( '/contact-us' ); ?>"><?php esc_html_e( 'Explore IC Training Solutions', 'elearnposh-amp' ); ?></a>
				</div>
			</div>
			</div><!-- .amp-pricing-cards--single -->
		</div><!-- .amp-pricing-group--ic -->

		<div class="learning-experience-shell">
			<div class="learning-experience-card">
				<div class="learning-experience-card__header">
					<h3 class="learning-experience-card__title"><?php esc_html_e( 'Learning Experience & Support', 'elearnposh-amp' ); ?></h3>
					<p class="learning-experience-card__subtitle"><?php esc_html_e( 'Available in All POSH Modules', 'elearnposh-amp' ); ?></p>
				</div>
				<div class="learning-experience-card__grid">
					<ul class="learning-experience-card__list">
						<li class="learning-experience-card__item">
							<span class="learning-experience-card__check" aria-hidden="true"></span>
							<span class="learning-experience-card__text"><?php esc_html_e( 'Branded Learning Portal (Hosted on eLearnPOSH.com)', 'elearnposh-amp' ); ?></span>
						</li>
						<li class="learning-experience-card__item">
							<span class="learning-experience-card__check" aria-hidden="true"></span>
							<span class="learning-experience-card__text"><?php esc_html_e( 'Assessment & Completion Certificates', 'elearnposh-amp' ); ?></span>
						</li>
						<li class="learning-experience-card__item">
							<span class="learning-experience-card__check" aria-hidden="true"></span>
							<span class="learning-experience-card__text"><?php esc_html_e( 'User Completion Tracking & Automated Reminders', 'elearnposh-amp' ); ?></span>
						</li>
					</ul>
					<ul class="learning-experience-card__list">
						<li class="learning-experience-card__item">
							<span class="learning-experience-card__check" aria-hidden="true"></span>
							<span class="learning-experience-card__text"><?php esc_html_e( 'Accessible through - Single Sign-On & Android Mobile App', 'elearnposh-amp' ); ?></span>
						</li>
						<li class="learning-experience-card__item">
							<span class="learning-experience-card__check" aria-hidden="true"></span>
							<span class="learning-experience-card__text"><?php esc_html_e( 'Implementation & Support Included', 'elearnposh-amp' ); ?></span>
						</li>
						<li class="learning-experience-card__item">
							<span class="learning-experience-card__check" aria-hidden="true"></span>
							<span class="learning-experience-card__text"><?php esc_html_e( 'Optional Customization as per your policy/needs', 'elearnposh-amp' ); ?></span>
						</li>
					</ul>
				</div>
			</div>
		</div>

		<div class="amp-cta">
			<a class="amp-pc-btn" href="<?php echo elearnposh_amp_url( '/contact-us' ); ?>"><?php esc_html_e( 'Schedule a Demo', 'elearnposh-amp' ); ?></a>
		</div>

	</div>
	</section>

	<?php
	$pfe_page_url        = elearnposh_amp_get_employees_page_url();
	$pfe_eposh_bytes_url = $pfe_page_url . '#eposh-bytes';
	$pfe_live_action_url = $pfe_page_url . '#posh-live-action';
	?>
	<section class="eposh-vz" id="eposh-vz" aria-label="<?php esc_attr_e( 'POSH training videos', 'elearnposh-amp' ); ?>">
		<div class="eposh-vz-shell">
			<header class="eposh-vz-head">
				<h2 class="eposh-vz-head__title"><?php esc_html_e( 'POSH Compliance Made Easy - Simple, Effective & Stress-Free', 'elearnposh-amp' ); ?></h2>
				<p class="eposh-vz-head__lead">
					<?php esc_html_e( 'See how eLearnPOSH combines engaging video learning, micro-modules, and real workplace scenarios to drive lasting compliance outcomes.', 'elearnposh-amp' ); ?>
				</p>
			</header>

			<div class="eposh-vz-list">
				<article class="eposh-vz-card eposh-vz-card--media-start eposh-vz-card--no-cta">
					<div class="eposh-vz-card__inner">
						<div class="eposh-vz-card__media">
							<amp-youtube
								class="eposh-vz-card__player"
								data-videoid="2u_YZty7nd4"
								layout="responsive"
								width="16"
								height="9"
								data-param-rel="0"
								data-param-modestbranding="1"
								data-param-iv_load_policy="3"
								data-param-fs="0"
								data-param-playsinline="1"
								data-param-cc_load_policy="0">
								<amp-img
									src="https://i.ytimg.com/vi/2u_YZty7nd4/hqdefault.jpg"
									layout="fill"
									placeholder
									alt="<?php esc_attr_e( 'Why POSH Training Fails and How We Fix It', 'elearnposh-amp' ); ?>">
								</amp-img>
							</amp-youtube>
						</div>
						<div class="eposh-vz-card__body">
							<h3 class="eposh-vz-card__title"><?php esc_html_e( 'Why POSH Training Fails', 'elearnposh-amp' ); ?></h3>
							<p class="eposh-vz-card__lead">
								<?php esc_html_e( 'Getting every employee to attend live webinars or in-person sessions can be difficult, especially across teams, shifts, and locations. Our platform gives employees the flexibility to complete POSH training anytime, while helping HR and leaders track progress, send reminders, and maintain proof of completion.', 'elearnposh-amp' ); ?>
							</p>
							<div class="eposh-vz-card__extra">
								<p class="eposh-vz-card__lead">
									<?php esc_html_e( 'From training access and policy awareness to IC details and an end-to-end complaint management system, everything stays available under one roof.', 'elearnposh-amp' ); ?>
								</p>
								<ul class="eposh-vz-card__points">
									<li><?php esc_html_e( 'Anytime training access for employees', 'elearnposh-amp' ); ?></li>
									<li><?php esc_html_e( 'Easy course assignments and automated reminders', 'elearnposh-amp' ); ?></li>
									<li><?php esc_html_e( 'Assessments and certificates as proof of completion', 'elearnposh-amp' ); ?></li>
									<li><?php esc_html_e( 'POSH policy, IC details, and complaint filing guidance in one place', 'elearnposh-amp' ); ?></li>
									<li><?php esc_html_e( 'Admin access for real-time tracking and compliance visibility', 'elearnposh-amp' ); ?></li>
								</ul>
							</div>
							<p class="eposh-vz-card__note"><?php esc_html_e( 'Your One-Stop POSH Compliance Solution', 'elearnposh-amp' ); ?></p>
						</div>
					</div>
				</article>

				<article class="eposh-vz-card eposh-vz-card--media-end">
					<div class="eposh-vz-card__inner">
						<div class="eposh-vz-card__media">
							<amp-youtube
								class="eposh-vz-card__player"
								data-videoid="m7Lleni4zug"
								layout="responsive"
								width="16"
								height="9"
								data-param-rel="0"
								data-param-modestbranding="1"
								data-param-iv_load_policy="3"
								data-param-fs="0"
								data-param-playsinline="1"
								data-param-cc_load_policy="0">
								<amp-img
									src="https://i.ytimg.com/vi/m7Lleni4zug/hqdefault.jpg"
									layout="fill"
									placeholder
									alt="<?php esc_attr_e( 'ePOSH Bytes micro-learning', 'elearnposh-amp' ); ?>">
								</amp-img>
							</amp-youtube>
						</div>
						<div class="eposh-vz-card__body">
							<span class="eposh-vz-card__eyebrow"><?php esc_html_e( 'Micro-learning', 'elearnposh-amp' ); ?></span>
							<h3 class="eposh-vz-card__title"><?php esc_html_e( 'ePOSH Bytes - Fast & Engaging Micro-Learnings', 'elearnposh-amp' ); ?></h3>
							<p class="eposh-vz-card__lead">
								<?php esc_html_e( 'Long training sessions are not always easy to repeat, but POSH awareness needs regular reinforcement. ePOSH Bytes delivers short, engaging 3-5 minute video modules that fit into busy work schedules and keep key POSH concepts fresh throughout the year.', 'elearnposh-amp' ); ?>
							</p>
							<div class="eposh-vz-card__extra">
								<p class="eposh-vz-card__lead">
									<?php esc_html_e( 'Designed with real-world workplace scenarios, these bite-sized refreshers can be delivered weekly, monthly, quarterly, or bi-annually via Teams, WhatsApp, Slack, or email.', 'elearnposh-amp' ); ?>
								</p>
								<ul class="eposh-vz-card__points">
									<li><?php esc_html_e( 'Quick 3-5 minute video modules', 'elearnposh-amp' ); ?></li>
									<li><?php esc_html_e( 'Login-free, trackable access', 'elearnposh-amp' ); ?></li>
									<li><?php esc_html_e( 'Delivered via Teams, WhatsApp, Slack, or email', 'elearnposh-amp' ); ?></li>
									<li><?php esc_html_e( 'Real-world scenarios for practical understanding', 'elearnposh-amp' ); ?></li>
									<li><?php esc_html_e( 'Flexible delivery: weekly, monthly, quarterly, or bi-annually', 'elearnposh-amp' ); ?></li>
									<li><?php esc_html_e( 'Customizable scenario-based learning modules', 'elearnposh-amp' ); ?></li>
								</ul>
							</div>
							<p class="eposh-vz-card__note"><?php esc_html_e( 'Micro-learning that reinforces POSH awareness throughout the year.', 'elearnposh-amp' ); ?></p>
							<div class="eposh-vz-card__actions">
								<a class="eposh-vz-card__btn" href="<?php echo esc_url( $pfe_eposh_bytes_url ); ?>" aria-label="<?php esc_attr_e( 'Know more about ePOSH Bytes micro-learning', 'elearnposh-amp' ); ?>"><?php esc_html_e( 'Know More', 'elearnposh-amp' ); ?></a>
							</div>
						</div>
					</div>
				</article>

				<article class="eposh-vz-card eposh-vz-card--media-start">
					<div class="eposh-vz-card__inner">
						<div class="eposh-vz-card__media">
							<amp-youtube
								class="eposh-vz-card__player"
								data-videoid="qgj2RAD9Pk4"
								layout="responsive"
								width="16"
								height="9"
								data-param-rel="0"
								data-param-modestbranding="1"
								data-param-iv_load_policy="3"
								data-param-fs="0"
								data-param-playsinline="1"
								data-param-cc_load_policy="0">
								<amp-img
									src="https://i.ytimg.com/vi/qgj2RAD9Pk4/hqdefault.jpg"
									layout="fill"
									placeholder
									alt="<?php esc_attr_e( 'Live action POSH scenarios', 'elearnposh-amp' ); ?>">
								</amp-img>
							</amp-youtube>
						</div>
						<div class="eposh-vz-card__body">
							<span class="eposh-vz-card__eyebrow"><?php esc_html_e( 'Behaviour change', 'elearnposh-amp' ); ?></span>
							<h3 class="eposh-vz-card__title"><?php esc_html_e( 'Live Action Scenarios - Real Conversations, Real Impact', 'elearnposh-amp' ); ?></h3>
							<p class="eposh-vz-card__lead">
								<?php esc_html_e( 'Sexual harassment at work is rarely black and white. It often shows up through subtle comments, uncomfortable silences, power dynamics, body language, or situations where employees are unsure how to respond. Our POSH Live Action Series brings these grey areas to life through realistic workplace stories that help learners understand impact, intent, and appropriate action.', 'elearnposh-amp' ); ?>
							</p>
							<div class="eposh-vz-card__extra">
								<p class="eposh-vz-card__lead">
									<?php esc_html_e( 'Filmed with professional actors and legally vetted scripts, these scenario-based modules go beyond PPT based training to build empathy, awareness, and better decision-making in real workplace situations.', 'elearnposh-amp' ); ?>
								</p>
								<ul class="eposh-vz-card__points">
									<li><?php esc_html_e( 'Realistic workplace scenarios for deeper understanding', 'elearnposh-amp' ); ?></li>
									<li><?php esc_html_e( 'Covers verbal, visual, physical, written, and virtual forms of harassment', 'elearnposh-amp' ); ?></li>
									<li><?php esc_html_e( 'Explains hostile work environment, quid pro quo, and power dynamics', 'elearnposh-amp' ); ?></li>
									<li><?php esc_html_e( 'Highlights bystander intervention and speak-up behaviour', 'elearnposh-amp' ); ?></li>
									<li><?php esc_html_e( 'Helps employees recognise grey areas before issues escalate', 'elearnposh-amp' ); ?></li>
									<li><?php esc_html_e( 'Encourages empathy, respectful conduct, and safer workplace culture', 'elearnposh-amp' ); ?></li>
								</ul>
							</div>
							<p class="eposh-vz-card__note"><?php esc_html_e( 'Realistic scenarios that turn POSH awareness into workplace behaviour change.', 'elearnposh-amp' ); ?></p>
							<div class="eposh-vz-card__actions">
								<a class="eposh-vz-card__btn" href="<?php echo esc_url( $pfe_live_action_url ); ?>" aria-label="<?php esc_attr_e( 'Know more about Live Action POSH scenarios', 'elearnposh-amp' ); ?>"><?php esc_html_e( 'Know More', 'elearnposh-amp' ); ?></a>
							</div>
						</div>
					</div>
				</article>
			</div>
		</div>
	</section>

	<section class="aboutpro-section" id="about" aria-label="<?php esc_attr_e( 'About eLearnPOSH', 'elearnposh-amp' ); ?>">
		<div class="aboutpro-shell">
			<div class="aboutpro-grid">
				<div class="aboutpro-card-wrap">
					<div class="aboutpro-card">
						<h2 class="aboutpro-title"><?php esc_html_e( 'About eLearnPOSH', 'elearnposh-amp' ); ?></h2>
						<div class="aboutpro-badges">
							<amp-img class="aboutpro-badge" src="https://elearnposh.com/wp-content/uploads/2025/12/ISO-27001.webp" width="130" height="130" layout="intrinsic" alt="<?php esc_attr_e( 'ISO 27001 certification badge', 'elearnposh-amp' ); ?>"></amp-img>
							<amp-img class="aboutpro-badge" src="https://elearnposh.com/wp-content/uploads/2025/12/GDPR.webp" width="130" height="130" layout="intrinsic" alt="<?php esc_attr_e( 'GDPR compliance badge', 'elearnposh-amp' ); ?>"></amp-img>
							<amp-img class="aboutpro-badge" src="https://elearnposh.com/wp-content/uploads/2025/12/Soc-2.webp" width="130" height="130" layout="intrinsic" alt="<?php esc_attr_e( 'SOC 2 certification badge', 'elearnposh-amp' ); ?>"></amp-img>
						</div>
						<p class="aboutpro-copy">
							<?php esc_html_e( 'eLearnPOSH.com is a product of Succeed TechnologiesÂ® - an ISO 27001:2022, GDPR-aligned, and SOC 2 certified organisation trusted for delivering engaging, interactive & secure eLearning at scale.', 'elearnposh-amp' ); ?>
						</p>
						<div class="aboutpro-trust-row">
							<p><?php esc_html_e( 'Visit the Succeed TechnologiesÂ®', 'elearnposh-amp' ); ?></p>
							<a
								class="aboutpro-trust-btn"
								href="https://trust.succeedtech.com/"
								target="_blank"
								rel="noopener noreferrer"
								aria-label="<?php esc_attr_e( 'Visit Succeed Technologies Trust Centre', 'elearnposh-amp' ); ?>"
							>
								<?php esc_html_e( 'Trust Centre', 'elearnposh-amp' ); ?>
							</a>
						</div>
					</div>
				</div>
				<div class="aboutpro-card-wrap" id="reason-to-choose-ep">
					<div class="aboutpro-card">
						<h2 class="aboutpro-title"><?php esc_html_e( 'Three reasons to choose eLearnPOSH.com', 'elearnposh-amp' ); ?></h2>
						<ul class="aboutpro-reasons">
							<li class="aboutpro-reason-item">
								<amp-img class="reason-icon" src="https://elearnposh.com/assets/img/homepage/rsn_1.png" width="22" height="22" layout="fixed" alt="<?php esc_attr_e( 'Comprehensive and multilingual eLearning icon', 'elearnposh-amp' ); ?>"></amp-img>
								<span class="aboutpro-reason-text"><?php esc_html_e( 'Comprehensive & Multilingual eLearning', 'elearnposh-amp' ); ?></span>
							</li>
							<li class="aboutpro-reason-item">
								<amp-img class="reason-icon" src="https://elearnposh.com/assets/img/homepage/rsn_2.png" width="22" height="22" layout="fixed" alt="<?php esc_attr_e( 'Enterprise-class platform and support icon', 'elearnposh-amp' ); ?>"></amp-img>
								<span class="aboutpro-reason-text"><?php esc_html_e( 'Enterprise-class Platform and Support', 'elearnposh-amp' ); ?></span>
							</li>
							<li class="aboutpro-reason-item">
								<amp-img class="reason-icon" src="https://elearnposh.com/assets/img/homepage/rsn_3.png" width="22" height="22" layout="fixed" alt="<?php esc_attr_e( 'Customizable and flexible delivery icon', 'elearnposh-amp' ); ?>"></amp-img>
								<span class="aboutpro-reason-text"><?php esc_html_e( 'Customizable and Flexible delivery', 'elearnposh-amp' ); ?></span>
							</li>
						</ul>
						<p class="aboutpro-footnote">
							<?php esc_html_e( 'Your search for all the POSH related courses ends here! Creating awareness for your employees, supervisors and IC members on POSH (Prevention of Sexual Harassment) is now completely hassle-free and simple. Our customer-centric focus will give you more than just POSH training.', 'elearnposh-amp' ); ?>
						</p>
					</div>
				</div>
			</div>
		</div>
	</section>



	<!-- SaaS / Flexible Delivery Options -->
	<section id="saas" class="saas-section saas-bg" aria-label="<?php esc_attr_e( 'Flexible delivery options', 'elearnposh-amp' ); ?>">
		<div class="saas-shell">
			<div class="saas-inner">
				<div class="saas-grid">
					<div class="saas-media">
						<amp-video
							width="540"
							height="304"
							layout="responsive"
							autoplay
							loop
							muted
							controls>
							<source src="https://res.cloudinary.com/dhrgc7mqu/video/upload/v1586260445/eLearnPOSH-SAAS_z14xmc.mp4" type="video/mp4" />
							<div fallback>
								<p><?php esc_html_e( 'This browser does not support the video element.', 'elearnposh-amp' ); ?></p>
							</div>
						</amp-video>
					</div>
					<div class="saas-delivery">
						<h2 class="saas-delivery__title"><?php esc_html_e( 'Flexible Delivery Options', 'elearnposh-amp' ); ?></h2>
						<ul class="saas-delivery__list">
							<li class="saas-delivery__item">
								<amp-img
									class="saas-delivery__icon"
									src="https://elearnposh.com/assets/img/homepage/rsn_1.png"
									width="22"
									height="22"
									layout="fixed"
									alt="<?php esc_attr_e( 'Comprehensive and multilingual eLearning icon', 'elearnposh-amp' ); ?>">
								</amp-img>
								<span class="saas-delivery__text">
									<?php esc_html_e( 'Courses hosted in our LMS', 'elearnposh-amp' ); ?>
									<span class="saas-delivery__tag"><?php esc_html_e( 'SaaS', 'elearnposh-amp' ); ?></span>
								</span>
							</li>
							<li class="saas-delivery__item">
								<amp-img
									class="saas-delivery__icon"
									src="https://elearnposh.com/assets/img/homepage/rsn_2.png"
									width="22"
									height="22"
									layout="fixed"
									alt="<?php esc_attr_e( 'Enterprise-class platform and support icon', 'elearnposh-amp' ); ?>">
								</amp-img>
								<span class="saas-delivery__text">
									<?php esc_html_e( 'Courses hosted in your LMS', 'elearnposh-amp' ); ?>
									<span class="saas-delivery__tag"><?php esc_html_e( 'SCORM', 'elearnposh-amp' ); ?></span>
								</span>
							</li>
							<li class="saas-delivery__item">
								<amp-img
									class="saas-delivery__icon"
									src="https://elearnposh.com/assets/img/homepage/rsn_3.png"
									width="22"
									height="22"
									layout="fixed"
									alt="<?php esc_attr_e( 'Customizable and flexible delivery icon', 'elearnposh-amp' ); ?>">
								</amp-img>
								<span class="saas-delivery__text">
									<?php esc_html_e( 'Best of both via LTI', 'elearnposh-amp' ); ?>
									<span class="saas-delivery__tag saas-delivery__tag--muted"><?php esc_html_e( 'Learning Tool Interoperability', 'elearnposh-amp' ); ?></span>
								</span>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Testimonials -->
	<div id="testimonials">
		<h2 class="eposh-section-title"><?php esc_html_e( 'What our Clients had to say about us', 'elearnposh-amp' ); ?></h2>
		<div class="testimonials-carousel-wrapper">
			<div class="testimonials-grid" role="region" aria-label="<?php esc_attr_e( 'Client testimonials', 'elearnposh-amp' ); ?>">
				<div class="testimonial-slide">
					<article class="eposh-tst-v2__card">
						<div class="eposh-tst-v2__top">
							<div class="eposh-tst-v2__content">
								<blockquote class="eposh-tst-v2__quote">
									<p>We are happy with the engaging online course on POSH awareness from eLearnPOSH in several languages. The learning portal in Minda branding and integrated with our HRIS portal has made learner access seamless. I have recommended eLearnPOSH to my professional contacts.</p>
								</blockquote>
								<div class="eposh-tst-v2__meta">
									<span class="eposh-tst-v2__author">Mr. Sachchidanand Pande</span>
									<span class="eposh-tst-v2__role">Group PR Head, UNO Minda Group</span>
								</div>
							</div>
							<div class="eposh-tst-v2__logo-wrap">
								<amp-img src="https://elearnposh.com/wp-content/uploads/2026/05/Uno-Minda.webp" width="120" height="70" layout="fixed" alt="UNO Minda Group - client testimonial logo"></amp-img>
							</div>
						</div>
					</article>
				</div>
				<div class="testimonial-slide">
					<article class="eposh-tst-v2__card">
						<div class="eposh-tst-v2__top">
							<div class="eposh-tst-v2__content">
								<blockquote class="eposh-tst-v2__quote">
									<p>I truly appreciate all the support that Succeed extended in regards to e-Learning on POSH, which helped us in making sure that all of our workforces are trained and awareness was spread so effectively within a very short time.I also wish to let you know your response to every email sent out by our employees were super quick and solution-oriented.I thank you on behalf of all our employees for such great work and support.</p>
								</blockquote>
								<div class="eposh-tst-v2__meta">
									<span class="eposh-tst-v2__author">Mr. Girisha Krishnappa</span>
									<span class="eposh-tst-v2__role">People and Culture, AirAsia</span>
								</div>
							</div>
							<div class="eposh-tst-v2__logo-wrap">
								<amp-img src="https://elearnposh.com/wp-content/uploads/2025/12/AirAsia.webp" width="120" height="70" layout="fixed" alt="AirAsia - client testimonial logo"></amp-img>
							</div>
						</div>
					</article>
				</div>
				<div class="testimonial-slide">
					<article class="eposh-tst-v2__card">
						<div class="eposh-tst-v2__top">
							<div class="eposh-tst-v2__content">
								<blockquote class="eposh-tst-v2__quote">
									<p>The PoSH Learning modules are very clear and concise and to the point. Received good feedback from our leadership team on the content. Extremely happy with the promptness in responding to queries and resolving issues.</p>
								</blockquote>
								<div class="eposh-tst-v2__meta">
									<span class="eposh-tst-v2__author">Ms. Roja Puppala</span>
									<span class="eposh-tst-v2__role">Sr. Manager, SmartDrive Systems</span>
								</div>
							</div>
							<div class="eposh-tst-v2__logo-wrap">
								<amp-img src="https://elearnposh.com/wp-content/uploads/2026/05/Smartdrive.webp" width="120" height="70" layout="fixed" alt="SmartDrive Systems - client testimonial logo"></amp-img>
							</div>
						</div>
					</article>
				</div>
				<div class="testimonial-slide">
					<article class="eposh-tst-v2__card">
						<div class="eposh-tst-v2__top">
							<div class="eposh-tst-v2__content">
								<blockquote class="eposh-tst-v2__quote">
									<p>eLearnPOSH.com is an easy to use interface, the clarity and simplicity helps to navigate easily while on the site. The technical team is equally very good, their responses on queries are very prompt and they provide timely solutions.</p>
								</blockquote>
								<div class="eposh-tst-v2__meta">
									<span class="eposh-tst-v2__author">Ms. Gayatri Mishra</span>
									<span class="eposh-tst-v2__role">L&amp;D Specialist, Tata Smartfoodz Ltd</span>
								</div>
							</div>
							<div class="eposh-tst-v2__logo-wrap">
								<amp-img src="https://elearnposh.com/wp-content/uploads/2025/12/TATA.webp" width="120" height="70" layout="fixed" alt="Tata Smartfoodz - client testimonial logo"></amp-img>
							</div>
						</div>
					</article>
				</div>
				<div class="testimonial-slide">
					<article class="eposh-tst-v2__card">
						<div class="eposh-tst-v2__top">
							<div class="eposh-tst-v2__content">
								<blockquote class="eposh-tst-v2__quote">
									<p>The POSH e-learning program from Succeed Technologies has been an excellent experience for us. The content is clear, practical, and thoughtfully designed, making it easy for employees at all levels to understand and engage with. It goes beyond being a compliance exercise by creating real awareness and building sensitivity around POSH. This program has helped strengthen our culture of respect and safety while also equipping our managers to act with confidence and responsibility. The smooth implementation and reliable support from the eLearnPOSH team and specifically Mr. Arif Ayaz further added to the positive experience. I would wholeheartedly recommend this program.</p>
								</blockquote>
								<div class="eposh-tst-v2__meta">
									<span class="eposh-tst-v2__author">Ms. Asha Mathew</span>
									<span class="eposh-tst-v2__role">Manager - Performance, Culture &amp; Learning | CE Team, Phillips Machine Tools India Pvt. Ltd.</span>
								</div>
							</div>
							<div class="eposh-tst-v2__logo-wrap">
								<amp-img src="https://elearnposh.com/wp-content/uploads/2025/12/Phillips-Machine-Tool-1.webp" width="120" height="70" layout="fixed" alt="Phillips Machine Tools India Pvt. Ltd. - client testimonial logo"></amp-img>
							</div>
						</div>
					</article>
				</div>
				<div class="testimonial-slide">
					<article class="eposh-tst-v2__card">
						<div class="eposh-tst-v2__top">
							<div class="eposh-tst-v2__content">
								<blockquote class="eposh-tst-v2__quote">
									<p>The POSH eLearning module from eLearnPOSH.com has been a valuable addition to our onboarding process. Its content is clear, engaging, and aligned with legal standards, making compliance easy and effective. The course has helped us reinforce a culture of safety and respect, while simplifying our internal POSH training efforts. Our experience with the platform has been smooth and professional, and we truly appreciate the support in promoting workplace ethics.</p>
								</blockquote>
								<div class="eposh-tst-v2__meta">
									<span class="eposh-tst-v2__author">Ms. Pradnya Bhandare</span>
									<span class="eposh-tst-v2__role">Senior Manager, Abakkus Asset Manager Private Limited</span>
								</div>
							</div>
							<div class="eposh-tst-v2__logo-wrap">
								<amp-img src="https://elearnposh.com/wp-content/uploads/2025/12/Abakkus.webp" width="120" height="70" layout="fixed" alt="Abakkus Asset Manager Private Limited - client testimonial logo"></amp-img>
							</div>
						</div>
					</article>
				</div>
				<div class="testimonial-slide">
					<article class="eposh-tst-v2__card">
						<div class="eposh-tst-v2__top">
							<div class="eposh-tst-v2__content">
								<blockquote class="eposh-tst-v2__quote">
									<p>The POSH Training Program from eLearnPOSH.com stands out for its well-structured content, engaging modules, and practical case studies. The clarity and relevance of the course have made it very effective in creating awareness and driving accountability among our employees. This training has significantly supported our compliance efforts by ensuring that our team is well-informed about the POSH Act and is equipped to maintain a safe and inclusive workplace. Overall, our experience with eLearnPOSH has been excellent - their platform is user-friendly, the support is prompt, and the training delivery has been seamless. We truly value their contribution to strengthening our workplace culture.</p>
								</blockquote>
								<div class="eposh-tst-v2__meta">
									<span class="eposh-tst-v2__author">Ms. Deiva Bala</span>
									<span class="eposh-tst-v2__role">Senior HR Generalist, Lexitas India Private Limited</span>
								</div>
							</div>
							<div class="eposh-tst-v2__logo-wrap">
								<amp-img src="https://elearnposh.com/wp-content/uploads/2026/05/Lexitas-India-Private-Limited.webp" width="120" height="70" layout="fixed" alt="Lexitas India Private Limited - client testimonial logo"></amp-img>
							</div>
						</div>
					</article>
				</div>
				<div class="testimonial-slide">
					<article class="eposh-tst-v2__card">
						<div class="eposh-tst-v2__top">
							<div class="eposh-tst-v2__content">
								<blockquote class="eposh-tst-v2__quote">
									<p>We found the POSH eLearning course by eLearnPOSH.com to be highly effective and well-structured. The content is comprehensive, easy to understand, and aligned with legal compliance requirements, making it a valuable resource for our team. The course stands out for its role-based content, interactive modules, and regional language support, making it accessible for all employees. Its real-life scenarios and compliance-focused design ensure both engagement and effectiveness.</p>
								</blockquote>
								<div class="eposh-tst-v2__meta">
									<span class="eposh-tst-v2__author">Ms. Sheetal Bobade</span>
									<span class="eposh-tst-v2__role">HR Executive, Nucleus Corporate Services Private Limited</span>
								</div>
							</div>
							<div class="eposh-tst-v2__logo-wrap">
								<amp-img src="https://elearnposh.com/wp-content/uploads/2026/05/Nucleus-Corporate-Services-Private-Limited.webp" width="120" height="70" layout="fixed" alt="Nucleus Corporate Services Private Limited - client testimonial logo"></amp-img>
							</div>
						</div>
					</article>
				</div>
			</div>
		</div>
	</div>

<?php include ELEARNPOSH_AMP_TEMPLATES_DIR . 'partials/home-clients-section.php'; ?>
	<!-- Why eLearnPOSH Section -->
	<div id="whyeposh">
		<h2 class="eposh-section-title"><?php esc_html_e( 'Why eLearnPOSH.com?', 'elearnposh-amp' ); ?></h2>
		<?php
		$whyeposh_cards = array(
			array(
				'icon'        => 'Cost_Effective.png',
				'title'       => __( 'Cost Effective', 'elearnposh-amp' ),
				'description' => __( 'Distributed workspace and constant employee churn make traditional classroom training difficult and expensive. The flexible and scalable model provided by eLearnPOSH saves significant training costs for your organization and simplifies compliance reporting.', 'elearnposh-amp' ),
			),
			array(
				'icon'        => 'rsn_1.png',
				'title'       => __( 'Available in multiple Languages', 'elearnposh-amp' ),
				'description' => __( 'Apart from English, our Foundation course on Sexual Harassment Prevention is available in various Indian Languages (Hindi, Marathi, Tamil, Telugu, Kannada, Malayalam, Bengali and Gujarati) to cater to your diverse workforce.', 'elearnposh-amp' ),
			),
			array(
				'icon'        => 'Flexible_delivery.png',
				'title'       => __( 'Flexible Delivery Models', 'elearnposh-amp' ),
				'description' => __( 'Choose what suits you best. SaaS option with a fully customized portal for your organization with advanced tracking & reporting or a SCORM package to host the courses in your LMS or a LTI option to achieve the best out of SaaS & SCORM.', 'elearnposh-amp' ),
			),
			array(
				'icon'        => 'Interactive.png',
				'title'       => __( 'Interactive and Engaging Content', 'elearnposh-amp' ),
				'description' => __( 'Visually enriching animations, images, impactful narration, use of real-life scenarios, interactivities with knowledge check enhance the overall learning experience and knowledge retention', 'elearnposh-amp' ),
			),
			array(
				'icon'        => 'Role_based.png',
				'title'       => __( 'Role-based Courses', 'elearnposh-amp' ),
				'description' => __( 'We know "One-size does not fit all". eLearnPOSH offers separate tailor-made modules for Employees, Managers and IC Members.', 'elearnposh-amp' ),
			),
			array(
				'icon'        => 'Customizable.png',
				'title'       => __( 'Customizable Courses', 'elearnposh-amp' ),
				'description' => __( 'Our courses can be fully customized to meet your organizational policies, brand standards and work culture. This includes the look and feel, change of scenarios and content.', 'elearnposh-amp' ),
			),
		);
		?>
		<div class="wep2-grid">
			<?php foreach ( $whyeposh_cards as $card ) : ?>
				<div class="wep2-col">
					<div class="wep2-card">
						<div class="wep2-head">
							<div class="wep2-icon">
								<amp-img
									src="<?php echo esc_url( 'https://elearnposh.com/assets/img/homepage/' . $card['icon'] ); ?>"
									width="26"
									height="26"
									layout="fixed"
									alt="<?php echo esc_attr( $card['title'] ); ?>">
								</amp-img>
							</div>
							<h3 class="wep2-title"><?php echo esc_html( $card['title'] ); ?></h3>
						</div>
						<p class="wep2-desc"><?php echo esc_html( $card['description'] ); ?></p>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>


	<!-- Our Solutions Section -->
	<?php
	$amp_home_courses = array(
		array(
			'url'             => elearnposh_amp_top_courses_amp_url( '/solutions/posh-training-for-employees/' ),
			'img'             => 'https://elearnposh.com/wp-content/uploads/2026/06/POSH-Employess-Training.webp',
			'alt'             => 'POSH Training for Employees online workplace harassment awareness training for employees',
			'category'        => 'posh',
			'category_label'  => __( 'POSH Courses', 'elearnposh-amp' ),
			'title'           => __( 'POSH Training for Employees', 'elearnposh-amp' ),
			'desc'            => __( 'POSH awareness training to help employees understand the law, recognize inappropriate behaviour, and contribute to a safer, more respectful workplace.', 'elearnposh-amp' ),
		),
		array(
			'url'             => elearnposh_amp_url( '/solutions/posh-training-for-managers/' ),
			'img'             => 'https://elearnposh.com/wp-content/uploads/2026/06/POSH-Manager-Training.webp',
			'alt'             => 'POSH for Managers training on workplace harassment prevention and team leadership responsibilities',
			'category'        => 'posh',
			'category_label'  => __( 'POSH Courses', 'elearnposh-amp' ),
			'title'           => __( 'POSH Training For Managers', 'elearnposh-amp' ),
			'desc'            => __( 'Equip people managers to handle complaints fairly, work with the Internal Committee, and take proactive measures against workplace sexual harassment.', 'elearnposh-amp' ),
		),
		array(
			'url'             => elearnposh_amp_get_ic_members_page_url(),
			'img'             => 'https://elearnposh.com/wp-content/uploads/2026/06/POSH-%E2%80%93-Internal-Committee-Training.webp',
			'alt'             => 'POSH for Internal Committee members workplace inquiry and compliance training course',
			'category'        => 'posh',
			'category_label'  => __( 'POSH Courses', 'elearnposh-amp' ),
			'title'           => __( 'POSH Training For IC Members', 'elearnposh-amp' ),
			'desc'            => __( 'Structured IC training and compliance tools so committee members handle complaints with confidence, sensitivity, and accuracy-not just check-the-box workshops.', 'elearnposh-amp' ),
		),
		array(
			'url'             => function_exists( 'elearnposh_amp_get_hei_page_url' ) ? elearnposh_amp_get_hei_page_url() : elearnposh_amp_url( '/solutions/posh-for-higher-educational-institutions/' ),
			'img'             => 'https://elearnposh.com/wp-content/uploads/2026/06/POSH-Higher-Educational-Institution-Training.webp',
			'alt'             => 'POSH training course for higher educational institutions and campus workplace safety awareness',
			'category'        => 'posh',
			'category_label'  => __( 'POSH Courses', 'elearnposh-amp' ),
			'title'           => __( 'POSH Training for HEI', 'elearnposh-amp' ),
			'desc'            => __( 'Gender sensitization and sexual harassment prevention eLearning to equip staff and students with knowledge and skills for a respectful campus culture.', 'elearnposh-amp' ),
		),
		array(
			'url'             => elearnposh_amp_url( '/solutions/compliance-management-system/' ),
			'img'             => 'https://elearnposh.com/wp-content/uploads/2026/06/Make-POSH-Compliance-Simpler-When-It-Matters-Most-scaled.webp',
			'alt'             => 'POSH for CMS complaint management system for secure POSH case handling and resolution',
			'category'        => 'cms',
			'category_label'  => __( 'Compliance Management System', 'elearnposh-amp' ),
			'title'           => __( 'Compliance Management System', 'elearnposh-amp' ),
			'desc'            => __( 'A secure, paperless POSH complaint management platform to file complaints, manage cases, track evidence, and ensure timely resolution.', 'elearnposh-amp' ),
		),
		array(
			'url'             => function_exists( 'elearnposh_amp_get_pocso_page_url' ) ? elearnposh_amp_get_pocso_page_url() : elearnposh_amp_url( '/solutions/pocso-prevention-of-child-sexual-abuse/' ),
			'img'             => 'https://elearnposh.com/wp-content/uploads/2026/06/POCSO-eLearning.webp',
			'alt'             => 'POCSO prevention of child sexual abuse awareness and compliance training course',
			'category'        => 'posh',
			'category_label'  => __( 'POSH Courses', 'elearnposh-amp' ),
			'title'           => __( 'POCSO Training', 'elearnposh-amp' ),
			'desc'            => __( 'Introduces staff and students to POCSO law and child protection policy, clarifying duties and responsibilities to ensure a safe learning environment.', 'elearnposh-amp' ),
		),
		array(
			'url'             => function_exists( 'elearnposh_amp_get_unconscious_bias_page_url' ) ? elearnposh_amp_get_unconscious_bias_page_url() : elearnposh_amp_url( '/solutions/unconscious-bias/' ),
			'img'             => 'https://elearnposh.com/wp-content/uploads/2026/06/Unconscious-Bias-eLearning.webp',
			'alt'             => 'Unconscious bias workplace inclusion and diversity awareness training program',
			'category'        => 'global',
			'category_label'  => __( 'Global Courses', 'elearnposh-amp' ),
			'title'           => __( 'Unconscious Bias', 'elearnposh-amp' ),
			'desc'            => __( 'Helps employees recognize hidden biases that influence hiring, teamwork, and decisions, with practical strategies for a more inclusive workplace.', 'elearnposh-amp' ),
		),
		array(
			'url'             => elearnposh_amp_url( '/equality-and-diversity/' ),
			'img'             => 'https://elearnposh.com/wp-content/uploads/2026/06/Equality-Diversity-Inclusion-eLearning.webp',
			'alt'             => 'Equality and diversity workplace inclusion and respectful culture training course',
			'category'        => 'global',
			'category_label'  => __( 'Global Courses', 'elearnposh-amp' ),
			'title'           => __( 'Equality and Diversity', 'elearnposh-amp' ),
			'desc'            => __( 'Sensitizes employees on diversity and inclusion-from definitions and discrimination to prevention-with engaging, research-backed interactive eLearning.', 'elearnposh-amp' ),
		),
		array(
			'url'             => function_exists( 'elearnposh_amp_get_sexual_harassment_us_page_url' ) ? elearnposh_amp_get_sexual_harassment_us_page_url() : elearnposh_amp_url( '/solutions/sexual-harassment-prevention-for-us/' ),
			'img'             => 'https://elearnposh.com/wp-content/uploads/2026/06/Sexual-Harassment-Prevention-for-US.webp',
			'alt'             => 'US workplace sexual harassment prevention and compliance training course for employees',
			'category'        => 'global',
			'category_label'  => __( 'Global Courses', 'elearnposh-amp' ),
			'title'           => __( 'Sexual Harassment Prevention for US', 'elearnposh-amp' ),
			'desc'            => __( 'Comprehensive, legally vetted US sexual harassment prevention training with real-life scenarios for employees and supervisors across multiple states.', 'elearnposh-amp' ),
		),
	);
	?>
	<section id="elearning-courses" class="course-showcase" aria-label="<?php esc_attr_e( 'Our Solutions', 'elearnposh-amp' ); ?>">
		<div class="course-showcase-inner">
			<h2 class="eposh-section-title"><?php esc_html_e( 'Our Solutions', 'elearnposh-amp' ); ?></h2>
			<p class="course-showcase__lead">
				<?php esc_html_e( 'Built To Scale Across Organisations Of All Sizes - From Educational Institutions And MSMEs To Large Scale Enterprises.', 'elearnposh-amp' ); ?>
			</p>
			<div class="course-showcase__grid">
				<?php foreach ( $amp_home_courses as $course ) : ?>
					<article class="course-showcase__item">
						<div class="course-showcase__card">
							<a href="<?php echo esc_url( $course['url'] ); ?>" class="course-showcase__image">
								<amp-img
									src="<?php echo esc_url( $course['img'] ); ?>"
									alt="<?php echo esc_attr( $course['alt'] ); ?>"
									width="640"
									height="400"
									layout="responsive">
								</amp-img>
							</a>
							<span class="course-showcase__category course-showcase__category--<?php echo esc_attr( $course['category'] ); ?>">
								<?php echo esc_html( $course['category_label'] ); ?>
							</span>
							<div class="course-showcase__body">
								<h3><?php echo esc_html( $course['title'] ); ?></h3>
								<p class="course-showcase__desc"><?php echo esc_html( $course['desc'] ); ?></p>
								<a class="course-showcase__cta" href="<?php echo esc_url( $course['url'] ); ?>" aria-label="<?php echo esc_attr( sprintf( __( 'Know more about %s', 'elearnposh-amp' ), $course['title'] ) ); ?>"><?php esc_html_e( 'Know More', 'elearnposh-amp' ); ?></a>
							</div>
						</div>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<div class="content" id="contact-us">
		<div class="home-contact-row">
			<section id="contact-stats-section" aria-label="<?php esc_attr_e( 'More key statistics', 'elearnposh-amp' ); ?>">
				<h2 class="stats-heading">
					<?php esc_html_e( 'Trusted by Organizations Driving POSH Compliance at Scale', 'elearnposh-amp' ); ?>
				</h2>
				<p class="contact-subtitle">
					<?php esc_html_e( 'Delivering measurable POSH compliance outcomes across industries.', 'elearnposh-amp' ); ?>
				</p>
				<div class="stats-grid">
					<?php foreach ( $home_stats_figures as $row ) : ?>
						<div class="card">
							<h3><?php echo esc_html( $row['value'] ); ?></h3>
							<p><?php echo esc_html( $row['label'] ); ?></p>
						</div>
					<?php endforeach; ?>
				</div>
			</section>

			<?php
			$home_contact_form_html = '';
			if ( function_exists( 'elearnposh_amp_render_contact_form' ) ) {
				$home_contact_form_html = elearnposh_amp_render_contact_form(
					array(
						'form_id'     => 'ep-legacy-home-amp',
						'title'       => '',
						'description' => '',
						'compact'     => true,
						'desktop_ui'  => true,
						'page_source' => __( 'AMP Home - Book a Demo', 'elearnposh-amp' ),
					)
				);
			}
			?>
			<?php if ( '' !== trim( $home_contact_form_html ) ) : ?>
			<div class="home-contact-form ep-contact-conversion__form" id="schedule-a-demo">
				<?php
				if ( function_exists( 'elearnposh_amp_render_contact_form_title_bar' ) ) {
					elearnposh_amp_render_contact_form_title_bar( 'home' );
				}
				echo $home_contact_form_html; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				?>
			</div>
			<?php else : ?>
			<div class="home-contact-cta" id="schedule-a-demo">
				<h2 class="home-contact-cta__title"><?php esc_html_e( 'Book a Demo', 'elearnposh-amp' ); ?></h2>
				<p class="home-contact-cta__lead">
					<?php esc_html_e( 'Schedule a walkthrough of our POSH training platform with our team.', 'elearnposh-amp' ); ?>
				</p>
				<a class="amp-pc-btn btn-schedule" href="<?php echo elearnposh_amp_url( '/contact-us/#demo' ); ?>">
					<?php esc_html_e( 'Schedule a Demo', 'elearnposh-amp' ); ?>
				</a>
			</div>
			<?php endif; ?>
		</div>
	</div>

	<?php
	$newsletter_category = get_category_by_slug( 'newsletter' );
	$newsletter_id       = ( is_object( $newsletter_category ) && isset( $newsletter_category->term_id ) ) ? (int) $newsletter_category->term_id : 0;

	if ( function_exists( 'elearnposh_amp_render_cached_home_posts_showcase' ) ) {
		elearnposh_amp_render_cached_home_posts_showcase(
			array(
				'post_type'           => 'post',
				'posts_per_page'      => 4,
				'ignore_sticky_posts' => true,
				'category__not_in'    => $newsletter_id ? array( $newsletter_id ) : array(),
			),
			array(
				'aria_label'    => __( 'Recent blog posts', 'elearnposh-amp' ),
				'title'         => __( 'Explore Our Recent Blogs', 'elearnposh-amp' ),
				'subtitle'      => __( 'Insights on POSH compliance, workplace safety, and the latest legal updates from our experts.', 'elearnposh-amp' ),
				'view_all_url'  => elearnposh_amp_url( '/blog/' ),
				'view_all_text' => __( 'View All Blogs', 'elearnposh-amp' ),
				'section_mod'   => 'blogs',
			),
			'blogs'
		);

		$recent_newsletter_args = array(
			'post_type'           => 'post',
			'posts_per_page'      => 4,
			'ignore_sticky_posts' => true,
		);
		if ( $newsletter_id ) {
			$recent_newsletter_args['cat'] = $newsletter_id;
		} else {
			$recent_newsletter_args['post__in'] = array( 0 );
		}

		elearnposh_amp_render_cached_home_posts_showcase(
			$recent_newsletter_args,
			array(
				'aria_label'    => __( 'Recent newsletters', 'elearnposh-amp' ),
				'title'         => __( 'Explore our Recent Newsletters', 'elearnposh-amp' ),
				'subtitle'      => __( 'Monthly POSH insights, compliance updates, and workplace safety highlights delivered to your inbox.', 'elearnposh-amp' ),
				'view_all_url'  => elearnposh_amp_url( '/newsletter/' ),
				'view_all_text' => __( 'View All Newsletters', 'elearnposh-amp' ),
				'section_mod'   => 'newsletters',
			),
			'newsletters'
		);
	}
	?>

	<?php include ELEARNPOSH_AMP_TEMPLATES_DIR . 'components/footer.php'; ?>
</body>
</html>
