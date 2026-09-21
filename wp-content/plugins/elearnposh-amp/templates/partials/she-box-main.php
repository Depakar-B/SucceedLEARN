<?php
/**
 * SHe-Box page main markup (AMP).
 *
 * @package ElearnPOSH\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<main class="posh-act-page she-box-page" id="topofthepage" role="main" itemscope itemtype="https://schema.org/Article">
<meta itemprop="headline" content="<?php echo esc_attr( $she_box_title ); ?>">
<link itemprop="mainEntityOfPage" href="<?php echo esc_url( $she_box_page_url ); ?>">

<div class="pa-wrap">
	<div class="pa-grid">
		<?php elearnposh_amp_she_box_render_desktop_sidebar( $she_box_toc ); ?>
		<div class="pa-main">
			<header class="pa-hero">
				<?php elearnposh_amp_render_breadcrumbs(); ?>
				<p class="pa-hero__kicker"><span><?php esc_html_e( 'Government of India POSH Portal', 'elearnposh-amp' ); ?></span></p>
				<h1 class="pa-hero__title"><?php echo esc_html( $she_box_title ); ?></h1>
				<p class="pa-hero__sub"><?php esc_html_e( 'Official Government of India portal for workplace sexual harassment complaints under the POSH Act - how to file, track, register your organisation, and meet compliance requirements.', 'elearnposh-amp' ); ?></p>
			</header>
			<?php if ( ! empty( $she_box_toc ) ) : ?>
			<nav class="pa-mobile-nav" aria-label="<?php echo esc_attr__( 'On-page navigation', 'elearnposh-amp' ); ?>">
				<div class="pa-mobile-nav__card">
					<p class="pa-mobile-nav__title"><?php esc_html_e( 'On this page', 'elearnposh-amp' ); ?></p>
					<?php
					elearnposh_amp_she_box_render_quick_chips( $she_box_toc );
					elearnposh_amp_she_box_render_mobile_toc( $she_box_toc );
					?>
				</div>
			</nav>
			<?php endif; ?>
			<article class="pa-article she-box-article" itemprop="articleBody">
				<section class="pa-section">
					<?php
					ob_start();
					include ELEARNPOSH_AMP_TEMPLATES_DIR . 'partials/she-box-content.php';
					include ELEARNPOSH_AMP_TEMPLATES_DIR . 'partials/she-box-courses.php';
					echo elearnposh_amp_she_box_prepare_content( ob_get_clean() ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					?>
				</section>
			</article>
			<?php
			if ( function_exists( 'elearnposh_amp_render_guide_mobile_contact_section' ) ) {
				echo elearnposh_amp_render_guide_mobile_contact_section( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					__( 'SHe-Box Page', 'elearnposh-amp' ),
					'ep-she-box-mobile',
					'she-box'
				);
			}
			?>
		</div>
	</div>
</div>
</main>
