<?php
/**
 * Single Course Page Template (Generic Fallback)
 *
 * This template is used as a fallback for course pages that don't have
 * specific templates. Specific course pages are routed to their own templates:
 * - Page ID 42: posh-for-ic.php
 * - Page ID 66: posh-foundation.php
 * - Page ID 15159: unconscious-bias.php
 * - Page ID 5390: posh-for-managers.php
 * - Page ID 8100: posh-for-hei.php
 * - Page ID 8244: pocso.php
 *
 * @package ElearnPOSH\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $wpdb, $post;
$ep_id = $post->ID;

// Prevent default content outputs
remove_all_actions( 'the_content' );
remove_all_actions( 'amp_post_template_content' );
remove_all_actions( 'ampforwp_content' );
?>
<!doctype html>
<html amp lang="<?php echo esc_attr( get_bloginfo( 'language' ) ); ?>">
<head>
	<meta charset="utf-8" />
	<link rel="shortcut icon" href="<?php echo esc_url( elearnposh_amp_get_favicon_url() ); ?>" type="image/png" />
	<title><?php echo esc_html( get_post_meta( $ep_id, 'title', true ) ?: get_the_title() ); ?> - eLearnPOSH</title>
	
	<?php do_action( 'amp_post_template_head', $this ); ?>
	
	<style amp-custom>
	<?php elearnposh_amp_output_optimized_css( 'course', array( 'course-page', 'menu', 'footer' ) ); ?>
	</style>
	
	<?php elearnposh_amp_output_current_page_schema_json_ld(); ?>

	<?php elearnposh_amp_output_components( 'course' ); ?>
</head>

<body class="<?php echo esc_attr( 'post-' . $ep_id ); ?>">
	<?php include ELEARNPOSH_AMP_TEMPLATES_DIR . 'components/menu.php'; ?>
	
	<div class="amp-content-wrapper">
	<?php elearnposh_amp_render_breadcrumbs(); ?>

	<div class="title">
		<h1><?php echo esc_html( get_post_meta( $ep_id, 'title', true ) ?: get_the_title() ); ?></h1>
	</div>

	<div class="description">
		<p><?php echo wp_kses_post( get_post_meta( $ep_id, 'sub_description', true ) ); ?></p>
	</div>

	<div class="course-img">
		<?php
		$course_screenshots = elearnposh_amp_get_course_screenshot_images(
			$ep_id,
			__( 'Course screenshot', 'elearnposh-amp' )
		);
		if ( ! empty( $course_screenshots ) ) :
			?>
		<div class="course-screenshots-grid" aria-label="<?php esc_attr_e( 'Course Screenshots', 'elearnposh-amp' ); ?>">
			<?php foreach ( $course_screenshots as $screenshot ) : ?>
				<figure class="course-screenshot-card">
					<amp-img
						src="<?php echo esc_url( $screenshot['src'] ); ?>"
						width="<?php echo esc_attr( (string) $screenshot['width'] ); ?>"
						height="<?php echo esc_attr( (string) $screenshot['height'] ); ?>"
						layout="responsive"
						alt="<?php echo esc_attr( $screenshot['alt'] ); ?>"
					></amp-img>
				</figure>
			<?php endforeach; ?>
		</div>
			<?php
		endif;
		?>
	</div>

	<div class="course-details" id="about">
		<h2><?php esc_html_e( 'COURSE DETAILS', 'elearnposh-amp' ); ?></h2>
		<ul class="fa-ul">
			<li class="course-contents">
				<span class="icon-list">●</span>
				<span class="list-content"><?php echo esc_html( get_post_meta( $ep_id, 'course_modules', true ) ); ?></span>
			</li>
			<li class="course-contents">
				<span class="icon-clock">●</span>
				<span class="list-content"><?php echo esc_html( get_post_meta( $ep_id, 'course_duration_p', true ) ); ?></span>
			</li>
			<li class="course-contents">
				<span class="icon-users">●</span>
				<span class="list-content"><?php echo esc_html( get_post_meta( $ep_id, 'mention_role', true ) ); ?></span>
			</li>
			<li class="course-contents">
				<span class="icon-list">●</span>
				<span class="list-content"><?php echo esc_html( get_post_meta( $ep_id, 'enter_4th_point', true ) ); ?></span>
			</li>
		</ul>
	</div>

	<div class="course-details" id="about">
		<h2><?php esc_html_e( 'Salient Features', 'elearnposh-amp' ); ?></h2>
		<ul class="fa-ul">
			<li class="course-contents">
				<span class="icon-check">✓</span>
				<span class="salient-content"><?php echo esc_html( elearnposh_amp_format_key_point( get_post_meta( $ep_id, 'enter_1st_point', true ) ) ); ?></span>
			</li>
			<li class="course-contents">
				<span class="icon-check">✓</span>
				<span class="salient-content"><?php echo esc_html( elearnposh_amp_format_key_point( get_post_meta( $ep_id, 'enter_2nd_point', true ) ) ); ?></span>
			</li>
			<li class="course-contents">
				<span class="icon-check">✓</span>
				<span class="salient-content"><?php echo esc_html( elearnposh_amp_format_key_point( get_post_meta( $ep_id, 'enter_3rd_point', true ) ) ); ?></span>
			</li>
			<li class="course-contents">
				<span class="icon-check">✓</span>
				<span class="salient-content"><?php echo esc_html( elearnposh_amp_format_key_point( get_post_meta( $ep_id, 'enter_4th_point_salient', true ) ) ); ?></span>
			</li>
		</ul>
	</div>

	<div class="course-highlights" id="highlights">
		<h2><?php esc_html_e( 'By the end of this course, participants should be able to:', 'elearnposh-amp' ); ?></h2>
		<ul class="list-highlights">
			<?php for ( $i = 1; $i <= 5; $i++ ) : 
				$highlight = get_post_meta( $ep_id, 'highlights_of_the_course' . $i, true );
				if ( $highlight ) :
			?>
				<li><?php echo esc_html( elearnposh_amp_format_key_point( $highlight ) ); ?></li>
			<?php endif; endfor; ?>
		</ul>
		
		<?php
		$youtube_id = get_post_meta( $ep_id, 'youtube_id_amp', true );
		if ( $youtube_id ) :
		?>
			<amp-youtube data-videoid="<?php echo esc_attr( $youtube_id ); ?>" layout="responsive" width="480" height="270"></amp-youtube>
		<?php endif; ?>
	</div>

	<div class="hrtag-end"></div>
	</div><!-- .amp-content-wrapper -->
	
	<?php include ELEARNPOSH_AMP_TEMPLATES_DIR . 'components/footer.php'; ?>
</body>
</html>
