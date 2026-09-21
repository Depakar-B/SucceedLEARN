<?php
/**
 * Template Name: Solutions
 *
 * @package Akaza_Adventure
 */

get_header();
?>
<main id="main-content" class="slf-section">
	<div class="slf-container">
		<?php
		get_template_part(
			'template-parts/page-hero',
			null,
			array(
				'eyebrow' => __( 'By Solution', 'akaza-adventure' ),
				'title'   => __( 'One platform for security, compliance & workplace learning', 'akaza-adventure' ),
				'lead'    => __( 'Bring training and compliance together through one intelligent, scalable eLearning platform.', 'akaza-adventure' ),
			)
		);
		?>
		<div class="slf-cards slf-cards--2 slf-marketing-grid">
			<article class="slf-card">
				<h2><?php esc_html_e( 'Security Awareness Training', 'akaza-adventure' ); ?></h2>
				<p><?php esc_html_e( 'Reduce human cyber risk with phishing simulations, microlearning, and behaviour analytics.', 'akaza-adventure' ); ?></p>
			</article>
			<article class="slf-card">
				<h2><?php esc_html_e( 'Compliance Training', 'akaza-adventure' ); ?></h2>
				<p><?php esc_html_e( 'Turn policies into practical workplace decisions through scenario-based learning.', 'akaza-adventure' ); ?></p>
			</article>
			<article class="slf-card">
				<h2><?php esc_html_e( 'Compliance LMS', 'akaza-adventure' ); ?></h2>
				<p><?php esc_html_e( 'Automation, reporting, branding, and enterprise integrations in one compliance-focused LMS.', 'akaza-adventure' ); ?></p>
			</article>
			<article class="slf-card">
				<h2><?php esc_html_e( 'HR & Workplace Learning', 'akaza-adventure' ); ?></h2>
				<p><?php esc_html_e( 'Role-based content, mobile delivery, and dashboards that prove training outcomes.', 'akaza-adventure' ); ?></p>
			</article>
		</div>
		<div class="slf-center" style="margin-top:2rem;">
			<a class="slf-btn slf-btn--primary" href="<?php echo esc_url( akaza_courses_url() ); ?>"><?php esc_html_e( 'Explore All Courses', 'akaza-adventure' ); ?></a>
		</div>
		<?php
		while ( have_posts() ) :
			the_post();
			$content = get_the_content( null, false );
			if ( $content && false === stripos( $content, 'elementor' ) ) {
				echo '<div class="slf-page-content">';
				echo apply_filters( 'the_content', $content ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				echo '</div>';
			}
		endwhile;
		?>
	</div>
</main>
<?php
get_footer();
